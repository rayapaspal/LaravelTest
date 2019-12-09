@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card-header">
            <div class="row justify-content-left">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            Categories
                            <p></p>
                            Articles
                            <p></p>
                            Add Users
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('article.store')}}" enctype="multipart/form-data" method="POST">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="post-name">Title <span class="required">*</span></label>
                                    <input placeholder="Enter title" requiredn name = "title" class="form-control"/>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
