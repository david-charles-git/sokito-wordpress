<?php
if (!defined('ABSPATH')) {
    exit;
}

$hideSection = get_sub_field('hide');
$backgroundImageSource = get_sub_field('backgroundImage_source');
$backgroundColor = get_sub_field('backgroundColor');
$title = get_sub_field('title');
$content = get_sub_field('content');
$ctaContent = get_sub_field('ctaText');
$ctaHref = get_sub_field('ctaLink');

if (!$hideSection) {
?>
    <section class='TextBanner v1'>
        <div class='background' style='background-color: <?php echo $backgroundColor; ?>'></div>
        <?php
        if ($backgroundImageSource) {
        ?>
            <div class="backgroundImage" style="background-image: url(<?php echo $backgroundImageSource; ?>)"></div>
        <?php
        }
        ?>
        <div class="inner">
            <?php
            if ($title) {
            ?>
                <h3><?php echo $title; ?></h3>
            <?php
            }

            if ($content) {
            ?>
                <div class="content"><?php echo $content; ?></div>
            <?php
            }

            if ($ctaContent && $ctaHref) {
            ?>
                <button class="roundedButton">
                    <a href="<?php echo $ctaHref; ?>"><?php echo $ctaContent; ?></a>
                </button>
            <?php
            }
            ?>
        </div>
    </section>

    <style>
        .TextBanner.v1 {
            position: relative;
            padding: 0 50px;
        }

        .TextBanner.v1>.background,
        .TextBanner.v1>.backgroundImage {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
        }

        .TextBanner.v1>.inner {
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
            padding: 50px 0;
            position: relative;
            text-align: center;
        }

        .TextBanner.v1>.inner>h3 {
            font-size: 34px;
            font-family: Gza;
            line-height: 1.2;
            letter-spacing: .01em;
            color: #FC4F00;
            font-weight: 400;
            display: inline-block;
            margin: 0;
        }

        .TextBanner.v1>.inner>.content {
            margin-top: 20px;
            font-size: 18px;
            line-height: 1.1;
            letter-spacing: .01em;
            font-family: "Univers LT Roman";
            color: #000;
        }

        .TextBanner.v1>.inner>.content>a {
            font-weight: 700;
            transition: color .2s ease;
        }

        .TextBanner.v1>.inner>.content>a:hover {
            color: #fc4f00;
        }

        .TextBanner.v1>.inner>button,
        .TextBanner.v1>.inner>button {
            background-color: #fc4f00;
            border-color: #fc4f00;
            transition: background .2s ease, opacity .2s ease, border .2s ease, color .2s ease;
            min-width: 250px;
            margin-top: 20px;
        }

        .TextBanner.v1>.inner>button:hover,
        .TextBanner.v1>.inner>button:hover {
            background-color: #e24700;
            border-color: #e24700;
        }

        .TextBanner.v1>.inner>button>a,
        .TextBanner.v1>.inner>button>a {
            color: #fff;
        }

        @media (max-width: 1080px) {
            .TextBanner.v1 {
                padding: 0 20px;
            }
        }
    </style>

    <script>

    </script>
<?php
}
