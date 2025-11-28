<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $websiteData->namasekolah ?? 'Nama Sekolah Belum Diatur' }}</title>
    {{-- Favicon dinamis dari field logo --}}
    @if(!empty($websiteData->logo))
        <link rel="icon" type="image/png" href="{{ asset('uploads/logo/'.$websiteData->logo) }}">
    @else
        {{-- fallback icon jika logo belum diupload --}}
        <link rel="icon" type="image/png" href="{{ asset('image/no-image.jpg') }}">
    @endif
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet" />
    @vite('resources/css/app.css')

    <style>
      :root {
        --primary-color: #2e7d32;
        --secondary-color: #1b5e20;
        --accent-color: #4caf50;
      }

      body {
        font-family: "Segoe UI", system-ui, sans-serif;
        scroll-behavior: smooth;
      }

      .hero-slider {
        height: 70vh;
        position: relative;
        overflow: hidden;
      }

      .slide {
        position: absolute;
        width: 100%;
        height: 100%;
        opacity: 0;
        transition: opacity 1s ease-in-out;
      }

      .slide.active {
        opacity: 1;
      }

      .slide-content {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.47);
        color: white;
        padding: 1.5rem;
      }

      .nav-dots {
        position: absolute;
        bottom: 10px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 10px;
      }

      .nav-dot {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.5);
        cursor: pointer;
      }

      .nav-dot.active {
        background: var(--accent-color);
      }

      .card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
      }

      .bg-primary {
        background-color: var(--primary-color);
      }

      .bg-secondary {
        background-color: var(--secondary-color);
      }

      .text-accent {
        color: var(--accent-color);
      }

      .btn-primary {
        background-color: var(--primary-color);
        color: white;
        transition: all 0.3s ease;
      }

      .btn-primary:hover {
        background-color: var(--secondary-color);
      }

      .section-divider {
        width: 100px;
        height: 3px;
        background: var(--accent-color);
        margin: 1.5rem auto;
      }

      footer {
        background: #222;
      }

      @media (max-width: 768px) {
        .hero-slider {
          height: 50vh;
        }
      }
    </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="bg-white shadow-lg sticky top-0 z-50">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center relative">
      <!-- Logo -->
      <div class="flex items-center">
        <img
          src="{{ asset('uploads/logo/'.$websiteData->logo) }}"
          alt="Logo SMA IT"
          class="mr-3"
          width="60"
          height="60"
        />
        <div>
          <a href="/" class="text-lg font-bold text-gray-800">{{ $websiteData->namasekolah ?? 'Nama Sekolah Belum Diatur' }}</a>
          <p class="text-xs text-gray-600">{{ $websiteData->judulkecil ?? 'Nama Sekolah Belum Diatur' }}</p>
        </div>
      </div>
      <!-- Desktop Menu -->
      <div class="hidden md:flex space-x-8">
        <a href="{{ url('/') }}"
          class="{{ request()->is('/') ? 'text-green-700 font-semibold border-b-2 border-green-600 pb-1' : 'text-gray-800 hover:text-green-700 font-medium' }}">
            Beranda
        </a>
        <a href="{{ url('tentang') }}"
          class="{{ request()->is('tentang') ? 'text-green-700 font-semibold border-b-2 border-green-600 pb-1' : 'text-gray-800 hover:text-green-700 font-medium' }}">
            Tentang Kami
        </a>
        <a href="{{ url('galeri') }}"
          class="{{ request()->is('galeri') ? 'text-green-700 font-semibold border-b-2 border-green-600 pb-1' : 'text-gray-800 hover:text-green-700 font-medium' }}">
            Galeri
        </a>
        <a href="{{ url('artikel') }}"
          class="{{ request()->is('artikel') ? 'text-green-700 font-semibold border-b-2 border-green-600 pb-1' : 'text-gray-800 hover:text-green-700 font-medium' }}">
            Artikel
        </a>
        <a href="{{ url('daftar') }}"
          class="{{ request()->is('daftar') ? 'text-green-700 font-semibold border-b-2 border-green-600 pb-1' : 'text-gray-800 hover:text-green-700 font-medium' }}">
            Daftar Online
        </a>
        <a href="{{ url('admin/login') }}"
          class="{{ request()->is('admin/login') ? 'text-green-700 font-semibold border-b-2 border-green-600 pb-1' : 'text-gray-800 hover:text-green-700 font-medium' }}">
            Login
        </a>
      </div>

      <!-- Hamburger Icon -->
      <button id="menu-toggle" class="md:hidden text-gray-800 focus:outline-none">
        <i class="fas fa-bars text-xl"></i>
      </button>

    </div>
    <!-- Mobile Menu -->
    <div
      id="mobile-menu"
      class="absolute top-full left-0 w-full bg-white shadow-lg md:hidden hidden flex flex-col items-start px-6 py-4 space-y-2 transition-all duration-300 z-40"
    >
      <a href="{{ url('/') }}"
          class="{{ request()->is('/') ? 'text-green-700 font-semibold border-b-2 border-green-600 pb-1' : 'text-gray-800 hover:text-green-700 font-medium' }}">
            Beranda
        </a>
        <a href="{{ url('tentang') }}"
          class="{{ request()->is('tentang') ? 'text-green-700 font-semibold border-b-2 border-green-600 pb-1' : 'text-gray-800 hover:text-green-700 font-medium' }}">
            Tentang Kami
        </a>
        <a href="{{ url('galeri') }}"
          class="{{ request()->is('galeri') ? 'text-green-700 font-semibold border-b-2 border-green-600 pb-1' : 'text-gray-800 hover:text-green-700 font-medium' }}">
            Galeri
        </a>
        <a href="{{ url('artikel') }}"
          class="{{ request()->is('artikel') ? 'text-green-700 font-semibold border-b-2 border-green-600 pb-1' : 'text-gray-800 hover:text-green-700 font-medium' }}">
            Artikel
        </a>
        <a href="{{ url('daftar') }}"
          class="{{ request()->is('daftar') ? 'text-green-700 font-semibold border-b-2 border-green-600 pb-1' : 'text-gray-800 hover:text-green-700 font-medium' }}">
            Pendaftaran Online
        </a>
        <a href="{{ url('admin/login') }}"
          class="{{ request()->is('admin/login') ? 'text-green-700 font-semibold border-b-2 border-green-600 pb-1' : 'text-gray-800 hover:text-green-700 font-medium' }}">
            Login Admin
        </a>
    </div>
  </nav>
  <script>
    const menuToggle = document.getElementById("menu-toggle");
    const mobileMenu = document.getElementById("mobile-menu");
    menuToggle.addEventListener("click", () => {
      mobileMenu.classList.toggle("hidden");
      const icon = menuToggle.querySelector("i");
      icon.classList.toggle("fa-bars");
      icon.classList.toggle("fa-times");
    });
  </script>

    {{ $header ?? '' }} <!-- jika mau nambah slot maka buat namanya selain $slot default -->


    <!-- Main Content -->
    <main class="max-w-5xl mx-auto mt-10 px-6 flex-grow">
        {{ $slot }} <!-- Slot adalah default name slot -->
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
      <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <!-- Tentang Sekolah -->
          <div>
            <h3 class="text-xl font-bold mb-4">Tentang Kami</h3>
            <p class="text-gray-400 mb-4">
              {{ $websiteData->namasekolah }} adalah sekolah berbasis nilai-nilai Islam dengan
              fokus pada pengembangan kompetensi teknologi informasi.
            </p>
            <div class="flex space-x-4">
              <a href="#" class="text-gray-400 hover:text-green-500 text-xl">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="text-gray-400 hover:text-green-500 text-xl">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="text-gray-400 hover:text-green-500 text-xl">
                <i class="fab fa-instagram"></i>
              </a>
              <a href="#" class="text-gray-400 hover:text-green-500 text-xl">
                <i class="fab fa-youtube"></i>
              </a>
            </div>
          </div>

          <!-- Link Cepat -->
          <div>
            <h3 class="text-xl font-bold mb-4">Link Cepat</h3>
            <ul class="space-y-2">              
              <li>
                <a href="tentang" class="text-gray-400 hover:text-green-500"
                  >Tentang Kami</a
                >
              </li>
              <li>
                <a href="daftar" class="text-gray-400 hover:text-green-500"
                  >Pendaftaran Online</a
                >
              </li>
              <li>
                <a href="galeri" class="text-gray-400 hover:text-green-500"
                  >Galeri Kegiatan</a
                >
              </li>
              <li>
                <a href="#" class="text-gray-400 hover:text-green-500"
                  >Artikel Terbaru</a
                >
              </li>
              <li>
                <a href="/admin/login" class="text-gray-400 hover:text-green-500">Login Admin</a>
              </li>
            </ul>
          </div>

          <!-- Berita Terbaru -->
          @php
              use App\Models\Artikel;
              $artikels = $artikels ?? Artikel::latest()->take(3)->get();
          @endphp
          <div>
              <h3 class="text-xl font-bold mb-4 pb-2">Artikel Terbaru</h3>
              <div class="space-y-4">
                  @forelse ($artikels as $a)
                      <div class="pb-3">
                          <a href="{{ url('artikel/' . $a->id) }}" class="text-green-600 hover:underline font-medium">
                              {{ Str::limit($a->judulartikel, 60) }}
                          </a>
                          <p class="text-gray-500 text-sm mt-1">
                              {{ $a->created_at->translatedFormat('d F Y') }}
                          </p>
                      </div>
                  @empty
                      <p class="text-gray-500 text-sm">Belum ada artikel.</p>
                  @endforelse
              </div>
          </div>

        </div>

        <div
          class="border-t border-gray-800 mt-12 pt-8 text-center text-gray-400"
        >
          <!-- TOLONG footer jangan dirubah/dihilangkan. Terima Kasih. -->
          <p>&copy; {{ date('Y') }} {{ $websiteData->namasekolah }}. Created By 
            <a href="https://ar-dev.biz.id" target="_blank" class="text-green-600 hover:underline">AR.Dev</a>
          </p>
        </div>
      </div>
    </footer>

    <!-- Back to Top Button -->
    <button
      id="backToTop"
      class="fixed bottom-8 right-8 bg-green-600 text-white p-3 rounded-full shadow-lg opacity-0 invisible transition-all duration-300"
    >
      <i class="fas fa-arrow-up"></i>
    </button>

    <script>
      // Hero Slider
      const slides = document.querySelectorAll(".slide");
      const dots = document.querySelectorAll(".nav-dot");
      let currentSlide = 0;
      function showSlide(n) {
        slides.forEach((slide) => slide.classList.remove("active"));
        dots.forEach((dot) => dot.classList.remove("active"));
        currentSlide = (n + slides.length) % slides.length;
        slides[currentSlide].classList.add("active");
        dots[currentSlide].classList.add("active");
      }
      dots.forEach((dot, index) => {
        dot.addEventListener("click", () => showSlide(index));
      });
      // Auto slide change every 4 seconds
      setInterval(() => {
        showSlide(currentSlide + 1);
      }, 4000);

      // Back to Top Button
      const backToTopBtn = document.getElementById("backToTop");
      window.addEventListener("scroll", () => {
        if (window.pageYOffset > 300) {
          backToTopBtn.classList.remove("opacity-0", "invisible");
        } else {
          backToTopBtn.classList.add("opacity-0", "invisible");
        }
      });
      backToTopBtn.addEventListener("click", () => {
        window.scrollTo({ top: 0, behavior: "smooth" });
      });

      // Smooth scrolling for navigation links
      document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener("click", function (e) {
          e.preventDefault();
          document.querySelector(this.getAttribute("href")).scrollIntoView({
            behavior: "smooth",
          });
        });
      });
    </script>
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
      AOS.init({
        duration: 600, // durasi animasi 1 detik
        once: true, // hanya animasi sekali
      });
    </script>
</body>
</html>
