<?php

function checkLoginAdmin() {
    if(!isset($_SESSION['user_admin'])) {
        header('location: ' . BASE_URL_ADMIN . '?act=login-admin');
        exit();
    }
}
?>