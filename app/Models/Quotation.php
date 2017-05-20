<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Quotation",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="customer_name",
 *          description="customer_name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="email",
 *          description="email",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="customer_phone",
 *          description="customer_phone",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="customer_mobile",
 *          description="customer_mobile",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="company_id",
 *          description="company_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="property_equipment_id",
 *          description="property_equipment_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="price_value",
 *          description="price_value",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="initial_fee",
 *          description="initial_fee",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="aplay_tax",
 *          description="aplay_tax",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="tir_rate_id",
 *          description="tir_rate_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="purchase_id",
 *          description="purchase_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="tax",
 *          description="tax",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="executive_id",
 *          description="executive_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="vendor_id",
 *          description="vendor_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="sales_agent_id",
 *          description="sales_agent_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="currency_symbol",
 *          description="currency_symbol",
 *          type="string"
 *      )
 * )
 */
class Quotation extends Model
{
    use SoftDeletes;

    public $table = 'quotations';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'customer_name' => 'string',
        'email' => 'string',
        'customer_phone' => 'string',
        'customer_mobile' => 'string',
        'company_id' => 'integer',
        'property_equipment_id' => 'integer',
        'tir_rate_id' => 'integer',
        'purchase_id' => 'integer',
        'executive_id' => 'integer',
        'vendor_id' => 'integer',
        'sales_agent_id' => 'integer',
        'currency_symbol' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function company()
    {
        return $this->belongsTo(\App\Models\Company::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function executive()
    {
        return $this->belongsTo(\App\Models\Executive::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function propertyEquipment()
    {
        return $this->belongsTo(\App\Models\PropertyEquipment::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function ratePurchase()
    {
        return $this->belongsTo(\App\Models\RatePurchase::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function salesAgent()
    {
        return $this->belongsTo(\App\Models\SalesAgent::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function tirRate()
    {
        return $this->belongsTo(\App\Models\TirRate::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function vendor()
    {
        return $this->belongsTo(\App\Models\Vendor::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function priceQuotes()
    {
        return $this->hasMany(\App\Models\PriceQuote::class);
    }
}
