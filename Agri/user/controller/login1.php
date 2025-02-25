<?php
require '../../config.php';
$control = new Controller();
$admin = new Admin();

if(isset($_POST['login']))
{
    $email=$_POST['email'];
    $pass=$_POST['password'];

    $stmt=$admin->ret("SELECT * FROM `user` WHERE `u_email`='$email' AND `u_pass`='$pass'");

    $num = $stmt->rowCount();
    if($num>0)
    {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $id = $row['u_id'];
        $_SESSION['u_id']=$id;

        echo"<script>
        alert('Login Successfull');
        window.location='../index.php';</script>";
    }

    else
    {
        echo"<script>
        alert('Invalid Email or Password');
        window.location='./login.php';</script>";
    }
}
?>