<?php 
include_once 'masterlayouts/header.php';
include_once 'controller/customer_controller.php';
$id=$_GET['cid'];
$customercontroller=new CustomerController();
$results=$customercontroller->showCustomerSingleLine($id);

?>
<div id="layoutSidenav">
<?php include_once 'masterlayouts/sidebar.php';?>
      
        
        
<div id="layoutSidenav_content">
                
<main>
<div class="container-fluid px-4 py-4">
<form>
<h1 class="h3 mb-3 font-weight-normal">View Customer Information</h1><hr>   
<?php foreach($results as $result){ ?>                       
<div class="col">
<label for="name" >Name</label>
<input type="text" name="name" id="name" value="<?php echo $result['name']; ?>" class="form-control" disabled>
        
</div>

<div class="row">
<div class="col-md-6">
<label for="phno" >Phone number</label>
<input type="text" name="phno" id="phno" value="<?php echo $result['phone']; ?>" class="form-control" disabled>                                      
</div>

<div class="col-md-6">
<label >Email</label>
<input type="text" name="email" id="email" value="<?php echo $result['email']; ?>" class="form-control" disabled>                                      
</div>
</div>

<div class="col">
<label >Most Acceptable Debt</label>
<input type="text" name="debt" id="debt" class="form-control" value="<?php echo $result['max_debt']; ?>" disabled>                                       
</div>

<div class="row">
<div class="col-md-6">
<label for="address">Address</label>
<textarea name="address" id="address" class="form-control" disabled><?php echo $result['address']; ?></textarea>
</div>

<div class="col-md-6">
<label for="delivery">Shipping Address</label>
<textarea name="delivery" id="delivery"  class="form-control" disabled><?php echo $result['ship_address']; ?></textarea>                                    
</div>
</div>
<?php } ?>
<a  class="btn btn-success my-3 " href="customerindex.php">Back</a>
</form>
</div>             
</main>
<?php include_once 'masterlayouts/footer.php'?>