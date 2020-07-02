<?php
$tadmerde=str_replace(' ', '-', $_POST['tasdemerde']);
if (!mkdir("racine/".$tadmerde."/", 0700, true)){
    header('Location: index.php?echec=echec');
    die ('echec');
}

header('Location: index.php');

