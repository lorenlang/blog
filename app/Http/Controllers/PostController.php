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
        $selectedTags = array();
        $now = Carbon::now();

        return view('posts/create', compact('now', 'tags', 'selectedTags'));
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

        $selectedTags = array();
        foreach ($post->tags as $tag) {
            $selectedTags[] = $tag->id;
        }

        return view('posts/edit', compact('post', 'tags', 'selectedTags'));
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
//        $post = \Auth::user()->posts()->create($request->all());
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
    public function update(Post $post, PostRequest $request)
    {
//        dd($request);
//        $post = Post::findOrFail($id);
        $post->update($request->all());

        $post->tags()->sync($request->input('tags'));

        return redirect('posts/' . $post->id);
    }
}
