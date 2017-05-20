<?php

namespace App\Repositories;

use App\Models\Quotation;
use InfyOm\Generator\Common\BaseRepository;

class QuotationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'customer_name',
        'email',
        'customer_phone',
        'customer_mobile',
        'company_id',
        'property_equipment_id',
        'price_value',
        'initial_fee',
        'aplay_tax',
        'tir_rate_id',
        'purchase_id',
        'tax',
        'executive_id',
        'vendor_id',
        'sales_agent_id',
        'currency_symbol'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Quotation::class;
    }
}
