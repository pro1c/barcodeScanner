<?php

function dump_req(){

    $f = fopen('req.txt', 'w+');

    fputs($f, "----- SERVER ----------------------------------------------------------------------------------------------------\n");
    fputs($f, print_r($_SERVER, true));

    fputs($f, "----- GET ----------------------------------------------------------------------------------------------------\n");
    fputs($f, print_r($_GET, true));

    fputs($f, "----- POST ----------------------------------------------------------------------------------------------------\n");
    fputs($f, print_r($_POST, true));

    fclose($f);
}

dump_req();

$eans = explode(",", $_GET["eans"]);

$client = new SoapClient("http://1claster/edev4_trade/ws/ExchangeTSD.1cws?wsdl", array('login'=>"TSD", 'password'=>""));

$res = $client->CheckState();
if($res->return == "Checked ok."){
    $res = $client->SendCodes(array("ScanCodes" => $_GET["eans"]));
}

echo "alldone ".count($eans)." codes <br>";
echo "service: ".print_r($res, true);


?>