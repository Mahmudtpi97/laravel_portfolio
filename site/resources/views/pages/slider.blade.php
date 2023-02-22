<section id="slider">
    <div id="home-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">

            @foreach ($sliders as $key=> $slider)

                <div class="item {{$key == 0 ? 'active': ''}} " style="background-image:url({{$slider->slider_img}})">
                    <div class="carousel-caption container">
                        <div class="row">
                            <div class="col-md-7 col-sm-12 col-xs-12">
                                <h1>{{$slider->sub_title}}</h1>
                                <h2>{{$slider->title}}</h2>
                                <p>{{$slider->description}}</p>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach

            <a class="home-carousel-left" href="#home-carousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="home-carousel-right" href="#home-carousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
    </div>

    <!--/#home-carousel-->
  </section>
