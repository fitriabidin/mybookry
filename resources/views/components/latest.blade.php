<section class="p-5">
    <div class="container border">
    <div class="row">
        <p class="text-start lead mt-3">Latest Books</p>
    </div>

    <div class="container">
    <div class="row justify-content-center align-item-center mb-4">
        @foreach ($books as $book )

        <div class="col-3 mb-3">
            <div class="card shadow-sm h-100" style="width: 18rem;">
                <img src="{{ asset('storage/' . $book->image)}}" class="card-img-top img-fluid" alt="...">
                <div class="card-body">
                    <span class="badge rounded-pill bg-success">{{ $book->category->name }}</span>
                    @if ($book->is_popular == true)
                    <span class="badge rounded-pill bg-warning">Popular</span>
                    @endif
                  <h5 class="card-title">{{ $book->title }}</h5>
                  <p class="card-text bold">Author : {{ $book->author }}</p>
                  <p class="card-text">{!! $book->excerpt !!}</p>
                  <a href="books/{{ $book->id}}" class="btn btn-primary">Explore</a>
                </div>
              </div>
        </div>
        @endforeach

    </div>
    <div class="col-2">
        {{ $books->links() }}
      </div>
    </div>
</div>

</section>
