<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;
use App\Http\Resources\NotificationResource;
class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $notifications = Notification::with('post','user')->where('user_id_post','=',$request->id)->orderBy('created_at', 'asc')->get();
        return NotificationResource::collection($notifications);
    }

    public function show(Notification $notification)
    {
        return new NotificationResource($notification);
    }

    public function store(Request $request)
    {
        $notifications  = Notification::create($request->all());
        return new NotificationResource($notifications);
    }

    public function update(Request $request, $id)
    {
        $records = Notification::where("user_id_post",$id)->get();
        foreach ($records as $record) {
            $record->watch = "1";
            $record->save();  
        }

        return response()->json(['message' => $records]);
    }


    public function markAsRead(Notification $notification)
    {
        $notification->markAsRead();
        return response()->json(['message' => 'Notification marked as read']);
    }

    public function destroy($id)
    {
        $count = Notification::where('user_id_post', '=', $id)->where('watch', '=', "0")->count();
        return response()->json(['message' => $count]);
    
    }
}
