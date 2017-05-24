<?php
/**
 * Menu functions
 */

//Filters out ids and classes from li and ul elements
function attributes_filter($var) {
	return is_array($var) ? array_intersect($var, array('current-menu-item')) : '';
}