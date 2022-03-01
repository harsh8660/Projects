<?php 
session_start();
?>
<html>
    <head>
        <style>
            .search_box{
                outline: none;
                border-top: grey;
                border-right: grey;
                border-left: grey;
                width:300px;
                height:30px;            
            }
            #input_box{
                outline: none;
                width:300px;
                height:40px;
                margin-top: 50px;
                margin-left:50px;
                border-color: rgba(50,50,50,0.1);
                border-top: rgba(50,50,50,0.1);
                border-right: rgba(50,50,50,0.1);
                border-left: rgba(50,50,50,0.1);
                border-radius: 5px;
            }
            #insert_form{
                width:30%;
                height:450px;
                margin-left: 20px;
                margin-top: 50px;
                background-color: rgba(50,50,50,0.1);
            }
            #alert_text{
                padding-top: 0px;
                font-size: 20px;
            }
            #page_block{
                background-image: url('images/back.jpg');
                background-size: 100%;
                margin-top: 50px;
                height:100%;
                padding-top: 30px;
            }
            #insert_form:hover{
                transition: 0.3s;
                transform: translate(0, -10px);
            }
            .new_user{
                color:white;
                margin-left: 200px;
                margin-top: 20px;
            }
        </style>
    </head>
    <body>
        <?php
            include 'NavigationBar.php';
        ?>
        
        <div id="page_block">
            <?php 
            if(isset($_SESSION['status']))
            {
            ?>
            <div class="alert alert-warning fade show" role="alert" style="margin-top:0px;height:50px;">
                <span id="alert_text"><?php echo $_SESSION['status'] ?></span>
                <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close" style="float:right;size:20px;">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php 
            }
            unset($_SESSION['status']);
        ?>
        <div id="insert_form">
        <form  method="POST" action="Login_db.php">
            <h1 style="margin-left:110px;color:white;font-weight:bolder;padding-top:50px;text-decoration:underline;font-family:Georgia, 'Times New Roman', Times, serif;">LOGIN</h1>

            <input type="mail" placeholder="USERNAME/E-MAiL ID" id="input_box" name="UserName" required><br>

            <input type="password" placeholder="PASSWORD" id="input_box" name="UserPassword" required><br>

            <button type="submit" class="btn btn-danger" style="width:300px;height:40px;margin-top:50px;margin-left:50px;" name="Submit">Log IN</button> 

            <button type="submit" class="btn btn-alert new_user"><a href="CustomerReg.php" style="color:white;">New User?Register</a></button>
        </form>
        </div>
        </div>
        <?php 
        
         /*   include 'config.php';
            $TableName="userdetails";
            $UserID=$_SESSION['ID'];
            $query=mysqli_query($conn,"SELECT * FROM $TableName WHERE ID='$UserID'");
            if(!$query)
            {
                $err=mysqli_errno($conn);
                $_SESSION['status']="Error!$err";
                header("location:HomePage.php");
            } 
            $row=mysqli_fetch_assoc($query);
            $Name=$row['Name'];
            echo "
            <div id=\"user_profile\">
            <h4>Name</h4>
            
            </div>";*/
        
        ?>
    </body>
</html>
