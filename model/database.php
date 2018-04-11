<?php
        $uname='kxg2';
        $pass='lucdlNiqZ';
        $hostname='sql1.njit.edu';

        $dsn="mysql:host=$hostname;dbname=$uname";
        try
        {
                $db=new PDO($dsn,$uname,$pass);
        }



 catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>
