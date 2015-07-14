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
    {!! Form::file('image') !!}
</div>

<div class="form-group">
    {!! Form::label('image_credit', 'Image credit:') !!}
    {!! Form::text('image_credit', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('thumbnail','Thumbnail image:') !!}
    {!! Form::file('thumbnail') !!}
</div>

<div class="form-group">
    {!! Form::label('tags', 'Tags:') !!}
    {!! Form::select('tags[]', $tags, $selectedTags, ['class' => 'form-control', 'multiple']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
</div>
