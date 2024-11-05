<!DOCTYPE html>
   <html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <!--=============== REMIXICONS ===============-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" crossorigin="">

      <!--=============== SWIPER CSS ===============-->
      <link rel="stylesheet" href="/PBL6-Dictionary/public/css/swiper-bundle.min.css">

      <!--=============== CSS ===============-->
      <link rel="stylesheet" href="/PBL6-Dictionary/public/css/styles_detailTopic.css">

      <title>Responsive card slider - Bedimcode</title>
   </head>
   <body>
      
      <section class="container">
         <div class="h1-header">
            <h1 class="header">{{$nameTopic}}</h1>
         </div>
         
         <div class="card__container swiper">
            <div class="card__content">
               <div class="swiper-wrapper">
                  @foreach ($vocabularys as $vocabulary)
                     <article class="card__article swiper-slide">
                        <div class="card__image">
                           <img src="{{url($vocabulary->image_voca)}}" alt="image" class="card__img">
                           <div class="card__shadow"></div>
                        </div>
         
                        <div class="card__data">
                           <h1 class="card__vocabulary">{{$vocabulary->name_voca}}</h1>
                           <h2 class="card__transcribe">{{$vocabulary->transcribe_phonetically}}</h2>
                           <h2 class="card__translate">{{$vocabulary->meaning}}</h2>
                           <p class="card__example">{{$vocabulary->example}}</p>
                        </div>
                     </article>                     
                  @endforeach
 
               </div>
            </div>

            <!-- Navigation buttons -->
            <div class="swiper-button-next">
               <i class="ri-arrow-right-s-line"></i>
            </div>
            
            <div class="swiper-button-prev">
               <i class="ri-arrow-left-s-line"></i>
            </div>

            <!-- Pagination -->
            <div class="swiper-pagination"></div>
         </div>
      </section>
      
      <!--=============== SWIPER JS ===============-->
      <script src="/PBL6-Dictionary/public/js/swiper-bundle.min.js"></script>

      <!--=============== MAIN JS ===============-->
      <script src="/PBL6-Dictionary/public/js/main.js"></script>
   </body>
</html>