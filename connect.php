<?php 
if(isset($_POST['lat']) && isset($_POST['long'])){
    $getLat=$_POST['lat'];
    $getLong=$_POST['long'];
}else{
    echo 'To ko nhan duoc gi het';
}

//Buoc 01: Ket noi Postgres PDO
    $host = 'localhost';
    $port = '5433';
    $dbname = 'NamDinh';
    $user = 'postgres';
    $password = '12345';

    $conn_str = "pgsql:host=$host port=$port dbname=$dbname user=$user password=$password";

    try{
        $conn=new PDO($conn_str);
    }catch (PDOException $e) {
        echo "Error : " . $e->getMessage() . "<br/>";
        die();
        }

?>