<?php 
    session_start();
    include 'Variables.php';
    $conn=mysqli_connect($HostName,$DBUser,$DBPassword);
    if(isset($_POST['Submit']))
    {
        $Name=mysqli_real_escape_string($conn,$_POST['Name']);
        $UserName=mysqli_real_escape_string($conn,$_POST['UserName']);
        $Password=md5(mysqli_real_escape_string($conn,$_POST['UserPassword']));
        $Address=mysqli_real_escape_string($conn,$_POST['UserAdd']);
        $MobileNo=mysqli_real_escape_string($conn,$_POST['MobileNo']);
    }

    $DatabaseName="UserData";

    $db_create=mysqli_query($conn,"CREATE DATABASE IF NOT EXISTS $DatabaseName");

    $conn=mysqli_connect($HostName,$DBUser,$DBPassword,$DatabaseName);
    if(!$conn)
    echo mysqli_connect_error($conn);
    else
    {
        $TableName="UserDetails";
        $db_table="CREATE TABLE IF NOT EXISTS $TableName
        (
            ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
            Name VARCHAR(30) NULL,
            MobileNo VARCHAR(12) NULL,
            Address VARCHAR(255) NULL,
            UserName VARCHAR(255) NULL,
            Password VARCHAR(255) NULL
        )";
        if(mysqli_query($conn,$db_table))
        {
            $_SESSION['status']="Sorry! Cannot Connect to Database";
            header("location:CustomerReg.php");
        }
        $res=mysqli_query($conn,"SELECT UserName FROM $TableName Where UserName='$UserName'");
        if(mysqli_num_rows($res)>0)
        {     
            $_SESSION['status']="Sorry! Username already exists.Please Use another Email ID";
             header("location:CustomerReg.php");
            exit(0);
        }
        else 
        {
            $insert="INSERT INTO $TableName(Name,MobileNo,Address,UserName,Password) VALUES('$Name','$MobileNo','$Address','$UserName','$Password')";
            if(!mysqli_query($conn,$insert))
            {   
                $_SESSION['status']="Data Cannot be Inserted";
                header("location:CustomerReg.php");
            }
            else
            {
                $_SESSION['status']="Congratulations! You have successfully registered";
                header('location:HomePage.php');
                exit(0);
            }
        }
    }

?>