{{-- resources/views/guarantees/index.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guarantees</title>
    <!-- Add Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="container mx-auto p-6">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-semibold mb-4">Guarantees</h2>
        
        <!-- Button to create a new guarantee -->
        <a href="{{ route('guarantees.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Create New Guarantee</a>
        
        <!-- Guarantee List Table -->
        <table class="min-w-full mt-6">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2 text-left">Corporate Ref. No.</th>
                    <th class="px-4 py-2 text-left">Guarantee Type</th>
                    <th class="px-4 py-2 text-left">Nominal Amount</th>
                    <th class="px-4 py-2 text-left">Expiry Date</th>
                    <th class="px-4 py-2 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($guarantees as $guarantee)
                    <tr>
                        <td class="px-4 py-2">{{ $guarantee->corporate_reference_number }}</td>
                        <td class="px-4 py-2">{{ $guarantee->guarantee_type }}</td>
                        <td class="px-4 py-2">{{ $guarantee->nominal_amount }} {{ $guarantee->nominal_amount_currency }}</td>
                        <td class="px-4 py-2">{{ $guarantee->expiry_date->format('Y-m-d') }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ route('guarantees.show', $guarantee->id) }}" class="text-blue-500">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
