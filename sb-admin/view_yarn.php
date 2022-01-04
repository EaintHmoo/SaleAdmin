<?php 
include_once 'masterlayouts/header.php';
include_once 'controller/yarn_controller.php';
$id=$_GET['yid'];
$yarncontroller=new YarnController();
$results=$yarncontroller->showYarnSingleLine($id);
?>

<div id="layoutSidenav">
<?php include_once 'masterlayouts/sidebar.php';?>
<div id="layoutSidenav_content">
<main>
<div class="container-fluid px-4">
<form>
<h1 class="h3 mb-3 font-weight-normal">View Yarn Information</h1><hr>                               

<?php foreach($results as $result){?>
<div class="row">
<div class="col-md-6">
<label for="yarn_name" >Name</label>
<input type="text" name="yarn_name" id="yarn_name" value="<?php echo $result['yarn_name'];?>" class="form-control" disabled >                                      
</div>
<div class="col-md-6">
<label for="yarn_type" >Type</label>
<?php

$selection = array('yoe yoe','tai','kone lone');
echo '<select class="form-select" name="yarn_type" disabled>';

foreach ($selection as $selection) {
    $selected = ($result['yarn_type'] == $selection) ? "selected" : "";
    echo '<option '.$selected.' value="'.$selection.'">'.$selection.'</option>';
}

echo '</select>';
?>
</div>
</div>
<?php }?>
<a class="btn btn-success my-3 mx-1" href="yarnindex.php">Back</a>
</form>
</div>
</main> 
<?php include_once 'masterlayouts/footer.php';?>
