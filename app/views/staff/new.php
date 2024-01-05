  <main class="main-content  mt-0">
    <center>
      
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <!-- <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto"> -->
              <div class="card card-plain mt-8">
                <div class="card-header pb-0 text-left bg-transparent">
                  <div class="row">
					<div class="col-lg-6">
					  <?php Flasher::flash();?>
		            </div>
	              </div>
                  <h3 class="font-weight-bolder text-info text-gradient">BUAT AKUN</h3>
                </div>
                <div class="card-body">
                  <form role="form" action="<?= BASEURL;?>/staff/create" method="post" >
                    <div class="mb-3">
                      <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="email-addon" name="username" required="">
                    </div>

                    <div class="mb-3">
                      <input type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email-addon" name="email" required="">
                    </div>
                    <div class="mb-3">
                      <input type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon" name="password" required="">
                    </div>
                    <div class="mb-3">
                      <input type="password" class="form-control" placeholder="Konfirmasi Password" aria-label="Password" aria-describedby="password-addon" name="confirmPassword" required="">
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-info bg-gradient-info w-100 mt-4 mb-0">Daftar</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    Sudah Punya Akun?
                    <a href="<?= BASEURL;?>/staff/login" class="text-info text-gradient font-weight-bold">Masuk</a>
                  </p>
                </div>
              </div>
            </div>
            <!-- <div class="col-md-6">
              <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('<?= BASEURL;?>/img/curved6.jpg')"></div>
              </div>
            </div> -->
          </div>
        </div>
      </div>
    </section>
    </center>
  </main>