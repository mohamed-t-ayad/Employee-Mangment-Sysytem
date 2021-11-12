<?php

namespace App\Http\Controllers\Backend;

use App\City;
use App\Http\Controllers\Controller;
use App\Http\Requests\CityStoreRequest;
use App\State;
use Illuminate\Http\Request;

class CityController extends Controller
{

    public function index(Request $request)
    {
        $cities = City::all();
        if($request->has('search')) {
            $cities = City::where('name','like', "%{$request->search}%")->get();
        }
        return view('cities.index',compact('cities'));
    }

    public function create()
    {
        $states = State::all();
        return view('cities.create',compact('states'));
    }

    public function store(CityStoreRequest $request)
    {
        City::create($request->validated());
        return redirect()->route('cities.index')->with('message', 'City Created Successully');
    }

    public function edit(City $city)
    {
        $states = State::all();
        return view('cities.edit',compact('city', 'states'));
    }

    public function update(CityStoreRequest $request, City $city)
    {
        $city->update($request->validated());
        return redirect()->route('cities.index')->with('message', 'City updated Successully');
    }

    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->route('cities.index')->with('message', 'City Deleted Successully');
    }
}
