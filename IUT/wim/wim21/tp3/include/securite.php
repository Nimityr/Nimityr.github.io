    <?php
    session_start();
    if (!isset($_SESSION['connecte'])
    || $_SESSION['connecte'] !=1)
    header('Location:./auth/authentification.php');
    ?>
