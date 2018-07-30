<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Address;
use App\City;
use App\Area;
use App\Http\Requests\AddressStoreRequest;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all addresses
        $addresses = Address::with(['city', 'area'])->orderBy('name', 'asc')->get();

        // Get all the cities available
        $cities = City::orderBy('name', 'asc')->get();

        // Get all the areas available
        $areas = Area::orderBy('name', 'asc')->get();

        return view('welcome', ['addresses' => $addresses, 'cities' => $cities, 'areas' => $areas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\AddressStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddressStoreRequest $request)
    {
        $input = $request->all();

        // Search for foreign keys in domain tables based on form-data and add them to the input
        $input['city_id'] = City::where('name', $input['city'])->firstOrFail()->id;
        $input['area_id'] = Area::where('name', $input['area'])->firstOrFail()->id;

        // Create new address in DB
        Address::create($input);

        return back()->withErrors(['message' => 'Successfully added']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Search for the address which has given id or return back with error
        $address = Address::findOrFail($id);

        // Delete address with the given id from DB
        $address->delete();

        return back()->withErrors(['message' => 'Successfully deleted']);
    }
}
