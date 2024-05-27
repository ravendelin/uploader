<?php
session_start();

require 'autoload.php';

use controller\Page;
use controller\Login;
use controller\Upload;
$get = filter_input_array(INPUT_GET ,FILTER_SANITIZE_SPECIAL_CHARS);
$server = filter_input_array(INPUT_SERVER ,FILTER_SANITIZE_SPECIAL_CHARS);


if (isset ($get['action']) || $server['QUERY_STRING'] == '') {
    
    $page = new Page();
    $login = new Login();
    $upload = new Upload();
    $action = strip_tags($get['action'] ?: 'page');
    switch ($action) {
        case 'uploadform' :
            $upload->form();
            break;
        case 'upload' :
            $upload->process();
            break;
        case 'page':
            $page->pageShow();
            break;
        case 'admin':
            $adminController->admin();
            break;
         case 'login':
            $login->loginForm();
            break;
        case 'autorization':
            $login->autorization();
            break;
    }
    
}


//TODO Загрузчик