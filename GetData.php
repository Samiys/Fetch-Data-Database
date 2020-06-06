<?php
session_start();

// Create connection
$link = mysqli_connect("localhost", "root", "root", 'FetchData');
// Check connection
if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_GET['function'] == "logout") {

    session_unset();

}

?>

<style>
    table, th, td {
        border: 1px solid black;
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
<html>
<head>
    <title>Fetch Data by ID</title>
<body>
    <center>
        <h1>Search Record from Database By Entering Id</h1>

    <div class="search">
        <form action="" method="post">
            <input type="text" name="id" placeholder="Enter Emp ID">
            <input type="submit" name="search" value="Search By ID">
        </form>
    </div>
    </center>

    <center>
    <table class="tb" style="width: 50%">
        <tr>
            <th>ID</th>
            <th>Firstname</th>
            <th>Lastname</th>
        </tr>


        <?php

        if(isset($_POST["search"]))
        {
            $id = $_POST['id'];

            $res=mysqli_query($link,"select * from record where id='$id'");

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
            <td> <?php echo $row['firstname']; ?> </td>
            <td> <?php echo $row['lastname']; ?> </td>
        </tr>
    </table>

            <div class="img">
         <?php
            echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="500" width="500"/>';
            echo "<br>";
         ?>
<!--            <a href="delete.php?id=--><?php //echo $row["id"]; ?><!--">Delete</a>-->
            </div>
         <?php
            }
        }
         ?>


        </center>
</body>
</html>