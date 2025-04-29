<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Change Password</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- ✅ Font Awesome CDN -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
  />
</head>
<body class="h-full m-0 p-0 font-sans bg-white">
  <header class="bg-[#a9937f] h-[60px] flex items-center px-5 justify-between">
    <div class="flex items-center gap-4">
      <div class="text-[20px] cursor-pointer select-none" role="button" tabindex="0">❮</div>
      <img src="" alt="logo" class="h-10 w-10">
    </div>
    <nav class="flex items-center gap-6 font-medium text-[16px]">
      <a href="#" class="text-black hover:underline" tabindex="0">Home</a>
      <a href="#" class="text-black hover:underline" tabindex="0">Product</a>
      <a href="#" class="text-black hover:underline" tabindex="0">About Us</a>
      <div class="flex gap-5 text-[22px] text-black" aria-label="User actions">
        <button role="button" tabindex="0" aria-label="Shopping cart" class="cursor-pointer">
          <i class="fas fa-shopping-cart"></i>
        </button>
        <button role="button" tabindex="0" aria-label="Notifications" class="cursor-pointer">
          <i class="far fa-bell"></i>
        </button>
        <button role="button" tabindex="0" aria-label="User profile" class="cursor-pointer">
          <i class="far fa-user-circle"></i>
        </button>
      </div>
    </nav>
  </header>

  <div class="flex min-h-[calc(100vh-60px)]">
    <aside class="bg-[#f3e6d3] w-[300px] min-h-[calc(100vh-60px)] p-8 flex flex-col items-center box-border" role="complementary" aria-label="User navigation">
      <div class="w-20 h-20 bg-[#4a4743] rounded-full flex justify-center items-center mb-2 text-white text-[40px]" aria-label="User profile picture">
        <i class="fas fa-user" aria-hidden="true"></i>
      </div>
      <div class="font-bold mb-6 text-[16px]">Username</div>
      <nav class="w-full text-[14px] mb-10" role="navigation" aria-label="User menu">
        <a href="#" class="block text-black mb-3 font-normal hover:font-semibold" tabindex="0">Rent History</a>
        <a href="#" class="block text-black mb-3 font-normal hover:font-semibold" tabindex="0">Transaction</a>
        <a href="#" class="block text-black mb-3 font-bold" tabindex="0">Change Password</a>
        <a href="#" class="block text-black mb-3 font-normal hover:font-semibold" tabindex="0">Settings</a>
      </nav>
      <button class="bg-[#a9937f] border-none rounded-[15px] text-black font-bold text-[13px] py-1.5 px-4 flex items-center gap-2 cursor-pointer hover:bg-[#978675]" type="button" aria-label="Change Account">
        <i class="fas fa-sign-out-alt text-sm" aria-hidden="true"></i> Change Account
      </button>
    </aside>

    <main class="flex-grow p-8 flex flex-col box-border" role="main">
      <h3 class="font-bold mb-8 mt-1 text-[26px]" tabindex="0">
        <i class="fas fa-lock mr-2" aria-hidden="true"></i> Change Password
      </h3>
      <form class="bg-[#f3e6d3] p-6 rounded-lg w-[90%] max-w-[1200px] mx-auto box-border" aria-labelledby="password-form-title">
        <div class="mb-5">
          <label for="prev-password" class="text-[14px] font-normal block mb-1">Enter Previous Password</label>
          <input type="password" id="prev-password" name="prev-password" autocomplete="current-password" required aria-required="true" class="bg-[#f3e6d3] w-full rounded-[10px] border-2 border-black px-3 py-2 text-[14px] focus:outline-none focus:border-[#a9937f] focus:shadow-[0_0_3px_rgba(169,147,127,0.5)] box-border">
        </div>
        <div class="mb-5">
          <label for="new-password" class="text-[14px] font-normal block mb-1">Enter New Password</label>
          <input type="password" id="new-password" name="new-password" autocomplete="new-password" required aria-required="true" class="bg-[#f3e6d3] w-full rounded-[10px] border-2 border-black px-3 py-2 text-[14px] focus:outline-none focus:border-[#a9937f] focus:shadow-[0_0_3px_rgba(169,147,127,0.5)] box-border">
        </div>
        <div class="mb-5">
          <label for="confirm-password" class="text-[14px] font-normal block mb-1">Confirm New Password</label>
          <input type="password" id="confirm-password" name="confirm-password" autocomplete="new-password" required aria-required="true" class="bg-[#f3e6d3] w-full rounded-[10px] border-2 border-black px-3 py-2 text-[14px] focus:outline-none focus:border-[#a9937f] focus:shadow-[0_0_3px_rgba(169,147,127,0.5)] box-border">
        </div>
        <div class="mb-5">
          <label for="otp-code" class="text-[14px] font-normal block mb-1">Enter OTP Code</label>
          <input type="text" id="otp-code" name="otp-code" autocomplete="one-time-code" required aria-required="true" class="bg-[#f3e6d3] w-full rounded-[10px] border-2 border-black px-3 py-2 text-[14px] focus:outline-none focus:border-[#a9937f] focus:shadow-[0_0_3px_rgba(169,147,127,0.5)] box-border">
        </div>
        <button type="submit" class="bg-[#a9937f] border-none rounded-[10px] text-black font-semibold text-[14px] py-2 px-5 mt-2 cursor-pointer hover:bg-[#978675]">Update Password</button>
      </form>
    </main>
  </div>
</body>
</html>
