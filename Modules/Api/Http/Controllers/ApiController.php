<?php

namespace Modules\Api\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Api\Entities\Api;
use Modules\Movie\Entities\Movie;
use Modules\Movie\Entities\MovieTag;
use Modules\Api\Http\Requests\ManageApiRequest;
use Modules\Api\Http\Requests\CreateApiRequest;
use Modules\Api\Http\Requests\UpdateApiRequest;
use Modules\Api\Http\Requests\ShowApiRequest;
use Modules\Api\Repositories\ApiRepository;
use App\Domains\Auth\Services\UserService;
use Modules\Api\Http\Requests\RegisterRequest;
use Modules\Api\Http\Requests\ApiLoginRequest;
use Modules\Api\Http\Requests\CreateApiMovieRequest;
use Modules\Api\Http\Requests\UpdateApiMovieRequest;
use Modules\Api\Http\Requests\DeleteApiMovieRequest;
use Illuminate\Support\Facades\Auth;
use Modules\Movie\Repositories\MovieRepository;
use Modules\MovieReview\Repositories\MovieReviewRepository;
use Modules\MovieReview\Http\Requests\MovieReviewApiRequest;

class ApiController extends Controller
{
 /**
     * @var ApiRepository
     * @var CategoryRepository
     */
    protected $api;

    /**
     * @param ApiRepository $api
     */
    public function __construct(protected UserService $userService , protected MovieRepository $movie, protected MovieReviewRepository $movieReview)
    {
        $this->userService = $userService;
        $this->movie       = $movie;
        $this->movieReview = $movieReview;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(ManageApiRequest $request)
    {
        return view('api::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(ManageApiRequest $request)
    {
        return view('api::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateApiRequest $request)
    {
        $this->api->create($request->except('_token','_method'));
        return redirect()->route('admin.api.index')->withFlashSuccess(trans('api::alerts.backend.api.created'));
    }

    /**
     * @param Api              $api
     * @param ManageApiRequest $request
     *
     * @return mixed
     */
    public function edit(Api $api, ManageApiRequest $request)
    {
        return view('api::edit')
            ->withApi($api);
    }

    /**
     * @param Api              $api
     * @param UpdateApiRequest $request
     *
     * @return mixed
     */
    public function update(Api $api, UpdateApiRequest $request)
    {
        $this->api->updateById($api->id,$request->except('_token','_method'));

        return redirect()->route('admin.api.index')->withFlashSuccess(trans('api::alerts.backend.api.updated'));
    }

    /**
     * @param Api              $api
     * @param ManageApiRequest $request
     *
     * @return mixed
     */
    public function show(Api $api, ShowApiRequest $request)
    {
        return view('api::show')->withApi($api);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Api $api)
    {
        $this->api->deleteById($api->id);

        return redirect()->route('admin.api.index')->withFlashSuccess(trans('api::alerts.backend.api.deleted'));
    }


    public function signup(RegisterRequest $request)
    {
        $data = $request->all();
        
        $user = $this->userService->registerUser($data);
        $token = $user->createToken('Code Test')->accessToken;
        return api_response(['token'=>$token,'message'=>'Your account created successfully'],200);
    }

    public function login(ApiLoginRequest $request)
    {
        if (Auth::guard()->attempt($request->only('email', 'password'))) {
            $user = auth()->user();
            $token = $user->createToken('Code Test')->accessToken;
            return api_response(['token'=>$token, 'message' => 'Login Success'],200);
        }
        return api_response(['message' => 'Fail Login'],401);
    }

    public function profile() {
        $user = auth()->user();
        $responseData = ['name' => $user->name, 'email' => $user->email];
        return api_response($responseData,200);
    }

    public function logout(Request $request) {
        auth()->user()->token()->revoke();
        return api_response(['message' => 'successfully logout'],200);
    }

    public function createMovie(CreateApiMovieRequest $request)
    {
        $data = $request->only('title','director','rating');
        $data['user_id'] = auth()->user()->id;
        $movie = $this->movie->create($data);
        if ($movie) {
            $movieTag['movie_id'] = $movie->id;
            $movieTag['tag_id']   = $request->tag_id;
            MovieTag::create($movieTag);
        }
        return api_response(['message' => 'You create movie successful'],200);
    }

    public function movieLists()
    {
        $movies = $this->movie->getAll();

        return api_response($movies,200);
    }

    public function updateMovie(UpdateApiMovieRequest $request,$id)
    {
        $movie = $this->movie->getById($id);
        if ($movie->user_id == auth()->user()->id) {
            if ($this->movie->updateById($movie->id,$request->all())) {
            return api_response(['message' => 'movie updated successfully'],200);
            }
        } else {
            return api_response(['message' => 'you have not access to update this'], 401);

        } 
    }

    public function destoryMovie($id)
    {
        $movie = $this->movie->getById($id);
        if($movie->user_id == auth()->user()->id ) {
            MovieTag::where('movie_id',$movie->id)->delete();
            if ($this->movie->deleteById($movie->id)) {
            return api_response(['message'=>'Your movie delete successfully'],200);
            }
        } else {
            return api_response(['message' => 'you have not access to delete this'], 401);
        }
        
    }

    public function filter(Request $request)
    {
        $query = Movie::query();
        
        if ($request->has('director')) {
            $query->where('director', 'like', '%' . $request->input('director', '') . '%');
        }

        if ($request->has('tag')) {
            $query->whereHas('tags', function ($q) use ($request) {
                $q->where('name', $request->input('tag'));
            });
        }

        
        $movies = $query->get();
        // dd($movies);
        return api_response($movies,200);
    }

    public function review(MovieReviewApiRequest $request, $id)
    {
        // Check if the movie with the given ID exists
        $movieExists = Movie::find($id);
        if (!$movieExists) {
            return api_response(['message' => 'Movie not found'], 404);
        }

        $data = $request->all();
        $data['movie_id'] = $id;

        if ($this->movieReview->create($data)) {
            return api_response(['message' => 'make review successful'], 200);
        }
    }


    public function exportFilteredMovies(Request $request)
    {
        $filteredMovies = Movie::where('rating', '>=', $request->input('min_rating', 0))
            ->where('director', 'like', '%' . $request->input('director', '') . '%')
            ->get();

        $csvFileName = 'filtered_movies.csv';

        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$csvFileName",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0",
        ];

        return response()->stream(
            function () use ($filteredMovies) {
                $handle = fopen('php://output', 'w');
                fputcsv($handle, ['Title', 'Director', 'Rating']);

                foreach ($filteredMovies as $movie) {
                    fputcsv($handle, [$movie->title, $movie->director, $movie->rating]);
                }

                fclose($handle);
            },
            200,
            $headers
        );
    }

    public function allMovies()
    {
        $movies = $this->movie->getAllMovies();
        return api_response($movies,200);
    }
}
