@extends('layouts.app')

@section('content')
           
            <div class="card">
                <div class="card-header">Add Disccussion</div>

                    <div class="card-body">
                    <form action="/disccussion" method="post">
                        @csrf
                        <div class="form-group">
                          <label for="name">Title </label>
                          <input type="text" name="name" id="name" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>

                        <div class="form-group">
                                <label for="content">Content </label>
                                <input id="content" type="hidden" name="content">
                                <trix-editor input="content"></trix-editor>                   
                         </div>

                        <div class="form-group">
                            <label for="channel">channel</label>
                            <select class="custom-select" name="channel" id="channel">
                                <option selected>Select one</option>
                               @foreach ($channels as $channel)
                                <option value="{{ $channel->id }}">
                                {{ $channel->name }}
                                </option>
                               @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                    </div>
            </div>
        
      

@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.css">
    
@endsection


@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.js"></script>
@endsection
