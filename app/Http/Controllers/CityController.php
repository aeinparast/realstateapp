<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCityRequest;
use App\Http\Requests\UpdateCityRequest;
use App\Models\City;
use Illuminate\Support\Facades\Storage;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = City::all();
        return view('DashboardCity', ['cities' => $cities]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('DashboardCity-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCityRequest $request)
    {
        $request->validate([
            'name' => 'required|string',
            'map' => 'required|string',
            'image' => 'required|image|mimes:png,jpg,jpeg,webp|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('photos', $imageName, 'liara');
            City::create([
                'name' => $request->name,
                'map' => $request->map,
                'logo' => $path
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(City $city)
    {
        return view('DashboardCity-edit', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCityRequest $request, City $city)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        //
    }
}
