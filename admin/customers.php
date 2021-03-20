<?php 
session_start();
if($_SESSION['email']==true){

}else{
  header('location:admin_login.php');
}

?>
<?php include('includes/header.php');?>
<style>
    .fa-edit{
        color:#FDFAFA;
    }
    .fa-trash{
        color:#FDFAFA;
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
            </ol>
        </nav>
        <a href="admin_add.php" class="btn btn-success">Add admin</a>
          </div>
          <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>SL</th>
                <th>first name</th>
                <th>last name</th>
                <th>username</th>
                <th>email</th>
                <th>admin type</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include('connection/db.php');
            $query=mysqli_query($con,'SELECT admin_login.id,admin_login.last_name,
            admin_login.first_name,admin_login.username,admin_login.email,admin_roles.admin_role FROM admin_login 
            LEFT JOIN admin_roles          
            ON admin_roles.id=admin_login.admin_type');
            $result=mysqli_fetch_all($query,MYSQLI_ASSOC);
            // print_r($result);
            $i=1;
            foreach($result as $r){
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $r['first_name']?></td>
                <td><?php echo $r['last_name']?></td>
                <td><?php echo $r['username']?></td>
                <td><?php echo $r['email']?></td>
                <td><?php echo $r['admin_role']?></td>
                <td><a href="admin_edit_page.php?id=<?php echo $r['id']?>" class="btn btn-success"><i class="fas fa-edit"></i></a>
                <button class="btn btn-danger delete" id="<?php echo $r['id'] ?>" > <i class="fas fa-trash"></i></button>
                </td>

            </tr>
            <?php $i++; } ?>
        </tbody>
    </table>
        </main>
      </div>
    </div>

<?php include('includes/footer.php'); ?>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
    $('#example').DataTable();

    $(document).on("click",".delete",function(){  
                if (confirm("Are you sure delete this ?")) {  
                     var id = $(this).attr('id');    
                     $.ajax({  
                          url :"admin_delete.php",  
                          type:"POST",  
                          data:{deleteId:id},  
                          success:function(data){  
                            //    console.log(id);
                            console.log(id);
                          }  
                     });  
                }  
           });  
});
</script>
<!-- <script>
    $(document).ready(function() {
    $(".delete").click(function(){
        // e.preventDefault();
        let id=$(this).attr('id');
        $.ajax({
                type:'POST',
                url:'admin_delete.php',
                data:{del_id:id},
                success: function(data){
                    console.log('sad');
                    }

                })
    });
});
</script> -->
  </body>
</html>
