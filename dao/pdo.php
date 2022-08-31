<?php

/**
 * hàm kết nốt vs csdl 
 * return kết nối
 */

function pdo_get_connection()
{
    $connection = new PDO("mysql:host=127.0.0.1;dbname=group7;charset=utf8", "root", "");
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $connection;
}

/**
 * Hàm để thực hiện cậu lệnh SQL(INSERT, UPDATE, DELETE)
 * Tham số: $sql câu lệnh truy vấn
 * Tham số: @args mảng các tham số đầu vào
 * PDOException $e, kiểm soát ngoại lệ (Kiểm lỗi)
 */

function pdo_execute($sql)
{
    $args = array_slice(func_get_args(), 1);
    try {
        $connection = pdo_get_connection();
        $stmt = $connection->prepare($sql);
        $stmt->execute($args);
    } catch (PDOException $e) {
        echo "có lỗi xảy ra: " . $e->getMessage();
    } finally {
        unset($connection);
    }
}
function pdo_execute_return_lastInsertId($sql)
{
    $args = array_slice(func_get_args(), 1);
    try {
        $connection = pdo_get_connection();
        $stmt = $connection->prepare($sql);
        $stmt->execute($args);
        return $connection->lastInsertId();
    } catch (PDOException $e) {
        echo "có lỗi xảy ra: " . $e->getMessage();
    } finally {
        unset($connection);
    }
}

/**
 * hàm thực hiện câu lệnh truy vấn SELECT để lấy ra nhiều bản ghi
 * tham số : $sql câu lệnh truy vấn
 * tham số: $args mảng các tham số đầu vào
 * return danh sách bản ghi
 */

function pdo_query($sql)
{
    $args = array_slice(func_get_args(), 1);
    try {
        $connection = pdo_get_connection();
        $stmt = $connection->prepare($sql);
        $stmt->execute($args);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo "có lỗi xảy ra" . $e->getMessage();
    } finally {
        unset($connection);
    }
}

/**
 * hàm thực hiện câu lệnh sql trả về 1 bản ghi
 * tham số : $sql câu lệnh truy vấn
 * tham số : $args tham số đầu vào
 * return 1 bản ghi
 */

function pdo_query_one($sql)
{
    $args = array_slice(func_get_args(), 1);
    try {
        $connection = pdo_get_connection();
        $stmt = $connection->prepare($sql);
        $stmt->execute($args);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo "có lỗi xảy ra" . $e->getMessage();
    } finally {
        unset($connection);
    }
}

/**
 * hàm thực thi câu lệnh sql trả về 1 mảng giá trị
 * tham số : $sql câu lệnh truy vấn
 * tham số : $args tham số đầu vào
 * return 1 mảng giá trị
 * kiểm tra sự tồn tại của một thứ gì đó.
 */

function pdo_query_value($sql)
{
    $args = array_slice(func_get_args(), 1);
    try {
        $connection = pdo_get_connection();
        $stmt = $connection->prepare($sql);
        $stmt->execute($args);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return array_values($result)[0];
    } catch (PDOException $e) {
        echo "có lỗi xảy ra" . $e->getMessage();
    } finally {
        unset($connection);
    }
}


function executeQuery($sql, $getAll = true){
    $connect = pdo_get_connection();
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll();
    if($getAll){
        return $data;
    }else{
        if(count($data) > 0){
            return $data[0];
        }
    }
}
