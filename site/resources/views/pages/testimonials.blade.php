<!--Testimonials-Section-Start-->
<section id="testimonials" class="parallex">
    <div class="container">
      <div class="quote"> <i class="fa fa-quote-left"></i> </div>
      <div class="clearfix"></div>
      <div class="slider-text">
        <div id="owl-testi" class="owl-carousel owl-theme">

             @foreach ($testimonials as $testimonial)
             <div class="item">
                <div  class="col-md-10 col-md-offset-1">
                    <img src="{{$testimonial->client_img}}" class="img-circle" alt="client Image">
                    <h5>{{$testimonial->review}}</h5>
                    <h6 class="m-0">{{$testimonial->name}}</h6>
                    <p><strong>{{$testimonial->designation}}</strong></p>
                </div>
            </div>
             @endforeach

        </div>
      </div>
    </div>
  </section>
