<!DOCTYPE html>
<html lang="en">
<head>
    <!-- show the title of the web page -->
    <title>Log In</title>

    <!-- required bootstrap meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- load in bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <!-- load the header -->
    <?php $this->load->file('C:/xampp/htdocs/Games_Review/application/views/header.php'); ?>

    <div class="container" style="width : 50%">
        <br />
        <h3 align="center">Enter your details</h3>
        <br />
        <div class="panel panel-default">
        <?php if (isset($_SESSION['error'])) { ?>
            <div class="alert alert-danger"> <?php echo $_SESSION['error']; ?></div>
        <?php } ?>
        <div class="panel-body">
            <!-- start the form for registration -->
            <form method="post" action="<?php echo base_url();?>index.php/login">
            <div class="form-group">
                <label>Username</label>
                <input type="text" id="username" name="username" class="form-control" value="<?php echo set_value ('username');?>" />
                <span class="text-danger"><?php echo form_error('username');?></span>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" id="password" name="password" class="form-control" value="<?php echo set_value('password'); ?>"/>
                <span class="text-danger"><?php echo form_error('password'); ?></span>
            </div>
            <div class="form-group">
                <input type="submit" name="login" value="Log In" class="btn btn-primary" />
        </div>
        </div>
  </div>


</html>