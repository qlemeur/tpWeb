<?php
session_start();

require_once('../../app/libraries/database.php');
require_once('../../app/models/user.php');
require_once('../../app/controllers/Users.php');


$users = new Users();

$action = isset($_GET['action']) ? $_GET['action'] : 'login';

switch ($users) {
    case 'login':
        $users->login();
        break;
    case 'logout':
        
        $users->logout();
        break;
    default:
        header('Location: views/users/login.php');
        exit;
}



?>