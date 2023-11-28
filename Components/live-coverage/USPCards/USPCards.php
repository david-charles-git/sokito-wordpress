<?php
    $hidden = get_sub_field("hide");

    if (!$hidden) {
        $uspCardItems = [];

        if (have_rows("uspCardItems")) {
            while (have_rows("uspCardItems")) {
                the_row();

                $item = array ();

                $heading = get_sub_field("heading");
                $body = get_sub_field("body");

                $item["heading"] = $heading;
                $item["body"] = $body;

                array_push($uspCardItems, $item);
            }
        }
?>
        <section class="USPCards">
            <div class="outer">
                <div class="inner" style="grid-template-columns: repeat(<?php echo count($uspCardItems); ?>, auto)">
<?php
                    for ($a = 0; $a < count($uspCardItems); $a++) {
?>
                        <div class="item uspCard">
                            <div class="inner">
                                <h4><?php echo $uspCardItems[$a]["heading"]; ?></h4>

                                <p><?php echo $uspCardItems[$a]["body"]; ?></p>
                            </div>
                        </div>
<?php
                    }
?>
                </div>
            </div>
        </section>
<?php
    }        