<?php

/*
	Below is the example format of the controller we would
	expect to be seeing. The functions/base controller is all psuedo
	however you will require some form of function that handles the 
	rendering of the view.
*/

class ExampleController extends Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->view();
	}

	public function view()
	{
		$data['exampleText'] = 'This is example text.';
		$this->render('example/view', $data);
	}
}