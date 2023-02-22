<!--Team-Section-Start-->
<section id="team">
    <div class="container">
      <div class="col-md-8 col-md-offset-2">
        <div class="heading">
          <h2>OUR TE<span>AM</span></h2>
          <div class="line"></div>
          <p><span><strong>L</strong></span>orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
            et dolore magna aliqua. Ut enim ad minim veniam</p>
        </div>
      </div>
      <div class="row">
          @foreach ($teams as $team)
            <div class="col-md-3 col-sm-6 col-xs-12 team-main-sec wow slideInUp" data-wow-duration="1s" data-wow-delay=".1s">
                <div class="team-sec">
                <div class="team-img"> <img src="{{$team->team_img}}" class="img-responsive" alt="">
                    <div class="team-desc">
                        <h5>{{$team->name}}</h5>
                        <p>{{$team->shortDes}}</p>
                        <ul class="team-social-icon">
                            {!!$team->social_link!!}
                        </ul>
                    </div>
                </div>
                </div>
            </div>
          @endforeach

      </div>
    </div>
  </section>
