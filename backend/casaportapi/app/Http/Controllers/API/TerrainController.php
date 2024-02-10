<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Terrain;
use App\Http\Resources\TerrainResource;
class TerrainController extends Controller
{
    public function index()
    {
        $terrains = Terrain::with('pictureterrain')->get();
        return TerrainResource::collection($terrains);
    }

    public function show(Terrain $terrain)
    {
        return new TerrainResource($terrain);
    }

    public function store(Request $request)
    {
        $terrain = Terrain::create($request->all());
        return new TerrainResource($terrain);
    }

    public function update(Request $request, Terrain $terrain)
    {
        $terrain->update($request->all());
        return new TerrainResource($terrain);
    }

    public function destroy(Terrain $terrain)
    {
        $terrain->delete();
        return response()->json(null, 204);
    }
}
