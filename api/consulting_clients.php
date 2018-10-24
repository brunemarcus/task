<?php 

require_once '../src/customers.php';

$consulting_clients = new Customers();
return $consulting_clients->recently_clients();