<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Product Search</title>
  @vite('resources/js/app.js')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>
<body class="bg-[#f9f6f1] text-[#3b2e2a] font-sans">

  <x-navbar />

  <!-- Main Section -->
  <main class="max-w-7xl mx-auto px-6 py-16 pt-24">
    
    <!-- Search Header -->
    <div class="text-center mb-12">
      <h2 class="text-3xl font-bold text-[#5c4633]">Search Results</h2>
      <p class="mt-2 text-sm italic text-[#7a6a59]">
        Menampilkan hasil pencarian: <strong>"Electric Guitar"</strong>
      </p>
    </div>

    <!-- Filter + Product Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-[280px_1fr] gap-10 items-start">

      <!-- Sidebar Filters -->
      <aside class="bg-white p-5 rounded-xl shadow border border-[#e5d9ce] text-sm text-[#4e3d33] sticky top-28 h-fit max-h-[80vh] overflow-y-auto">
        <h2 class="text-lg font-semibold flex items-center gap-2 text-[#5c4633] mb-4">
          <i class="fas fa-filter text-[#7d6651]"></i> Filter
        </h2>

        <details class="group border-b border-[#eae2d9] pb-2 mb-2">
          <summary class="cursor-pointer font-medium text-[#5c4633] hover:text-[#7d6651] flex justify-between items-center">
            Lokasi <i class="fas fa-chevron-down text-xs group-open:rotate-180 transition-transform"></i>
          </summary>
          <ul class="mt-2 ml-2 space-y-1">
            <li class="hover:text-[#7d6651] cursor-pointer">Batam</li>
            <li class="hover:text-[#7d6651] cursor-pointer">Jawa Barat</li>
            <li class="hover:text-[#7d6651] cursor-pointer">Jabodetabek</li>
            <li class="hover:text-[#7d6651] cursor-pointer">Others</li>
          </ul>
        </details>

        <details class="group border-b border-[#eae2d9] pb-2 mb-2">
          <summary class="cursor-pointer font-medium text-[#5c4633] hover:text-[#7d6651] flex justify-between items-center">
            Rating <i class="fas fa-chevron-down text-xs group-open:rotate-180 transition-transform"></i>
          </summary>
          <ul class="mt-2 ml-2 space-y-1">
            <li class="hover:text-[#7d6651] cursor-pointer">★☆☆☆☆</li>
            <li class="hover:text-[#7d6651] cursor-pointer">★★☆☆☆</li>
            <li class="hover:text-[#7d6651] cursor-pointer">★★★☆☆</li>
            <li class="hover:text-[#7d6651] cursor-pointer">★★★★☆</li>
            <li class="hover:text-[#7d6651] cursor-pointer">★★★★★</li>
          </ul>
        </details>

        <details class="group border-b border-[#eae2d9] pb-2 mb-2">
          <summary class="cursor-pointer font-medium text-[#5c4633] hover:text-[#7d6651] flex justify-between items-center">
            Brand <i class="fas fa-chevron-down text-xs group-open:rotate-180 transition-transform"></i>
          </summary>
          <ul class="mt-2 ml-2 space-y-1">
            <li class="hover:text-[#7d6651] cursor-pointer">Fender</li>
            <li class="hover:text-[#7d6651] cursor-pointer">Yamaha</li>
            <li class="hover:text-[#7d6651] cursor-pointer">Others</li>
          </ul>
        </details>

        <details class="group pb-2">
          <summary class="cursor-pointer font-medium text-[#5c4633] hover:text-[#7d6651] flex justify-between items-center">
            Harga <i class="fas fa-chevron-down text-xs group-open:rotate-180 transition-transform"></i>
          </summary>
          <ul class="mt-2 ml-2 space-y-1">
            <li class="hover:text-[#7d6651] cursor-pointer">Rp100K - Rp150K</li>
            <li class="hover:text-[#7d6651] cursor-pointer">Rp150K - Rp250K</li>
            <li class="hover:text-[#7d6651] cursor-pointer">Rp250K - Rp450K</li>
            <li class="hover:text-[#7d6651] cursor-pointer">Rp450K - Rp1jt</li>
          </ul>
        </details>
      </aside>

      <!-- Product Grid -->
      <section>
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-8">
          @foreach([
            ['img' => 'gitar1.jpg', 'name' => 'Gitar Electric Aloha', 'price' => 'IDR 270.000 / Day', 'desc' => 'Nyaman untuk genre apapun.'],
            ['img' => 'accordion.jpg', 'name' => 'STAINER ACCORDION 60', 'price' => 'IDR 280.000 / Day', 'desc' => 'Untuk musik tradisional.'],
            ['img' => 'biola.jpeg', 'name' => 'Violin YAMAHA YVN00344', 'price' => 'IDR 300.000 / Day', 'desc' => 'Suara mellow, cocok untuk orkestra.'],
            ['img' => 'drum.jpg', 'name' => 'PEARL DRUM SET EXX-725', 'price' => 'IDR 500.000 / Day', 'desc' => 'Ideal untuk konser.'],
            ['img' => 'gitar2.jpg', 'name' => 'Fender Acoustic', 'price' => 'IDR 260.000 / Day', 'desc' => 'Nada khas dan hangat.'],
            ['img' => 'piano.jpeg', 'name' => 'Steinway Piano', 'price' => 'IDR 600.000 / Day', 'desc' => 'Elegan untuk konser.'],
          ] as $item)
          <div class="bg-white rounded-xl shadow-lg hover:shadow-xl overflow-hidden transition-all duration-300 group">
            <img src="{{ asset('images/' . $item['img']) }}" alt="{{ $item['name'] }}" class="w-full h-52 object-cover group-hover:scale-105 transition-transform">
            <div class="p-5">
              <h3 class="font-semibold text-lg text-[#4a3c31] mb-1">{{ $item['name'] }}</h3>
              <p class="text-sm text-[#6c5e53]">{{ $item['desc'] }}</p>
              <p class="mt-3 inline-block bg-[#f6e8d6] text-[#5c4633] px-3 py-1 rounded-full text-xs font-medium border border-[#d6b896]">{{ $item['price'] }}</p>
              <button class="mt-4 w-full bg-[#b49875] text-white py-2 rounded-full hover:bg-[#9a7b56] transition-all text-sm font-medium">
                Check Availability
              </button>
            </div>
          </div>
          @endforeach
        </div>
      </section>
    </div>
  </main>
</body>
</html>
