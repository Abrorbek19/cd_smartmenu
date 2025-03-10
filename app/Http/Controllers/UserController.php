<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\FileUploadService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $fileUploadService;

    public function __construct(FileUploadService $fileUploadService)
    {
        $this->fileUploadService = $fileUploadService;
    }


    public function index()
    {
        $user = User::all();
        return view('admin.user.index', compact('user'));
    }

    public function show($id)
    {

        $user = User::findOrFail($id);
        return view('admin.user.show', compact('user'));
    }

    public function create()
    {

        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'phone' => $request->phone,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole('client');

        return redirect()->route('users.index')->with('success', 'User created successfully');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.update', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = $request->only('firstname', 'lastname', 'phone');

        if ($request->hasFile('image')) {
            if ($user->image) {
                $this->fileUploadService->delete($user->image, 'users');
            }

            $data['image'] = $this->fileUploadService->upload($request->file('image'), 'users');
        }

        $user->update($data);

        return redirect()->back()->with('success', 'User updated successfully');
    }

    public function userPasswordUpdate(Request $request, $id): RedirectResponse
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $id,
            'password' => 'nullable|string|min:8',
        ]);

        $user->update([
            'username' => $validated['username'],
            'password' => $validated['password'] ? bcrypt($validated['password']) : $user->password,
        ]);

        return redirect()->route("users.index")->with('success', 'Username and password updated successfully.');
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->image) {
            $this->fileUploadService->delete($user->image, 'users');
        }

        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully.');
    }
}
