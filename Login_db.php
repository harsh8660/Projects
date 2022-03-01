<?php 
    session_start();
    $_SESSION['ID']=0;
    include 'Variables.php';
    $conn=mysqli_connect($HostName,$DBUser,$DBPassword);
    if(isset($_POST['Submit']))
    {
        $UserName=mysqli_real_escape_string($conn,$_POST['UserName']);
        $Password=md5(mysqli_real_escape_string($conn,$_POST['UserPassword']));
    }
        $DatabaseName="userdata";
        $TableName="userdetails";
        $conn=mysqli_connect($HostName,$DBUser,$DBPassword,$DatabaseName);

        $res=mysqli_query($conn,"SELECT * FROM $TableName Where UserName='$UserName'");
        if(mysqli_num_rows($res)>0)
        {    
            $row=mysqli_fetch_assoc($res);
            if($Password===$row['Password'])
            {
                $_SESSION['status']="Congratulations! You have successfully Logged In";
                $_SESSION['ID']=$row['ID'];
                $_SESSION['EmailID']=$row['UserName'];
                header('location:HomePage.php');
            }
            else 
            {
                $_SESSION['status']="Sorry! Incorrect Password.";
               header("location:UserLogin.php");
            }
        }
        else
        {
            $_SESSION['status']="Sorry! Incorrect Username/Emaiil ID.";
            header("location:UserLogin.php");
            
        }
?>