<x-layout>

    <section class="p-5">
        <div class="container border p-2 mt-5 w-25 bg-primary text-white shadow rounded">
            <h1 class="text-center">Register</h1>
            <div class="container">
            <form action="/register" method="POST">
                @csrf
                <div class="form-group my-4 w-6">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="{{ old('name') }}">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>

                  <div class="form-group my-4 w-6">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Enter Username" name="username" value="{{ old('username') }}">
                    @error('username')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>

                  <div class="form-group my-4 w-6">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" value="{{ old('email') }}">
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>

                <div class="form-group my-4">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                  @error('password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="btn btn-dark">Register</button>

              </form>
            </div>
        </div>
    </section>


</x-layout>

