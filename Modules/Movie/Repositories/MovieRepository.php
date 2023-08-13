<?php

namespace Modules\Movie\Repositories;

use Modules\Movie\Entities\Movie;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use Illuminate\Database\Eloquent\Model;
use Cache;

/**
 * Class MovieRepository.
 */
class MovieRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function __construct(Movie $model)
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
        return Cache::remember('movies', 30, function () use ($orderBy, $sort) {
                return $this->model
                    ->orderBy($orderBy, $sort)
                    ->select('title', 'user_id', 'director', 'rating')
                    ->paginate(2);
            });
    }

    public function getAllMovies()
    {
        return Cache::remember('movies', 30, function ()  {
                return $this->model
                    ->with('movieReviews')
                    ->select('id', 'title', 'director', 'rating')
                    ->get();
            });   
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
            ->with('user')
            ->select('*');
    }
}
