<?php

class IndexController extends BaseController
{
	public function index($invar = 'notset')
	{
		$this->registry->template->site = $this->getSiteModelData();
		
		$this->registry->template->show('index.view.php');
	}

	private function getSiteModelData()
	{
		return null;
	}
	
	

}
