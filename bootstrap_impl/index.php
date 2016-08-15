<?php require_once ('./includes/nav_config.php') ?>
<?php require_once('./includes/nav.php');  ?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.3.min.js"></script> -->

  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <script src="./js/jquery.min.js"></script>
  <script src="./js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="./css/nav.css">
  <script type="text/javascript" src="./js/nav.js"></script>
</head>
<body>


<!-- navigation2 -->

        <nav class="navbar navbar-inverse navbar-static-top marginBottom-0" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
              <a class="navbar-brand" href="#">Test</a>
            </div>
            
            <div class="collapse navbar-collapse" id="navbar-collapse-1">
<ul class="nav navbar-nav">


        <!--menu item-start-->
            <?php 
            $DB_CONFIG = array(
              'servername' => "localhost",
              'username' => "root", 
              'password' => "",
              'dbname' => "test_taxonomy",
              'the_table'=>'categories',
            );
            generateNavigationBar($nav_config, get_all_categories($DB_CONFIG)); 
            ?>
        </ul>
    </div><!-- /.navbar-collapse -->
</nav>
  <!-- navigation2 -->
  
  

  

</body>