<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class brand
 * @package App\Models
 * @version May 3, 2017, 11:06 am UTC
 */
class brand extends Model
{
    use SoftDeletes;

    public $table = 'brands';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name_en',
        'name_ar'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name_en' => 'string',
        'name_ar' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name_en' => 'required',
        'name_ar' => 'required'
    ];

    public function settings()
      {
          return $this->hasMany('App\Models\settings');
      }
      public function inquiries()
        {
            return $this->hasMany('App\Models\inquiry');
        }
}
