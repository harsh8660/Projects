<?php 
session_start();
include 'config.php';
if(isset($_POST['Submit']))
{
    $ProductID=$_POST['ProductID'];
    $TableName="orders";
    $UserID=$_SESSION['ID'];
    $query="DELETE FROM $TableName WHERE UserID='$UserID' AND ProductID='$ProductID'" ;
    
    if(!mysqli_query($conn,$query))
    {
        $_SESSION['status']="Sorry! Product not Removed";
        header("location:Cart.php");
    }
    else{
        $_SESSION['status']="Product has been Removed";
        header("location:Cart.php");
    }
}
?>