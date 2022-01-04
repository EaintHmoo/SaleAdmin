<?php
include_once(__DIR__.'/../model/customer.php');
class CustomerController extends Customer{
    //create customer
    function addCustomer($name,$phno,$email,$debt,$address,$shipping_address){
        return $this->createCustomer($name,$phno,$email,$debt,$address,$shipping_address);
    }

    //list customers
    function showCustomer()
    {
        $results = $this->getCustomer();
        return $results;
    }

    //show single line customer
    function showCustomerSingleLine($cid)
    {
        $result = $this->getCustomerSingleline($cid);
        return $result;
    }

    //edit customer
    function editCustomer($cid,$name,$phno,$email,$debt,$address,$shipping_address){
        return $this->updateCustomer($cid,$name,$phno,$email,$debt,$address,$shipping_address);
    }
    
}
?>