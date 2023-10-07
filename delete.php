<?php
include "init.php";
$getID = $_GET[$sid];
$delete = "delete from $stud where $sid=$getID";
$query = mysqli_query($con,$delete);
if($query){
    ?>
        <script>    
            alert("Student Deleted !")
            window.open("http://localhost/paper4/index.php","_self")
        </script>
    <?php
} else {
    ?>
        <script>    
            alert("Student Not Deleted !")
        </script>
    <?php
}
?>