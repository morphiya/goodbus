<?php
/*
 * Project: goodbus.dp.ua
 * File:    app/settings/config.php
 * About:   general settings
 */

defined ('VG_ACCESS') or die ('Access denied');

const SITE_URL = "http://goodbus.dp.ua";
const SITE_PATH = '/goodbus.dp.ua/';

const DB_USER = 'root';
const DB_PASS = 'MYSQL_ROOT_PASSWORD';
const DB_HOST = 'localhost';
const DB_NAME = 'goodbus_data';

const TEMPLATE = '../app/templates/default/';
const ADMIN_TEMPLATE = '../app/templates/default/admin/';

const CSS_JS = [
	'styles' => ['css/style.css'],
	'scripts' => ['js/script.js']
];

const COOKIE_VERSION = '1.0.0';
const CRYPT_KEY = '';
const COOKIE_TIME = 60;
const BLOCK_TIME = 3;

// class autoloading
use app\exceptions\MyException;
function autoloadMainClasses($class_name) {
	$class_name = str_replace('\\', '/', $class_name);

	if(!@include_once '../' . $class_name.'.php') {
		throw new MyException("Cannot include class " . $class_name . ". Check file name and make sure that file exists");
	}

}
spl_autoload_register('autoloadMainClasses');
