<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    public function index()
    {
        $clients = Client::with(['user', 'restaurant'])->get();
        return view('admin.client.index', compact('clients'));
    }

    public function create()
    {
        $connectedUserIds = Client::pluck('user_id')->toArray();
        $connectedRestaurantIds = Client::pluck('restaurant_id')->toArray();

        $users = User::whereNotIn('id', $connectedUserIds)->get();
        $restaurants = Restaurant::whereNotIn('id', $connectedRestaurantIds)->get();

        return view('admin.client.create', compact('users', 'restaurants'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'restaurant_id' => 'required|exists:restaurants,id',
        ]);

        Client::create($request->all());

        return redirect()->route('clients.index')->with('success', 'Client created successfully.');
    }

    public function show(Client $client)
    {
        return view('admin.client.show', compact('client'));
    }

    public function edit(Client $client)
    {
        $users = User::all();
        $restaurants = Restaurant::all();
        return view('admin.client.update', compact('client', 'users', 'restaurants'));
    }

    public function update(Request $request, Client $client)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'restaurant_id' => 'required|exists:restaurants,id',
        ]);

        $client->update($request->all());

        return redirect()->route('clients.index')->with('success', 'Client updated successfully.');
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index')->with('success', 'Client deleted successfully.');
    }
}
