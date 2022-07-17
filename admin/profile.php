<?php include_once('includes/db.php'); ?>

<?php include_once('includes/header.php'); ?>


    <div id="wrapper">

        <!-- Navigation -->
        <?php include_once('includes/navigation.php'); ?>
            <!-- /.navbar-collapse -->


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                        Welcome to admin
                            <small> <?php echo $_SESSION['username'];?></small>
                        </h1>
                       
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   
<?php include_once('includes/footer.php'); ?>