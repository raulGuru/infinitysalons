<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="">
        <title>Infinity Salon</title>
        <link href="<?php echo base_url('assets/css/fullcalendar.min.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/updated-bootstrap.css') ?>" rel="stylesheet">
        <link href="<?php //echo base_url('assets/css/bootstrap.css')   ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/jquery.dataTables.min.css') ?>" rel="stylesheet">

        <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/validator.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/moment.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/jquery-ui.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/dataTables.bootstrap.min.js') ?>"></script>
        <script src="<?php //echo base_url('assets/js/custom1.js')   ?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/fullcalendar.js') ?>"></script>    
        <script src="<?php echo base_url('assets/js/custom.js') ?>"></script>


    </head>
    <body>
        <script>
            var g = {};
            g['base_url'] = '<?php echo base_url(); ?>';
        </script>  
        <div class="header">
            <nav class="navbar navbar-inverse">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"><img alt="Shedul" width="30" height="30" src="<?php echo base_url('assets/logo.png') ?>"></a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li class="js-dashboard"><a href="/dashboard">Home</a></li>
                            <li class="js-calendar"><a href="/calendar">Calendar</a></li>
                            <li class="js-customers"><a href="/customers">Clients</a></li>
                            <li class="js-services"><a href="/services">Services</a></li>
                            <li class="js-products"><a href="/products">Products</a></li>
                            <li class="js-employees"><a href="/employees">Staff</a></li>                                  
                            <li class="js-provider"><a href="/provider/settings">Setup</a></li>                                   
                            <!--                <li class=" dropdown">
                                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sales</a>
                                              <ul class="dropdown-menu">
                                                <li><a href="/reports/appointments-list">Appointments</a></li>
                                                <li><a href="/reports/sales-list">Invoices</a></li>
                                                <li><a href="/reports/transactions">Payments</a></li>
                                                <li><a href="/reports/daily-sales">Daily Sales</a></li>
                                              </ul>
                                            </li>-->
                            <!--<li class=""><a href="/reports/appointments-summary">Reports</a></li>-->
<!--                            <li class=" dropdown js-setup" id="settings-dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#">Setup</a>
                                <ul class="dropdown-menu">
                                    <li><a href="/services/">Services</a></li>
                                    <li><a href="/products">Products</a></li>
                                    <li><a href="/discounts">Discounts</a></li>
                                    <li><a href="/employees">Staff</a></li>
                                    <li><a href="/provider/settings">Business Settings</a></li>
                                </ul>
                            </li>-->
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="active dropdown">
                                <a title="Profile" href="#" data-toggle="dropdown" class="dropdown-toggle hidden-sm" aria-expanded="false">		
                                    <i class="s-icon-user icon-large bold"></i>		
                                    <i class="s-icon-down-arrow"></i>		
                                </a>		
                                <ul class="dropdown-menu navbar-dropdown">
                                    <li>		
                                        <a href="/user/account">My Settings</a>		
                                    </li>
<!--                                    <li>		
                                        <a href="/provider/settings">Business Settings</a>		
                                    </li>-->
                                    <li>		
                                        <a href="/logout">Logout</a>		
                                    </li>
                                </ul>
                        </ul>
                    </div>
                </div>
            </nav> 
        </div>
        <!--<div class="full-height page-content-wrapper">-->
        <!-- START PAGE CONTENT -->
        <script>
            var c_class = '<?php echo $this->router->fetch_class(); ?>';
//            if (c_class == 'services' || c_class == 'products' || c_class == 'discounts' || c_class == 'employees' || c_class == 'provider') {
//                c_class = 'setup';
//            }
            $('.navbar-nav .js-' + c_class).addClass('active');
        </script>
