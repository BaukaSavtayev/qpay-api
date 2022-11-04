<?php

namespace App\Http\Resources\Business\Employee;

use App\Models\Employee;

class EmployeeCollection extends \Illuminate\Http\Resources\Json\ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  Employee  $transactions
     * @return array
     */
    public function toArray($transactions): array
    {
        /** @var Employee $this */

        return [
            'data' => $this->collection,
        ];
    }}
