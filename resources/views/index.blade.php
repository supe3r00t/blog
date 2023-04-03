@extends('layouts.app')

@section('title',__('Home page'))

@section('content')
<div class="bg-light p-5 mb-5">
<h3>{{__('Welcome to')}}  {{config('app.name')}}</h3>
</div>
    <h3 class="text-primary">{{__('Latest articles')}}</h3>
    <div class="row">

        @forelse($articles as $article)

          @include('articles._article_card')
        @empty

            {{__('No articles yet')}}

        @endforelse
    </div>

    <a class="btn btn-link" href="{{route('articles.index')}}">{{__('Browse all articles')}}</a>
@endsection
