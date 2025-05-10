<div x-data="{
    scrolled: @entangle('scrolled'),
    init() {
        window.addEventListener('scroll', () => {
            if (window.scrollY >= window.innerHeight / 2) {
                this.scrolled = true;
            } else {
                this.scrolled = false;
            }
        });

        $wire.on('autoScroll', () => {
            const form = $refs.form;
            if (form) {
                form.scrollIntoView({ behavior: 'smooth' });
            }
        });
    }
}" class="flex flex-col md:flex-row items-center justify-center w-full" id="mobile-wrapper">
    <!-- Logo -->
    <div
        x-bind:class="{
            'h-screen flex flex-col justify-center items-center': window.innerWidth < 768,
            'opacity-0 pointer-events-none': scrolled
        }">
        {{ $logo ?? 'Logo Here' }}
    </div>

    <!-- Form -->
    <div x-ref="form"
        class="w-full min-h-screen flex flex-col justify-center items-center px-4 transition-opacity duration-700 ease-in-out"
        x-bind:class="{ 'opacity-100': scrolled, 'opacity-0': !scrolled }">
        {{ $form ?? 'Form Here' }}
    </div>
</div>
