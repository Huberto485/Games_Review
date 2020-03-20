<!DOCTYPE html>
<html lang="en">
<head>
    <!-- show the title of the web page -->
    <title>Create Review</title>

    <!-- required bootstrap meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- load in bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>

    <!-- Navigation -->
    <?php $this->load->file('C:\xampp\htdocs\Games_Review\application\views\header.php'); ?>

    <!-- Main page frame -->
    <div class="container" style="width : 50%">
    <br />
    <!-- Title of the page -->
    <h3 align="center">Create Review</h3>
    <br />
        <div class="panel panel-default">
            <div class="panel-body">

                <!-- Messages on top of the page which are one-time messages from controller -->
                <?php if (isset($_SESSION['error'])) { ?>
                    <div class="alert alert-warning"> <?php echo $_SESSION['error']; ?></div>
                <?php } ?>

                <?php if (isset($_SESSION['success'])) { ?>
                    <div class="alert alert-success"> <?php echo $_SESSION['success']; ?></div>
                <?php } ?>
                
                <!-- start the form for registration -->
                <form method="POST" id="review_form" action="./create_review">

                    <!-- fields of the registration form -->
                    <div class="form-group">
                        <label>Enter Review Title*</label>
                        <input maxlength="50" type="text" id="title" name="title" class="form-control"/>
                        <span class="text-danger"><?php echo form_error('title');?></span>
                    </div>

                    <div class="form-group">
                        <label>Enter Image Link*</label>
                        <input maxlength="100" type="text" id="image" name="image" class="form-control" />
                        <span class="text-danger"><?php echo form_error('image'); ?></span>
                    </div>

                    <div class="form-group">  
                        <label>Enter Review text*</label>
                        <textarea maxlength="1000" style="width : 100%; border-radius : 3px; border : 1px solid #d9d9d9" id="review" name="review" placeholder="Start writing here..." form="review_form"></textarea>
                        <span class="text-danger"><?php echo form_error('review'); ?></span>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="createReview" value="Create Review" class="btn btn-primary" />
                    </div>

                </form>
                
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- Load in the footer -->
    <?php $this->load->file('C:\xampp\htdocs\Games_Review\application\views\footer.php'); ?>
</body>

</html>
