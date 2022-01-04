

        <?php 
        include_once 'masterlayouts/header.php';
        include_once 'controller/yarn_controller.php';
        $yarnController = new YarnController();
        $results = $yarnController->showYarn();
        
        ?>
        <div id="layoutSidenav">
        <?php include_once 'masterlayouts/sidebar.php';?>
        <div id="layoutSidenav_content">
                
                <main>
                    <div class="container-fluid px-4">
                        <div class="container">
                        <a class="btn btn-success float-end" href="addyarn.php">Add New Yarn</a>
                        </div>
                        
                        <table class="table table-stripped">
                        <thead>
                        <td>Name</td>
                        <td>Type</td>
                        <td>Action</td>
                        </thead>
                        <tbody>
                        <?php
                        foreach($results as $result){
                            echo "<tr>";
                            echo "<td>".$result['yarn_name']."</td>";
                            echo "<td>".$result['yarn_type']."</td>";
                            echo "<td>
                            <a href='view_yarn.php?yid=".$result['id']."' class='btn btn-success'><i class='fa fa-eye'></i></a>
                            <a href='edit_yarn.php?yid=".$result['id']."' class='btn btn-warning'><i class='fa fa-edit'></i></a>
                            <button class='btn btn-danger ydelete'><i class='fa fa-trash'></i></button>
                            </td>";
                            echo "</tr>";
                        }
                        ?>
                        </tbody>
                        </table>
                    </div>
                    
                </main>
                <?php include_once 'masterlayouts/footer.php'?>
            