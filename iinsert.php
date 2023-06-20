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
if(isset($_POST['btn']))
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





   if($type == "image/jpeg" || $type == "image/jpg" || $type == "image/png")
   {
if($size <= 1000000)
{
 $query ="insert into employee (id,Name,Email,Address,Image) values ('$id','$name','$email','$Add','$folder')";
 $res=mysqli_query($con,$query) or die ("Image Upload faild");
 echo "<script>alert('Image Uploaded Successfully.....')
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




?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>