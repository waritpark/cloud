<?php 
    session_name("formulaire");
    session_start();
    ini_set('display_errors','off');
    if(empty($_SESSION['username'])){
        header('location:form.php');
    }
    if(isset($_POST['nouvellevaleur'])){
        $tadmerde=str_replace(' ', '-', $_POST['nouvellevaleur']);
        rename('./racine/'.$_POST['anciennevaleur'],'./racine/'.$_POST['nouvellevaleur']);
        header ('Location:index.php');
    }
?>

<?php include 'header.php'; ?>
<?php include 'main.php'; ?>
<div class="d-flex justify-content-between pt-2 pb-3 border-bottom1">
<h2 class="m-0 font-family-julius">Vos dossiers</h2>
<form action="logout.php" method="post" class=" d-flex">
    <input type ="submit" value="Se deconnecter" class="button2 text-white">
</form>
</div>
<?php 
if ($handle = opendir('racine')) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
            echo "<ul class='font-family-roboto' id='listeDossier'>";
            echo "<div class='d-flex'>";
            echo "<li class='d-flex justify-content-between align-items-center'>".$entry."<div class='d-flex justify-content-end'><button class='button1 mr-2'><a class='text-deco-none text-white' href='?modifier=".$entry."'>Modifier</a></button><button class='button1 mr-2'><a class='text-deco-none text-white' href='open.php?ouvrir=".$entry."'>Ouvrir</a></button><button class='button2'><a class='text-deco-none text-white' href='delete.php?supp=".$entry."'>Supprimer</a></button></div></li>";
            echo "</div>";
            echo "</ul>";
        }
    }
    closedir($handle);
}
if (isset($_GET['modifier'])){ ?>
<form action="" method="post" class="mt-2">
<input type="text" name="anciennevaleur" value="<?php echo $_GET['modifier'] ?>" hidden>
<input type="text" name="nouvellevaleur" class="mr-1 p-0-5 outline-none border-radius1">
<input type="submit" value="modifier" class="button1 text-white">
</form>
<?php }
?>
<form action="creer-dossier.php" method="post" class="mt-2">
    <input type ="text" name="tasdemerde" class="mr-1 p-0-5 outline-none border-radius1">
    <input type ="submit" value="creer un dossier" class="button1 text-white">
</form>
    <?php 
    

if (isset($_GET['echec'])){
    echo "<div class='mr-1 font-family-roboto'>Votre dossier existe deja.</div>";
}
    ?>


<?php include 'endmain.php'; ?>
<?php include 'footer.php'; ?>

