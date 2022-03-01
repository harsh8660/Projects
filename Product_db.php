<?php
    session_start();
    include 'Variables.php';
    $conn=mysqli_connect($HostName,$DBUser,$DBPassword);
    $DatabaseName="UserData";
    $db_create="CREATE DATABASE IF NOT EXISTS  $DatabaseName";
    if(!mysqli_query($conn,$db_create))
    {
        echo "Database Created".mysqli_error($conn);
    }
    $conn=mysqli_connect($HostName,$DBUser,$DBPassword,$DatabaseName);

    $Gender="";
    $targetDir=$fileName=$targetFilePath=$fileType="";
    $fileName2=$targetFilePath2="";

    if(isset($_POST['Submit']))
    {        
        if(!empty($_FILES["ProductImage"]["name"])){
        $targetDir = "images/";

        $fileName = basename($_FILES["ProductImage"]["name"]);

        $targetFilePath = $targetDir . $fileName;

        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
        }

        if(!empty($_FILES["ProductImage"]["name"])){
            $targetDir = "images/";

            $fileName2 = basename($_FILES["ProductImage2"]["name"]);

            $targetFilePath2 = $targetDir . $fileName2;

            $fileType = pathinfo($targetFilePath2,PATHINFO_EXTENSION);
            }

        $Price=$_POST['ProductPrice'];

        $BrandName=mysqli_real_escape_string($conn,$_POST['BrandName']);

        $ProductName=mysqli_real_escape_string($conn,$_POST['ProductName']); 

        $Gender=$_POST['Gender'];

        $ProductType=strtoupper(mysqli_real_escape_string($conn,$_POST['ProductType']));

        $Discount=mysqli_real_escape_string($conn,$_POST['ProductDiscount']);
    }
    else{echo "error";}
      

    $TableName="ProductData";
    $table_create="CREATE TABLE IF NOT EXISTS $TableName
    (
        ProductID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        Brand VARCHAR(255) NULL,
        ProductName VARCHAR(255) NULL,
        ProductType VARCHAR(255) NULL,
        ProductImage VARCHAR(255) NULL,
        ProductImage2 VARCHAR(255) NULL,
        ProductPrice INT NULL,
        Discount INT NULL,
        Gender VARCHAR(10) NULL
    )";

    mysqli_query($conn,$table_create);
    if(!mysqli_query($conn,$table_create))
    {
        echo "TableNot Creaated".mysqli_error($conn);
    }

    
        // Upload file to server
    if((move_uploaded_file($_FILES["ProductImage"]["tmp_name"], $targetFilePath)) && (move_uploaded_file($_FILES["ProductImage2"]["tmp_name"], $targetFilePath2))){
    $query="INSERT INTO $TableName(Brand,ProductName,ProductType,ProductImage,ProductImage2,ProductPrice,Discount,Gender) VALUES('$BrandName','$ProductName','$ProductType','$fileName','$fileName2','$Price','$Discount','$Gender')";

    if(!mysqli_query($conn,$query))
    {
        echo "NOT INSERTED".mysqli_error($conn);
    }
    else
    {
        $_SESSION['status']="Your Product have been Uploaded";
        header("location:InsertProducts.php");
    }
    exit(0);
}
   ?>