<?php 
rmdir('./racine/'.$_GET['supp']);
header('location: index.php');
?>