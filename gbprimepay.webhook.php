<?php

$respFile = fopen("resp-log.json", "w") or die("Unable to open file!");

$json_str = file_get_contents('php://input');
fwrite($respFile, $json_str . "\n\n");

$json_obj = json_decode($json_str);
fwrite($respFile, $json_obj);
fclose($respFile);
