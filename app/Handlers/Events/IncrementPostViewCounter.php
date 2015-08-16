<?php namespace App\Handlers\Events;

use App\Events\PostWasViewed;

use App\Post;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use Illuminate\Session\Store;

class IncrementPostViewCounter
{

    private $session;

    /**
     * Create the event handler.
     *
     * @return void
     */
    public function __construct(Store $session)
    {
        $this->session = $session;
    }

    /**
     * Handle the event.
     *
     * @param  PostWasViewed $event
     * @return void
     */
    public function handle(PostWasViewed $event)
    {
        if (!$this->postViewedThisSession($event->post)) {
            $event->post->increment('view_counter');
            $this->storePostIdInSession($event->post);
        }
    }


    private function postViewedThisSession(Post $post)
    {
        // Get all the viewed posts from the session. If no entry in the session exists, default to an empty array.
        $viewed = $this->session->get('viewed_posts', []);

        // Check the viewed posts array for the existence of the id of the post
        return in_array($post->id, $viewed);
    }


    private function storePostIdInSession(Post $post)
    {
        // Push the post id onto the viewed_posts session array.
        $this->session->push('viewed_posts', $post->id);
    }

}
