<?php
session_start();
include './includes/mysql.php';
include_once './app/GetUsersInfos.php';
$GetUsersInfos = new GetUsersInfos();
$GetUsersInfos->ReloadSession($_SESSION['id']);