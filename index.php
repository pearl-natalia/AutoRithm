<?php 

$path = parse_url($_SERVER["REQUEST_URI"])["path"];


switch($path){
    case "/distance.php":
        require("distance.php");
        break;
    case "/apply.php":
        require("apply.php");
        break;
    default:
        echo"echo";
}