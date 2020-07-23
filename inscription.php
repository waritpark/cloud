<?php include 'connect.php'; ?>
<?php include 'header.php'; ?>
<?php include 'main.php'; ?>

            <h2 class="font-family-julius d-flex justify-content-center">Login Form</h2>
            <div class="d-flex justify-content-center">
            <form action="" method="post" autocomplete="off" class="font-family-roboto">
                <label>Nom de compte :</label>
                <input id="name" name="username" placeholder="username" type="text">
                <label>Mot de passe :</label>
                <input id="password" name="password" placeholder="password" type="password">
                <input name="submit" type="submit" value="s'inscrire" class="text-white button1 m-0-5">
            </form>
            </div>
            <div class="d-flex justify-content-center">
                <button class="button2 m-1 mt-2"><a href="form.php" class="text-deco-none text-white">Retour</a></button>
            </div>
            <?php 
            if (!empty($_POST['username']) && !empty($_POST['password'])){
                $name = $_POST['username'];
                $salt = "idjisjsiosi@5151@";
                $user_password = md5($_POST['password'].$salt);
                $sql=$connection->prepare("INSERT INTO t_login (username, password) values ('$name', '$user_password')");
                $sqlverification="SELECT username FROM t_login WHERE username='$name'";
                $req = $connection->query($sqlverification);
                $req=$req->fetch(PDO::FETCH_ASSOC);
                if(is_array($req)) {
                echo "Ce nom est deja pris.";
                }
                else {
                $sql->execute();
                $_SESSION['comptecree'] = "<p class='msg-compte'> votre compte a bien été crée ! </p>";
                header('location: form.php');
                }
            }
            ?>
<?php include 'endmain.php'; ?>
<?php include 'footer.php'; ?>