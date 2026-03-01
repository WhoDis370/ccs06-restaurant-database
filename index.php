<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully <br>";
?>

<?php
$sql = "SELECT * FROM Products";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div style='border:1px solid #ccc; padding:15px; width:200px; display:inline-block; margin:10px; text-align:center;'>";
    
        echo "<img src='" . $row["ImagePath"] . "' width='150' height='150'><br>";
        echo "<h3>" . $row["Name"] . "</h3>";
        echo "<p>$" . $row["Price"] . "</p>";
    
        echo "</div>";
    }
}
?>