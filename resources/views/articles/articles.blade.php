@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="blog-main col-md-9 col-lg-9 col-sm-9">
                <div class="blog-post">
                    <ul class="list-group">
                        <div class="panel-heading">
                            All Articles by <a href="/users/{{$user->id}}">{{$user->name}}</a>
                        </div>
                        @foreach($user->articles as $article)
                            <li class="list-group-item">
                                <h2 class="blog-post-title"><a href="/articles/{{$article->id}}">{{$article->title}}</a></h2>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <nav class="blog-pagination">
                
                </nav>
            </div>
            <aside class="col-md-3 blog-sidebar">
                <div class="p-3">
                    <h3 class="blog-post-title">Know About {{$article->user->name}}</h3>
                    <hr class="linenums" color="red">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            {{$article->user->name}}'s Profile
                        </div>
                        <div class="panel-body">
                            <li class="list-group-item-info">Name : {{$article->user->name}}</li>
                            <li class="list-group-item-info">Email : {{$article->user->email}}</li>
                            <li class="list-group-item-info">City : {{$article->user->profile->city}}</li>
                            <li class="list-group-item-info">About : {{$article->user->profile->about}}</li>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
@endsection
