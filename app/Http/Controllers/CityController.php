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
        $cities = City::withCount(['assets' => function ($query) {
            $query->where('isPublic', true);
        }])->get();
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
        // Validate request data
        $validated = $request->validate([
            'name' => 'required|string',
            'map' => 'required|string',
            // 'image' => 'required|image|mimes:png,jpg,jpeg,webp|max:2048'
        ]);

        //Handle file upload if an image exists
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('photos', $imageName, 'liara');

            // Merge the path into validated data
            $validated['logo'] = $path;
        }

        // Create the city using validated data
        City::create($validated);

        // Redirect with success message
        return redirect()->route('city.index')->with('success', 'شهر با موفقیت ساخته شد');
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
        $request->validate([
            'name' => 'required|string',
            'map' => 'required|string',
            'image' => 'image|mimes:png,jpg,jpeg,webp|max:2048'
        ]);
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('photos', $imageName, 'liara');
            $city->update([
                'name' => $request->name,
                'map' => $request->map,
                'logo' => $path
            ]);
            return redirect()->route('city.index')->with('edited', 'شهر با موفقیت ویرایش شد');
        }
        $city->update([
            'name' => $request->name,
            'map' => $request->map,
        ]);
        return redirect()->route('city.index')->with('edited', 'شهر با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->route('city.index')->with('removed', 'شهر با موفقیت حذف شد');
    }
}
