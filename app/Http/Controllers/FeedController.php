<?php namespace App\Http\Controllers;

//use App\Http\Requests;
//use App\Http\Controllers\Controller;
//
//use Illuminate\Http\Request;
use App\Helpers\Text;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Roumen\Feed\Facades\Feed;

class FeedController extends Controller
{

    public function feed()
    {
        // create new feed
        $feed = Feed::make();

        // cache the feed for 60 minutes (second parameter is optional)
        $feed->setCache(0, 'laravelFeedKey');

        // check if there is cached feed and build new only if is not
        if (!$feed->isCached()) {
            // creating rss feed with our most recent 20 posts
            $posts = DB::table('posts')->where('published_at', '<=', Carbon::now())->orderBy('published_at',
                'desc')->take(20)->get();

            // set your feed's title, description, link, pubdate and language
            $feed->title       = "Where's My Head?";
            $feed->description = 'A blog about embracing life, love and God as a middle aged single guy';
            $feed->logo        = 'http://wheresmyhead.com/images/feed-logo.png';
            $feed->link        = URL::to('feed');
            $feed->setDateFormat('datetime'); // 'datetime', 'timestamp' or 'carbon'
            $feed->pubdate = $posts[0]->published_at;
            $feed->lang    = 'en';
            $feed->setShortening(FALSE); // true or false
            $feed->setTextLimit(100); // maximum length of description text

            foreach ($posts as $post) {
                // set item's title, author, url, pubdate, description and content
                $feed->add(
                    $post->title,
//                    $post->author,
                    NULL,           // Until I feel like adding an author - maybe I'll just hardcode it
                    URL::to('posts/' . $post->slug),
                    $post->published_at,
                    Text::renderMarkdown(Text::excerpt($post->body)),    // This one is actually the description
                    Text::renderMarkdown(Text::excerpt($post->body))
                );
            }

        }

// first param is the feed format
// optional: second param is cache duration (value of 0 turns off caching)
// optional: you can set custom cache key with 3rd param as string
        return $feed->render('atom');

// to return your feed as a string set second param to -1
// $xml = $feed->render('atom', -1);

    }
}
