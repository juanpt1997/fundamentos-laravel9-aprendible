<label for="">Title</label>
<br>
<input name="title" type="text" value="{{ old('title', $post->title) }}">
<br>
@error('title')
    <small tyle="color:red">{{ $message }}</small>
    <br>
@enderror

<br>
<label for="">Body</label>
<br>
<textarea name="body">{{ old('body', $post->body) }}</textarea>
@error('body')
    <br>
    <small tyle="color:red">{{ $message }}</small>
    <br>
@enderror
