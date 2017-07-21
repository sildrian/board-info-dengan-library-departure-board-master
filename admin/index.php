<?php
/*
session_start();
if ( @$_SESSION['auth'] != "yes" )
{
header("Location: ../login.php");
exit();
}

//if(!isset($_SESSION["benar"]) || !isset($_SESSION["up"])){
if(!isset($_SESSION["benar"])){
    //echo "string";
    $_SESSION["benar"]=null;
    $_SESSION['angka']=0;
    //exit();
}else{
    $_SESSION['angka']=1;
}
*/
//var_dump($_SESSION["benar"]);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="../css/table_cs.css" rel="stylesheet" type="text/css" />
<!-- Bootstrap Core CSS -->
<link href="../css/bootstrap.min.css" rel="stylesheet" />
<!--w3 core -->
<link href="../css/w3.css" rel="stylesheet" type="text/css" />

<!-- script type="text/javascript" src="../../js/tampilan_data.js" -->


</head>
<body>
       <div class="container">

            <div class="row">
                <div class="col-md-3">
                        <p class="lead"></p>
                        <div class="list-group">
                            
                                <!--<div class="">-->
                                    <a href="javascript:void(0)" class="list-group-item side_bar" onclick="openData(event, 'daftar_data')">Home Admin</a>
                                <!--</div>
                                <!--<div class="list-group-item">-->
                                    <a href="javascript:void(0)" class="list-group-item side_bar" onclick="openData(event, 'form_submit')">Insert Data</a>
                                <!--</div>-->
                                
                            <script>
                                function openData(evt, dataAll) {
                                  var i, x, y;

                                  //allert("tampilko");
                                  
                                  x = document.getElementsByClassName("data");
                                  for (i = 0; i < x.length; i++) {
                                     x[i].style.display = "none";
                                  }

                                  y = document.getElementsByClassName("side_bar");
                                  for (i = 0; i < y.length; i++) {
                                      y[i].className = y[i].className.replace(" w3-red", ""); 
                                  }

                                  document.getElementById(dataAll).style.display = "block";
                                  evt.currentTarget.className += " w3-red";
                                }
                            </script> 
                        
                            
                        </div>
                    </div>


    <div id="kotak_tampilan">
        
        <div class="data" id="daftar_data">    
            <table>
            	<thead>
            				<tr>
                  				<th colspan="7" style="text-align: center;">Atividades do Projeto</th>
                			</tr>
                			<tr>
            			      <th>ID</th>
            			      <th colspan="2">Isi</th>
            			      <th>Tanggal</th>
            			      <th></th>
            			      <th></th>
            			    </tr>
            			</thead>
              <?php
              //Daftar data
              //********************************************************//
                  include "daftar_data.php";

                  echo $list;

                  
              ?>  
            </table>
            <h4 style="color:red; text-align: right;"> <?php echo $paginationCtrls; ?> </h4>
            <?php //batas dafar data
            //********************************************************//
            ?>
        </div>



        <div class="data" id="form_submit" style="display: none;">
            <?php
              //********************************************************//
            include "admin.php";

            //********************************************************//
            ?>
        </div>


        <?php 
        if(isset($_POST["hapus"])) {
            require_once "hapus_data.php";
            //********************************************************//
            
        //echo '</div>'; 
        }
        ?>
        


    </div>

    </div>
    </div>   



<?php
/*
    if($_SESSION['angka'] == 1){

        //if($_SESSION['coba']="kembali"){
        switch($_SESSION['benar']) {

        case 'benar':
            
            $c=dirname(__FILE__).'\helper';
            
            require_once $c.'\tes_popup.php';

            $_SESSION['benar']=null;
            break;
        

        
        case 'benarUp':
            
            $c=dirname(__FILE__).'\helper';
            //var_dump ($c);
            require_once $c.'\update_data.php';
            
            //$_SESSION['coba'] =null;
            $_SESSION['benar']=null;
           break;
        
        case 'salah':
        
            
            $c=dirname(__FILE__).'\helper';
            //var_dump ($c);
            require_once $c.'\tes_popup2.php';
            
            //$_SESSION['coba'] =null;
            $_SESSION['benar']=null;
            break;
        //}
        
        case 'salahUp':
            
            $c=dirname(__FILE__).'\helper';

            require_once ($c.'\gagalUpdate_data.php');

            $_SESSION['benar']=null;
            break;
            

            case 'benarDel':
        
            $c=dirname(__FILE__).'\helper';
            //var_dump ($c);
            require_once ($c.'\hapus_data.php');
            
            //$_SESSION['coba'] =null;
            $_SESSION['benar']=null;
            break;

            case 'salahDel':

            $c=dirname(__FILE__).'\helper';
            //var_dump ($c);
            require_once ($c.'\Gagalhapus_data.php');
            
            $_SESSION['benar']=null;
            break;
        }
    }
*/
?>


</body>
</html>