<?php
require_once "./common/global.php";
require_once "./dao/pdo.php";
require_once("./public/PHPExcel/Classes/PHPExcel.php");

$url = isset($_GET['url']) ? $_GET['url'] : '/';
switch ($url) {
    case '/':
        require_once "./business/login/login.php";
        login();
        break;
    case 'admin':
        require_once "./business/quanly/result.php";
        week();
        break;
    case 'admin/result':
        require_once "./business/quanly/result.php";
        week();
        break;
    case 'admin/result-month':
        require_once "./business/quanly/result.php";
        month();
        break;
    case 'admin/result-hour':
        require_once "./business/quanly/result.php";
        hour();
        break;
        //admin desk       
    case 'admin/desk':
        require_once "./business/quanly/desk.php";
        desk_index();
        break;
    case 'admin/desk/add-form':
        require_once "./business/quanly/desk.php";
        desk_add_form();
        break;
    case 'admin/desk/add-submit':
        require_once "./business/quanly/desk.php";
        desk_submit_add();
        break;
    case 'admin/desk/delete':
        require_once "./business/quanly/desk.php";
        desk_remove();
        break;
    case 'admin/desk/edit-form':
        require_once "./business/quanly/desk.php";
        desk_edit_form();
        break;
    case 'admin/desk/edit-submit':
        require_once "./business/quanly/desk.php";
        desk_save_edit();
        break;
    case 'admin/desk/update-desk':
        require_once "./business/quanly/desk.php";
        update_desk();
        break;
        // admin desk                
    case 'admin/account':
        require_once "./business/quanly/account.php";
        user_index();
        break;
    case 'admin/account/add-form':
        require_once "./business/quanly/account.php";
        user_add_form();
        break;
    case 'admin/account/add-submit':
        require_once "./business/quanly/account.php";
        user_submit_add();
        break;
    case 'admin/account/edit-form':
        require_once "./business/quanly/account.php";
        user_edit_form();
        break;
    case 'admin/account/edit-submit':
        require_once "./business/quanly/account.php";
        user_save_edit();
        break;
    case 'admin/account/update-user':
        require_once "./business/quanly/account.php";
        update_user();
        break;
    case 'admin/account/delete':
        require_once "./business/quanly/account.php";
        user_remove();
        break;
    case 'admin/category':
        require_once "./business/quanly/category.php";
        list_category();
        break;
    case 'admin/category/add-form':
        require_once "./business/quanly/category.php";
        add_form();
        break;
    case 'admin/category/add-submit':
        require_once "./business/quanly/category.php";
        category_submit_add();
        break;
    case 'admin/category/edit-form':
        require_once "./business/quanly/category.php";
        category_edit_form();
        break;
    case 'admin/category/edit-submit':
        require_once "./business/quanly/category.php";
        category_save_edit();
        break;
    case 'admin/category/delete':
        require_once "./business/quanly/category.php";
        category_remove();
        break;
    case 'admin/category/update-category':
        require_once "./business/quanly/category.php";
        update_category();
        break;
    case 'admin/food':
        require_once "./business/quanly/food.php";
        list_food();
        break;
    case 'admin/food/add-form':
        require_once "./business/quanly/food.php";
        add_form();
        break;
    case 'admin/food/add-submit':
        require_once "./business/quanly/food.php";
        food_submit_add();
        break;
    case 'admin/food/edit-form':
        require_once "./business/quanly/food.php";
        food_edit_form();
        break;
    case 'admin/food/edit-submit':
        require_once "./business/quanly/food.php";
        food_save_edit();
        break;
    case 'admin/food/delete':
        require_once "./business/quanly/food.php";
        food_remove();
        break;
    case 'admin/food/update-food':
        require_once "./business/quanly/food.php";
        update_food();
        break;
    case 'admin/bill':
        require_once "./business/quanly/bill.php";
        bill_index();
        break;
    case 'admin/bill/update-bill':
        require_once "./business/quanly/bill.php";
        update_bill();
        break;
    case 'admin/bill/export':
        require_once "./business/quanly/bill.php";
        excel_export();
        break;
    case 'staff':
        require_once "./business/nhanvien/desk/desk.php";
        loadall_desk();
        break;
    case 'staff/desk':
        require_once "./business/nhanvien/desk/desk.php";
        load_location();
        break;
    case 'staff/order':
        require_once "./business/nhanvien/order/order.php";
        menu_render();
        break;
    case 'staff/order/addtocart':
        require_once "./business/nhanvien/order/order.php";
        add_food();
        break;
    case 'staff/order/delete':
        require_once "./business/nhanvien/order/order.php";
        remove_order_food();
        break;
    case 'staff/order/update-session':
        require_once "./business/nhanvien/order/order.php";
        update_session();
        break;
    case 'staff/order/add-bill':
        require_once "./business/nhanvien/bill/bill.php";
        add_bill();
        break;
    case 'staff/order/add-bill-update':
        require_once "./business/nhanvien/bill/bill.php";
        add_bill_update();
        break;
    case 'staff/order/bill':
        require_once "./business/nhanvien/bill/bill.php";
        get_bill();
        break;
    case 'staff/redesk':
        require_once "./business/nhanvien/desk/desk.php";
        load_relocation();
        break;
    case 'staff/redesk-save':
        require_once "./business/nhanvien/desk/desk.php";
        save_relocation();
        break;
    case 'staff/combine-save':
        require_once "./business/nhanvien/desk/desk.php";
        save_combine();
        break;
    case 'staff/order/done-bill':
        require_once "./business/nhanvien/bill/bill.php";
        done_bill();
        break;
    case 'chef':
        require "./business/bep/undone.php";
        list_undone();
        break;
    case 'chef/done':
        require "./business/bep/done.php";
        list_done();
        break;
    case 'chef/food/done':
        require "./business/bep/undone.php";
        done_detail_bill();
        break;
    case 'chef/food/undone':
        require "./business/bep/done.php";
        undone_detail_bill();
        break;
    case  'login':
        require_once "./business/login/login.php";
        login();
        break;
    case  'login/submit':
        require_once "./business/login/login.php";
        submit_login();
        break;
    case  'logout/submit':
        require_once "./business/login/login.php";
        submit_logout();
        break;
    default:
        echo " Đường dẫn này chưa được định nghĩa";
        break;
}
