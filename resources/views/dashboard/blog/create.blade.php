{!! Form::open(['url' => 'post/store']) !!}
<label>Title</label>
{!! Form::text('title', '') !!}
<label>Body</label>
{!! Form::textarea('body', '') !!}

{!! Form::submit('Save Post') !!}

{!! Form::close() !!}