@extends('layouts.app')

@section('title',__('Create article'))

@section('content')

    <div class="row">

    @forelse($articles as $article)

        @include('articles._article_card')
    @empty

        {{__('No articles yet')}}
    @endforelse
    </div>

@endsection
