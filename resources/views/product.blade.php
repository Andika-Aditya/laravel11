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

  <!-- team section -->
  <section class="team_section layout_padding bg-white">
    <div class="container-fluid">
      <div class="heading_container heading_center">
        <h2 class="text-black-color">
          Produk <span class="text-green-light"> Kami </span>
        </h2>
      </div>
      <div class="team_container">
        <div class="row">
          <x-product-list :productList="$productList"></x-product-list>
        </div>
      </div>
      <div class="btn btn-primary mt-5">
        <a href="#">
          Lihat Semua &raquo;
        </a>
      </div>
    </div>
  </section>
  <!-- end team section -->

  <!-- Footer section -->
  <x-footer></x-footer>
  <!-- End Footer section -->

</body>

</html>