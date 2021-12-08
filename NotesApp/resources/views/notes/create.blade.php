@extends('templates.main')

@section('navbar')
  @include('templates.partials.navbar')
@endsection

@section('content')
<div class="container">
    <div class="row justify-conten-center">
      <div class="col-lg-9">
        <form action="{{route('notes.store')}}" method="POST" class="mt-5"
        enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <input required type="text" class="form-control border-0 fs-1 fw-bold" placeholder="Note Title"
                name="title">
            </div>
            <div class="mb-3">
                <input required type="text" class="form-control border-0" placeholder="Tag"
                name="tags">
            </div>
            <div class="mb-3">
                <input type="hidden" id="body" name="body" required>
                <trix-editor input="body" class="border-0 trix-content" placeholder="+Add Note's Content Here">
                </trix-editor>
            </div>
            <div class="mb-5">
                <input type="file" class="form-control" id="media" name="media">
            </div>
            <button type="submit" class="btn fw-bold">Save Note</button>
            <a href="{{route('notes.index')}}" type="reset" class="btn fw-bold text-danger">Discard</a>
        </form>
        </div>
    </div>
</div>
@endsection
