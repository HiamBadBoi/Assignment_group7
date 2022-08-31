<?php

// tạo đường dẫn truy cập vào website
session_start();

const BASE_URL = "http://localhost:81/Assignment_group7/";


const ADMIN_URL = BASE_URL. "admin/";
const STAFF_URL = BASE_URL. "staff/";
const CHEF_URL = BASE_URL. "chef/";
const ADMIN_ASSETS = BASE_URL . 'public/adminlte/';
const PUBLIC_ASSETS = BASE_URL."public/";
const IMAGE_URL = BASE_URL . "public/upload/";
const CSS_URL= BASE_URL . 'public/customize/css/';


function nhanvien_render($viewpath, $data = [], $files = []) {
    extract($data);
    $VIEW_PAGE = './views/nhanvien/'.$viewpath;
    include_once './views/nhanvien/layout/main.php';
}

function admin_render($viewpath, $data = [], $files = []){
    extract($data);
    $VIEW_PAGE = "./views/quanly/" . $viewpath;
    include_once './views/quanly/layout/main.php';
}
function chef_render($viewpath, $data = [], $files = []) {
    extract($data);
    $VIEW_PAGE = './views/bep/'.$viewpath;
    include_once './views/bep/layout/main.php';
}
function staff_render($viewpath, $data = [], $files = []){

    extract($data);
    $VIEW_PAGE = "./views/nhanvien/" . $viewpath;
    include_once './views/nhanvien/layout/main.php';
}
// đường dẫn để upload ảnh
$PATH_IMAGE = $_SERVER['DOCUMENT_ROOT'] . IMAGE_URL;

/**
 * hàm save_file dùng để upload file lên sever
 * @tham số: $file tên thẻ input file
 * @tham số: $dir_path đường dẫn để upload file
 * @return tên file upload
 */

function save_file($file, $dir_path)
{
    $file_upload = $_FILES[$file];
    $file_name = $file_upload['name'];
    $dir_file_path = $dir_path . $file_name;
    move_uploaded_file($file_upload['tmp_name'], $dir_file_path);
    return $file_name;
}
function dd(){
    echo "<pre>";
    $args = func_get_args();
    foreach($args as $item){
        var_dump($item);
    }
    
    echo "</pre>";
    die;
}

