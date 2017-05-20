<?php

namespace App\Repositories;

use App\Models\RatePurchase;
use InfyOm\Generator\Common\BaseRepository;

class RatePurchaseRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'range_value_id',
        'status_property',
        'company_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return RatePurchase::class;
    }
}
