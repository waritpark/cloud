
<?php
    session_name("formulaire");
    session_start();
    session_unset();
    session_destroy();
    header("Location:form.php"); // Redirecting To Home Page
    exit();
?>
