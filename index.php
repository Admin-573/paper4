<html>
    <head>
        <title>College</title>
    </head>
    <body>
        <center>
            <h1>Student Data</h1>
            <form action="" method="post">
            <table>
                <tr>
                    <td>Student ID</td>   
                    <td><input type="number" id="sid" name="sid" required/></td>
                </tr>
                <tr>
                    <td>Student Name</td>   
                    <td><input type="text" id="sname" name="sname" required/></td>
                </tr>
                <tr>
                    <td>Student Class</td>   
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
                        <input type="submit" name="btn_add" value="Add Student"/>
                    </td>   
                    
                </tr>   
            </table>
            </form>  
            <form action="" method="post">
                <table>
                    <tr>
                        Search Rno Wise
                        <input type="number" name="search" required>
                        <input type="submit" name="btn_search" value="Search">
                    </tr>  
                </table>
            </form>
        </center>
    </body>
</html>
<?php
    include "init.php";
    
    if(isset($_POST['btn_search'])){

        ?>
        <center>
            <table border=1px>
            <tr>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Student Class</th>
                <th colspan=2>Action</th>
            </tr>
            <tr>
                <?php
                    include "init.php";
                    $search_box = $_POST[$search];
                    $sql = "select * from $stud where $sid like $search_box";
                    $queryExe = mysqli_query($con,$sql);
                    $data = mysqli_num_rows($queryExe);
                    if ($data){
                        while ($row = mysqli_fetch_array($queryExe)){
                            ?>
                                <tr>
                                <td>
                                    <?php echo $row[$sid]; ?>
                                </td>
                                <td>
                                    <?php echo $row[$sname]; ?>
                                </td>
                                <td>
                                    <?php echo $row[$sclass]; ?>
                                </td>
                                <td>
                                    <a href="update.php?sid=<?php echo $row[$sid]; ?>">Update</a>
                                </td>
                                <td>
                                    <a href="delete.php?sid=<?php echo $row[$sid]; ?>">Delete</a>
                                </td>
                                </tr>
                            <?php
                        }
                    } else {
                        echo "<center><h5>Searched Data Not Found !</h5></center>";
                    }
                ?>
            </tr>
            </table>
        </center>
    <?php

    } else {
        $create = "create table if not exists $stud($sid integer primary key,$sname text,$sclass varchar(512))";
        $queryExe = mysqli_query($con,$create);
    
        if(isset($_POST['btn_add'])){
    
            $student_sid = $_POST[$sid];
            $student_sname = $_POST[$sname];
            $student_sclass = $_POST[$sclass];
    
            $sql = "select * from $stud where $sid=$student_sid";
            $queryExe = mysqli_query($con,$sql);
            $data = mysqli_num_rows($queryExe);
    
            if($data){
                ?>
                    <script>    
                        alert("Student Exists !")
                    </script>
                <?php
            } else {
    
                $insert = "insert into $stud values ($student_sid,'$student_sname','$student_sclass')";
                $queryExe = mysqli_query($con,$insert);
    
                if($queryExe)
                {
                    ?>
                        <script>    
                            alert("Student Added !")
                            window.open("http://localhost/paper4/index.php","_self")
                        </script>
                    <?php
                }
    
            }
        }
        ?>
            <center>
                <table border=1px>
                <tr>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>Student Class</th>
                    <th colspan=2>Action</th>
                </tr>
                <tr>
                    <?php
                        include "init.php";
                        $sql = "select * from $stud";
                        $queryExe = mysqli_query($con,$sql);
                        $data = mysqli_num_rows($queryExe);
                        if ($data){
                            while ($row = mysqli_fetch_array($queryExe)){
                                ?>
                                    <tr>
                                    <td>
                                        <?php echo $row[$sid]; ?>
                                    </td>
                                    <td>
                                        <?php echo $row[$sname]; ?>
                                    </td>
                                    <td>
                                        <?php echo $row[$sclass]; ?>
                                    </td>
                                    <td>
                                        <a href="update.php?sid=<?php echo $row[$sid]; ?>">Update</a>
                                    </td>
                                    <td>
                                        <a href="delete.php?sid=<?php echo $row[$sid]; ?>">Delete</a>
                                    </td>
                                    </tr>
                                <?php
                            }
                        }
                    ?>
                </tr>
                </table>
            </center>
        <?php
    }
?>