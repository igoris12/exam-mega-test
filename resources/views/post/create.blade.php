@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">New post</div>
                    <div class="card-body">
                        <div class="block__form">
                            <form method="POST" action="{{ route('post.store') }}">
                                <div class="form-group">
                                    <label class="form-label">Town</label>
                                    <input class="form-control" type="text" name="post_town"
                                        value="{{ old('post_town') }}">
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Capacity</label>
                                    <input class="form-control" type="text" name="post_capacity"
                                        value="{{ old('post_capacity') }}">
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Code</label>
                                    <input class="form-control" type="text" name="post_code"
                                        value="{{ old('post_code') }}">
                                </div>
                                @csrf
                                <button type="submit" class="btn btn-secondary">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>

@endsection

@section('title') News post @endsection
