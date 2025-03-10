<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Http\Requests\StoreMealRequest;
use App\Http\Requests\UpdateMealRequest;
use App\Models\Category;
use App\Models\Client;
use App\Models\Meal;
use App\Services\FileUploadService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

class MealController extends Controller
{
    protected FileUploadService $fileUploadService;

    public function __construct(FileUploadService $fileUploadService)
    {
        $this->fileUploadService = $fileUploadService;
    }
    public function index(): Factory|Application|View
    {
        $client = Client::where('user_id', auth()->id())->first();

        $categories = Category::where('client_id', $client->id)
            ->orderBy('id', 'asc')
            ->get();

        $meals = Meal::with('category')
            ->whereHas('category', function ($query) use ($client) {
                $query->where('client_id', $client->id)
                    ->where('status', Status::ACTIVE->value);
            })
            ->orderBy('category_id', 'asc')
            ->orderBy('status', 'desc')
            ->orderBy('id', 'asc')
            ->get();

        $groupedMeals = $meals->groupBy('category.name_uz');

        return view("admin.meal.index", compact('groupedMeals', 'categories'));
    }

    public function create(): View|Application|Factory
    {

        $client = Client::where('user_id',auth()->id())->first();
        $categories = Category::where('client_id', $client->id)->get();
        return view("admin.meal.create",compact("categories"));
    }

    public function store(StoreMealRequest $request): RedirectResponse
    {
        $data = $request->validated();

        try {
            $meal = new Meal();

            $meal->user_id = auth()->id();
            $meal->category_id = $data['category_id'];
            $meal->name_uz = $data['name_uz'];
            $meal->name_ru = $data['name_ru'];
            $meal->name_en = $data['name_en'];
            $meal->description_uz = $data['description_uz'] ?? null;
            $meal->description_ru = $data['description_ru'] ?? null;
            $meal->description_en = $data['description_en'] ?? null;
            $meal->price = $data['price'];
            $meal->weight = $data['weight'] ?? null;
            $meal->time = $data['time'];
            $meal->status = $data['status'] ?? Status::ACTIVE;

            if ($request->hasFile('photo')) {
                $meal->photo = $this->fileUploadService->upload($request->file('photo'), 'meals');
            }

            $meal->save();

            return redirect()->route('meals.index')->with('success', 'Meal created successfully.');

        } catch (\Exception $e) {
            Log::error('Error creating meal: ' . $e->getMessage());

            return redirect()->route('meals.index')->withErrors(['error' => 'Failed to create meal.']);
        }
    }


    public function show(Meal $meal)
    {
        return view("admin.meal.show", compact("meal"));
    }

    public function edit(Meal $meal)
    {
        $client = Client::where('user_id',auth()->id())->first();
        $categories = Category::where('client_id', $client->id)->get();
        return view("admin.meal.update", compact("meal","categories"));
    }

    public function update(UpdateMealRequest $request, Meal $meal)
    {
        $data = $request->validated();

        // Check if a new photo is uploaded
        if ($request->hasFile('photo')) {
            // Delete old photo if it exists
            if ($meal->photo) {
                $this->fileUploadService->delete($meal->photo, 'meals');
            }
            $data['photo'] = $this->fileUploadService->upload($request->file('photo'), 'meals');
        }

        // Check if update is successful
        if ($meal->update($data)) {
            return redirect()->route('meals.index')->with('success', 'Meal updated successfully.');
        } else {
            return back()->withErrors('Failed to update the meal.');
        }
    }

    public function destroy(Meal $meal)
    {
        if ($meal->photo) {
            $this->fileUploadService->delete($meal->photo, 'meals');
        }

        $meal->delete();
        return redirect()->route('meals.index')->with('success', 'Meal deleted successfully.');
    }
}
