{{-- resources/views/guarantees/create.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Guarantee</title>
    <!-- Add Tailwind CSS if not already included -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="container mx-auto p-6">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-semibold mb-4">Create Guarantee</h2>

        <form method="POST" action="{{ route('guarantees.store') }}">
            @csrf
            <!-- Corporate Reference Number -->
            <div class="mb-4">
                <label for="corporate_reference_number" class="block text-sm font-medium text-gray-700">Corporate Reference Number</label>
                <input type="text" name="corporate_reference_number" id="corporate_reference_number" class="mt-1 p-2 border border-gray-300 rounded-lg w-full" required>
            </div>

            <!-- Guarantee Type -->
            <div class="mb-4">
                <label for="guarantee_type" class="block text-sm font-medium text-gray-700">Guarantee Type</label>
                <select name="guarantee_type" id="guarantee_type" class="mt-1 p-2 border border-gray-300 rounded-lg w-full" required>
                    <option value="bank">Bank</option>
                    <option value="bid_bond">Bid Bond</option>
                    <option value="insurance">Insurance</option>
                    <option value="surety">Surety</option>
                </select>
            </div>

            <!-- Nominal Amount -->
            <div class="mb-4">
                <label for="nominal_amount" class="block text-sm font-medium text-gray-700">Nominal Amount</label>
                <input type="number" name="nominal_amount" id="nominal_amount" class="mt-1 p-2 border border-gray-300 rounded-lg w-full" required>
            </div>

            <!-- Nominal Amount Currency -->
            <div class="mb-4">
                <label for="nominal_amount_currency" class="block text-sm font-medium text-gray-700">Nominal Amount Currency</label>
                <input type="text" name="nominal_amount_currency" id="nominal_amount_currency" class="mt-1 p-2 border border-gray-300 rounded-lg w-full" required>
            </div>

            <!-- Expiry Date -->
            <div class="mb-4">
                <label for="expiry_date" class="block text-sm font-medium text-gray-700">Expiry Date</label>
                <input type="date" name="expiry_date" id="expiry_date" class="mt-1 p-2 border border-gray-300 rounded-lg w-full" required>
            </div>

            <!-- Applicant Name -->
            <div class="mb-4">
                <label for="applicant_name" class="block text-sm font-medium text-gray-700">Applicant Name</label>
                <input type="text" name="applicant_name" id="applicant_name" class="mt-1 p-2 border border-gray-300 rounded-lg w-full" required>
            </div>

            <!-- Applicant Address -->
            <div class="mb-4">
                <label for="applicant_address" class="block text-sm font-medium text-gray-700">Applicant Address</label>
                <textarea name="applicant_address" id="applicant_address" rows="4" class="mt-1 p-2 border border-gray-300 rounded-lg w-full" required></textarea>
            </div>

            <!-- Beneficiary Name -->
            <div class="mb-4">
                <label for="beneficiary_name" class="block text-sm font-medium text-gray-700">Beneficiary Name</label>
                <input type="text" name="beneficiary_name" id="beneficiary_name" class="mt-1 p-2 border border-gray-300 rounded-lg w-full" required>
            </div>

            <!-- Beneficiary Address -->
            <div class="mb-4">
                <label for="beneficiary_address" class="block text-sm font-medium text-gray-700">Beneficiary Address</label>
                <textarea name="beneficiary_address" id="beneficiary_address" rows="4" class="mt-1 p-2 border border-gray-300 rounded-lg w-full" required></textarea>
            </div>

            <!-- Submit Button -->
            <div class="mb-4">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Submit</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
