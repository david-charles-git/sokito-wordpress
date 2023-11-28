<?php
if (!defined('ABSPATH')) {
    exit;
}

$hideSection = get_sub_field('hide');
$backgroundImageSource = get_sub_field('backgroundImage_source');
$backgroundColor = get_sub_field('backgroundColor');
$leftColumnType = get_sub_field('leftColumnType');
$rightColumnType = get_sub_field('rightColumnType');

if (!$hideSection) {
?>
    <section class='TwoColumn'>
        <div class='background' style='background-color: <?php echo $backgroundColor; ?>'></div>
        <?php
        if ($backgroundImageSource) {
        ?>
            <div class="backgroundImage" style="background-image: url(<?php echo $backgroundImageSource; ?>)"></div>
        <?php
        }
        ?>
        <div class="inner grid">
            <div class='left'>
                <div class='inner <?php echo $leftColumnType; ?>'>
                    <?php
                    if ($leftColumnType == 'text' && have_rows('leftColumnTextGroup')) {
                        while (have_rows('leftColumnTextGroup')) {
                            the_row();

                            $leftTextTitle = get_sub_field('title');
                            $leftTextContent = get_sub_field('content');
                            $leftTextCtaHref = get_sub_field('ctaLink');
                            $leftTextCtaText = get_sub_field('ctaText');
                    ?>
                            <h2><?php echo $leftTextTitle; ?></h2>
                            <p><?php echo $leftTextContent; ?></p>
                            <button class="roundedButton">
                                <a href="<?php echo $leftTextCtaHref; ?>"><?php echo $leftTextCtaText; ?></a>
                            </button>
                        <?php
                        }
                    } else if ($leftColumnType == 'image' && have_rows('leftColumnImageGroup')) {
                        while (have_rows('leftColumnImageGroup')) {
                            the_row();

                            $leftImageSource = get_sub_field('imageSource');
                            $leftImageAlt = get_sub_field('imageAlt');
                        ?>
                            <div class='imageContainer'>
                                <img src="<?php echo $leftImageSource; ?>" alt="<?php echo $leftImageAlt; ?>">
                            </div>
                        <?php
                        }
                    } else if ($leftColumnType == 'video' && have_rows('leftColumnVideoGroup')) {
                        while (have_rows('leftColumnVideoGroup')) {
                            the_row();

                            $leftVideoSource = get_sub_field('videoSource');
                            $leftVideoAlt = get_sub_field('videoAlt');
                            $leftVideoThumbSource = get_sub_field('thumbnailSource');
                            $leftVideoThumbAlt = get_sub_field('thumbnailAlt');
                        ?>
                            <div class='videoContainer'>
                                <div class="videoThumb" onclick='handleVideoTogglePlay()'>
                                    <img src="<?php echo $leftVideoThumbSource; ?>" alt="<?php echo $leftVideoThumbAlt; ?>">
                                </div>

                                <video src="<?php echo $leftVideoSource; ?>" alt="<?php echo $leftVideoAlt; ?>"></video>
                            </div>
                        <?php
                        }
                    } else if ($leftColumnType == 'list' && have_rows('leftColumnListGroup')) {
                        while (have_rows('leftColumnListGroup')) {
                            the_row();
                        ?>
                            <div class="listContainer">
                                <ul>
                                    <?php
                                    if (have_rows('listItems')) {
                                        while (have_rows('listItems')) {
                                            the_row();

                                            $leftListItemTitle = get_sub_field('title');
                                            $leftListItemContent = get_sub_field('content');
                                            $leftListItemCtaHref = get_sub_field('ctaLink');
                                            $leftListItemCtaText = get_sub_field('ctaText');
                                    ?>
                                            <li>
                                                <h3><?php echo $leftListItemTitle; ?></h3>
                                                <p><?php echo $leftListItemContent; ?></p>
                                                <?php
                                                if ($leftListItemCtaHref && $leftListItemCtaText) {
                                                ?>
                                                        <button class="roundedButton">
                                                            <a href="<?php echo $leftListItemCtaHref; ?>"><?php echo $leftListItemCtaText; ?></a>
                                                        </button>
                                                <?php
                                                }
                                                ?>
                                            </li>
                                    <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>

            <div class='right'>
                <div class='inner <?php echo $rightColumnType; ?>'>
                    <?php
                    if ($rightColumnType == 'text' && have_rows('rightColumnTextGroup')) {
                        while (have_rows('rightColumnTextGroup')) {
                            the_row();

                            $rightTextTitle = get_sub_field('title');
                            $rightTextContent = get_sub_field('content');
                            $rightTextCtaHref = get_sub_field('ctaLink');
                            $rightTextCtaText = get_sub_field('ctaText');
                    ?>
                            <h2><?php echo $rightTextTitle; ?></h2>
                            <p><?php echo $rightTextContent; ?></p>
                            <button class="roundedButton">
                                <a href="<?php echo $rightTextCtaHref; ?>"><?php echo $rightTextCtaText; ?></a>
                            </button>
                        <?php
                        }
                    } else if ($rightColumnType == 'image' && have_rows('rightColumnImageGroup')) {
                        while (have_rows('rightColumnImageGroup')) {
                            the_row();

                            $rightImageSource = get_sub_field('imageSource');
                            $rightImageAlt = get_sub_field('imageAlt');
                        ?>
                            <div class='imageContainer'>
                                <img src="<?php echo $rightImageSource; ?>" alt="<?php echo $rightImageAlt; ?>">
                            </div>
                        <?php
                        }
                    } else if ($rightColumnType == 'video' && have_rows('rightColumnVideoGroup')) {
                        while (have_rows('rightColumnVideoGroup')) {
                            the_row();

                            $rightVideoSource = get_sub_field('videoSource');
                            $rightVideoAlt = get_sub_field('videoAlt');
                            $rightVideoThumbSource = get_sub_field('thumbnailSource');
                            $rightVideoThumbAlt = get_sub_field('thumbnailAlt');
                        ?>
                            <div class='videoContainer'>
                                <div class="videoThumb" onclick='handleVideoTogglePlay()'>
                                    <img src="<?php echo $rightVideoThumbSource; ?>" alt="<?php echo $rightVideoThumbAlt; ?>">
                                </div>

                                <video src="<?php echo $rightVideoSource; ?>" alt="<?php echo $rightVideoAlt; ?>"></video>
                            </div>
                        <?php
                        }
                    } else if ($rightColumnType == 'list' && have_rows('rightColumnListGroup')) {
                        while (have_rows('rightColumnListGroup')) {
                            the_row();
                        ?>
                            <div class="listContainer">
                                <ul>
                                    <?php
                                    if (have_rows('listItems')) {
                                        while (have_rows('listItems')) {
                                            the_row();

                                            $rightListItemTitle = get_sub_field('title');
                                            $rightListItemContent = get_sub_field('content');
                                            $rightListItemCtaHref = get_sub_field('ctaLink');
                                            $rightListItemCtaText = get_sub_field('ctaText');
                                    ?>
                                            <li>
                                                <h3><?php echo $rightListItemTitle; ?></h3>
                                                <p><?php echo $rightListItemContent; ?></p>
                                                <?php
                                                if ($rightListItemCtaHref && $rightListItemCtaText) {
                                                    ?>
                                                                                                    <button class="roundedButton">
                                                    <a href="<?php echo $rightListItemCtaHref; ?>"><?php echo $rightListItemCtaText; ?></a>
                                                </button>
                                                <?php
                                                }
                                                ?>
                                            </li>
                                    <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <style>
        .grid {
            display: grid;
            grid-template-columns: 1fr;
            grid-gap: 0px;
            align-items: center;
            align-content: center;
            justify-content: center;
        }

        .clrWhite {
            color: #fff;
        }

        .clrBlack {
            color: #000;
        }

        .clrOrange {
            color: #fc4f00;
        }

        .strokeText {
            font-family: GZAOutline;
        }

        .TwoColumn {
            padding: 0 50px;
            position: relative;
        }

        .TwoColumn>.background,
        .TwoColumn>.backgroundImage {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
        }

        .TwoColumn>.inner {
            grid-template-columns: repeat(2, 1fr);
            grid-template-areas: 'left right';
            grid-gap: 50px;
            max-width: 1920px;
            margin: 0 auto;
            position: relative;
        }

        .TwoColumn>.inner>.left {
            grid-area: left;
            height: 100%;
        }

        .TwoColumn>.inner>.right {
            grid-area: right;
            height: 100%;
        }

        .TwoColumn>.inner>.left>.inner.text,
        .TwoColumn>.inner>.right>.inner.text {
            padding: 50px 0;
            max-width: 600px;
        }

        .TwoColumn>.inner>.left>.inner.text {
            margin-right: 0;
            margin-left: auto;
        }

        .TwoColumn>.inner>.left>.inner.text>h2,
        .TwoColumn>.inner>.right>.inner.text>h2 {
            font-size: 70px;
            font-family: Gza;
            line-height: 1.2;
            letter-spacing: .01em;
            color: #FC4F00;
            font-weight: 400;
            display: inline-block;
            margin: 0;
        }

        .TwoColumn>.inner>.left>.inner.text>p,
        .TwoColumn>.inner>.right>.inner.text>p {
            margin-top: 50px;
            font-size: 18px;
            line-height: 1.1;
            letter-spacing: .01em;
            font-family: "Univers LT Roman";
            color: #000;
        }

        .TwoColumn>.inner>.left>.inner.text>button,
        .TwoColumn>.inner>.right>.inner.text>button {
            background-color: #fc4f00;
            border-color: #fc4f00;
            transition: background .2s ease, opacity .2s ease, border .2s ease, color .2s ease;
            min-width: 250px;
            margin-top: 50px;
        }

        .TwoColumn>.inner>.left>.inner.text>button:hover,
        .TwoColumn>.inner>.right>.inner.text>button:hover {
            background-color: #e24700;
            border-color: #e24700;
        }

        .TwoColumn>.inner>.left>.inner.text>button>a,
        .TwoColumn>.inner>.right>.inner.text>button>a {
            color: #fff;
        }

        .TwoColumn>.inner>.left>.inner.image,
        .TwoColumn>.inner>.right>.inner.image {
            height: 100%;
            opacity: unset;
            background: unset;
            transition: unset;
            min-height: 500px;
        }

        .TwoColumn>.inner>.left>.inner.image>.imageContainer,
        .TwoColumn>.inner>.right>.inner.image>.imageContainer {
            position: relative;
            height: 100%;
        }

        .TwoColumn>.inner>.left>.inner.image>.imageContainer>picture,
        .TwoColumn>.inner>.right>.inner.image>.imageContainer>picture {
            translate: -50px 0;
            left: 0;
            top: 0;
            width: calc(100% + 50px);
            overflow: hidden;
            min-height: 100%;
            min-width: 100%;
            position: absolute;
        }

        .TwoColumn>.inner>.right>.inner.image>.imageContainer>picture {
            translate: 0;
        }

        .TwoColumn>.inner>.left>.inner.image>.imageContainer>img,
        .TwoColumn>.inner>.right>.inner.image>.imageContainer>img,
        .TwoColumn>.inner>.left>.inner.image>.imageContainer>picture>img,
        .TwoColumn>.inner>.right>.inner.image>.imageContainer>picture>img {
            position: absolute;
            translate: -50% -50%;
            left: 50%;
            top: 50%;
            width: 100%;
        }

        .TwoColumn>.inner>.left>.inner.video,
        .TwoColumn>.inner>.right>.inner.video {}

        .TwoColumn>.inner>.left>.inner.video>.videoContainer,
        .TwoColumn>.inner>.right>.inner.video>.videoContainer {}

        .TwoColumn>.inner>.left>.inner.video>.videoContainer>.videoThumb,
        .TwoColumn>.inner>.right>.inner.video>.videoContainer>.videoThumb {}

        .TwoColumn>.inner>.left>.inner.video>.videoContainer>.videoThumb>img,
        .TwoColumn>.inner>.right>.inner.video>.videoContainer>.videoThumb>img {}

        .TwoColumn>.inner>.left>.inner.video>.videoContainer>video,
        .TwoColumn>.inner>.right>.inner.video>.videoContainer>video {}

        .TwoColumn>.inner>.left>.inner.list,
        .TwoColumn>.inner>.right>.inner.list {
            max-width: 600px;
        }

        .TwoColumn>.inner>.left>.inner.list>.listContainer,
        .TwoColumn>.inner>.right>.inner.list>.listContainer {
            padding: 50px 0;
        }

        .TwoColumn>.inner>.left>.inner.list>.listContainer>ul,
        .TwoColumn>.inner>.right>.inner.list>.listContainer>ul {
            padding: 0;
            margin: 0;
            list-style: none;
        }

        .TwoColumn>.inner>.left>.inner.list>.listContainer>ul>li,
        .TwoColumn>.inner>.right>.inner.list>.listContainer>ul>li {
            margin-bottom: 50px;
        }

        .TwoColumn>.inner>.left>.inner.list>.listContainer>ul>li:nth-last-child(1),
        .TwoColumn>.inner>.right>.inner.list>.listContainer>ul>li:nth-last-child(1) {
            margin-bottom: 0px;
        }

        .TwoColumn>.inner>.left>.inner.list>.listContainer>ul>li>h3,
        .TwoColumn>.inner>.right>.inner.list>.listContainer>ul>li>h3 {
            margin: 0px;
            font-size: 48px;
            color: #000;
            font-family: Extenda40;
            letter-spacing: .01em;
            font-weight: 400;
            line-height: 1;
        }

        .TwoColumn>.inner>.left>.inner.list>.listContainer>ul>li>p,
        .TwoColumn>.inner>.right>.inner.list>.listContainer>ul>li>p {
            margin-top: 20px;
            font-size: 18px;
            line-height: 1.1;
            letter-spacing: .01em;
            font-family: "Univers LT Roman";
            color: #000;
        }

        .TwoColumn>.inner>.left>.inner.list>.listContainer>ul>li>button,
        .TwoColumn>.inner>.right>.inner.list>.listContainer>ul>li>button {
            background-color: #fc4f00;
            border-color: #fc4f00;
            transition: background .2s ease, opacity .2s ease, border .2s ease, color .2s ease;
            min-width: 250px;
            margin-top: 20px;
        }

        .TwoColumn>.inner>.left>.inner.list>.listContainer>ul>li>button:hover,
        .TwoColumn>.inner>.right>.inner.list>.listContainer>ul>li>button:hover {
            background-color: #e24700;
            border-color: #e24700;
        }

        .TwoColumn>.inner>.left>.inner.list>.listContainer>ul>li>button>a,
        .TwoColumn>.inner>.right>.inner.list>.listContainer>ul>li>button>a {
            color: #fff;
        }

        @media (max-width: 1080px) {}

        @media (max-width: 880px) {
            .TwoColumn {
                padding: 0 20px;
            }

            .TwoColumn>.inner {
                grid-template-columns: 1fr;
                grid-template-areas: 'left' 'right';
            }

            .TwoColumn>.inner>.left>.inner.image,
            .TwoColumn>.inner>.right>.inner.image {
                min-height: 400px;
            }

            .TwoColumn>.inner>.right {}

            .TwoColumn>.inner>.left>.inner.list>.listContainer,
            .TwoColumn>.inner>.right>.inner.list>.listContainer {
                padding: 0;
            }
        }

        @media (max-width: 580px) {

            .TwoColumn>.inner>.left>.inner.image,
            .TwoColumn>.inner>.right>.inner.image {
                min-height: 300px;
            }
        }
    </style>

    <script>
        function playVideo(video = null) {
            if (!video) return;

            video.play();
        }

        function pauseVideo(video = null) {
            if (!video) return;

            video.pause();
        }

        function handleVideoTogglePlay() {
            const eventTarget = event.currentTarget || event.target;

            if (!eventTarget) return;

            const videoContainer = eventTarget.closest('.videoContainer');

            if (!videoContainer) return;

            const video = videoContainer.getElementsByTagName('video')[0];

            if (!video) return;

            if (video.paused) {
                playVideo(video);
                return;
            }

            pauseVideo(video);
        }
    </script>
<?php
}
