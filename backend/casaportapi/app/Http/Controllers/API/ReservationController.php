<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Http\Resources\ReservationResource;
class ReservationController extends Controller
{
   

    public function index(Request $request)
    {
        $reservations = Reservation::with( 'terrain')->get();
        return ReservationResource::collection($reservations);
    }

    public function show(Reservation $reservation)
    {
        $reservation->load('user', 'terrain');
        return new ReservationResource($reservation);
    }

    public function store(Request $request)
    {
        $reservation = Reservation::create($request->all());
        $reservation->load('user', 'terrain');
        return new ReservationResource($reservation);
    }

    public function update(Request $request, Reservation $reservation)
    {
        $reservation->update($request->all());
        $reservation->load('user', 'terrain');
        return new ReservationResource($reservation);
    }


    
    


    public function destroy($id)
    {
        $resource =Reservation::where('id',$id)->get();
        foreach ($resource as $record) {
            $record->watch = "1";
            $record->delete();  
        }
        return response()->json(['message' => $resource]);
    }
}
