<?php
    $host='127.0.0.1';
    $user='root';
    $pass='';
    $databasename='cms';

    $stud='stud';
    $sid='sid';
    $sname='sname';
    $sclass='sclass';
    $search='search';

    $con = mysqli_connect($host,$user,$pass,$databasename);
    if(!$con){
        mysqli_connect_error();
    } else {
        //echo "Connected";
    }
?>