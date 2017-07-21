<?php
//path foto
//$c=dirname(__FILE__).'\app\helper';



if(isset($_POST['submit'])){

	//$judul = $_POST["judul"];

	//$allIsi =  explode(",", $_POST['isi']);

	$isi =  $_POST["isi"];
	//$gambar = $_FILES['userfile']['name'];
	$tanggal= date("Y-m-d h:i:s");

	//$allAdd = $_COOKIE['added'];

	//if($allAdd == 0){
	//	$allAdd = 1;
	//}
//print_r($isi);
$totl=count($isi);

//print_r(explode(',', $isi));
//echo $totl;

//$isiToDb = implode(", ",array_keys($isi));
//$escaped_values = array_map('mysql_real_escape_string', array_values($isi));
//echo $isi;

//$allIsi =  explode(",", $isi);

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


for($i=0;$i<$totl;$i++){
//$firstIsi[$i] = mysqli_real_escape_string($conn, $isi[$i]);

$SemuaIsi = mysqli_real_escape_string ($conn, $isi[$i]);
//$SemuaAdd = mysqli_real_escape_string ($conn, $allAdd);

//echo $SemuaAdd;
//$SemuaTanggal = mysqli_real_escape_string ($conn, $tanggal);

//echo $SemuaIsi[$i].",";
//echo $SemuaTanggal; 


//$lle = mysqli_real_escape_string ($conn, $isi[0]);

$sql = "INSERT INTO info_board (isi, tanggal)
VALUES ('$SemuaIsi','$tanggal')";

if ($conn->query($sql) === TRUE) {


	//$destination='c:\data'."\\".$_FILES['userfile']['name'];
	//$destination='c:\xampp\htdocs\Government_Template\upload\gambar'."\\".$_FILES['userfile']['name'];
	//$destination='c:\xampp\htdocs\Government_Template\upload\gambar'."\\".$gambar;
	
	//$temp_file = $_FILES['userfile']['tmp_name'];
	//move_uploaded_file($temp_file,$destination);
	
	//echo "berhasil".$i;

	
	//header("Location: index.php");
	//exit();
		}

	} 

	require_once ("arrTo_db.php");

	$conn->close();

	header("Location: index.php");
	
    //echo "New record created successfully";
	//}


}

?>