<?php
?>

<header class="fixed inset-x-0 top-0 z-50 flex flex-col justify-center items-center backdrop-blur-sm bg-zinc-50/80">
    <nav class="max-w-6xl w-full flex items-center justify-between p-4 lg:px-8" aria-label="Global">
        <div class="flex lg:flex-1">
            <a href="/" class="-m-1.5 p-1.5">
                <span class="sr-only">Landingify</span>
                <h1 class="header-title">Landingify</h1>
            </a>
        </div>
        <div class="flex lg:hidden">
            <button type="button" id="mobile-menu-open" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-zinc-700">
                <span class="sr-only">Menu principal</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
        </div>
        <div class="hidden lg:flex lg:gap-x-6">
            <a href="#" class="menu-item-desktop">Product</a>
            <a href="#" class="menu-item-desktop">Features</a>
            <a href="#" class="menu-item-desktop">Marketplace</a>
            <a href="#" class="menu-item-desktop">Company</a>
        </div>
        <div class="hidden lg:flex lg:flex-1 lg:justify-end">
            <a href="#" class="btn">Découvre nos thèmes</a>
        </div>
    </nav>
</header>

<div id="mobile-menu" class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-zinc-900/10 transform translate-x-full transition-transform duration-300 ease-in-out" role="dialog" aria-modal="true">
    <div class="flex items-center justify-between">
        <a href="#" class="-m-1.5 p-1.5">
            <span class="sr-only">Landingify</span>
            <h1 class="header-title">Landingify</h1>
        </a>
        <button id="mobile-menu-close" type="button" class="-m-2.5 rounded-md p-2.5 text-zinc-700">
            <span class="sr-only">Close menu</span>
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
    <div class="mt-6 flow-root">
        <div class="-my-6 divide-y divide-zinc-500/10">
            <div class="space-y-2 py-6">
                <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-zinc-900 hover:bg-zinc-50">Product</a>
                <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-zinc-900 hover:bg-zinc-50">Features</a>
                <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-zinc-900 hover:bg-zinc-50">Marketplace</a>
                <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-zinc-900 hover:bg-zinc-50">Company</a>
            </div>
            <div class="py-6">
                <a href="#" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-zinc-900 hover:bg-zinc-50">CTA</a>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuOpen = document.getElementById('mobile-menu-open');
        const mobileMenuClose = document.getElementById('mobile-menu-close');
        const mobileMenu = document.getElementById('mobile-menu');

        function openMobileMenu() {
            mobileMenu.classList.remove('translate-x-full');
            document.body.style.overflow = 'hidden';
        }

        function closeMobileMenu() {
            mobileMenu.classList.add('translate-x-full');
            document.body.style.overflow = '';
        }

        mobileMenuOpen.addEventListener('click', openMobileMenu);
        mobileMenuClose.addEventListener('click', closeMobileMenu);


        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeMobileMenu();
            }
        });

        window.addEventListener('resize', function() {
            if (window.innerWidth >= 1024) {
                closeMobileMenu();
            }
        });
    });
</script>
