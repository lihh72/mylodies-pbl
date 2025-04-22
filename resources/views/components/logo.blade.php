<div class="flex flex-col items-center justify-center text-center mb-8 md:mb-0 md:mr-16">
  <img src="{{ asset('images/logo.png') }}" alt="Logo Rental" 
  class="w-25 mb-1 select-none" 
  oncontextmenu="return false" 
  draggable="false"
  style="pointer-events: none; user-select: none;">

  {{ $slot }}
</div>
