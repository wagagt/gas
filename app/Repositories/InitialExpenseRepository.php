<?php

namespace App\Repositories;

use App\Models\InitialExpense;
use InfyOm\Generator\Common\BaseRepository;

class InitialExpenseRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'description',
        'status_property',
        'company_id',
        'range_value_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return InitialExpense::class;
    }
}
