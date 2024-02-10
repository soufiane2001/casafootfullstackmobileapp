<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Commente;
use App\Http\Resources\CommenteResource;
class CommenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Commentes = Commente::with('user')->get();
        return CommenteResource::collection($Commentes);
    }

    public function show(Commente $Commente)
    {
        return new CommenteResource($Commente);
    }

    public function store(Request $request)
    {
        $Commente = Commente::create($request->all());
        return new CommenteResource($Commente);
    }

    public function update(Request $request, Commente $Commente)
    {
        $Commente->update($request->all());
        return new CommenteResource($Commente);
    }

    public function destroy(Commente $Commente)
    {
        $Commente->delete();
        return response()->json(null, 204);
    }
}
