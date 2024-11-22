<?php

namespace App\Repositories;

use App\Models\Guarantee;

class GuaranteeRepository
{
    // Create a new guarantee
    public function create(array $data)
    {
        return Guarantee::create($data);
    }

    // Get all guarantees
    public function getAll()
    {
        return Guarantee::all();
    }

    // Find a guarantee by ID
    public function find($id)
    {
        return Guarantee::find($id);
    }

    // Update an existing guarantee
    public function update($id, array $data)
    {
        $guarantee = $this->find($id);
        if ($guarantee) {
            $guarantee->update($data);
            return $guarantee;
        }
        return null;
    }

    // Delete a guarantee
    public function delete($id)
    {
        $guarantee = $this->find($id);
        if ($guarantee) {
            $guarantee->delete();
            return true;
        }
        return false;
    }
}
