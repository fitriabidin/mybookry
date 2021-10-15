<section class="p-5">
    <div class="container border ">
    <div class="text-start lead mt-3">
        <p>Popular This Week</p>
    </div>

    <div class="container">
    @if($popbooks != null)
    <div class="row justify-content-center align-item-center mb-4">
        @foreach ($popbooks as $popbook )
        <div class="col-3">
            <div class="card shadow-sm h-100" style="width: 18rem;">
                <img src="{{ asset('storage/' . $popbook->image)}}" class="card-img-top img-fluid" alt="...">
                <div class="card-body">
                    <span class="badge rounded-pill bg-success">{{ $popbook->category->name }}</span>
                    <span class="badge rounded-pill bg-warning">Popular</span>
                  <h5 class="card-title">{{ $popbook->title }}</h5>
                  <p class="card-text bold">Author : {{ $popbook->author }}</p>
                  <p class="card-text">{!! $popbook->excerpt !!}</p>
                  <a href="books/{{ $popbook->id}}" class="btn btn-primary">Explore</a>
                </div>
              </div>
        </div>
        @endforeach
    </div>
</div>
    @endif


</div>
</section>
