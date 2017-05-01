<?php namespace App\Http\Controllers;

use App\Events\PostWasViewed;
use App\Helpers\ArrayHelper;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Post;

//use Illuminate\Http\Request;
use App\Subscriber;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;
use Thujohn\Twitter\Facades\Twitter;

class PostController extends Controller
{
    function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }


    /**
     * Front page - show all posts
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $posts = Post::latest('published_at')->published()->paginate(5);

//        $msg = <<<MSG
//        An update covering the past week is currently being written.
//        Just between us, though, I'm still pretty wiped out so it may 
//        take a couple days to be completed.  It IS coming, though.  
//                
//        Check back soon, dear reader.  Check back soon.
//MSG;
//        flash()->overlay($msg, 'Hey! Look up here...');

        return view('posts/index', compact('posts'));
    }


    /**
     * Display a single post by ID
     *
     * @param Post $post
     * @return \Illuminate\View\View
     */
    public function show(Post $post)
    {
        if (!$post->exists) {
            return \Response::view('errors/404', array(), 404);
        }

        event(new PostWasViewed($post));

        return view('posts/show', compact('post'));
    }


    /**
     * Load the view for creating a new post
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $tags = Tag::lists('name', 'id');
//        $selectedTags = array();
        $now = Carbon::now();

        return view('posts/create', compact('now', 'tags'));
//        return view('posts/create', compact('now', 'tags', 'selectedTags'));
    }


    /**
     * Load the edit form with an existing post
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function edit(Post $post)
    {
        $tags = Tag::lists('name', 'id');

//        $selectedTags = array();
//        foreach ($post->tags as $tag) {
//            $selectedTags[] = $tag->id;
//        }

        return view('posts/edit', compact('post', 'tags'));
//        return view('posts/edit', compact('post', 'tags', 'selectedTags'));
    }


    /**
     * Store a new post in the database
     *
     * @param CreatePostRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(PostRequest $request)
    {
        $data = $request->except(['image', 'thumbnail']);
        foreach ($request->files->all() as $key => $file) {
            $file->move(public_path('images'), $file->getClientOriginalName());
            $data[$key] = '/images/' . $file->getClientOriginalName();
        }

        $post = \Auth::user()->posts()->create($data);
        $this->syncTags($post, $request->input('tag_list'));
//        $post->tags()->attach($request->input('tag_list'));

//        $this->postTweet($post);
        $this->notifySubscribers($post);


        flash()->success('The post has been successfully created');

        return redirect('posts');
    }


    /**
     * Save an updated post back to the database
     *
     * @param $id
     * @param PostRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Post $post, PostRequest $request)
    {
//        dd($request);
//        $post = Post::findOrFail($id);
        $post->update($request->all());

        $this->syncTags($post, $request->input('tag_list'));

        return redirect('posts/' . $post->slug);
    }

    /**
     * Sync the list of tags int the database for a given post
     *
     * @param Post $post
     * @param array $tags
     */
    private function syncTags(Post $post, array $tags = NULL)
    {
        if (!$tags) {
            $post->tags()->detach();
            return;
        }

        $tags = $this->createNewTags($tags);

        $post->tags()->sync($tags);
    }

    /**
     * Parse the tag list for new entries and create as needed
     *
     * @param array $tags
     * @return mixed
     */
    private function createNewTags(array $tags)
    {
        foreach ($tags as &$tag) {
            if (substr($tag, 0, 4) == 'new:') {
                $newTag = Tag::create(['name' => substr($tag, 4)]);
                $tag    = $newTag->id;
            }
        }
        return $tags;
    }

    private function postTweet(Post $post)
    {
//        $status = 'New blog post: ' . $post->title . ' ' . url('posts', $post->slug);
//        Twitter::postTweet(['status' => $status, 'format' => 'json']);
    }

    private function notifySubscribers(Post $post)
    {

        $subj  = 'Blog post notification from wheresmyhead.com';
        $title = $post->title;
        $url   = url('posts/' . $post->slug);

        Subscriber::all()->each(
            function ($subscriber) use ($subj, $title, $url) {

                $to = $subscriber->email;

                $message = "
A new entry has been posted on the Where's My Head? blog.

Title: $title
URL: $url

";

                $headers = 'From: <no-reply@wheresmyhead.com>' . "\r\n";

                // Always set content-type when sending HTML email
//                $headers .= "MIME-Version: 1.0" . "\r\n";
//                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                mail($to, $subj, $message, $headers);

            }
        );


    }


}
