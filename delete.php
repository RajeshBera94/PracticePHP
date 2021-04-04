<?php
include 'dbcon.php';
$id = $_GET['id'];

$deletequiry = "delete from user where id = $id";
$quiryrun = mysqli_query($conn,$deletequiry);
if($quiryrun){

    echo "Delete Sucessfully";
    ?>
    <script>
    location.href = "list.php";
    </script>
    <?php
}else{
    echo "delete Failed";
}
?>