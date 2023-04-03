@extends('layouts.app')

@section('title',__('Edit article'))

@section('content')


    <h2>{{__('Edit article')}} : {{$article->title}}</h2>

    <form action="{{route('articles.update',$article->id)}}" method="post">
        @method('PATCH')

@include('articles._from',['submitText' => __('Edit')])
    </form>


@endsection
