<?php 
unlink('./racine/'.$_GET['ouvrir'].'/'.$_GET['supprimer']);
header('location: open.php?ouvrir='.$_GET['ouvrir']);
?>