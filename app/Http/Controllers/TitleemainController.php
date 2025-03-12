<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTitleemainRequest;
use App\Http\Requests\UpdateTitleemainRequest;
use App\Models\Titleemain;

class TitleemainController extends Controller
{
    public function index()
    {
        $titlemains = Titleemain::all();
        return view('main.title.index', compact('titlemains'));
    }

    public function create()
    {

        return view('main.title.create');
    }

    public function store(StoreTitleemainRequest $request)
    {

        $validated = $request->validated();
        Titleemain::create($validated);

        return redirect()->route('titlemains.index')->with('success', 'Titlemain created successfully.');
    }


    public function show(Titleemain $titlemain)
    {

        return view('main.title.show', compact('titlemain'));
    }

    public function edit(Titleemain $titlemain)
    {

        return view('main.title.update', compact('titlemain'));
    }

    public function update(UpdateTitleemainRequest $request, Titleemain $titlemain)
    {
        $validated = $request->validated();
        $titlemain->update($validated);

        return redirect()->route('titlemains.index')->with('success', 'Titlemain updated successfully.');
    }

    public function destroy(Titleemain $titlemain)
    {
        $titlemain->delete();

        return redirect()->route('titlemains.index')->with('success', 'Titlemain deleted successfully.');
    }
}
