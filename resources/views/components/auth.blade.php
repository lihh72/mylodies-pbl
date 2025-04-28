<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'MyLodies Auth' }}</title>
    @vite('resources/js/app.js')
</head>

<body class="min-h-screen flex items-center justify-center bg-white relative">
    <div class="aurora-glow pointer-events-none"></div>

    <div class="relative z-10 w-full max-w-6xl p-8">
        <div id="mobile-wrapper" class="flex flex-col md:flex-row items-center justify-center w-full">
            {{ $slot }}
        </div>
    </div>
    
</body>

</html>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const scrollButton = document.getElementById('scroll-button');
        const wrapper = document.getElementById('mobile-wrapper');

        if (scrollButton && wrapper && window.innerWidth < 768) {
            scrollButton.addEventListener('click', function () {
                const form = wrapper.children[1]; // form ada di child kedua
                if (form) {
                    form.scrollIntoView({ behavior: 'smooth' });
                }
            });
        }
    });
    
    document.addEventListener('DOMContentLoaded', function () {
    if (window.innerWidth < 768) { // hanya untuk mobile
        const wrapper = document.getElementById('mobile-wrapper');
        wrapper.classList.add('flex-col');

        const children = wrapper.children;
        if (children.length >= 2) {
            const logo = children[0];
            const form = children[1];

            // Logo tetap layar penuh, di tengah
            logo.classList.add('h-screen', 'flex', 'flex-col', 'justify-center', 'items-center');

            // Bungkus form dalam div baru supaya bisa ditengahin
            const formWrapper = document.createElement('div');
            formWrapper.classList.add('w-full', 'min-h-screen', 'flex', 'flex-col', 'justify-center', 'items-center', 'opacity-0', 'transition-opacity', 'duration-700', 'ease-in-out', 'px-4');
            
            wrapper.replaceChild(formWrapper, form);
            formWrapper.appendChild(form);

            // Sembunyikan logo saat scroll
            window.addEventListener('scroll', function () {
                if (window.scrollY >= window.innerHeight / 2) {
                    logo.style.opacity = '0';
                    logo.style.pointerEvents = 'none';
                    formWrapper.classList.add('opacity-100');
                } else {
                    logo.style.opacity = '1';
                    logo.style.pointerEvents = 'auto';
                    formWrapper.classList.remove('opacity-100');
                }
            });
         // Auto Scroll setelah 2 detik
         setTimeout(function () {
                    form.scrollIntoView({ behavior: 'smooth' });
                }, 3000);
            }
        }
    });


</script>