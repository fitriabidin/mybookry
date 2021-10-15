<x-layout>
<!-- Single Book  -->
<section class="py-5 px-5 mt-5 ">
    <div class="container w-75 ">
        <div class="row aligned-center">
            <div class="col-5 h-25">
                <div class="card shadow-sm m-auto" style="width: 18rem;">
                    <img src="{{ asset('storage/' .$mybooks->book->image) }}" class="card-img-top img-fluid" alt="...">
                    <div class="card-body">
                        <span class="badge rounded-pill bg-success">{{ $mybooks->book->category->name }}</span>
                        @if( $mybooks->is_favorite == 1)
                        <span class="badge rounded-pill bg-warning">Favorite</span>
                        @endif
                        @if($mybooks->is_reading == 1)
                        <span class="badge rounded-pill bg-danger">Current Read</span>
                        @endif
                      <h5 class="card-title">{{ $mybooks->book->title }}</h5>
                      <p class="mb-0" >Author : {{ $mybooks->book->author }}</p>
                      <p class="mb-0">Isbn: {{ $mybooks->book->isbn }}</p>
                      <p class="mb-0">Price: RM {{ $mybooks->book->price }}</p>

                      <form method="POST" action="/mybook/favorite/{{ $mybooks->book->id }}">
                        @csrf
                        <input type="hidden" value="{{ $mybooks->is_favorite }}" name="is_favorite" id="is_favorite">
                        @if ($mybooks->is_favorite == 0)
                        <button type="submit" class="btn btn-warning btn-sm mt-2">Add To Favorite</button>
                        @else
                        <button type="submit" class="btn btn-warning btn-sm mt-2">Remove Favorite</button>
                        @endif
                    </form>
                    <form method="POST" action="/mybook/current/{{ $mybooks->book->id }}">
                        @csrf
                        <input type="hidden" value="{{ $mybooks->is_reading }}" name="is_reading" id="is_reading">
                        @if ($mybooks->is_reading == 0)
                        <button type="submit" class="btn btn-primary btn-sm mt-2">Add To Current Read</button>
                        @else
                        <button type="submit" class="btn btn-primary btn-sm mt-2">Remove Current Read</button>
                        @endif
                    </form>
                    </div>
                  </div>
            </div>
            <div class="col-7">
                <p class="lead"><a href="/mybooks/{{ Auth::user()->id }}" class="text-decoration-none text-dark">Back To MyBook</a></p>
                <h3 class="mb-3">{{ $mybooks->book->title }}</h3>
                <p class="lead">
                    {!! $mybooks->book->description!!}
                </p>
                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                <div class="addthis_inline_share_toolbox"></div>
            </div>

            <!-- Diary Section-->
            <div class="col-md-6 offset-md-5">
                <div class="p-3 shadow">
                    <form action="/mybook/{{ $mybooks->book->id }}/diaries" method="POST" >
                        @csrf
                        <input type="hidden" value="{{ $mybooks->id }}" name="mybook_id">
                         <header class="d-flex">
                            <img src="https://i.pravatar.cc/60?u={{ auth()->id()}}" alt="" width="60" height="60" class="rounded-circle">
                            <p class="ms-2">Write your notes</p>
                        </header>

                        <div class="mt-2">
                            <textarea name="body" class="w-100" rows="5" placeholder="Write your notes here!" required=""></textarea>
                                                        </div>
                        <div class="">
                            <button type="submit" class="btn btn-dark">Save</button>
                        </div>
                    </form>
                </div>
            </div>

             <!-- Display Diary Section- -->
             @foreach ($mybooks->diary as $diarys)
             <div class="col-md-6 offset-md-5">
                <div class="p-2 shadow bg-dark mt-5 text-white">
                    <article class="d-flex">
                        <div class="d-flex-shrink-0">
                            <img src="https://i.pravatar.cc/60?u={{ auth()->id()}}" alt="" width="60" height="60" class="rounded-circle">
                        </div>

                        <div class="ms-3">
                            <header class="mb-4">
                                <h3 class="font-bold">{{ $diarys->user->username }}</h3>
                                <p class="text-xs">Posted <time>{{ $diarys->created_at->diffForHumans() }}</time></p>
                            </header>
                            <p class="p-2 bg-light text-dark rounded">
                                {{ $diarys->body }}
                            </p>
                            <form action="/mybook/diaries/{{ $diarys->id }}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </article>
                </div>
            </div>
            @endforeach
          </div>

    </div>
</section>
</x-layout>
