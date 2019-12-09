@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="pb-3 mb-4 font-italic border-bottom">{{$article->title}}</h3> by
                        <p>{{$article->user->name}}</p>
                    </div>
                    <div class="panel-body">
                        <li class="list-group-item">{{$article->body}}</li>
                        <strong>Tags:</strong>
                        @foreach($tags as $tag)
                        {{$tag->tag}}...
                        @endforeach
                    </div>
                    <br/>
                    <div class="panel panel-default">
                        <h4 class="pb-3 mb-4 font-italic border-bottom">All Comments for this Article</h4>
                        @foreach($user->profile->comments as $comment)
                        <li class="list-group-item">{{$comment->body}}</li>
                        <li class="list-group-item"><strong>by <a href="/users/{{$comment->user_id}}">{{$comment->user->name}}</a></strong></li>
                        @endforeach
                    </div>
                </div>
            </div>

            <aside class="col-md-4 blog-sidebar">
                <div class="p-3">
                    <h3 class="blog-post">
                        This user belongs to {{$country->name}}
                    </h3>
                    <li class="list-group-item-info">
                        Other Articles by
                        <p><a href="/users/{{$article->user->id}}/articles">
                            {{$article->user->name}}</a>
                        </p>
                    </li>

                    <h3 class="blog-post">
                        All articles from {{$country->name}}
                    </h3>

                    @foreach($country->articles as $article)
                    <li class="list-group-item">
                        <a href="/articles/{{$article->id}}">{{$article->title}}</a>
                    </li>
                    @endforeach
                </div>
            </aside>
        </div>
    </div>
@endsection
