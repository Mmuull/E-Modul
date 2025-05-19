<?php
    $access = [
        "host" => "localhost",
        "user" => "root",
        "pass" => "",
        "db" => "data_emodul"
    ];
    if (isset($access['host'],$access['user'],$access['pass'],$access['db'])) {
        $koneksi = new mysqli ($access['host'],$access['user'],$access['pass'],$access['db']);
    }
    else{
        die("Script stopped due to an error.");
    }
?>