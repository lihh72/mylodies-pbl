<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Product Detail</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      rel="stylesheet"
    />
  </head>

  <body class="bg-white font-sans">
    <!-- Navbar -->
    <nav class="bg-[#a38f7a] flex items-center justify-between px-6 py-3">
      <div class="flex items-center space-x-6">
        <img
          src="https://storage.googleapis.com/a1aa/image/5665a903-c073-44a6-c5f1-68c977566a33.jpg"
          alt="Company logo"
          class="h-10 w-10"
        />
        <a href="#" class="text-black text-lg font-bold">Home</a>
        <a href="#" class="text-black text-lg font-bold">About Us</a>
        <a href="#" class="text-black text-lg font-bold">Contact</a>
      </div>
      <div class="flex items-center space-x-6 text-black text-xl">
        <i class="far fa-bell cursor-pointer"></i>
        <i class="fas fa-shopping-cart cursor-pointer"></i>
        <i class="far fa-user-circle cursor-pointer"></i>
      </div>
    </nav>

    <!-- Title -->
    <h1 class="text-center font-extrabold text-3xl mt-6">Product Detail</h1>

    <!-- Product Detail -->
    <div class="max-w-3xl mx-auto mt-6 bg-[#f7efe1] rounded-xl p-6 flex flex-col md:flex-row md:items-start md:space-x-8 relative">
      <!-- Product Image -->
      <img
        src="https://storage.googleapis.com/a1aa/image/22f99f54-be24-403e-28cf-b80d31ba8e34.jpg"
        alt="Sonic grey Fender electric guitar"
        class="rounded-xl w-48 h-48 object-contain mb-6 md:mb-0 self-center md:self-start md:mt-6"
      />

      <!-- Product Info and Form -->
      <div class="flex-1">
        <h2 class="text-2xl font-bold mb-1">Sonic grey Fender</h2>
        <p class="text-gray-500 text-lg font-semibold mb-6">IDR 100.000 / Hari</p>

        <form method="POST" action="{{ route('rent.product') }}" class="space-y-4">

          <div>
            <label for="rent-date" class="block mb-1 font-medium text-black">Rent Date</label>
            <input
              type="date"
              name="rent_date"
              id="rent-date"
              required
              class="w-full rounded-lg border border-black px-4 py-2 text-black cursor-pointer"
            />
          </div>

          <div>
            <label for="return-date" class="block mb-1 font-medium text-black">Return Date</label>
            <input
              type="date"
              name="return_date"
              id="return-date"
              required
              class="w-full rounded-lg border border-black px-4 py-2 text-black cursor-pointer"
            />
          </div>

          <div class="relative">
            <label for="pickup-method" class="block mb-1 font-medium text-black">Pickup Method</label>

            <div class="flex items-center space-x-2">
              <div class="relative w-full">
                <select
                  id="pickup-method"
                  name="pickup_method"
                  required
                  class="w-full rounded-lg border border-black pl-10 pr-4 py-2 text-gray-500 font-semibold appearance-none"
                >
                  <option disabled selected value="">choose method pickup</option>
                  <option value="pickup">Pickup</option>
                  <option value="delivery">Delivery</option>
                </select>
                <i
                  id="truck-icon"
                  class="fas fa-truck absolute left-3 top-1/2 -translate-y-1/2 text-black text-lg cursor-pointer"
                  title="Choose pickup method"
                ></i>
              </div>

              <button
                type="submit"
                class="bg-[#a38f7a] text-black font-extrabold px-5 py-2 rounded-md flex items-center space-x-2 whitespace-nowrap"
              >
                <i class="fas fa-paper-plane"></i>
                <span>Rent Now</span>
              </button>
            </div>

            <!-- Custom Dropdown -->
            <div id="pickup-dropdown" class="hidden absolute left-0 right-0 bg-white border border-black rounded-md mt-2 shadow-lg z-20">
              <ul class="divide-y divide-gray-200">
                <li>
                  <button type="button" data-value="pickup" class="w-full text-left px-4 py-2 hover:bg-gray-100">
                    Pickup
                  </button>
                </li>
                <li>
                  <button type="button" data-value="delivery" class="w-full text-left px-4 py-2 hover:bg-gray-100">
                    Delivery
                  </button>
                </li>
              </ul>
            </div>

          </div>
        </form>
      </div>
    </div>

    <!-- Script -->
    <script>
      const truckIcon = document.getElementById('truck-icon');
      const dropdown = document.getElementById('pickup-dropdown');
      const select = document.getElementById('pickup-method');

      truckIcon.addEventListener('click', () => {
        dropdown.classList.toggle('hidden');
      });

      dropdown.querySelectorAll('button').forEach((button) => {
        button.addEventListener('click', () => {
          select.value = button.getAttribute('data-value');
          dropdown.classList.add('hidden');
        });
      });

      document.addEventListener('click', (e) => {
        if (
          !dropdown.contains(e.target) &&
          e.target !== truckIcon &&
          e.target !== select
        ) {
          dropdown.classList.add('hidden');
        }
      });
    </script>
  </body>
</html>
