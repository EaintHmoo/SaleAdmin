<?php 
include_once 'masterlayouts/header.php';
include_once 'controller/yarn_controller.php';
$id=$_GET['yid'];
$yarncontroller=new YarnController();
$results=$yarncontroller->showYarnSingleLine($id);

if(isset($_POST["submit"]))
    {
        $yarn_name = $_POST['yarn_name'];
        $yarn_type = $_POST['yarn_type'];
        if(!empty($yarn_name) && !empty($yarn_type))
        {

            $yarn = new YarnController();
            $result = $yarn->editYarn($id,$yarn_name,$yarn_type);
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
<form method='post'>
<h1 class="h3 mb-3 font-weight-normal">Editing Yarn Information</h1><hr>                               

<?php foreach($results as $result){?>
<div class="row">
<div class="col-md-6">
<label for="yarn_name" >Name</label>
<input type="text" name="yarn_name" id="yarn_name" value="<?php echo $result['yarn_name'];?>" class="form-control"  >                                      
</div>
<div class="col-md-6">
<label for="yarn_type" >Type</label>
<?php

$selection = array('yoe yoe','tai','kone lone');
echo '<select class="form-select" name="yarn_type" >';

foreach ($selection as $selection) {
    $selected = ($result['yarn_type'] == $selection) ? "selected" : "";
    echo '<option '.$selected.' value="'.$selection.'">'.$selection.'</option>';
}

echo '</select>';
?>
</div>
</div>
<?php }?>
<button name="submit" class="btn btn-primary my-3 mx-1" type="submit">Update</button>
<a name="cancel" class="btn btn-danger my-3 mx-1" href="yarnindex.php">Cancel</a>
</form>
</div>
</main> 
<?php include_once 'masterlayouts/footer.php';?>
