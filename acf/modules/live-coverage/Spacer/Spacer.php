<?php
    $hidden = get_sub_field("hide");

    if (!$hidden) {
        $height_desktop = get_sub_field("height_desktop");
        // $height_laptop = get_sub_field("height_laptop");
        // $height_tablet = get_sub_field("height_tablet");
        $height_mobile = get_sub_field("height_mobile");
?>
        <div class="Spacer">
            <div class="desktop" style="height: <?php echo $height_desktop; ?>px"></div>
            <!-- <div class="laptop" style="height: <?php echo $height_laptop; ?>px"></div>
            <div class="tablet" style="height: <?php echo $height_tablet; ?>px"></div> -->
            <div class="mobile" style="height: <?php echo $height_mobile; ?>px"></div>
        </div>
<?php
    }        