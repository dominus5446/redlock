<?php
$servername = "172.18.0.2";
$username = "root";
$password = "1234";
$dbname = "redlock";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["ID"]. " - Name: " . $row["Nama"]. " " . $row["Alamat"]. "Jabatan: " . $row["Jabatan"]."<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>