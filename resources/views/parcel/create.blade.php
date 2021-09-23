@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">New parcel</div>
                    <div class="card-body">
                        <div class="block__form">
                            <form method="POST" action="{{ route('parcel.store') }}">
                                <div class="form-group">
                                    <label class="form-label">Weight</label>
                                    <input class="form-control" type="text" name="parcel_weight"
                                        value="{{ old('parcel_weight') }}">
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Phone</label>
                                    <input class="form-control" type="text" name="parcel_phone"
                                        value="{{ old('parcel_phone') }}">
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Info</label>
                                    <textarea id="summernote" name="parcel_info">
                                                                {{ old('parcel_info') }}
                                                        </textarea>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Post</label>
                                    <select name="post_id">
                                        <option value="0" selected disabled>Select post</option>
                                        @foreach ($posts as $post)
                                            <option value="{{ $post->id }}" @if (old('post_id') == $post->id) selected @endif>
                                                {{ $post->town }}
                                            </option>
                                        @endforeach
                                    </select>
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

@section('title') New parcel @endsection
