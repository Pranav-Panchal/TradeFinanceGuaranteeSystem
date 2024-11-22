@extends('layouts.app')

@section('content')
<div class="flex">
    <!-- Sidebar -->
    <div class="w-1/6 bg-[#6a4c93] text-white min-h-screen px-4 py-6">
        <div class="mb-8">
            <h2 class="text-2xl font-bold">Admin Panel</h2>
        </div>
        <ul class="space-y-4">
            <!-- Dashboard -->
            <li><a href="{{ route('admin.dashboard') }}" class="block py-2 px-4 hover:bg-[#8e5fa5] rounded">Dashboard</a></li>

            <!-- Guarantee Link -->
            <li><a href="{{ route('guarantees.index') }}" class="block py-2 px-4 hover:bg-[#8e5fa5] rounded">Guarantees</a></li>

            <!-- Users Links -->
            <li><a href="{{ route('users.index') }}" class="block py-2 px-4 hover:bg-[#8e5fa5] rounded">Manage Users</a></li>

            <!-- Other links -->
            <li><a href="#" class="block py-2 px-4 hover:bg-[#8e5fa5] rounded">Settings</a></li>
            <li><a href="#" class="block py-2 px-4 hover:bg-[#8e5fa5] rounded">Reports</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="flex-1 bg-[#ecf0f1] p-6 max-w-7xl mx-auto">
        <h1 class="text-3xl font-semibold mb-8">Welcome to the Admin Dashboard</h1>

        <!-- Dashboard Stats -->
        <div class="grid grid-cols-3 gap-4">
            <div class="bg-white p-6 rounded shadow-md">
                <h3 class="font-semibold text-lg">Total Guarantees</h3>
                <p class="text-xl">25</p>
            </div>
            <div class="bg-white p-6 rounded shadow-md">
                <h3 class="font-semibold text-lg">Active Users</h3>
                <p class="text-xl">150</p>
            </div>
            <div class="bg-white p-6 rounded shadow-md">
                <h3 class="font-semibold text-lg">Pending Approvals</h3>
                <p class="text-xl">12</p>
            </div>
        </div>
    </div>
</div>
@endsection
