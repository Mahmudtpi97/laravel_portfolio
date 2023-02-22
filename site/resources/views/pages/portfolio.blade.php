<!--Portfolio-Section-Start-->
<section id="portfolio">
    <div class="container">
      <div class="col-md-8 col-md-offset-2">
        <div class="heading">
          <h2>AWESOME Portfol<span>io</span></h2>
          <div class="line"></div>
          <p><span><strong>L</strong></span>orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
            et dolore magna aliqua. Ut enim ad minim veniam</p>
        </div>
      </div>
      <div class="text-center">
        <ul class="portfolio-filter">
            <li><a class="active" href="#" data-filter="*">All</a></li>
            @foreach ($portfolios as $portfolio)
                @if ($portfolio->tab_title != null)
                    <li><a href="#" data-filter=".{{$portfolio->tab_filter}}">{{$portfolio->tab_title}}</a></li>
                @else
                    <li style="display: none"><a href="#"></a></li>
                @endif
            @endforeach
        </ul>
        <!--/#portfolio-filter-->
      </div>
      <div class="portfolio-items">

        @foreach ($portfolios as $portfolio)
            <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item {{$portfolio->item_class}}">
                <div class="portfolio-item-inner">
                    <img class="img-responsive" src="{{$portfolio->portfolio_img}}" alt="Portfolio Image">
                    <div class="portfolio-info">
                        <a class="preview" href="{{$portfolio->portfolio_img}}" title="preview image"><i class="fa fa-plus-circle"></i></a>
                        @if($portfolio->link != null )
                           <a href="{{$portfolio->link}}" title="project demo" target="_blank"><i class="fa-solid fa-circle-right"></i> </a>
                        @endif
                        <h6>{{$portfolio->img_title}}</h6>
                        <p>{{$portfolio->img_short_des}}</p>
                    </div>
                </div>
            </div>


        @endforeach

      </div>
    </div>
  </section>

