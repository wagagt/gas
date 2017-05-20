<?php

namespace App\Repositories;

use App\Models\Vendors;
use InfyOm\Generator\Common\BaseRepository;

class VendorsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'vendor_code',
        'full_name',
        'email',
        'office_phone',
        'mobile_phone',
        'user_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Vendors::class;
    }
}
