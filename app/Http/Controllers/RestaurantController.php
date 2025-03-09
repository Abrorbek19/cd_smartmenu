<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Http\Requests\StoreRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;
use App\Services\FileUploadService;
use Illuminate\Support\Facades\Log;

class RestaurantController extends Controller
{

    protected $fileUploadService;

    public function __construct(FileUploadService $fileUploadService)
    {
        $this->fileUploadService = $fileUploadService;
    }

    public function index()
    {
        $all_restaurant = Restaurant::all();
        return view("admin.restaurant.index",compact("all_restaurant"));
    }


    public function create()
    {
        return view("admin.restaurant.create");
    }

    public function store(StoreRestaurantRequest $request)
    {
        $data = $request->validated();

        try {
            $restaurant = new Restaurant();

            $restaurant->name = $data['name'];
            $restaurant->phone_number = $data['phone_number'];
            $restaurant->address_uz = $data['address_uz'];
            $restaurant->address_ru = $data['address_ru'];
            $restaurant->address_en = $data['address_en'];
            $restaurant->instagram = $data['instagram'] ?? null;
            $restaurant->youtube = $data['youtube'] ?? null;
            $restaurant->telegram = $data['telegram'] ?? null;
            $restaurant->tiktok = $data['tiktok'] ?? null;
            $restaurant->start_work_day_uz = $data['start_work_day_uz'];
            $restaurant->end_work_day_uz = $data['end_work_day_uz'];
            $restaurant->start_work_day_ru = $data['start_work_day_ru'];
            $restaurant->end_work_day_ru = $data['end_work_day_ru'];
            $restaurant->start_work_day_en = $data['start_work_day_en'];
            $restaurant->end_work_day_en = $data['end_work_day_en'];
            $restaurant->work_time_start = $data['work_time_start'];
            $restaurant->work_time_end = $data['work_time_end'];
            $restaurant->tax = $data['tax'];


            if ($request->hasFile('logo')) {
                $restaurant->logo = $this->fileUploadService->upload($request->file('logo'), 'restaurants');
            }

            $restaurant->save();

            // Redirect on success
            return redirect()->route('restaurants.index')->with('success', 'Restaurant created successfully.');

        } catch (\Exception $e) {

            Log::error('Error creating restaurant: ' . $e->getMessage());


            return redirect()->route('restaurants.index')->withErrors(['error' => 'Failed to create restaurant.']);
        }
    }

    public function show(Restaurant $restaurant)
    {

        return view("admin.restaurant.show",compact("restaurant"));
    }


    public function edit(Restaurant $restaurant)
    {

        return view("admin.restaurant.update",compact("restaurant"));
    }

    public function update(UpdateRestaurantRequest $request, Restaurant $restaurant)
    {
        $data = $request->validated();

        if ($request->hasFile('logo')) {
            if ($restaurant->logo) {
                $this->fileUploadService->delete($restaurant->logo, 'restaurants');
            }
            $data['logo'] = $this->fileUploadService->upload($request->file('logo'), 'restaurants');
        }


        if ($restaurant->update($data)) {
            return redirect()->route('restaurants.index')->with('success', 'Restaurant updated successfully.');
        } else {
            return back()->withErrors('Failed to update the restaurant.');
        }
    }



    public function destroy(Restaurant $restaurant)
    {
        // Delete logo if it exists
        if ($restaurant->logo) {
            $this->fileUploadService->delete($restaurant->logo, 'restaurants');
        }

        $restaurant->delete();
        return redirect()->route('restaurants.index')->with('success', 'Restaurant deleted successfully.');
    }
}
