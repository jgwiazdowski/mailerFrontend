<!DOCTYPE html>
<html lang="en">
<head>
    <title>Mailer</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"/>
    <link rel="stylesheet" href="css/bootstrap-theme.min.css" type="text/css"/>
    <script src="js/jquery-3.2.0.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
</head>
<body>

<div class="container">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo url(); ?>">Mail Service</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Add<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="add.php?type=domain">Domain</a></li>
                            <li><a href="add.php?type=user">User</a></li>
                            <li><a href="add.php?type=alias">Alias</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">List<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="list.php?type=domain">Domain</a></li>
                            <li><a href="list.php?type=user">User</a></li>
                            <li><a href="list.php?type=alias">Alias</a></li>
                        </ul>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <div class="jumbotron">
