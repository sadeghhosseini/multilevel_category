<?php require_once ('./includes/nav_config.php') ?>
<?php require_once('./includes/nav.php');  ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script type="text/javascript" src="./js/jquery-3.1.0.min.js"></script>
<script type="text/javascript" src="./js/nav.js"></script>
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
	</ul>



</script>

</body>
</html>

