<?php foreach($ReviewData as $review) { ?>
<!doctype html>
<html lang = "en">
<head id="header">

    <!-- show the title of the web page -->
    <title><?php echo $review->title; ?></title>

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

        <div class="col-sm-12">
            <?php if (isset($_SESSION['success'])) { ?>
                <div class="alert alert-success"> <?php echo $_SESSION['success']; ?></div>
            <?php } ?>
            <?php if (isset($_SESSION['error'])) { ?>
                <div class="alert alert-warning"> <?php echo $_SESSION['error']; ?></div>
            <?php } ?>
        </div>

        <div class="col-sm-4">
            <img src="<?php echo base_url(); ?>images/<?php echo $review->image; ?>.jpg" class="img-fluid" alt="Responsive image" >
        </div>

        <div class="col-sm-8">
            <p><?php echo $review->review_text; ?></p>
            <p><i>Review by <?php echo $review->name; ?> aka '<?php echo $review->username; ?>' </i></p>
        </div>
        
        <!-- Add comment space -->
        <div class="col-sm-12" style="margin-top : 5%">
        <form method="POST" id="comment_form" action="<?php echo base_url(); ?>index.php/add_comment">

            <!-- fields of the registration form -->

            <div class="form-group">  
                <input type="hidden" name="review_id" id="review_id" value="<?php echo $review->review_id ;?>" />
            </div>

            <div class="form-group">  
                <textarea maxlength="1000" style="width : 100%; border-radius : 3px; border : 1px solid #d9d9d9" id="comment_text" name="comment_text" placeholder="Start writing here..." form="comment_form"></textarea>
                <span class="text-danger"><?php echo form_error('comment_text'); ?></span>
            </div>

            <div class="form-group">
                <input type="submit" name="comment" value="Add Comment" class="btn btn-primary" />
            </div>

        </form>
        </div>
        
        <!-- Load comments from the database -->
        <div class="col-sm-12">
            <?php foreach($CommentData as $comment) { ?>
                <div style="background : #d9d9d9; border-radius : 15px; padding : 20px; margin-bottom : 10px">
                    <p><?php echo $comment->comment_text;?><i></p>
                    <p style="font-size : 13px"> by <?php echo $comment->FK_comment_username; ?></i></p>
                </div>
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
<?php } ?>
