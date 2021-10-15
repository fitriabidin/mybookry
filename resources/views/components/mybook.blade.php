<section class="p-5">
    <div class="container border">
    <div class="row">
        <p class="text-start lead mt-3">Your Book Lists</p>
    </div>

    <div class="container">
    <div class="row justify-content-center align-item-center mb-4">
        @foreach ($mybooks as $mybook )


        <div class="col-3 mb-3">
            <div class="card shadow-sm h-100" style="width: 18rem;">
                <img src="{{ asset('storage/' .$mybook->book->image) }}" class="card-img-top img-fluid" alt="...">
                <div class="card-body">
                    <span class="badge rounded-pill bg-success">{{ $mybook->book->category->name }}</span>
                    @if( $mybook->is_favorite == 1)
                        <span class="badge rounded-pill bg-warning">Favorite</span>
                        @endif
                        @if($mybook->is_reading == 1)
                        <span class="badge rounded-pill bg-danger">Current Read</span>
                        @endif
                  <h5 class="card-title">{{ $mybook->book->title}}</h5>
                  <p class="card-text bold">Author : {{ $mybook->book->author}}</p>
                  <p class="card-text">{!! $mybook->book->excerpt !!}</p>
                  <a href="/mybook/{{ $mybook->book->id }}" class="btn btn-primary">Explore</a>
                </div>
              </div>
        </div>

        @endforeach
    </div>
    </div>
    <div class="col-2 offset-md-10">
        {{ $mybooks->links() }}
      </div>
</div>
</section>
