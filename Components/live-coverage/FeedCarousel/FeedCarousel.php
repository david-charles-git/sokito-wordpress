<?php
    $postID = get_the_ID();
    $articleType = "live-coverage";
    $articleArgs = array (
        'post_type' => $articleType,
        'posts_per_page' => -1,
        'post__not_in' => array (
            $postID
        ),
    );
    $articles = new WP_Query($articleArgs);
    $articleCount = wp_count_posts($articleType) -> publish;
    $allArticles = [];

    if ($articles -> have_posts()) {
        while ($articles -> have_posts()) {
            $article = array ();
            $articles -> the_post();
            $articleID = get_the_ID();
            $articleTypes = get_the_terms($articleID, "articleType");
            $title = get_the_title($articleID);
            $featureImage = get_the_post_thumbnail_url( $articleID, "full" );
            $href = get_the_permalink();

            if (have_rows('field_liveCoverage_details')) {
                while (have_rows('field_liveCoverage_details')) {
                    the_row();

                    $readingTime = get_sub_field('readingTime');
                    $isFeatured = get_sub_Field('isFeatured');
                }
            }

            if ($isFeatured) {
                $article["ID"] = $articleID;
                $article["articleTypes"] = $articleTypes;
                $article["title"] = $title;
                $article["readingTime"] = $readingTime;
                $article["featureImage"] = $featureImage;
                $article["href"] = $href;
                $article["isFeatured"] = $isFeatured;

                array_push($allArticles, $article);
            }
        }

        wp_reset_postdata();
    }

?>
    <section class="FeedCarousel" data-autoShift="true">
        <div class="heading">
            <h3>Featured</h3>
        </div>

        <div class="outer">
            <button class="carouselButton left" onclick="handleFeedCarouselLeftButtonClick()">
                <svg xmlns="http://www.w3.org/2000/svg" width="41.374" height="51.481" viewBox="0 0 41.374 51.481">
                    <path id="arrow-42" d="M806.608,961.045c-2.175-2.156-4.319-4.344-6.539-6.456a34.531,34.531,0,0,0-3.122-2.463,8.958,8.958,0,0,1-2.054-1.823,2.265,2.265,0,0,1-.115-2.559,8.421,8.421,0,0,1,2.047-2.259c1.817-1.491,3.692-2.911,5.509-4.4,1.42-1.164,2.79-2.393,4.178-3.6a6.376,6.376,0,0,0,.64-.64c1.1-1.28,1.28-1.28-.224-2.649-.838-.755-1.689-1.484-2.559-2.207-2.348-1.971-4.709-3.922-7.038-5.9a18.262,18.262,0,0,1-1.792-1.67,2.5,2.5,0,0,1-.051-3.589,15.35,15.35,0,0,1,1.536-1.5c.928-.8,1.881-1.574,2.841-2.335a35.188,35.188,0,0,0,5.918-5.758c1.689-2.15,2.886-2.137,4.767-.192a3.372,3.372,0,0,1,.409.454,20.051,20.051,0,0,0,5.848,5.33,18.062,18.062,0,0,1,2.8,2.374A162.375,162.375,0,0,0,832.8,931.12a17.625,17.625,0,0,1,2.361,2.393,2.344,2.344,0,0,1-.339,3.525q-8.855,7.806-17.729,15.586c-2,1.753-3.973,3.525-5.8,5.458a45.22,45.22,0,0,1-3.436,3.007h-1.228Zm25.3-25.593a1.919,1.919,0,0,0-.288-.531c-.755-.691-1.491-1.4-2.3-2.016a111.12,111.12,0,0,1-10.8-9.514,45.879,45.879,0,0,0-5.829-4.959,16.144,16.144,0,0,1-3.378-3.1l-.75-.866-.472-.5a.864.864,0,0,0-1.337.032,67.646,67.646,0,0,1-7.377,6.9,4.641,4.641,0,0,0-.416.448.736.736,0,0,0,.045,1.088c1.069.947,2.15,1.881,3.237,2.815,2.713,2.329,5.432,4.651,8.132,6.993a14.048,14.048,0,0,1,1.484,1.536,1.28,1.28,0,0,1,.077,1.44,4.007,4.007,0,0,1-.691,1,78.414,78.414,0,0,1-6.565,6.4c-1.919,1.529-3.8,3.1-5.688,4.664-.64.544-.672,1.011,0,1.478a33.909,33.909,0,0,1,4.479,4.14c1.209,1.241,2.514,2.387,3.839,3.551.589.531,1,.5,1.6-.038,2.124-1.919,4.159-3.935,6.366-5.758,5.528-4.543,10.647-9.546,16-14.255a4.233,4.233,0,0,0,.576-.7.741.741,0,0,0,.058-.249Z" transform="translate(-794.437 -909.609)" fill="#FFF"></path>
                </svg>
            </button>

            <div class="inner" style="grid-template-columns: repeat(<?php echo count($allArticles); ?>, auto);" ontouchstart="handleFeedCarouselTouchStart()" ontouchend="handleFeedCarouselTouchEnd()" ontouchcancel="handleFeedCarouselTouchEnd()">
<?php
                for ($a = 0; $a < count($allArticles); $a++) {
?>                    
                    <div class="item <?php if ($a == 0) { echo "active"; } ?>">
                        <div class="article">
                            <a href="<?php echo $allArticles[$a]["href"]; ?>"></a>

                            <div class="inner">
                                <div class="background" style="background-image: url(<?php echo $allArticles[$a]["featureImage"]; ?>);"></div>

                                <h6><?php echo $allArticles[$a]["title"]; ?></h6>

                                <div class="taxonomyContainer">
<?php
                                    for ($b = 0; $b < count($allArticles[$a]["articleTypes"]); $b++) {
?>
                                        <div class="taxonomy" data-slug="<?php echo $allArticles[$a]["articleTypes"][$b]->slug; ?>">
                                            <p><?php echo $allArticles[$a]["articleTypes"][$b]->name; ?></p>
                                        </div>  
<?php
                                    }
?>
                                </div>

                                <div class="readTimeContainer">
                                        <p><?php echo $allArticles[$a]["readingTime"]; ?> min read</p>
                                </div>
                            </div>
                        </div>
                    </div>
<?php                    
                }
?>
            </div>
            
            <button class="carouselButton right active" onclick="handleFeedCarouselRightButtonClick()">
                <svg xmlns="http://www.w3.org/2000/svg" width="41.374" height="51.481" viewBox="0 0 41.374 51.481">
                    <path id="arrow-42" d="M806.608,961.045c-2.175-2.156-4.319-4.344-6.539-6.456a34.531,34.531,0,0,0-3.122-2.463,8.958,8.958,0,0,1-2.054-1.823,2.265,2.265,0,0,1-.115-2.559,8.421,8.421,0,0,1,2.047-2.259c1.817-1.491,3.692-2.911,5.509-4.4,1.42-1.164,2.79-2.393,4.178-3.6a6.376,6.376,0,0,0,.64-.64c1.1-1.28,1.28-1.28-.224-2.649-.838-.755-1.689-1.484-2.559-2.207-2.348-1.971-4.709-3.922-7.038-5.9a18.262,18.262,0,0,1-1.792-1.67,2.5,2.5,0,0,1-.051-3.589,15.35,15.35,0,0,1,1.536-1.5c.928-.8,1.881-1.574,2.841-2.335a35.188,35.188,0,0,0,5.918-5.758c1.689-2.15,2.886-2.137,4.767-.192a3.372,3.372,0,0,1,.409.454,20.051,20.051,0,0,0,5.848,5.33,18.062,18.062,0,0,1,2.8,2.374A162.375,162.375,0,0,0,832.8,931.12a17.625,17.625,0,0,1,2.361,2.393,2.344,2.344,0,0,1-.339,3.525q-8.855,7.806-17.729,15.586c-2,1.753-3.973,3.525-5.8,5.458a45.22,45.22,0,0,1-3.436,3.007h-1.228Zm25.3-25.593a1.919,1.919,0,0,0-.288-.531c-.755-.691-1.491-1.4-2.3-2.016a111.12,111.12,0,0,1-10.8-9.514,45.879,45.879,0,0,0-5.829-4.959,16.144,16.144,0,0,1-3.378-3.1l-.75-.866-.472-.5a.864.864,0,0,0-1.337.032,67.646,67.646,0,0,1-7.377,6.9,4.641,4.641,0,0,0-.416.448.736.736,0,0,0,.045,1.088c1.069.947,2.15,1.881,3.237,2.815,2.713,2.329,5.432,4.651,8.132,6.993a14.048,14.048,0,0,1,1.484,1.536,1.28,1.28,0,0,1,.077,1.44,4.007,4.007,0,0,1-.691,1,78.414,78.414,0,0,1-6.565,6.4c-1.919,1.529-3.8,3.1-5.688,4.664-.64.544-.672,1.011,0,1.478a33.909,33.909,0,0,1,4.479,4.14c1.209,1.241,2.514,2.387,3.839,3.551.589.531,1,.5,1.6-.038,2.124-1.919,4.159-3.935,6.366-5.758,5.528-4.543,10.647-9.546,16-14.255a4.233,4.233,0,0,0,.576-.7.741.741,0,0,0,.058-.249Z" transform="translate(-794.437 -909.609)" fill="#FFF"></path>
                </svg>
            </button>
        </div>

        <div class="tabContainer" style="grid-template-columns: repeat(<?php echo count($allArticles); ?>,auto);">
<?php
            for ($a = 0; $a < count($allArticles); $a++) {
?>
                <div data-id="<?php echo $a; ?>" class="naigationTab <?php if ($a == 0) { echo "active"; } ?>" onclick="handleFeedCarouselNaviagationTabClick()"></div>
<?php
            }
?>
        </div>
    </section>

    <script>
        function handleFeedCarouselLeftButtonPosition() {
            const carousels = document.getElementsByClassName("FeedCarousel");

            for (var a = 0; a < carousels.length; a++) {
                const leftButton = carousels[a].getElementsByClassName("carouselButton left")[0];

                if (!leftButton) { break; }

                const windowWidth = window.innerWidth; //px
                const carouselWidth = 1320; //px
                const leftButtonPosition = ((-1) * (windowWidth - carouselWidth)) / 2; //px
                const leftButtonDispaly = leftButtonPosition > 0 ? "none" : "block";

                leftButton.style.display = leftButtonDispaly;
                leftButton.style.left = leftButtonPosition + "px";
            }

            return;
        }

        function handleFeedCarouselRightButtonPosition() {
            const carousels = document.getElementsByClassName("FeedCarousel");

            for (var a = 0; a < carousels.length; a++) {
                const rightButton = carousels[a].getElementsByClassName("carouselButton right")[0];

                if (!rightButton) { break; }

                const windowWidth = window.innerWidth; //px
                const carouselWidth = 1320; //px
                const rightButtonPosition = ((-1) * (windowWidth - carouselWidth)) / 2; //px
                const rightButtonDispaly = rightButtonPosition > 0 ? "none" : "block";

                rightButton.style.display = rightButtonDispaly;
                rightButton.style.right = rightButtonPosition + "px";
            }

            return;
        }

        function handleFeedCarouselLeftButtonClick() {
            const eventTarget = event.currentTarget || event.target;

            stopFeedCarouselAutoShift(eventTarget);
            shiftFeedCarouselLeft(eventTarget);

            return;
        }

        function handleFeedCarouselRightButtonClick() {
            const eventTarget = event.currentTarget || event.target;
            
            stopFeedCarouselAutoShift(eventTarget);
            shiftFeedCarouselRight(eventTarget);

            return;
        }

        function handleFeedCarouselNaviagationTabClick() {
            const eventTarget = event.currentTarget || event.target;

            stopFeedCarouselAutoShift(eventTarget);
            navigateFeedCarousel(event);

            return;
        }

        var globalCarouselTouchX = 0;
        function handleFeedCarouselTouchStart() {
            const touchX = event.touches[0].clientX;

            if (isNaN(touchX)) { return; }

            globalCarouselTouchX = touchX
        }

        function handleFeedCarouselTouchEnd() {
            const eventTarget = event.currentTarget || event.target;
            const touchX = event.changedTouches[0].clientX;
            
            if (isNaN(touchX) || !eventTarget) { return; }

            if (globalCarouselTouchX > touchX) {
                shiftFeedCarouselRight(eventTarget);

            }
            
            if (globalCarouselTouchX < touchX) {
                shiftFeedCarouselLeft(eventTarget);
                
            }

            globalCarouselTouchX = 0;

            return;
        }

        function shiftFeedCarouselRight(eventTarget = null) {
            if (!eventTarget) { return; }

            const carousel = eventTarget.closest(".FeedCarousel");

            if (!carousel) { return; }

            const carsouselItems = carousel.getElementsByClassName("item");

            for (var a = 0; a < carsouselItems.length; a++) {
                if (carsouselItems[a].classList.contains("active")) {
                    const newIndex = a + 1 >= carsouselItems.length ? 0 : a + 1;

                    shiftFeedCarouselToFrame(carousel, newIndex);

                    return;
                }
            }

            return;
        }

        function shiftFeedCarouselLeft(eventTarget = null) {
            if (!eventTarget) { return; }

            const carousel = eventTarget.closest(".FeedCarousel");

            if (!carousel) { return; }

            const carsouselItems = carousel.getElementsByClassName("item");

            for (var a = 0; a < carsouselItems.length; a++) {
                if (carsouselItems[a].classList.contains("active")) {
                    const newIndex = a - 1 < 0 ? 0 : a - 1;

                    shiftFeedCarouselToFrame(carousel, newIndex);
                    
                    return;
                }
            }

            return;
        }

        function navigateFeedCarousel(event = null) {
            if (!event) { return; }

            const eventTarget = event.currentTarget || event.target;
            const carousel = eventTarget.closest(".FeedCarousel");

            if (!carousel) { return; }
            
            const targetTab = event.currentTarget || event.target;
            const tabIndex = targetTab.getAttribute("data-id") || 0;
            
            shiftFeedCarouselToFrame(carousel, tabIndex);

            return;
        }

        function shiftFeedCarouselToFrame(carousel= null, frame = 0) {
            if (!carousel) { return; }

            const carouselInner = carousel.getElementsByClassName("inner")[0];

            if (!carouselInner) { return; }

            var carouselItemWidth = 0;
            const carsouselItems = carousel.getElementsByClassName("item");
            const tabItems = carousel.getElementsByClassName("naigationTab");

            for (var a = 0; a < carsouselItems.length; a++) {
                if (carsouselItems[a].classList.contains("active")) {
                    carouselItemWidth = carsouselItems[a].clientWidth + 20; //px
                }
                
                carsouselItems[a].classList.remove("active");
            }

            for (var a = 0; a < tabItems.length; a++) {
                tabItems[a].classList.remove("active");
            }

            const transformXValue = frame * carouselItemWidth; //px

            carouselInner.style.transform = "translateX(-" + ( transformXValue ) + "px)";
            carsouselItems[frame].classList.add("active");
            tabItems[frame].classList.add("active");

            const leftButton = carousel.getElementsByClassName("carouselButton left")[0];

            if (frame == 0) {
                leftButton.classList.remove("active");

            } else {
                leftButton.classList.add("active");
            }

            return;
        }

        function autoFeedShiftCarousels() {
            const carousels = document.getElementsByClassName("FeedCarousel");

            for (var a = 0; a < carousels.length; a++) {
                const autoShift = carousels[a].getAttribute("data-autoShift");

                if (autoShift == "true") {
                    const carouselInner = carousels[a].getElementsByClassName("inner")[0];

                    if (carouselInner) {  shiftFeedCarouselRight(carouselInner); }
                }
            }

            return;
        }

        function stopFeedCarouselAutoShift(eventTarget = null) {
            if (!eventTarget) { return; }

            const carousel = eventTarget.closest(".FeedCarousel");

            if (!carousel) { return; }

            carousel.setAttribute("data-autoShift", "false");

            return;
        }

        const feedCarouselAutoShiftInterval = setInterval(stopFeedCarouselAutoShift, 3000);
        function stopCarouselAutoShiftInterval() {
            clearInterval(feedCarouselAutoShiftInterval);
            
            return;
        }

        function doOnloadFunctions() {
            handleFeedCarouselLeftButtonPosition();
            handleFeedCarouselRightButtonPosition();

            return;
        }

        function doOnResizeFunctions() {
            handleFeedCarouselLeftButtonPosition();
            handleFeedCarouselRightButtonPosition();

            return;
        }

        window.addEventListener("load", doOnloadFunctions);
        window.addEventListener("resize", doOnResizeFunctions);
    </script>

    <style>
        section.FeedCarousel {
            padding: 0 20px;
        }
        section.FeedCarousel > .outer {
            max-width: 1320px;
            margin: 0 auto;
            position: relative;
        }
        section.FeedCarousel > .outer > button.carouselButton {
            position: absolute;
            top: 50%;
            transform: translate(0, -50%);
            padding: 10px;
            background-color: #000;
            z-index: 10;
            opacity: 0;
            transition: opacity 200ms ease;
        }
        section.FeedCarousel > .outer > button.carouselButton.active {
            opacity: 1;
        }
        section.FeedCarousel > .outer > button.carouselButton.left {
            transform: translate(0, -50%) rotate(180deg);
        }
        section.FeedCarousel > .outer > .inner {
            display: -ms-grid;
            display: grid;
            grid-gap: 20px;
            align-content: center;
            justify-content: start;
            align-items: start;
            transition: transform 200ms ease;
        }
        section.FeedCarousel > .outer > .inner > .item {
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            width: calc((1310px - 30px) / 2);
            opacity: 0.6;
            transition: opacity 200ms ease;
            position: relative;
        }
        section.FeedCarousel > .outer > .inner > .item.active,
        section.FeedCarousel > .outer > .inner > .item.active + .item,
        section.FeedCarousel > .outer > .inner > .item.active + .item + .item {
            opacity: 1;
        }

        section.FeedCarousel > .outer > .inner > .item > .article {
            position: relative;
        }
        section.FeedCarousel > .outer > .inner > .item > .article > a {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 2;
        }
        section.FeedCarousel > .outer > .inner > .item > .article > .inner {
            display: grid;
            grid-gap: 1rem;
            grid-template-columns: 1fr;
            align-content: center;
            justify-content: start;
            align-items: center;
            grid-template-areas:
                "image image"
                "title title"
                "taxonomies readTime";
        }

        section.FeedCarousel > .outer > .inner > .item > .article > .inner > .background {
            grid-area: image;
            width: 100%;
            aspect-ratio: 16 / 9;
            background-position: center center;
            background-size: cover;
            background-repeat: no-repeat;
        }
        section.FeedCarousel > .outer > .inner > .item > .article > .inner > h6 {
            grid-area: title;
            font-family: 'Univers LT Roman';
            font-size: 30px;
            line-height: 1.1;
            letter-spacing: 0;
            font-weight: bold;
            margin-bottom: 1rem;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
        }
        section.FeedCarousel > .outer > .inner > .item > .article > .inner > .taxonomyContainer {
            grid-area: taxonomies;
            margin-left: 0;
        }
        section.FeedCarousel > .outer > .inner > .item > .article > .inner > .taxonomyContainer > .taxonomy {
            display: inline-block;
            vertical-align: middle;
            width: auto;
            cursor: pointer;
            border: 1px solid #727272;
            border-radius: 5px;
            margin: 0 1em 1em 0;
            transition: border 200ms ease;
            position: relative;
            z-index: 3;
        }
        section.FeedCarousel > .outer > .inner > .item > .article > .inner > .taxonomyContainer > .taxonomy:hover {
            border-color: #EBEBEB;
        }
        section.FeedCarousel > .outer > .inner > .item > .article > .inner > .taxonomyContainer > .taxonomy > p {
            font-family: 'Univers LT Roman';
            font-size: 13px;
            line-height: 1.1;
            letter-spacing: 0;
            color: #727272;
            padding: 1em;
            text-transform: uppercase;
            transition: color 200ms ease;
            position: relative;
        }
        section.FeedCarousel > .outer > .inner > .item > .article > .inner > .taxonomyContainer > .taxonomy:hover > p {
            color: #EBEBEB;
        }
        section.FeedCarousel > .outer > .inner > .item > .article > .inner > .readTimeContainer {
            grid-area: readTime;
        }
        section.FeedCarousel > .outer > .inner > .item > .article > .inner > .readTimeContainer > p {
            font-family: 'Univers LT Roman';
            font-size: 13px;
            line-height: 1.1;
            letter-spacing: 0;
            color: #727272;
            text-align: right;
        }
        section.FeedCarousel  > .tabContainer {
            display: -ms-grid;
            display: grid;
            align-content: center;
            justify-content: center;
            align-items: center;
            grid-gap: 10px;
            margin-top: 30px;
        }
        section.FeedCarousel  > .tabContainer > .naigationTab {
            width: 20px;
            height: 5px;
            background: #000;
            border-radius: 10px;
            opacity: 0.4;
            transition: opacity 200ms ease;
            cursor: pointer;
        }
        section.FeedCarousel  > .tabContainer > .naigationTab.active {
            opacity: 1;

        }

        @media (max-width: 1200px) {
            section.FeedCarousel > .outer > .inner > .item.active + .item + .item {
                opacity: 0.6;
            }
        }

        @media (max-width: 1080px) {
            section.FeedCarousel {
                padding: 0 20px;
            }
        }


        @media (max-width: 800px) {
            section.FeedCarousel > .outer > .inner > .item.active + .item {
                opacity: 0.6;
            }
        }

        @media (max-width: 600px) {
            section.FeedCarousel > .outer > .inner > .item {
                width: 280px;
            }
        }
    </style>