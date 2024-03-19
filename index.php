<!-- použito, z kodu pana učitele Pavláta -->

<?php
session_start();
$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '':
    case '/':
        $redirect = '\V\index.php';
        break;
    case '/onas':
        $redirect = '\V\ONas.php';
        break;
    case '/login':
        $redirect = '\V\LoginForm.php';
        break;
    case'/welcome':
        $redirect = '\V\Welcome.php';
        break;
    case '/register':
        $redirect = '\V\RegisterForm.php';
        break;
    case '/blogy':
        $redirect = '\V\Blogy.php';
        break;     
    case '/database/login':
        $redirect = '\V\database\login.php';
        break;
    case '/database/register':
        $redirect = '\V\database\register.php';
        break;
    case '/database/logout':
        $redirect = '\V\database\logout.php';
        break;  
    case '/database/post':
        $redirect = '\V\database\post.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '\V\404.php';
        exit();
}

$_SESSION['site'] = $redirect;
require_once __DIR__ . '/V/basic/Header.php';
require_once __DIR__ . $redirect ?? __DIR__ . '/V/index.php';
require_once __DIR__ . '/V/basic/Footer.php';


