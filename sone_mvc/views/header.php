<!DOCTYPE html>
<html>
    <head>
        <title><?= (isset($this->title)) ? $this->title : 'Sone MVC'; ?></title>
        <link rel="shortcut icon" href="#">   <!-------- zbog favicon.ico -------------------->
        <link rel="stylesheet" href="<?php echo URL; ?>public/css/default.css" />
        <script type="text/javascript" src="<?php echo URL; ?>public/js/jquery.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>    
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
        <?php
        if (isset($this->js)) {
            foreach ($this->js as $js) {
                echo "<script type='text/javascript' src='".URL.'views/'.$js."'></script>";
            }
        }
        ?>
    </head>
    <body>
        <?php My_session::init(); ?>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo URL; ?>index">MVC</a>
                </div>
                <div id="header">
                    <ul class="nav navbar-nav">
                        <?php
                        if (My_session::get('logged_in') == false):;
                            ?>
                            <li><a href="<?php echo URL; ?>index">Home</a></li>
                            <li><a href="<?php echo URL; ?>help">Help</a></li>
                        <?php endif; ?>
                        <?php
                        if (My_session::get('logged_in') == true):;
                            ?>
                            <li><a href="<?php echo URL; ?>dashboard">Dashboard</a></li>
                            <?php
                            if (My_session::get('role') == 'owner' || My_session::get('role')
                                == 'admin'):;
                                ?>
                                <li><a href="<?php echo URL; ?>user">Users</a></li>
                            <?php endif; ?>
                            <li><a href="<?php echo URL; ?>dashboard/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                        <?php else: ?>
                            <li><a href="<?php echo URL; ?>login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
<?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
        <div id="content" class="container">
