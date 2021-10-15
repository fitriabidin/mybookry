
@guest
<x-showcases.guestshowcase/>
@endguest

@auth
@if(Auth::user()->is_admin == 0)
<x-showcases.authshowcase/>

@else
<x-showcases.adminshowcase/>
@endif
@endauth
