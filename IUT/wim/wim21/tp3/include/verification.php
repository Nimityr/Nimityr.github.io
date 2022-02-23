    <?php
    include '../include/connexion.php'
    $login = $_POST['login'] ?? "";
    $password = $_POST['password'] ?? "";

    $stmt = mysqli_prepare($conn,"SELECT login,email,password FROM user WHERE login=?");
    mysqli_stmt_bind_param($stmt,"s",$login);
    mysqli_stmt_bind_execute($stmt);

    if (mysqli_stmt_bind_rows($stmt)!=1){
    	header('Location:./authentification.php?erreur=login');
    } else { mysqli_stmt_bind_result ($stmt, $login, $email, $hash;)
    		mysqli_stmt_bind_fetch($stmt);
    		echo "$login $email $hash";
    		if (password_verify($password,$hash)){
    			session_start();
    			$_SESSION['connecte'] = 1;
    			$_SESSION['email'] = $email;
    			header('Location:../film.php');
    		} else {
    header("Location:./authentification.php?erreur=mdp");

    		}
    }


    ?>
