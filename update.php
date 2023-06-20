<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <?php

$con=   mysqli_connect('localhost','root','','images') or die ("Connection failed");


  $id =$_GET['id']??"";
  $name =$_GET['name']??"";
  $email =$_GET['email']??"";
  $address =$_GET['add']??"";
  
  
  $query ="select * from employee where id = '$id' " ;
 $res= mysqli_query($con,$query) or die ("failed");
 $data=mysqli_fetch_assoc($res);
// print_r($data);

 ?>

 <h2 class="bg-warning text-white text-center col-md-4 mt-3 rounded">Update  EMPLOYEE DATA</h2>
 <form action="update.php" method="POST" class="col-md-4" enctype="multipart/form-data">
   <label for="">Emp_Id</label>
   <input type="number" name="id" class="form-control"  value="<?php echo $id;?>" id="">
   <label for="">Emp_Name</label>
   <input type="text" name="name" class="form-control" value="<?php echo $name;?>"required id="">
   <label for="">Email</label>
   <input type="email" name="email" class="form-control" value="<?php echo $email;?>"required id="">
   <label for="">Address</label>
   <input type="text" name="add" class="form-control" value="<?php echo $address;?>"required id="">
<?php

if (!is_null($data) && !empty($data)){
    echo "<img src='$data[Image]' height='80' width='30%'>";
}

?>
   <input type="file" name="img" class="form-control mt-3" id="">
   <input type="submit" value="UpdateData" class="btn btn-info btn-block mt-3" name="btn1">
 </form>

<?php
if(isset($_POST['btn1']))
{
    $id= $_POST['id'];
    $name= $_POST['name'];
    $email= $_POST['email'];
    $Add= $_POST['add'];
    $imgname= $_FILES['img']['name'];
    $type= $_FILES['img']['type'];
    $tmpname= $_FILES['img']['tmp_name'];
    $size= $_FILES['img']['size'];
    $folder=  "images/" .$imgname;
if(is_uploaded_file($_FILES['img']['tmp_name']))
{
    // echo "File Created";


   
 
 
 
 
 
    if($type == "image/jpeg" || $type == "image/jpg" || $type == "image/png")
    {
 if($size <= 1000000)
 {
  $query ="update employee set Name = '$name',Email='$email',Address='$Add',Image = '$folder' where id = '$id'";
  $res=mysqli_query($con,$query) or die ("Data Updation faild");
  echo "<script>alert('Data Updated Successfully.....')
  window.location.href='view.php';
  
  
  </script>";
  move_uploaded_file($tmpname,$folder);
  echo "<img src='$folder'  width='40%' height='300px'>";
 
 
 }
 
 else
 {
     echo "<script>alert('Image size should be 1mb')
     window.location.href='form.html';
     </script>";
 
 }
 
 
    }
    else{
     echo "<script>alert('Image type doesnt supported')
     window.location.href='form.html';
     
     </script>";
    }

}

else
{

    $query ="update employee set Name = '$name',Email='$email',Address='$Add',Image = '$folder' where id = '$id'";
  $res=mysqli_query($con,$query) or die ("Data Updation faild");
  echo "<script>alert('Data Updated Successfully.....')
  window.location.href='view.php';
  
  
  </script>";
  move_uploaded_file($tmpname,$folder);
  echo "<img src='$folder'  width='40%' height='300px'>";
}
}





?>





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>