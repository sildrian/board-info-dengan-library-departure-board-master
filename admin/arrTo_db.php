<?php
//path foto
//$c=dirname(__FILE__).'\app\helper';



if(isset($_COOKIE['added'])){

	
	$tanggal= date("Y-m-d h:i:s");

	$allAdd = $_COOKIE['added'];

	if($allAdd == 0){
		$allAdd = 1;
	}

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


//$firstIsi[$i] = mysqli_real_escape_string($conn, $isi[$i]);

//$SemuaIsi = mysqli_real_escape_string ($conn, $isi[$i]);
$SemuaAdd = mysqli_real_escape_string ($conn, $allAdd);

//echo $SemuaAdd;
//$SemuaTanggal = mysqli_real_escape_string ($conn, $tanggal);

//echo $SemuaIsi[$i].",";
//echo $SemuaTanggal; 


//$lle = mysqli_real_escape_string ($conn, $isi[0]);

/*asli
$sqlArr = "INSERT INTO counter_info (hitung,tanggal_hit)
VALUES ('$SemuaAdd','$tanggal')";
*/

$sql = "SELECT id_info FROM info_board ORDER BY tanggal DESC LIMIT 1";
$query = mysqli_query($conn, $sql);

if (!$query) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}

$row = mysqli_fetch_row($query);

$info_id = $row[0];



$sqlArr = "INSERT INTO counter_info (hitung,tanggal_hit,id_info)
VALUES ('$SemuaAdd','$tanggal','$info_id')";

if ($conn->query($sqlArr) === TRUE) {

	echo "berhasilppp";

		} 

	//$conn->close();

}


?>