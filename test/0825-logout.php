<?php
session_start();
unset($_SESSION['user']);

header('Location: ./0825-login.php');
exit;
