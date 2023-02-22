<!--Contact-Section-Start-->
<section id="contact">
    <div class="container">
      <div class="col-md-8 col-md-offset-2">
        <div class="heading">
          <h2>CONTACT <span>US</span></h2>
          <div class="line"></div>
          <p><span><strong>L</strong></span>orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
            et dolore magna aliqua. Ut enim ad minim veniam</p>
        </div>
      </div>
      <div class="text-center">
        <div class="col-md-6 col-sm-6 contact-sec-1">
          <h4>CONTACT IN<span>FO</span></h4>
          <ul class="contact-form">
            <li><i class="fa fa-map-marker"></i>

              <h6><strong>Address:</strong> {{$contacts->address}}</h6>
            </li>
            <li><i class="fa fa-envelope"></i>
              <h6><strong>Mail Us:</strong> <a href="{{$contacts->mail}}">{{$contacts->mail}}</a></h6>
            </li>
            <li><i class="fa fa-phone"></i>
              <h6><strong>Phone:</strong> {{$contacts->phone}} </h6>
            </li>
            <li><i class="fa fa-wechat"></i>
              <h6><strong>Website:</strong> <a href="{{$contacts->website}}" target="_blank">{{$contacts->website}}</a> </h6>
            </li>
          </ul>
        </div>

        <div class="col-md-6 col-sm-6">

          <form id="main-contact-form" class="MessageData" name="contact-form" method="post" action=" ">
            @csrf
            <div class="row  wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
              <div class="col-sm-6">
                <div class="form-group">
                  <input type="text" name="name" id="name" class="form-control" placeholder="Name" >
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input type="email" name="email" id="email" class="form-control" placeholder="Email Address" >
                </div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject" >
            </div>
            <div class="form-group">
              <input type="url" name="link" id="link" class="form-control" placeholder="Your work link ( No Required )" >
              <span class="text-info"></span>
            </div>
            <div class="form-group">
              <textarea name="message" id="message" class="form-control" rows="4" placeholder="Enter your message" ></textarea>
            </div>
            <input type="hidden" id="status" name="status" value="pending">
            <h5 class="text-danger" id="error"></h5>
            <button type="submit" id="msgSubmit" class="btn-send col-md-12 col-sm-12 col-xs-12" >Send Now</button>
          </form>


        </div>
      </div>
    </div>
  </section>
  @section('scripts')
  <script>
      $(document).ready(function(){
         $(document).on('submit','.MessageData',function(event){
             event.preventDefault();

              $('#status').val(0);
              let name    = $('#name').val();
              let email   =$('#email').val();
              let subject = $('#subject').val();
              let message = $('#message').val();
              let link    = $('#link').val();
              let status  = $('#status').val();

              if(name.length == 0){
                   $('#error').html('Name is Required !');
              }else if(email.length == 0){
                   $('#error').html('Email is Required !');
              }else if(subject.length == 0){
                   $('#error').html('Subject is Required !');
              }else if(message.length == 0){
                   $('#error').html(' Message is Required !');
              }
              else{
                 $('#error').html(' ');
                 let formData = new FormData();
                   formData.append('name',name);
                   formData.append('email',email);
                   formData.append('subject',subject);
                   formData.append('message',message);
                   formData.append('link',link);
                   formData.append('status',status);

                 axios.post('/messageSend',formData)
                 .then(function(response){

                    console.log(response);
                    if(response.status == 200){

                        if (response.data == 1) {
                            $("#msgSubmit").html("Message Send Successfully !");
                            setTimeout(function(){
                                $("#msgSubmit").html("Send Now");
                            }, 3000);
                        }
                        else{
                            $("#msgSubmit").html("Message Send Failed !");
                        }
                    }
                    else{
                        $("#msgSubmit").html("Something Went Wrong !");
                    }
                 })
                 .catch(function(error){
                    console.log(error)
                    $("#msgSubmit").html("Something Went Wrong Same!");
                 })
              }
         })
      })
  </script>
@endsection
