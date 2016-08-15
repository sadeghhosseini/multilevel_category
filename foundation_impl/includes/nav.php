<?php

/**
*Returns all the columns from category table
*/
function db() {
	$servername = "localhost";
	$username = "root"; 
	$password = "";
	$dbname = "test_taxonomy";
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

class HtmlNav {
	public $config = array();

	public function __construct() {
		$this->config = array(
			'li_with_child_prefix' => '<li>',
			'li_with_child_postfix' => '</li>',
			'child_ul_prefix' => '<ul>',
			'child_ul_postfix' => '</ul>',
			'li_no_child_prefix' =>'<li>',
			'li_with_child_postfix' => '</li>',
		);
	}

	function generate($node, $node_type = 0) {
		if ($node->hasChild()) {
			if ($node->pid == 0) {//without father//root//first level li
				echo $this->config['li_with_child_no_father_open']($node);
			} else {
				echo $this->config['li_with_child_with_father_open']($node);
			}

			echo $this->config['child_ul_open']($node);
			foreach ($node->getChildren() as $n) {
				$this->generate($n, 1);
			}				
			echo $this->config['child_ul_close']($node);
			if ($node->pid == 0) {//without father//root//first level li
				echo $this->config['li_with_child_no_father_close']($node);
			} else {
				echo $this->config['li_with_child_with_father_close']($node);
			}	
		}else {
			echo $this->config['li_no_child_open']($node);
		}
	}

}


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
	

	$nav = new HtmlNav();

	$nav->config = array(
			'li_with_child_no_father_open' => function($node) {
				$result = '<li class="has-dropdown not-click"><a href="#">';
				$result .= $node->title;
				$result .= '</a>';
				return $result;
			},
			'li_with_child_no_father_close' => function($node) {
				$result = '</li>';
				return $result;
			},
			'li_with_child_with_father_open' => function($node) {
				$result = '<li class="has-dropdown not-click"><a href="#">';
				$result .= $node->title;
				$result .= '</a>';
				return $result;
			},
			'li_with_child_with_father_close' => function($node) {
				$result = '</li>';
				return $result;
			},	
			'child_ul_open' => function($node) {
				$result = '<ul class="dropdown">';
				return $result;
			},
			'child_ul_close' => function($node) {
				$result = '</ul>';
				return $result;
			},	
			'li_no_child_open' => function($node) {
				$result = '<li><a href="#">';
				$result .= $node->title;
				$result .= '</a></li>';
				return $result;
			},


		);

/*	$nav->config = array(
		'li_with_child_prefix_no_father' => function($link) {
			return '<li class="has-dropdown not-click"><a href="'.$link.'">';
		},
		'li_with_child_postfix_no_father' => function() {
			return '</a></li>';
		},
		'li_with_child_prefix' => function($link) {
			return '<li class="has-dropdown not-click"><a href="'.$link.'">';
		},
		'li_with_child_postfix' => function() {
			return '</a></li>';
		},
		'child_ul_prefix' => '<ul class="dropdown">',
		'child_ul_postfix' => '</ul>',
		'li_no_child_prefix' =>'<li>',
		'li_no_child_postfix' => '</li>',
		);*/
	
	foreach ($nodes as $node) {
		if ($node->pid == 0) {
			$nav->generate($node);
		}
	}
		
	
	
}



