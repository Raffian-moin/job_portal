<?php 
session_start();
include('connection/db.php');
if($_SESSION['email']==true){

}else{
  header('location:admin_login.php');
}

?>
<?php include('includes/header.php');?>
<style>
  .error{
    color:red;
  }
</style>

    <div class="container-fluid">
      <div class="row">
        <?php include('includes/sidebar.php');?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="admin_dashboard.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="customers.php">customers</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="admin_add.php">Add customers</a></li>
            </ol>
        </nav>
        <a href="adminadd.php" class="btn btn-success">Add admin</a>
          </div>

          <div class="col-6">
          <h1 class="text-center">Edit admin</h1>
          <form id="admin-form" method="POST" action="admin_edit.php">
  <?php
  $id=$_GET['id'];
  $query=mysqli_query($con,"select * from admin_login where id='$id'");
  $result=mysqli_fetch_array($query);
  ?>
  <div class="form-group">
  <label for="exampleInputEmail1">First name</label>
    <input type="text" name="firstName" class="form-control" id="firstName" aria-describedby="emailHelp" value="<?php echo $result['first_name'];?>">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Last name</label>
    <input type="text" name="lastName" class="form-control" id="lastName" value="<?php echo $result['last_name'];?>">
  </div>
  <div class="form-group">
  <label for="exampleInputEmail1">Username</label>
    <input type="text" name="userName" class="form-control" id="userName" aria-describedby="emailHelp" value="<?php echo $result['username'];?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="emial" aria-describedby="emailHelp" value="<?php echo $result['email'];?>">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="password" value="<?php echo $result['password'];?>">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Example select</label>
    <select name="admintype" class="form-control" id="admintype">

      <!-- add admin role from database -->
      <?php 
      $query=mysqli_query($con,"select * from admin_roles");
      $myresult=mysqli_fetch_all($query,MYSQLI_ASSOC);
      foreach($myresult as $role){
      ?>
      <option value="<?php echo $role['id'] ?>" <?php if($result['admin_type']==$role['id']){echo "selected";}?>><?php echo $role['admin_role']; ?></option>
      <?php } ?>
      <!-- add admin role from database -->

    </select>
  </div>
  <input type="hidden" name="id" value="<?php echo $result['id'];?>">
  <button id="submit" type="submit" class="btn btn-primary">Submit</button>
</form>
          </div>

        </main>
      </div>
    </div>

<?php include('includes/footer.php'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<!-- <script src="js/login-validation.js"></script> -->
<script>
  $(document).ready(function(){
    $('#admin-form').validate({
        rules: {
          firstName: {
            required: true,
          },
          lastName: {
            required: true,
          },
          userName: {
            required: true,
          },
          email: {
            required: true,
            email: true
          },
          password: {
            required: true,
          },
          admintype:{
            required:true,
          }
        },
        messages: {
          firstName: {
            required: 'Please enter first name.',
          },
          lastName: {
            required: 'Please enter last name.',
          },
          userName: {
            required: 'Please enter username.',
          },
          email: {
            required: 'Please enter Email Address.',
            email: 'Please enter a valid Email Address.',
          },
          password: {
            required: 'Please enter Password.',
          },
          admintype: {
            required: 'Please select a option.',
          }
        },
        submitHandler: function (form) {
          form.submit();
        }
      });
  });
</script>

  </body>
</html>
