<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class paypal_pro
{
	public $API_USERNAME;// = 'harshamz_api1.gmail.com';
	public $API_PASSWORD;// = 'YGSGPFNG4859GT9G';
	public $API_SIGNATURE;// = 'AQq5bg-I.Nl0ZQyuvMvj00Y7P2dHAaMV9B3f9DOZD8nuzLCjYHB.-S59';
	public $API_ENDPOINT;
	public $USE_PROXY;
	public $PROXY_HOST;
	public $PROXY_PORT;
	public $PAYPAL_URL;
	public $VERSION;
	public $NVP_HEADER;

	function __construct($API_USERNAME = 'harshamz_api1.gmail.com', $API_PASSWORD  = 'YGSGPFNG4859GT9G', $API_SIGNATURE = 'AQq5bg-I.Nl0ZQyuvMvj00Y7P2dHAaMV9B3f9DOZD8nuzLCjYHB.-S59', $PROXY_HOST = '', $PROXY_PORT = '', $IS_ONLINE = FALSE, $USE_PROXY = FALSE, $VERSION = '57.0')
       // function __construct($IS_ONLINE = FALSE, $USE_PROXY = FALSE, $VERSION = '57.0')
	{
		$this->API_USERNAME = $API_USERNAME;
                $this->API_PASSWORD = $API_PASSWORD;
		$this->API_SIGNATURE = $API_SIGNATURE;
		$this->API_ENDPOINT = 'https://api-3t.sandbox.paypal.com/nvp';
		$this->USE_PROXY = $USE_PROXY;
		if($this->USE_PROXY == true)
		{
			//$this->PROXY_HOST = $PROXY_HOST;
			//$this->PROXY_PORT = $PROXY_PORT;
		}
		else
		{
			$this->PROXY_HOST = '127.0.0.1';
			$this->PROXY_PORT = '808';
		}
		if($IS_ONLINE == FALSE)
		{
			$this->PAYPAL_URL = 'https://www.sandbox.paypal.com/webscr&cmd=_express-checkout&token=';
		}
		else
		{
			$this->PAYPAL_URL = 'https://www.paypal.com/webscr&cmd=_express-checkout&token=';
		}
		$this->VERSION = $VERSION;
	}

	function hash_call($methodName,$nvpStr)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$this->API_ENDPOINT);
		curl_setopt($ch, CURLOPT_VERBOSE, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_POST, 1);
                
                if($this->USE_PROXY)
		{
			curl_setopt ($ch, CURLOPT_PROXY, $this->PROXY_HOST.":".$this->PROXY_PORT); 
		}
                
                $nvpreq="METHOD=".urlencode($methodName)."&VERSION=".urlencode($this->VERSION)."&PWD=".urlencode($this->API_PASSWORD)."&USER=".urlencode($this->API_USERNAME)."&SIGNATURE=".urlencode($this->API_SIGNATURE).$nvpStr;
		//$nvpreq ="METHOD=doDirectPayment&VERSION=57.0&PWD=QFZCWN5HZM8VBG7Q&USER=sdk-three_api1.sdk.com&SIGNATURE=A.d9eRKfd1yVkRrtmMfCFLTqa6M9AyodL0SJkhYztxUi8W9pCXF6.4NI&PAYMENTACTION=Sale&AMT=1.00&CREDITCARDTYPE=Visa&ACCT=4473489854824401&EXPDATE=052017&CVV2=962&FIRSTNAME=waqas&LASTNAME=asdasdsd&STREET=1+Main+St&CITY=San+Jose&STATE=GA&ZIP=95131&COUNTRYCODE=US&CURRENCYCODE=USD";
                //var_dump($nvpreq);
                //die();
                curl_setopt($ch,CURLOPT_POSTFIELDS,$nvpreq);
		$response = curl_exec($ch);
               // var_dump($response);
                
		$nvpResArray=$this->deformatNVP($response);
		$nvpReqArray=$this->deformatNVP($nvpreq);
		$_SESSION['nvpReqArray']=$nvpReqArray;
		if (curl_errno($ch))
		{
			die("CURL send a error during perform operation: ".curl_errno($ch));
		} 
		else 
		{
			curl_close($ch);
		}

	return $nvpResArray;
	}

	function deformatNVP($nvpstr)
	{

		$intial=0;
		$nvpArray = array();
		while(strlen($nvpstr))
		{
			$keypos= strpos($nvpstr,'='); 
			$valuepos = strpos($nvpstr,'&') ? strpos($nvpstr,'&'): strlen($nvpstr); 
			$keyval=substr($nvpstr,$intial,$keypos);
			$valval=substr($nvpstr,$keypos+1,$valuepos-$keypos-1);
			$nvpArray[urldecode($keyval)] =urldecode( $valval);
			$nvpstr=substr($nvpstr,$valuepos+1,strlen($nvpstr));
		 }
		return $nvpArray;
	}

	function __destruct() 
	{

	}
}