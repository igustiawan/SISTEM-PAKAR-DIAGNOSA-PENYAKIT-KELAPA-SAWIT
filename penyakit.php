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
           <h2 class="text-center">DAFTAR PENYAKIT</h2>
      <!--<form id="form1" name="form1" method="post" action="hamadanpenyakit.php">
				<label for="sel1">Jenis Tanaman</label>            
				<select class="form-control"  name="tanaman" onChange='this.form.submit();'>
				<option>Tanaman</option>
                <option>Bawang</option>
                <option>Cabai</option>
  		</select>-->
  </form>
<br>
<a href="ainputpenyakit.php"><button type="button" class="btn btn-default">
  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
</button></a>
    	<br><br>
            <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>ID Penyakit</th>
							              <th>Nama Penyakit</th>
                            <!--<th>Jenis Penyakit</th>-->
                            <th>Detail</th>
                        </tr>
                    </thead>
                     <?php
//if(isset($_POST['tanaman']))
//if($_POST['tanaman']!="jenistanaman"){	
$queri="Select * From penyakit";
$hasil=mysqli_query ($konek_db,$queri);   
$id = 0;
while ($data = mysqli_fetch_array ($hasil)){  
 			$id++; 
 			echo "      
        			<tr>  
        			<td>".$id."</td>
					<td>".$data[0]."</td>  
        			<td>".$data[1]."</td>  
        		
                    <td><a href=\"adetailpenyakit.php?id=".$data[0]."\"><i class='glyphicon glyphicon-search'></i></a>"." || <a href=\"aeditpenyakit.php?id=".$data[0]."\"><i class='glyphicon glyphicon-pencil'></i></a>"." || <a href=\"adeletepenyakit.php?id=".$data[0]."\" onclick='return checkDelete()'><i class='glyphicon glyphicon-trash'></i></a>"."</td>
        		</tr>   
        	";      
			}
//}
 ?>  
</table><br><br><br><br><br>
            </div>
    </div>
  </div>
</div>
<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Yakin menghapus data ini?');
}
</script>

<footer class="container-fluid text-center">
  <p></p>
</footer>

</body>
</html>
