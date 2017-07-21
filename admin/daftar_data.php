<?php
// Script and tutorial written by Adam Khoury @ developphp.com
// Line by line explanation : youtube.com/watch?v=T2QFNu_mivw
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

// This first query is just to get the total count of rows
$sql = "SELECT COUNT(isi) FROM info_board";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_row($query);
// Here we have the total row count
//var_dump($row);
$rows = $row[0];
// This is the number of results we want displayed per page
$page_rows = 5;
$total_pages = $page_rows;
// This tells us the page number of our last page
$last = ceil($rows/$page_rows);
// This makes sure $last cannot be less than 1
if($last < 1){
	$last = 1;
}
// Establish the $pagenum variable
$pagenum = 1;
// Get pagenum from URL vars if it is present, else it is = 1

if(isset($_GET['pn'])){
	$pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
	//var_dump($pagenum);
}
// This makes sure the page number isn't below 1, or more than our $last page
if ($pagenum < 1) { 
    $pagenum = 1; 
} else if ($pagenum > $last) { 
    $pagenum = $last; 
}
// This sets the range of rows to query for the chosen $pagenum
$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
//var_dump($limit);
// This is your query again, it is for grabbing just one page worth of rows by applying $limit

	/*
	if(isset($_GET['id'])){
	//$id=$_GET['id'];
	$id=preg_replace('#[^0-9]#i','',$_GET['id']);
	*/

$sql = "SELECT * FROM info_board ORDER BY tanggal DESC $limit";
$query = mysqli_query($conn, $sql);
// This shows the user what page they are on, and the total number of pages
$textline1 = "Testimonials (<b>$rows</b>)";
$textline2 = "Page <b>$pagenum</b> of <b>$last</b>";
// Establish the $paginationCtrls variable
$paginationCtrls = '';
$awal=1;

//var_dump($last);
// If there is more than 1 page worth of results
if($last != 1){
	/* First we check if we are on page one. If we are then we don't need a link to 
	   the previous page or the first page so we do nothing. If we aren't then we
	   generate links to the first page, and to the previous page. */
	   $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$awal.'"><<</a> &nbsp; &nbsp; ';


	if ($pagenum > 1) {
        $previous = $pagenum - 1;
		$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'">Previous</a> &nbsp; &nbsp; ';
		// Render clickable number links that should appear on the left of the target page number
		for($i = $pagenum-$total_pages; $i < $pagenum; $i++){
			if($i > 0){
		       $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a> &nbsp; ';
			}

	    }
    }
	// Render the target page number, but without it being a link
	$paginationCtrls .= ''.$pagenum.' &nbsp; ';
	// Render clickable number links that should appear on the right of the target page number
	
	for($i = $pagenum+1; $i <= $last; $i++){
		$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a> &nbsp; ';
		if($i >= $pagenum+$total_pages){
			break;
		}
	}
	// This does the same as above, only checking if we are on the last page, and then generating the "Next"
    if ($pagenum != $last) {
        $next = $pagenum + 1;
        $paginationCtrls .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'">Next</a> &nbsp; &nbsp; ';
    }

    $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$last.'">>></a> ';
}
$list = '';
//$script='';

	while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){

	
	$id = $row["id_info"];
	$isi=$row["isi"];
	
	$tanggal=strftime("%d %b, %Y",strtotime($row["tanggal"]));
	
	$list .= '
		    <tbody>
		    <tr>
			      <td>'.$id.'</td>
			      <td colspan="2">'.$isi.'</td>
			      <td>'.$tanggal.'</td>
			      <td>
			       <!--	<a href="index.php?Bid='.$id.'" onclick=">Edit</a> -->
			       <!-- <a href="page_edit.php?Bid='.$id.'" >Edit</a> -->
			       Bukan Edit
			      </td>
			      <td>
			      	<!--<a href="hapus_data.php?Bid='.$id.'">Delete</a>	-->
			      	<!--<form enctype="multipart/form-data" action="hapus_data.php?Bid='.$id.'" method="post" accept-charset="utf-8">-->
			      	
			      	<form enctype="multipart/form-data" action="index.php?Bid='.$id.'" method="post" accept-charset="utf-8">
		    			<div>
		           			<input type="hidden" name="hapus" value="noOne" />
		           			<input type="submit" name="submit" class="btn btn-info" value="Delete"/>
		        
		    			</div>
					</form>
			      </td>
			    </tr>
		    </tbody>';

   
  		}


// Close your database connection
mysqli_close($conn);
?>