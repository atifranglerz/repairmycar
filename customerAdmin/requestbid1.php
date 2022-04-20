  <?php include 'header.php';?> 
  <section class="pb-5 login_content_wraper" style="background-image:url(assets/images/gradiantbg.jpg);">
    <div class="container" >
      <div class="row">
        <div class="col-lg-10 mx-auto">
          <div class="main_content_wraper dashboard mt-1 mt-lg-5 mt-md-5">
            <h1 class="sec_main_heading text-center mb-3">REQUEST QUOTE</h1>
            <!-- <p class="sec_main_para text-center">See what's happening on your profile</p> -->
          </div>
        </div>
      </div>

      <div class="row ">
        <div class="col-lg-8 col-md-11  mx-auto">
          <div class="bid_form_wraper">
            <div class="row">
              <div class="col-lg-8 mx-auto px-5 px-lg-1 ">
                <ul class="nav nav-tabs " id="myTab" role="tablist">
                  <li class="nav-item nav_item_li" role="presentation">
                    <button class="nav-link active tab_btns" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true"></button>
                  </li>
                  <li class="nav-item nav_item_li" role="presentation">
                    <button class="nav-link tab_btns" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false"></button>
                  </li>
                  <li class="nav-item nav_item_li" role="presentation">
                    <button class="nav-link tab_btns" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false"></button>
                  </li>
                  <li class="nav-item nav_item_li" role="presentation">
                    <button class="nav-link tab_btns " id="fourth-tab" data-bs-toggle="tab" data-bs-target="#fourthtab" type="button" role="tab" aria-controls="contact" aria-selected="false"></button>
                  </li>
                </ul>
                <div class="col-lg-9 mx-auto">
                  <p class=" request_quote_heading">CAR INFORMATION</p>
                </div>
              </div>
              <form  enctype="multipart/form-data">
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active px-lg-3" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row g-lg-3 g-2">
                      <div class="col-lg-6 col-md-6">
                        <select class="form-select" aria-label="Model">
                          <option selected>Model</option>
                          <option value="1">2019</option>
                          <option value="2">2020</option>
                          <option value="3">2021</option>
                        </select>
                      </div>
                      <div class="col-lg-6 col-md-6">
                        <input type="text" class="form-control" placeholder="Make" aria-label="Make">
                      </div>
                      <div class="col-lg-6 col-md-6">
                        <input type="text" class="form-control" placeholder="Year" aria-label="Year">
                      </div>
                      <div class="col-lg-6 col-md-6">
                        <select class="form-select" aria-label="Type of Service">
                          <option selected>Type of Service</option>
                          <option value="1">2019</option>
                          <option value="2">2020</option>
                          <option value="3">2021</option>
                        </select>
                      </div>
                      <!-- <div class="col-lg-6 col-md-6">
                        <input type="text" class="form-control" placeholder="Timeline For Work" aria-label="Timeline For Work">
                      </div>
 -->                      <div class="col-lg-6 col-md-6">
                        <input type="text" class="form-control" placeholder="Car Milage" aria-label="Car Milage">
                      </div>
                      <div class="col-lg-12">
                        <div class="d-grid gap-2 mt-3 mb-4">
                          <button class="btn btn-secondary block get_appointment" type="button">NEXT
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade px-lg-3" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="row g-lg-3 g-2">
                      <div class="col-lg-12 mb-3">

                        <div class="input-images">
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-floating">
                          <textarea class="form-control" placeholder="Add information in details" id="floatingTextarea2" style="height: 106px"></textarea>
                          <label for="floatingTextarea2">Add information in details</label>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="d-grid gap-2 mt-3 mb-4">
                          <button class="btn btn-secondary block get_appointment" type="button">NEXT
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade px-lg-3" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="row g-lg-3 g-2">
                      <div class="col-lg-12 mb-3">
                        <div class="input-images-2" accept="pdf/*" data-type='Pdf'>

                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-floating">
                          <textarea class="form-control" placeholder="Add information in details" id="floatingTextarea2" style="height: 106px">

                          </textarea>
                          <label for="floatingTextarea2">Add information in details</label>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="d-grid gap-2 mt-3 mb-4">
                          <button class="btn btn-secondary block get_appointment" type="button">NEXT
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade px-lg-3" id="fourthtab" role="tabpanel" aria-labelledby="fourth-tab">
                    <div class="row g-lg-3 g-2">
                      <div class="col-lg-12 mb-3">
                        <div class="input-images-3">
                        </div> 
                      </div>
                      <div class="row g-lg-3 g-2">
                        <div class="col-lg-6 col-md-6">
                          <input type="text" class="form-control" placeholder="Name" aria-label="Make">
                        </div>
                        <div class="col-lg-6 col-md-6">
                          <input type="text" class="form-control" placeholder="Mobile No" aria-label="Mobile No">
                        </div>
                        <div class="col-lg-6 col-md-6">
                          <input type="email" class="form-control" placeholder="Emaial" aria-label="Email">
                        </div>
                        <div class="col-lg-6 col-md-6">
                          <input type="text" class="form-control" placeholder="Adress" aria-label="Car Milage">
                        </div>
                        <div class="col-lg-6 col-md-12">
                          <div class="d-grid gap-2 mt-lg-3 mb-lg-4">
                            <button class="btn btn-secondary block get_appointment" type="button">GET QUOTES FROM ALL GARAGES
                            </button>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                          <div class="d-grid gap-2 mt-lg-3 mb-4">
                            <button class="btn text-center btn-primary get_quot block get_appointment" type="button">GET QUOTES FROM PREFFERED GARAGES
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php include 'footer.php';?>  