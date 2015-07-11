<?php namespace App;

//use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent;
use Illuminate\Support\Str;

//class Post extends Model
class Post extends \Eloquent
{


    protected $fillable = [
        'user_id',   //temporary
        'title',
        'body',
        'slug',
        'image_path',
        'image_caption',
        'status',
        'published_at',
    ];

    protected $dates = ['published_at'];

    /**
     * Set a scope of all published articles
     *
     * @param $query
     */
    public function scopePublished($query)
    {
        $query->where('published_at', '<=', Carbon::now());
    }


    /**
     * Set a scope of all unpublished articles
     *
     * @param $query
     */
    public function scopeUnpublished($query)
    {
        $query->where('published_at', '>', Carbon::now());
    }


    /**
     * @param $date
     */
    public function setPublishedAtAttribute($date)
    {
        $this->attributes['published_at'] = Carbon::parse($date);
    }


    /**
     * Make sure the title is capitalized and create the slug
     *
     * @param $value
     */
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = ucfirst($value);

        // TODO: Check for unique slug and fix as needed
        $this->attributes['slug']  = Str::slug($value);
    }


    /**
     * A post belongs to a single user
     *
     * @return Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }


    /**
     * A post can have many comments
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }


    /**
     * Get all tags assigned to the given post
     *
     * @return Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

}
