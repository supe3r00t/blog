@extends('layouts.app')

@section('title',$article->title)

@section('content')

<div class="card">

    <h4 class="card-header">{{$article->title}}</h4>

    <div class="card-body">
        {!! nl2br($article->content) !!}


    </div>

    <div class="card-body">
        <div><b>{{__('Author')}} </b> : {{$article->user->name}}</div>
        <div><b>{{__('Created at')}}</b> : {{$article->created_at}}</div>
        <div><b>{{__('Updated at')}} </b>: {{$article->updated_at}}</div>
    </div>
</div>
<h3 class="mt-2">{{__('Commetns')}}</h3>
<div id="comments" class="mb-4">

    @forelse($article->comments as $comment)

        <div class="card pb-3 mb-2">

            {{$comment->content}}
            <p>{{__('Author')}} : {{$comment->user->name}}</p>
        </div>

    @empty

    {{__('No comments yet')}}
    @endforelse
</div>
@auth
<div id="commentForm" class="mt-5">

    <div class="card">

        <h5 class="card-header bg-secondary text-white">{{__('Type your comment here!')}}</h5>
        <div class="card-body">
        </div>
            <form action="{{route('comments.store', $article->id)}}" method="post">


        @csrf
        <div class="from-group">
            <label for="content">{{__('Content')}}</label>
            <textarea class="form-control"
            placeholder="{{__('Type your comment here!')}}"
            name="content" id="content" cols="30" rows="10"></textarea>
        </div>

            <div class="form-group">

                <button class="btn btn-success" type="submit">{{__('Save')}}</button>

            </div>
        </div>


    </form>


</div>
@else

    <p><a href="{{route('login')}}">{{__('Log in to comment')}}</a></p>
@endauth
@endsection
