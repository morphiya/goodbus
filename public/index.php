<?php
/*
 * Project: goodbus.dp.ua
 * File:    public/index.php
 * About:   main entry point
 */

define ('VG_ACCESS', true); // security constant check in app/settings/config.php

header ('Content-Type: text/html; charset=utf-8');
session_start();

require_once '../app/settings/config.php';

use app\exceptions\MyException;
use app\controllers\Route;

try {
	Route::getInstance();
}
catch (MyException $e) {
	exit($e->getMessage());
}
