<?php
	session_start();
	if(!isset($_SESSION['username'])) {
	  header('location: index.php');
	}
	include("conexion.proc.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		if(isset($_SESSION['canvisok'])){
			echo "<script> alert('Los cambios se han realizado correctamente');</script>";
			unset($_SESSION['canvisok']);
		}
		
		$idContacte = $_REQUEST['idContacte'];
		$sql = "SELECT * FROM tbl_contactes WHERE idContacte = $idContacte";
		//echo $sql;
		$sqlUpdate = mysqli_query($conexion, $sql);
		// echo $sql;
		// die();
		
		echo "<form action='updateContacte.proc.php' method='POST' enctype='multipart/form-data'>";
		if(mysqli_num_rows($sqlUpdate)>0){	
			while($row = mysqli_fetch_array($sqlUpdate)){ ?>
				<label>Nom contacte</label>
				<input type='text' name='nomContactenew' value='<?php echo $row['nomContacte'];?>'><br>
				<input type="hidden" name="nomContacteold" value="<?php echo $row['nomContacte']; ?>" />

				<label>Cognoms contacte</label>
				<input type='text' name='cognomsContactenew' value='<?php echo $row['cognomsContacte'];?>'><br>
				<input type="hidden" name="cognomsContacteold" value="<?php echo $row['cognomsContacte']; ?>" />

				<label>Telefon contacte</label>
				<input type='text' name='telefonContactenew' value='<?php echo $row['telefonContacte'];?>'><br>
				<input type="hidden" name="telefonContacteold" value="<?php echo $row['telefonContacte']; ?>" />

				<label>Email contacte</label>
				<input type='text' name='emailContactenew' value='<?php echo $row['emailContacte'];?>'><br>
				<input type="hidden" name="emailContacteold" value="<?php echo $row['emailContacte']; ?>" />

				<label>Imatge contacte</label>
				<input type="file" name="imatgeContacte"><br>

				Tipus Ubicacio 1 : 
				<select name="tipusubicacio1">
					<option value="casa">Casa</option>
				</select><br>

				<label>Direccio contacte 1</label>
				<input type='text' name='direccioContacte1new' value='<?php echo $row['direccioContacte1'];?>'><br>
				<input type="hidden" name="direccioContacte1old" value="<?php echo $row['direccioContacte1']; ?>" />


				<label>Poblacio contacte 1</label>
				<input type='text' name='poblacioContacte1new' value='<?php echo $row['poblacioContacte1'];?>'><br>
				<input type="hidden" name="poblacioContacte1old" value="<?php echo $row['poblacioContacte1']; ?>" />

				<label>Provincia contacte 1</label>
				<input type='text' name='provinciaContacte1new' value='<?php echo $row['provinciaContacte1'];?>'><br>
				<input type="hidden" name="provinciaContacte1old" value="<?php echo $row['provinciaContacte1']; ?>" />

				<label>Codi Postal contacte 1</label>
				<input type='text' name='cpContacte1new' value='<?php echo $row['cpContacte1'];?>'><br>
				<input type="hidden" name="cpContacte1old" value="<?php echo $row['cpContacte1']; ?>" />

				<label>Pais contacte 1</label>
				<input type='text' name='paisContacte1new' value='<?php echo $row['paisContacte1'];?>'><br>
				<input type="hidden" name="paisContacte1old" value="<?php echo $row['paisContacte1']; ?>" />

				Tipus Ubicacio 2 : <select name="tipusUbicacio2new"> 
					<?php 
					if ($row['tipusUbicacio2'] == 'feina') { ?>
						<option value="feina" selected>Feina</option>
					<?php } else { ?>
						<option value="feina">Feina</option>	
					<?php }
					if ($row['tipusUbicacio2'] == 'escola') { ?>
						<option value="escola" selected>Escola</option>
					<?php } else { ?>
						<option value="escola">Escola</option>
					<?php }
					if ($row['tipusUbicacio2'] == 'altres') { ?>
						<option value="altres" selected>Altres</option>
					<?php } else { ?>
						<option value="altres">Altres</option>	
					<?php } ?>
				</select><br>
				<input type="hidden" name="tipusUbicacio2old" value="<?php echo $row['tipusUbicacio2']; ?>" /><br>



				<label>Direccio contacte 2</label>
				<input type='text' name='direccioContacte2new' value='<?php echo $row['direccioContacte2'];?>'><br>
				<input type="hidden" name="direccioContacte2old" value="<?php echo $row['direccioContacte2']; ?>" /><br>

				<label>Poblacio contacte 2</label>
				<input type='text' name='poblacioContacte2new' value='<?php echo $row['poblacioContacte2'];?>'><br>
				<input type="hidden" name="poblacioContacte2old" value="<?php echo $row['poblacioContacte2']; ?>" /><br>

				<label>Provincia contacte 2</label>
				<input type='text' name='provinciaContacte2new' value='<?php echo $row['provinciaContacte2'];?>'><br>
				<input type="hidden" name="provinciaContacte2old" value="<?php echo $row['provinciaContacte2']; ?>" /><br>

				<label>Codi Postal contacte 2</label>
				<input type='text' name='cpContacte2new' value='<?php echo $row['cpContacte2'];?>'><br>
				<input type="hidden" name="cpContacte2old" value="<?php echo $row['cpContacte2']; ?>" /><br>

				<label>Pais contacte 2</label>
				<input type='text' name='paisContacte2new' value='<?php echo $row['paisContacte2'];?>'><br>
				<input type="hidden" name="paisContacte2old" value="<?php echo $row['paisContacte2']; ?>" /><br>

				<input type="hidden" name="idContacte" value="<?php echo $row['idContacte']; ?>" /><br>

				<input type="submit" name="Desa els canvis">
				<a href="principal.php"><input type="button" value="Tornar"></a>	
			<?php }
		}
		echo "</form>";
	?>
	
</body>
</html>