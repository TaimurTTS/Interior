<?php
session_start();
/**************************************************************************************************
// | Script Name          : PHP Wall Script 
// | Version       		  : v7
// | Script Author        : Zeeshan Rasool
// | Release Date 		  : September 2016
// | Websites             : http://phpwallscript.com | http://wallscriptclone.com
// | Produced By          : http://99points.info
// | E-mail               : zeeshan@99points.info
// |**************************************************************************************************
// | PHP Wall Script OR Wall Script Clone is not a free Script, if you are found to be using this Script without a 
// | license you will be prosecuted to the full extent of the law. 
// | Anyone attempting to do reverse engineer, or to use this script fraudulently will be prosecuted to the full extent 
// | of the law. Please read the terms of use carefully. You can use this script but can not redistribute it.
// |**************************************************************************************************
// | Copyright (c) 2016 http://wallscriptclone.com All rights reserved.
// |**************************************************************************************************/

require_once 'includes/Wall.php';

$Wall = new Wall;

$language 		= $Wall->include_language_on_root();
include_once ($language);

$UserLoggedIn   = isset($_SESSION['wall_login']) ? intval($_SESSION['wall_login']) : 0;
if(!$UserLoggedIn)
{
	header("Location: ".BASE_URL."");	
	exit;
}

$path = "./media/";

if( isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST" )
{
	set_time_limit ( 340 ) ;
	
	$name = $Wall->filterData($_FILES['thisvideo']['name']);
	$size = $_FILES['thisvideo']['size'];
	
	if(strlen($name))
	{
		$ext = pathinfo($name, PATHINFO_EXTENSION);
		$actual_image_name = "wsc_".time().rand(11111,9999999).".".$ext;
		
		$valid_vid_ext = unserialize (VALID_VID_FORMAT_WALL);
		
		if(in_array($ext, $valid_vid_ext))
		{
			if($size < (VID_SIZE_LIMIT*VID_SIZE_LIMIT))
			{
				$tmp = $_FILES['thisvideo']['tmp_name'];
				
				if(move_uploaded_file( $tmp, $path . $actual_image_name ))
				{
					echo "<input type='hidden' id='ajax_image_url' value='".$actual_image_name."' />";
					echo "<input type='hidden' id='video' value='1' />";
					
					echo $fHtml .= '
							<script>
							flowplayer("a.flowlight2", "'.BASE_URL.'flowplayer/flowplayer-3.2.15.swf", {
							plugins: {
							controls: {
								url: "'.BASE_URL.'flowplayer/flowplayer.controls-3.2.14.swf",
								buttonColor: "rgba(0, 0, 0, 0.9)",
								buttonOverColor: "#000000",
								backgroundColor: "#D7D7D7",
								backgroundGradient: "medium",
								sliderColor: "#FFFFFF",
								sliderBorder: "1px solid #808080",
								volumeSliderColor: "#FFFFFF",
								volumeBorder: "1px solid #808080",
								timeColor: "#000000",
								durationColor: "#535353"
							}
						},
						clip: {
							autoPlay: false
						}
					});
					
					jQuery("#ajaxvideouploadfrm").hide();
					
					</script>';
					
					echo '<a href="'.BASE_URL.'media/'.$actual_image_name.'" style="display:block;width:280px;height:200px" class="flowlight2"> </a>';
				}
				else
					echo $txt_img_err1;
			}
			else
				echo $txt_img_up_size;	
		}
		else
			echo $txt_img_err2;	
	}
	else
		echo $txt_img_err3;
	
	exit;
}
?>