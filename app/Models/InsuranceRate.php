<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="InsuranceRate",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="description",
 *          description="description",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="weekly_rate",
 *          description="weekly_rate",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="monthly_rate",
 *          description="monthly_rate",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="quarterly_rate",
 *          description="quarterly_rate",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="biannual_rate",
 *          description="biannual_rate",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="annual_rate",
 *          description="annual_rate",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="property_equipment_id",
 *          description="property_equipment_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="range_value_id",
 *          description="range_value_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="company_id",
 *          description="company_id",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class InsuranceRate extends Model
{
    use SoftDeletes;

    public $table = 'insurance_rates';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'description' => 'string',
        'property_equipment_id' => 'integer',
        'range_value_id' => 'integer',
        'company_id' => 'integer'
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
    public function propertyEquipment()
    {
        return $this->belongsTo(\App\Models\PropertyEquipment::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function rangeValueRate()
    {
        return $this->belongsTo(\App\Models\RangeValueRate::class);
    }
}
