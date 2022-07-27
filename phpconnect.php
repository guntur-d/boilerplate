<html>
<head>
<title>Test PHP Connection Script</title>
</head>
<body>

<h3>Welcome to the PHP Connect Test</h3>

<?php
$dbname = 'mLLrkupzOI';
$dbuser = 'mLLrkupzOI';
$dbpass = 'ROeAsocsD9';
$dbhost = 'remotemysql.com:3306';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
mysqli_close($conn);


 
// // mysqli_select_db($dbname) or die("Could not open the database '$dbname'");
// $result = mysqli_query($conn, "SELECT id, name FROM employees");
//  while ($row = mysqli_fetch_array($result)) {
//      printf("ID: %s  Name: %s <br>", $row[0], $row[1]);
// }
?>

</body>
</html>