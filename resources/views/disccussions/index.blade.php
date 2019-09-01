@extends('layouts.app')

@section('content')
           

           @foreach ($disccussions as $disccussion)
            <div class="card">
                       
             @include('partials.disccussion-header')
                        <div class="card-body">
                            {!! $disccussion->content !!}
                        </div>
            </div>
                
           @endforeach
        
      {{ $disccussions->links() }}

@endsection
