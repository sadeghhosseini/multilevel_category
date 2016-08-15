<?php
$nav_config = array(
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