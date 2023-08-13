<?php

namespace App\Domains\Auth\Models\Traits\Relationship;

use App\Domains\Auth\Models\PasswordHistory;
use Modules\Movie\Entities\Movie;

/**
 * Class UserRelationship.
 */
trait UserRelationship
{
    /**
     * @return mixed
     */
    public function passwordHistories()
    {
        return $this->morphMany(PasswordHistory::class, 'model');
    }

    /**
     * Get the dealer associated with the user.
     */

    public function movies()
    {
        return $this->hasMany(Movie::class);
    }

    
}
