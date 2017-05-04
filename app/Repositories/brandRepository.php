<?php

namespace App\Repositories;

use App\Models\brand;
use InfyOm\Generator\Common\BaseRepository;

class brandRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name_en',
        'name_ar'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return brand::class;
    }
}
