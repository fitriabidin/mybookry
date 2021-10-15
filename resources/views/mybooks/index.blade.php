<x-layout>
    <!-- Showcase -->
    <x-showcases.showcase/>

     <!-- searching section -->
    {{-- <x-searchmybook /> --}}

    {{-- current read --}}
    @if ($mybooks->count())

    @if ($curbooks->count())
    <x-current :curbooks="$curbooks" />
    @endif
    <!-- Favorite Book Section -->
    @if ($favbooks->count())
   <x-favorite :favbooks="$favbooks" />
   @endif



     <!-- All Book Section -->
     <x-mybook :mybooks="$mybooks"/>
    @else

    <h3 class="text-center my-4">No book on your book list yet, <a href="/">Add more books</a> </h3>

    @endif

</x-layout>
