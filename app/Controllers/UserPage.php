<?php namespace App\Controllers;



class UserPage extends BaseController
{
	public function index(  )
	{

		return view("pages/user/signin");
	}

}
