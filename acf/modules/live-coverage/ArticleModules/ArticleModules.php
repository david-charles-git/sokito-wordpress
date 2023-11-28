<?php
$hidden = get_sub_field("hide");

if (!$hidden) {
    $articleID = get_the_ID();
    $type = get_sub_field("moduleType");

    if ($type == "intro") {
        while (have_rows("introModuleGroup")) {
            the_row();

            $introModuleData = array();
            $heading = get_sub_field("heading");
            $introType = get_sub_field("introType");
            $imageSource = get_sub_field("image_src");
            $imageAlt = get_sub_field("image_alt");
            $videoType = get_sub_field("videoType");
            $videoSource = get_sub_field("videoSource");
            $videoThumbnail = get_sub_field("videoThumbnail");
            $embedURL = get_sub_field("embedURL");

            $introModuleData["heading"] = $heading;
            $introModuleData["introType"] = $introType;
            $introModuleData["imageSource"] = $imageSource;
            $introModuleData["imageAlt"] = $imageAlt;
            $introModuleData["videoType"] = $videoType;
            $introModuleData["videoSource"] = $videoSource;
            $introModuleData["videoThumbnail"] = $videoThumbnail;
            $introModuleData["embedURL"] = $embedURL;
        }
    } else if ($type == "text") {
        while (have_rows("textModuleGroup")) {
            the_row();

            $textModuleData = array();
            $heading = get_sub_field("heading");
            $body = get_sub_field("body");
            $hasReadMore = get_sub_field("hasReadMore");
            $readMoreDesktop = get_sub_field("readMoreDesktop");
            $readMoreTablet = get_sub_field("readMoreTablet");
            $readMoreMobile = get_sub_field("readMoreMobile");

            $textModuleData["heading"] = $heading;
            $textModuleData["body"] = $body;
            $textModuleData["hasReadMore"] = $hasReadMore;
            $textModuleData["readMoreDesktop"] = $readMoreDesktop;
            $textModuleData["readMoreTablet"] = $readMoreTablet;
            $textModuleData["readMoreMobile"] = $readMoreMobile;
        }
    } else if ($type == "quote") {
        while (have_rows("quoteModuleGroup")) {
            the_row();

            $quoteModuleData = array();
            $heading = get_sub_field("heading");
            $quote = get_sub_field("quote");
            $author = get_sub_field("author");

            $quoteModuleData["heading"] = $heading;
            $quoteModuleData["quote"] = $quote;
            $quoteModuleData["author"] = $author;
        }
    } else if ($type == "image") {
        while (have_rows("imageModuleGroup")) {
            the_row();

            $imageModuleData = array();
            $imageSource = get_sub_field("image_src");
            $imageAlt = get_sub_field("image_alt");

            $imageModuleData["imageSource"] = $imageSource;
            $imageModuleData["imageAlt"] = $imageAlt;
        }
    } else if ($type == "video") {
        while (have_rows("videoModuleGroup")) {
            the_row();

            $videoModuleData = array();
            $videoType = get_sub_field("videoType");
            $videoSource = get_sub_field("videoSource");
            $videoThumbnail = get_sub_field("videoThumbnail");
            $embedURL = get_sub_field("embedURL");

            $videoModuleData["videoType"] = $videoType;
            $videoModuleData["videoSource"] = $videoSource;
            $videoModuleData["videoThumbnail"] = $videoThumbnail;
            $videoModuleData["embedURL"] = $embedURL;
        }
    }
?>
    <section class="ArticleModule <?php echo $type; ?>">
        <div class="outer">
            <div class="inner">
                <?php
                if ($type == "intro") {
                ?>
                    <div class="left">
                        <?php
                        if ($introModuleData["heading"]) {
                        ?>
                            <h2><?php echo $introModuleData["heading"]; ?></h2>
                        <?php
                        }

                        get_template_part('acf/modules/live-coverage/Buttons/shareButton');
                        ?>
                    </div>

                    <div class="right">
                        <?php
                        if ($introModuleData["introType"] == "image") {
                            if ($introModuleData["imageSource"]) {
                        ?>
                                <div class="imageContainer">
                                    <img src="<?php echo $introModuleData["imageSource"]; ?>" alt="<?php echo $introModuleData["imageAlt"]; ?>" />
                                </div>
                                <?php
                            }
                        } else if ($introModuleData["introType"] == "video") {
                            if ($introModuleData["videoType"] == "hosted") {
                                if ($introModuleData["videoSource"]) {
                                ?>
                                    <div class="videoContainer">
                                        <video data-playPause="play">
                                            <source src="<?php echo $introModuleData["videoSource"]; ?>" />
                                        </video>

                                        <div class="thumbnail" style="background-image: url(<?php echo $introModuleData["videoThumbnail"]; ?>);" onclick="handlePlayPauseVideo()">
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
                            } else if ($introModuleData["videoType"] == "embeded") {
                                if ($introModuleData["embedURL"]) {
                                ?>
                                    <div class="iframeContainer">
                                        <iframe src="<?php echo $introModuleData["embedURL"]; ?>"></iframe>
                                    </div>
                        <?php
                                }
                            }
                        }
                        ?>
                    </div>
                <?php
                } else if ($type == "text") {
                ?>
                    <div class="left">
                        <?php
                        if ($textModuleData["heading"]) {
                        ?>
                            <h3><?php echo $textModuleData["heading"]; ?></h3>
                        <?php
                        }
                        ?>
                    </div>

                    <div class="right">
                        <?php
                        if ($textModuleData["body"]) {
                            if ($textModuleData["hasReadMore"]) {
                                $readMoreArgs = array(
                                    'content' => $textModuleData["body"],
                                    'readMoreDesktop' => $textModuleData["readMoreDesktop"],
                                    'readMoreTablet' => $textModuleData["readMoreTablet"],
                                    'readMoreMobile' => $textModuleData["readMoreMobile"],
                                );

                                doReadMore($readMoreArgs); //found in functions

                            } else {
                        ?>
                                <p><?php echo $textModuleData["body"]; ?></p>
                        <?php
                            }
                        }
                        ?>
                    </div>
                <?php
                } else if ($type == "quote") {
                ?>
                    <div class="left">
                        <?php
                        if ($quoteModuleData["heading"]) {
                        ?>
                            <h3><?php echo $quoteModuleData["heading"]; ?> </h3>
                        <?php
                        }
                        ?>
                    </div>

                    <div class="right">
                        <?php
                        if ($quoteModuleData["quote"]) {
                        ?>
                            <p><?php echo $quoteModuleData["quote"]; ?></p>
                        <?php
                        }

                        if ($quoteModuleData["author"]) {
                        ?>
                            <p><?php echo $quoteModuleData["author"]; ?></p>
                        <?php
                        }
                        ?>
                    </div>
                <?php
                } else if ($type == "image") {
                ?>
                    <div class="left"></div>

                    <div class="right">
                        <?php
                        if ($imageModuleData["imageSource"]) {
                        ?>
                            <div class="imageContainer">
                                <img src="<?php echo $imageModuleData["imageSource"]; ?>" alt="<?php echo $imageModuleData["imageAlt"]; ?>" />
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                <?php
                } else if ($type == "video") {
                ?>
                    <div class="left"></div>

                    <div class="right">
                        <?php
                        if ($videoModuleData["videoType"] == "hosted") {
                        ?>
                            <div class="videoContainer">
                                <video data-playPause="play">
                                    <source src="<?php echo $videoModuleData["videoSource"]; ?>" />
                                </video>

                                <div class="thumbnail" style="background-image: url(<?php echo $videoModuleData["videoThumbnail"]; ?>" onclick="handlePlayPauseVideo()">
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
                        } else if ($videoModuleData["videoType"] == "embeded") {
                        ?>
                            <div class="iframeContainer">
                                <iframe src="<?php echo $videoModuleData["embedURL"]; ?>"></iframe>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>
<?php
}
