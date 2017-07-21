<?php

$temp =$_POST["hapus"];

?>



<!DOCTYPE>
<html>
<head>
	<link href="../css/bootstrap.min.css" rel="stylesheet" />
<!--w3 core -->
<link href="../css/w3.css" rel="stylesheet" type="text/css" />
</head>

<body onload="document.getElementById('id01').style.display='block'">

<div id="id01" class="w3-modal">
    <div class="w3-modal-content">
      <header class="w3-container w3-teal"> 
        <!--<span onclick="document.getElementById('id01').style.display='none'" 
        class="w3-closebtn">&times;</span>-->
        <h2>Modal Header</h2>
      </header>
      <div class="w3-container">

        <form enctype="multipart/form-data" action="<?php $_SERVER['PHP_SELF'] ?>" method="post" accept-charset="utf-8">
		    <div class="w3-btn">
		           <input type="hidden" name="hapus" value="yes" />
		           <?php $_SESSION['angka']=1 ?>
		           <input type="submit" name="submit" class="btn btn-info" value="Yes"/>
		        
		    </div>
		</form>
  		<form enctype="multipart/form-data" action="<?php $_SERVER['PHP_SELF'] ?>" method="post" accept-charset="utf-8">
		    <div class="w3-btn">
		           <input type="hidden" name="hapus" value="no" />
		           <?php $_SESSION['angka']=1 ?>
		           <input type="submit" name="submit" class="btn btn-info" value="No"/>
		        
		    </div>
		</form>
      </div>
      <footer class="w3-container w3-teal">
        <p>Modal Footer</p>
      </footer>
    </div>
  </div>
</body>
</html>



<?php

include ("daftar_data.php");

if($_SESSION['angka']!=0 ){
//else {
	# code...
//if($_SESSION['lolos'] == 1){
switch($_POST['hapus']) {

		case 'no':
		//if($_POST["cancel"] == "benar"){
		$_SESSION['benar'] = "salahDel";
		//$conn->close();
		//header("Location: index.php");
		//exit();

		 echo '<script>
		      		window.location.href = "index.php";
		  		</script>';
		 exit();
		//echo "Gstring";
		//} 
		break;
	
	case 'yes':

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

if (isset($_GET['Bid'])){
	$targetID=$_GET['Bid'];
	//var_dump($targetID);
// This first query is just to get the total count of rows 

//$sql = "SELECT judul,isi,,headline,kategori,gambar FROM gov_multi_berita WHERE id='".$targetID."' LIMIT 1";

$sql = "DELETE FROM info_board WHERE id_info='$targetID'";
//$query = mysqli_query($conn, $sql);

//$query=$conn->query($sql);

//var_dump($query);
if ($conn->query($sql) === TRUE) {
	//require_once ("");
	
	$_SESSION['benar']="benarDel";
	
	$conn->close();
	//header("Location: index.php");
	echo '<script>
		      		window.location.href = "index.php";
		  		</script>';
	exit();
		}

	}

  }

}

//}
?>