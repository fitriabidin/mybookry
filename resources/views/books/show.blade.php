<x-layout>

    <section class="py-5 px-5 mt-5 ">
        <div class="container w-75 ">
            <div class="row aligned-center">
                <div class="col-5 h-25">


                    <div class="card shadow-sm m-auto" style="width: 18rem;">

                        <img src="{{ asset('storage/' . $books->image)}}" class="card-img-top img-fluid" alt="...">
                        <div class="card-body">
                            <span class="badge rounded-pill bg-success">{{ $books->category->name }}</span>
                            @if ($books->is_popular == true)
                            <span class="badge rounded-pill bg-warning">Popular</span>
                            @endif

                          <h5 class="card-title">{{ $books->title }}</h5>
                          <p class="mb-0" >Author : {{ $books->author }}</p>
                          <p class="mb-0">Isbn: {{ $books->isbn }}</p>
                          <p class="mb-0">Price: RM {{ $books->price }}</p>
                          @auth
                          <form method="POST" action="/mybooks/{{ $books->id }}">
                            @csrf

                            @if ($mybooks == null)
                            <button type="submit" class="btn btn-warning btn-sm mt-2">Add To Booklist</button>
                            <span class="btn btn-success btn-sm mt-2 ">Not In Booklist</span>
                            @else
                            <button type="submit" class="btn btn-danger btn-sm mt-2">Remove From Booklist</button>
                            <span class="btn btn-success btn-sm mt-2 ">In Booklist</span>
                            @endif
                        </form>
                        @endauth
                        </div>
                      </div>

                    </div>
                <div class="col-7">
                    <p class="lead"><a href="/" class="text-decoration-none text-dark">Back To Books</a></p>
                    <h3 class="mb-3">{{ $books->title }}</h3>
                    <p class="lead">
              {!! $books->description !!}
                    </p>
                     <!-- Go to www.addthis.com/dashboard to customize your tools -->
                <div class="addthis_inline_share_toolbox"></div>

                </div>





                <!-- Comment Section -->
                @auth
                <div class="col-md-6 offset-md-5">
                    <div class="p-3 shadow">
                        <form action="/books/{{ $books->id }}/comments" method="POST" >
                            @csrf
                            <input type="hidden" value="{{ $books->id }}" name="book_id">
                             <header class="d-flex">
                                <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" width="60" height="60" class="rounded-circle">
                                <p class="ms-2">Write your thought on this book!</p>
                            </header>

                            <div class="mt-2">
                                <textarea name="body" class="w-100" rows="5" placeholder="Comment your thought here!" required=""></textarea>
                                                            </div>
                            <div class="">
                                <button type="submit" class="btn btn-dark">Post</button>
                            </div>
                        </form>
                    </div>
                </div>

                 <!-- Display Comment Section -->
                 @foreach ($books->comments as $comment)
                 <div class="col-md-6 offset-md-5">
                    <div class="p-2 shadow bg-light mt-5">
                        <article class="d-flex">
                            <div class="d-flex-shrink-0">
                                <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="" width="60" height="60" class="rounded-circle">
                            </div>

                            <div class="ms-3">
                                <header class="mb-4">
                                    <h3 class="font-bold">{{ $comment->user->username }}</h3>
                                    <p class="text-xs">Posted <time>{{ $comment->created_at->diffForHumans() }}</time></p>
                                </header>
                                <p>
                                    {{ $comment->body }}
                                </p>
                            </div>
                        </article>
                    </div>
                </div>
                @endforeach
                @endauth

                @guest
                <div class="col-md-6 offset-md-5">
                    <p>Only member can write a review. Dont have an account? Click here to <a href="/register">Register</a> or <a href="/login">Login</a> </p>
                </div>
                @endguest
              </div>

        </div>
    </section>


</x-layout>
