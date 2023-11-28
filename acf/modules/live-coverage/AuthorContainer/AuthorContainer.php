<?php
$articleID = get_the_ID();
$date = get_the_date("F d, Y", $articleID);
$taxonomys = get_the_terms($articleID, "articleType");

if (have_rows('field_liveCoverage_details')) {
    while (have_rows('field_liveCoverage_details')) {
        the_row();

        $articleAuthor = get_sub_field("author");
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
                <div class="taxonomyContainer"></div>
                <?php
                get_template_part('acf/modules/live-coverage/Buttons/shareButton');
                ?>
            </div>
        </div>
    </div>
</section>