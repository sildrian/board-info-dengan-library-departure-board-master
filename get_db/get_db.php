<?php
//header("Content-type: text/javascript");

$host = "localhost";
		$user= "root";
		$password = "";
		$dbname = "db_info";

		// Create connection
		$conn = new mysqli($host, $user, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 

$sql = "SELECT hitung FROM counter_info ORDER BY tanggal_hit DESC LIMIT 1";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_row($query);

$limit = $row[0];

$sql2 = "SELECT isi, tanggal FROM info_board ORDER BY tanggal DESC LIMIT $limit";
$query2 = mysqli_query($conn, $sql2);

if (!$query2) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}


while($row2 = mysqli_fetch_array($query2, MYSQLI_ASSOC)){

$isi_all[] = $row2["isi"];

}

?>