<?php

namespace Modules\Api\Http\Controllers;

use Illuminate\Routing\Controller;
use DataTables;
use Modules\Api\Repositories\ApiRepository;
use Modules\Api\Http\Requests\ManageApiRequest;

class ApiTableController extends Controller
{
    /**
     * @var ApiRepository
     */
    protected $api;

    /**
     * @param ApiRepository $api
     */
    public function __construct(ApiRepository $api)
    {
        $this->api = $api;
    }

    /**
     * @param ManageApiRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageApiRequest $request)
    {
        return DataTables::of($this->api->getForDataTable())
            ->addColumn('actions', function ($api) {
                return $api->action_buttons;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
