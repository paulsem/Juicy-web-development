<?php

include 'Model/AdminModel.php';
include 'Controller/AdminController.php';

$url = isset($_GET['url']) ? $_GET['url'] : '/';


$ctr = new AdminController();

$ctr->handle($url);
?>