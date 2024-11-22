{{-- resources/views/guarantees/show.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guarantee Details</title>
    <!-- Add Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="container mx-auto p-6">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-semibold mb-4">Guarantee Details</h2>

        <p><strong>Corporate Ref. No.:</strong> {{ $guarantee->corporate_reference_number }}</p>
        <p><strong>Guarantee Type:</strong> {{ $guarantee->guarantee_type }}</p>
        <p><strong>Nominal Amount:</strong> {{ $guarantee->nominal_amount }} {{ $guarantee->nominal_amount_currency }}</p>
        <p><strong>Expiry Date:</strong> {{ $guarantee->expiry_date->format('Y-m-d') }}</p>
        <p><strong>Applicant Name:</strong> {{ $guarantee->applicant_name }}</p>
        <p><strong>Applicant Address:</strong> {{ $guarantee->applicant_address }}</p>
        <p><strong>Beneficiary Name:</strong> {{ $guarantee->beneficiary_name }}</p>
        <p><strong>Beneficiary Address:</strong> {{ $guarantee->beneficiary_address }}</p>

        <!-- Edit Button -->
        <a href="{{ route('guarantees.edit', $guarantee->id) }}" class="mt-4 inline-block px-4 py-2 bg-green-500 text-white rounded-lg">Edit Guarantee</a>

        <!-- Delete Form -->
        <form method="POST" action="{{ route('guarantees.destroy', $guarantee->id) }}" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="mt-4 inline-block px-4 py-2 bg-red-500 text-white rounded-lg">Delete Guarantee</button>
        </form>

        <!-- Back to list link -->
        <a href="{{ route('guarantees.index') }}" class="mt-4 inline-block px-4 py-2 bg-gray-500 text-white rounded-lg">Back to List</a>
    </div>
</div>

</body>
</html>
