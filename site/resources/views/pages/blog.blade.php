<!--Blog-Section-Start-->
<section id="blog">
    <div class="container">
      <div class="col-md-8 col-md-offset-2">
        <div class="heading">
          <h2>LATEST BL<span>OG</span></h2>
          <div class="line"></div>
          <p><span><strong>L</strong></span>orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
            et dolore magna aliqua. Ut enim ad minim veniam</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">

          @foreach ($blogs as $blog)
            <div class="col-md-4 blog-sec">
                <div class="blog-info"> <img src="{{$blog->blog_img}}" class="img-responsive" alt="">
                <div class="data-meta">
                    {{-- {{$blog->created_at->format('Y-.<strong>.m.</strong>.-d')}} --}}
                    @php
                        $y= $blog->created_at->format('Y');
                        $m= $blog->created_at->format('M');
                        $d= $blog->created_at->format('d');
                    @endphp
                    <h4>{{$m}}</h4>
                    <strong>{{$d}}</strong><br>
                    {{$y}}
                </div>
                <a href="javascript::void(0)"><h5>{{$blog->title}}</h5></a>
                <ul class="blog-icon">
                    <li><i class="fa fa-pencil"></i>
                        <a href="javascript::void(0)"><h6>Admin</h6></a>
                    </li>
                    <li class="comment"><i class="fa fa-comment"></i>
                        <a href="javascript::void(0)"><h6>13</h6></a></li>
                </ul>
                <p>{{$blog->description}}</p>
                <a href="javascript::void(0)" class="btn-blg">Read More</a> </div>
            </div>
          @endforeach

        </div>
      </div>
    </div>
  </section>
