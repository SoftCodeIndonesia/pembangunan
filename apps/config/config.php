<?php

$base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$base_url .= "://" . $_SERVER['HTTP_HOST'];
$base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

define('BASE_URL', $base_url);

define('DB_HOST', '203.161.184.104');
define('DB_USER', 'penduduk_usulan_pembangunan');
define('DB_PASS', 'usulan#penduduk');
define('DB_NAME', 'penduduk_usulan_pembangunan');