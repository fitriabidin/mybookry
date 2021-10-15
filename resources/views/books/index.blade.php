<x-layout>
    <!-- Showcase -->
    <x-showcases.showcase/>

     <!-- searching section -->
    {{-- <x-searching :books="$books"/> --}}

    {{-- @if ($books->count()) --}}
     <!-- Popular Book Section -->

     @if ($popbooks->count())
    <x-popular :popbooks="$popbooks"/>
    {{-- @endif --}}

     <!-- All Book Section -->
     {{-- <x-latest :books="$books"/> --}}

     @else

     <h3 class="text-center my-4">No book on your book list yet, <a href="/">Add more books</a> </h3>

     @endif

</x-layout>
