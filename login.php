 <?php include 'headersignup.php';?>
 <section class="pb-5 login_content_wraper" style="background-image:url(assets/images/gradiantbg.jpg);min-height: 100vh">
  <div class="container" >
    <div class="row">
      <div class="col-lg-5 col-md-8 col-sm-10 mx-auto">
        <div class="cuatomer_signup_form_wraper">
          <div class="main_content_wraper">
            <h1 class="sec_main_heading text-center mb-0">WELCOME BACK!</h1>
            <p class="sec_main_para text-center mb-0">Fill Up your details to Create New Account</p>
          </div>ddd
          <form class="pt-5">
            <div class="col-12 mb-3 signup_input_wraper">
              <input type="email" class="form-control" id="inputEmail" placeholder="Email">
            </div>
            <div class="col-12 mb-3 signup_input_wraper">
              <input type="password" class="form-control pass" id="inputPassword" placeholder="Password">
              <!-- <i class="bi bi-eye toggle_pass"></i> -->
            </div>

            <div class="col-12 mb-3 signup_input_wraper forgetpaww text-right">
              <a href="forget.php">Forgot Password ?</a>
            </div>
            <div class="col-12 mb-3 signup_input_wraper">
              <div class="d-grid gap-2 mt-3 mb-4">
                <button class="btn btn-secondary block get_appointment" type="button">LOGIN
                </button>
              </div>
            </div>
            <div class="col-12 mb-3 signup_input_wraper">
              <h4 class="my-4 text-center login_link_heading">New User? <a href="signup.php"> Signup</a>
              </h4>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include 'footersignup.php';?>   
