<?php

include_once 'controller/customer_controller.php';
$customer= new CustomerController();
$results = $customer->showCustomer();

@header("Content-Disposition: attachment; filename=customer_date.csv");
$data="";
$data.="id,name,email,phone,max_debt,address,ship_addess"."\n";
foreach($results as $result)
{
    $data.=$result['id'].",";
    $data.=$result['name'].",";
    $data.=$result['email'].",";
    $data.=$result['phone'].",";
    $data.=$result['max_debt'].",";
    $data.=$result['address'].",";
    $data.=$result['ship_address']."\n";
}
echo $data;
exit();
?>