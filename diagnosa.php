<?php
error_reporting( error_reporting() & ~E_NOTICE );
include('koneksi.php');
 
if(isset($_SESSION['login_user'])){
header("location: about.php");
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sistem Pakar</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      </ul>
      <ul class="nav navbar-nav navbar-right">
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <?php include('menu.php');?>
    <div class="col-sm-8 text-left"> 
      <center><h2>DIAGNOSA PENYAKIT</h2></center>
        <form id="form1" name="form1" method="post" action="diagnosa.php">
				
              </form>
       <br>     
        <form id="form2" name="form2" method="post" action="diagnosa.php">
 			<?php 
           // if(isset($_POST['tanaman']))
                 // if($_POST['tanaman']!="jenistanaman"){
                
 			$tampil="select * from gejala";
			$query= mysqli_query($konek_db,$tampil);
                while($hasil=mysqli_fetch_array($query)){  
					echo "<input type='checkbox' value='".$hasil['gejala']."' name='gejala[]' /> ".$hasil['gejala']."<br>";
			}
                  //}
					?>      
 			
        
        <br>
        <button type="submit" name ="submit" onclick="return checkDiagnosa()" class="btn btn-primary">CEK PENYAKIT</button><br><br>
            <div class="panel panel-info">
                <div class="panel-heading">HASIL DIAGNOSA</div>
                <div class="panel-body">
            <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>ID PENYAKIT</th>
							              <th>Nama Penyakit</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
         <?php			

        if(isset($_POST['submit'])){
            $gejala = $_POST['gejala'];
            $jumlah_dipilih = count($gejala);
          
            if ($jumlah_dipilih==0){
              echo "<script>alert('Gejala harus diceklist..!!')</script>";
            }else{
            
            //looping mencari terlebih dahulu gejala yg diceklist
            $query = "SELECT * FROM db_sistempakar.basispengetahuan where gejala IN (";
                   for($x=0;$x<$jumlah_dipilih;$x++){
                       $query .= "'".$gejala[$x]."', ";
                    }
                   
                    $query = rtrim($query, ', ');
                    $query = $query.")";

                    //dibandingkan antara total yang diceklist dengan total gejala yang ada dipenyakit tersebut
                    $tampil = "select a.idpenyakit,a.namapenyakit,count(a.gejala) as gejalaA,count(b.gejala)as gejalaB from (
                      SELECT a.namapenyakit,a.gejala,b.idpenyakit FROM db_sistempakar.basispengetahuan a left join db_sistempakar.penyakit b on a.namapenyakit = b.namapenyakit
                      )a
                      left join (
                      $query
                      )B
                      ON a.namapenyakit = b.namapenyakit and a.gejala = b.gejala
                      group by a.namapenyakit,a.idpenyakit
                      having count(a.gejala) = count(b.gejala)";
                      //echo $tampil;

                    $result = mysqli_query($konek_db, $tampil);
                    $hasil  = mysqli_fetch_array($result); 
                    $num_rows = mysqli_num_rows($result);
                    $gejala = $hasil['gejalaA'];
                    
                    //cek jika gejala tersebut sama dengan yang diceklist maka data akan muncul
                    //jika total yang diceklist tidak sama dngan yg ada dibasis pengetahuan makan akan munculkan warning
                    
                    if ($num_rows==0 or $x!=$gejala){
                      echo "<script>alert('Penyakit tidak ditemukan\\nSilahkan ulangi pencarian gejala :)')</script>";
                    }else
                    {
                      echo "<script>alert('Diagnosa Penyakit ".$hasil['namapenyakit']." ditemukan..!\\nSilahkan cek tabel hasil diagnosa dibawah')</script>";
                      echo "
                        <tr>  
                        <td>".$x."</td>
                        <td>".$hasil['idpenyakit']."</td>
                        <td>".$hasil['namapenyakit']."</td>  
                        <td><a href=\"hasildiagnosa.php?id=".$hasil['idpenyakit']."\"><i class='glyphicon glyphicon-search'></i></a></td>
                        </tr>   
                                
                                ";
                    }

                  }
        }
    
                ?>
                    </table>
            </div>
                    </div>
                </div>
        </form>
             
    </div>
  </div>
</div>
 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form" method="post" action="ceklogin.php">
            <div class="form-group" method="post">
              <label for="username"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input type="text" class="form-control" name="username" id="password" placeholder="Enter username">
            </div>
            <div class="form-group" method="post">
              <label for="password"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
            </div>
              <button type="submit" id="submit" nama="submit" class="btn btn-primary btn-block" method="post"><span class="glyphicon glyphicon-off"></span> Login</button>
          </form>
        </div>
      </div>
    </div>
  </div> 
<footer class="container-fluid text-center">
  <p></p>
</footer>
<script language="JavaScript" type="text/javascript">
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});
function checkDiagnosa(){
    return confirm('Apakah sudah benar gejalanya?');
}

</script>

</body>
</html>
