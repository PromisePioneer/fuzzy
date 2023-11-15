<?php

namespace App\Http\Controllers;

use App\Http\Requests\DatasetRequest;
use App\Models\Dataset;
use App\Models\User;
use Illuminate\Http\Request;

class DatasetController extends Controller
{
    public function index()
    {
        return view('pages.dataset.index');
    }

    public function search(Request $request)
    {

    }

    public function data(Request $request)
    {
        $per_page = $request->input('per_page', 10);
        return response()->json(Dataset::paginate($per_page));
    }

    public function userData()
    {
        return response()->json(User::all(), 200);
    }

    public function store(DatasetRequest $request)
    {
        return response()->json(Dataset::create($request->validated()));
    }

    public function edit(Dataset $dataset)
    {
        return response()->json( $dataset);
    }

    public function update(DatasetRequest $request, Dataset $dataset)
    {
        return response()->json($dataset->update( $request->validated()));
    }

    public function destroy(Dataset $dataset)
    {
        return response()->json($dataset->delete());
    }
}
