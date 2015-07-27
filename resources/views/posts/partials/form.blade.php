<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('body', 'Body:') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('published_at', 'Publish on:') !!}
    {!! Form::text('published_at', $pubDate, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('image','Main image:') !!}
    <?php
    // TODO: make this look for a value and show file upload if none. Edit method needs to handle storing them correctly.
    // TODO: If filled, provide a way to remove the existing.
    ?>
    @if ($action == 'create')
        {!! Form::file('image') !!}
    @else
        {!! Form::text('image', null, ['class' => 'form-control']) !!}
    @endif
</div>

<div class="form-group">
    {!! Form::label('image_credit', 'Image credit:') !!}
    {!! Form::text('image_credit', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('thumbnail','Thumbnail image:') !!}
    <?php
    // TODO: make this look for a value and show file upload if none. Edit method needs to handle storing them correctly.
    // TODO: If filled, provide a way to remove the existing.
    ?>
    @if ($action == 'create')
        {!! Form::file('thumbnail') !!}
    @else
        {!! Form::text('thumbnail', null, ['class' => 'form-control']) !!}
    @endif
</div>

<div class="form-group">
    {!! Form::label('tag_list', 'Tags:') !!}
    {!! Form::select('tag_list[]', $tags, null, ['class' => 'form-control', 'multiple']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
</div>
