<?php 

	include '../conexion.php';
	
	$nombre = $_POST['nombre'];
	$apellidos = $_POST['apellidos'];
	$correo = $_POST['correo'];
	$usuario = $_POST['usuario'];
	$clave = $_POST['clave'];
	$telefono = $_POST['telefono'];
	
	$insertar = "INSERT INTO usuarios(nombre, apellidos, correo, usuario, clave, telefono) VALUES ('$nombre', '$apellidos', '$correo', '$usuario', '$clave', '$telefono')";
	
	//Validaciones para el registro en la base de datos
	$verificar_usuario = mysqli_query($conexion,"SELECT * FROM usuarios WHERE usuario='$usuario'");
	if (mysqli_num_rows($verificar_usuario)>0) {
		echo '<script>
				alert("Este usuario ya esta registrado");
				window.history.go(-1);
				</script>';
				exit;
	}
	
	$verificar_correo = mysqli_query($conexion,"SELECT * FROM usuarios WHERE correo='$correo'");
	if (mysqli_num_rows($verificar_correo)>0) {
		echo '<script>
				alert("Este correo ya esta registrado");
				window.history.go(-1);
				</script>';
				exit;
	}
	
	$resultado = mysqli_query($conexion, $insertar);
	
	if (!$resultado) {
		echo '<script>
				alert("Error al registrarse");
				window.history.go(-1);
				</script>';
				exit;
	}
	else{
		echo '<script>
				alert("Usuario registrado correctamente");
				window.location.replace("http://localhost/Form/Recordatorio/index.html");
				</script>';
				exit;
	}
	
	mysqli_close($conexion);

?>