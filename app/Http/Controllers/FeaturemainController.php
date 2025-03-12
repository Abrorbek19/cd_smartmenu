<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFeaturemainRequest;
use App\Http\Requests\UpdateFeaturemainRequest;
use App\Models\Featuremain;
use App\Services\FileUploadService;
use Illuminate\Support\Facades\Log;

class FeaturemainController extends Controller
{
    protected $fileUploadService;

    public function __construct(FileUploadService $fileUploadService)
    {
        $this->fileUploadService = $fileUploadService;
    }

    public function index()
    {
        $all_features = Featuremain::all();
        return view("main.feature.index", compact("all_features"));
    }

    public function create()
    {
        return view("main.feature.create");
    }

    public function store(StoreFeaturemainRequest $request)
    {
        $data = $request->validated();

        try {
            $featuremain = new Featuremain();
            $featuremain->title_uz = $data['title_uz'];
            $featuremain->title_ru = $data['title_ru'];
            $featuremain->title_en = $data['title_en'];
            $featuremain->description_uz = $data['description_uz'];
            $featuremain->description_ru = $data['description_ru'];
            $featuremain->description_en = $data['description_en'];

            if ($request->hasFile('icon')) {
                $featuremain->icon = $this->fileUploadService->upload($request->file('icon'), 'featuremains');
            }

            $featuremain->save();

            return redirect()->route('featuremains.index')->with('success', 'Feature created successfully.');

        } catch (\Exception $e) {
            Log::error('Error creating feature: ' . $e->getMessage());
            return redirect()->route('featuremains.index')->withErrors(['error' => 'Failed to create feature.']);
        }
    }

    public function show(Featuremain $featuremain)
    {

        return view("main.feature.show", compact("featuremain"));
    }

    public function edit(Featuremain $featuremain)
    {

        return view("main.feature.update", compact("featuremain"));
    }

    public function update(UpdateFeaturemainRequest $request, Featuremain $featuremain)
    {
        $data = $request->validated();

        if ($request->hasFile('icon')) {
            if ($featuremain->icon) {
                $this->fileUploadService->delete($featuremain->icon, 'featuremains');
            }
            $data['icon'] = $this->fileUploadService->upload($request->file('icon'), 'featuremains');
        }

        if ($featuremain->update($data)) {
            return redirect()->route('featuremains.index')->with('success', 'Feature updated successfully.');
        } else {
            return back()->withErrors('Failed to update the feature.');
        }
    }

    public function destroy(Featuremain $featuremain)
    {
        if ($featuremain->icon) {
            $this->fileUploadService->delete($featuremain->icon, 'featuremains');
        }

        $featuremain->delete();
        return redirect()->route('featuremains.index')->with('success', 'Feature deleted successfully.');
    }
}
