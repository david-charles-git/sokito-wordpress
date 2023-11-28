<?php
if (!defined('ABSPATH')) {
    exit;
}
$hidden = get_sub_field("hide");

if (!$hidden) {
    $videoType = get_sub_field("videoType");
    $videoSource = get_sub_field("videoSource");
    $thumbnailSource = get_sub_field("thumbnailSource");
    $embedURL = get_sub_field("embedURL");
?>
    <section class="VideoModule">
        <div class='inner'>
            <?php
            if ($videoType == "embed") {
            ?>
                <div class="iframeContainer">
                    <iframe src="<?php echo $embedURL; ?>"></iframe>
                </div>
            <?php
            } else if ($videoType == "hosted") {
            ?>
                <div class="videoContainer">
                    <video data-playPause="play">
                        <source src="<?php echo $videoSource; ?>" />
                    </video>

                    <div class="thumbnail" style="background-image: url(<?php echo $thumbnailSource; ?>" onclick="handlePlayPauseVideo()">
                        <div class="playButton">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="159.766" height="159.448" viewBox="0 0 159.766 159.448" style="&#10;    background-color:  rgba(0,0,0,0.3);&#10;    border-radius:  50%;&#10;    overflow:  hidden;&#10;">
                                <g>
                                    <path d="M34.13,59.666q0-14.479-.011-28.956c-.005-1.54.235-2.916,1.689-3.752,1.52-.874,2.864-.342,4.212.523q22.538,14.487,45.1,28.948C88.2,58.41,88.18,61,85.068,63Q62.588,77.431,40.1,91.854c-1.333.857-2.665,1.466-4.21.627s-1.777-2.263-1.773-3.859c.026-9.653.012-19.3.012-28.956m6.722,23.8L77.9,59.694,40.853,35.922Z" transform="translate(25.782 20.033)" fill="#FFFFFF" />
                                </g>
                            </svg>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </section>

    <style>
        .VideoModule {
            padding: 0 50px;
        }

        .VideoModule>.inner {
            max-width: 1300px;
            margin: 0 auto;
        }

        .VideoModule>.inner .videoContainer {
            position: relative
        }

        .VideoModule>.inner .videoContainer video {
            width: 100%;
            -o-object-fit: cover;
            object-fit: cover;
            aspect-ratio: 16/9;
        }

        .VideoModule>.inner .videoContainer .thumbnail {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background-position: center center;
            background-size: cover;
            background-repeat: no-repeat;
            cursor: pointer;
            transition: opacity .2s ease;
            opacity: 1;
        }

        .VideoModule>.inner .videoContainer .thumbnail .playButton {
            position: absolute;
            display: inline-block;
            width: auto;
            height: auto;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .VideoModule>.inner .videoContainer .thumbnail .playButton>svg {
            width: 100px;
            height: 100px;
        }

        .VideoModule>.inner .videoContainer.active .thumbnail {
            opacity: 0;
        }

        @media (max-width: 1088px) {
            .VideoModule {
                padding: 0 20px;
            }

            .VideoModule>.inner .videoContainer .thumbnail .playButton>svg {
                width: 70px;
                height: 70px;
            }
        }
    </style>
<?php
}
