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

    <div class="container" style="margin-top : 25px">
    <div class="row">
        <?php foreach($ReviewData as $review) { ?>
        <div class="col-sm-3">
            <img src="<?php echo base_url(); ?>images/<?php echo $review->image; ?>.jpg" class="img-fluid" alt="Responsive image" >
        </div>

        <div class="col-sm-9">
            <p><?php echo $review->review_text; ?></p>
        </div>
        <?php } ?>
        
        <!-- Add comment space -->
        <div class="col-sm-12" style="margin-top : 5%">
        <form method="POST" id="review_form" action="./add_comment">

            <!-- fields of the registration form -->

            <div class="form-group">  
                <textarea maxlength="1000" style="width : 100%; border-radius : 3px; border : 1px solid #d9d9d9" id="review" name="review" placeholder="Start writing here..." form="review_form"></textarea>
                <span class="text-danger"><?php echo form_error('review'); ?></span>
            </div>

            <div class="form-group">
                <input type="submit" name="comment" value="Add Comment" class="btn btn-primary" />
            </div>

        </form>
        </div>
        
        <!-- Comment space -->
        <div class="col-sm-12">
            <?php foreach($CommentData as $comment) { ?>

            <?php } ?>
        </div>
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