
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
        if(empty($_POST['yarn_name']))
        {
            $yarn_name_error = "Please enter the name of yarn";
        }
        else{
            $yarn_name = $_POST['yarn_name'];
        }
        if(empty($_POST['yarn_type']))
        {
            $yarn_type_error = "Please enter the type of yarn";
        }
        else{
            $yarn_type = $_POST['yarn_type'];
        }
        $yarn_name = $_POST['yarn_name'];
        $yarn_type = $_POST['yarn_type'];
        if(!empty($yarn_name) && !empty($yarn_type))
        {

            $yarn = new YarnController();
            $result = $yarn->addYarn($yarn_name,$yarn_type);
            if($result)
            {
                exit(header("location:yarnindex.php"));

            }
        }
        
    }
?> 
<div id="layoutSidenav">
<?php include_once 'masterlayouts/sidebar.php';?>
<div id="layoutSidenav_content">
<main>
<div class="container-fluid px-4">
<form method="post" class="form-signin mt-5" method="post" style="border:2px solid black;padding:5px;border-radius:5px" >
        <h1 class="h3 mb-3 font-weight-normal">Adding New Yarn</h1><hr>                               
        

                                        <div class="row">
                                        <div class="col-md-6">
                                        <label for="yarn_name" >Name</label>
                                        <input type="text" name="yarn_name" id="yarn_name" value="<?php if(isset($yarn_name)) echo $yarn_name;?>" class="form-control" >
                                        <span style="color:red"> 
                                        <?php
                                        if(isset($yarn_name_error)){
                                            echo $yarn_name_error;
                                        }
                                        ?>
                                        </span>
                                        </div>
                                        <div class="col-md-6">
                                        <label for="yarn_type" >Type</label>
                                        <select class="form-select" name="yarn_type" id="yarn_type">
                                        <option value="yoe yoe" selected>Yoe Yoe</option>
                                        <option value="tai">Tai</option>
                                        <option value="kone lone">Kone Lone</option>
                                        </select>
                                        <span style="color:red">
                                        <?php
                                        if(isset($yarn_type_error)){
                                            echo $yarn_type_error;
                                        }
                                        ?>
                                        </span>
                                        </div>
                                        </div>
<button name="submit" class="btn btn-primary my-3 mx-1" type="submit">Add</button>
<a name="cancel" class="btn btn-danger my-3 mx-1" href="yarnindex.php">Cancel</a>
</form>
</div>
</main> 
<?php include_once 'masterlayouts/footer.php';?>

            