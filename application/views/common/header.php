<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('assets/favicon-32x32.png') ?>">
        <title>Infinity Salon</title>
        <link href="<?php echo base_url('assets/css/fullcalendar.min.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/updated-bootstrap.css') ?>" rel="stylesheet">
        <!--<link href="<?php //echo base_url('assets/css/bootstrap.css') ?>" rel="stylesheet">-->
        <link href="<?php echo base_url('assets/css/jquery.dataTables.min.css') ?>" rel="stylesheet">

        <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/validator.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/moment.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/jquery-ui.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/dataTables.bootstrap.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/fullcalendar.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/accounting.min.js') ?>"></script>
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
                        <a class="navbar-brand" href="#">
                            <img alt="Infinity Salon" width="35" height="45" src="<?php echo base_url('assets/header_infinityLogo.png') ?>">
                        </a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <?php
                            if ($useraccess['home']) {
                                echo "<li class='js-dashboard'><a href='/dashboard'>Home</a></li>";
                            }
                            if ($useraccess['calendar']) {
                                echo "<li class='js-calendar'><a href='/calendar'>Calendar</a></li>";
                            }
                            if ($useraccess['clients']) {
                                echo "<li class='js-customers'><a href='/customers'>Clients</a></li>";
                            }
                            if ($useraccess['services']) {
                                echo "<li class='js-services'><a href='/services'>Services</a></li>";
                            }
                            if ($useraccess['products']) {
                                echo "<li class='js-products'><a href='/products'>Products</a></li>";
                            }
                            if ($useraccess['staff']) {
                                $li = "";
                                $li .= "<li class='js-employees dropdown'>";
                                $li .= "<a class='dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' href='javascript:void(0);'>Staff</a>";
                                $li .= "<ul class='dropdown-menu'><li><a href='/employees'>Staff</a></li><li><a href='/roster'>Roster</a></li></ul>";
                                $li .= "</li>";
                                echo $li;
                            }
//                            if ($useraccess['products']) {
//                                echo "<li class='js-reports'><a href='/reports'>Reports</a></li>";
                                $li = "";
                                $li .= "<li class='js-reports dropdown'>";
                                $li .= "<a class='dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' href='javascript:void(0);'>Reports</a>";
                                $li .= "<ul class='dropdown-menu'>"
                                        . "<li><a href='/reports/invoices'>Invoices</a></li>"
                                        . "<li><a href='/reports/serviceSales'>Sales by services</a></li>"
                                        . "<li><a href='/reports/staffSales'>Sales by staff</a></li>"
                                        . "<li><a href='/reports/clientSales'>Sales by clients</a></li>"
                                        . "<li><a href='/reports/dailySales'>Sales by day</a></li>"
                                        . "</ul>";
                                $li .= "</li>";
                                echo $li;
//                            }
                            if ($useraccess['setup']) {
                                echo "<li class='js-setup'><a href='/provider'>Setup</a></li>";
                            }
                            ?>

                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="active dropdown">
                                <a title="Profile" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-expanded="false">
                                    <?php echo $this->session->userdata['salon_user']['first_name']; ?> <i class="s-icon-user icon-large bold"></i>		
                                    <i class="s-icon-down-arrow"></i>
                                </a>		
                                <ul class="dropdown-menu navbar-dropdown">
                                    <li>		
                                        <a href="/user/account">My Settings</a>		
                                    </li>
                                    <li>		
                                        <a href="/logout">Logout</a>		
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav> 
        </div>
        <!--<div class="full-height page-content-wrapper">-->
        <!-- START PAGE CONTENT -->
        <script>
            var c_class = '<?php echo $this->router->fetch_class(); ?>';
            if (c_class == 'discounts' || c_class == 'user' || c_class == 'provider') {
                c_class = 'setup';
            }
            if (c_class == 'roster') {
                c_class = 'employees';
            }
            $('.navbar-nav .js-' + c_class).addClass('active');
        </script>
