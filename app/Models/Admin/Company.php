<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Company
 * @package App\Models\Admin
 * @version October 19, 2021, 5:44 am UTC
 *
 * @property string $address
 * @property string $phone
 */
class Company extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'companies';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'address',
        'phone'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'address' => 'string',
        'phone' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'address' => 'nullable|string|max:255',
        'phone' => 'nullable|string|max:20',
        'created_at' => 'required',
        'updated_at' => 'nullable'
    ];

    
}
