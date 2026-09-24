<?php
require_once __DIR__ . '/../config.php';

unset($_SESSION['admin_logged_in']);
redirect('/admin/login.php');
