<html>
	<head>
		<title>JavaScript/CSS3 Departure Board</title>
		<link rel="stylesheet" href="./css/departure-board.css" />
	</head>
	
	<body>
		<!--<div id="test"></div>-->

		<input type="button" id="more_fields" onclick="add_fields()" value="Add More Text" />


		<form method="post" action="to_db.php" enctype="multipart/form-data" >
 			<!-- <input name="filesToUpload[]" id="filesToUpload" type="file" multiple="" /> -->
		       	<div id="room_fileds">
		           <div>
			            <div class='label'>Text here 1:</div>
			            <div class="content">
			                <!--<span>Width: <input type="text" style="width:48px;" name="width[]" value="" /><small>(ft)</small> X </span>
			                <span>Length: <input type="text" style="width:48px;" namae="length[]" value="" /><small>(ft)</small></span> -->
			                <textarea name="isi[]" id="alamat" cols="75" rows="10"></textarea>
			        	</div>
					</div>
				</div>
				<input type="submit" name="submit" value="SIMPAN" />
		</form>

		<!--<script src="./js/departure-board.js"></script>
		<script>
		
			var board = new DepartureBoard (document.getElementById ('test'), { rowCount: 2, letterCount: 25 }); 
			board.setValue (['19:30 London King\'s Cross', '19:42 Sheffield']);
			
			window.setTimeout (function () {
			 	board.setValue ('19:42 Sheffield');
			}, 12000);

		</script>-->

		<script>
			var room = 1;
			var added = null;
			function add_fields() {
				//alert("haloo");
			    room++;
			    var objTo = document.getElementById('room_fileds')
			    var divtest = document.createElement("div");
			    /*divtest.innerHTML = '<div class="label">Room ' + room +':</div><div class="content"><span>Width: <input type="text" style="width:48px;" name="width[]" value="" /><small>(ft)</small> X</span><span>Length: <input type="text" style="width:48px;" namae="length[]" value="" /><small>(ft)</small></span></div>';*/

			    divtest.innerHTML = '<div class="label">Text here' + room +':</div><div class="content"><textarea name="isi[]" id="alamat" cols="75" rows="10"></textarea></div>';
			    
			    objTo.appendChild(divtest)

			    document.cookie = "added = " + room;
			    //alert(p);
			}
        
		</script>

		<script>
			var room = 1;
			var added = null;
		 	window.onload =function(){
		 		
		 		document.cookie = "added = " + room;
		 		//alert(o);
		 	}

		 	//window.onload = goAdd;
		</script>

	</body>
</html>