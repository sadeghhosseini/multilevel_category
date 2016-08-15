<?php require_once ('./includes/nav_config.php') ?>
<?php require_once('./includes/nav.php');  ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<link rel="stylesheet" type="text/css" href="./css/nav.css">
</head>
<body>

<div class="sad-nav">
	<ul class="topnav" id="topnav">
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
</div>

	<ul>
		<li>one</li>
		<li>two</li>
		<li>
			<ul>
				<li>shoot</li>
			</ul>
		</li>
	</ul>
</body>
</html>