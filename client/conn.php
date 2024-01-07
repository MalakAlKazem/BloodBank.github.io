<?php
define ("db_SERVER","localhost");
define("db_USER","root");
define("db_PASSWORD","");
define("db_DBNAME","bld");
$conn=mysqli_connect(db_SERVER,db_USER,db_PASSWORD,db_DBNAME);
if(!$conn){
    echo '<script type="text/javascript">
    alert("Error connecting the server ".mysqli_connect_error())</script>';
}
?>