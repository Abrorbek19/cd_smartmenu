<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Models\Client;
use App\Models\Payment;
use App\Models\Restaurant;
use App\Models\Tariff;
use App\Services\FileUploadService;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    protected FileUploadService $fileUploadService;

    public function __construct(FileUploadService $fileUploadService)
    {
        $this->fileUploadService = $fileUploadService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user(); // Get the authenticated user
        $payments = collect(); // Initialize payments collection

        // Check if the user is an admin
        if ($user->hasRole('admin')) {
            // Admins can see all payments
            $payments = Payment::all();
        } else {
            // Get the client for the authenticated user
            $client = Client::where('user_id', $user->id)->first();

            if ($client) {
                $restaurantId = $client->restaurant_id;
                $payments = Payment::where('restaurant_id', $restaurantId)->get();
            }
        }

        return view("admin.payment.index", compact("payments"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $restaurants = Restaurant::all();
        $tariffs = Tariff::all();
        return view("admin.payment.create",compact("restaurants","tariffs"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaymentRequest $request)
    {
        $data = $request->validated();

        try {
            // Initialize new Payment model
            $payment = new Payment();

            // Assign values manually
            $payment->restaurant_id = $data['restaurant_id'];
            $payment->tariff_id = $data['tariff_id'];
            $payment->money = $data['money'];
            $payment->start_date = $data['start_date'];
            $payment->end_date = $data['end_date'];

            // Handle payment photo file upload if present
            if ($request->hasFile('payment_photo')) {
                $payment->payment_photo = $this->fileUploadService->upload($request->file('payment_photo'), 'payments');
            }

            // Save the payment entry in the database
            $payment->save();

            return redirect()->route('payments.index')->with('success', 'Payment created successfully.');

        } catch (\Exception $e) {
            Log::error('Error creating payment: ' . $e->getMessage());
            return redirect()->route('payments.index')->withErrors(['error' => 'Failed to create payment.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {


        return view("admin.payment.show", compact("payment"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        $restaurants = Restaurant::all();
        $tariffs = Tariff::all();
        return view("admin.payment.update", compact("payment","restaurants","tariffs"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        $data = $request->validated();

        if ($request->hasFile('payment_photo')) {
            // Delete old payment photo if it exists
            if ($payment->payment_photo) {
                $this->fileUploadService->delete($payment->payment_photo, 'payments');
            }
            $data['payment_photo'] = $this->fileUploadService->upload($request->file('payment_photo'), 'payments');
        }

        if ($payment->update($data)) {
            return redirect()->route('payments.index')->with('success', 'Payment updated successfully.');
        } else {
            return back()->withErrors('Failed to update the payment.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        if ($payment->payment_photo) {
            $this->fileUploadService->delete($payment->payment_photo, 'payments');
        }

        $payment->delete();
        return redirect()->route('payments.index')->with('success', 'Payment deleted successfully.');
    }
}
