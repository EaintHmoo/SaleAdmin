
<?php 
        include_once 'masterlayouts/header.php';
        include_once ('controller/yarn_controller.php');
        session_start();
        if(empty($_SESSION['email']))
        {
            header("location:login.php");
        }
        else
        {
            $email=$_SESSION['email'];
        }
    if(isset($_POST["submit"]))
    {
        
        if(empty($_POST['date']))
        {
            $date_error = "Please choose the date";
        }
        else{
            $date = $_POST['date'];
        }
        if(empty($_POST['quantity']))
        {
            $quantity_error = "Please enter quantity";
        }
        else{
            $quantity = $_POST['quantity'];
        }
        if(empty($_POST['price']))
        {
            $price_error = "Please enter the price";
        }
        else{
            $price = $_POST['price'];
        }
        
    }
?> 
<div id="layoutSidenav">
<?php include_once 'masterlayouts/sidebar.php';?>
<div id="layoutSidenav_content">
<main>
<div class="container-fluid px-4">
<form method="post" class="form-signin mt-5" method="post" style="border:2px solid black;padding:5px;border-radius:5px" >
        <h1 class="h3 mb-3 font-weight-normal">Adding Product Order</h1><hr>                               
        

<div class="row">
    <div class="col-4">
    <label >Customer Name</label>
    <select class="form-select" name="customer_name" id="customer_name" title="Choosing customer name">
    <option value="Mg Mg">Mg Mg</option>
    <option value="Aung Aung">Aung Aung</option>
    <option value="Hla Hla">Hla Hla</option>
    </select>
    </div>

    <div class="col-4">
    <label >Date</label>
    <input type="date" id="date" name="date" value="<?php if(isset($date)) echo $date;?>" class="form-control">
    <span style="color:red">
    <?php
    if(isset($date_error)){
    echo $date_error;
    }
    ?>
    </span>
    </div>

    <div class="col-4 pt-4">
        <a href="#" class="btn btn-success">To Add + </a>
    </div>
</div>

<div class="row">
    <div class="col-4">
        <div class="row">
            <div class="col-6">
            <label >Product Name</label>
            <select class="form-select" name="product_name" id="product_name" title="Choosing product name">
            <option value="yoe yoe">Yoe Yoe</option>
            <option value="tai">Tai</option>
            <option value="kone lone">Kone Lone</option>
            </select>
            </div>
            <div class="col-6">
            <label >Unit</label>
            <select class="form-select" name="unit" id="unit" title="Unit">
            <option value="1">1</option>
            </select>
            </div>
        </div>
    </div>

    <div class="col-4">
    <div class="row">
            <div class="col-6">
            <label>Quantity</label>
            <input type="text" id="quantity" name="quantity" value="<?php if(isset($quantity)) echo $quantity;?>" class="form-control">
            <span style="color:red">
            <?php
            if(isset($quantity_error)){
            echo $quantity_error;
            }
            ?>
            </span>
            </div>
            <div class="col-6">
            <label>Price</label>
            <input type="text" id="price" name="price" value="<?php if(isset($price)) echo $price;?>" class="form-control">
            <span style="color:red">
            <?php
            if(isset($price_error)){
            echo $price_error;
            }
            ?>
            </span>
            </div>
        </div>
    </div>

    <div class="col-4">
    <div class="row">
            <div class="col-6">
            <label>Minimal Price</label>
            <input type="text" id="minimal_price" name="minimal_price" class="form-control" disabled>
            </div>
            <div class="col-6">
            <label>Total Price</label>
            <input type="text" id="total_price" name="total_price" class="form-control" disabled>
            </div>
        </div>
    </div>
</div>

<button name="submit" class="btn btn-primary my-3 mx-1" type="submit">Add</button>
<a name="cancel" class="btn btn-danger my-3 mx-1" href="#">Cancel</a>
</form>
</div>
</main> 
<?php include_once 'masterlayouts/footer.php';?>

            