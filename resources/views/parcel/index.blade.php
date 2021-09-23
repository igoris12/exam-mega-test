@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Better</div>

                    <form action="{{ route('parcel.index') }}" method="get">
                        <fieldset>
                            <legend>Sort</legend>
                            <div class="block">
                                <button type="submit" class="btn btn-secondary" name="sort" value="weight">Weight</button>
                                <button type="submit" class="btn btn-secondary" name="sort" value="phone">Phone</button>
                            </div>
                            <div class="block">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sort_dir" id="_1" value="asc"
                                        @if ('desc' != $sortDirection) checked @endif>
                                    <label class="form-check-label" for="_1">
                                        ASC
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sort_dir" id="_2" value="desc"
                                        @if ('desc' == $sortDirection) checked @endif>
                                    <label class="form-check-label" for="_2">
                                        DESC
                                    </label>
                                </div>
                            </div>
                            <div class="block">

                                <a href="{{ route('parcel.index') }}" class="btn btn-secondary"><i
                                        class="fas fa-redo"></i></a>
                            </div>
                        </fieldset>
                    </form>

                    <form action="{{ route('parcel.index') }}" method="get">
                        <fieldset>
                            <legend>Filter</legend>
                            <div class="block">
                                <div class="form-group">
                                    <select class="form-control" name="post_id">
                                        <option value="0" disabled selected>Select post</option>
                                        @foreach ($posts as $post)
                                            <option value="{{ $post->id }}" @if ($post_id == $post->id) selected @endif>
                                                {{ $post->town }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <small class="form-text text-muted">Select post from the list.</small>
                                </div>
                            </div>
                            <div class="block">
                                <button type="submit" class="btn btn-secondary" name="filter" value="post">Filter</button>
                                <a href="{{ route('parcel.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-redo"></i></a>
                            </div>
                        </fieldset>
                    </form>
                    <div class="card-body">
                        <div class="mt-3">{{ $parcels->links() }}</div>
                        <ul class="list-group">
                            @foreach ($parcels as $parcel)
                                <li class="list-group-item">
                                    <div class="listBlock">
                                        <details>
                                            <summary>{{ $parcel->weight }}</summary>

                                            {{-- <div class="listBlock__content">
                                                <p><b> Post: </b> {{ $parcel->getPost->town }}</p>
                                            </div> --}}

                                            <div class="listBlock__content">
                                                <p><b>Phone: </b>+{{ $parcel->phone }}</p>
                                            </div>

                                            <div class="listBlock__content">
                                                <p><b>Info: </b>{{ $parcel->info }}</p>
                                            </div>
                                        </details>
                                        <div class="listBlock__buttons">
                                            <a href="{{ route('parcel.edit', [$parcel]) }}"
                                                class="btn btn-secondary">Edit</a>
                                            <form method="POST" action="{{ route('parcel.destroy', $parcel) }}">
                                                <button class="btn btn-secondary" type="submit"><i
                                                        class="fas fa-trash-alt"></i></button>
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                </li>

                            @endforeach
                        </ul>
                        <div class="mt-3">{{ $parcels->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('title') Better @endsection
