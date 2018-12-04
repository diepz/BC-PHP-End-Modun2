@extends('welcome')
@section('title', 'ADD New Feed')
@section('content')
    <form action="{{ route('news.update', $feeds->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="field">
            <label class="label">Title</label>
            <div class="control has-icons-left has-icons-right">
                <input class="input is-success" type="text" placeholder="Text input" value="{{ $feeds->title }}" name="title">
                <span class="icon is-small is-left">
      <i class="fas fa-user"></i>
    </span>
                <span class="icon is-small is-right">
      <i class="fas fa-check"></i>
    </span>
            </div>
            <div class="field">
                <label class="label">Content</label>
                <div class="control">
                    <input class="input" type="text" placeholder="input" name="content" value="{{ $feeds->content }}">
                </div>
            </div>
            <p class="help is-success">This content is available</p>
        </div>
        <div class="form-group">
            @if ("/images/{{ $feeds->images }}")
                <img src="{{ $feeds->images }}">
            @else
                <p>No image found</p>
            @endif
            image <input type="file" name="image" value="{{ $feeds->images }}"/>
        </div>

        <div class="field is-grouped is-grouped-centered">
            <p class="control">
                <button type="submit" class="btn btn-xs btn-primary" name="button">SUBMIT</button>
            </p>
            <p class="control">
                <a class="button is-light" href="{{ route('news.index') }}">
                    Cancel
                </a>
            </p>
        </div>
    </form>

@endsection

