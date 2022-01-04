

        <?php 
        include_once 'masterlayouts/header.php';
        include_once 'controller/customer_controller.php';
        $cusController = new CustomerController();
        $results = $cusController->showCustomer();
        
        ?>
        <div id="layoutSidenav">
        <?php include_once 'masterlayouts/sidebar.php';?>
      
        
        
            <div id="layoutSidenav_content">
                
                <main>
                    <div class="container-fluid px-4">
                        <div class="container py-3">
                        <a class="btn btn-success float-end" href="addstock.php">Add New Stock</a>
                        <a class="btn btn-warning mx-3 float-end" href="exportstock.php">Download</a>
                        </div>
                        
                        
                    </div>
                    
                </main>
                <?php include_once 'masterlayouts/footer.php'?>
            