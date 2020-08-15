<?php
    include 'config.php';
    // include 'index.php';

    $update = false;
    
    $id =  "";
    $name =  "";
    $email = ""; 
    $phone =  "";
    $photo =  "";


    if(isset($_POST['add'])){
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['mobile'];

        $photo = $_FILES['image']['name'];
        // echo $photo."<br>";
        $upload = "picture/".$photo;

        $sql = "INSERT INTO `employee`(`name`, `email`, `phone`, `photo`) VALUES ('$name','$email','$phone','$upload')";
        $result = mysqli_query($conn,$sql);
        move_uploaded_file($_FILES['image']['tmp_name'],$upload);
        header('location:index.php');
       

    }

    if(isset($_GET['id'])){
        $id =$_GET['id'];

        //deleting photo from file
        $del_photo = "SELECT photo FROM `employee` WHERE id = '$id'";
        $dele_res = mysqli_query($conn,$del_photo);

        $row = mysqli_fetch_assoc($dele_res);
        $imagepath = $row['photo'];
        unlink($imagepath);

     
        $sql = "DELETE FROM `employee` WHERE id = '$id'";

        header('location:index.php');

        $result = mysqli_query($conn , $sql);
        if(!result){
            die ("error").mysqli_connect_error();
        }
        else{
            echo "deleted";
        }
        
    }
    //edit

    if(isset($_GET['edit'])){
        $id =$_GET['edit'];

        //editing 
        $edit_query = "SELECT * FROM `employee` WHERE id = '$id'";
        $edit_res = mysqli_query($conn,$edit_query);

        // echo var_dump($edit_res);

        $row = mysqli_fetch_assoc($edit_res);
        
        $id = $row['id'];
        $name = $row['name'];
        $email = $row['email'];
        $phone = $row['phone'];
        $photo = $row['photo'];

        $update = true;

    }

    // update

    if(isset($_POST['update'])){

        echo "data not fetching";
        $id = $_POST['id'];
        $name = $_POST['name'];

        $email = $_POST['email'];
        $phone = $_POST['mobile'];
       $old_image = $_POST['oldimage'];
    
        
        if(isset($_FILES['image']['name']) && ($_FILES['image']['name'] != "")){
            $new_image ="picture/".$_FILES['image']['name'];
            unlink($old_image);
            move_uploaded_file($_FILES['image']['tmp_name'],$new_image);
        }
        else{
            $new_image =$old_image;
        }
        $sqli = "UPDATE `employee` SET `name`= '$name',`email`='$email',`phone`='$phone',`photo`='$new_image' WHERE id = '$id'";    
        // echo var_dump($sql);
        $result_1 = mysqli_query($conn , $sqli);
        header('location:index.php');
    }

    // details
    if(isset($_GET['details'])){
        $id = $_GET['details'];
        $sql = "SELECT * FROM `employee` WHERE id='$id'";
        $result = mysqli_query($conn,$sql);

        $row = mysqli_fetch_assoc($result);
        $print_id = $row['id'];
        $print_name = $row['name'];
        $print_email  = $row['email'];
        $print_phone = $row['phone'];
        $print_photo = $row['photo'];
    }
?> 