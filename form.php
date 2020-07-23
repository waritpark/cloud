<?php 
    session_name("formulaire");
    session_start();
?>
<?php include 'header.php' ?>
<?php include 'main.php' ?>
    <h2 class="d-flex justify-content-center font-family-julius">Connectez vous</h2>
    <div class="d-flex justify-content-center">
        <form action="login.php" method="post" autocomplete="off" class="mb-2 font-family-roboto">
            <label>Nom de compte :</label>
            <input id="name" name="username" placeholder=" nom" type="text">
            <label>Mot de passe :</label>
            <input id="password" name="password" placeholder=" mot de passe" type="password">
            <input name="submit" type="submit" value="Connexion" class="button1 text-white m-0-5">
        </form>
    </div>
    <div class="d-flex justify-content-center">
        <p class="font-family-roboto">vous n'avez pas de compte ? <a href="inscription.php" class="text-blue"> inscrivez-vous</a></p>
    </div>
<?php include 'endmain.php' ?>        
<?php include 'footer.php' ?>
