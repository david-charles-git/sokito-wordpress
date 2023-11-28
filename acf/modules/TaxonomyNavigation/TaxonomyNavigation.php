<?php
    if (!defined( 'ABSPATH' )) { exit; }

    $postID = get_the_ID();
    $backgroundImage = "http://13.40.63.227/wp-content/themes/sokito/assets/images/liveCoveragesArticles-backgroundIamge.png"; //get_sub_field("backgroundImage");
    $taxonomy = "articleType"; //get_sub_field("taxonomy");
    $taxonomyTerms = get_terms($taxonomy);
?>
    <section class="TaxonomyNavigation">
        <div class="stickyContainer">
            <div class="background" style="background-image: url(<?php echo $backgroundImage; ?>);"></div>

            <div class="outer">
                <div class="inner">
                    <nav style="grid-template-columns: repeat(<?php echo count($taxonomyTerms); ?>, auto);">
<?php
                        for ($a = 0; $a < count($taxonomyTerms); $a++) {
                            $name = $taxonomyTerms[$a] -> name;
                            $slug = $taxonomyTerms[$a] -> slug;
                            $permalink = get_the_permalink($postID) . $slug;
?>
                            <button class="roundedButton light">
                                <a href="<?php echo $permalink; ?>"><?php echo $name; ?></a>
                            </button>
<?php
                        }
?>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <script>
        function setTaxonomyNavigationPaddingLeft() {
            const TaxonomyNavigations = document.getElementsByClassName("TaxonomyNavigation");

            for (var a = 0; a < TaxonomyNavigations.length; a++) {
                const navContainer = TaxonomyNavigations[a].getElementsByTagName("NAV")[0];

                if (!navContainer) { break; }

                const windowWidth = window.innerWidth; //px
                const mobileScreenBreak = 1080; //px
                const minPadding = windowWidth <= mobileScreenBreak ? 20 : 50; //px
                const maxWidth = 1320; //px
                const navContainerPaddingLeft = ((windowWidth - maxWidth) / 2) > minPadding ? ((windowWidth - maxWidth) / 2) : minPadding; //px

                navContainer.style.paddingLeft = navContainerPaddingLeft + "px";
            }

            return;
        }
        function toggleTaxonomyNavigationIsFixed() {
            const TaxonomyNavigations = document.getElementsByClassName("TaxonomyNavigation");

            for (var a = 0; a < TaxonomyNavigations.length; a++) {
                const distanceToTopOfPage = window.pageYOffset + TaxonomyNavigations[a].getBoundingClientRect().top; //px
                const windowScrollY = window.scrollY; //px

                if (distanceToTopOfPage < windowScrollY) {
                    TaxonomyNavigations[a].classList.add("fixed");

                } else {
                    TaxonomyNavigations[a].classList.remove("fixed");
                }
            }

            return;
        }
        
        function TaxonomyNavigationOnLoadListener() {
            setTaxonomyNavigationPaddingLeft()

            return;
        }
        function TaxonomyNavigationOnResizeListener()  {
            setTaxonomyNavigationPaddingLeft()

            return;
        }
        function TaxonomyNavigationOnScrollListener() {
            toggleTaxonomyNavigationIsFixed();

            return;
        }

        window.addEventListener("load", TaxonomyNavigationOnLoadListener);
        window.addEventListener("resize", TaxonomyNavigationOnResizeListener);
        window.addEventListener("scroll", TaxonomyNavigationOnScrollListener);
    </script>

    <style>
        .roundedButton {
            border: none;
            appearance: none;
            background: none;
            border-radius: 30px;
            min-width: 150px;
            transition: background 200ms ease;
            padding: 0;
            cursor: pointer;
        }
        .roundedButton > p,
        .roundedButton > a {
            padding: 1em;
            font-size: 16px;
            line-height: 1.1;
            letter-spacing: 0.01em;
            font-family: 'Gza';
            display: block;
            transition: color 200ms ease;
        }
        .roundedButton.light {
            background-color: #fff;
        }
        .roundedButton.light:hover {
            background-color: #000;
        }
        .roundedButton.light > p,
        .roundedButton.light > a {
           color: #000;
        }
        .roundedButton.light:hover > p,
        .roundedButton.light:hover > a {
           color: #fff;
        }


section.TaxonomyNavigation {
    height: 90px;
}
section.TaxonomyNavigation.fixed {
}
section.TaxonomyNavigation > .stickyContainer {
    position: relative;
    background-color: #000;
}
section.TaxonomyNavigation.fixed > .stickyContainer {
    position: fixed;
    width: 100%;
    top: 0;
    left: 0;
    z-index: 11;
}
section.TaxonomyNavigation > .stickyContainer > .background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-position: center center;
    background-size: cover;
    background-repeat: no-repeat;
    opacity: 0.5;
}
section.TaxonomyNavigation > .stickyContainer > .outer {
    padding: 20px 0;
    position: relative;
}
section.TaxonomyNavigation > .stickyContainer > .outer > .inner {
    overflow-x: scroll;
}
section.TaxonomyNavigation > .stickyContainer > .outer > .inner::-webkit-scrollbar {
    display: none;
}
section.TaxonomyNavigation > .stickyContainer > .outer > .inner > nav {
    display: grid;
    grid-gap: 10px;
    align-content: center;
    justify-content: start;
    align-items: center;
    padding: 0 50px;
}

@media (max-width: 1080px) {
    section.TaxonomyNavigation > .stickyContainer > .outer > .inner > nav {
        padding: 0 20px;
    }
}
    </style>