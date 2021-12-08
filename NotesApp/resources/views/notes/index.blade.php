@extends('templates.main')

@section('navbar')
  @include('templates.partials.navbar')
@endsection

@section('content')
<div class="container">
  <div class="row mt-4">
      {{-- <div class="col-sm-3 col-lg-3">
        <div class="card radius-15 shadow">
            <img src="https://cdn.discordapp.com/attachments/616307503264956430/915477728382316604/unknown.png" class="card-img-top rounded-image" alt="Notes">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
            </div>
          </div>
      </div>
      <div class="col-sm-3 col-lg-3">
        <div class="card radius-15 shadow">
            <img src="https://cdn.discordapp.com/attachments/616307503264956430/915477728382316604/unknown.png" class="card-img-top rounded-image" alt="Notes">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
            </div>
          </div>
      </div>
      <div class="col-sm-3 col-lg-3">
        <div class="card radius-15 shadow">
            <img src="https://cdn.discordapp.com/attachments/616307503264956430/915477728382316604/unknown.png" class="card-img-top rounded-image" alt="Notes">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
            </div>
          </div>
      </div>
      <div class="col-sm-3 col-lg-3">
        <div class="card radius-15 shadow">
            <img src="https://cdn.discordapp.com/attachments/616307503264956430/915477728382316604/unknown.png" class="card-img-top rounded-image" alt="Notes">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
            </div>
          </div>
      </div> --}}
      <div class="row">
        @forelse ($notes as $note)
        <div class="col-sm-3 col-lg-3">
          <div class="card radius-15 shadow">
              <img src={{asset('storage/'.$note->media)}} class="card-img-top rounded-image" alt="Notes">
              <div class="card-body">
                <h5 class="card-title">{{$note['title']}}</h5>
                <p class="card-text">
                  {!!$note['body']!!}
                </p>
                <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
              </div>
              <div class="card-footer border-0 bg-transparent mb-3">
              <a href="{{route('notes.show', $note->id)}}" class="btn btn-outline-dark border-2">
                View Notes</a>
              </div>
            </div>
        </div>
        @empty
          <div class="col-12">
            <div class="alert alert-warning">
              <h4 class="alert-heading">No Notes Found</h4>
              <p>
                You haven't created any notes.
              </p>
            </div>
          </div>

        @endforelse
      </div>

  </div>
</div>

@endsection

@section('footer')
<footer class="footer fixed-bottom p-3 mb-3" style="text-align: right !important;">

<a href="{{url('/notes/create')}}" class="btn" style="background-color: black; color: white;"><i class="bi bi-plus-lg"></i> Add Notes</a>


</footer>
@endsection
