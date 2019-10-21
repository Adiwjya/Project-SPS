<?php
//$page = $_SERVER['PHP_SELF'];
//$sec = "5";
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title></title>
<!--        <meta http-equiv="refresh" content="<?php //echo $sec; ?>;URL='<?php //echo $page; ?>'">-->
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Tracking Kapal">
        <meta name="author" content="Rampa Praditya">

        <link href="<?php echo base_url(); ?>asset/stylesheets/font.css" rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/back/lib/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/back/lib/font-awesome/css/font-awesome.css">

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/back/js/jquery-1.12.3.js"></script>
        
        <!-- Tanggal -->
        <link href="<?php echo base_url(); ?>assets/back/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet">        
        <!-- Custom Table -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/back/css/jquery.dataTables.min.css">
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/back/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/back/js/fnReloadAjax.js"></script>
        
        <script src="<?php echo base_url(); ?>assets/back/lib/jQuery-Knob/js/jquery.knob.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/back/js/ckeditor.js"></script>
        <script type="text/javascript">
            $(function() {
                $(".knob").knob();
            });
        </script>
        
        <script type="text/javascript">
            
            function back(){
                window.history.back();
            }
            
            function hanyaAngka(e, decimal) {
                var key;
                var keychar;
                if (window.event) {
                    key = window.event.keyCode;
                } else if (e) {
                    key = e.which;
                } else {
                    return true;
                }
                keychar = String.fromCharCode(key);
                if ((key==null) || (key==0) || (key==8) ||  (key==9) || (key==13) || (key==27) ) {
                    return true;
                } else if ((("0123456789").indexOf(keychar) > -1)) {
                    return true;
                } else if (decimal && (keychar == ".")) {
                    return true;
                } else {
                    return false;
                }
            }
        </script>
        
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/back/stylesheets/theme.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/back/stylesheets/premium.css">
        <!-- Tanggal -->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/back/lib/DateTimePicker.js"></script>
        
    </head>
    <body class=" theme-blue">
        <script type="text/javascript">
            $(function() {
                var match = document.cookie.match(new RegExp('color=([^;]+)'));
                if(match) var color = match[1];
                if(color) {
                    $('body').removeClass(function (index, css) {
                        return (css.match (/\btheme-\S+/g) || []).join(' ')
                    })
                    $('body').addClass('theme-' + color);
                }

                $('[data-popover="true"]').popover({html: true});

            });
        </script>
        <style type="text/css">
            #line-chart {
                height:300px;
                width:800px;
                margin: 0px auto;
                margin-top: 1em;
            }
            .navbar-default .navbar-brand, .navbar-default .navbar-brand:hover { 
                color: #fff;
            }
        </style>

        <script type="text/javascript">
            $(function() {
                var uls = $('.sidebar-nav > ul > *').clone();
                uls.addClass('visible-xs');
                $('#main-menu').append(uls.clone());
            });
        </script>

        <div class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="" href="<?php echo base_url(); ?>"><span class="navbar-brand"><span class="fa fa-paper-plane"></span> Logo</span></a></div>

            <div class="navbar-collapse collapse" style="height: 1px;">
                <ul id="main-menu" class="nav navbar-nav navbar-right">
                    <li class="dropdown hidden-xs">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-user padding-right-small" style="position:relative;top: 3px;"></span> 
                            <?php
                            echo "Administrator";
                            ?>
                            <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url(); ?>account">My Account</a></li>
                            <li class="divider"></li>
                            <li><a tabindex="-1" href="<?php echo base_url(); ?>Home/logout">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>