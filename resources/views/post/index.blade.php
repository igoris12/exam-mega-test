@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Posts list</div>
                    <div class="card-body">
                        <div class="mt-3">{{ $posts->links() }}</div>

                        <ul class="list-group">
                            @foreach ($posts as $post)
                                <li class="list-group-item">
                                    <div class="listBlock">
                                        <details>
                                            <summary>
                                                {{ $post->town }}
                                            </summary>
                                            <div class="listBlock__content">
                                                <h4><b>Capacity:</b> {{ $post->capacity }} Kg.</h4>
                                            </div>
                                            <div class="listBlock__content">
                                                <h4><b>Code:</b> {{ $post->code }}</h4>
                                            </div>
                                        </details>
                                        <div class="listBlock__buttons">
                                            <a href="{{ route('post.edit', [$post]) }}" class="btn btn-secondary">Edit</a>
                                            <form method="POST" action="{{ route('post.destroy', $post) }}">
                                                <button class="btn btn-secondary" type="submit"><i
                                                        class="fas fa-trash-alt"></i></button>
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <div class="mt-3">{{ $posts->links() }}</div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('title') Posts list @endsection
