<?php
include "init.php";
$getID = $_GET[$sid];
$sql = "select * from $stud where $sid = $getID";
$data = mysqli_query($con,$sql);
$row = mysqli_fetch_array($data);
?>

<html>
    <head>
        <title>Update</title>
    </head>
    <body>
        <center>
            <h1>Update Student Data</h1>
            <form action="" method="post">
            <table>
                <tr>
                    <td>Student ID</td>   
                    <td><input type="number" id="sid" name="sid" value="<?php echo $row[$sid]?>" disabled/></td>
                </tr>
                <tr>
                    <td>Update Student Name</td>   
                    <td><input type="text" id="sname" name="sname" value="<?php echo $row[$sname] ?>"/></td>
                </tr>
                <tr>
                    <td>Update Student Class</td>   
                    <td>
                        <select id="sclass" name="sclass">
                            <option name="tybca1">TYBCA-1</option>
                            <option name="tybca2">TYBCA-2</option>
                            <option name="tybca3">TYBCA-3</option>
                            <option name="tybca4">TYBCA-4</option>
                            <option name="tybca5">TYBCA-5</option>
                            <option name="tybca6">TYBCA-6</option>
                            <option name="tybca7">TYBCA-7</option>
                            <option name="tybca8">TYBCA-8</option>
                        </select>
                        <input type="submit" name="btn_upd" value="Update Student"/>
                    </td>   
                    
                </tr>   
            </table>  
            </form>  
        </center>
    </body>
</html>

<?php
include "init.php";

if(isset($_POST['btn_upd'])){
    $getID = $_GET[$sid];
    $upd_name = $_POST[$sname];
    $upd_class = $_POST[$sclass];
    
    $update = "update $stud set $sname='$upd_name' , $sclass='$upd_class' where $sid=$getID";
    $queryExe = mysqli_query($con,$update);
    
    if(!$queryExe){
        ?>
            <script>    
                alert("Student Not Updated !")
            </script>
        <?php
    }else {
        ?>
            <script>    
                alert("Student Updated !")
                window.open("http://localhost/paper4/index.php","_self")
            </script>
        <?php
    }
}

?>