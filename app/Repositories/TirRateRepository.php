<?php

namespace App\Repositories;

use App\Models\TirRate;
use InfyOm\Generator\Common\BaseRepository;

class TirRateRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'currency',
        'symbol',
        'status_property',
        'company_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TirRate::class;
    }
}
