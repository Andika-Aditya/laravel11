<!DOCTYPE html>
<html>

<x-head>
  <x-slot:title>{{ $title }}</x-slot:title>
</x-head>

<body class="sub_page">

  <div class="hero_area">

    <!-- header section strats -->
    <x-navbar></x-navbar>
    <!-- end header section -->
  </div>

  <!-- about section -->

  <section class="about_section layout_padding text-black-color bg-white ">
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

  <!-- end about section -->

  <!-- Footer section -->
  <x-footer></x-footer>
  <!-- end Footer section -->

</body>

</html>