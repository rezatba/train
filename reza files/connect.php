<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mysite_db";
$db = new mysqli($servername, $username, $password, $dbname);
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
$query = "SELECT * FROM `user`";
$result = $db->query($query);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        //echo "id: " . $row["id"]. " - username: " . $row["username"]. "password: " . $row["password"]. "<br>";
        $username = $row["username"];
        $password = $row["password"];
    }
} else {
    echo "0 results";
}