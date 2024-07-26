<?php
session_start();
$_SESSION = [];
header("Location: portal.php");
