<?php

namespace App\Http\Controllers;

use App\Http\Requests\VariableRequest;
use App\Models\Variable;
use Illuminate\Http\Request;

class VariableController extends Controller
{
    public function index()
    {
        return view('pages.variable.index');
    }

    public function data(Request $request)
    {
        $per_page = $request->input('per_page', 10);
        return response()->json(Variable::paginate($per_page), 200);
    }

    public function store(VariableRequest $request)
    {
        return response()->json(Variable::create($request->validated(), 200));
    }

    public function edit(Variable $variable)
    {
        return response()->json($variable);
    }

    public function update(VariableRequest $request,Variable $variable)
    {
        return response()->json($variable->update($request->validated()));
    }

    public function destroy(Variable $variable)
    {
        return response()->json( $variable->delete());
    }
}
