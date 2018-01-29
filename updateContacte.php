<?php
	session_start();
	if(!isset($_SESSION['username'])) {
	  header('location: index.php');
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		include("conexion.proc.php");
		$idContacte = $_REQUEST['idContacte'];
		$sql = "SELECT * FROM tbl_contactes WHERE idContacte = $idContacte";
		echo $sql;
		$sqlUpdate = mysqli_query($conexion, $sql);
		// echo $sql;
		// die();

		echo "<form action='updateContacte.proc.php' method='POST'>";
		if(mysqli_num_rows($sqlUpdate)>0){	
			while($row = mysqli_fetch_array($sqlUpdate)){
				echo "<label>nomContacte</label>";
				echo "<input type='text' name='nomContacte' value='" . $row['nomContacte'] . "'><br>";

				echo "<label>cognomsContacte</label>";
				echo "<input type='text' name='cognomsContacte' value='" . $row['cognomsContacte'] . "'><br>";

				echo "<label>emailContacte</label>";
				echo "<input type='text' name='emailContacte' value='" . $row['emailContacte'] . "'><br>";

				echo "<label>telefonContacte</label>";
				echo "<input type='text' name='telefonContacte' value='" . $row['telefonContacte'] . "'><br>";

				echo "<label>tipusUbicacio1</label>";
				echo "<input type='text' name='tipusUbicacio1' value='" . $row['tipusUbicacio1'] . "'><br>";

				echo "<label>tipusUbicacio2</label>";
				echo "<input type='text' name='tipusUbicacio2' value='" . $row['tipusUbicacio2'] . "'><br>";

				echo "<label>ubicacio1Contacte</label>";
				echo "<input type='text' name='ubicacio1Contacte' value='" . $row['ubicacio1Contacte'] . "'><br>";

				echo "<label>ubicacio2Contacte</label>";
				echo "<input type='text' name='ubicacio2Contacte' value='" . $row['ubicacio2Contacte'] . "'><br>";

				echo "<label>direccioContacte</label>";
				echo "<input type='text' name='direccioContacte' value='" . $row['direccioContacte'] . "'><br>";

				echo "<label>poblacioContacte</label>";
				echo "<input type='text' name='poblacioContacte' value='" . $row['poblacioContacte'] . "'><br>";

				echo "<label>provinciaContacte</label>";
				echo "<input type='text' name='provinciaContacte' value='" . $row['provinciaContacte'] . "'><br>";

				echo "<label>cpContacte</label>";
				echo "<input type='text' name='cpContacte' value='" . $row['cpContacte'] . "'><br>";

				echo "<label>paisContacte</label>";
				echo "<input type='text' name='paisContacte' value='" . $row['paisContacte'] . "'><br>";

				echo "<label>imatgeContacte</label>";
				echo "<input type='text' name='imatgeContacte' value='" . $row['imatgeContacte'] . "'><br>";

				echo "<input type='hidden' value='".$idContacte."' name='idContacte'>";

				echo "<input type='submit' name='Acceptar'>";
			}
		}
		echo "</form>";
	?>		
</body>
</html>