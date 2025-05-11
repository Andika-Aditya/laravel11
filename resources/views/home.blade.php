<!DOCTYPE html>
<html>

<x-head>
  <x-slot:title>{{ $title }}</x-slot:title>
</x-head>

<body>

  <div class="hero_area">

    <div class="hero_bg_box">
      <div class="bg_img_box">
        <img src="img/hero-bg.png" alt="">
      </div>
    </div>

    <!-- header section strats -->
    <x-navbar></x-navbar>
    <!-- end header section -->

    <!-- slider section -->
    <section class="slider_section ">
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <x-carousel :carousels="$carousels"></x-carousel>
        </div>
        <ol class="carousel-indicators">
          <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
          <li data-target="#customCarousel1" data-slide-to="1"></li>
          <li data-target="#customCarousel1" data-slide-to="2"></li>
        </ol>
      </div>

    </section>
    <!-- end slider section -->
  </div>


  <!-- visi & misi section -->

  <section class="service_section layout_padding">
    <div class="service_container">
      <div class="container ">
        <div class="heading_container heading_center">
          <h2>
            Visi <span class="colorGreen"> Misi </span>
          </h2>
          
          <p>
            Kami berkomitmen untuk memberikan produk obat yang aman, efektif, dan terjangkau kepada seluruh pelanggan.
          </p>
        </div>
        <div class="row">
          <div class="col-md-6 ">
            <div class="box ">
              <div class="img-box">
                <img src="img/visi.png" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Visi
                </h5>
                <p>
                  Menjadi apotek terpercaya dengan pelayanan terbaik serta produk kesehatan berkualitas.
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-6 ">
            <div class="box ">
              <div class="img-box">
                <img src="img/misi.png" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Misi
                </h5>
                <p>
                  Menyediakan obat aman dan terjangkau, konsultasi profesional, edukasi kesehatan, dan pelayanan prima.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end visi & misi section -->


  <!-- tentang kami section -->

  <section class="about_section layout_padding">
    <div class="container  ">
      <div class="heading_container heading_center">
        <h2>
          Tentang <span>Kami</span>
        </h2>
        <p>
          Kami apotek terpercaya yang menyediakan obat berkualitas dan layanan kesehatan profesional.
        </p>
      </div>
      <div class="row">
        <div class="col-md-6 ">
          <div class="img-box">
            <img src="img/about-img.png" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <h3>
              Apotek Terpercaya Sehat
            </h3>
            <p>
              Apotek kami berkomitmen untuk memberikan pelayanan kesehatan terbaik kepada masyarakat.
              Kami menyediakan produk obat berkualitas dengan standar keamanan yang terjamin.
              Dengan dukungan tenaga apoteker profesional, 
              kami memastikan setiap pelanggan mendapatkan informasi yang tepat dan bimbingan dalam penggunaan obat.
              Selain itu, kami juga menawarkan konsultasi kesehatan gratis untuk membantu Anda menjaga kesehatan secara optimal.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end tentang kami section -->

    <!-- produk unggulan section -->

  <section class="client_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center psudo_white_primary mb_45">
        <h2>
          Produk <span>Unggulan</span>
        </h2>
      </div>
      <div class="carousel-wrap ">
        <div class="owl-carousel client_owl-carousel">
          <x-top-product-carousel :topProduct="$topProduct"></x-top-product-carousel>
        </div>
      </div>
    </div>
  </section>

  <!-- end produk unggulan section -->

  <!-- Footer section -->
  <x-footer></x-footer>

  <!-- end Footer section -->
  
</body>

</html>