<?php 
session_name("formulaire");
session_start();
if(empty($_SESSION['username'])){
    header('location:form.php');
}
ini_set('display_errors','off');
include 'header.php'; ?>
<?php include 'main.php'; ?>
<div class="d-flex justify-content-between pt-2 pb-3 border-bottom1">
<h2 class="m-0 font-family-julius">Fichiers de <?php echo $_GET['ouvrir']; ?></h2>
<form action="logout.php" method="post" class=" d-flex font-family-roboto">
    <input type ="submit" value="Se deconnecter" class="button2 text-white">
</form>
</div>
<?php 
if ($handle = opendir("racine/".$_GET['ouvrir']."/")) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
            echo "<ul class='font-family-roboto'>";
            echo "<li class='d-flex justify-content-between align-items-center'>- ".$entry."<div class='d-flex justify-content-end'><button class='button1 mr-1 d-flex'><a class='text-white text-deco-none' href=''>télécharger</a></button><button class='button2 ml-1'><a class='text-deco-none text-white' href='supprimer.php?supprimer=".$entry."&ouvrir=".$_GET['ouvrir']."'>Supprimer</a></button></div></li>";
            echo "</ul>";
        }
    }
    closedir($handle);
}
?>
<div class="">
    <form method="POST" action="" enctype="multipart/form-data" class="font-family-roboto pt-2 d-flex row">
        <label class="d-flex align-items-center mr-1">Ajouter un fichier :</label>
        <div class="d-flex border-input-file">
            <input type="file" name="file" multiple class="m-0 p-0 button3 text-white opacity-0">
        </div>
        <input type="submit" name="upload" value="Envoyer" class="ml-1 button1 text-white">
    </form>
</div>

<?php 
if (isset($_POST['upload'])){
    $file_name = $_FILES['file']['name'];
    $file_type = $_FILES['file']['type'];
    $file_size = $_FILES['file']['size'];
    $file_tem_loc = $_FILES['file']['tmp_name'];
    $file_store = "racine/".$_GET['ouvrir']."/".$file_name;

    if (move_uploaded_file($file_tem_loc, $file_store)){

        echo "<div class='font-family-roboto mt-2'>";
        echo "Fichier envoyé avec succes !";
        echo "</div>";
        header('location: open.php?ouvrir='.$_GET['ouvrir']);
    }
}
?>

<div class="mt-2 d-flex justify-content-center">
<a href ="index.php" class="button2 text-white text-deco-none font-family-roboto">retour</a>
</div>
<?php include 'endmain.php'; ?>
<?php include 'footer.php'; ?>