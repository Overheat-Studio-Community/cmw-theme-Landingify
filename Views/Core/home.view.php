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

<section class="w-full flex flex-col justify-center items-center h-screen relative overflow-hidden">
    <div id="parallax-section" class="flex flex-col items-center gap-2 max-w-4xl text-center relative z-10 px-6">
        <h1 class="animate-enter text-4xl sm:text-6xl tracking-tighter font-black leading-none"> <?= ThemeModel::getInstance()->fetchConfigValue('home_hero_title') ?></h1>
        <h3 class="text-lg tracking-tight"> <?= ThemeModel::getInstance()->fetchConfigValue('home_hero_subtitle') ?></h3>
        <button class="btn mt-2">Acheter le thème</button>
    </div>
</section>

<div class="divider-wrapper">
    <div class="divider"></div>
</div>

<section id="google-reviews-section" class="relative isolate overflow-hidden px-6 py-24 sm:py-32 lg:px-8">
    <div class="mx-auto max-w-2xl lg:max-w-4xl">
        <figure class="mt-10">
            <div id="review-rating" class="flex justify-center items-center mb-4 transition-all duration-500 ease-in-out">
                <!-- Stars in JS -->
            </div>
            <blockquote id="review-text" class="text-center text-xl font-semibold leading-8 text-zinc-900 sm:text-2xl sm:leading-9 transition-all duration-500 ease-in-out">
                <p class="transition-all duration-500 ease-in-out"></p>
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
            const emptyStar = '<svg class="w-10 h-10 text-gray-300" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>';

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