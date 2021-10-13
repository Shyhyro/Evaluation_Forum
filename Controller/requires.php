<?php
session_start();

$root = $_SERVER['DOCUMENT_ROOT'];

require_once $root . "/vendor/autoload.php";

/*$rootHtml = "/" . basename($_SERVER['DOCUMENT_ROOT']);
$rootHtml = str_replace("//", "/", $rootHtml);

//Database
require_once $root . "/Model/Classes/Database.php";

//Entity
require_once $root . "/Model/Entity/Category.php";
require_once $root . "/Model/Entity/Commentary.php";
require_once $root . "/Model/Entity/Role.php";
require_once $root . "/Model/Entity/Subject.php";
require_once $root . "/Model/Entity/Token.php";
require_once $root . "/Model/Entity/User.php";

//Manager
require_once $root . "/Model/Manager/CategoryManager.php";
require_once $root . "/Model/Manager/CommentaryManager.php";
require_once $root . "/Model/Manager/RoleManager.php";
require_once $root . "/Model/Manager/SubjectManager.php";
require_once $root . "/Model/Manager/TokenManager.php";
require_once $root . "/Model/Manager/UserManager.php";*/