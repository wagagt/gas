<?php

namespace App\Repositories;

use App\Models\RangeValueRate;
use InfyOm\Generator\Common\BaseRepository;

class RangeValueRateRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'initial_value',
        'final_value',
        'company_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return RangeValueRate::class;
    }
}
