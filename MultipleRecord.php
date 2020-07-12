<?php
include 'connection.php';
?>

<style>
    table, th, td {
        border: 1px solid black;
        border-collapse:  collapse;
        border-spacing:   0;
    }
    .search {
        margin-top: 2%;
    }
    .tb {
        margin-top: 4%;
    }
    .img {
        display: block;
        margin-left: auto;
        margin-right: auto;
        margin-top: 4%;
    }
</style>

<html>

<head>
    <title>Fetch Data by ID</title>
    </head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<body>
    <center>
        <h1>Search Record from Database By Entering ID</h1>

    <div class="search">
        <form action="" method="post">
            <input type="text" name="empid" placeholder="Enter Emp ID">
            <input type="submit" name="search" value="Search By ID">
        </form>
    </div>
    </center>

    <center>

        <table class="tb" style="width: 50%">
            <tr>
            <th>ID</th>
            <th>Employee ID</th>
            <th>First Name</th>
            <th>Last Name</th>
        </tr>
        <?php

        if(isset($_POST["search"]))
        {
            $empid = $_POST['empid'];

            $res=mysqli_query($link,"select * from record where empid='$empid'");

            if (mysqli_num_rows($res) == 0)
            {
                echo"<script language='javascript'>
                   alert(\"Record Not found!\");
                </script>
                ";
            }

            while($row=mysqli_fetch_array($res))
            {
        ?>
            
            <tr>
            <td> <?php echo $row['id']; ?> </td>
            <td> <?php echo $row['empid']; ?> </td>
            <td> <?php echo $row['firstname']; ?> </td>
            <td> <?php echo $row['lastname']; ?> </td>
        </tr>
    
                
         <?php
            }
        }
         ?>
            </table>
        
        <?php
        $res=mysqli_query($link,"select * from record where empid='$empid'");
        while($row=mysqli_fetch_array($res))
            {
        ?>
        
        <div class="img">
         <?php
            echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="300" width="300"/>';
            echo "<br>";
         ?>
            <td> <?php echo $row['firstname']; ?> </td>
<!--            <a href="delete.php?id=--><?php //echo $row["id"]; ?><!--">Delete</a>-->
            </div>
        <?php
        }
        ?>
            

        </center>
</body>
</html>