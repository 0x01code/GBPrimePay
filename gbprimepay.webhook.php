<?php

// ถ้าเป็น ip ของ GBPrimePay ถึงจะให้ทำงานโค้ดใน if
if ($_SERVER['REMOTE_ADDR'] == '203.151.205.45' || $_SERVER['REMOTE_ADDR'] == '203.151.205.33') {
    $respFile = fopen("resp-log.json", "w") or die("Unable to open file!");

    $json_str = file_get_contents('php://input');
    fwrite($respFile, $json_str . "\n\n");

    $json_obj = json_decode($json_str);

    // $result = $db->query("SELECT user_id FROM topup WHERE refcode = '{$json_obj->referenceNo}'");
    // $db->query("UPDATE users SET point = point + {$json_obj->amount} WHERE id = {$result->user_id}");

    fwrite($respFile, $json_obj);
    fclose($respFile);
} else {
    die('Access Denied');
}
