<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Services\AppService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    protected $service;
    protected $model;

    public function __construct(AppService $service)
    {
        $this->service = $service;
        $this->model = Contact::class;
    }

    public function all()
    {
        return response()->json($this->service->all($this->model), 200);
    }

    public function browse(Request $request)
    {
        return response()->json($this->service->browse($this->model, $request));
    }

    public function add(ContactRequest $request)
    {
        return response()->json($this->service->save($this->model, $request->validated()), 200);
    }

    public function edit(ContactRequest $request, $id)
    {
        return response()->json($this->service->save($this->model, $request->validated(), $id), 200);
    }

    public function delete($id)
    {
        $this->service->delete($this->model, $id);
        return response()->noContent();
    }

    public function view($id)
    {
        return response()->json($this->service->find($this->model, $id), 200);
    }
}
