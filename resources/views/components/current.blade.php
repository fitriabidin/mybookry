
<section class="py-5 px-2 mt-5 ">
    <div class="container w-75 border p-2 shadow">
        <div class="row aligned-center">
            <div class="col-5 h-25">
                @foreach ($curbooks as $curbook)
                <div class="card shadow-sm m-auto" style="width: 18rem;">
                    <img src="{{ asset('storage/' .$curbook->book->image) }}" class="card-img-top img-fluid" alt="...">
                    <div class="card-body">
                        <span class="badge rounded-pill bg-success">{{ $curbook->book->category->name }}</span>
                      <h5 class="card-title">{{ $curbook->book->title }}</h5>
                      <p class="mb-0" >Author : {{ $curbook->book->author }}</p>
                      <p class="mb-0">Isbn: {{ $curbook->book->isbn }}</p>
                      <p class="mb-0">Price: {{ $curbook->book->price }}</p>
                    </div>
                  </div>
            </div>
            <div class="col-7 m-auto">
                <h5><span class="badge rounded-pill bg-danger">Current Read Book</span></h5>
                <h3 class="mb-3">{{ $curbook->book->title }}</h3>
                <p class="lead">
                    {!! $curbook->book->description !!}
                </p>
                <a href="/mybook/{{ $curbook->book->id }}" class="btn btn-primary">Explore</a>
            </div>
          </div>
          @endforeach
    </div>
</section>

