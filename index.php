<?php
session_start();
$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '':
    case '/':
        $redirect = '/views/index.php';
        break;
    case '/about':
        $redirect = '/views/aboutUs.php';
        break;
    case '/login':
        $redirect = '/views/login.php';
        break;
    case '/register':
        $redirect = '/views/register.php';
        break;
    case '/auth/login':
        $redirect = '/views/auth/login.php';
        break;
    case '/auth/register':
        $redirect = '/views/auth/register.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/views/404.php';
        exit();
}

$_SESSION['site'] = $redirect;
require_once __DIR__ . '/views/core/header.php';
require_once __DIR__ . $redirect ?? __DIR__ . '/views/index.php';
require_once __DIR__ . '/views/core/footer.php';