<?php

use CMW\Model\Core\ThemeModel;
use CMW\Utils\Website;

Website::setTitle("Accueil");
Website::setDescription(Website::getWebsiteDescription());

$googleReviews = [
    [
        "author_name" => "Judith Black",
        "profile_photo_url" => "https://loremflickr.com/cache/resized/65535_53808253434_fb17cb6c27_c_640_480_nofilter.jpg",
        "rating" => 5,
        "text" => "Ce service est vraiment exceptionnel ! L'équipe est professionnelle et attentive. Je recommande vivement.",
        "relative_time_description" => "il y a 1 semaine"
    ],
    [
        "author_name" => "Tom Cook",
        "profile_photo_url" => "https://loremflickr.com/cache/resized/65535_53371146821_c94086f3f2_b_640_480_nofilter.jpg",
        "rating" => 4,
        "text" => "Très bonne expérience globale. Le seul petit bémol est le temps d'attente un peu long, mais la qualité du service compense largement.",
        "relative_time_description" => "il y a 1 mois"
    ],
    [
        "author_name" => "Sarah Johnson",
        "profile_photo_url" => "https://loremflickr.com/cache/resized/65535_53113720087_74e1377b87_c_640_480_nofilter.jpg",
        "rating" => 5,
        "text" => "Je suis impressionnée par la qualité du service et l'attention aux détails. Une entreprise qui mérite vraiment ses 5 étoiles !",
        "relative_time_description" => "il y a 2 jours"
    ]
];
?>

<main class="bg-zinc-50 z-10 mb-44 sm:mb-28">
    <!-- HERO SECTION -->
    <section class="w-full flex flex-col justify-center items-center h-screen relative overflow-hidden">
        <div id="parallax-section" class="flex flex-col items-center gap-2 max-w-4xl text-center relative z-10 px-6">
            <h1 class="animate-enter text-4xl sm:text-6xl tracking-tighter font-black leading-none"> <?= ThemeModel::getInstance()->fetchConfigValue('home_hero_title') ?></h1>
            <h3 class="text-lg tracking-tight"> <?= ThemeModel::getInstance()->fetchConfigValue('home_hero_subtitle') ?></h3>
            <div class="mt-2 flex gap-2">
                <button class="btn xl">Acheter le thème</button>
            </div>
        </div>
    </section>

    <!-- REVIEWS SECTION -->
    <section id="google-reviews-section" class="relative bg-white isolate overflow-hidden px-6 py-24 sm:py-32 lg:px-8">
        <div class="mx-auto max-w-2xl lg:max-w-4xl">
            <figure class="mt-10">
                <div id="review-rating" class="flex justify-center items-center mb-4 transition-all duration-500 ease-in-out">
                    <!-- Stars in JS -->
                </div>
                <blockquote id="review-text" class="text-center text-xl font-semibold leading-8 text-zinc-900 sm:text-2xl sm:leading-9 transition-all duration-500 ease-in-out">
                    <p class="transition-all duration-500 ease-in-out leading-none"></p>
                </blockquote>
                <figcaption class="mt-10">
                    <img id="review-image" class="mx-auto h-10 w-10 rounded-full transition-all duration-500 ease-in-out" src="" alt="">
                    <div class="mt-4 flex items-center justify-center space-x-3 text-base">
                        <div id="review-author" class="font-semibold text-zinc-900 transition-all duration-500 ease-in-out"></div>
                        <svg id="review-dot" viewBox="0 0 2 2" width="3" height="3" aria-hidden="true" class="fill-zinc-900 transition-all duration-500 ease-in-out">
                            <circle cx="1" cy="1" r="1" />
                        </svg>
                        <div id="review-date" class="text-zinc-600 transition-all duration-500 ease-in-out"></div>
                    </div>
                </figcaption>
            </figure>
            <div class="mt-10 flex justify-center space-x-4">
                <button id="prev-review" class="btn">&larr;</button>
                <button id="next-review" class="btn">&rarr;</button>
            </div>
        </div>
    </section>

    <!-- IMAGE STACK SECTION -->
    <section class="flex justify-center items-center w-full px-6 py-24 sm:py-32 lg:px-8">
        <div class="max-w-6xl w-full flex flex-col sm:flex-row gap-10 justify-center items-center">
            <div class="flex flex-col sm:w-1/2 gap-2 mb-4 sm:mb-0">
                <div>
                    <span class="text-sm">Cool pets</span>
                    <h3 class="text-4xl font-semibold leading-none tracking-tighter">Here is some pets</h3>
                </div>
                <p>Proident commodo do nostrud ipsum anim sit. Laboris eu exercitation eu consectetur. Sint veniam ullamco exercitation ad ex sit deserunt adipisicing officia consectetur amet excepteur aliqua qui labore. Mollit reprehenderit tempor et.</p>
                <a href="#" class="btn w-min whitespace-nowrap">See more</a>
            </div>
            <div id="image-stack" class="relative w-full sm:w-1/2 cursor-pointer px-8" style="aspect-ratio: 4/3">
                <?php
                $images = [
                    'https://loremflickr.com/640/480/cats',
                    'https://loremflickr.com/640/480/dogs',
                    'https://loremflickr.com/640/480/birds',
                ];
                foreach ($images as $index => $image): ?>
                    <div class="absolute top-0 left-0 w-full h-full transition-all duration-500 ease-in-out" style="transform: rotate(<?= $index * 5 ?>deg) translateZ(<?= $index * 10 ?>px); z-index: <?= count($images) - $index ?>;">
                        <img class="w-full h-full object-cover rounded-2xl shadow-2xl" loading="lazy" src="<?= $image ?>" alt="Image <?= $index + 1 ?>">
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- CONTACT SECTION -->
    <section class="isolate bg-white px-6 py-24 sm:py-32 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-3xl font-bold tracking-tight text-zinc-900 sm:text-4xl">Contactez-nous</h2>
            <p class="mt-2 text-lg leading-6 text-zinc-600">Aute magna irure deserunt veniam aliqua magna enim voluptate.</p>
        </div>
        <form action="#" method="POST" class="mx-auto mt-16 max-w-xl sm:mt-10">
            <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
                <div>
                    <label for="first-name" class="label">Prénom</label>
                    <input type="text" name="first-name" id="first-name" autocomplete="given-name" placeholder="Ada" class="input">
                </div>
                <div>
                    <label for="last-name" class="label">Nom</label>
                    <input type="text" name="last-name" id="last-name" autocomplete="family-name" placeholder="Lovelace" class="input">
                </div>
                <div class="sm:col-span-2">
                    <label for="email" class="label">Email</label>
                    <input type="email" name="email" id="email" autocomplete="email" placeholder="ada.lovelace@overheat.studio" class="input">
                </div>
                <div class="sm:col-span-2">
                    <label for="phone-number" class="label">Phone number</label>
                    <input type="tel" name="phone-number" id="phone-number" autocomplete="tel" placeholder="0612345678" class="input">
                </div>
                <div class="sm:col-span-2">
                    <label for="message" class="label">Message</label>
                    <textarea name="message" id="message" rows="4" placeholder="Bonjour..." class="input"></textarea>
                </div>
                <div class="flex gap-x-4 sm:col-span-2">
                    <div class="flex h-6 items-center">
                        <button type="button" id="toggle-button" class="toggle" role="switch" aria-checked="false" aria-labelledby="switch-1-label">
                            <span class="sr-only">Accepter la politique de confidentialité</span>
                            <span id="toggle-thumb" aria-hidden="true" class="toggle-thumb"></span>
                        </button>
                    </div>
                    <label class="text-sm leading-6 text-zinc-600" id="switch-1-label">
                        En sélectionnant ceci, vous acceptez notre
                        <a href="#" class="font-semibold text-zinc-900">politique de confidentialité</a>.
                    </label>
                </div>
            </div>
            <div class="mt-10">
                <button type="submit" class="btn xl w-full">Envoyer</button>
            </div>
        </form>
    </section>

    <!-- CTA SECTION -->
    <section class="flex justify-center items-center w-full px-6 py-24 sm:py-32 lg:px-8">
        <div class="max-w-6xl w-full rounded-3xl border-2 border-zinc-50/20 bg-zinc-900 flex flex-col-reverse sm:flex-row p-2 shadow-2xl">
            <div class="flex flex-col sm:w-1/2 gap-2 p-3 sm:p-6 justify-center">
                <div>
                    <span class="text-sm text-zinc-50">Cool flowers</span>
                    <h3 class="text-4xl font-semibold leading-none tracking-tighter text-zinc-50">Here is some flowers</h3>
                </div>
                <p class="text-zinc-50">Proident commodo do nostrud ipsum anim sit. Laboris eu exercitation eu consectetur. Sint veniam ullamco exercitation ad ex sit deserunt adipisicing officia consectetur amet excepteur aliqua qui labore. Mollit reprehenderit tempor et.</p>
                <a href="#" class="btn secondary w-min whitespace-nowrap">See more</a>
            </div>
            <div class="flex w-full sm:w-1/2 h-full hover:scale-[0.98] transition-all duration-200 relative" style="aspect-ratio: 4/3">
                <img class="w-full h-full object-cover rounded-2xl" src="https://loremflickr.com/640/480/flowers" alt="flowers">
                <span class="absolute bottom-2 right-2 bg-zinc-900 border-2 border-zinc-50/10 rounded-xl px-2 py-0.5 text-zinc-50">Flowers</span>
            </div>
        </div>
    </section>

    <!--
    DIVIDER EXEMPLE
     <div class="divider-wrapper rotate-180">
        <div class="divider"></div>
    </div>
     -->
</main>

<!-- ### JAVASCRIPT ### -->

<!-- Form Toggle -->
<script>
    const button = document.getElementById('toggle-button');
    const thumb = document.getElementById('toggle-thumb');

    button.addEventListener('click', () => {
        const isChecked = button.getAttribute('aria-checked') === 'true';

        // Toggle state
        button.setAttribute('aria-checked', !isChecked);

        // Change classes based on state
        if (isChecked) {
            button.classList.add('bg-zinc-200');
            button.classList.remove('bg-zinc-600');
            thumb.classList.add('translate-x-0');
            thumb.classList.remove('translate-x-3.5');
        } else {
            button.classList.add('bg-zinc-600');
            button.classList.remove('bg-zinc-200');
            thumb.classList.add('translate-x-3.5');
            thumb.classList.remove('translate-x-0');
        }
    });
</script>

<!-- Image Stack -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const imageStack = document.getElementById('image-stack');
        const images = Array.from(imageStack.querySelectorAll('div'));
        const totalImages = images.length;

        function rotateImages() {
            const firstImage = images.shift();
            images.push(firstImage);

            images.forEach((img, index) => {
                img.style.transform = `rotate(${index * 5}deg) translateZ(${index * 10}px)`;
                img.style.zIndex = (totalImages - index).toString();
            });
        }

        imageStack.addEventListener('click', rotateImages);
    });
</script>

<!-- Google Reviews -->
<script>
    var googleReviews = <?php echo json_encode($googleReviews); ?>;
    document.addEventListener('DOMContentLoaded', function() {
        let currentIndex = 0;
        let autoplayInterval;

        const ratingElement = document.getElementById('review-rating');
        const textElement = document.getElementById('review-text').querySelector('p');
        const imageElement = document.getElementById('review-image');
        const dotElement = document.getElementById('review-dot');
        const authorElement = document.getElementById('review-author');
        const dateElement = document.getElementById('review-date');
        const prevButton = document.getElementById('prev-review');
        const nextButton = document.getElementById('next-review');

        function createStarRating(rating) {
            const fullStar = '<svg class="w-10 h-10 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>';
            const emptyStar = '<svg class="w-10 h-10 text-zinc-300" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>';

            let stars = '';
            for (let i = 0; i < 5; i++) {
                stars += i < rating ? fullStar : emptyStar;
            }
            return stars;
        }

        function animateExit() {
            ratingElement.style.opacity = '0';
            textElement.style.opacity = '0';
            imageElement.style.opacity = '0';
            authorElement.style.opacity = '0';
            dateElement.style.opacity = '0';
            dotElement.style.opacity = '0';
        }

        function animateEnter() {
            ratingElement.style.opacity = '1';
            textElement.style.opacity = '1';
            imageElement.style.opacity = '1';
            authorElement.style.opacity = '1';
            dateElement.style.opacity = '1';
            dotElement.style.opacity = '1';
        }

        function updateReview(index) {
            const review = googleReviews[index];

            animateExit();

            setTimeout(() => {
                ratingElement.innerHTML = createStarRating(review.rating);
                textElement.textContent = review.text;
                imageElement.src = review.profile_photo_url;
                imageElement.alt = review.author_name;
                authorElement.textContent = review.author_name;
                dateElement.textContent = review.relative_time_description;
                setTimeout(animateEnter, 50);
            }, 500);
        }

        function showNextReview() {
            currentIndex = (currentIndex + 1) % googleReviews.length;
            updateReview(currentIndex);
            resetAutoplay();
        }

        function showPrevReview() {
            currentIndex = (currentIndex - 1 + googleReviews.length) % googleReviews.length;
            updateReview(currentIndex);
            resetAutoplay();
        }

        function startAutoplay() {
            autoplayInterval = setInterval(showNextReview, 5000);
        }

        function resetAutoplay() {
            clearInterval(autoplayInterval);
            startAutoplay();
        }

        nextButton.addEventListener('click', showNextReview);
        prevButton.addEventListener('click', showPrevReview);

        updateReview(currentIndex);

        startAutoplay();

        const reviewSection = document.getElementById('google-reviews-section');
        reviewSection.addEventListener('mouseenter', () => clearInterval(autoplayInterval));
        reviewSection.addEventListener('mouseleave', startAutoplay);
    });
</script>

<!-- Hero Parallax -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const parallaxSection = document.getElementById('parallax-section');
        let lastScrollY = window.scrollY;

        function updateParallax() {
            const scrollY = window.scrollY;
            const delta = scrollY - lastScrollY;
            const speed = 0.45;

            parallaxSection.style.transform = `translateY(${scrollY * speed}px)`;
            lastScrollY = scrollY;

            requestAnimationFrame(updateParallax);
        }

        updateParallax();
    });

</script>