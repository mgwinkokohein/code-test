<?php

namespace Modules\Tag\Entities;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Modules\Movie\Entities\Movie;

class Tag extends Model
{
    use SoftDeletes;
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tag';

    protected $fillable = ["id"];


    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'movie_tags');
    }

       /**
     * @return string
     */
    public function getShowButtonAttribute()
    {
        if(auth()->user()->can('admin.access.tag.view')){
            return '<a href="'.route('admin.tag.show', $this).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.view').'" class="btn btn-info btn-sm"><i class="fas fa-search"></i>&nbsp;View</a>';
        }
        return '';
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        if(auth()->user()->can('admin.access.tag.edit')){
            return '<a href="'.route('admin.tag.edit', $this).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.edit').'" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>&nbsp;Edit</a>';
        }
        return '';
    }

     /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        if (auth()->user()->can('admin.access.tag.delete')) {
            return '<a href="'.route('admin.tag.destroy', $this).'" data-method="delete"
                 data-trans-button-cancel="'.__('buttons.general.cancel').'"
                 data-trans-button-confirm="'.__('buttons.general.crud.delete').'"
                 data-trans-title="'.__('strings.backend.general.are_you_sure').'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.delete').'" class="btn btn-danger btn-sm"><i class="fas fa-trash" style="color: #fff;"></i>&nbsp;<span style="color: #fff;">Delete</span></a> ';
        }

        return '';
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
            return $this->getShowButtonAttribute().' '.$this->getEditButtonAttribute().' '.$this->getDeleteButtonAttribute();
    }
}
