@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit horses</div>
                    <div class="card-body">
                        <div class="block__form">
                            <form method="POST" action="{{ route('horse.update', [$horse]) }}">
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <input class="form-control" type="text" name="horse_name"
                                        value="{{ old('horse_name', $horse->name) }}">
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Runs</label>
                                    <input class="form-control" type="text" name="horse_runs"
                                        value="{{ old('horse_runs', $horse->runs) }}">
                                </div>


                                <div class="form-group">
                                    <label class="form-label">Wins</label>
                                    <input class="form-control" type="text" name="horse_wins"
                                        value="{{ old('horse_wins', $horse->wins) }}">
                                </div>

                                <div class="form-group">
                                    <label class="form-label">About</label>
                                    <textarea id="summernote" name="horse_about">
                                                        {{ old('horse_about', $horse->about) }}
                                                    </textarea>
                                </div>

                                @csrf
                                <button type="submit" class="btn btn-secondary">Edit</button>
                            </form>
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

    @section('title') Edit horses @endsection
