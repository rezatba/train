<?php
session_start();
if (!(isset($_SESSION['user_type']) && $_SESSION['user_type']=="admin")){
    header("location:https://google.com");
}
include 'header.php';
require 'connect.php';
if (isset($_GET['submit'])){
    $pro_name = $_GET['pro_name'];
    $pro_info = $_GET['pro_info'];
    $query = "INSERT INTO product (id, pro_name, pro_info)VALUES (null, '$pro_name', '$pro_info')";
}



?>
<div class="mainForm" style="position: relative; width: 500px">
    <form action="" method="get">
        <label for="pro_name">نام محصول:</label>
        <input id="pro_name" type="text" name="pro_name" required placeholder="نام">
        <br>
        <label style="display: inline" for="pro_info">توضیحات:</label>
        <textarea style="display: inline; resize: none" name="pro_info" id="pro_info" cols="30" required placeholder="توضیحات" rows="10"></textarea>
        <input name="submit" type="submit" value="ثبت محصول" style="display: block; position: absolute; left: 0">
    </form>
</div>
<?php
if ($db->query($query) === true){
    echo "کالا با موفقیت ذخیره شد";
}
?>












<?php
include 'footer.php';
?>
