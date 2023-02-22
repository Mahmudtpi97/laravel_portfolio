<!--Features-Section-Start-->
<section id="features">
    <div class="container">
      <div class="col-md-8 col-md-offset-2">
        <div class="heading">
          <h2>AWESOME FEATUR<span>ES</span></h2>
          <div class="line"></div>
          <p><span><strong>L</strong></span>orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
            et dolore magna aliqua. Ut enim ad minim veniam</p>
        </div>
      </div>
      <ul class="nav nav-tabs" role="tablist">
        @foreach ($features as $key=>$feature)
            <li role="presentation" class="{{$key==0 ? 'active':''}}"><a href="#tab-{{$feature->id}}" role="tab" data-toggle="tab"><i class="{{$feature->t_icon}}"></i></a></li>
        @endforeach

        {{-- <li role="presentation"><a href="#tab-2" role="tab" data-toggle="tab"><i class="fa fa-laptop"></i></a></li>
        <li role="presentation"><a href="#tab-3" role="tab" data-toggle="tab"><i class="fa fa-code"></i></a></li>
        <li role="presentation"><a href="#tab-4" role="tab" data-toggle="tab"><i class="fa fa-th-large"></i></a></li>
        <li role="presentation"><a href="#tab-5" role="tab" data-toggle="tab"><i class="fa fa-file-image-o"></i></a></li> --}}
      </ul>
      <div class="tab-content">

        @foreach ($features as $key => $feature)
            <div role="tabpanel" class="tab-pane fade in feat-sec {{$key==0 ? 'active':''}}" id="tab-{{$feature->id}}">
                <div class="col-md-6 tab">
                    <h5>{{$feature->title}}</h5>
                    <div class="line"></div>
                    <div class="clearfix"></div>
                    <p class="feat-sec">{{$feature->description}}<br>
                    </p>
                    {{-- <p class="feat-sec-1">Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound </p> --}}
                </div>
                <div class="col-md-6 tab-img"><img src="images/Features/01.jpg" class="img-responsive" alt=""></div>
            </div>
        @endforeach

      </div>

    </div>
  </section>
