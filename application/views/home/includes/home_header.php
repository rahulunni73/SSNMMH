<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="hospital website">
        <meta name="author" content="Rahul Narayanan Unni S">
        <title>SSNMMH</title>

        
        <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/css/responsive.css" rel="stylesheet">        
        <!-- Template CSS Files  -->
        <link href="<?php echo base_url() ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/js/plugins/camera/css/camera.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/loader.css" rel="stylesheet">


        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/logo.png" />

        <!-- Google Web Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,100italic,300italic,400italic,500,500italic,700,700italic,900,900italic" rel="stylesheet" type="text/css">
    </head>









    <body>
        <!-- Header Starts -->
        <header class="main-header">
            <!-- Nested Container Starts -->
            <div class="container">
                <!-- Top Bar Starts -->
                <div class="top-bar hidden-sm hidden-xs">
                    <div class="row">
                        <div class="col-sm-6 col-xs-12">
                            <span>Opening Hours:</span> 24 X 7
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <ul class="list-unstyled list-inline">
                                <li><a href="mailto:ssnmmhospital@gmail.com">
                                        <i class="fa fa-envelope-o"></i>
                                        ssnmmhospital@gmail.com
                                    </a></li>
                                <li><i class="fa fa-phone"></i> Call Us: 0470 2602248</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Top Bar Ends -->
                <!-- Navbar Starts -->
                <nav id="nav" class="navbar navbar-default" role="navigation">
                    <div class="container-fluid">
                        <!-- Navbar Header Starts -->
                        <div class="navbar-header">
                            <!-- Collapse Button Starts -->
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <!-- Collapse Button Ends -->
                            <!-- Logo Starts -->
                            <a href="<?php echo site_url('home/index') ?>" class="navbar-brand">
                                <i class="fa fa-heartbeat"></i>
                                S.S.N.M.M.H.
                            </a>
                            <!-- Logo Ends -->
                        </div>
                        <!-- Navbar Header Ends -->
                        <!-- Navbar Collapse Starts -->
                        <div class="navbar-collapse collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="<?php
                                if (isset($home)) {
                                    echo $home;
                                }
                                ?>"><a href="<?php echo site_url('home/index') ?>">Home</a></li>
                                <li class="<?php
                                if (isset($about)) {
                                    echo $about;
                                }
                                ?>"><a href="<?php echo site_url('home/about') ?>">About</a></li>
                                <li class="<?php
                                if (isset($doct_active)) {
                                    echo $doct_active;
                                }
                                ?>"><a href="<?php echo site_url('home/doctors') ?>">Doctors</a></li>
                                

                                <li class="dropdown" class="<?php
                                if (isset($dept_active)) {
                                    echo $dept_active;
                                }
                                ?>"><a class="dropdown-toggle" data-toggle="dropdown">Specialties</a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="<?php echo site_url('home/departments') ?>">Departments</a></li>
                                        <li><a href="<?php echo site_url('home/services') ?>">Services</a></li>
                                        <li><a href="<?php echo site_url('home/insurance')?>">Insurance</a></li>
                                    </ul>
                                </li>

                                <li class="dropdown" class=class="<?php
                                if (isset($gallery)) {
                                    echo $gallery;
                                }
                                ?>"><a class="dropdown-toggle" data-toggle="dropdown">News</a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="<?php echo site_url('home/news') ?>">News</a></li>
                                        <li><a href="<?php echo site_url('home/gallery') ?>">Gallery</a></li>
                                    </ul>
                                </li>

                                <li class="<?php
                                if (isset($contact)) {
                                    echo $contact;
                                }
                                ?>"><a href="<?php echo site_url('home/contact') ?>">Contact</a></li>
                            </ul>
                        </div>
                        <!-- Navbar Collapse Ends -->
                    </div>
                </nav>
                <!-- Navbar Ends -->
            </div>
            <!-- Nested Container Ends -->
        </header>
        <!-- Header Ends -->