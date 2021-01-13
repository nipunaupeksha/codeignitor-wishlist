<html>
    <head>
        <title>ciWishlist</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/flatly/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
        <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.12.0/underscore-min.js" integrity="sha512-BDXGXSvYeLxaldQeYJZVWXJmkisgMlECofWFXKpWwXnfcp/R708nrs/BtNLH5cb/5TE7aeYRTDBRXu6kRL4VeQ==" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.4.0/backbone-min.js" integrity="sha512-9EgQDzuYx8wJBppM4hcxK8iXc5a1rFLp/Chug4kIcSWRDEgjMiClF8Y3Ja9/0t8RDDg19IfY5rs6zaPS9eaEBw==" crossorigin="anonymous"></script>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="<?php echo base_url();?>">ciWishList</a>
        <div class="navbar-collapse collapse show" id="navbarColor01" style="">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url();?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url();?>about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url();?>wishes">Wishes</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url();?>categories">Categories</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url();?>priorities">Priorities</a>
                </li>
            </ul>
            <ul class="navbar-nav navbar-right">
                <?php if(!$this->session->userdata('logged_in')):?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url();?>users/login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url();?>users/register">Register</a>
                </li>
                <?php endif;?>
                <?php if($this->session->userdata('logged_in')):?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url();?>wishes/create">Create Wish</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="<?php /*echo base_url();*/?>categories/create">Create Category</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url();?>users/logout">Logout</a>
                </li>
                <?php endif;?>
            </ul>       
        </div>
    </nav>
    <br>
    <div class="container">
        <!--flash messages-->
        <?php if($this->session->flashdata('user_registered')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>';?>
        <?php endif;?>
        <?php if($this->session->flashdata('wish_created')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('wish_created').'</p>';?>
        <?php endif;?>
        <?php if($this->session->flashdata('wish_updated')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('wish_updated').'</p>';?>
        <?php endif;?>
        <?php if($this->session->flashdata('wish_deleted')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('wish_deleted').'</p>';?>
        <?php endif;?>
        <?php if($this->session->flashdata('user_loggedin')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</p>';?>
        <?php endif;?>
        <?php if($this->session->flashdata('login_failed')): ?>
        <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>';?>
        <?php endif;?>
        <?php if($this->session->flashdata('user_loggedout')): ?>
        <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('user_loggedout').'</p>';?>
        <?php endif;?>
        <?php /*if($this->session->flashdata('category_deleted')):*/ ?>
        <?php /*echo '<p class="alert alert-danger">'.$this->session->flashdata('category_deleted').'</p>';*/?>
        <?php /*endif;*/?>
        <?php /*if($this->session->flashdata('category_created')): */?>
        <?php /*echo '<p class="alert alert-success">'.$this->session->flashdata('category_created').'</p>';*/?>
        <?php /*endif;*/?>
