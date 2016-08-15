# multilevel_category

Multilevel category for your website.
there are 4 folders in this repository:
1. plain just shows categories as simple <ul> and <li>
2. bootstrap_impl is an example using bootstrap and jquery to create multi level navigation bar i used this https://github.com/fontenele/bootstrap-navbar-dropdowns to show the output. 
3. plain_css this is another example that get's the plain html output of nav.php and use css to create navbar,  i used http://www.cssscript.com/create-a-multi-level-drop-down-menu-with-pure-css/.
4. responsive_nav this is same as 3 but responsive(jquery and css has been used)


follwing is the categories table which is populated with default values for show case and project is working with.
you can find sql file for the table in db folder that exists in each of the 4 folders.
you should import it to mysql database named test_taxonomy of course
you can change the table and database to whatever you want but in order to do that 
you should change these local variables
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "test_taxonomy"; 
in db function in includes/nav.php file and also 
$sql = "SELECT * FROM categories";
which is in the same function.

follwing is the categories table which is populated with default values for show case.

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




