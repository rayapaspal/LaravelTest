@extends('layouts.app')
@section('content')
    <div class="container">
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <div class="card-header">
            {!! Form::model($article, ['route' => ['articles.update', $article->id], 'method' => 'PUT', 'files' => 'true']) !!}
            <div class="form-group">
                {!! Form::label('title', 'Title', ['class' => 'awesome']) !!}
                {!! Form::text('title', '$article->title', ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('body', 'Body', ['class' => 'awesome']) !!}
                {!! Form::text('body', '$article->body', ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('published_at', 'Published On', ['class' => 'awesome']) !!}
                {!! Form::text('date', 'published_at', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::file('image') !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Edit Article', ['class' => 'btn btn-primary form-control']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
