<div class="card-header">

        <div class="d-flex justify-content-between">

                      <div>
                            <img style="width:40px;height:40px;border-radius:50%"  src="{{ Gravatar::src($disccussion->author->email) }}" alt="">
                            {{$disccussion->title}}
                      </div>
                      <div>
                          <a class="btn btn-success btn-sm" href="{{ route('disccussion.show' , $disccussion->slug) }}">view</a>
                      </div>
        </div>            
           
  </div>