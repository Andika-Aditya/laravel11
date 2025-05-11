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


  <!-- service section -->

  {{-- <section class="service_section layout_padding">
    <div class="service_container">
      <div class="container ">
        <div class="heading_container heading_center">
          <h2>
            Our <span>Services</span>
          </h2>
          <p>
            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration
          </p>
        </div>
        <div class="row">
          <div class="col-md-4 ">
            <div class="box ">
              <div class="img-box">
                <img src="img/s1.png" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Currency Wallet
                </h5>
                <p>
                  fact that a reader will be distracted by the readable content of a page when looking at its layout.
                  The
                  point of using
                </p>
                <a href="">
                  Read More
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-4 ">
            <div class="box ">
              <div class="img-box">
                <img src="img/s2.png" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Security Storage
                </h5>
                <p>
                  fact that a reader will be distracted by the readable content of a page when looking at its layout.
                  The
                  point of using
                </p>
                <a href="">
                  Read More
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-4 ">
            <div class="box ">
              <div class="img-box">
                <img src="img/s3.png" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Expert Support
                </h5>
                <p>
                  fact that a reader will be distracted by the readable content of a page when looking at its layout.
                  The
                  point of using
                </p>
                <a href="">
                  Read More
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="btn-box">
          <a href="">
            View All
          </a>
        </div>
      </div>
    </div>
  </section> --}}

<div class="container py-5">
  <h2 class="text-center mb-4 text-bold-700">Hubungi <span class="text-green-light">Kami</span> </h2>

  <!-- Peta Lokasi -->
  <div class="mb-4">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31696.60892750578!2d107.6047685!3d-6.9174639!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e64bcf75e887%3A0x401e8f1fc28e7d0!2sBandung%2C%20West%20Java!5e0!3m2!1sen!2sid!4v1683030029394!5m2!1sen!2sid" width="100%" height="300" style="border:0;" allowfullscreen=""></iframe>
  </div>

  <!-- Informasi Kontak -->
  <div class="mb-4">
      <div class="row">
        <div class="card col-6">
            <h4>Informasi Kontak</h4>
            <br>
            <p>
              <i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;
              <span> Jl. Merdeka No. 45 Kota Bandung - 40115 </span>
            </p>
            <p>
              <i class="fa fa-phone" aria-hidden="true"></i>&nbsp;&nbsp;
              <span> +62 1234567890 </span>
            </p>
            <p>
              <i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;
              <span> apotek@gmail.com </span>
            </p>
            <p>
              <i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;&nbsp;
              <span> Senin - Sabtu, 08.00 - 21.00 WIB </span>
            </p>
        </div>
        <div class="col"></div>
        <div class="card col-5">
          <h4>Kirim Pesan</h4>
          <br>
          <form>
              <div class="mb-3">
                  <label for="name" class="form-label">Nama Anda</label>
                  <input type="text" class="form-control" id="name" placeholder="Masukkan nama Anda">
              </div>
              <div class="mb-3">
                  <label for="email" class="form-label">Email Anda</label>
                  <input type="email" class="form-control" id="email" placeholder="Masukkan email Anda">
              </div>
              <div class="mb-3">
                  <label for="message" class="form-label">Pesan</label>
                  <textarea class="form-control" id="message" rows="4" placeholder="Tulis pesan Anda"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Kirim</button>
          </form>
        </div>
      </div>
    </div>
</div>

  <!-- end service section -->

  <!-- Footer section -->

  <x-footer></x-footer>

  <!-- end Footer section -->

</body>

</html>