<?php
session_start();
include("connect.php");
$mobile = $_POST['mobile'];
$password = $_POST['password'];
$role1=$_POST['role'];
$check = mysqli_query($connect,"SELECT*FROM `user`WHERE`mobile`='$mobile'AND`password`='$password' AND `role`='$role1'");
if(mysqli_num_rows($check)>0){
    $userdata=mysqli_fetch_array($check);
    $groups=mysqli_query($connect,"SELECT*FROM `user`WHERE `role`=2");
    $groupsdata=mysqli_fetch_all($groups,MYSQLI_ASSOC);
    $_SESSION['userdata'] = $userdata;
    $_SESSION['groupsdata'] = $groupsdata;
    echo'
    <script>
    window.location ="../dasboard1.php";
    </script>';

}
else {
    echo'
    <script>
    alert("invalid creadential");
    window.location ="../";
    </script>';
}
?>
 