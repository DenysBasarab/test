@extends('layouts.app')
@section('content')
    <main role="main" class="container">

        @foreach($articles as $article)

            <div class="jumbotron">
                <h1>{{ $article->title }}</h1>
                <p>{{ $article->name }}</p>
                <p>{{ $article->created_at }}</p>
                <p class="lead">{{ $article->description }}</p>
            </div>

        @endforeach
        {{ $articles->links() }}
    </main>
@endsection