<x-layout>
    <section class="container py-5 mx-auto">
        <h3 class="text-center my-3 border-bottom p-3">
            EditBooks
        </h3>

        <div class="d-flex justify-content-center">

        <x-aside/>

        <section class="w-75">
            <div class="container border p-2 text-dark shadow-sm rounded">
                <form action="/admin/books/update/{{ $books->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="old_image" value="{{ $books->image }}">
                    <input type="hidden" name="is_popular" value="{{ $books->is_popular }}">
                    <div class="form-group my-4 w-6">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title" value="{{ $books->title}}">
                        @error('title')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group my-4 w-6">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control" id="slug" placeholder="Enter Slug" name="slug" value="{{ $books->slug}}">
                        @error('slug')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group my-4 w-6">
                        <label for="author">Author</label>
                        <input type="text" class="form-control" id="author" placeholder="Enter Author" name="author" value="{{ $books->author}}">
                        @error('author')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group my-4 w-6">
                        <label for="isbn">Isbn</label>
                        <input type="text" class="form-control" id="isbn" placeholder="Enter Isbn" name="isbn" value="{{ $books->isbn}}">
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
                    <div class="form-group">
                        <img src="{{ asset('storage/' .$books->image)}}" style="width:400px;height:200px;" class="mb-3">
                    </div>

                    <div class="form-group my-4 w-6">
                        <label for="excerpt">Excerpt</label>
                        <textarea name="excerpt" id="excerpt" cols="30" rows="5" class="form-control">{{ $books->excerpt}}</textarea>
                        @error('excerpt')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group my-4 w-6">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" cols="30" rows="5" class="form-control">{{ $books->description}}</textarea>
                        @error('description')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group my-4 w-6">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" id="price" name="price" step="0.01" value="{{ $books->price}}">
                        @error('price')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <select name="category_id" id="category_id">
                        @foreach (\App\Models\Category::all() as $category )
                        <option value="{{ $category->id }}" {{$books->category->id == $category->id ? 'selected' : ''}}>{{ ucwords($category->name) }}</option>
                        @endforeach

                    </select>
                    <br>
                    <button type="submit" class="btn btn-primary mt-3">Edit Books</button>
                  </form>
            </div>
        </section>

        </div>
    </section>

    </x-layout>
