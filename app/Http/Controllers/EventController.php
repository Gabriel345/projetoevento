<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $search=request('search');

        if($search){
    $events=Event::where([
        ['title','like','%'.$search.'%']
        ])->get();

        }else{
            $events = Event::all();
        }

        return view('welcome', compact('events'),compact('search'));
    }
    public function create()
    {
        return view('events.create');
    }
    public function store(Request $request)
    {
        $event = new Event;
        $event->title = $request->title;
        $event->date= $request->date;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->description = $request->description;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $RequestImage = $request->image;
            $extension = $RequestImage->extension();
            $imagename = md5($RequestImage->getClientOriginalName() . strtotime("now") . ".");
            $imagename = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('img/events'), $imagename);
            $event->image = $imagename;

        }
         $user=auth()->user();
         $event->user_id = $user->id;

        $event->save();
        return redirect('/')->with('msg', 'Evento criado com sucesso!');
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);

        $eventOwner= User::where('id', $event->user_id)->first()->toArray();

        return view('events.show',compact('event'),compact('eventOwner'));


    }
    public function dashboard(){
        $user=auth()->user();
        $events =$user ->events;
        return view('events.dashboard',compact('events'));
    }
    public function destroy($id){
        Event::findOrFail($id)->delete();
        return redirect('/dashboard')->with('msg','evento excluido com sucesso!');
    }

    public function edit($id){
        $event = Event::findOrFail($id);
        return view('events.edit',compact('event'));
    }
    public function update(Request $request, $id){
        
        $data=$request->all();
        
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $RequestImage = $request->image;
            $extension = $RequestImage->extension();
            $imagename = md5($RequestImage->getClientOriginalName() . strtotime("now") . ".");
            $imagename = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('img/events'), $imagename);
            $data['image'] = $imagename;
            
        }
        
        Event::findOrFail($request->id)->update($data);
        return redirect('/dashboard')->with('msg','Evento editado com sucesso!');
    }
}
