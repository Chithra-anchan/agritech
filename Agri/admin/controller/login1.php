<?php
require '../../config.php';
$control = new Controller();
$admin = new Admin();

if(isset($_POST['login']))
{
    $email=$_POST['email'];
    $pass=$_POST['password'];

    $stmt=$admin->ret("SELECT * FROM `admin` WHERE `aemail`='$email' AND `apass`='$pass'");

    $num = $stmt->rowCount();
    if($num>0)
    {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $id = $row['aid'];
        $_SESSION['aid']=$id;

        echo"<script>
        alert('Login Successfull');
        window.location='../html/index.php';</script>";
    }

    else
    {
        echo"<script>
        alert('Invalid Email or Password');
        window.location='../html/login.php';</script>";
    }
}
?>