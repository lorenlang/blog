<?php namespace App;

//use Illuminate\Database\Eloquent\Model;
use App\Helpers\ArrayHelper;
use Carbon\Carbon;
use Chencha\Share\ShareFacade;
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
        'image',
        'image_credit',
        'thumbnail',
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
        $this->attributes['slug'] = Str::slug($value);
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
     * Get all tags assigned to the given post
     *
     * @return Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }


    /**
     * Get all tag ids for the given post
     *
     * @return mixed
     */
    public function getTagListAttribute()
    {
        return $this->tags->lists('id');
    }


    public function previous()
    {
        return Post::where('published_at', '<', $this->published_at)->orderBy('published_at', 'desc')->first();
    }


    public function next()
    {
        return Post::where('published_at', '>', $this->published_at)->orderBy('published_at')->first();
    }


    public function shareLinks()
    {
        $shareLinks = ShareFacade::load(url('/posts/' . $this->slug), $this->title)
            ->services('twitter', 'facebook', 'gplus', 'linkedin', 'tumblr', 'pinterest', 'reddit');

        $shareLinks = ArrayHelper::changeKey($shareLinks, 'gplus', 'google-plus');
        $shareLinks = ArrayHelper::changeKey($shareLinks, 'pinterest', 'pinterest-p');
        $shareLinks = ArrayHelper::changeKey($shareLinks, 'reddit', 'reddit-alien');

        $shareLinks['at'] = "mailto:?subject=A blog post you might like&body=I just read this blog post " .
            "called $this->title.  I thought you might like it.   " . url('/posts/' . $this->slug);

        return $shareLinks;
    }
}
