<?php
    $currentDate = date("d/m/Y");
    $promoContent = $currentDate;
    $promoStartDate = $currentDate;
    $promoEndDate = $currentDate;

    if (have_rows("promoBanner", "options")) {
        while (have_rows("promoBanner", "options")) {
            the_row();

            $promoContent = get_sub_field("content");
            $promoStartDate = get_sub_field("startDate");
            $promoEndDate = get_sub_field("endDate");
        }
        
        wp_reset_postdata();
    }

    if ($promoEndDate > $promoStartDate && $promoStartDate <= $currentDate && $promoEndDate >= $currentDate) {
?>
        <div class="promoBanner">
            <div class="outer">
                <div class="inner">
                    <p><?php echo $promoContent; ?></p>
                </div>
            </div>
        </div>
<?php
    } else {
?>
        <div class="promoBanner">
            <div class="outer">
                <div class="inner">
                    <p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="22.296" height="21.55" viewBox="0 0 22.296 21.55">
                            <g id="recycle-sign" transform="translate(0 -8.028)">
                                <g id="Group_113" data-name="Group 113" transform="translate(5.203 8.028)">
                                <g id="Group_112" data-name="Group 112" transform="translate(0 0)">
                                    <path id="Path_134" data-name="Path 134" d="M127.037,10.666a.372.372,0,0,0-.33,0l-1.6.812-1.253-2.153a2.457,2.457,0,0,0-2.179-1.3H115.48a2.65,2.65,0,0,0-2.26,1.277l-1.152,1.872a.372.372,0,0,0,.117.508l4.087,2.6a.372.372,0,0,0,.2.058.365.365,0,0,0,.091-.012.371.371,0,0,0,.233-.179l1.561-2.808,1.709,3.233-1.556.934a.372.372,0,0,0,.149.688l5.53.629.042,0a.372.372,0,0,0,.334-.21l2.644-5.459A.372.372,0,0,0,127.037,10.666Zm-10.7,2.781-3.445-2.192.962-1.564a1.9,1.9,0,0,1,1.625-.921h1.509l.921,1.848Zm7.673,2.613-4.179-.475.918-.551a.372.372,0,0,0,.137-.492l-3.052-5.771h3.838a1.731,1.731,0,0,1,1.537.929l1.43,2.457a.372.372,0,0,0,.489.144l.931-.472Z" transform="translate(-112.013 -8.028)" fill="#fff"/>
                                </g>
                                </g>
                                <g id="Group_115" data-name="Group 115" transform="translate(9.29 15.829)">
                                <g id="Group_114" data-name="Group 114">
                                    <path id="Path_135" data-name="Path 135" d="M212.691,178.59l-1.2-2.4a.372.372,0,0,0-.5-.166l-.022.012-4.459,2.6a.372.372,0,0,0-.137.5l1.55,2.793h-3.455v-1.486a.372.372,0,0,0-.647-.25l-3.716,4.087a.372.372,0,0,0-.019.477l3.716,4.83a.372.372,0,0,0,.666-.227v-1.115h2.6a2.378,2.378,0,0,0,2.179-1.3l2.6-4.456.773-1.248A2.633,2.633,0,0,0,212.691,178.59Zm-4.089,7.993a1.655,1.655,0,0,1-1.533.923H204.1a.372.372,0,0,0-.372.372v.394l-2.861-3.718,2.861-3.146v.9a.372.372,0,0,0,.372.372h6.784Zm3.386-5.729-.669,1.078h-2.546L207.2,179.1l3.8-2.219,1.031,2.058A1.9,1.9,0,0,1,211.988,180.854Z" transform="translate(-200.01 -175.985)" fill="#fff"/>
                                </g>
                                </g>
                                <g id="Group_117" data-name="Group 117" transform="translate(0 13.973)">
                                <g id="Group_116" data-name="Group 116">
                                    <path id="Path_136" data-name="Path 136" d="M8.884,141.059l-2.229-4.83a.372.372,0,0,0-.361-.216l-5.945.372a.372.372,0,0,0-.173.687h0l1.837,1.139L.787,140.666a2.675,2.675,0,0,0,.007,2.592l2.068,3.571,1.131,1.958a2.729,2.729,0,0,0,2.325,1.345H7.8a.372.372,0,0,0,.372-.372v-5.2a.372.372,0,0,0-.372-.372H5.027l1.853-3.216,1.532.59a.372.372,0,0,0,.471-.5ZM7.432,144.93v4.459H6.317a1.974,1.974,0,0,1-1.682-.972l-1.02-1.767,1.052-1.719Zm-.581-4.767a.372.372,0,0,0-.455.161L3.182,145.9l-1.745-3.014a1.932,1.932,0,0,1,.013-1.878l1.382-2.77a.372.372,0,0,0-.137-.483l-1.137-.7,4.528-.282,1.739,3.768Z" transform="translate(0 -136.012)" fill="#fff"/>
                                </g>
                                </g>
                            </g>
                        </svg>
                        Recycle your old football boots and <strong>get £20 off your order</strong>
                    </p>
                </div>
            </div>
        </div>
<?php
    }