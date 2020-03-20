<!doctype html>
<html lang = "en">
<head id="header">

    <!-- show the title of the web page -->
    <title>Games Review</title>

    <!-- required bootstrap meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- load in bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css" crossorigin="anonymous">


    <!-- load the header -->
    <?php $this->load->file('C:/xampp/htdocs/Games_Review/application/views/header.php'); ?>

</head>
<body>

    <!-- SOME RELEVANT INFORMATION
         each REVIEW image has dimensions of 459x570;
         each CAROUSEL item image has dimensions of 1082x340;
         currently, CAROUSEL only uses non-dynamic records of reviews that are preset!!;
    -->

    <div class="container">
    <div class="row">

        <!-- Bootstrap carousel element -->
        <div class="col-sm-12">
            <div id="reviewCarousel" class="carousel slide pointer-event col-sm-12" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    
                    <!-- Non-dynamic carousel item 1 -->
                    <div class="carousel-item active">
                        <a href="<?php echo base_url(); ?>index.php/review/5"><img class="d-block w-100" src="<?php echo base_url(); ?>images/witcher3.png" data-holder-rendered="true"></a>
                        <div class="carousel-caption">
                            <p style="color: black" align="right">Featured review</br><b>Witcher 3: Blood and Wine</b></p>
                        </div>
                    </div>

                    <!-- Non-dynamic carousel item 1 -->
                    <div class="carousel-item">
                        <a href="<?php echo base_url(); ?>index.php/review/6"><img class="d-block w-100" src="<?php echo base_url(); ?>images/darksouls3wide.png" data-holder-rendered="true"></a>
                        <div class="carousel-caption">
                            <p align="right">Featured review</br><b>Dark Souls 3</b></p>
                        </div>
                    </div>

                </div>
                <a class="carousel-control-prev" href="#reviewCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#reviewCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

        <!-- Heading on the review page -->
        <div style="margin-top : 25px" class="col-sm-12" align="center">
            <h1>Latest Reviews</h1>
        </div>

        <!-- Review elements on the home page -->
        <?php foreach($Reviews as $review) { ?>
        <div class="col-sm-4" style="margin-top : 50px; margin-bottom : 50px">
            <h3 style="font-family : Verdana; background : #e6e6e6; margin : 0px; padding : 5px; border-radius: 15px 15px 0px 0px"><?php echo $review->title; ?></h3>

            <!-- Image link, click on the image to hop to the review which has this photo displayed -->
            <a href="<?php echo base_url(); ?>index.php/review/<?php echo $review->review_id?>"><img style="border-radius: 0px 0px 15px 15px" src="<?php echo base_url(); ?>images/<?php echo $review->image; ?>.jpg" class="img-fluid" alt="Responsive image"></a>
        </div>
        <?php } ?>
        
    </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
<footer>
    <!-- Connect the website footer to the webpage -->
    <?php $this->load->file('C:/xampp/htdocs/Games_Review/application/views/footer.php'); ?>
</footer>