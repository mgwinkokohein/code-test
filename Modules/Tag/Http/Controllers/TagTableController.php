<?php

namespace Modules\Tag\Http\Controllers;

use Illuminate\Routing\Controller;
use DataTables;
use Modules\Tag\Repositories\TagRepository;
use Modules\Tag\Http\Requests\ManageTagRequest;

class TagTableController extends Controller
{
    /**
     * @var TagRepository
     */
    protected $tag;

    /**
     * @param TagRepository $tag
     */
    public function __construct(TagRepository $tag)
    {
        $this->tag = $tag;
    }

    /**
     * @param ManageTagRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageTagRequest $request)
    {
        return DataTables::of($this->tag->getForDataTable())
            ->addColumn('actions', function ($tag) {
                return $tag->action_buttons;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
