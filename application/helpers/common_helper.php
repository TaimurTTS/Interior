<?php

function d($array){
	echo '<pre>';
		print_r($array);
	echo '</pre>';
}

function v($array){
	echo '<pre>';
		var_dump($array);
	echo '</pre>';
}

function redirectSimple($pageName){
	echo '<script language=javascript>location.href=\'',$pageName,'\';</script>';
	exit;
}


function generate_password(){
		$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ012345678909876543212345566778990!@#$%^&*()_+|}{?><~";
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 10; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
    return implode($pass); //turn the array into a string

}

function generate_numeric_code(){
		$alphabet = "012345678909876543212345566778990";
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 4; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
    return implode($pass); //turn the array into a string

}

function nicetime($timestamp, $detailLevel = 1) {


        $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
        $lengths = array("60", "60", "24", "7", "4.35", "12", "10");

        $now = time();

        // check validity of date
        if (empty($timestamp)) {
            return "Unknown time";
        }

        // is it future date or past date
        if ($now > $timestamp) {
            $difference = $now - $timestamp;
            $tense = "ago";
        } else {
            $difference = $timestamp - $now;
            $tense = "ago";
        }

        if ($difference == 0) {
            return "1 second ago";
        }

        $remainders = array();

        for ($j = 0; $j < count($lengths); $j++) {
            $remainders[$j] = floor(fmod($difference, $lengths[$j]));
            $difference = floor($difference / $lengths[$j]);
        }

        $difference = round($difference);

        $remainders[] = $difference;

        $string = "";

        for ($i = count($remainders) - 1; $i >= 0; $i--) {
            if ($remainders[$i]) {
                $string .= $remainders[$i] . " " . $periods[$i];

                if ($remainders[$i] != 1) {
                    $string .= "s";
                }

                $string .= " ";

                $detailLevel--;

                if ($detailLevel <= 0) {
                    break;
                }
            }
        }

        return $string . $tense;
    }

