<?php

namespace Modules\Movie\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Movie\Entities\Movie;
use Modules\Movie\Http\Requests\ManageMovieRequest;
use Modules\Movie\Http\Requests\CreateMovieRequest;
use Modules\Movie\Http\Requests\UpdateMovieRequest;
use Modules\Movie\Http\Requests\ShowMovieRequest;
use Modules\Movie\Repositories\MovieRepository;

class MovieController extends Controller
{
 /**
     * @var MovieRepository
     * @var CategoryRepository
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
     * Display a listing of the resource.
     * @return Response
     */
    public function index(ManageMovieRequest $request)
    {
        return view('movie::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(ManageMovieRequest $request)
    {
        return view('movie::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateMovieRequest $request)
    {
        $data = $request->except('_token','_method');
        $data['user_id'] = auth()->user()->id;
        $this->movie->create($data);
        return redirect()->route('admin.movie.index')->withFlashSuccess(trans('movie::alerts.backend.movie.created'));
    }

    /**
     * @param Movie              $movie
     * @param ManageMovieRequest $request
     *
     * @return mixed
     */
    public function edit(Movie $movie, ManageMovieRequest $request)
    {
        return view('movie::edit')
            ->withMovie($movie);
    }

    /**
     * @param Movie              $movie
     * @param UpdateMovieRequest $request
     *
     * @return mixed
     */
    public function update(Movie $movie, UpdateMovieRequest $request)
    {
        $this->movie->updateById($movie->id,$request->except('_token','_method'));

        return redirect()->route('admin.movie.index')->withFlashSuccess(trans('movie::alerts.backend.movie.updated'));
    }

    /**
     * @param Movie              $movie
     * @param ManageMovieRequest $request
     *
     * @return mixed
     */
    public function show(Movie $movie, ShowMovieRequest $request)
    {
        return view('movie::show')->withMovie($movie);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Movie $movie)
    {
        $this->movie->deleteById($movie->id);

        return redirect()->route('admin.movie.index')->withFlashSuccess(trans('movie::alerts.backend.movie.deleted'));
    }
}
