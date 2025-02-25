<?php
session_start();
session_destroy();
unset($_SESSION['u_id']);
echo"<script>
alert('Logout Successfully');
window.location='../user/index.php'
</script>";
?>