<?php
    $access = [
        // "host" => "sql103.infinityfree.com",
        // "user" => "if0_38248325",
        // "pass" => "G31ThuDl85",

        "host" => "localhost",
        "user" => "root",
        "pass" => "",
        "db" => "data_perpus"
    ];
    if (isset($access['host'],$access['user'],$access['pass'],$access['db'])) {
        $koneksi = new mysqli ($access['host'],$access['user'],$access['pass'],$access['db']);
    }
    else{
        die("Script stopped due to an error.");
    }
?>