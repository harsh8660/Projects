<?php
    session_start();
?>
<html>
    <head>
        <style> 
         #alert_text
        {
            padding-top: 0px;
            font-size: 20px;
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
            unset($_SESSION['status']);
        ?>
        
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" style="margin-top:50px;">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="5000">
            <img src="images/carousel1.webp" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="5000">
            <img src="images/carousel2.webp" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="5000">
            <img src="images/carousel3.jpg" class="d-block w-100" alt="...">
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon bg-dark"  aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>

        </div>
        <h1>
    </body>
</html>