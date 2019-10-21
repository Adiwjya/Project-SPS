<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>NAV - APBS</title>
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <link href="<?php echo base_url(); ?>asset/stylesheets/font.css" rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/lib/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>asset/lib/font-awesome/css/font-awesome.css">

        <script src="<?php echo base_url(); ?>asset/lib/jquery-1.11.1.min.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/stylesheets/theme.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/stylesheets/premium.css">
        
        <style type="text/css">
            body {
                background: url('asset/images/gambar1.gif') no-repeat center center fixed; 
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }
        </style>
        
    </head>
    <body class=" theme-blue">
        <!-- Demo page code -->
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

        <!-- Le fav and touch icons -->
        <link rel="shortcut icon" href="../assets/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  
        <div class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <a class="" href="index.html"><span class="navbar-brand"><span class="fa fa-paper-plane"></span> NAV - APBS</span></a></div>
            <div class="navbar-collapse collapse" style="height: 1px;">
                
            </div>
        </div>
    
        <div class="dialog">
            <div class="panel panel-default">
                <p class="panel-heading no-collapse">Sign In</p>
                <div class="panel-body">
                    <form action="<?php echo base_url(); ?>VerifyLogin" method="POST">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <input type="submit" class="btn btn-primary pull-right" value="Sign In">
                        <div class="clearfix"></div>
                    </form>
                </div>    
            </div>
            <p><a href="reset-password.html">Forgot your password?</a></p>
        </div>
        
        <script src="<?php echo base_url() ?>asset/lib/bootstrap/js/bootstrap.js"></script>
        <script type="text/javascript">
            $("[rel=tooltip]").tooltip();
            $(function() {
                $('.demo-cancel-click').click(function(){return false;});
            });
        </script>
    </body>
</html>