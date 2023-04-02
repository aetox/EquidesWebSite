<?php
session_start();
unset($_SESSION);
session_destroy();
session_write_close();
header('Location: ../../index.php');
if (isset($_COOKIE['user_id_login'])) {
    setcookie('user_id_login', '', time() - 3600, '/');
}
if (isset($_COOKIE['my_session_data'])) {
    setcookie('my_session_data', '', time() - 3600, '/');
}
include_once('../../header.php');
header('Location: ../../index.php');
die
?>