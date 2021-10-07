<?php
session_start();

$root = $_SERVER['DOCUMENT_ROOT'];

$rootHtml = "/" . basename($_SERVER['DOCUMENT_ROOT']);
$rootHtml = str_replace("//", "/", $rootHtml);

//Database
require_once $root . "/Model/Classes/Database.php";

//Entity
require_once $root . "/Model/Entity/Category.php";
require_once $root . "/Model/Entity/Role.php";
require_once $root . "/Model/Entity/User.php";