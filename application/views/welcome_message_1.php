<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
      <meta charset="utf-8" />
      <title>Hair Salon</title>
      <meta name="description" content="" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
      
      <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" />
      <link rel="stylesheet" href="<?php echo base_url('assets/font-awesome/4.2.0/css/font-awesome.min.css') ?>" />
      <link rel="stylesheet" href="<?php echo base_url('assets/fonts/fonts.googleapis.com.css') ?>" />
      <link rel="stylesheet" href="<?php echo base_url('assets/css/ace.min.css') ?>" class="ace-main-stylesheet" id="main-ace-style" />
      <script src="<?php echo base_url('assets/js/ace-extra.min.js') ?>"></script>
      <script src="<?php echo base_url('assets/js/jquery.2.1.1.min.js') ?>"></script>
      <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
      <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>">"></script>
      <script src="<?php echo base_url('assets/js/jquery-ui.custom.min.js') ?>">"></script>
      <!-- ace scripts -->
      <script src="<?php echo base_url('assets/js/ace-elements.min.js') ?>">"></script>
      <script src="<?php echo base_url('assets/js/ace.min.js') ?>">"></script>
      
   </head>
   <body class="no-skin">
      <div id="navbar" class="navbar navbar-default">
         <div class="navbar-container" id="navbar-container">
            <div class="navbar-header pull-left">
               <a href="/dashboard" class="navbar-brand">
               <small>
               <i class="fa fa-leaf"></i>
               Hair Salon
               </small>
               </a>
            </div>
         </div>
         <!-- /.navbar-container -->
      </div>
      <div class="main-container" id="main-container">
         <script type="text/javascript">
            try{ace.settings.check('main-container' , 'fixed')}catch(e){}
         </script>
         <div id="sidebar" class="sidebar                  responsive">
            <script type="text/javascript">
               try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
            </script>
            <ul class="nav nav-list">
               <li class="">
                  <a href="/dashboard">
                  <i class="menu-icon fa fa-tachometer"></i>
                  <span class="menu-text"> Dashboard </span>
                  </a>
                  <b class="arrow"></b>
               </li>
               <li class="">
                  <a href="/calendar">
                  <i class="menu-icon fa fa-calendar"></i>
                  <span class="menu-text"> Calender </span>
                  </a>
                  <b class="arrow"></b>
               </li>
               <li class="">
                  <a href="/customers">
                  <i class="menu-icon fa fa-tachometer"></i>
                  <span class="menu-text"> Clients </span>
                  </a>
                  <b class="arrow"></b>
               </li>
               <li class="">
                  <a href="#" class="dropdown-toggle">
                  <i class="menu-icon fa fa-list"></i>
                  <span class="menu-text">
                  Sales
                  </span>
                  <b class="arrow fa fa-angle-down"></b>
                  </a>
                  <b class="arrow"></b>
                  <ul class="submenu">
                     <li class="">
                        <a href="/sales/appointments">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Appointments
                        </a>
                        <b class="arrow"></b>
                     </li>
                     <li class="">
                        <a href="/sales/invoices">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Invoices
                        </a>
                        <b class="arrow"></b>
                     </li>
                     <li class="">
                        <a href="/sales/payments">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Payments
                        </a>
                        <b class="arrow"></b>
                     </li>
                     <li class="">
                        <a href="/sales/payments">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Payments
                        </a>
                        <b class="arrow"></b>
                     </li>
                     <li class="">
                        <a href="/sales/vouchers">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Vouchers
                        </a>
                        <b class="arrow"></b>
                     </li>
                     <li class="">
                        <a href="/sales/dailysales">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Daily Sales
                        </a>
                        <b class="arrow"></b>
                     </li>
                  </ul>
               </li>           
               <li class="">
                  <a href="/reports">
                  <i class="menu-icon fa fa-list-alt"></i>
                  <span class="menu-text"> Reports </span>
                  </a>
                  <b class="arrow"></b>
               </li>
               <li class="">
                  <a href="#" class="dropdown-toggle">
                  <i class="menu-icon fa fa-desktop"></i>
                  <span class="menu-text">
                  Setup
                  </span>
                  <b class="arrow fa fa-angle-down"></b>
                  </a>
                  <b class="arrow"></b>
                  <ul class="submenu">
                     <li class="">
                        <a href="/services">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Services
                        </a>
                        <b class="arrow"></b>
                     </li>
                     <li class="">
                        <a href="/products">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Products
                        </a>
                        <b class="arrow"></b>
                     </li>
                     <li class="">
                        <a href="/discounts">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Discounts
                        </a>
                        <b class="arrow"></b>
                     </li>
                     <li class="">
                        <a href="/employees">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Staff
                        </a>
                        <b class="arrow"></b>
                     </li>
                     <li class="">
                        <a href="/schedule">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Roster
                        </a>
                        <b class="arrow"></b>
                     </li>
                  </ul>
               </li> 
            </ul>
            <!-- /.nav-list -->
            <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
               <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
            </div>
            <script type="text/javascript">
               try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
            </script>
         </div>
         <div class="main-content">
            <div class="main-content-inner">
               <div class="page-content">
                   
                   
                  <div class="row">
                     <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->
                        <!-- PAGE CONTENT ENDS -->
                     </div>
                     <!-- /.col -->
                  </div>
                  <!-- /.row -->
                  
                  
               </div>
               <!-- /.page-content -->
            </div>
         </div>
         <!-- /.main-content -->
         
         <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
         <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
         </a>
      </div>
      <!-- /.main-container -->
   </body>
</html>