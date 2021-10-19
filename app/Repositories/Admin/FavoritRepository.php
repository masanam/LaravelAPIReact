<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Favorit;
use App\Repositories\BaseRepository;

/**
 * Class FavoritRepository
 * @package App\Repositories\Admin
 * @version October 19, 2021, 5:57 am UTC
*/

class FavoritRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'company_id'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Favorit::class;
    }
}
