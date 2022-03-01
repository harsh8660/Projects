<html>
    <head>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style> 
        .nav_bar{
            width:100%;
            height: 70px;
            margin-top: 0px;
            display: block;
           /* background-color: rgba(50,50,50,0.1);*/
           box-shadow: 0px 2px 1px 1px rgba(240,240,240,0.6);
           border-radius: 5px;
            float: left;
        }
        .navbar_list{
            width:100%;
            display:inline-block;
            height:90%;
            margin:10px 0px 10px 0px;
            list-style-type: none;
            overflow: hidden;
        }
        #navbar_item{
            height:100%;
            width:8%;
            
            float: left;
        }
        #navbar_item a{
            display: inline-block;
            
            text-decoration: none;
            width:100%;
            height:100%;
            text-align: center;
            font-size: 15px;
            color:black;
            font-weight: 500;
            padding: 20px 10px 20px;
        }
        #navbar_item:hover{
            border-bottom: 4px solid rgba(255, 99, 71, 0.8);
        }
        .search_box{
            outline: none;
            border-top: grey;
            border-right: grey;
            border-left: grey;
            width:300px;
            height:30px;            
        }
        </style>
    </head>
    <body>
        <div class="nav_bar">
            <div class="navbar_item">
                <ul class="navbar_list">
                    <li id="navbar_item"><a href="HomePage.php"><i class="fa fa-home" style="font-size:22px;color:black;"></i>HOME</a></li>
                    <li  id="navbar_item"><a href="MenProduct.php">MEN</a></li>
                    <li  id="navbar_item"><a href="WomenProduct.php">WOMEN</a></li>
                    
                    <li  id="navbar_item"><a href="InsertProducts.php">PRODUCT</a></li>
                    
                    <li style="margin-left:400px;margin-top:10px;width:auto;"  id="navbar_item"><input type="text" placeholder="Search" class="search_box"></li>
                    <li  id="navbar_item" style="margin-left:50px;width:50px;"><a href="Cart.php"><i class="fa fa-shopping-bag" style="font-size:20px;"></i></a></li>
                    <li  id="navbar_item" style="width:50px;"><a href="UserLogin.php"><i class="fa fa-user" style="font-size:20px"></i></a></li>
                    
                </ul>
            </div>
        </div><br>
       
      
        </body>
</html>