

        <?php include_once 'masterlayouts/header.php';
        session_start();
        if(empty($_SESSION['email']))
        {
            header("location:login.php");
        }
        else
        {
            $email=$_SESSION['email'];
        }
        ?>
        <div id="layoutSidenav">
        <?php include_once 'masterlayouts/sidebar.php';?>
      
        
        
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        
                        
                    </div>
                </main>
                <?php include_once 'masterlayouts/footer.php'?>
            