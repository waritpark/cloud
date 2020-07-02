
<?php
try {
    $connection = new PDO('mysql:host=localhost;dbname=cloud', 'root2', 'demo1234');

    } catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
    }
    ?>
