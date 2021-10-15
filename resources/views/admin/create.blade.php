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
                <form action="/admin/books" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group my-4 w-6">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title" value="{{ old('title') }}">
                        @error('title')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group my-4 w-6">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control" id="slug" placeholder="Enter Slug" name="slug" value="{{ old('slug') }}">
                        @error('slug')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group my-4 w-6">
                        <label for="author">Author</label>
                        <input type="text" class="form-control" id="author" placeholder="Enter Author" name="author" value="{{ old('author') }}">
                        @error('author')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group my-4 w-6">
                        <label for="isbn">Isbn</label>
                        <input type="text" class="form-control" id="isbn" placeholder="Enter Isbn" name="isbn" value="{{ old('isbn') }}">
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
