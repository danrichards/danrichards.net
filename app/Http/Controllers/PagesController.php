<?php

namespace App\Http\Controllers;

class PagesController extends Controller {

	public function home()
	{
		return view('pages.home', $this->data());
	}

//    public function slug($slug)
//    {
//        return View::make('pages.page', $this->layout('template.default')->data());
//    }


//    public function about()
//    {
//        return View::make('pages.whats-uptag', $this->layout('template.default')->data());
//    }


//    public function secret()
//    {
//        return View::make('template.secret', $this->layout('template.secret')->data());
//    }

}
