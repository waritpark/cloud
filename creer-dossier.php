<?php
$creatdossier=str_replace(' ', '-', $_POST['creatdossier']);
if (!mkdir("racine/".$creatdossier."/", 0700, true)){
    header('Location: index.php?echec=echec');
    die ('echec');
}

header('Location: index.php');

