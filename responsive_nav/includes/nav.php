<?php


function db($servername = "localhost", $username = "root", $password = "", $dbname = "test_taxonomy") {
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "SELECT * FROM categories";
	$result = $conn->query($sql);

	
	return mysqli_fetch_all ($result, MYSQLI_ASSOC);
}




class Node {
	public $children = array();//array of node objects
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
	
	/**
	*add $node to children array.
	*/
	public function addToChildren($node) {
		$this->children[] = $node;

	}
	
	/**
	*returns false if this node has no child 
	*/
	public function hasChild() {
		return !empty($this->children);
	}
	
	public function getChildren() {
		return $this->children;
	}
}

function generate($node) {
	if ($node->hasChild()) {
		echo '<li>';
		echo '<a href="#">';
		echo $node->title;
		echo '</a>';
		echo '<ul>';
		foreach ($node->getChildren() as $n) {
			generate($n);
		}				
		echo '</ul>';
		echo '</li>';
	}else {
		echo '<li>';
		echo '<a href="#">';
		echo  $node->title;
		echo '</a></li>';
	}
}
?>

<?php


function generateNavigationBar() {
	$rows = db();
	$nodes = array();
	foreach($rows as $row) {
		$nodes[] = new Node($row['id'], $row['pid'], $row['title']);
	}
	
	foreach($nodes as $node) {
		foreach($nodes as $child) {
			if ($node->id == $child->pid) {
				$node->addToChildren($child);
			}
		}
	}
	

	echo '<ul class="topnav" id="topnav">';
	
	foreach ($nodes as $node) {
		if ($node->pid == 0) {
			generate($node);
		}
	}
	
	echo '</ul>';
	
	
	
}

