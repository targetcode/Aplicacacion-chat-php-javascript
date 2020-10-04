<?php 

require_once 'conexion.php';

if (isset($_POST['email'])) {

	$nombre = htmlentities(trim($_POST['nombre']));
	$email = htmlentities(trim($_POST['email']));
	$avatar = htmlentities($_POST['avatar']);

	$stmt_sel = $conn->prepare("SELECT email, userid FROM firebase_users WHERE email = ?");
	$stmt_sel->bind_param('s', $email);
	$stmt_sel->execute();
	
    /* ligar variables de resultado */
    $stmt_sel->bind_result($email_user, $USERID);

    /* obtener valor */
    $stmt_sel->fetch();


	if ($email == $email_user) {

		session_start();
		$_SESSION['auth'] = "ok";
		$_SESSION['id'] = $USERID;
		$_SESSION['nombre'] = htmlentities(trim($_POST['nombre']));
		$_SESSION['avatar'] = htmlentities(trim($_POST['avatar']));
		echo "ok";
		
	}else{

		$stmt = $conn->prepare("INSERT INTO `firebase_users`(`nombre`, `email`, `avatar`) VALUES(?,?,?)");
		$stmt->bind_param('sss', $nombre, $email, $avatar);

		if ($stmt->execute()) {
			$ID_registro = $stmt->insert_id;

			session_start();
			$_SESSION['auth'] = "ok";
			$_SESSION['id'] = $ID_registro;
			$_SESSION['nombre'] = htmlentities(trim($_POST['nombre']));
			$_SESSION['avatar'] = htmlentities(trim($_POST['avatar']));
			
			echo "ok";
		}else{
			echo 'error';
		}
	$stmt->close();
	}


	
	$stmt_sel->close();
}
