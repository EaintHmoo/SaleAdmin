
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

        $yarn_controller=new YarnController();
        $results=$yarn_controller->showYarn();

    if(isset($_POST["submit"]))
    {
        if(empty($_POST['product_name']))
        {
            $product_name_error = "Please choose the product name";
        }
        else{
            $product_name = $_POST['product_name'];
        }
        if(empty($_POST['date']))
        {
            $date_error = "Please choose the date";
        }
        else{
            $date = $_POST['date'];
        }
        if(empty($_POST['market_price_htok']))
        {
            $market_price_htok_error = "Please enter the market price";
        }
        else{
            $market_price_htok = $_POST['market_price_htok'];
        }
        if(empty($_POST['market_price_parkin']))
        {
            $market_price_parkin_error = "Please enter the market price";
        }
        else{
            $market_price_parkin = $_POST['market_price_parkin'];
        }
        if(empty($_POST['market_price_pound']))
        {
            $market_price_pound_error = "Please enter the market price";
        }
        else{
            $market_price_pound = $_POST['market_price_pound'];
        }
        if(empty($_POST['minimal_price_htok']))
        {
            $minimal_price_htok_error = "Please enter the minimal price";
        }
        else{
            $minimal_price_htok = $_POST['minimal_price_htok'];
        }
        if(empty($_POST['minimal_price_parkin']))
        {
            $minimal_price_parkin_error = "Please enter the minimal price";
        }
        else{
            $minimal_price_parkin = $_POST['minimal_price_parkin'];
        }
        if(empty($_POST['minimal_price_pound']))
        {
            $minimal_price_pound_error = "Please enter the minimal price";
        }
        else{
            $minimal_price_pound = $_POST['minimal_price_pound'];
        }
        if(empty($_POST['stock_htok']))
        {
            $stock_htok_error = "Please the stock";
        }
        else{
            $stock_htok = $_POST['stock_htok'];
        }
        if(empty($_POST['stock_parkin']))
        {
            $stock_parkin_error = "Please the stock";
        }
        else{
            $stock_parkin = $_POST['stock_parkin'];
        }
        if(empty($_POST['stock_pound']))
        {
            $stock_pound_error = "Please the stock";
        }
        else{
            $stock_pound = $_POST['stock_pound'];
        }
    }
?> 
<div id="layoutSidenav">
<?php include_once 'masterlayouts/sidebar.php';?>
<div id="layoutSidenav_content">
<main>
<div class="container-fluid px-4">
<form method="post" class="form-signin mt-5" method="post" style="border:2px solid black;padding:5px;border-radius:5px" >
        <h1 class="h3 mb-3 font-weight-normal">Adding Stock</h1><hr>                               
        

<div class="row">
<div class="col-md-6">
<label >Product Name</label>
<select class="form-select" name="product_name" id="product_name" title="Choosing product name">
<option>Choose Product</option>
<?php
    foreach($results as $result)
    {
        echo "<option value='".$result['id']."'>".$result['yarn_name']."</option>";
    }
?>
</select>
<span style="color:red"> 
<?php
if(isset($product_name_error)){
echo $product_name_error;
}
?>
</span>
</div>
<div class="col-md-6">
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

<div class="row">
    <div class="col-4">
    <label>Market price(Htok)</label>
    <input type="text" id="market_price_htok" name="market_price_htok" value="<?php if(isset($market_price_htok)) echo $market_price_htok;?>" class="form-control" placeholder=0>
    <span style="color:red">
    <?php
    if(isset($market_price_htok_error)){
    echo $market_price_htok_error;
    }
    ?>
    </span>
    </div>

    <div class="col-4">
    <label>Market price(Parkin)</label>
    <input type="text" id="market_price_parkin" name="market_price_parkin" value="<?php if(isset($market_price_parkin)) echo $market_price_parkin;?>" class="form-control" placeholder=0>
    <span style="color:red">
    <?php
    if(isset($market_price_parkin_error)){
    echo $market_price_parkin_error;
    }
    ?>
    </span>
    </div>

    <div class="col-4">
    <label>Market price(pound)</label>
    <input type="text" id="market_price_pound" name="market_price_pound" value="<?php if(isset($market_price_pound)) echo $market_price_pound;?>" class="form-control" placeholder=0>
    <span style="color:red">
    <?php
    if(isset($market_price_pound_error)){
    echo $market_price_pound_error;
    }
    ?>
    </span>
    </div>
</div>

<div class="row">
    <div class="col-4">
    <label>Minimal price(Htok)</label>
    <input type="text" id="minimal_price_htok" name="minimal_price_htok" value="<?php if(isset($minimal_price_htok)) echo $minimal_price_htok;?>" class="form-control" placeholder=0>
    <span style="color:red">
    <?php
    if(isset($minimal_price_htok_error)){
    echo $minimal_price_htok_error;
    }
    ?>
    </span>
    </div>

    <div class="col-4">
    <label>Minimal price(Parkin)</label>
    <input type="text" id="minimal_price_parkin" name="minimal_price_parkin" value="<?php if(isset($minimal_price_parkin)) echo $minimal_price_parkin;?>" class="form-control" placeholder=0>
    <span style="color:red">
    <?php
    if(isset($minimal_price_parkin_error)){
    echo $minimal_price_parkin_error;
    }
    ?>
    </span>
    </div>

    <div class="col-4">
    <label>Minimal price(pound)</label>
    <input type="text" id="minimal_price_pound" name="minimal_price_pound" value="<?php if(isset($minimal_price_pound)) echo $minimal_price_pound;?>"  class="form-control" placeholder=0>
    <span style="color:red">
    <?php
    if(isset($minimal_price_pound_error)){
    echo $minimal_price_pound_error;
    }
    ?>
    </span>
    </div>
</div>

<div class="row">
    <div class="col-4">
    <label>Stock(Htok)</label>
    <input type="text" id="stock_htok" name="stock_htok" value="<?php if(isset($stock_htok)) echo $stock_htok;?>"  class="form-control" placeholder=0>
    <span style="color:red">
    <?php
    if(isset($stock_htok_error)){
    echo $stock_htok_error;
    }
    ?>
    </span>
    </div>

    <div class="col-4">
    <label>Stock(Parkin)</label>
    <input type="text" id="stock_parkin" name="stock_parkin" value="<?php if(isset($stock_parkin)) echo $stock_parkin;?>"  class="form-control" placeholder=0>
    <span style="color:red">
    <?php
    if(isset($stock_parkin_error)){
    echo $stock_parkin_error;
    }
    ?>
    </span>
    </div>

    <div class="col-4">
    <label>Stock(pound)</label>
    <input type="text" id="stock_pound" name="stock_pound" value="<?php if(isset($stock_pound)) echo $stock_pound;?>"  class="form-control" placeholder=0>
    <span style="color:red">
    <?php
    if(isset($stock_pound_error)){
    echo $stock_pound_error;
    }
    ?>
    </span>
    </div>
</div>
</div>
<button name="submit" class="btn btn-primary my-3 mx-1" type="submit">Add</button>
<a name="cancel" class="btn btn-danger my-3 mx-1" href="#">Cancel</a>
</form>
</div>
</main> 
<?php include_once 'masterlayouts/footer.php';?>

            