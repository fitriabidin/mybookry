<section class="bg-primary text-light p-5">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <h3 class="col-3">Search Your Favorite Book</h3>

            <form action="/all" method="GET" class="col-6">
            <div class="input-group">
                @if (request('category') || request('page'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                <input type="text" class="form-control" placeholder="Search Book" name="search" value="{{ request('search') }}">
                <button class="btn btn-dark btn-lg" type="submit">Search</button>
              </div>
            </form>

              <div class="dropdown col-3">
                <button class="btn dropdown-toggle btn-dark btn-lg" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  Category
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    @foreach (\App\Models\Category::all() as $category)
                    <li><a class="dropdown-item" href="/all?category={{ $category->id }}&{{ http_build_query(request()->except('category')) }}">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
              </div>

               {{-- new dropdown --}}
              {{-- <div class="navbar navbar-expand-lg col-3">
                <div class="container">
                 <div class="row align-content-center">
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto p-1  btn btn-dark">

                      <!-- dropdown -->

                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Category
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach ($categories as $category)
                            <li class="nav-item dropdown drop-down02"><a class="dropdown-item dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ $category->name }}</a>
                            @if(\App\Models\Subcategory::firstWhere('category_id', $category->id) != null)
                            <ul class="dropdown-menu sub-menu02" aria-labelledby="navbarDropdown">
                                @foreach ($subcategories as $subcategory)
                                @if($subcategory->category_id == $category->id)
                                <li><a class="dropdown-item" href="#">{{ $subcategory->name }}</a></li>
                                @endif
                                @endforeach
                            </ul>
                            @endif
                            </li>
                            @endforeach
                        </ul>
                      </li>
                    </ul>
                  </div>
                </div>
                </div>
              </div> --}}
        </div>
    </div>
</section>

