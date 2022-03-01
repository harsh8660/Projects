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
                margin-top: 50px;
                float: left;
                margin-left: 15%;
                border-color: grey;
                border-top: grey;
                border-right: grey;
                border-left: grey;
            }
            #insert_form{
                margin-top: 80px;
                display: block;
                width:80%;
                height:90%;
                margin-left:10%;
                box-shadow: 2px 2px 4px 2px lightgray;
            }
            #insert_form:hover{
                transform: translate(0,-5px);          
                transition: 0.5s;
                border-radius: 5px;
            }
            #alert_text{
                padding-top: 0px;
                font-size: 20px;
            }
            #sel_gender{
                width:300px;
                outline :none;
                border-bottom: 2px solid grey;
                border-color: grey;
                border-top: grey;
                border-right: grey;
                border-left: grey;
            }
            .form_heading{
                margin-left: 30%;
                text-decoration: underline;
                font-weight: bold;
                text-shadow: 3px 3px lightgrey;
                font-family: Georgia, 'Times New Roman', Times, serif;
            }
            #add_column{
                width:50%;
                height:80%;
                float: left;

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
                <span id="alert_text">Congratulation!<?php echo $_SESSION['status'] ?></span>
                <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close" style="float:right;size:20px;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php 
            }
            session_unset();
        ?>
            
            <form id="insert_form" method="POST" action="Product_db.php" enctype="multipart/form-data">

                <h1 class="form_heading">ADD PRODUCT</h1>

                <div id="add_column">

                    <input type="text" placeholder="Brand Name" id="input_box" name="BrandName" required><br>

                    <input type="text" placeholder="Product Name" id="input_box" name="ProductName" required><br>
                    
                    <input type="text" placeholder="Type e.g Shirt,Trouser" id="input_box" name="ProductType" required><br>
                    
                    <input type="number" placeholder="Price" id="input_box" name="ProductPrice" required><br>

                </div>

                <div id="add_column">
                    <input type="number" placeholder="Discount%" id="input_box" name="ProductDiscount" required><br>

                    <input type="file" placeholder="Upload Image" id="input_box" name="ProductImage" required><br>

                    <input type="file" placeholder="Upload Image" id="input_box" name="ProductImage2" required><br>
                    

                    <select id="sel_gender" name="Gender" style="margin-left:15%;margin-top:65px;" required>
                        <option type="radio" name="NONE" value="MALE">
                            <label>SELECT GENDER</label>
                        </option>
                        <option type="radio" name="Gender" value="MALE">
                            <label>Male</label>
                        </option>

                        <option type="radio" name="Gender" value="FEMALE">
                            <label>Female</label>
                        </option>       
                    </select>

                </div>
                <button type="submit" class="btn btn-danger" style="width:300px;height:40px;margin-left:35%;margin-bottom:5px;" name="Submit">Add</button> 
            </form>
        
    </body>
</html>