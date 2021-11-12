<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Country;
use  App\Http\Requests\CountryStoreRequest;
use  App\Http\Requests\CountryUpdateRequest;
class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $countries = Country::all();
        if($request->has('search')) {
            $countries = Country::where('name','like', "%{$request->search}%")
            ->orWhere('country_code' , 'like', '%' . $request->search . '%')->get();
        }
        return view('countries.index',compact('countries'));
    }

    public function create()
    {
        return view('countries.create');
    }

    public function store(CountryStoreRequest $request)
    {
        Country::create($request->validated());
        return redirect()->route('countries.index')->with('message', 'Country Created Successully');
    }

    public function edit(Country $country)
    {
        return view('countries.edit',compact('country'));
    }

    public function update(CountryUpdateRequest $request, Country $country)
    {
        $country->update($request->validated());
        
        // $country->update([
        //     'name' => $request->name,
        //     'country_code' => $request->country_code
        // ]);
        return redirect()->route('countries.index')->with('message', 'country Updated Successully');
    }

    public function destroy(Country $country)
    {
        $country->delete();
        return redirect()->route('countries.index')->with('message', 'country Deleted Successully');

    }
}
