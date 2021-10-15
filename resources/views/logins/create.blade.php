<x-layout>

    <section class="p-5">
        <div class="container border p-2 mt-5 w-25 bg-primary text-white shadow rounded">
            <h1 class="text-center">Log In</h1>
            <div class="container">
                <form action="/login" method="POST">
                    @csrf
                  <div class="form-group my-4 w-6">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email">
                  </div>
                <div class="form-group my-4">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                </div>
                @error('email')
                <p class="text-danger">{{ $message }}</p>
            @enderror
                <button type="submit" class="btn btn-dark">Login</button>
              </form>
            </div>
        </div>
    </section>


</x-layout>
