<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Post;

//use Illuminate\Http\Request;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class PostController extends Controller
{
    function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }


    /**
     * Front page - show all posts
     * TODO: Add pogination to this
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $posts = Post::latest('published_at')->published()->get();

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
        $now = Carbon::now();

        return view('posts/create', compact('now', 'tags'));
    }


    /**
     * Load the edit form with an existing post
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function edit(Post $post)
    {
        return view('posts/edit', compact('post'));
    }


    /**
     * Store a new post in the database
     *
     * @param CreatePostRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(PostRequest $request)
    {
        $post = \Auth::user()->posts()->create($request->all());
        $post->tags()->attach($request->input('tags'));

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
    public function update($id, PostRequest $request)
    {
        $post = Post::findOrFail($id);
        $post->update($request->all());

        return redirect('posts/' . $post->id);
    }
}
