@extends('layouts.app')

@section('content')
           
                <div class="card">
                        
                    @include('partials.disccussion-header')
                            <div class="card-body">
                                <div class="text-center">
                                        {{$disccussion->title}}

                                </div>
                                <hr>
                                {!! $disccussion->content !!}
                            </div>
                </div>
               @if ($disccussion->bestReply)
               <div class="card my-2 text-right">
                    <div class="card-header">
                        بهترین پاسخ
                    </div>
                    <div class="card-body bg-secondary text-white">
                        {!! $disccussion->bestReply->content !!}
                    </div>
                </div>
               @endif
                @foreach ($disccussion->replies as $reply)
                    <div class="card my-2">
                        <div class="card-header">
                                <div class="d-flex justify-content-between">
                                  @auth
                                    @if (auth()->user()->id ==  $disccussion->user_id )
                                    <div>
                                        <form action="{{ route('disccussion.best-answer' , ['disccussion' => $disccussion->slug , 'reply' =>$reply->id]) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-info btn-sm">انتخاب به عنوان بهترین پاسخ</button>
                                        </form>
                                    </div>
                                    @endif
                                  @endauth
                                    <div>
                                       
                                      <strong> {{ $reply->auther->name}} </strong>
                                      <img style="width:40px;height:40px;border-radius:50%" src="{{ Gravatar::src($reply->auther->email) }}" alt="">
                                    </div>
                                    
                                </div>
                        </div>
                        <div class="card-body text-right">
                            {!! $reply->content !!}

                        </div>
                    </div>
                @endforeach

                <div class="card">
                    <div class="card-header text-right">
                        Reply
                    </div>
                    <div class="card-body">
                       @auth
                        <form action="{{ route('reply.store' , $disccussion->slug) }}" method="post">
                            @csrf
                                <input id="content" type="hidden" name="content">
                                <trix-editor input="content"></trix-editor>  
                                
                                <input type="submit" class="btn btn-danger btn-sm m-2" value="Add Reply">
                        </form>
                       @else    
                        <a href="{{ route('login') }}" class="btn btn-info btn-sm">Login To Reply</a>
                       @endauth
                    </div>
                </div>
                    
           

@endsection




@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.css">
    
@endsection


@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.js"></script>
@endsection
