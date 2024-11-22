<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GuaranteeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Home Route
Route::get('/', function () {
    return view('welcome');
});

// Default Dashboard Route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Dashboard Route (with only auth middleware)
Route::middleware('auth')->get('/admin/dashboard', function () {
    // Check if the user is authenticated and an admin
    if (Auth::check() && Auth::user()->role == 'admin') {
        // Example data (you can replace these with actual data fetched from the database)
        $totalGuarantees = 25; // You will fetch this from your database
        $activeUsers = 150;    // Same as above
        $pendingApprovals = 12; // Same as above
        
        return view('admin.dashboard', compact('totalGuarantees', 'activeUsers', 'pendingApprovals'));
    }

    return redirect('/login');
})->name('admin.dashboard');

// Applicant Dashboard Route (with only auth middleware)
Route::get('/applicant/dashboard', function () {
    if (Auth::check() && Auth::user()->role == 'applicant') {
        return view('applicant.dashboard');
    }

    return redirect('/login');
})->middleware('auth')->name('applicant.dashboard');

// Guarantee Routes (admin panel, applicant panel, etc.)
Route::middleware(['auth', 'applicant'])->group(function () {
    Route::get('/guarantees', [GuaranteeController::class, 'index'])->name('guarantees.index');
    Route::get('/guarantees/{id}', [GuaranteeController::class, 'show'])->name('guarantees.show');
    Route::get('/guarantees/{id}/edit', [GuaranteeController::class, 'edit'])->name('guarantees.edit');
    Route::post('/guarantees', [GuaranteeController::class, 'store'])->name('guarantees.store');
    Route::put('/guarantees/{id}', [GuaranteeController::class, 'update'])->name('guarantees.update');
    Route::delete('/guarantees/{id}', [GuaranteeController::class, 'destroy'])->name('guarantees.destroy');
});

// Admin User Management Routes
Route::middleware('auth')->group(function () {
    // View all users
    Route::get('/admin/users', function () {
        $users = \App\Models\User::all();
        return view('admin.users.index', compact('users'));
    })->name('users.index');

    // Show the form to create a new user
    Route::get('/admin/users/create', function () {
        return view('admin.users.create');
    })->name('users.create');

    // Create user route
    Route::post('/admin/users', function (\Illuminate\Http\Request $request) {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|confirmed',
            'role' => 'required|in:admin,applicant,reviewer,issuer,auditor', // Ensure role is validated
        ]);

        // Encrypt the password
        $data['password'] = bcrypt($data['password']);

        // Create the user and save to the database
        \App\Models\User::create($data);

        return redirect()->route('users.index');  // Redirect to user list after successful creation
    })->name('users.store');


    // Show the form to edit an existing user
    Route::get('/admin/users/{user}/edit', function ($userId) {
        $user = \App\Models\User::findOrFail($userId);
        return view('admin.users.edit', compact('user'));
    })->name('users.edit');

// Update user route
Route::put('/admin/users/{user}', function (\Illuminate\Http\Request $request, $userId) {
    $data = $request->validate([
        'name' => 'required|string',
        'email' => 'required|email|unique:users,email,' . $userId,  // Ensure email is unique except for current user
        'password' => 'nullable|string|confirmed',  // Password is optional, only update if provided
        'role' => 'required|in:admin,applicant,reviewer,issuer,auditor',  // Ensure role is valid
    ]);

    // Find the user by ID
    $user = \App\Models\User::findOrFail($userId);

    // Update the user details (including role)
    $user->update([
        'name' => $data['name'],
        'email' => $data['email'],
        'role' => $data['role'],  // Update role field
    ]);

    // If a password is provided, update it
    if ($request->filled('password')) {
        $user->password = bcrypt($request->password);  // Hash the password
        $user->save();
    }

    return redirect()->route('users.index');  // Redirect to user list after successful update
})->name('users.update');


    // Delete the user
    Route::delete('/admin/users/{user}', function ($userId) {
        \App\Models\User::destroy($userId);
        return redirect()->route('users.index');
    })->name('users.destroy');
});

// Authentication routes (Login, Register, etc.)
require __DIR__.'/auth.php';
