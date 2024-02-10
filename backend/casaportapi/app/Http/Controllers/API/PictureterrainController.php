<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pictureterrain;
use App\Http\Resources\PictureterrainResource;
class PictureterrainController extends Controller
{
    public function index()
    {
        $Pictureterrain =  Pictureterrain::all();
        return PictureterrainResource::collection($Pictureterrain);
    }

    public function show( Pictureterrain $Pictureterrain)
    {
        return new  PictureterrainResource($Pictureterrain);
    }

    public function store(Request $request)
    {
        $Pictureterrain =  Pictureterrain::create($request->all());
        return new  PictureterrainResource($Pictureterrain);
    }

    public function update(Request $request,  Pictureterrain $Pictureterrain)
    {
        $Pictureterrain->update($request->all());
        return new  PictureterrainResource($Pictureterrain);
    }

    public function destroy( Pictureterrain $Pictureterrain)
    {
        $Pictureterrain->delete();
        return response()->json(null, 204);
    }
}
