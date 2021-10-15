<section class="bg-dark text-light p-5 text-start " id="top" >
    <div class="container">
     <div class="d-flex align-items-center justify-content-between">
         <div>
             <h1>Welcome To <span class="text-primary">MybookRy</span> {{ Auth::user()->name }}</h1>
             <p class="lead my-4">
                 Participate by review your comment on a specific books while sharing your opinion.

                 Create your own custom booklist and write your own notes on your favorite book!
             </p>

             <a href="/all" class="btn btn-primary btn-lg">Explore More Books!</a>

         </div>
         <img class="img-fluid w-50" src="image/asset/authshowcase.svg" alt="">
     </div>
    </div>
 </section>
