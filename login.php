<?php 
    session_name("formulaire");
    session_start();
    include 'connect.php';

        if(isset($_POST['username']) && isset($_POST['password'])) {
            if ($_POST['username']!=="" && $_POST['password']!==""){
                $name = $_POST['username'];
                $salt = "idjisjsiosi@5151@";
                $user_password = md5($_POST['password'].$salt);
                $sql= "select username, password FROM t_login where username='$name' AND password='$user_password'";

                $result=$connection->query($sql);
                $resultrow=$result->fetch(PDO::FETCH_ASSOC);
                // print_r($resultrow);

                if($resultrow['username']!=""){
                    $_SESSION['username'] = $resultrow['username'];
                    // echo "je suis co";
                    header('Location:index.php');
                }
                else {
                    header('Location:form.php');
                    session_destroy();
                }
            }
            else {
                header('Location:form.php');
            }
        }





?>