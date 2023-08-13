<?php

namespace Modules\MovieReview\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\MovieReview\Entities\MovieReview;
use Modules\MovieReview\Http\Requests\ManageMovieReviewRequest;
use Modules\MovieReview\Http\Requests\CreateMovieReviewRequest;
use Modules\MovieReview\Http\Requests\UpdateMovieReviewRequest;
use Modules\MovieReview\Http\Requests\ShowMovieReviewRequest;
use Modules\MovieReview\Repositories\MovieReviewRepository;

class MovieReviewController extends Controller
{
 /**
     * @var MovieReviewRepository
     * @var CategoryRepository
     */
    protected $moviereview;

    /**
     * @param MovieReviewRepository $moviereview
     */
    public function __construct(MovieReviewRepository $moviereview)
    {
        $this->moviereview = $moviereview;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(ManageMovieReviewRequest $request)
    {
        return view('moviereview::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(ManageMovieReviewRequest $request)
    {
        return view('moviereview::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateMovieReviewRequest $request)
    {
        $this->moviereview->create($request->except('_token','_method'));
        return redirect()->route('admin.moviereview.index')->withFlashSuccess(trans('moviereview::alerts.backend.moviereview.created'));
    }

    /**
     * @param MovieReview              $moviereview
     * @param ManageMovieReviewRequest $request
     *
     * @return mixed
     */
    public function edit(MovieReview $moviereview, ManageMovieReviewRequest $request)
    {
        return view('moviereview::edit')
            ->withMovieReview($moviereview);
    }

    /**
     * @param MovieReview              $moviereview
     * @param UpdateMovieReviewRequest $request
     *
     * @return mixed
     */
    public function update(MovieReview $moviereview, UpdateMovieReviewRequest $request)
    {
        $this->moviereview->updateById($moviereview->id,$request->except('_token','_method'));

        return redirect()->route('admin.moviereview.index')->withFlashSuccess(trans('moviereview::alerts.backend.moviereview.updated'));
    }

    /**
     * @param MovieReview              $moviereview
     * @param ManageMovieReviewRequest $request
     *
     * @return mixed
     */
    public function show(MovieReview $moviereview, ShowMovieReviewRequest $request)
    {
        return view('moviereview::show')->withMovieReview($moviereview);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(MovieReview $moviereview)
    {
        $this->moviereview->deleteById($moviereview->id);

        return redirect()->route('admin.moviereview.index')->withFlashSuccess(trans('moviereview::alerts.backend.moviereview.deleted'));
    }
}
