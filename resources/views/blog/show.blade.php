@extends('layouts.root')

@section('title-block'){{ $data['post']->title }} @endsection

@section('content')


<div class="container">

        <div class="row">

          <div class="col-lg-8">

            <h1 class="mt-4">{{ $data['post']->title }}</h1>



            <hr>

            <!-- Date/Time -->
            <p>{{ $data['post']->created_at->format('m, d, Y') }}</p>

            <hr>

            <!-- Preview Image -->
            <img class="img-fluid rounded" src="http://placehold.it/900x300" alt="">

            <hr>


            <p class="lead">{!! $data['post']->body !!}</p>


            <hr>

            <!-- Comments Form -->
            <div class="card my-4">
              <h5 class="card-header">Leave a Comment:</h5>
              <div class="card-body">
                <form>
                  <div class="form-group">
                    <textarea class="form-control" rows="3"></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
            </div>


            <!-- Comment with nested comments -->
            <div class="media mb-4">
              <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
              <div class="media-body">
                <h5 class="mt-0">admin</h5>
                this section is currently no functional
                <div class="media mt-4">
                  <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                  <div class="media-body">
                    <h5 class="mt-0">admin</h5>
                    to do in future updates
                  </div>
                </div>


              </div>
            </div>

          </div>

          <!-- Sidebar Widgets Column -->
          <div class="col-md-4">


            <!-- Categories Widget -->
            <div class="card my-4">

              <h5 class="card-header">Tags</h5>


              <div class="card-body">
                @if($data['post']->tags->count()>0)

                <div class="row">
                  <div class="col-lg-6">
                    @foreach ($data['post']->tags as $tag)
                    <ul class="list-unstyled mb-0">
                      <li>
                        <a href="{{ route('tags', $tag->slug) }}">{{ $tag->name }}</a>
                    </li>

                    </ul>
                  </div>
                  @endforeach
                </div>
                @endif
              </div>


            </div>

            <!-- Side Widget -->


          </div>

        </div>
        <!-- /.row -->

      </div>

@endsection

