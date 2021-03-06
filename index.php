<?php

require_once('functions_base.php');
require_once('functions_add.php');
require_once('functions_borrow.php');
require_once('functions_show.php');
require_once('functions_book.php');

session_start();
connect_db();

global $errors;

if (!isset($errors)) {
    $errors = array();
}

$page="pealeht";

if (isset($_GET['page']) && $_GET['page']!=""){
	$page = htmlspecialchars($_GET['page']);
}

if (isset($_GET['id']) && $_GET['id']!=""){
    $id = htmlspecialchars($_GET['id']);
}

include_once('views/header.php');


switch($page){
    case "login":
        login();
        break;
    case "start":
        show_start_page();
        break;
    case "add":
        add_book();
        break;
    case "search":
        do_search();
        break;
    case "category":
        show_category();
        break;
    case "book":
        if (isset($id)){
            show_book_page($id);
            break;
        }
        show_start_page();
        break;
    case "modify":
        if (isset($id)){
            modify_book_page($id);
            break;
        }
        show_start_page();
        break;
    case "apply":
        if (isset($id)){
            apply_book_changes($id);
            break;
        }
        show_start_page();
        break;
    case "infra":
        show_infrastructure_page();
        break;

    case "borrow":
        borrow_book();
        break;
    case "return":
        return_book();
        break;

    case "add_room":
        add_room_form();
        break;
    case "add_bookcase":
        add_bookcase_form();
        break;
    case "add_shelf":
        add_shelf_form();
        break;

    case "add_category":
        add_category_form();
        break;
    case "add_system":
        add_system_form();
        break;

    case "logout":
        logout();
        break;
	default:
        show_start_page();
	    break;
}

include_once('views/footer.php');

?>