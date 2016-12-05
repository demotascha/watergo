<?php

namespace Watergo\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Watergo\Entities\Location;
use Watergo\Validators\LocationValidator;

/**
 * Class LocationRepositoryEloquent
 * @package namespace Watergo\Repositories;
 */
class LocationRepositoryEloquent extends BaseRepository implements LocationRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Location::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return LocationValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
