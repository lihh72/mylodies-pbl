<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Change Password</title>
  @vite('resources/js/app.js')
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>

<body class="h-full m-0 p-0 font-sans bg-gradient-to-br from-[#fff8f2] to-[#f3e6d3]">
  <!-- Header utama -->
  <header class="bg-[#a9937f] h-[60px] flex items-center px-5 justify-between shadow-md">
    <div class="flex items-center gap-4">
      <div class="text-[22px] cursor-pointer select-none hover:scale-110 transition" role="button" tabindex="0">❮</div>
      <img src="https://placehold.co/40x40" alt="logo" class="h-10 w-10 rounded-full shadow-md">
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

  <div class="flex min-h-[calc(100vh-60px)]">
    <aside class="bg-[#f3e6d3] w-[300px] p-8 flex flex-col items-center shadow-inner">
      <i class="bx bxs-user-circle text-[90px] text-[#4a4743] drop-shadow-lg"></i>
      <div class="font-bold mb-6 text-[18px] text-[#4a4743]">Username</div>
      <nav class="w-full text-[15px] mb-10 space-y-2">
        <a href="#" class="block text-black py-2 px-4 rounded hover:bg-[#e5d6c2] hover:pl-5 transition-all">Rent History</a>
        <a href="#" class="block text-black py-2 px-4 rounded hover:bg-[#e5d6c2] hover:pl-5 transition-all">Transaction</a>
        <a href="#" class="block bg-[#a9937f] text-white font-semibold py-2 px-4 rounded shadow-md">Change Password</a>
        <a href="#" class="block text-black py-2 px-4 rounded hover:bg-[#e5d6c2] hover:pl-5 transition-all">Settings</a>
      </nav>
      <button type="button" aria-label="Change Account" class="bg-[#a9937f] text-white font-bold text-sm py-2 px-6 rounded-xl shadow-md hover:bg-[#7a664f] hover:text-black hover:scale-105 transition-all flex items-center gap-2 w-full justify-center">
        <i class="bx bx-log-out text-[20px]"></i> Change Account
      </button>
    </aside>

    <main class="flex-grow p-10 flex flex-col">
      <h3 class="font-bold text-[28px] text-[#5a3e1b] mb-6 ml-2 tracking-wide">Change Your Password</h3>
      <form class="bg-[#f3e6d3] p-6 rounded-lg w-[90%] max-w-[1200px] mx-auto mt-6" aria-labelledby="password-form-title">
        <div>
          <label for="prev-password" class="block text-sm font-semibold text-[#5a3e1b] mb-2">Previous Password</label>
          <input type="password" id="prev-password" required class="w-full border-2 border-[#c4b6a9] p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#a9937f]">
        </div>
        <div>
          <label for="new-password" class="block text-sm font-semibold text-[#5a3e1b] mb-2">New Password</label>
          <input type="password" id="new-password" required class="w-full border-2 border-[#c4b6a9] p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#a9937f]">
        </div>
        <div>
          <label for="confirm-password" class="block text-sm font-semibold text-[#5a3e1b] mb-2">Confirm New Password</label>
          <input type="password" id="confirm-password" required class="w-full border-2 border-[#c4b6a9] p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#a9937f]">
        </div>
        <div>
          <label for="otp-code" class="block text-sm font-semibold text-[#5a3e1b] mb-2">OTP Code</label>
          <input type="text" id="otp-code" required class="w-full border-2 border-[#c4b6a9] p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#a9937f]">
        </div>
        <button type="submit" class="bg-[#a9937f] text-white font-bold py-3 px-6 rounded-full hover:bg-[#7a664f] hover:scale-105 transition-all shadow-md w-full text-center text-lg flex justify-center items-center mt-4">
          <i class="bx bx-refresh mr-2 text-[20px]"></i> Update Password
        </button>

      </form>
    </main>
  </div>
</body>

</html>
