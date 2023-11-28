<?php
    $hidden = get_sub_field("hide");

    if (!$hidden) {
        $articleID = get_the_ID();
        $postTypeName = str_replace("-", " ", get_post_type($articleID));
        $taxonomys = get_the_terms($articleID, "articleType");
        $date = get_the_date( "F d, Y", $articleID);
        $backgroundImage = get_sub_field("backgroundImage");
        $heading = get_sub_field("heading");
?>

        <section class="HeroBanner">
            <div class="backgroundImage" style="background-color: #000; background-image: url(<?php echo $backgroundImage; ?>);">
                <div class="overlay"></div>
            </div>

            <div class="outer">
                <div class="inner">
                    <div class="taxonomyContainer">
<?php
                        for ($a = 0; $a < count($taxonomys); $a++) {
?>
                            <div class="taxonomy" data-slug="<?php echo $taxonomys[$a]->slug; ?>">
                                <a href="<?php echo home_url() . "/live-coverage-hub/" . $taxonomys[$a]->slug . "/"; ?>"><?php echo $taxonomys[$a]->name; ?></a>
                            </div>  
<?php
                        }
?>
                    </div>

                    <h1><?php echo $heading; ?></h1>

                    <div class="detailsCotnainer">
                        <div class="inner">
                            <div class="dateContainer">
                                <p><?php echo $date; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php
    }