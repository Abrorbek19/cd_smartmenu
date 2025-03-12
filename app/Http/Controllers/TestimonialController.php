<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTestimonialRequest;
use App\Models\Restaurant;
use App\Models\Testimonial;
use App\Services\FileUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TestimonialController extends Controller
{
    protected $fileUploadService;

    public function __construct(FileUploadService $fileUploadService)
    {
        $this->fileUploadService = $fileUploadService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_testimonial = Testimonial::with('restaurant')->get();

//        return $all_testimonial;

        return view("main.testimonial.index", compact("all_testimonial"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $restarans = Restaurant::where('status',1)->get();
        return view("main.testimonial.create",compact('restarans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTestimonialRequest $request)
    {
        $data = $request->validated();

//        return $data;
        try {
            $testimonial = new Testimonial();
            $testimonial->fullname = $data['fullname'];
            $testimonial->role_user_uz = $data['role_user_uz'];
            $testimonial->role_user_ru = $data['role_user_ru'];
            $testimonial->role_user_en = $data['role_user_en'];
            $testimonial->description_uz = $data['description_uz'];
            $testimonial->description_ru = $data['description_ru'];
            $testimonial->description_en = $data['description_en'];
            $testimonial->star = $data['star'];
            $testimonial->restaran_id = $data['restaran_id'];

            if ($request->hasFile('image')) {
                $testimonial->image = $this->fileUploadService->upload($request->file('image'), 'testimonial');
            }

            $testimonial->save();

            return redirect()->route('testimonial.index')->with('success', 'Testimonial created successfully.');

        } catch (\Exception $e) {
            Log::error('Error creating feature: ' . $e->getMessage());
            return redirect()->route('testimonial.index')->withErrors(['error' => 'Failed to create testimonial.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial)
    {
//        return $testimonial;
        $show = Testimonial::where('id',$testimonial->id)->with('restaurant')->first();
//        return $show;
        return view("main.testimonial.show", compact("show"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        $restarans = Restaurant::where('id',$testimonial->restaran_id)->get();
//        return $restarans;
        return view("main.testimonial.update", compact("restarans",'testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTestimonialRequest $request, Testimonial $testimonial)
    {
        $data = $request->validated();

        // Agar yangi rasm yuklangan bo‘lsa, eski rasmni o‘chirib yangisini yuklash
        if ($request->hasFile('image')) {
            if ($testimonial->image) {
                $this->fileUploadService->delete($testimonial->image, 'testimonial'); // Eski rasmni o‘chirish
            }
            $data['image'] = $this->fileUploadService->upload($request->file('image'), 'testimonial'); // Yangi rasm yuklash
        }

        return $testimonial->update($data)
            ? redirect()->route('testimonial.index')->with('success', 'Testimonial updated successfully.')
            : back()->withErrors('Failed to update the testimonial.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        // Agar rasm mavjud bo‘lsa, uni o‘chirish
        if ($testimonial->image) {
            $this->fileUploadService->delete($testimonial->image, 'testimonial');
        }

        $testimonial->delete();

        return redirect()->route('testimonial.index')->with('success', 'Testimonial deleted successfully.');
    }
}
