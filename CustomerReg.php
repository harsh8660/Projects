<?php 
session_start();
?>
<html>
    <head>
        <style>
            #input_box{
                outline: none;
                width:300px;
                height:40px;
                margin-left: 20%;
                margin-top: 50px;
                border-color: grey;
                border-top: grey;
                border-right: grey;
                border-left: grey;
            }
            #insert_form{
                width:40%;
                height:500px;
                margin-left:61%;
                background-color: white;
                margin-top: 80px;
            }
            #alert_text{
                padding-top: 0px;
                font-size: 20px;
            }
            .form_heading{
                margin-left: 25%;
                font-weight: bold;
                text-shadow: 3px 3px lightgrey;
                font-family: Georgia, 'Times New Roman', Times, serif;
            }
            #img_block{
                width:60%;
                height:90%;
                object-fit: contain;
               float:left;
            }
        </style>
    </head>
    <body>
        <?php
            include 'NavigationBar.php';
            if(isset($_SESSION['status']))
            {
            ?>
            <div class="alert alert-warning fade show" role="alert" style="margin-top:50px;height:50px;">
                <span id="alert_text"><?php echo $_SESSION['status'] ?></span>
                <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close" style="float:right;size:20px;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php 
            }
            session_unset();
        ?>
      

        
        <form id="insert_form" method="POST" action="CustomerReg_db.php">

            <h3 class="form_heading">REGISTRATION</h3>

            <input type="text" placeholder="Full Name" id="input_box" name="Name" required><br>

            <input type="text" placeholder="Mobile Number" id="input_box" name="MobileNo" required><br>

            <input type="text" placeholder="Address" id="input_box" name="UserAdd" required><br>

            <input type="mail" placeholder="E-mail" id="input_box" name="UserName" required><br>
             
            <input type="password" placeholder="Password" id="input_box" name="UserPassword" required><br>

            <button type="submit" class="btn btn-danger" style="width:300px;height:40px;margin-top:50px;margin-left:20%;" name="Submit">Add</button> 
        </form>
    </body>
</html>