<?php
    
    session_start();

    $mysqli = new mysqli('localhost','root', '','slatkisi') or die(mysqli_error($mysqli));

    $naziv='';
    $sastojci='';
    $vremePripreme='';
    $tip;
    $update=false;
    $id=0;

    if(isset($_POST['save'])){
        $naziv=$_POST['naziv'];
        $sastojci=$_POST['sastojci'];
        $vremePripreme=$_POST['vremePripreme'];
        $tip=$_POST['tip'];

        $mysqli -> query("INSERT INTO kolaci (naziv, sastojci, vremePripreme, tip) VALUES('$naziv', '$sastojci', '$vremePripreme', '$tip')") or die($mysqli->error);
    
        $_SESSION['message']="Record has been saved!";
        $_SESSION['msg_type']="success";

        header("location:recepti2.php");
    }

    if(isset($_GET['delete'])){
        $id=$_GET['delete'];

        $mysqli -> query("DELETE FROM kolaci  WHERE id=$id") or die($mysqli->error);
   
        $_SESSION['message']="Record has been deleted!";
        $_SESSION['msg_type']="danger";

        header("location:recepti2.php");
    }

    if(isset($_GET['edit'])){
        $id=$_GET['edit'];
        $update = true;
        $result = $mysqli->query("SELECT * FROM kolaci WHERE id=$id") or die($mysqli->error);
        if(mysqli_num_rows($result)==1){
            $row=$result->fetch_array();
            $naziv=$row['naziv'];
            $sastojci=$row['sastojci'];
            $vremePripreme=$row['vremePripreme'];
            $tip=$row['tip'];
        }
    }

    if(isset($_POST['update'])){
        $id=$_POST['id'];
        $naziv=$_POST['naziv'];
        $sastojci=$_POST['sastojci'];
        $vremePripreme=$_POST['vremePripreme'];
        $tip=$_POST['tip'];

        $mysqli->query("UPDATE kolaci SET naziv='$naziv', sastojci='$sastojci', vremePripreme='$vremePripreme', tip='$tip' WHERE id=$id") or die($mysqli->error);

        $_SESSION['message']="Record has been updated!";
        $_SESSION['msg_type']="warning";

        header("location:recepti2.php");
    }

?>