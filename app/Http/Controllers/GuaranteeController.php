<?php

namespace App\Http\Controllers;

use App\Repositories\GuaranteeRepository;
use App\Models\Guarantee;
use Illuminate\Http\Request;

class GuaranteeController extends Controller
{
    /**
     * Store a newly created guarantee in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected $guaranteeRepository;

    // Inject the GuaranteeRepository
    public function __construct(GuaranteeRepository $guaranteeRepository)
    {
        $this->guaranteeRepository = $guaranteeRepository;
    }

    public function index()
    {
        // Retrieve all guarantees using the repository
        $guarantees = $this->guaranteeRepository->getAll();

        // Return the index view with the list of guarantees
        return view('guarantees.index', compact('guarantees'));
    }
    
    // Store a newly created guarantee in the database
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'corporate_reference_number' => 'required|unique:guarantees',
            'guarantee_type' => 'required|string',
            'nominal_amount' => 'required|numeric',
            'nominal_amount_currency' => 'required|string',
            'expiry_date' => 'required|date|after:today',
            'applicant_name' => 'required|string',
            'applicant_address' => 'required|string',
            'beneficiary_name' => 'required|string',
            'beneficiary_address' => 'required|string',
        ]);

        // Use the repository to create the guarantee
        $guarantee = $this->guaranteeRepository->create($validatedData);

        // Redirect or return response
        return redirect()->route('guarantees.index'); // Adjust this route as needed
    }

    // Method to show a specific guarantee
    public function show($id)
    {
        // Retrieve the guarantee using the repository
        $guarantee = $this->guaranteeRepository->find($id);

        // If the guarantee doesn't exist, return a 404
        if (!$guarantee) {
            abort(404, 'Guarantee not found');
        }

        // Return the view with the guarantee data
        return view('guarantees.show', compact('guarantee'));
    }

}
