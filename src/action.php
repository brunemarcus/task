<?php 

require_once 'login.php'; 
require_once 'customers.php';

$login = new Login(); //Instantiate Login
$customers = new Customers(); //Instantiate Customers 

$post = $_POST;

if(isset($post['_register']))
	$login->register($post);
if(isset($_POST['_login']))
	$login->login($post);
if(isset($_GET['logout']))
	$login->logout();
if(isset($post['_customers']))
	$customers->register_customer($post);
if(isset($_GET['delete']))
	$customers->delete($_GET['delete']);
if(isset($post['_edit']))
	$customers->update_form_edit($post);

