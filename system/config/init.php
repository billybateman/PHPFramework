<?php

foreach($config['helpers'] as $helper){
	/* This loads the sitedesign model*/
	$registry->$helper = new $helper($registry, '');
}


foreach($config['libraries'] as $libraries){
	/* This loads the sitedesign model*/
	$registry->$libraries = new $libraries($registry, '');

}


foreach($config['models'] as $model){
	/* This loads the sitedesign model*/
	$registry->$model = new $model($registry, '');

}

?>