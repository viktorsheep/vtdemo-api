<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Services\AppService;

class UserController extends Controller
{
    protected $service;
    protected $model;

    public function __construct(AppService $service)
    {
    }

    public function all()
    {
    }

    public function browse(Request $request)
    {
    }

    public function view()
    {
    }

    public function add(UserRequest $request)
    {
    }

    public function edit(UserRequest $request, $id)
    {
    }
}
