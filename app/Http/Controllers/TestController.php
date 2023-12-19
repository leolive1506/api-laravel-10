<?php

namespace App\Http\Controllers;

use App\Traits\HttpResponse;
use Illuminate\Http\Request;

class TestController extends Controller
{
    use HttpResponse;

    public function index()
    {
        return $this->response('Authorized', 200);
    }

    public function store()
    {

    }
}
