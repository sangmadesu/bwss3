<?php
session_start();
error_reporting(E_ALL);
define('BASE_VIEW', __DIR__ . '/views/');
define('BASE_UPLOADS', __DIR__ . '/resource/uploads/');
$root = (!empty($_SERVER['https']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
define('BASE_URL', $root);



		