<?php

/*
	Below is the example format of the controller we would
	expect to be seeing. The functions/base controller is all psuedo
	however you will require some form of function that handles the 
	rendering of the view.
*/

class HomeController extends Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['name'] = 'Dan';

		$this->render('home', $data);
	}

	public function view()
	{
		$data['name'] = 'Dan';

		$this->render('home', $data);
	}
}