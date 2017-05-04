<?php

namespace App\Repositories;

use App\Models\inquiry;
use InfyOm\Generator\Common\BaseRepository;

class inquiryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'mobile',
        'message',
        'subject',
        'brand_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return inquiry::class;
    }
}
