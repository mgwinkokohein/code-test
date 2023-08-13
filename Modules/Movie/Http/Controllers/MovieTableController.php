<?php

namespace Modules\Movie\Http\Controllers;

use Illuminate\Routing\Controller;
use DataTables;
use Modules\Movie\Repositories\MovieRepository;
use Modules\Movie\Http\Requests\ManageMovieRequest;

class MovieTableController extends Controller
{
    /**
     * @var MovieRepository
     */
    protected $movie;

    /**
     * @param MovieRepository $movie
     */
    public function __construct(MovieRepository $movie)
    {
        $this->movie = $movie;
    }

    /**
     * @param ManageMovieRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageMovieRequest $request)
    {
        return DataTables::of($this->movie->getForDataTable())
            ->editColumn('user', function ($movie){
                return $movie->user->name;
            })
            ->editColumn('updated_at', function ($movie) {
                return $movie->updated_at;
            })
            ->addColumn('actions', function ($movie) {
                return $movie->action_buttons;
            })
            ->rawColumns(['user','updated_at','actions'])
            ->make(true);
    }
}
