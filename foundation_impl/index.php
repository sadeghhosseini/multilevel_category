<?php require_once ('./includes/nav_config.php') ?>
<?php require_once('./includes/nav.php');  ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Foundation | Welcome</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
</head>
<body>

<nav class="top-bar" data-topbar="" role="navigation">
  <ul class="title-area">
    <!-- Title Area -->
    <li class="name">

    </li>
    <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
    <li class="toggle-topbar menu-icon"><a href=""><span>Menu</span></a></li>
  </ul>

  
<section class="top-bar-section">
    <ul class="left">
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
    <!-- Right Nav Section -->
<!--     <ul class="right">
      <li class="divider"></li>
      <li><a href="#">Item 2</a></li>
    </ul> -->
  </section>
  </nav>

    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
</body>
</html>