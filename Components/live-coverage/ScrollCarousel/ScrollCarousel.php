<?php
    $hidden = get_sub_field("hide");

    if (!$hidden) {
        $carouselItems = [];

        if (have_rows("carouselItems")) {
            while (have_rows("carouselItems")) {
                the_row();

                $item = array ();
                $itemType = get_sub_field("itemType");

                if ($itemType == "image") {
                    while (have_rows("imageGroup")) {
                        the_row();

                        $imageSource = get_sub_field("image_src");
                        $imageAlt = get_sub_field("image_alt");
                    }

                    $item["imageSource"] = $imageSource;
                    $item["imageAlt"] = $imageAlt;
                    $item["type"] = $itemType;
                    
                    array_push($carouselItems, $item);

                } else if ($itemType == "video") {
                    while (have_rows("videoGroup")) {
                        the_row();

                        $videoType = get_sub_field("videoType");
                        $videoSource = get_sub_field("videoSource");
                        $thumbnailSource = get_sub_field("thumbnailSource");
                        $embedURL = get_sub_field("embedURL");
                    }

                    $item["videoType"] = $videoType;
                    $item["videoSource"] = $videoSource;
                    $item["thumbnail"] = $thumbnailSource;
                    $item["embedURL"] = $embedURL;
                    $item["type"] = $itemType;
                    
                    array_push($carouselItems, $item);
                }
            }
        }
?>
        <section class="ScrollCarousel" data-autoShift="false">
            <button class="ScrollCarouselButton left" onclick="handleScrollCarouselLeftButtonClick()">
                <svg xmlns="http://www.w3.org/2000/svg" width="41.374" height="51.481" viewBox="0 0 41.374 51.481">
                    <path id="arrow-42" d="M806.608,961.045c-2.175-2.156-4.319-4.344-6.539-6.456a34.531,34.531,0,0,0-3.122-2.463,8.958,8.958,0,0,1-2.054-1.823,2.265,2.265,0,0,1-.115-2.559,8.421,8.421,0,0,1,2.047-2.259c1.817-1.491,3.692-2.911,5.509-4.4,1.42-1.164,2.79-2.393,4.178-3.6a6.376,6.376,0,0,0,.64-.64c1.1-1.28,1.28-1.28-.224-2.649-.838-.755-1.689-1.484-2.559-2.207-2.348-1.971-4.709-3.922-7.038-5.9a18.262,18.262,0,0,1-1.792-1.67,2.5,2.5,0,0,1-.051-3.589,15.35,15.35,0,0,1,1.536-1.5c.928-.8,1.881-1.574,2.841-2.335a35.188,35.188,0,0,0,5.918-5.758c1.689-2.15,2.886-2.137,4.767-.192a3.372,3.372,0,0,1,.409.454,20.051,20.051,0,0,0,5.848,5.33,18.062,18.062,0,0,1,2.8,2.374A162.375,162.375,0,0,0,832.8,931.12a17.625,17.625,0,0,1,2.361,2.393,2.344,2.344,0,0,1-.339,3.525q-8.855,7.806-17.729,15.586c-2,1.753-3.973,3.525-5.8,5.458a45.22,45.22,0,0,1-3.436,3.007h-1.228Zm25.3-25.593a1.919,1.919,0,0,0-.288-.531c-.755-.691-1.491-1.4-2.3-2.016a111.12,111.12,0,0,1-10.8-9.514,45.879,45.879,0,0,0-5.829-4.959,16.144,16.144,0,0,1-3.378-3.1l-.75-.866-.472-.5a.864.864,0,0,0-1.337.032,67.646,67.646,0,0,1-7.377,6.9,4.641,4.641,0,0,0-.416.448.736.736,0,0,0,.045,1.088c1.069.947,2.15,1.881,3.237,2.815,2.713,2.329,5.432,4.651,8.132,6.993a14.048,14.048,0,0,1,1.484,1.536,1.28,1.28,0,0,1,.077,1.44,4.007,4.007,0,0,1-.691,1,78.414,78.414,0,0,1-6.565,6.4c-1.919,1.529-3.8,3.1-5.688,4.664-.64.544-.672,1.011,0,1.478a33.909,33.909,0,0,1,4.479,4.14c1.209,1.241,2.514,2.387,3.839,3.551.589.531,1,.5,1.6-.038,2.124-1.919,4.159-3.935,6.366-5.758,5.528-4.543,10.647-9.546,16-14.255a4.233,4.233,0,0,0,.576-.7.741.741,0,0,0,.058-.249Z" transform="translate(-794.437 -909.609)" fill="#FFF"></path>
                </svg>
            </button>

            <div class="outer" data-scrollValue="0">
                <div class="inner" style="grid-template-columns: repeat(<?php echo count($carouselItems); ?>, auto);" <?php /*ontouchstart="handleCarouselTouchStart()" ontouchend="handleCarouselTouchEnd()" ontouchcancel="handleCarouselTouchEnd()"*/ ?>>
<?php
                    for ($a = 0; $a < count($carouselItems); $a++) {
                        if ($carouselItems[$a]["type"] == "image") {
?>
                            <div class="item imageItem <?php if ($a == 0) { echo "active"; } ?>">
                                <div class="imageContainer">
                                    <img src="<?php echo $carouselItems[$a]["imageSource"]; ?>" alt="<?php echo $carouselItems[$a]["imageAlt"]; ?>" />
                                </div>
                            </div>
<?php
                        } else if ($carouselItems[$a]["type"] == "video") {
?>
                            <div class="item videoItem <?php if ($a == 0) { echo "active"; } ?>">
<?php
                                if ($carouselItems[$a]["videoType"] == "hosted") {
?>
                                    <div class="videoContainer">
                                        <video data-playPause="play">
                                            <source src="<?php echo $carouselItems[$a]["videoSource"]; ?>" />
                                        </video>

                                        <div class="thumbnail" style="background-image: url(<?php echo $carouselItems[$a]["thumbnail"]; ?>" onclick="handlePlayPauseVideo()">
                                            <div class="playButton">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="159.766" height="159.448" viewBox="0 0 159.766 159.448" style="&#10;    background-color:  rgba(0,0,0,0.3);&#10;    border-radius:  50%;&#10;    overflow:  hidden;&#10;">
                                                    <g>
                                                    
                                                    <path d="M34.13,59.666q0-14.479-.011-28.956c-.005-1.54.235-2.916,1.689-3.752,1.52-.874,2.864-.342,4.212.523q22.538,14.487,45.1,28.948C88.2,58.41,88.18,61,85.068,63Q62.588,77.431,40.1,91.854c-1.333.857-2.665,1.466-4.21.627s-1.777-2.263-1.773-3.859c.026-9.653.012-19.3.012-28.956m6.722,23.8L77.9,59.694,40.853,35.922Z" transform="translate(25.782 20.033)" fill="#FFFFFF"/>
                                                    </g>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
<?php
                                } else if ($carouselItems[$a]["videoType"] == "embeded") {
?>
                                    <div class="iframeContainer">
                                        <iframe src="<?php echo $carouselItems[$a]["embedURL"]; ?>"></iframe>
                                    </div>
<?php   
                                }
?>
                            </div>
<?php
                        }
                    }
?>
                </div>
            </div>
            
            <button class="ScrollCarouselButton right active" onclick="handleScrollCarouselRightButtonClick()">
                <svg xmlns="http://www.w3.org/2000/svg" width="41.374" height="51.481" viewBox="0 0 41.374 51.481">
                    <path id="arrow-42" d="M806.608,961.045c-2.175-2.156-4.319-4.344-6.539-6.456a34.531,34.531,0,0,0-3.122-2.463,8.958,8.958,0,0,1-2.054-1.823,2.265,2.265,0,0,1-.115-2.559,8.421,8.421,0,0,1,2.047-2.259c1.817-1.491,3.692-2.911,5.509-4.4,1.42-1.164,2.79-2.393,4.178-3.6a6.376,6.376,0,0,0,.64-.64c1.1-1.28,1.28-1.28-.224-2.649-.838-.755-1.689-1.484-2.559-2.207-2.348-1.971-4.709-3.922-7.038-5.9a18.262,18.262,0,0,1-1.792-1.67,2.5,2.5,0,0,1-.051-3.589,15.35,15.35,0,0,1,1.536-1.5c.928-.8,1.881-1.574,2.841-2.335a35.188,35.188,0,0,0,5.918-5.758c1.689-2.15,2.886-2.137,4.767-.192a3.372,3.372,0,0,1,.409.454,20.051,20.051,0,0,0,5.848,5.33,18.062,18.062,0,0,1,2.8,2.374A162.375,162.375,0,0,0,832.8,931.12a17.625,17.625,0,0,1,2.361,2.393,2.344,2.344,0,0,1-.339,3.525q-8.855,7.806-17.729,15.586c-2,1.753-3.973,3.525-5.8,5.458a45.22,45.22,0,0,1-3.436,3.007h-1.228Zm25.3-25.593a1.919,1.919,0,0,0-.288-.531c-.755-.691-1.491-1.4-2.3-2.016a111.12,111.12,0,0,1-10.8-9.514,45.879,45.879,0,0,0-5.829-4.959,16.144,16.144,0,0,1-3.378-3.1l-.75-.866-.472-.5a.864.864,0,0,0-1.337.032,67.646,67.646,0,0,1-7.377,6.9,4.641,4.641,0,0,0-.416.448.736.736,0,0,0,.045,1.088c1.069.947,2.15,1.881,3.237,2.815,2.713,2.329,5.432,4.651,8.132,6.993a14.048,14.048,0,0,1,1.484,1.536,1.28,1.28,0,0,1,.077,1.44,4.007,4.007,0,0,1-.691,1,78.414,78.414,0,0,1-6.565,6.4c-1.919,1.529-3.8,3.1-5.688,4.664-.64.544-.672,1.011,0,1.478a33.909,33.909,0,0,1,4.479,4.14c1.209,1.241,2.514,2.387,3.839,3.551.589.531,1,.5,1.6-.038,2.124-1.919,4.159-3.935,6.366-5.758,5.528-4.543,10.647-9.546,16-14.255a4.233,4.233,0,0,0,.576-.7.741.741,0,0,0,.058-.249Z" transform="translate(-794.437 -909.609)" fill="#FFF"></path>
                </svg>
            </button>
        </section>
<?php
    }        