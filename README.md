# multilevel_category

Multilevel category for your website.
there are 5 folders in this repository:


1. plain just shows categories as simple html lists without css or js
2. bootstrap_impl is an example using bootstrap and jquery to create multi level navigation bar i used this https://github.com/fontenele/bootstrap-navbar-dropdowns to show the output. 
3. plain_css this is another example that get's the plain html output of nav.php and use css to create navbar,  i used http://www.cssscript.com/create-a-multi-level-drop-down-menu-with-pure-css/.
4. responsive_nav this is same as 3 but responsive(jquery and css has been used)
5. foundation_impl is an example using zurb css foundation 5


follwing is the categories table which is populated with default values for show case and project is working with.
you can find sql file for the table in db folder that exists in each of the 4 folders.
you should import it to mysql database named test_taxonomy of course
you can change the table and database to whatever you want and if you did you should change $DB_CONFIG 
<pre><code>
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "test_taxonomy"; 
in db function in includes/nav.php file and also 
$sql = "SELECT * FROM categories";
which is in the same function.
</code></pre>
follwing is the categories table which is populated with default values for show case.
<pre>
| id              |  pid           | title            
——————————————————————————————————————————————————————————————
| 1               |  0             | genre                   |      
| 2               |  1             | horror                  |     
| 3               |  1             | comedy                  |     
| 4               |  3             | film                    |     
| 5               |  3             | TV                      |     
| 6               |  4             | City Lights             |
| 7               |  0             | Author                  |
| 8               |  0             | sport                   |
| 9               |  8             | football                |
| 10              |  7             | hemingway               |
| 11              |  10            | a farewell to arms      |
| 12              |  10            | for whom the bell tolls |
| 13              |  0             | Music                   |
| 14              |  5             | Friends                 |
| 15              |  5             | How I met your mother   |
——————————————————————————————————————————————————————————————
</pre>

##usage:


1. import plain/db/categories.sql to mysql database(let's say the name of the database that you created is xyz)
2. copy and paste one of the examples(let's say bootstrap_impl) to your web server
3. chage db configuration in DB\_CONFIG in index.php, let's say your database user's username="root" and password="2" and the name of database that you have created is my\_db and host=localhost and the name of your category table is catg then you should cahnge DB\_CONFIG from:
<pre>
<code>
$DB_CONFIG = array(
	              'servername' => "localhost",
	              'username' => "root", 
	              'password' => "",
	              'dbname' => "test_taxonomy",
	              'the_table'=>'categories',
	            );
</code>
</pre>
to this:
<pre>
<code>
$DB_CONFIG = array(
	              'servername' => "localhost",
	              'username' => "root", 
	              'password' => "",
	              'dbname' => "my_db",
	              'the_table'=>'catg',
	            );
</code></pre>


usage2:
ofcourse you can easily use this project as menu generator in your own project the steps will be as follows and you just have to 
change contents of includes/nav\_config.php. for example let's say you are using a css framework that needs html of menu be like this:
```
<pre>
<code>
<ul class="drop-down">
	<li class="root-child drop-down"> <a href="" class="item">yyy</a>
		<ul class="child-drop-down">
			<li class="drop-down"><a href="">yyy</a>
				<ul class="child-drop-down">
					<li class="no-child"><a href="">yyy<span>**</span></a></li>
					<li><a href=""><span>**</span></a></li>
				</ul>
			</li>
		</ul>
	</li>
	
	<li class="root-child">
		<a href=""><span>**</span></a>
	</li>
</ul>
</code>
</pre>
```

This means that root li elements should have class="root-child" and ul elements that are child of li elements should have class="child-drop-down" and li elements with no child should have class="no-child". then you can configure project to generate
the html of menu(as explained),  based on database by modifying includes/nav_config.php file:
<pre>
<code>
$nav_config = array(
	'li_with_child_no_father_open' => function($node) {
		$result = '<li class="root-child drop-down"> <a href="" class="item">';
		$result .= $node->title;
		$result .= '</a>';
		return $result;
	},
	'li_with_child_no_father_close' => function($node) {
		$result = '</li>';
		return $result;
	},
	'li_with_child_with_father_open' => function($node) {
		$result = '<<li class="drop-down"><a href="">';
		$result .= $node->title;
		$result .= '</a>';
		return $result;
	},
	'li_with_child_with_father_close' => function($node) {
		$result = '</li>';
		return $result;
	},	
	'child_ul_open' => function($node) {
		$result = '<ul class="child-drop-down">';
		return $result;
	},
	'child_ul_close' => function($node) {
		$result = '</ul>';
		return $result;
	},	
	'li_no_child_open' => function($node) {
		$result = '<a href="">';
		$result .= $node->title;
		$result .= '<span>**</span></a>';
		return $result;
	},


		);
		
</code>
</pre>
