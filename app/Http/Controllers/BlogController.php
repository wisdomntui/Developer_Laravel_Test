<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    
    public function search()
    {
        $query = Posts::query();
        $posts = app(Pipeline::class)
						-> send($query)
						->through([
							\App\QueryFilter\Title::class,
							])
						->thenReturn();
		
        dd($posts->get());
    }
}
