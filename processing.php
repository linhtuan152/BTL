<?php
if(isset($_POST['lat']) && isset($_POST['long'])){
    $getLat=$_POST['lat'];
    $getLong=$_POST['long'];
}else{
    echo 'To ko nhan duoc gi het';
}

//Buoc 01: Ket noi Postgres PDO
    try{
        $conn=new PDO("pgsql:host=localhost:8080;dbname=haiphong",'postgres','12345');
    }catch (PDOException $e) {
        echo "Error : " . $e->getMessage() . "<br/>";
        die();
        }
//Buoc 02: Truy van Database
    $sql="SELECT adm1_name, ST_AsText(geom) as geom2 FROM vnm_polbndl_adm1_2014_pdc WHERE ST_Contains(ST_SetSRID(geom,4326) , ST_GeometryFromText('POINT({$getLong}  {$getLat})', 4326))";
    // echo $sql;
    $stmt=$conn->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    while($row=$stmt->fetch()){
        echo $row['adm1_name'];
    }
    // echo 'Kekeke';
//Buoc 03:
?>