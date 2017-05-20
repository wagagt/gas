<?php

namespace App\Repositories;

use App\Models\InsuranceRate;
use InfyOm\Generator\Common\BaseRepository;

class InsuranceRateRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'description',
        'weekly_rate',
        'monthly_rate',
        'quarterly_rate',
        'biannual_rate',
        'annual_rate',
        'property_equipment_id',
        'range_value_id',
        'company_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return InsuranceRate::class;
    }
}
