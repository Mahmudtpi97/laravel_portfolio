<!-- Sidebar -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
      <a class="sidebar-brand brand-logo" href="{{url('/')}}"><img src="{{asset('images/logo.png')}} "alt="logo" /></a>
      <a class="sidebar-brand brand-logo-mini" href="{{url('/')}}"><img src="{{asset('images/logo.png')}} "alt="logo" /></a>
    </div>
    <ul class="nav">
      <li class="nav-item profile">
        <div class="profile-desc">
          <div class="profile-pic">
            <div class="count-indicator">
              <img class="img-xs rounded-circle " src="{{asset('images/faces/face15.jpg')}} "alt="">
              <span class="count bg-success"></span>
            </div>
            <div class="profile-name">
              <h5 class="mb-0 font-weight-normal">Mahmudl Hasan</h5>
              <span>Admin</span>
            </div>
          </div>
          <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
          <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
            <a href="#" class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                  <i class="mdi mdi-settings text-primary"></i>
                </div>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                  <i class="mdi mdi-onepassword  text-info"></i>
                </div>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                  <i class="mdi mdi-calendar-today text-success"></i>
                </div>
              </div>
              <div class="preview-item-content">
                <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
              </div>
            </a>
          </div>
        </div>
      </li>
      <!-- Navigation -->
      <li class="nav-item nav-category">
        <span class="nav-link">Navigation</span>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="{{url('/')}}">
          <span class="menu-icon">
            <i class="mdi mdi-speedometer"></i>
          </span>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-icon">
            <i class="mdi mdi-laptop"></i>
          </span>
          <span class="menu-title">Basic UI Elements</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
          </ul>
        </div>
      </li>
     <!-- Visitor -->
      <li class="nav-item menu-items">
        <a class="nav-link" href="{{url('visitor')}}">
          <span class="menu-icon">
            <i class="mdi mdi-playlist-play"></i>
          </span>
          <span class="menu-title">Visitor</span>
        </a>
      </li>
      <!-- Sliders -->
      <li class="nav-item menu-items">
        <a class="nav-link" data-toggle="collapse" href="#sliders" aria-expanded="false" aria-controls="sliders">
          <span class="menu-icon">
            <i class="mdi mdi-table-large"></i>
          </span>
          <span class="menu-title">Sliders</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="sliders">
          <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{url('sliders')}}">All Slider</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{url('slider/create')}}">Add Slider</a></li>
          </ul>
        </div>
      </li>
      <!-- About -->
      <li class="nav-item menu-items">
        <a class="nav-link" data-toggle="collapse" href="#abouts" aria-expanded="false" aria-controls="abouts">
          <span class="menu-icon">
            <i class="mdi mdi-table-large"></i>
          </span>
          <span class="menu-title">About</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="abouts">
          <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{url('abouts')}}">About</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{url('about/create')}}">Add Item</a></li>
          </ul>
        </div>
      </li>
      <!-- Service -->
      <li class="nav-item menu-items">
        <a class="nav-link" data-toggle="collapse" href="#services" aria-expanded="false" aria-controls="services">
          <span class="menu-icon">
            <i class="mdi mdi-table-large"></i>
          </span>
          <span class="menu-title">Service</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="services">
          <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{url('services')}}">All Service</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{url('service/create')}}">Add Service</a></li>
          </ul>
        </div>
      </li>
      <!-- Features -->
      <li class="nav-item menu-items">
        <a class="nav-link" data-toggle="collapse" href="#features" aria-expanded="false" aria-controls="features">
          <span class="menu-icon">
            <i class="mdi mdi-table-large"></i>
          </span>
          <span class="menu-title">Features</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="features">
          <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{url('features')}}">Features</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{url('feature/create')}}">Add Item</a></li>
          </ul>
        </div>
      </li>
      <!-- Portfolio -->
      <li class="nav-item menu-items">
        <a class="nav-link" data-toggle="collapse" href="#portfolio" aria-expanded="false" aria-controls="portfolio">
          <span class="menu-icon">
            <i class="mdi mdi-table-large"></i>
          </span>
          <span class="menu-title">Portfolio</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="portfolio">
          <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{url('portfolios')}}">Portfolio</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{url('portfolio/create')}}">Add Item</a></li>
          </ul>
        </div>
      </li>
      <!-- Pricing -->
      <li class="nav-item menu-items">
        <a class="nav-link" data-toggle="collapse" href="#pricing" aria-expanded="false" aria-controls="pricing">
          <span class="menu-icon">
            <i class="mdi mdi-table-large"></i>
          </span>
          <span class="menu-title">Pricing</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="pricing">
          <ul class="nav flex-column sub-menu">
             <li class="nav-item"> <a class="nav-link" href="{{url('pricings')}}">Pricing</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{url('pricing/create')}}">Add Item</a></li>
          </ul>
        </div>
      </li>
      <!-- Team -->
      <li class="nav-item menu-items">
        <a class="nav-link" data-toggle="collapse" href="#team" aria-expanded="false" aria-controls="team">
          <span class="menu-icon">
            <i class="mdi mdi-table-large"></i>
          </span>
          <span class="menu-title">Team</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="team">
          <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{url('teams')}}">Team</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{url('team/create')}}">Add Item</a></li>
          </ul>
        </div>
      </li>
      <!-- Testimonial -->
      <li class="nav-item menu-items">
        <a class="nav-link" data-toggle="collapse" href="#testimonial" aria-expanded="false" aria-controls="testimonial">
          <span class="menu-icon">
            <i class="mdi mdi-table-large"></i>
          </span>
          <span class="menu-title">Testimonial</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="testimonial">
          <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{url('testimonials')}}">Testimonial</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{url('testimonial/create')}}">Add Item</a></li>
          </ul>
        </div>
      </li>
      <!-- Blog -->
      <li class="nav-item menu-items">
        <a class="nav-link" data-toggle="collapse" href="#blog" aria-expanded="false" aria-controls="blog">
          <span class="menu-icon">
            <i class="mdi mdi-table-large"></i>
          </span>
          <span class="menu-title">Blog</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="blog">
          <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{url('blogs')}}">Blog</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{url('blog/create')}}">Add Item</a></li>
          </ul>
        </div>
      </li>
      <!-- Contact -->
      <li class="nav-item menu-items">
        <a class="nav-link" data-toggle="collapse" href="#contact" aria-expanded="false" aria-controls="contact">
          <span class="menu-icon">
            <i class="mdi mdi-table-large"></i>
          </span>
          <span class="menu-title">Contact</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="contact">
          <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{url('contacts')}}">Contact</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{url('contact/create')}}">Address Info</a></li>
              
          </ul>
        </div>
      </li>
      <!-- Message -->
      <li class="nav-item menu-items">
        <a class="nav-link" href="{{url('message')}}">
          <span class="menu-icon">
            <i class="mdi mdi-playlist-play"></i>
          </span>
          <span class="menu-title">Message</span>
        </a>
      </li>

    </ul>
  </nav>
 
 
      
        