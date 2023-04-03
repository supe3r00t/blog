@extends('layouts.app')
@section('title',__('Contact me'))
@section('content')


    @include('_partials._closed_alert');


    @if($errors->any())

        <ul>
            {{--       @foreach($errors->all()as $error)--}}
            {{--           <li>{{$error}}</li>--}}
            {{--       @endforeach--}}
            {{--    </ul>--}}
            @endif
{{--            @php--}}
{{--                $today =data('Y-m-d H:i:s')--}}
{{--            @endphp--}}
{{--            <p>Today : {{$today}}</p>--}}
            <h4>{{$message}}</h4>
            @auth
                <p>Welcome , {{$user->name}}</p>
            @else
                <h4>يرجى تسجيل دخول</h4>
            @endauth
            @guest
                <h4>Welcome ,</h4>
            @endguest
            @if(date('d') != 'Mon')

            <h6>{{$info}}</h6>
            @else
                <h6>Iem ready to get your message</h6>
            @endif

            <form action="" method="post"  >

                @csrf
                {{--{{csrf_field()}}--}}
                <div class="from-group">
                    <input class="form-control" type="text" name="sender_name" placeholder="Your name">
                </div>
                @if(count($options))

                <div class="form-group">
                  <select name="option" id="option" class="form-control">

                      @foreach($options as $key=> $option)
                      <option value="{{$key}}">{{$option}}</option>
                      @endforeach
                  </select>
                </div>
                @endif

<div class="from-group">

    <textarea class="form-control" name="message" id="" cols="30" rows="10" placeholder="Yuor message"> </textarea>
</div>
                <div class="from-group">

                    <button class="btn btn-primary btn-block" type="submit">Send!</button>
                </div>



            </form>

        @endsection
