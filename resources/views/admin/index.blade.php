<x-layout>
<section class="container py-5 mx-auto">
    <h3 class="text-center my-3 border-bottom p-3">
        All Books
    </h3>

    <div class="container justify-content-center">
        <div class="row">

    <x-aside/>

    <table class="table w-75 border shadow-sm col-10">
        <thead>
          <tr>
            <th scope="col">Isbn</th>
            <th scope="col">Title</th>
            <th scope="col">Price</th>
            <th scope="col">Popular Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
          <tr>
            <th scope="row">{{ $book->isbn }}</th>
            <td>{{ $book->title }}</td>
            <td>{{ $book->price }}</td>
            <td>
            @if( $book->is_popular == 0)
            <span class="badge rounded-pill bg-warning">Uncheck</span>
            @else
            <span class="badge rounded-pill bg-success">Checked</span>
            @endif
            </td>
            <td class="d-flex">
                <a href="/admin/books/{{ $book->id }}" class="btn btn-primary">Edit</a>
                <form action="/admin/books/{{ $book->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger ms-2">Delete</button>
                </form>

                <form action="/admin/books/popular/{{ $book->id }}" method="POST">
                    @csrf
                    <input type="hidden" value="{{ $book->is_popular }}" name="is_popular" id="is_popular">
                    <button class="btn btn-warning ms-2">Popular Check</button>
                </form>

            </td>
            @endforeach
          </tr>

        </tbody>
      </table>
      <div class="col-2 offset-md-3">
        {{ $books->links() }}
      </div>

    </div>
    </div>

</section>

</x-layout>
