<?php

/*
	Below is the example format of the controller we would
	expect to be seeing. The functions/base controller is all psuedo
	however you will require some form of function that handles the 
	rendering of the view.
*/

class ExampleController
{
	public function view()
	{
		$this->render('views/example/view');
	}
}