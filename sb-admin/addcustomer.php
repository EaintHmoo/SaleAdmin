
<?php 
        include_once 'masterlayouts/header.php';
        include_once ('controller/customer_controller.php');
        session_start();
        if(empty($_SESSION['email']))
        {
            header("location:login.php");
        }
        else
        {
            $email=$_SESSION['email'];
        }
 
    $name ="";
    $phno = "";
    $email = "";
    $debt = "";
    $address = "";
    $shipping_address = "";
    if(isset($_GET["submit"]))
    {
        if(empty($_GET['name']))
        {
            $name_error = "Please enter name";
        }
        else{
            $name = $_GET['name'];
        }
        if(empty($_GET['phno']))
        {
            $phno_error = "Please enter phone number";
        }
        else{
            $phno = $_GET['phno'];
        }
        if(empty($_GET['email']))
        {
            $email_error = "Please enter email";
        }
        else{
            $email = $_GET['email'];
        }
        if(empty($_GET['debt']))
        {
            $debt_error = "Please enter debt";
        }
        else{
            $debt = $_GET['debt'];
        }
        if(empty($_GET['address']))
        {
            $address_error = "Please enter address";
        }
        else{
            $address = $_GET['address'];
        }
        if(empty($_GET['delivery']))
        {
            $shipping_address_error = "Please enter shipping address";
        }
        else{
            $shipping_address = $_GET['delivery'];
        }

        $name = $_GET['name'];
        $phno = $_GET['phno'];
        $email = $_GET['email'];
        $debt = $_GET['debt'];
        $address = $_GET['address'];
        $shipping_address = $_GET['delivery'];
        if(!empty($name) && !empty($phno) && !empty($email) && !empty($debt) && !empty($address) && !empty($shipping_address))
        {

            $customer = new CustomerController();
            $result = $customer->addCustomer($name,$phno,$email,$debt,$address,$shipping_address);
            
            if($result)
            {
                exit(header("location:customerindex.php"));

            }
        }
        
    }
?> 
<div id="layoutSidenav">
<?php include_once 'masterlayouts/sidebar.php';?>
<div id="layoutSidenav_content">
<main>
<div class="container-fluid px-4">
<form method="get" class="form-signin mt-5" method="post" style="border:2px solid black;padding:5px;border-radius:5px" >
        <h1 class="h3 mb-3 font-weight-normal">Customer Information Form</h1><hr>                               
        <div class="col">
        <label for="name" >Name</label>
        <input type="text" name="name" id="name" value="<?php echo $name;?>" class="form-control" autofocus>
        <span style="color:red">
        <?php
        if(isset($name_error)){
            echo $name_error;
        }
        ?>
        </span>
        </div>

        <div class="row">
        <div class="col-md-6">
        <label for="phno" >Phone number</label>
        <input type="text" name="phno" id="phno" value="<?php if(isset($phno)) echo $phno;?>" class="form-control" >
        <span style="color:red"> 
        <?php
        if(isset($phno_error)){
        echo $phno_error;
        }
        ?>
        </span>
        </div>
        <div class="col-md-6">
        <label for="phno" >Email</label>
        <input type="text" name="email" id="email" value="<?php if(isset($email)) echo $email;?>" class="form-control" >
        <span style="color:red">
        <?php
        if(isset($email_error)){
        echo $email_error;
        }
        ?>
        </span>
        </div>
        </div>

        <div class="col">
        <label for="phno" >Most Acceptable Debt</label>
        <input type="text" name="debt" id="debt" class="form-control" value="<?php if(isset($debt)) echo $debt;?>" placeholder="0">
        <span style="color:red">
        <?php
        if(isset($debt_error)){
        echo $debt_error;
        }
        ?>
        </span>
        </div>

        <div class="row">
        <div class="col-md-6">
        <label for="address">Address</label>
        <textarea name="address" id="address" class="form-control"><?php if(isset($address)) echo $address;?></textarea>
        <span style="color:red">
        <?php
        if(isset($address_error)){
        echo $address_error;
        }
        ?>
        </span>
        </div>
        <div class="col-md-6">
        <label for="delivery">Shipping Address</label>
        <textarea name="delivery" id="delivery"  class="form-control"><?php if(isset($shipping_address)) echo $shipping_address;?></textarea>
        <span style="color:red">
        <?php
        if(isset($shipping_address_error)){
        echo $shipping_address_error;
        }
        ?>
        </span>
        </div>
        </div>

        <button name="submit" class="btn btn-primary my-3 mx-1" type="submit">Save</button>
        <a name="cancel" class="btn btn-danger my-3 mx-1" href="customerindex.php">Cancel</a>
</form>
</div>
</main> 
    <?php include_once 'masterlayouts/footer.php';?>

            