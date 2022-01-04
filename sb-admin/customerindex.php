
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
                        <a class="btn btn-success float-end" href="addcustomer.php">Add New Customer</a>
                        <a class="btn btn-warning mx-3 float-end" href="exportcustomer.php">Download</a>
                        </div>
                        
                        <table class="table table-stripped">
                        <thead>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Phone</td>
                        <td>Max_Debt</td>
                        <td>Address</td>
                        <td>Shipping Address</td>
                        <td>Actions</td>
                        </thead>
                        <tbody id="tablebody">
                        <?php
                        foreach($results as $result){
                            echo "<tr>";
                            echo "<td>".$result['name']."</td>";
                            echo "<td>".$result['email']."</td>";
                            echo "<td>".$result['phone']."</td>";
                            echo "<td>".$result['max_debt']."</td>";
                            echo "<td>".$result['address']."</td>";
                            echo "<td>".$result['ship_address']."</td>";
                            echo "<td id=".$result['id'].">
                            <a href='view_customer.php?cid=".$result['id']."' class='btn btn-success'><i class='fa fa-eye'></i></a>
                            <a href='edit_customer.php?cid=".$result['id']."' class='btn btn-warning'><i class='fa fa-edit'></i></a>
                            <button class='btn btn-danger delete'><i class='fa fa-trash'></i></button>
                            </td>";
                            echo "</tr>";
                            
                        }
                        ?>
                        </tbody>
                        </table>
                    </div>
                    
                </main>
                <?php include_once 'masterlayouts/footer.php'?>
            