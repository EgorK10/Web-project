<?php
require "../vendor/autoload.php";
require_once "../TeamsRestController.php";


use Illuminate\Database\Capsule\Manager;
$manager = new Manager;
$manager ->addConnection([
    "collation" => "utf8mb4_unicode_ci",
    "charset" => "utf8mb4",
    "driver"=>"mysql",
    "host"=>"localhost",
    "database"=>"cs_db",
    "username"=>"root",
    "password"=>"",
]);
$manager->setAsGlobal();
$manager->bootEloquent();

$url = $_SERVER['REQUEST_URI'];

$matches = [];
if(preg_match("#/api/teams/?(\d+)?#", $url, $matches)) {
    $id = $matches[1] ?? null;
    $controller = new TeamRestController();
    $controller->process($id);
}