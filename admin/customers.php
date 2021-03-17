<?php 
session_start();
if($_SESSION['email']==true){

}else{
  header('location:admin_login.php');
}

?>
<?php include('includes/header.php');?>

    <div class="container-fluid">
      <div class="row">
        <?php include('includes/sidebar.php');?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="admin_dashboard.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="customers.php">customers</a></li>
            </ol>
        </nav>
          </div>
        </main>
      </div>
    </div>

<?php include('includes/footer.php'); ?>
  </body>
</html>
