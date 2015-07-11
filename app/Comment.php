<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    /**
     * A comment belongs to a post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post()
    {
        return $this->belongsTo('Post');
    }

}
