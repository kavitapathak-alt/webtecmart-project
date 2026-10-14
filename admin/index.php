<?php
require_once __DIR__ . '/../config.php';

redirect(!empty($_SESSION['admin_logged_in']) ? '/admin/dashboard.php' : '/admin/login.php');