<?php

namespace Modules\Tag\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Tag\Entities\Tag;
use Modules\Tag\Http\Requests\ManageTagRequest;
use Modules\Tag\Http\Requests\CreateTagRequest;
use Modules\Tag\Http\Requests\UpdateTagRequest;
use Modules\Tag\Http\Requests\ShowTagRequest;
use Modules\Tag\Repositories\TagRepository;

class TagController extends Controller
{
 /**
     * @var TagRepository
     * @var CategoryRepository
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
     * Display a listing of the resource.
     * @return Response
     */
    public function index(ManageTagRequest $request)
    {
        return view('tag::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(ManageTagRequest $request)
    {
        return view('tag::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateTagRequest $request)
    {
        $this->tag->create($request->except('_token','_method'));
        return redirect()->route('admin.tag.index')->withFlashSuccess(trans('tag::alerts.backend.tag.created'));
    }

    /**
     * @param Tag              $tag
     * @param ManageTagRequest $request
     *
     * @return mixed
     */
    public function edit(Tag $tag, ManageTagRequest $request)
    {
        return view('tag::edit')
            ->withTag($tag);
    }

    /**
     * @param Tag              $tag
     * @param UpdateTagRequest $request
     *
     * @return mixed
     */
    public function update(Tag $tag, UpdateTagRequest $request)
    {
        $this->tag->updateById($tag->id,$request->except('_token','_method'));

        return redirect()->route('admin.tag.index')->withFlashSuccess(trans('tag::alerts.backend.tag.updated'));
    }

    /**
     * @param Tag              $tag
     * @param ManageTagRequest $request
     *
     * @return mixed
     */
    public function show(Tag $tag, ShowTagRequest $request)
    {
        return view('tag::show')->withTag($tag);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Tag $tag)
    {
        $this->tag->deleteById($tag->id);

        return redirect()->route('admin.tag.index')->withFlashSuccess(trans('tag::alerts.backend.tag.deleted'));
    }
}
