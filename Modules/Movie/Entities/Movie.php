<?php

namespace Modules\Movie\Entities;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Domains\Auth\Models\User;
use Modules\MovieReview\Entities\MovieReview;
use Modules\Tag\Entities\Tag;
use App\Enums\Table;

class Movie extends Model
{
    use SoftDeletes;
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = Table::MOVIE;

    protected $fillable = ["id", "user_id", "title", "director", "rating"];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function movieReviews()
    {
        return $this->hasMany(MovieReview::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'movie_tags');
    }

       /**
     * @return string
     */
    public function getShowButtonAttribute()
    {
        if(auth()->user()->can('admin.access.movie.view')){
            return '<a href="'.route('admin.movie.show', $this).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.view').'" class="btn btn-info btn-sm"><i class="fas fa-search"></i>&nbsp;View</a>';
        }
        return '';
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        if(auth()->user()->can('admin.access.movie.edit')){
            return '<a href="'.route('admin.movie.edit', $this).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.edit').'" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>&nbsp;Edit</a>';
        }
        return '';
    }

     /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        if (auth()->user()->can('admin.access.movie.delete')) {
            return '<a href="'.route('admin.movie.destroy', $this).'" data-method="delete"
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
