@extends('layouts.app')

@section('title',__('Create article'))

@section('content')


    <h2>{{__('Create article')}}</h2>

    <form action="{{route('articles.store')}}" method="post">
@include('articles._from',['submitText' => __('Save')])
    </form>


@endsection
