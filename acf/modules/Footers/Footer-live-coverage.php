<?php
    $postID = get_the_ID();
    $postType = get_post_type($postID);
    $navigationOptions = [];
    $paymentOptionImageURLS = [
        "/assets/images/visa.png",
        "/assets/images/paypal.png",
        "/assets/images/am.png",
        "/assets/images/pay.png",
        "/assets/images/master_card.png"
    ];
    $copyRightString = "© Technological Tailors Ltd t/a Sokito Footwear. All rights reserved.";

    if (have_rows("footerMenu", "options")) {
        while (have_rows("footerMenu", "options")) {
            the_row();

            if (have_rows("navigationOptions")) {
                while (have_rows("navigationOptions")) {
                    the_row();
        
                    $navigationOption = array ();
                    $navigationTitle = get_sub_field("title");
                    $isActiveNavigation = false;

                    $subMenu = array ();

                    if (have_rows("navigationSubMenuOptions")) {
                        while (have_rows("navigationSubMenuOptions")) {
                            the_row();

                            $subMenuOption = array ();
                            $subMenuOptionype = get_sub_field("subType");
                            $subMenuOptionCustomContent = get_sub_field("subContent");
                            $subMenuOptionCustomHref = get_sub_field("subHref");
                            $subMenuOptionPostID = get_sub_field("subPost");

                            $subMenuOption["type"] = $subMenuOptionype;
                            $subMenuOption["customContent"] = $subMenuOptionCustomContent; 
                            $subMenuOption["customHref"] = $subMenuOptionCustomHref; 
                            $subMenuOption["postID"] = $subMenuOptionPostID;  

                            if ($subMenuOptionPostID) { 
                                if (get_post_type($subMenuOptionPostID) == $postType) {
                                    $isActiveNavigation = true;
                                }
                            }

                            array_push($subMenu, $subMenuOption);
                        }
                    }

                    $navigationOption["title"] = $navigationTitle;
                    $navigationOption["subMenu"] = $subMenu; 
                    $navigationOption["isActiveNavigation"] = $isActiveNavigation; 
        
                    array_push($navigationOptions, $navigationOption);
                }
            }
        }
    }
?>
    <footer class="footer footer-liveCoverage">
        <div class="top">
            <div class="background" style="background-image: url(<?php echo get_stylesheet_directory_uri() . "/assets/images/liveCoveragesArticles-backgroundIamge.webp"; ?>);"></div>
            
            <div class="outer">
                <div class="inner">
                    <nav class="footerNavigation">
<?php
                        for ($a = 0; $a < count($navigationOptions); $a++) {
                            $title = $navigationOptions[$a]["title"];
                            $subMenu = $navigationOptions[$a]["subMenu"];
                            $isActiveNavigation = $navigationOptions[$a]["isActiveNavigation"];
?>
                            <div class="navigationOptions">
                                <p class="title"><?php echo $title; ?></p>
<?php
                                if (count($subMenu) > 0) {
?>
                                    <ul class="submenu">
<?php
                                        for ($b = 0; $b < count($subMenu); $b++) {
                                            $subType = $subMenu[$b]["type"];
                    
                                            if ($subType == "custom") {
                                                $subContent = $subMenu[$b]["customContent"];
                                                $subHref = $subMenu[$b]["customHref"];
                    
                                            } else if ($subType == "post") {
                                                $subNavigationPostID = $subMenu[$b]["postID"];
                                                $subContent = get_the_title( $subNavigationPostID );
                                                $subHref = get_the_permalink( $subNavigationPostID );
                                            }
?>
                                            <li class="<?php if ($isActiveNavigation) { echo "activeNav"; } ?>">
                                                <a href="<?php echo $subHref; ?>"><?php echo $subContent; ?></a>
                                            </li>
<?php
                                        }
?>
                                    </ul>
<?php
                                }
?>
                            </div>
<?php
                        }
?>
                    </nav>

                    <div class="socialNavCotnainer">
                        <p class="title">FOLLOW THE CHANGE</p>

                        <ul class="submenu" style="grid-template-columns: repeat(3, auto);">
                            <li>
                                <a href="https://www.facebook.com/Officialsokito/">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21.852" height="38.032" viewBox="0 0 21.852 38.032">
                                        <g transform="translate(1.49 1.522)">
                                            <path class="stroke" transform="translate(-52.518 0)" fill="none" stroke="#fff" stroke-width="3" d="M70.976.732a.478.478,0,0,1,.4.522,23.085,23.085,0,0,1-.55,4.618c.049.423-.211.916-.7.853-3.469-.458-4.73,2.665-5.182,6.183,1.65.1,3.285.226,4.879.367a.528.528,0,0,1,.493.458.466.466,0,0,1,.2.268,10.834,10.834,0,0,1,.31,2.9,3.2,3.2,0,0,1-.4,2.207.625.625,0,0,1-.6.776c-1.692.021-3.405.049-5.125.064,0,.169,0,.338-.007.493-.12,4.6.078,9.193.028,13.79a.443.443,0,0,1-.557.444.58.58,0,0,1-.113.063A10.254,10.254,0,0,1,61.3,35a13.489,13.489,0,0,1-2.665-.113A.386.386,0,0,1,58.1,34.6c-.8-4.554-.663-9.362-.642-13.973V19.76c-1.4-.092-2.8-.233-4.174-.43a.367.367,0,0,1-.331-.338c-.508-.338-.388-1.227-.395-1.784a12.788,12.788,0,0,1,.19-3.743.423.423,0,0,1,.226-.254.428.428,0,0,1,.282-.134c1.4-.169,2.848-.268,4.308-.317a38.572,38.572,0,0,1,.395-3.948A9.976,9.976,0,0,1,70.5.309.632.632,0,0,1,70.976.732Z" />
                                        </g>
                                    </svg>
                                </a>
                            </li>

                            <li>
                                <a href="https://www.instagram.com/officialsokito/">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="38.574" height="38.15" viewBox="0 0 38.574 38.15">
                                        <path class="fill" fill="#fff" d="M17.779,38.15a34.964,34.964,0,0,1-8.05-.784,13.66,13.66,0,0,1-6.461-3.237A11.455,11.455,0,0,1,.081,27.8c.045-1.656.01-3.5-.027-5.445v0c-.047-2.463-.1-5.01.007-7.546.049-.715.089-1.414.128-2.089V12.7l0-.082A25.275,25.275,0,0,1,1.752,5.155,11.036,11.036,0,0,1,7.715.918,29.826,29.826,0,0,1,15.455.04C16.563.013,17.711,0,18.963,0c2.2,0,4.437.041,6.6.081h0c1.59.029,3.235.06,4.851.073,3.773.8,6.164,3.264,7.309,7.532.983,3.665.882,7.949.793,11.729l-.005.222c-.016.611-.022,1.228-.029,1.882-.033,3.084-.071,6.579-1.17,9.372a9.156,9.156,0,0,1-3.478,4.467,22.735,22.735,0,0,1-5.025,2.288l-.025.009c-1.114.044-2.3.117-3.565.194l-.044,0C22.786,38,20.31,38.15,17.779,38.15ZM18.1,2.065A27.455,27.455,0,0,0,8.659,3.381C5.72,4.5,4.216,6.33,4.191,8.824a.638.638,0,0,0-.1.266c-.953,8.386-.8,15,.441,19.669a6.131,6.131,0,0,0,2.7,3.825,11.675,11.675,0,0,0,4.629,1.443,68.225,68.225,0,0,0,9.517.756,27.934,27.934,0,0,0,8.706-1.146A6.19,6.19,0,0,0,33.913,30.5a12.752,12.752,0,0,0,.974-5.016c.041-1.029.14-2.229.244-3.5.3-3.675.679-8.248-.086-11.978a10.272,10.272,0,0,0-2.151-4.8A7.315,7.315,0,0,0,28.133,2.8,79.705,79.705,0,0,0,18.1,2.065Z"/>
                                        <path class="fill" transform="translate(-125.22 -55.761)" fill="#fff" d="M157.483,63.98c.021-2.45-3.034-3.228-4.674-1.722a2.441,2.441,0,0,0-.676,1.712,3.689,3.689,0,0,0,1.363,2.224C155.085,67.311,157.463,65.825,157.483,63.98Z" />
                                        <path class="fill" transform="translate(9.661 8.64)" fill="#fff" d="M10.09,19.651a11.385,11.385,0,0,1-8.283-3.858.732.732,0,0,0-.338-.236A11.465,11.465,0,0,1,.024,9.168,9.784,9.784,0,0,1,2.392,3.217,9.6,9.6,0,0,1,5.8.8,10.161,10.161,0,0,1,9.778,0a9.849,9.849,0,0,1,8.284,4.344,9.661,9.661,0,0,1,1.43,7.041A10.38,10.38,0,0,1,15.849,17.6,9,9,0,0,1,10.09,19.651ZM9.383,3.49a4.751,4.751,0,0,0-3.22,1.315A4.979,4.979,0,0,0,4.048,7.814a6.424,6.424,0,0,0,.045,3.808,7.607,7.607,0,0,0,2.543,3.416,6.59,6.59,0,0,0,3.943,1.441,5.054,5.054,0,0,0,2.676-.758,5.462,5.462,0,0,0,2.463-3,6.223,6.223,0,0,0,0-3.6,8.556,8.556,0,0,0-2.424-3.927,5.9,5.9,0,0,0-3.908-1.7Z" />
                                    </svg>
                                </a>
                            </li>

                            <li>
                                <a href="https://twitter.com/officialsokito/">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="43.955" height="36.944" viewBox="0 0 43.955 36.944">
                                        <g transform="translate(1.507 1.513)">
                                            <path class="stroke" transform="translate(0 -19.743)" fill="none" stroke="#fff" stroke-width="3" d="M.788,46.929c1.728-.211,3.48.016,5.209-.268a11.731,11.731,0,0,0,2.45-.738,28.571,28.571,0,0,1-5.33-4.389.982.982,0,0,1,.69-1.655,8.159,8.159,0,0,0,2.044-.162,27.473,27.473,0,0,1-4.032-7.058.972.972,0,0,1,1.193-1.193,6.619,6.619,0,0,0,1.168.341,14.806,14.806,0,0,1-.787-9.046.977.977,0,0,1,1.623-.43c3.878,3.813,8.778,5.646,14.019,6.523A8.62,8.62,0,0,1,24.462,20.2c2.775-1.03,6.5-.324,8.364,2.012a12.427,12.427,0,0,1,4.365-1.29A.906.906,0,0,1,38.2,22.241c-.5.844-.982,1.744-1.509,2.6a20.539,20.539,0,0,1,3.278-.649.947.947,0,0,1,.665,1.606c-1.29,1.03-2.572,2.207-3.943,3.148-.041,9.111-2.7,16.753-10.839,21.937-6.783,4.333-19.39,3.6-25.288-2.3H.553a.6.6,0,0,1-.446-.47A.651.651,0,0,1,.342,47.2.694.694,0,0,1,.788,46.929Z" />
                                        </g>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="bottom">
            <div class="outer">
                <div class="inner">
                    <div class="left">
                        <p><?php echo $copyRightString; ?></p>
                    </div>

                    <div class="right">
                        <div class="paymentOptions">
<?php
                            for ($a = 0; $a < count($paymentOptionImageURLS); $a++) {
?>
                                <div class="paymentOption" style="background-image: url(<?php echo get_stylesheet_directory_uri() . $paymentOptionImageURLS[$a]; ?>);"></div>
<?php
                            }
?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <style>
        footer.footer-liveCoverage > .top > .outer > .inner > nav.footerNavigation {
            grid-template-columns: repeat(<?php echo count($navigationOptions); ?>, 1fr);
        }
        footer.footer-liveCoverage > .bottom > .outer > .inner > .right > .paymentOptions {
            grid-template-columns: repeat(<?php echo count($paymentOptionImageURLS); ?>, auto);
        }
    </style>