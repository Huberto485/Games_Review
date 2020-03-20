
<html lang = "en">
<div>

    <div class="jumbotron text-center" style="margin-bottom : 0px">
        <div class=".col-md-12">
            <h1 style="font-size: 100px"><b>GAMES REVIEW</b></h1>
        </div>
    </div>

    <!-- navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="padding-right : 10%; padding-left : 10%">
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

            <!-- 
            navigation bar items, each item is highlighted when its url is the current url -
            a base function of the CodeIgniter is used, 'current_url()', which checks the url
            that is currently in the browser 
            -->

            <li class="nav-item <?php if(current_url() == base_url() . "index.php") { echo 'active';} ?>">
                <a class="nav-link" href="<?php echo base_url(); ?>index.php">REVIEWS</a>
            </li>

            <li class="nav-item <?php if(current_url() == base_url() . "index.php/create_review_page") { echo 'active';} ?>">
                <a class="nav-link" href="<?php echo base_url(); ?>index.php/create_review_page">CREATE REVIEW</a>
            </li>

            <!-- check for the presence of user's tag, if it's present, display special functions -->
            <?php if(isset($_SESSION['username'])) { ?>

            <li class="nav-item <?php if(current_url() == base_url() . "index.php/profile") { echo 'active';} ?>">
                <a class="nav-link" href="<?php echo base_url(); ?>index.php/profile">PROFILE</a>
            </li>

            <li class="nav-item <?php if(current_url() == base_url() . "index.php/logout") { echo 'active';} ?>">
                <a class="nav-link" href="<?php echo base_url(); ?>index.php/logout">LOGOUT</a>
            </li>

            <?php ; } else { ?>

            <li class="nav-item <?php if(current_url() == base_url() . "index.php/login") { echo 'active';} ?>">
                <a class="nav-link" href="<?php echo base_url(); ?>index.php/login">LOGIN</a>
            </li>

            <li class="nav-item <?php if(current_url() == base_url() . "index.php/register") { echo 'active';} ?>">
                <a class="nav-link" href="<?php echo base_url(); ?>index.php/register">REGISTER</a>
            </li>

            <?php ; } ?>
            
            </ul>
        </div>
    </nav>

</div>