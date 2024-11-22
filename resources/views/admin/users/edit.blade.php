@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-semibold mb-6">Edit User</h2>

        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}" class="mt-1 block w-full border-gray-300 rounded-md" required>
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}" class="mt-1 block w-full border-gray-300 rounded-md" required>
            </div>

            <!-- Password (Optional) -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password (Optional)</label>
                <input type="password" name="password" id="password" class="mt-1 block w-full border-gray-300 rounded-md">
            </div>

            <!-- Role -->
            <div class="mb-4">
                <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                <select name="role" id="role" class="mt-1 block w-full border-gray-300 rounded-md" required>
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="applicant" {{ $user->role == 'applicant' ? 'selected' : '' }}>Applicant</option>
                    <option value="reviewer" {{ $user->role == 'reviewer' ? 'selected' : '' }}>Reviewer</option>
                    <option value="issuer" {{ $user->role == 'issuer' ? 'selected' : '' }}>Issuer</option>
                    <option value="auditor" {{ $user->role == 'auditor' ? 'selected' : '' }}>Auditor</option>
                </select>
            </div>

            <button type="submit" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded">Update User</button>
        </form>
    </div>
</div>
@endsection
