<?php

namespace Modules\MovieReview\Http\Controllers;

use Illuminate\Routing\Controller;
use DataTables;
use Modules\MovieReview\Repositories\MovieReviewRepository;
use Modules\MovieReview\Http\Requests\ManageMovieReviewRequest;

class MovieReviewTableController extends Controller
{
    /**
     * @var MovieReviewRepository
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
     * @param ManageMovieReviewRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageMovieReviewRequest $request)
    {
        return DataTables::of($this->moviereview->getForDataTable())
            ->addColumn('movie', function ($moviereview) {
                return $moviereview->movie->title;
            })
            ->addColumn('actions', function ($moviereview) {
                return $moviereview->action_buttons;
            })
            ->rawColumns(['movie','actions'])
            ->make(true);
    }
}
