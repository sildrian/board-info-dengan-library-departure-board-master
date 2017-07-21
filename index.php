<html>
	<head>
		<title>JavaScript/CSS3 Departure Board</title>
		<link rel="stylesheet" href="./css/departure-board.css" />
	</head>
	
	<body>
		<div id="test"></div>

		

		<script src="./js/departure-board.js"></script>



		<?php 

			include "get_db/get_db.php";
		?>


		<?php

			//print_r($isi_all);

			$ada = json_encode($isi_all);

			$bts = json_encode($limit);

			//echo $ada;

			//var hasil = all_item.split(',');
			
			echo "<script type=\"text/javascript\">
		
			var board = new DepartureBoard (document.getElementById ('test'), { rowCount: 2, letterCount: 50 }); 
			
			var all_item = [];

			var def_waktu = 9000;

			var batas = $bts;

			all_item = $ada;
			
			

			window.onload = function(){ //for pure javascript
			
			window.setTimeout (function () {
			board.setValue (all_item[0]);
			}, 3000);

			var i=1;

			setInterval(function (){

			while(i<batas){
				
					setTimeout (function () {
			 		board.setValue (all_item[i]);
					}, def_waktu);
					
				i++;	
			}

				if(i==batas){
					i=0;
				}

				
			 	board.setValue (all_item[i]);
			 	
				i++;
							
				},def_waktu*3);
			
			}


			

			</script>";
		?>

		<!-- digunakan
		//beda
		if(i == batas){
				i=0;
					setTimeout (function () {
			 		board.setValue (all_item[i]);
					}, 6000);
				return;
			}
		//beda


		//berhasil
		window.onload = function(){ //for pure javascript
			var i=1;

			setInterval(function (){

			if(i==batas){
				i=0;
					setTimeout (function () {
			 		board.setValue (all_item[i]);
					}, def_waktu);
					
					return;
			}

				

			 	board.setValue (all_item[i]);
				i++;
							
				},def_waktu*batas);
			
			}
		//berhasil


		<script type="text/javascript">

			//var hasil = "<?php// echo $halo; ?>";
		
			var board = new DepartureBoard (document.getElementById ('test'), { rowCount: 2, letterCount: 25 }); 
			board.setValue (['19:30 London King\'s Cross', '19:42 Sheffield']);
			//board.setValue (hasil);

			/*
			//percobaan
			//var decodedCookie = decodeURIComponent(document.cookie);
			var decodedCookie = decodeURIComponent(document.cookie);
    		//var hasil = decodedCookie;
    		var hasil = decodedCookie.split(',');


    		window.onload = function(){ //for pure javascript
			var i=1;

			setInterval(function (){


			board.setValue (hasil[0]);

					i++;	
							
				},2000);
			//});
			}*/

			window.setTimeout (function () {
			 	board.setValue ('19:42 Sheffield');
			}, 12000);

		</script>
		-->
		
		<?php

		/* digunakan

		if(isset($_POST['submit'])){

			$isi =  $_POST["isi"];

			$ada = json_encode($isi);

			//var_dump($ada);

		

			//(digunakan)
			//document.cookie = \"namesInfo = \" + names;
			//document.cookie = names;
	        
	        

	        echo "<script type=\"text/javascript\">
	            	
	            var names  = [];
	            
	            names = $ada;
					

				var nameInput;
										

				window.onload =function(){
									
				document.cookie = names; 

					 
				
				}
					
	        </script>";
	           }
	           */
	    ?>

	</body>
</html>