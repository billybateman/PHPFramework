<?php

class urlhelper extends helper
{

	public function link($url, $value)
	{
		return '<a href="'.$url.'">'.$value.'</a>';
	}
}