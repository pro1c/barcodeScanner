<?php


$eans = explode(",", $_GET["eans"]);

$client = new SoapClient("http://1claster/dev3_trade/ws/ExchangeTSD.1cws?wsdl", array('login'=>"TSD", 'password'=>"vE4racaw"));

$res = $client->CheckState();

echo "alldone ".count($eans)." codes <br>";
echo "service: ".print_r($res, true);


?>