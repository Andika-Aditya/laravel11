    <header class="header_section bg-green">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="/">
            <span>
              Apotek
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <x-nav-link href="/" :active="request()->is('/')"> Beranda </x-nav-link>
                <x-nav-link href="/about" :active="request()->is('about')"> Tentang Kami </x-nav-link>
                <x-nav-link href="/contact" :active="request()->is('contact')"> Kontak </x-nav-link>
                <x-nav-link href="/product" :active="request()->is('product')"> Produk </x-nav-link>
            </ul>
          </div>
        </nav>
      </div>
    </header>