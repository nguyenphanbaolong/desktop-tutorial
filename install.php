<?php
$conn = mysqli_connect('localhost', 'root','');
$create_db = "create database if not exists maru";
$query = mysqli_query($conn, $create_db);
$select_db = mysqli_select_db($conn,'maru');
$create_tb = "create table if not exists category(
    category_id int auto_increment primary key not null,
    category_name varchar(50) not null,
    del_flag smallint 
);";
mysqli_query($conn , $create_tb);

$create_tb = "create table if not exists products(
    product_id int auto_increment primary key not null,
    id_category int  not null references category(category_id),
    product_name varchar(100) not null,
    description varchar(100 ) not null,
    price int not null, 
    stock_quantity smallint not null,
    del_flag smallint not null
);";

mysqli_query($conn, $create_tb);

$create_tb = "create table if not exists customers(
    cus_id int auto_increment primary key not null, 
    cus_name varchar(100) not null,
    mail varchar(100) not null,
    phone int  not null,
    address varchar(100) not null,
    cus_type int  not null,
    del_flag smallint not null
 );";
mysqli_query($conn, $create_tb);

$create_tb = "create table if not exists orders (
    oder_id int auto_increment primary key not null ,
    id_cus int not null references customers(cus_id),
    oder_date date not null,
    del_flag smallint not null 
 );";
mysqli_query($conn, $create_tb);

$create_tb = "create table if not exists oder_details(
    id_oder int not null references oder(oder_id),
    id_product int not null references products(product_id),
    quantity int not null,
    price int not null
);";
mysqli_query($conn, $create_tb);

$create_tb = "create table if not exists discounts(
    discount_id int not null auto_increment,
    id_category int not null references category(id_category),
    start_date date not null,
    end_date date not null
);";
mysqli_query($conn, $create_tb);
?>