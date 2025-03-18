<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFeedbackRequest;
use App\Http\Requests\UpdateFeedbackRequest;
use App\Models\Client;
use App\Models\Feedback;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->hasRole('admin')) {
            // If the user is an admin, show all feedbacks
            $feedbacks = Feedback::all();
        } else {
            // If the user is not an admin, show feedbacks associated with their restaurant
            $clients = Client::where('user_id', $user->id)->first();
            if ($clients) {
                $feedbacks = Feedback::where('restaurant_id', $clients->restaurant_id)->get();
            } else {
                $feedbacks = collect();
            }
        }

        return  view('admin.feedback.index',compact('feedbacks'));
    }

    public function create()
    {
        return view('feedback.create');
    }


    public function store(StoreFeedbackRequest $request)
    {
        $validated = $request->validated();

        // Prepare data for feedback insertion
        $data = [
            'restaurant_id' => $validated['restaurant_id'],
            'restaurant_star' => $validated['restaurant_star']?? null,
            'restaurant_text' => $validated['restaurant_text'] ?? null,
            'service_star' => $validated['service_star']?? null,
            'service_text' => $validated['service_text'] ?? null,
            'status' => 1,
        ];

        try {
            // Check if the restaurant exists
            if (!Restaurant::find($data['restaurant_id'])) {
                return back()->with('error', 'Restaurant not found.');
            }

            // Insert feedback data
            $feedback = Feedback::create($data);

            // Check if the feedback was created successfully
            if ($feedback) {
                return back()->with('success', 'Feedback created successfully!');
            } else {
                return back()->with('error', 'Failed to create feedback.');
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to create feedback.');
        }
    }

    public function show(Feedback $feedback)
    {
        $feedback->update(['status'=>2]);
        return view('admin.feedback.show', compact('feedback'));
    }

    public function edit(Feedback $feedback)
    {
        return view('feedback.edit', compact('feedback'));
    }

    public function update(UpdateFeedbackRequest $request, Feedback $feedback)
    {
        $feedback->update($request->validated());

        return redirect()->route('feedback.index')->with('success', 'Feedback updated successfully!');
    }

    public function destroy(Feedback $feedback)
    {
        $feedback->delete();

        return redirect()->route('feedback.index')->with('success', 'Feedback deleted successfully!');
    }
}
