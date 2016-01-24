<?php

namespace App\Http\Controllers;

use App\Repositories\FooRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FooController extends Controller
{

    
    public function foo(FooRepository $repository)
    {
        return $repository->get();
    }
}
