<?php 
session_start();
if($_SESSION['ID']==false){
    $_SESSION['status']="Please!Login First to Buy Product";
    header("location:UserLogin.php");
}
else
{
    include 'config.php';
    $ProductID=$UserID=$UserEmail="";
    if(isset($_POST['Submit']))
    {
        $ProductID=$_POST['ProductID'];
        $UserID=$_SESSION['ID'];
        $UserEmail=$_SESSION['EmailID'];
    }
    echo $UserID;
    $TableName="orders";
    $table_create="CREATE TABLE IF NOT EXISTS $TableName
    (
        OrderID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        ProductID INT NULL,
        
        UserID INT NULL,
        
        UserEmail VARCHAR(255),
        
        Quantity INT NULL
    )";
    $quantity=1;
    if(!mysqli_query($conn,$table_create))
    echo mysqli_error($conn);
    $sql="INSERT INTO $TableName (ProductID,UserID,UserEmail,Quantity) VALUES('$ProductID','$UserID','$UserEmail',$quantity)";
    if(!mysqli_query($conn,$sql)){
    $_SESSION['status']="SORRY! Product Has Not Been Added To Your Cart";
    header("location:MenProduct.php");
    }
    else
    {
        $_SESSION['status']="CONGTRATULATIONS! Product Has Been Added To Your Cart";
        header("location:MenProduct.php");
    }
}
?>