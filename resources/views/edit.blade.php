@extends('layouts.app')

@section('content')
    <main role="main" class="container">

            <div class="form">
                <form method="POST" action="{{ route('articleStore') }}">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Description</label>
                        <textarea class="form-control" name="description"></textarea>
                    </div>
                        <input type="hidden" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" readonly>
                    <button type="submit" class="btn btn-default">Create</button>
                    {{ csrf_field() }}
                </form>
            </div>
    </main>
@endsection