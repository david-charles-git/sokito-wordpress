<?php
if (!defined('ABSPATH')) {
    exit;
}

$hideSection = get_sub_field('hide');
$backgroundImageSource = get_sub_field('backgroundImage_source');
$backgroundColor = get_sub_field('backgroundColor');
$title = get_sub_field('title');
$ctaContent = get_sub_field('ctaText');
$ctaHref = get_sub_field('ctaLink');

if (!$hideSection) {
?>
    <section class="TextBanner v2 hasEnterExit">
        <div class="background" style="background-color: <?php echo $backgroundColor; ?>"></div>

        <div class="outer">
            <div class="inner grid">
                <?php
                if ($backgroundImageSource) {
                ?>
                    <div class="backgroundImage" style="background-image: url(<?php echo $backgroundImageSource; ?>)"></div>
                <?php
                }
                ?>
                <div class="container">
                    <div class="content">
                        <?php
                        if ($title) {
                        ?>
                            <h3 class="enterExitItem" data-enter-exit-type="both" data-enter-exit-offset-y="200" data-enter-exit-delay="0">
                                <?php echo $title; ?>
                            </h3>
                        <?php
                        }
                        ?>
                    </div>
                    <?php
                    if ($ctaContent && $ctaHref) {
                    ?>
                        <button class="roundedButton light">
                            <a href="<?php echo $ctaHref; ?>"><?php echo $ctaContent; ?></a>
                        </button>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <style>
        .TextBanner.v2 {
            position: relative;
            background-color: #fff;
        }

        .TextBanner.v2>.background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 50%;
        }

        .TextBanner.v2>.outer {
            position: relative;
            max-width: 1920px;
            margin: 0 auto;
            padding: 0 50px;
            text-align: center;
        }

        .TextBanner.v2>.outer>.inner {
            padding: 50px 0;
            margin: 0 auto;
            position: relative;
            background-color: #000;
            min-height: 450px;
        }

        .TextBanner.v2>.outer>.inner>.backgroundImage {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
        }

        .TextBanner.v2>.outer>.inner>.container {}

        .TextBanner.v2>.outer>.inner>.container>.content {}

        .TextBanner.v2>.outer>.inner>.container>.content>h3 {
            font-size: 80px;
            font-family: Extenda40;
            line-height: 1;
            letter-spacing: .1em;
            color: #fff;
            font-weight: 400;
            margin: 0 auto 50px;
            max-width: 800px;
            position: relative;
        }

        .TextBanner.v2>.outer>.inner>.container>button {
            border: 1px solid #000;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background: none;
            border-radius: 30px;
            min-width: 150px;
            transition: background 200ms ease, opacity 200ms ease;
            padding: 0;
            cursor: pointer;
            opacity: 1;
            position: relative;
            background-color: #fff;
            border: none;
        }

        .TextBanner.v2>.outer>.inner>.container>button:hover {
            background-color: #000;
            background-color: #000;
        }

        .TextBanner.v2>.outer>.inner>.container>button>a {
            opacity: 1;
            padding: 1em;
            font-size: 16px;
            line-height: 1.1;
            letter-spacing: 0.01em;
            font-family: 'Gza';
            display: block;
            transition: color 200ms ease, opacity 200ms ease;
            position: relative;
            color: #000;
        }

        .TextBanner.v2>.outer>.inner>.container>button:hover>a {
            color: #fff;
        }

        @media (max-width: 1080px) {
            .TextBanner.v2>.outer {
                padding: 0 20px;
            }
        }

        @media (max-width: 680px) {
            .TextBanner.v2>.outer {
                padding: 0;
            }

            .TextBanner.v2>.outer>.inner>.container>.content>h3 {
                font-size: 60px;
            }
        }
    </style>

    <script>

    </script>
<?php
}
