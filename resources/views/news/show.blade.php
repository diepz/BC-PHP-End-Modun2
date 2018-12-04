@extends('welcome')
@section('title', 'New Feeds')
@section('content')
    <a class="delete is-large" href="{{route('news.index')}}" style="margin: 1px 90%;"></a>

    <div class="row">
        <div class="col-xs-12">
            <div class="form-group">
                <h3>Title: {{ $feeds->title }}</h3>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="form-group">
                <h2>Content:  {{ $feeds->content}}</h2>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="form-group">
                <h2>Image:  <img src="{{'/images/' . $feeds->image}}"</h2>

            </div>
        </div>
    </div>





@endsection

