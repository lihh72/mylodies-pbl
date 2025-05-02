<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Change Password</title>
  @vite('resources/js/app.js')
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>

<body class="h-full m-0 p-0 font-sans bg-white">
  <!-- Header -->
  <header class="bg-[#a9937f] h-[60px] flex items-center px-5 justify-between shadow-md">
    <div class="flex items-center gap-4">
      <div class="text-[22px] cursor-pointer select-none hover:scale-110 transition" role="button" tabindex="0">❮</div>
      <img src="https://placehold.co/40x40" alt="logo" class="h-10 w-10 rounded-full shadow-md" />
    </div>
    <nav class="flex items-center gap-6 font-medium text-[16px]">
      <a href="#" class="text-black hover:underline hover:text-white transition" tabindex="0">Home</a>
      <a href="#" class="text-black hover:underline hover:text-white transition" tabindex="0">Product</a>
      <a href="#" class="text-black hover:underline hover:text-white transition" tabindex="0">About Us</a>
      <div class="flex gap-5 text-[22px] text-black">
        <button role="button" aria-label="Shopping cart" class="hover:text-white transition">
          <i class="bx bx-cart-alt text-[25px]"></i>
        </button>
        <button role="button" aria-label="Notifications" class="hover:text-white transition">
          <i class="bx bx-bell text-[25px]"></i>
        </button>
        <button role="button" aria-label="User profile" class="hover:text-white transition">
          <i class="bx bx-user-circle text-[25px]"></i>
        </button>
      </div>
    </nav>
  </header>

  <!-- Main -->
  <div class="flex min-h-[calc(100vh-60px)]">
    <!-- Sidebar -->
    <aside class="bg-[#f3e6d3] w-[300px] p-8 flex flex-col items-center shadow-inner">
      <i class="bx bxs-user-circle text-[90px] text-[#4a4743] drop-shadow-lg"></i>
      <div class="font-bold mb-6 text-[18px] text-[#4a4743]">Username</div>
      <nav class="w-full text-[15px] mb-10 space-y-2">
        <a href="#" class="block text-[#5a3e1b] py-2 px-4 rounded hover:bg-[#e5d6c2] hover:pl-5 transition-all">Rent History</a>
        <a href="#" class="block text-[#5a3e1b] py-2 px-4 rounded hover:bg-[#e5d6c2] hover:pl-5 transition-all">Transaction</a>
        <a href="#" class="block bg-[#c4b6a9] text-white font-semibold py-2 px-4 rounded shadow-md hover:text-white transition-all">Change Password</a>
        <a href="#" class="block text-[#5a3e1b] py-2 px-4 rounded hover:bg-[#e5d6c2] hover:pl-5 transition-all">Settings</a>
      </nav>
      <button type="button" aria-label="Change Account" class="bg-[#a9937f] text-white font-bold text-sm py-2 px-6 rounded-full shadow-md hover:bg-[#7a664f] hover:text-white hover:scale-105 transition-all flex items-center gap-2 w-full justify-center">
        <i class="bx bx-log-out text-[20px]"></i> Change Account
      </button>
    </aside>

    <!-- Form Section -->
    <main class="flex-grow p-10 flex flex-col">
      <h3 class="font-bold text-[28px] text-[#5a3e1b] mb-6 ml-2 tracking-wide">Change Your Password</h3>
      <form class="bg-[#f3e6d3] p-6 rounded-lg w-[90%] max-w-[1200px] mx-auto mt-3 space-y-6" aria-labelledby="password-form-title">

        <div class="mb-4 flex items-center gap-4">
          <label for="prev-password" class="w-1/4 text-sm font-semibold text-[#5a3e1b]">Previous Password</label>
          <input type="password" id="prev-password" required class="flex-1 border-2 border-[#8c7b6a] bg-[#f3e6d3] p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#5a3e1b] focus:border-[#5a3e1b]">
        </div>

        <div class="mb-4 flex items-center gap-4">
          <label for="new-password" class="w-1/4 text-sm font-semibold text-[#5a3e1b]">New Password</label>
          <input type="password" id="new-password" required class="flex-1 border-2 border-[#8c7b6a] bg-[#f3e6d3] p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#5a3e1b] focus:border-[#5a3e1b]">
        </div>

        <div class="mb-4 flex items-center gap-4">
          <label for="confirm-password" class="w-1/4 text-sm font-semibold text-[#5a3e1b]">Confirm New Password</label>
          <input type="password" id="confirm-password" required class="flex-1 border-2 border-[#8c7b6a] bg-[#f3e6d3] p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#5a3e1b] focus:border-[#5a3e1b]">
        </div>

        <div class="mb-4 flex items-center gap-4">
          <label for="otp-code" class="w-1/4 text-sm font-semibold text-[#5a3e1b]">OTP Code</label>
          <input type="text" id="otp-code" required class="flex-1 border-2 border-[#8c7b6a] bg-[#f3e6d3] p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#5a3e1b] focus:border-[#5a3e1b]">
        </div>

        <!-- Button Update Password -->
        <div class="flex justify-end mt-6">
          <button type="submit" class="bg-[#a9937f] text-white font-bold py-2 px-6 rounded-full hover:bg-[#7a664f] hover:scale-105 transition-all shadow-md text-center text-lg flex justify-center items-center">
            <i class="bx bx-refresh mr-2 text-[20px]"></i> Update Password
          </button>
        </div>
      </form>
    </main>

  </div>

</body>

</html>
