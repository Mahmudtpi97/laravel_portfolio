<!--Service-Section-Start-->
<section id="service">
    <div class="container">
      <div class="col-md-8 col-md-offset-2">
        <div class="heading">
          <h2>OUR SERVI<span>CE</span></h2>
          <div class="line"></div>
          <p><span><strong>L</strong></span>orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
            et dolore magna aliqua. Ut enim ad minim veniam</p>
        </div>
      </div>
      <div class="row ">
        <div class="features-sec">

          @foreach ($services as $service)
            <div class="col-md-4 col-sm-6 col-xs-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">
                <div class="media service-box">
                <div class="pull-left"> <i class="{{$service->icon}}"></i> </div>
                <div class="media-body">
                    <h5 class="media-heading">{{$service->title}}</h5>
                    <p>{{$service->description}}</p>
                </div>
                </div>
            </div>
          @endforeach

        </div>
      </div>
      <div class="experience">
        <div class="col-sm-6 col-xs-12">
          <div class="our-skills wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="300ms">
            <div class="single-skill wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="300ms">
              <p class="lead">HTML & CSS</p>
              <div class="progress">
                <div class="progress-bar six-sec-ease-in-out" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="95" style="width: 95%;"> 95% </div>
              </div>
            </div>
            <div class="single-skill wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="400ms">
              <p class="lead">Bootstrap & jQuery</p>
              <div class="progress">
                <div class="progress-bar six-sec-ease-in-out" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="90" style="width: 90%;"> 90% </div>
              </div>
            </div>
            <div class="single-skill wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="500ms">
              <p class="lead">PHP & Laravel</p>
              <div class="progress">
                <div class="progress-bar progress-bar-primary six-sec-ease-in-out" role="progressbar" aria-valuenow="0" aria-valuemin="100" aria-valuemax="80" style="width: 80%;"> 80% </div>
              </div>
            </div>
            <div class="single-skill wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="500ms">
              <p class="lead">WordPress</p>
              <div class="progress">
                <div class="progress-bar progress-bar-primary six-sec-ease-in-out" role="progressbar" aria-valuenow="0" aria-valuemin="100" aria-valuemax="75" style="width: 75%;"> 75% </div>
              </div>
            </div>
            <div class="single-skill wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="600ms">
              <p class="lead">Databass</p>
              <div class="progress">
                <div class="progress-bar progress-bar-primary six-sec-ease-in-out" role="progressbar" aria-valuenow="0" aria-valuemin="100" aria-valuemax="85" style="width: 85%;"> 85% </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="600ms"> <img src="images/Service/mahmudtpi97.jpg" class="img-responsive img-rounded" alt=""> </div>
      </div>
    </div>
  </section>
