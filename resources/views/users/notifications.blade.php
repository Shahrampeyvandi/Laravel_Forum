@extends('layouts.app')

@section('content')
            

            <div class="card">
                <div class="card-header">پیغام ها</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                       <ul class="list-group">
                        @foreach ($notifications as $notification)
                         <li class="list-group-item">
                             @if ($notification->type == "LaravelForum\Notifications\NewReplyNotification")
                             <strong>                          
                                    {{$notification->data['disccuss']['title']}}
                             </strong>
                               <a href="{{ route('disccussion.show' , $notification->data['disccuss']['slug']) }}" class="btn btn-info mr-auto" > مشاهده گفت و گو</a>
                        
                             @endif
                             @if ($notification->type == "LaravelForum\Notifications\ReplyMarkAsBestReply")
                             <strong>                          
                                    {{$notification->data['disccussion']['title']}}
                                    به عنوان بهترین پاسخ
                             </strong>
                               <a href="{{ route('disccussion.show' , $notification->data['disccussion']['slug']) }}" class="btn btn-info mr-auto" > مشاهده گفت و گو</a>
                        
                             @endif

                            </li>    
                        @endforeach
                       </ul>
                    </div>
            </div>
        
      

@endsection
