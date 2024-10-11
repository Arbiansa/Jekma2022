<?php
// Create connection
$conn = mysqli_connect("localhost", "root", "", "db_jekma");
// Check connection
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}
