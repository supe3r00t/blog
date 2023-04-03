@extends('layouts.app')
@section('title',__('Home'))
@section('content')
<div class="container">
  <a href="{{route('articles.create')}}" class="btn btn-lg btn-primary mb-4">{{__('New Article')}}</a>
</div>
<div class="row">

    @forelse($articles as $article)

        <div class="col-md-3">
            <div class="m-2 card">
                <div class="card-body">

                    <a href="{{route('articles.show',$article)}}">{{$article->title}}></a>
                </div>
                <div class="card-footer">

                    <a href="{{route('articles.edit',$article)}}" class="btn btn-warning">{{__('Edit')}}</a>
                    <form method="post" action="{{route('articles.destroy',$article)}}" style="display: inline-block">

                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger" onclick="return confirm('{{__('Are you sure ?')}}')">{{__('Delete')}}</button>
                    </form>

                </div>
            </div>
        </div>


    @empty

        <p>{{__('You done have any articles yet')}}</p>
    @endforelse
</div>

@endsection
