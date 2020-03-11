<?php
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
    <script src="js/validator.js"></script>
    
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
    <?php include('menuadmin.php');?>
    <div class="col-sm-8 text-left">
        <h2 class="text-center">INPUT GEJALA</h2>
      <form class="form-horizontal" data-toggle="validator" role="form" method="post" action="ainputgejala.php">
          <div class="form-group has-feedback">
				<label class="control-label col-sm-2" for="nama">ID Gejala:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" required name="idgejala" data-error="Isi kolom dengan benar">
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <div class="help-block with-errors" role="alert"></div>
				</div>
			</div>
			<div class="form-group has-feedback">
				<label class="control-label col-sm-2" for="nama">Gejala:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" required name="gejala" data-error="Isi kolom dengan benar">
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <div class="help-block with-errors" role="alert"></div>
				</div>
			</div>
			
                <button type="submit" name ="submit" class="btn btn-primary">Simpan</button>
          <?php			
                    if(isset($_POST['submit'])){
                    $idgejala     = $_POST['idgejala'];
                    $gejala       = $_POST['gejala'];
                    $query="INSERT INTO gejala SET idgejala='$idgejala',gejala='$gejala'";
                  $result=mysqli_query($konek_db, $query);
                        if($result){
                            echo '<script language="javascript">';
                            echo 'alert("Data Berhasil disimpan")';
                            echo '</script>';
                            }
                            header('location:gejala.php');
                    }
                ?>
		</form>		
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p></p>
</footer>

</body>
</html>
