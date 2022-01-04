<?php 
include_once 'masterlayouts/header.php';
include_once 'controller/customer_controller.php';
$id=$_GET['cid'];
$customercontroller=new CustomerController();
$results=$customercontroller->showCustomerSingleLine($id);

if(isset($_POST['submit']))
{
        $name = $_POST['name'];
        $phno = $_POST['phno'];
        $email = $_POST['email'];
        $debt = $_POST['debt'];
        $address = $_POST['address'];
        $shipping_address = $_POST['delivery'];
        if(!empty($name) && !empty($phno) && !empty($email) && !empty($debt) && !empty($address) && !empty($shipping_address))
        {

            $customer = new CustomerController();
            $result = $customer->editCustomer($id,$name,$phno,$email,$debt,$address,$shipping_address);
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
<div class="container-fluid px-4 py-4">
<form method="post">
<h1 class="h3 mb-3 font-weight-normal">Customer Information Edition</h1><hr>   
<?php foreach($results as $result){ ?>                       
<div class="col">
<label for="name" >Name</label>
<input type="text" name="name" id="name" value="<?php echo $result['name']; ?>" class="form-control">
        
</div>

<div class="row">
<div class="col-md-6">
<label for="phno" >Phone number</label>
<input type="text" name="phno" id="phno" value="<?php echo $result['phone']; ?>" class="form-control">                                      
</div>

<div class="col-md-6">
<label >Email</label>
<input type="text" name="email" id="email" value="<?php echo $result['email']; ?>" class="form-control" >                                      
</div>
</div>

<div class="col">
<label >Most Acceptable Debt</label>
<input type="text" name="debt" id="debt" class="form-control" value="<?php echo $result['max_debt']; ?>" >                                       
</div>

<div class="row">
<div class="col-md-6">
<label for="address">Address</label>
<textarea name="address" id="address" class="form-control" ><?php echo $result['address']; ?></textarea>
</div>

<div class="col-md-6">
<label for="delivery">Shipping Address</label>
<textarea name="delivery" id="delivery"  class="form-control" ><?php echo $result['ship_address']; ?></textarea>                                    
</div>
</div>
<?php } ?>
<button name="submit" class="btn btn-primary my-3 mx-1" type="submit">Update</button>
<a name="cancel" class="btn btn-danger my-3 mx-1" href="customerindex.php">Cancel</a>
</form>
</div>             
</main>
<?php include_once 'masterlayouts/footer.php'?>