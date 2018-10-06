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
// Buoc 02: Truy van Database
    $sql="SELECT adm3_name, ST_AsText(geom) as geom2 FROM vnm_polbnda_adm3_2014_pdc WHERE ST_Contains(ST_SetSRID(geom,4326) , ST_GeometryFromText('POINT({$getLong}  {$getLat})', 4326))";
    // echo $sql;
    $stmt=$conn->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    // echo $stmt;
    // echo 'ok';
    while($row=$stmt->fetch()){
        // echo '?';
        echo $row['adm3_name'];
        // echo 'hi';
    }
    // echo 'Kekeke';
//Buoc 03:
?>