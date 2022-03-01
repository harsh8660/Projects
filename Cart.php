<?php 
session_start();
if(isset($_SESSION['ID'])==false)
{
    $_SESSION['status']="Please! Login First to See Cart";
    header("location:UserLogin.php");
}

?>
<html>
    <head>
        <style> 
        
        .brand_name{
            overflow: hidden;
            white-space: nowrap;
            display: inline-block;
            width:100%;
            font-weight: bolder;
            margin-top:5px ;
            margin-left: 5px;
            font-size: large;
        }
        #product_image{
            width:100%;
            display: inline-block;
            height:75%;
            margin-top:0px
        }
        #cart_item{
            width:26%;
            height:440px;
            background-color: white;
            margin-left:30px;
            margin-top: 5px;
            box-shadow: 2px 2px 4px 2px lightgray;
            float: left;
            margin-top: 80px;
        }
        .product_detail{
            text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;
            display: inline-block;
            margin-left: 5px;
            width:100%;
        }
        .price_d{
            text-decoration:line-through;
            margin-left:5px;
            font-weight: lighter;
            font-size: small;
            color:grey;
        }
        #cart_total{
            margin-right: 20px;
            box-shadow: 2px 4px 4px 3px lightgray;
            margin-bottom: 20px;
            margin-top: 40%;
            height:auto;
            padding-bottom: 10px;
            width:98%;   
            
        }
        #heading{
            float: left;
            width:50%;
            justify-content: space-between; 
        }
        #cart_total:hover{
            box-shadow: 2px 2px 4px 2px lightgray; 
            transform: translate(0,-5px);          
            transition: 0.5s;
            border-radius: 5px;
        }
        .page_block{
            width:100%;
            height:100%;
            
            margin-top: 60px;
        }
        #item_block{
            float:left;
        }
        </style>
    </head>
    <body>
    <?php 
        include 'NavigationBar.php';
        include 'config.php';
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
            unset($_SESSION['status']);
        ?>

    <div class="page_block">
        <div id="item_block" style="width:70%;">

            <?php 
                $ans=0;
                $quantity=0;
                $TotalPrice=0;
                $TableName="orders";
                
                $UserID=$_SESSION['ID'];

                $sql="SELECT * FROM $TableName WHERE UserID='$UserID'";

                $query=mysqli_query($conn,$sql);

                if(mysqli_num_rows($query)>0)
                {
                    while($row=mysqli_fetch_array($query))
                    {
                        $TableName="ProductData"; 

                        $ProductID=$row['ProductID']; //1

                        $query1=mysqli_query($conn,"SELECT * FROM $TableName WHERE ProductID='$ProductID'");

                        while($row=mysqli_fetch_array($query1))
                        {
                            $imageurl="images/".$row['ProductImage'];
                            global $quantity;
                            $quantity+=1;

                            CartProduct($row['ProductName'],$row['Brand'],$imageurl,$row['ProductPrice'],$row['ProductID']);
                        }
                    }
                }
                else{
                    echo "<h1 style=\"margin-left:20%;\">Sorry!There is Currently No Item in the Cart.</h1>";
                }
                function CartProduct($ProductName,$ProductBrand,$ProductImage,$ProductPrice,$ProductID)
                {
                    global $ans,$TotalPrice;
                    
                    $ans+=$ProductPrice;
                    $PrevPrice=$ProductPrice+($ProductPrice*30)/100;
                    $TotalPrice+=$PrevPrice;
                    echo "
                    <div id=\"cart_item\">
                        <form method=\"POST\" action=\"RemoveItem.php\">
                            <img src=\"$ProductImage\" id=\"product_image\">
                            <span class=\"brand_name\">$ProductBrand</span>
                            <span class=\"product_detail\">$ProductName</span>
                            <span><b style=\"margin-left:5px;\">Rs$ProductPrice</b><span class=\"price_d\">$PrevPrice</span></span>
                            <input type=\"hidden\" name=\"ProductID\" value=\"$ProductID\">
                            <button name=\"Submit\" type=\"submit\"class=\"btn btn-danger\" style=\"margin-left:25px;width:110px;margin-right:3px;display:inline-block;\" >Remove</button>
                        </form>
                    </div>";
                }
                ?>
        </div>
        <div id="item_block" style="width:30%;margin-top:100px;">
            <?php 
            $TableName="orders";
            $DiscountPrice=$TotalPrice-$ans;
            $query=mysqli_query($conn,"SELECT ProductID FROM $TableName WHERE UserID='$UserID'");
            echo"
            <div id=\"cart_total\" class=\"container\">
            <h3 style=\"margin-left:25%;Text-decoration:underline;\">PRICE DETAILS</h3>    
                <div class=\"row\">
                    <div id=\"heading\" class=\"col\">
                        
                        <span>Items</span><br>
                        <span>Total MRP</span><br>
                        <span>DISCOUNT</span><br><hr>
                        <b>Total Amount</b>
                    </div>
                    <div id=\"heading\" class=\"col\" style=\"margin-left:40%;\">
                        <b>$quantity</b><br>
                        <b>Rs $TotalPrice</b><br>
                        <b style=\"color:green;\">-$DiscountPrice</b><br><hr>
                        <h5>Rs $ans</h5>
                    </div>
                </div>
            </div>";
            ?>
        </div>
    </div>
    </body>
</html>