<!--Pricing-Section-Start-->
<section id="pricing">
    <div class="container">
      <div class="col-md-8 col-md-offset-2">
        <div class="heading">
          <h2>PRICE PACKAG<span>ES</span></h2>
          <div class="line"></div>
          <p><span><strong>L</strong></span>orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
            et dolore magna aliqua. Ut enim ad minim veniam</p>
        </div>
      </div>
      <div class="row">

         @foreach ($pricings as $pricing)
            <div class="col-sm-6 col-md-3">
                <div class="wow zoomIn" data-wow-duration="400ms" data-wow-delay="0ms">
                <ul class="pricing">
                    <li class="plan-header">
                        <div class="price-duration">
                            <div class="price"> ${{$pricing->price}} </div>
                            <div class="duration"> {{$pricing->price_duration}}</div>
                        </div>
                        <div class="plan-name"> {{$pricing->title}} </div>
                    </li>
                 {{-- <ul class="pricing"> --}}
                    {!!$pricing->item!!}
                    {{-- <li><strong>1</strong> DOMAIN</li>
                    <li><strong>100GB</strong> DISK SPACE</li>
                    <li><strong>UNLIMITED</strong> BANDWIDTH</li>
                    <li>SHARED SSL CERTIFICATE</li>
                    <li><strong>10</strong> EMAIL ADDRESS</li>
                    <li><strong>24/7</strong> SUPPORT</li>--}}
                    <li><a class="btn-order" href="{{$pricing->btn_link}}">{{$pricing->btn}}</a> </li>
                </ul>

                </div>
            </div>
         @endforeach


      </div>
    </div>
  </section>
