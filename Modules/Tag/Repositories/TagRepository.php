<?php

namespace Modules\Tag\Repositories;

use Modules\Tag\Entities\Tag;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TagRepository.
 */
class TagRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function __construct(Tag $model)
    {
        $this->model = $model;
    }

    /**
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function getAll($orderBy = 'created_at', $sort = 'desc')
    {
        return $this->model
            ->orderBy($orderBy, $sort)
            ->get();
    }

    /**
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->model
            ->select('*');
    }
}
