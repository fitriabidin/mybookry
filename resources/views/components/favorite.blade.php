<section class="p-5">
    <div class="container border">
    <div class="row">
        <p class="text-start lead mt-3">Your Favorite Book</p>
    </div>

    <div class="row row-cols-1 row-cols-md-4 g-4">
        @foreach ($favbooks as $favbook)
        <div class="col">
            <div class="card shadow-sm h-100" style="width: 18rem;">
                <img src="{{ asset('storage/' .$favbook->book->image) }}" class="card-img-top img-fluid" alt="...">
                <div class="card-body">
                    <span class="badge rounded-pill bg-success">{{ $favbook->book->category->name }}</span>
                    <span class="badge rounded-pill bg-warning">Favorite</span>
                  <h5 class="card-title">{{ $favbook->book->title }}</h5>
                  <p class="card-text bold">Author : {{ $favbook->book->author }}</p>
                  <p class="card-text">{!! $favbook->book->excerpt !!}</p>
                  <a href="/mybook/{{ $favbook->book->id }}" class="btn btn-primary">Explore</a>
                </div>
              </div>
        </div>
        @endforeach

    </div>
</div>
</section>
