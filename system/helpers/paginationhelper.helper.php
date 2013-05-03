<?php

class paginationhelper extends helper
{

	function pagination($options=null) {

		/** [Options]
		 * total		Total number of items
		 * per_page		Items to show each page
		 * current		The current page that the user is on
		 * num_links	The number of links to show before and after the current page
		 * url			URI value to place in the links (must include "[[page]]")
		 * 				Example: /home/blog/page/[[page]]/
		 */
		
		//Max links to show
		if(empty($options['num_links'])) {
			$options['num_links'] = 2;
		}
		
		//Don't allow page 0 or lower
		if($options['current'] < 1) {
			$options['current'] = 1;
		}
		
		//Initialize
		$links;
		$next;
		$previous;
		$total;
		$offset;
	
		//The offset to start from. This is useful if you are running a DB query
		//$offset = (($options['per_page'] * $options['current']) - $options['per_page']);
	
		//The Number of pages based on the total number of items and the number to show each page
		$total = ceil($options['total'] / $options['per_page']);
	
		//Current page should NOT be past last page
		if($options['current'] > $total) {
			$options['current'] = $total;
		}
		
		//If there is only one (or less) pages
		if($total <= 1) {
			return;
		}
		
		//If this is NOT the first page - show a previous link
		if($options['current'] > 1) {
			$previous = str_replace('[[page]]', ($options['current'] - 1), $options['url']);
		}
	
		//If this isn't the last page - add a "next" link
		if($options['current'] + 1 < $total) {
			$next = str_replace('[[page]]', ($options['current'] + 1), $options['url']);
		}
		
		//Show first page?
		if($options['current'] > $options['num_links'] + 1) {
			$first = str_replace('[[page]]', 1, $options['url']);
		}
		
		//Show last page?
		if($options['current'] + $options['num_links'] < $total) {
			$last = str_replace('[[page]]', $total, $options['url']);
		}
		
		
		//Only if we have more pages than links to show
		$start = (($options['current'] - $options['num_links']) > 0) ? $options['current'] - ($options['num_links']) : 1;
		$end   = (($options['current'] + $options['num_links']) < $total) ? $options['current'] + $options['num_links'] : $total;
		
		
		//For each page, create the URL
		for($i = $start; $i <= $end; $i++) {
			if($options['current'] == $i) {
				$links[$i] = '';
			} else {
				//Replace [[page]] with the page number
				$links[$i] = str_replace('[[page]]', $i, $options['url']);
			}
		}
		
		$output = '<ul id="pagination-clean" class="extra-space-bottom">';
			
		//Previous page
		if(!empty($previous)) {
			$output .= '<li class="previous"><a href="'. $previous. '">Previous</a></li>';
		}
		//First page
		if(!empty($first)) {
			$output .= '<li class="first"><a href="'. $first. '">&lt;</a></li>';
		}
		
		foreach($links as $page => $url) {
			if($url == '') {
				$output .= '<li class="active">'. $page. '</li>';
			} else {
				$output .= '<li><a href="'. $url. '">'. $page. '</a></li>';
			}
		}
		
		//Next page
		if(!empty($last)) {
			$output .= '<li class="next"><a href="'. $last. '">Last</a></li>';
		}
		
		//Next page
		if(!empty($next)) {
			$output .= '<li class="next"><a href="'. $next. '">Next ></a></li>';
		}
		
		
           
			
        $output .= '</ul>';
			
		return $output;
	}
}