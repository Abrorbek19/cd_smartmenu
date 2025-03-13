<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTariffRequest;
use App\Http\Requests\UpdateTariffRequest;
use App\Models\Tariff;

class TariffController extends Controller
{
    // Display a listing of the tariffs
    public function index()
    {
        $tariffs = Tariff::all();
        return view("admin.tariff.index", compact("tariffs"));
    }

    // Show the form for creating a new tariff
    public function create()
    {

        return view("admin.tariff.create");
    }

    // Store a newly created tariff in storage
    public function store(StoreTariffRequest $request)
    {
        $requestData = $request->validated();
        Tariff::create($requestData);

        return redirect()->route('tariffs.index')->with('success', 'Tariff created successfully');
    }

    // Display the specified tariff
    public function show(Tariff $tariff)
    {

        return view("admin.tariff.show", compact("tariff"));
    }

    // Show the form for editing the specified tariff
    public function edit(Tariff $tariff)
    {

        return view("admin.tariff.update", compact("tariff"));
    }

    public function update(UpdateTariffRequest $request, Tariff $tariff)
    {
        $requestData = $request->validated();
        $tariff->update($requestData);

        return redirect()->route('tariffs.index')->with('success', 'Tariff updated successfully');
    }

    // Remove the specified tariff from storage
    public function destroy(Tariff $tariff)
    {
        $tariff->delete();

        return redirect()->route('tariffs.index')->with('success', 'Tariff deleted successfully');
    }
}
