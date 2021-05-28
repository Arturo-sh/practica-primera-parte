<?php 

	include '../conexion.php';

	$usuario = $_POST['usuario'];
	$clave = $_POST['clave'];

	$consulta = "SELECT * FROM usuarios WHERE usuario='$usuario' and clave='$clave'";
	$resultado = mysqli_query($conexion, $consulta);

	$filas = mysqli_num_rows($resultado);

	if($filas>0){
		echo '<script>
		alert("Ingreso exitoso");
		window.location.replace("https://localhost/Form/Recordatorio/index.html");
		</script>';
		exit;
	}
	else{
		echo '<script>
		alert("Usuario o contraseña incorrectos");
		window.history.go(-1);
		</script>';
		exit;
	}

	mysqli_free_result($resultado);
	mysqli_close($conexion);

?>