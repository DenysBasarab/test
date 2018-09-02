@extends('layouts.app')

@section('content')
    <main role="main" class="container">

        @foreach($articles as $article)
            <div class="jumbotron">
                <h1><a href="{{ route('homeShow', ['id'=>$article->id]) }}" >{{ $article->title }}</a></h1>
                <p>{{ $article->name }}</p>
                <p>{{ $article->created_at }}</p>
                <p class="lead">{{ $article->description }}</p>
                @if(Auth::user()->name == $article->name)
                    <form action="{{ route('articleDelete', ['article'=> $article->id]) }}" method="POST">
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-danger">
                            Delete
                        </button>
                    </form>
                @endif
            </div>
        @endforeach
            {{ $articles->links() }}
    </main>
@endsection
