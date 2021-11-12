<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\State;
use App\Country;
use Illuminate\Http\Request;
use  App\Http\Requests\StateStoreRequest;

class StateController extends Controller
{
    public function index(Request $request)
    {
        $states = State::all();
        if($request->has('search')) {
            $states = State::where('name','like', "%{$request->search}%")->get();
        }
        return view('states.index',compact('states'));
    }

    public function create()
    {
        $countries = Country::all();
        return view('states.create',compact('countries'));
    }

    public function store(StateStoreRequest $request)
    {
        State::create($request->validated());
        return redirect()->route('states.index')->with('message', 'State Created Successully');
    }

    public function edit(State $state)
    {
        $countries = Country::all();
        return view('states.edit',compact('state' ,'countries'));
    }
    public function update(StateStoreRequest $request, State $state)
    {
        $state->update($request->validated());
        return redirect()->route('states.index')->with('message', 'State updated Successully');
    }
    public function destroy(State $state)
    {
        $state->delete();
        return redirect()->route('states.index')->with('message', 'State Deleted Successully');
    }
}
