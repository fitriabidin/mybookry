<x-layout>
    <section class="container py-5 mx-auto">
        <h3 class="text-center my-3 border-bottom p-3">
            Add Books
        </h3>

        <div class="d-flex justify-content-center">

        <x-aside/>

        <section class="w-75">
            <div class="container border p-2 text-dark shadow-sm rounded">
                <form action="/admin/books/search" method="GET" class="col-6">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search ISBN Api" name="search" value="{{ request('search') }}">
                        <button class="btn btn-dark btn-lg" type="submit">Search</button>
                      </div>
                    </form>
                    <a href="{{ $books['ISBN:'.$isbn]['url'] }}" class="btn btn-warning mt-3">OpenBook Info</a>
                    @if (array_key_exists('links',$books['ISBN:'.$isbn]) == true)
                    <a href="{{ $books['ISBN:'.$isbn]['links']['0']['url'] }}" class="btn btn-danger mt-3">New York Times Best Selling Review</a>
                    @endif
                    @if (array_key_exists('cover',$books['ISBN:'.$isbn]) == true)
                    <div class="form-group text-center">
                        <div class="container shadow w-50 mt-5">
                        <img src="{{ $books['ISBN:'.$isbn]['cover']['large']}}" style="width:200px;height:300px;" class="mt-3 mb-3">
                    </div>
                    </div>
                    @endif
                <form action="/admin/books" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group my-4 w-6">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title" value="{{ $books['ISBN:'.$isbn]['title'] }}">
                        @error('title')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group my-4 w-6">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control" id="slug" placeholder="Enter Slug" name="slug" value="{{ str_replace(' ','-',strtolower($books['ISBN:'.$isbn]['title'])) }}">
                        @error('slug')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group my-4 w-6">
                        <label for="author">Author</label>
                        <input type="text" class="form-control" id="author" placeholder="Enter Author" name="author" value="{{ $books['ISBN:'.$isbn]['authors'][0]['name'] }}">
                        @error('author')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group my-4 w-6">
                        <label for="isbn">Isbn</label>
                        <input type="text" class="form-control" id="isbn" placeholder="Enter Isbn" name="isbn"
                        value="{{ array_key_exists('isbn_10',$books['ISBN:'.$isbn]['identifiers']) ? $books['ISBN:'.$isbn]['identifiers']['isbn_10'][0] : $books['ISBN:'.$isbn]['identifiers']['isbn_13'][0] }}">
                        @error('isbn')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group my-4 w-6">
                        <label for="image">Book Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                        @error('image')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group my-4 w-6">
                        <label for="excerpt">Excerpt</label>
                        <textarea name="excerpt" id="excerpt" cols="30" rows="5" class="form-control">{{ old('excerpt') }}</textarea>
                        @error('excerpt')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group my-4 w-6">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" cols="30" rows="5" class="form-control">{{ old('description') }}</textarea>
                        @error('description')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group my-4 w-6">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" id="price" name="price" step="0.01">
                        @error('price')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <select name="category_id" id="category_id">
                        @foreach (\App\Models\Category::all() as $category )
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : ''}}>{{ ucwords($category->name) }}</option>
                        @endforeach

                    </select>
                    <br>
                    <button type="submit" class="btn btn-primary mt-3">Add Books</button>
                  </form>
            </div>
        </section>

        </div>
    </section>

    </x-layout>
