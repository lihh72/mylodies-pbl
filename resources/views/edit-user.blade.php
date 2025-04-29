<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Change Password</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>

<body class="h-full m-0 p-0 font-sans bg-white">
  <!-- Header utama -->
  <header class="bg-[#a9937f] h-[60px] flex items-center px-5 justify-between">
    <div class="flex items-center gap-4">
      <!-- Tombol kembali, simbol panah kiri -->
      <div class="text-[20px] cursor-pointer select-none" role="button" tabindex="0">❮</div>
      <img src="" alt="logo" class="h-10 w-10">
    </div>
    <nav class="flex items-center gap-6 font-medium text-[16px]">
      <!-- Navigasi menu utama -->
      <a href="#" class="text-black hover:underline" tabindex="0">Home</a>
      <a href="#" class="text-black hover:underline" tabindex="0">Product</a>
      <a href="#" class="text-black hover:underline" tabindex="0">About Us</a>
      <!-- Ikon untuk user actions -->
      <div class="flex gap-5 text-[22px] text-black" aria-label="User actions">
        <button role="button" aria-label="Shopping cart" class="cursor-pointer">
          <i class="bx bx-cart-alt text-[25px]"></i>
        </button>
        <button role="button" aria-label="Notifications" class="cursor-pointer">
          <i class="bx bx-bell text-[25px]"></i>
        </button>
        <button role="button" aria-label="User profile" class="cursor-pointer">
          <i class="bx bx-user-circle text-[25px]"></i>
        </button>
      </div>
    </nav>
  </header>

  <!-- Kontainer untuk layout utama -->
  <div class="flex min-h-[calc(100vh-60px)]">
    <!-- Sidebar pengguna -->
    <aside class="bg-[#f3e6d3] w-[300px] min-h-[calc(100vh-60px)] p-8 flex flex-col items-center" role="complementary" aria-label="User navigation">
      <!-- Ikon profil pengguna -->
      <i class="bx bxs-user-circle text-[80px] text-[#4a4743]"></i>
      <!-- Nama pengguna -->
      <div class="font-bold mb-6 text-[18px]">Username</div>
      <nav class="w-full text-[15px] mb-10" role="navigation" aria-label="User menu">
        <!-- Menu navigasi untuk pengguna -->
        <a href="#" class="block text-black mb-3 font-normal hover:font-semibold">Rent History</a>
        <a href="#" class="block text-black mb-3 font-normal hover:font-semibold">Transaction</a>
        <a href="#" class="block text-black mb-3 font-bold">Change Password</a>
        <a href="#" class="block text-black mb-3 font-normal hover:font-semibold">Settings</a>
      </nav>
      <!-- Tombol logout atau ganti akun -->
      <button class="bg-[#a9937f] rounded-[15px] text-black font-bold text-[13px] py-1.5 px-4 flex items-center gap-2 cursor-pointer hover:bg-[#978675]" type="button" aria-label="Change Account">
        <i class="bx bx-log-out"></i> Change Account
      </button>
    </aside>

    <!-- Bagian utama konten (formulir ubah password) -->
    <main class="flex-grow p-8 flex flex-col">
      <h3 class="font-bold mb-4 mt-1 text-[26px] ml-10" tabindex="0">Change Password</h3>
      <!-- Formulir untuk mengubah password -->
      <form class="bg-[#f3e6d3] p-6 rounded-lg w-[90%] max-w-[1200px] mx-auto mt-6" aria-labelledby="password-form-title">
        <!-- Input untuk password lama -->
        <div class="mb-5">
          <label for="prev-password" class="text-[14px] font-normal block mb-1">Enter Previous Password</label>
          <input type="password" id="prev-password" name="prev-password" autocomplete="current-password" required class="bg-[#f3e6d3] w-full rounded-[10px] border-2 border-black px-3 py-2 text-[14px] focus:outline-none focus:border-[#a9937f] focus:shadow-[0_0_3px_rgba(169,147,127,0.5)]">
        </div>
        <!-- Input untuk password baru -->
        <div class="mb-5">
          <label for="new-password" class="text-[14px] font-normal block mb-1">Enter New Password</label>
          <input type="password" id="new-password" name="new-password" autocomplete="new-password" required class="bg-[#f3e6d3] w-full rounded-[10px] border-2 border-black px-3 py-2 text-[14px] focus:outline-none focus:border-[#a9937f] focus:shadow-[0_0_3px_rgba(169,147,127,0.5)]">
        </div>
        <!-- Input untuk konfirmasi password baru -->
        <div class="mb-5">
          <label for="confirm-password" class="text-[14px] font-normal block mb-1">Confirm New Password</label>
          <input type="password" id="confirm-password" name="confirm-password" autocomplete="new-password" required class="bg-[#f3e6d3] w-full rounded-[10px] border-2 border-black px-3 py-2 text-[14px] focus:outline-none focus:border-[#a9937f] focus:shadow-[0_0_3px_rgba(169,147,127,0.5)]">
        </div>
        <!-- Input untuk kode OTP -->
        <div class="mb-5">
          <label for="otp-code" class="text-[14px] font-normal block mb-1">Enter OTP Code</label>
          <input type="text" id="otp-code" name="otp-code" autocomplete="one-time-code" required class="bg-[#f3e6d3] w-full rounded-[10px] border-2 border-black px-3 py-2 text-[14px] focus:outline-none focus:border-[#a9937f] focus:shadow-[0_0_3px_rgba(169,147,127,0.5)]">
        </div>
        <!-- Tombol submit untuk memperbarui password -->
        <button type="submit" class="bg-[#a9937f] rounded-[10px] text-black font-semibold text-[14px] py-2 px-5 mt-2 cursor-pointer hover:bg-[#978675]">Update Password</button>
      </form>
    </main>
  </div>
</body>

</html>
