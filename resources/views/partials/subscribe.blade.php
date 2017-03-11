<div class="modal fade" id="subscribeModal"
     tabindex="-1" role="dialog"
     aria-labelledby="subscribeModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"
                    id="subscribeModalLabel">Subscribe by email</h4>
            </div>
            <div class="modal-body">
                <p>Tired of checking the site to see if anything new has been posted?
                    Think you might miss notifications on Twitter in the midst of all the political grumbling?
                    Now you can get an email when new content is posted. Just enter your email address
                    in the box and click Submit and you're all set. You're welcome.
                </p>

                {!! Form::open(
        [
         //'route' => 'books.favorite',
         'class' => 'form'
        ]
      ) !!}
                {!! Form::hidden('id', '', ['id' => 'book-id']) !!}
                <span class="pull-right">
        <button type="button"
                class="btn btn-default"
                data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary">Submit</button>
        </span>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>
