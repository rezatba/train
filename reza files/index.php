<?php
/*if (isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
}*/
session_start();
include 'header.php';
require 'connect.php';   //php
if (isset($_POST['submit'])){
    if ($_POST['username'] == $username && $_POST['password']){
        header("location:http://localhost/admin.php");
        $_SESSION['user_type'] = "admin";
    }
}
?>

<div class="mainForm" style="position: relative">
    <form action="" method="post">
        <label for="username">نام کاربری:</label>
        <input id="username" type="text" name="username" required placeholder="نام کاربری">
        <br>
        <label for="password">رمز عبور:</label>
        <input id="password" type="password" name="password" required placeholder="رمز عبور">
        <input name="submit" type="submit" value="ورود" style="display: block; position: absolute; left: 0">
        <!--<button type="submit"></button>-->
    </form>
</div>
<br>
<?php
include 'footer.php';
?>
