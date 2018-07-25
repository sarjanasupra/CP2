<?php
require '../core/config.php';

session_start();

unset($_SESSION['user']);

header('location:'.BASE_URL.'/index.php');