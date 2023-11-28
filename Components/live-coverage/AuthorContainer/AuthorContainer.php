<?php
    $articleID = get_the_ID();
    $date = get_the_date( "F d, Y", $articleID);
    $taxonomys = get_the_terms($articleID, "articleType");
    //$shareLinkCopy = get_the_permalink( $articleID );

    if (have_rows('field_liveCoverage_details')) {
        while (have_rows('field_liveCoverage_details')) {
            the_row();

            $articleAuthor = get_sub_field("author");
            // $shareLinkTwitter = get_sub_field("shareLinkTwitter");
            // $shareLinkFacebook = get_sub_field("shareLinkFacebook");
        }
    }
?>
    <section class="AuthorContainer">
        <div class="outer">
            <div class="inner">
                <div class="left">
                    <h6>Author</h6>

                    <p><?php echo $articleAuthor; ?></p>

                    <span></span>

                    <p><?php echo $date; ?></p>
                </div>

                <div class="right">
                    <div class="taxonomyContainer">
<?php
                        /*for ($a = 0; $a < count($taxonomys); $a++) {
?>
                            <div class="taxonomy" data-slug="<?php echo $taxonomys[$a]->slug; ?>">
                                <p><?php echo $taxonomys[$a]->name; ?></p>
                            </div>  
<?php
                        }*/
?>
                    </div>
<?php
                    get_template_part('Components/live-coverage/Buttons/shareButton');
?>
                </div>
            </div>
        </div>
    </section>