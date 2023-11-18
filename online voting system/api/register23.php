<?php

include("connect.php");
if($_SERVER["REQUEST_METHOD"]=="POST"){
$name = $_POST['name'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$address= $_POST['address'];
$image= $_FILES['photo']['name'];
$tmp_name = $_FILES['photo']['tmp_name'];
$role1=$_POST['role'];
}
if ( $password==$cpassword){
    move_uploaded_file($tmp_name,"../uploads/".$image);
   $sql="INSERT INTO `user` ( `id`,`name`, `mobile`, `password`, `address`,`photo`,`role`,`status`,`votes`) VALUES ('','$name', '$mobile', '$password','$address','$image','$role1',0,0)";
    $result = mysqli_query($connect,$sql);
    if($result){

        echo'
        <script>
        alert("registration successful");
        window.location ="../";
        </script>';
    }else{
    echo'
    <script>
    alert("some error occured");
    window.location ="../register.html";
    </script>';
}
}
else{
    echo'
    <script>
    alert("password and cpasword does not match!");
    window.location ="../register.html";
    </script>';
}
?>