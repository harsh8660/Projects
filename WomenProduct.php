<?php 
session_start();
?>
<html>
    <head>
        <style> 
        .product_row{
            width:100%;
            height:430px;
            margin-top:80px;
        }
        .product_col{
            width:18%;
            height:100%;
            background-color: white;
            margin-left:70px;
            margin-top: 40px;
            float: left;
        }
        .price_d{
            text-decoration:line-through;
            margin-left:5px;
            font-weight: lighter;
            font-size: small;
            color:grey;
        }
        #product_image{
            width:100%;
            object-fit: contain;
            height:75%;
            margin-top:0px
        }
        .product_col:hover{
            box-shadow: 2px 2px 4px 2px lightgray; 
            transform: translate(0,-5px);          
            transition: 0.5s;
            border-radius: 5px;
        }
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
        .product_detail{
            text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;
            display: inline-block;
            margin-left: 5px;
            width:100%;
        }
        </style>
    </head>
    <body>
    <?php 
    include 'NavigationBar.php';
    ?>
    <div class="product_row">
<?php 
    include 'config.php';
    $TableName="productdata";
    $sql="SELECT * FROM $TableName WHERE GENDER='FEMALE'";
    $query=mysqli_query($conn,$sql);
    if(mysqli_num_rows($query)>0)
    {
        while($row=mysqli_fetch_array($query))
        {
            $imageurl="images/".$row['ProductImage'];
            $imageurl2="images/".$row['ProductImage2'];
            ShowProduct($row['ProductName'],$row['Brand'],$imageurl,$imageurl2,$row['ProductPrice'],$row['ProductID']);
        }
    }
    function ShowProduct($ProductName,$ProductBrand,$ProductImage,$ProductImage2,$ProductPrice,$ProductID){
        $PrevPrice=$ProductPrice+($ProductPrice*30)/100;
    echo "
        <div class=\"product_col\">
            <form method=\"POST\" action=\"BuyProduct.php\">
                <img src=\"$ProductImage\" onmouseout=\"this.src='$ProductImage';\" id=\"product_image\" onmouseover=\"this.src='$ProductImage2';\">
                <span class=\"brand_name\">$ProductBrand</span>
                <span class=\"product_detail\">$ProductName</span>
                <span><b style=\"margin-left:5px;\">Rs $ProductPrice</b><span class=\"price_d\">$PrevPrice</span></span>
                <input type=\"hidden\" name=\"ProductID\" value=\"$ProductID\">
                <button name=\"Submit\" type=\"submit\"class=\"btn btn-danger\" style=\"margin-left:25px;width:110px;margin-right:3px;\" >Buy Now</button>
            </form>
        </div>";
    }
?>
     </div>
    </body>
</html>