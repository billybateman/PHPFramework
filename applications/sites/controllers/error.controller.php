<?php

class ErrorController extends BaseController
{
	public function index()
	{
		$this->registry->template->show('error.view.php');
	}

}
