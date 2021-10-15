<section class="bg-dark text-light p-5 text-start " id="top" >
    <div class="container">
     <div class="d-flex align-items-center justify-content-between">
         <div>
             <h1>Welcome Admin <span class="text-primary">{{ Auth::user()->name }}</span> </h1>
             <p class="lead my-4">
                 Manage The booklist and update new popular book each week!.

                 Add new books to the site and increase your library!
             </p>

             <a href="/all" class="btn btn-primary btn-lg">Explore More Books!</a>

         </div>
         <img class="img-fluid w-50" src="image/asset/adminshowcase.svg" alt="">
     </div>
    </div>
 </section>
