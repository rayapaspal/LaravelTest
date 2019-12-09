@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="blog-main col-md-9 col-lg-9 col-sm-9">
                <div class="blog-post">
                    <ul class="list-group">
                        @foreach($users as $user)
                            <li class="list-group-item">
                                <h2 class="blockquote-reverse"><a href="/users/{{$user->id}}">{{$user->name}}</a></h2>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <nav class="blog-pagination">
                
                </nav>
            </div>
            
        </div>
    </div>
@endsection
