<?php


function db() {
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "test_taxonomy";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "SELECT * FROM categories";
	$result = $conn->query($sql);

	
	return mysqli_fetch_all ($result, MYSQLI_ASSOC);
}




class Node {
	public $children = array();//array of nodes
	public $id;
	public $pid;
	public $done = false;
	public $title;
	
	public function __construct($id, $pid, $title){
		$this->id = $id;
		$this->pid = $pid;
		$this->title = $title;
		$this->done = false;
		
	}
	
	public function addToChildren($node) {
		$this->children[] = $node;

	}
	

	
	public function hasChild() {
		return !empty($this->children);
	}
	
	public function getChildren() {
		return $this->children;
	}
}


function generate($node) {
	if (!is_array($node)) {			
		if ($node->hasChild()) {
			echo '<li>'. $node->title . '</li>';
			echo '<ul>';
				generate($node->getChildren());
			echo '</ul>';
		}else {
			echo '<li>'. $node->title . '</li>';
		}
	} else {
		foreach ($node as $n) {
			generate($node);
		}
	}
}

function generate2($node) {
	if ($node->hasChild()) {
		echo '<li>';
		echo $node->title;
		echo '<ul>';
		foreach ($node->getChildren() as $n) {
			generate2($n);
		}				
		echo '</ul>';
		echo '</li>';
	}else {
		echo '<li>' . $node->title . '</li>';
	}
}
?>

<?php


function shit() {
	$rows = db();
	$nodes = array();
	foreach($rows as $row) {
		$nodes[] = new Node($row['id'], $row['pid'], $row['title']);
	}
	
	foreach($nodes as $node) {
		foreach($nodes as $child) {
			if ($node->id == $child->pid) {
				//echo $node->id . ' == ' . $child->pid . ', '. $node->title . ',' . $child->title . '<br />';
				$node->addToChildren($child);
			}
		}
	}
	
/*	
	foreach($nodes as $node) {
		echo $node->title . ', ' . count($node->children) . '<br />';
	}
	*/
	echo '<ul>';
	
	foreach ($nodes as $node) {
		if ($node->pid == 0) {
			generate2($node);
		}
	}
	
	echo '</ul>';
	
	
	
}

shit();