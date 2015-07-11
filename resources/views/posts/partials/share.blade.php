<a target="_blank" title="Share on Twitter"
   href="http://twitter.com/?status={{ rawurlencode($post->title) }} {{ url('posts/' . $post->slug) }}"><i class="icon-twitter"></i></a>
<a target="_blank" title="Share on Facebook"
   href="http://www.facebook.com/sharer/sharer.php?u={{ url('posts/' . $post->slug) }}"><i class="icon-facebook"></i></a>
<a target="_blank" title="Share on Google+"
   href="https://plus.google.com/share?url={{ url('posts/' . $post->slug) }}"><i class="icon-google-plus"></i></a>
<a target="_blank" title="Share on StumbleUpon"
   href="http://www.stumbleupon.com/submit?url={{ url('posts/' . $post->slug) }}"><i class="icon-stumbleupon"></i></a>
<a target="_blank" title="Share on LinkedIn"
   href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ url('posts/' . $post->slug) }}&amp;title={{ rawurlencode($post->title) }}"><i class="icon-linkedin"></i></a>
<a target="_blank" title="Share on Reddit"
   href="http://reddit.com/submit?url={{ url('posts/' . $post->slug) }}&amp;title={{ rawurlencode($post->title) }}"><i class="icon-reddit"></i></a>
<a target="_blank" title="Share by Email"
   href="mailto:?subject={{ rawurlencode($post->title) }}&amp;body={{ rawurlencode($post->title) }}: {{ url('posts/' . $post->slug) }}"><i class="icon-email"></i></a>



{{--<a class="btn btn-twitter" target="_blank" title="Share on Twitter"--}}
   {{--href="http://twitter.com/?status=Social%20Sharing%20Buttons%20with%20Bootstrap%20and%20Font%20Awesome http://www.himpfen.com/social-sharing-buttons-bootstrap-font-awesome/">Tw</a>--}}
{{--<a class="btn btn-facebook" target="_blank" title="Share on Facebook"--}}
{{--href="http://www.facebook.com/sharer/sharer.php?u={{ url($post->slug) }} http://www.himpfen.com/social-sharing-buttons-bootstrap-font-awesome/">Fa</a>--}}
{{--<a class="btn btn-googleplus" target="_blank" title="Share on Google+"--}}
   {{--href="https://plus.google.com/share?url=http://www.himpfen.com/social-sharing-buttons-bootstrap-font-awesome/">G+</a>--}}
{{--<a class="btn btn-stumbleupon" target="_blank" title="Share on StumbleUpon"--}}
   {{--href="http://www.stumbleupon.com/submit?url=http://www.himpfen.com/social-sharing-buttons-bootstrap-font-awesome/">St</a>--}}
{{--<a class="btn btn-linkedin" target="_blank" title="Share on LinkedIn"--}}
   {{--href="http://www.linkedin.com/shareArticle?mini=true&amp;url=http://www.himpfen.com/social-sharing-buttons-bootstrap-font-awesome/&amp;title=Social%20Sharing%20Buttons%20with%20Bootstrap%20and%20Font%20Awesome&amp;source=Brandon Himpfen">Li</a>--}}
{{--<a class="btn btn-reddit" target="_blank" title="Share on Reddit"--}}
   {{--href="http://reddit.com/submit?url=http://www.himpfen.com/social-sharing-buttons-bootstrap-font-awesome/&amp;title=Social%20Sharing%20Buttons%20with%20Bootstrap%20and%20Font%20Awesome">Re</a>--}}
{{--<a class="btn btn-email" target="_blank" title="Share by Email"--}}
   {{--href="mailto:?subject=Social%20Sharing%20Buttons%20with%20Bootstrap%20and%20Font%20Awesome&amp;body=Social%20Sharing%20Buttons%20with%20Bootstrap%20and%20Font%20Awesome:http://www.himpfen.com/social-sharing-buttons-bootstrap-font-awesome/">Email</a>--}}
