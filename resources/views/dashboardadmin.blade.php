<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#fefefe] font-sans">

  <div class="flex h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-[#f5e9d6] flex flex-col justify-between">
      <div>
        <!-- Logo -->
        <div class="flex items-center gap-2 px-6 py-4 bg-[#a89377]">
          <div class="text-white font-bold text-xl">🎵</div>
        </div>
        <!-- Menu -->
        <nav class="mt-4 px-4 space-y-4 text-sm font-medium">
          <a href="#" class="flex items-center gap-3 text-black">
            <div class="text-xl">🔲</div> Dashboard
          </a>
          <a href="#" class="flex items-center gap-3 text-black">
            <div class="text-xl">📋</div> Data Alat Musik
          </a>
          <a href="#" class="flex items-center gap-3 text-black">
            <div class="text-xl">👥</div> Data Pengguna
          </a>
          <a href="#" class="flex items-center gap-3 text-black">
            <div class="text-xl">🤝</div> Transaksi
          </a>
          <a href="#" class="flex items-center gap-3 text-black">
            <div class="text-xl">🔔</div> Notifikasi
          </a>
          <a href="#" class="flex items-center gap-3 text-black">
            <div class="text-xl">📄</div> Laporan
          </a>
          <a href="#" class="flex items-center gap-3 text-black">
            <div class="text-xl">⚙️</div> Pengaturan
          </a>
        </nav>
      </div>
      <!-- Logout -->
      <div class="px-4 py-6">
        <button class="flex items-center gap-2 px-4 py-2 bg-[#a89377] text-white rounded-full hover:bg-[#8c7762]">
          <span>↩️</span> Logout
        </button>
      </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6 bg-white">
      <!-- Top Bar -->
      <div class="flex justify-between items-center mb-6">
        <div></div> <!-- Spacer for alignment -->
        <div class="flex items-center gap-4">
          <button class="text-xl">🔔</button>
          <button class="text-xl">👤</button>
          <span class="bg-[#a89377] text-white px-4 py-1 rounded-md font-semibold">Admin</span>
        </div>
      </div>

      <!-- Greeting -->
      <div class="bg-[#f5e9d6] p-6 rounded-md mb-6">
        <h1 class="text-2xl font-bold">Hai Admin!</h1>
      </div>

      <!-- Status Buttons -->
      <div class="space-y-4">
        <button class="w-full border border-black rounded-lg p-4 text-left hover:bg-gray-100">
          Menunggu Konfirmasi
        </button>
        <button class="w-full border border-black rounded-lg p-4 text-left hover:bg-gray-100">
          Menunggu Pembayaran
        </button>
        <button class="w-full border border-black rounded-lg p-4 text-left hover:bg-gray-100">
          Konfirmasi Pengembalian
        </button>
      </div>
    </main>
  </div>

</body>
</html>
