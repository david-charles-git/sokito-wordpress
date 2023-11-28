<?php
if (!defined('ABSPATH')) {
    exit;
}

$postID = get_the_ID();
$postType = get_post_type($postID);
$postPermalink = get_permalink($postID);
$navigationOptions = [];
$homeButtonImage = "";
$isLightMode = false;
$liveCoveragePostID = 2083;

global $woocommerce;
$cartItemCount = WC()->cart->get_cart_contents_count();

if ($postType == "product") {
    $isLightMode = true;
}

if (have_rows("headerMenu", "options")) {
    while (have_rows("headerMenu", "options")) {
        the_row();

        if (have_rows("navigationOptions")) {
            while (have_rows("navigationOptions")) {
                the_row();

                $navigationOption = array();
                $navigationType = get_sub_field("type");
                $navigationCustomContent = get_sub_field("content");
                $navigationCustomHref = get_sub_field("href");
                $navigationPostID = get_sub_field("post") ? get_sub_field("post") : 0;
                $isActiveNavigation = false;

                $subMenu = array();

                if (have_rows("navigationSubMenuOptions")) {
                    while (have_rows("navigationSubMenuOptions")) {
                        the_row();

                        $subMenuOption = array();
                        $subMenuOptionype = get_sub_field("subType");
                        $subMenuOptionCustomContent = get_sub_field("subContent");
                        $subMenuOptionCustomHref = get_sub_field("subHref");
                        $subMenuOptionPostID = get_sub_field("subPost");

                        $subMenuOption["type"] = $subMenuOptionype;
                        $subMenuOption["customContent"] = $subMenuOptionCustomContent;
                        $subMenuOption["customHref"] = $subMenuOptionCustomHref;
                        $subMenuOption["postID"] = $subMenuOptionPostID;

                        if ($subMenuOptionPostID) {
                            if (get_post_type($subMenuOptionPostID) == $postType && $postType != "page") {
                                $isActiveNavigation = true;
                            }
                        }

                        array_push($subMenu, $subMenuOption);
                    }
                }

                if ($navigationPostID) {
                    if (get_permalink($navigationPostID) == $postPermalink) {
                        $isActiveNavigation = true;
                    }
                }

                if (wp_get_post_parent_id($postID) == $liveCoveragePostID && $navigationPostID == $liveCoveragePostID) {
                    $isActiveNavigation = true;
                }

                $navigationOption["type"] = $navigationType;
                $navigationOption["customContent"] = $navigationCustomContent;
                $navigationOption["customHref"] = $navigationCustomHref;
                $navigationOption["postID"] = $navigationPostID;
                $navigationOption["subMenu"] = $subMenu;
                $navigationOption["isActiveNavigation"] = $isActiveNavigation;

                $isActiveNavigation = false;

                array_push($navigationOptions, $navigationOption);
            }
        }
    }

    wp_reset_postdata();
}
?>
<header class="header header-liveCoverage <?php if ($isLightMode) {
                                                echo "light";
                                            } ?>">
    <div class="outer">
        <?php
        $recycle_page_id = 3442;

        if ($postID == $recycle_page_id) {
            get_template_part('Components/PromoBanners/ShopPromoBanner');
        } else if ($postType != "product") {
            get_template_part('Components/PromoBanners/PromoBanner');
        }
        ?>
        <nav class="inner">
            <button class="home">
                <a href="<?php echo home_url() ?>">
                    <?php
                    if ($isLightMode) {
                    ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="100.972" height="42.073" viewBox="0 0 100.972 42.073">
                            <g>
                                <path transform="translate(-93.08 -0.001)" fill="#fc4f00" d="M194.052.1c-.138.093-.272.194-.415.279Q181.653,7.538,169.667,14.7a30.368,30.368,0,0,1-7.536,3.344,23.974,23.974,0,0,1-5.413.852c-1.549.061-3.1.1-4.649.1q-15.676.026-31.352.031-3.38,0-6.76,0a1.85,1.85,0,0,1-.517-.072,4.34,4.34,0,0,1,2.235-1.124c3.854-.7,7.7-1.434,11.556-2.15q5.578-1.036,11.157-2.063,5.246-.97,10.492-1.938c.11-.02.223-.02.334-.03l.051.1-6.223,3.767.023.136a1.81,1.81,0,0,0,.423.068c1.466-.113,2.93-.239,4.4-.355,1.082-.086,2.168-.139,3.247-.247,1.934-.194,3.871-.375,5.795-.645,1.474-.206,2.943-.484,4.391-.83a18.3,18.3,0,0,0,5.25-2.406c1.909-1.17,3.8-2.368,5.7-3.556.159-.1.3-.221.456-.332l-.014-.1a2.416,2.416,0,0,0-.467-.058q-1.743.117-3.485.254c-1.263.1-2.524.211-3.786.315q-2.367.195-4.734.385c-1.263.1-2.526.192-3.789.294q-2.3.186-4.6.385c-1.42.12-2.839.245-4.258.362q-2.435.2-4.87.388-2.317.182-4.634.36-2.469.193-4.938.388-2.57.208-5.139.427c-1.8.151-3.606.305-5.409.452-1.251.1-2.5.189-3.755.293-1.465.122-2.928.259-4.393.382-1.228.1-2.457.2-3.686.3q-2.435.194-4.87.387-2.857.229-5.715.461A2.229,2.229,0,0,1,99.87,13c.021-.058.023-.1.043-.113a5.333,5.333,0,0,1,2.682-1.1c1.473-.132,2.936-.371,4.4-.56,1.535-.2,3.072-.388,4.608-.583q2.522-.32,5.043-.642c1.647-.213,3.293-.433,4.94-.648L127,8.647q2.773-.362,5.545-.723c1.815-.238,3.629-.482,5.444-.719,1.479-.193,2.959-.374,4.438-.567,1.423-.185,2.844-.383,4.267-.566,1.4-.18,2.8-.342,4.2-.521,1.468-.187,2.935-.385,4.4-.577s2.958-.387,4.437-.577q2.555-.328,5.111-.65c1.5-.191,3-.378,4.506-.573,1.625-.211,3.248-.428,4.873-.642s3.27-.435,4.906-.647c1.714-.222,3.43-.432,5.144-.655,1.949-.254,3.9-.517,5.847-.773q1.748-.23,3.5-.448a3.351,3.351,0,0,1,.412,0l.017.091" />
                                <path transform="translate(-238.976 -360.522)" d="M263.659,402.581c-1.415,0-2.829.016-4.244,0a2.887,2.887,0,0,1-2.932-3.619c.6-2.977,1.241-5.947,1.888-8.914a6.138,6.138,0,0,1,.509-1.359,3.162,3.162,0,0,1,2.807-1.778c.619-.049,1.242-.081,1.863-.082,2.41-.006,4.821,0,7.231.008a2.874,2.874,0,0,1,2.838,1.719,3.421,3.421,0,0,1,.141,2.166q-.922,4.426-1.887,8.844a4.851,4.851,0,0,1-.544,1.342,3.244,3.244,0,0,1-2.718,1.6c-.641.055-1.287.073-1.93.082-1.007.013-2.015,0-3.022,0v-.011m2.317-11.959c-.837,0-1.674-.006-2.511,0a1.056,1.056,0,0,0-1.228.994c-.159.717-.3,1.438-.451,2.156-.288,1.348-.587,2.693-.868,4.042-.12.579.086.859.66.959a1.6,1.6,0,0,0,.27.032c1.674,0,3.348.017,5.022-.011a1.08,1.08,0,0,0,1.189-1.024q.645-3.034,1.267-6.072c.156-.767-.1-1.067-.87-1.074-.827-.008-1.653,0-2.48,0" />
                                <path transform="translate(-1054.122 -360.46)" d="M1138.261,402.53c-1.336,0-2.672.007-4.008,0a4.567,4.567,0,0,1-.975-.106,2.743,2.743,0,0,1-2.23-3.219c.132-1.073.4-2.13.616-3.191q.635-3.052,1.294-6.1a5.516,5.516,0,0,1,.33-.959,3.346,3.346,0,0,1,2.92-2.112,12.052,12.052,0,0,1,1.321-.073c2.649,0,5.3-.03,7.948.012a2.87,2.87,0,0,1,2.9,3.614q-.9,4.468-1.867,8.921a6.094,6.094,0,0,1-.556,1.449,3.216,3.216,0,0,1-2.737,1.682,15,15,0,0,1-1.524.081c-1.143.011-2.287,0-3.431,0m2.184-11.972v.012c-.837,0-1.675-.01-2.512,0a1,1,0,0,0-1.086.871q-.687,3.2-1.347,6.4a.7.7,0,0,0,.658.883,2.847,2.847,0,0,0,.372.025c1.177.009,2.354.022,3.531.021.531,0,1.063-.019,1.594-.049a.92.92,0,0,0,.861-.658,4.015,4.015,0,0,0,.152-.52q.641-2.964,1.274-5.93c.14-.655-.112-1.025-.781-1.049-.9-.033-1.81-.008-2.716-.008" />
                                <path transform="translate(0 -363.927)" d="M17.433,390.512c-.152.747-.293,1.443-.436,2.139a.316.316,0,0,1-.06.157c-.641.633-1.192,1.426-2.225,1.43-2.468.009-4.936,0-7.4,0a.812.812,0,0,0-.786,1.186.908.908,0,0,0,.6.361c.854.167,1.72.269,2.576.429,1.321.246,2.65.468,3.952.793,1.624.405,2.289,1.57,2.094,3.3a20.5,20.5,0,0,1-.594,2.85,3.418,3.418,0,0,1-3.161,2.548c-.462.039-.926.059-1.389.06q-5.01.007-10.02,0c-.178,0-.355-.02-.577-.033.056-.311.1-.587.157-.861.167-.8.334-1.592.511-2.386.106-.477.153-.509.64-.509q4.466,0,8.933,0a5.674,5.674,0,0,0,.575-.031.564.564,0,0,0,.5-.435c.215-.649.046-.982-.63-1.1-1.795-.3-3.593-.588-5.39-.881a4.427,4.427,0,0,1-2.39-1.039,2.351,2.351,0,0,1-.8-1.765,11.714,11.714,0,0,1,.565-3.535A3.463,3.463,0,0,1,6.261,390.5c3.554-.026,7.109-.021,10.664-.027.144,0,.289.021.508.037" />
                                <path transform="translate(-485.09 -363.9)" d="M527.861,390.478l-1.2,5.561c.272.016.5.036.72.04.622.011,1.245.021,1.867.019a1.147,1.147,0,0,0,.887-.426c1.435-1.629,2.879-3.251,4.312-4.883a.833.833,0,0,1,.664-.337c1.121,0,2.241,0,3.362-.006.25,0,.353.11.3.36-.1.452-.165.914-.3,1.354a2.112,2.112,0,0,1-.431.787q-2.035,2.207-4.108,4.38a.657.657,0,0,0-.075.834c.766,1.636,1.52,3.278,2.291,4.912a1.545,1.545,0,0,1,.131,1.113c-.106.392-.186.792-.261,1.191a.4.4,0,0,1-.448.365q-1.408,0-2.816,0a.549.549,0,0,1-.523-.4c-.733-1.639-1.48-3.271-2.2-4.915a.683.683,0,0,0-.718-.479c-1.007.016-2.015.014-3.022,0a.471.471,0,0,0-.547.446c-.328,1.627-.676,3.251-1.017,4.875-.089.424-.15.475-.592.475-1.087,0-2.174-.005-3.26,0-.294,0-.451-.055-.378-.4.225-1.06.427-2.126.651-3.186q1.173-5.553,2.353-11.1c.127-.6.13-.609.754-.609q1.494,0,2.989,0c.169,0,.338.016.619.031" />
                                <path transform="translate(-850.211 -363.872)" d="M917.721,394.175c-.635,0-1.221,0-1.808,0-1.042,0-2.083.008-3.125.01-.558,0-.622-.074-.508-.612.2-.939.412-1.876.6-2.816.06-.291.237-.342.491-.341,1.37.005,2.74,0,4.11,0h10.156q.17,0,.34.006c.2.006.3.106.255.306-.133.652-.237,1.314-.42,1.953a3.528,3.528,0,0,1-2.169,1.5c-1.042,0-2.083-.008-3.125-.01-.561,0-.565,0-.684.558q-1.117,5.235-2.231,10.472c-.1.475-.143.509-.634.51q-1.6,0-3.193,0c-.419,0-.483-.07-.4-.48q.862-4.077,1.733-8.152c.2-.948.394-1.9.6-2.907" />
                                <path transform="translate(-733.004 -363.83)" d="M790.624,405.672c-1.319,0-2.6,0-3.875,0-.35,0-.278-.269-.239-.471.125-.643.268-1.282.4-1.922.855-4.044,1.7-8.09,2.573-12.13.192-.888,0-.747.945-.765,1-.019,1.992,0,2.988,0h.444l-3.24,15.295" />
                            </g>
                        </svg>
                    <?php
                    } else {
                    ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="100.972" height="42.073" viewBox="0 0 100.972 42.073">
                            <path transform="translate(-93.08 -0.001)" fill="#fc4f00" d="M194.052.1c-.138.093-.272.194-.415.279Q181.653,7.538,169.667,14.7a30.368,30.368,0,0,1-7.536,3.344,23.974,23.974,0,0,1-5.413.852c-1.549.061-3.1.1-4.649.1q-15.676.026-31.352.031-3.38,0-6.76,0a1.85,1.85,0,0,1-.517-.072,4.34,4.34,0,0,1,2.235-1.124c3.854-.7,7.7-1.434,11.556-2.15q5.578-1.036,11.157-2.063,5.246-.97,10.492-1.938c.11-.02.223-.02.334-.03l.051.1-6.223,3.767.023.136a1.81,1.81,0,0,0,.423.068c1.466-.113,2.93-.239,4.4-.355,1.082-.086,2.168-.139,3.247-.247,1.934-.194,3.871-.375,5.795-.645,1.474-.206,2.943-.484,4.391-.83a18.3,18.3,0,0,0,5.25-2.406c1.909-1.17,3.8-2.368,5.7-3.556.159-.1.3-.221.456-.332l-.014-.1a2.416,2.416,0,0,0-.467-.058q-1.743.117-3.485.254c-1.263.1-2.524.211-3.786.315q-2.367.195-4.734.385c-1.263.1-2.526.192-3.789.294q-2.3.186-4.6.385c-1.42.12-2.839.245-4.258.362q-2.435.2-4.87.388-2.317.182-4.634.36-2.469.193-4.938.388-2.57.208-5.139.427c-1.8.151-3.606.305-5.409.452-1.251.1-2.5.189-3.755.293-1.465.122-2.928.259-4.393.382-1.228.1-2.457.2-3.686.3q-2.435.194-4.87.387-2.857.229-5.715.461A2.229,2.229,0,0,1,99.87,13c.021-.058.023-.1.043-.113a5.333,5.333,0,0,1,2.682-1.1c1.473-.132,2.936-.371,4.4-.56,1.535-.2,3.072-.388,4.608-.583q2.522-.32,5.043-.642c1.647-.213,3.293-.433,4.94-.648L127,8.647q2.773-.362,5.545-.723c1.815-.238,3.629-.482,5.444-.719,1.479-.193,2.959-.374,4.438-.567,1.423-.185,2.844-.383,4.267-.566,1.4-.18,2.8-.342,4.2-.521,1.468-.187,2.935-.385,4.4-.577s2.958-.387,4.437-.577q2.555-.328,5.111-.65c1.5-.191,3-.378,4.506-.573,1.625-.211,3.248-.428,4.873-.642s3.27-.435,4.906-.647c1.714-.222,3.43-.432,5.144-.655,1.949-.254,3.9-.517,5.847-.773q1.748-.23,3.5-.448a3.351,3.351,0,0,1,.412,0l.017.091" />
                            <path transform="translate(-238.976 -360.522)" fill="#fff" d="M263.659,402.581c-1.415,0-2.829.016-4.244,0a2.887,2.887,0,0,1-2.932-3.619c.6-2.977,1.241-5.947,1.888-8.914a6.138,6.138,0,0,1,.509-1.359,3.162,3.162,0,0,1,2.807-1.778c.619-.049,1.242-.081,1.863-.082,2.41-.006,4.821,0,7.231.008a2.874,2.874,0,0,1,2.838,1.719,3.421,3.421,0,0,1,.141,2.166q-.922,4.426-1.887,8.844a4.851,4.851,0,0,1-.544,1.342,3.244,3.244,0,0,1-2.718,1.6c-.641.055-1.287.073-1.93.082-1.007.013-2.015,0-3.022,0v-.011m2.317-11.959c-.837,0-1.674-.006-2.511,0a1.056,1.056,0,0,0-1.228.994c-.159.717-.3,1.438-.451,2.156-.288,1.348-.587,2.693-.868,4.042-.12.579.086.859.66.959a1.6,1.6,0,0,0,.27.032c1.674,0,3.348.017,5.022-.011a1.08,1.08,0,0,0,1.189-1.024q.645-3.034,1.267-6.072c.156-.767-.1-1.067-.87-1.074-.827-.008-1.653,0-2.48,0" />
                            <path transform="translate(-1054.122 -360.46)" fill="#fff" d="M1138.261,402.53c-1.336,0-2.672.007-4.008,0a4.567,4.567,0,0,1-.975-.106,2.743,2.743,0,0,1-2.23-3.219c.132-1.073.4-2.13.616-3.191q.635-3.052,1.294-6.1a5.516,5.516,0,0,1,.33-.959,3.346,3.346,0,0,1,2.92-2.112,12.052,12.052,0,0,1,1.321-.073c2.649,0,5.3-.03,7.948.012a2.87,2.87,0,0,1,2.9,3.614q-.9,4.468-1.867,8.921a6.094,6.094,0,0,1-.556,1.449,3.216,3.216,0,0,1-2.737,1.682,15,15,0,0,1-1.524.081c-1.143.011-2.287,0-3.431,0m2.184-11.972v.012c-.837,0-1.675-.01-2.512,0a1,1,0,0,0-1.086.871q-.687,3.2-1.347,6.4a.7.7,0,0,0,.658.883,2.847,2.847,0,0,0,.372.025c1.177.009,2.354.022,3.531.021.531,0,1.063-.019,1.594-.049a.92.92,0,0,0,.861-.658,4.015,4.015,0,0,0,.152-.52q.641-2.964,1.274-5.93c.14-.655-.112-1.025-.781-1.049-.9-.033-1.81-.008-2.716-.008" />
                            <path transform="translate(0 -363.927)" fill="#fff" d="M17.433,390.512c-.152.747-.293,1.443-.436,2.139a.316.316,0,0,1-.06.157c-.641.633-1.192,1.426-2.225,1.43-2.468.009-4.936,0-7.4,0a.812.812,0,0,0-.786,1.186.908.908,0,0,0,.6.361c.854.167,1.72.269,2.576.429,1.321.246,2.65.468,3.952.793,1.624.405,2.289,1.57,2.094,3.3a20.5,20.5,0,0,1-.594,2.85,3.418,3.418,0,0,1-3.161,2.548c-.462.039-.926.059-1.389.06q-5.01.007-10.02,0c-.178,0-.355-.02-.577-.033.056-.311.1-.587.157-.861.167-.8.334-1.592.511-2.386.106-.477.153-.509.64-.509q4.466,0,8.933,0a5.674,5.674,0,0,0,.575-.031.564.564,0,0,0,.5-.435c.215-.649.046-.982-.63-1.1-1.795-.3-3.593-.588-5.39-.881a4.427,4.427,0,0,1-2.39-1.039,2.351,2.351,0,0,1-.8-1.765,11.714,11.714,0,0,1,.565-3.535A3.463,3.463,0,0,1,6.261,390.5c3.554-.026,7.109-.021,10.664-.027.144,0,.289.021.508.037" />
                            <path transform="translate(-485.09 -363.9)" fill="#fff" d="M527.861,390.478l-1.2,5.561c.272.016.5.036.72.04.622.011,1.245.021,1.867.019a1.147,1.147,0,0,0,.887-.426c1.435-1.629,2.879-3.251,4.312-4.883a.833.833,0,0,1,.664-.337c1.121,0,2.241,0,3.362-.006.25,0,.353.11.3.36-.1.452-.165.914-.3,1.354a2.112,2.112,0,0,1-.431.787q-2.035,2.207-4.108,4.38a.657.657,0,0,0-.075.834c.766,1.636,1.52,3.278,2.291,4.912a1.545,1.545,0,0,1,.131,1.113c-.106.392-.186.792-.261,1.191a.4.4,0,0,1-.448.365q-1.408,0-2.816,0a.549.549,0,0,1-.523-.4c-.733-1.639-1.48-3.271-2.2-4.915a.683.683,0,0,0-.718-.479c-1.007.016-2.015.014-3.022,0a.471.471,0,0,0-.547.446c-.328,1.627-.676,3.251-1.017,4.875-.089.424-.15.475-.592.475-1.087,0-2.174-.005-3.26,0-.294,0-.451-.055-.378-.4.225-1.06.427-2.126.651-3.186q1.173-5.553,2.353-11.1c.127-.6.13-.609.754-.609q1.494,0,2.989,0c.169,0,.338.016.619.031" />
                            <path transform="translate(-850.211 -363.872)" fill="#fff" d="M917.721,394.175c-.635,0-1.221,0-1.808,0-1.042,0-2.083.008-3.125.01-.558,0-.622-.074-.508-.612.2-.939.412-1.876.6-2.816.06-.291.237-.342.491-.341,1.37.005,2.74,0,4.11,0h10.156q.17,0,.34.006c.2.006.3.106.255.306-.133.652-.237,1.314-.42,1.953a3.528,3.528,0,0,1-2.169,1.5c-1.042,0-2.083-.008-3.125-.01-.561,0-.565,0-.684.558q-1.117,5.235-2.231,10.472c-.1.475-.143.509-.634.51q-1.6,0-3.193,0c-.419,0-.483-.07-.4-.48q.862-4.077,1.733-8.152c.2-.948.394-1.9.6-2.907" />
                            <path transform="translate(-733.004 -363.83)" fill="#fff" d="M790.624,405.672c-1.319,0-2.6,0-3.875,0-.35,0-.278-.269-.239-.471.125-.643.268-1.282.4-1.922.855-4.044,1.7-8.09,2.573-12.13.192-.888,0-.747.945-.765,1-.019,1.992,0,2.988,0h.444l-3.24,15.295" />
                        </svg>
                    <?php
                    }
                    ?>
                </a>
            </button>

            <ul class="navigationOptions" style="grid-template-columns: repeat(<?php echo count($navigationOptions); ?>, auto);">
                <?php
                for ($a = 0; $a < count($navigationOptions); $a++) {
                    $type = $navigationOptions[$a]["type"];
                    $subMenu = $navigationOptions[$a]["subMenu"];
                    $isActiveNavigation = $navigationOptions[$a]["isActiveNavigation"];

                    if ($type == "custom") {
                        $content = $navigationOptions[$a]["customContent"];
                        $href = $navigationOptions[$a]["customHref"];
                    } else if ($type == "post") {
                        $navigationPostID = $navigationOptions[$a]["postID"];
                        $content = get_the_title($navigationPostID);
                        $href = get_the_permalink($navigationPostID);
                    }
                ?>

                    <li class="navigationOption <?php if ($isActiveNavigation) {
                                                    echo "activeNav";
                                                } ?>" data-id="<?php echo $a; ?>" onclick="handleHeaderNavigationOptionClick()">
                        <?php
                        if (count($subMenu) == 0) {
                        ?>
                            <a href="<?php echo $href; ?>"><?php echo $content; ?></a>
                        <?php

                        } else {
                        ?>
                            <p><?php echo $content; ?></p>
                            <?php
                            if (count($subMenu) > 0) {
                            ?>
                                <div class="submenu" data-id="<?php echo $a; ?>">
                                    <ul>
                                        <?php
                                        for ($b = 0; $b < count($subMenu); $b++) {
                                            $subType = $subMenu[$b]["type"];

                                            if ($subType == "custom") {
                                                $subContent = $subMenu[$b]["customContent"];
                                                $subHref = $subMenu[$b]["customHref"];
                                            } else if ($subType == "post") {
                                                $subNavigationPostID = $subMenu[$b]["postID"];
                                                $subContent = get_the_title($subNavigationPostID);
                                                $subHref = get_the_permalink($subNavigationPostID);
                                            }
                                        ?>
                                            <li>
                                                <a href="<?php echo $subHref; ?>"><?php echo $subContent; ?></a>
                                            </li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </li>
                <?php
                }
                ?>
            </ul>

            <ul class="accountOptions">
                <li class="accountOption">
                    <a href="<?php echo home_url() . '/my-account/'; ?>">
                        <?php
                        if ($isLightMode) {
                        ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="29.102" height="29.344" viewBox="0 0 29.102 29.344">
                                <g transform="translate(-2.037)">
                                    <path d="M31.111,26.227A14.74,14.74,0,0,0,21,14.336a7.847,7.847,0,1,0-8.817,0A14.739,14.739,0,0,0,2.064,26.228a2.732,2.732,0,0,0,2.7,3.116H28.406a2.732,2.732,0,0,0,2.705-3.116ZM10.787,7.848a5.8,5.8,0,1,1,5.8,5.8A5.807,5.807,0,0,1,10.787,7.848ZM28.924,27.06a.679.679,0,0,1-.518.237H4.769a.685.685,0,0,1-.678-.779,12.627,12.627,0,0,1,24.994,0,.674.674,0,0,1-.16.542Z" />
                                </g>
                            </svg>
                        <?php
                        } else {
                        ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20.833" height="21.006" viewBox="0 0 20.833 21.006">
                                <g transform="translate(-2.037)">
                                    <path fill="#fff" d="M22.85,18.775a10.552,10.552,0,0,0-7.241-8.513,5.618,5.618,0,1,0-6.312,0,10.551,10.551,0,0,0-7.241,8.513,1.956,1.956,0,0,0,1.936,2.231H20.914a1.956,1.956,0,0,0,1.937-2.231ZM8.3,5.618A4.152,4.152,0,1,1,12.453,9.77,4.157,4.157,0,0,1,8.3,5.618ZM21.285,19.371a.486.486,0,0,1-.371.17H3.993a.49.49,0,0,1-.486-.558,9.039,9.039,0,0,1,17.892,0,.483.483,0,0,1-.115.388Z" />
                                </g>
                            </svg>
                        <?php
                        }
                        ?>

                    </a>
                </li>

                <li class="accountOption <?php if ($cartItemCount == 0) {
                                                echo "empty";
                                            } else {
                                                echo "full";
                                            } ?>">
                    <?php
                    if ($cartItemCount > 0) {
                    ?>
                        <a href="<?php echo home_url() . '/cart/'; ?>">
                        <?php
                    } else {
                        ?>
                            <p>
                            <?php
                        }
                            ?>
                            <span id="navigationCartCount" class="cartCount"><?php echo $cartItemCount; ?></span>
                            <?php

                            if ($isLightMode) {
                            ?>
                                <svg xmlns="http://www.w3.org/2000/svg" width="25.132" height="29.038" viewBox="0 0 25.132 29.038">
                                    <polygon class="Rectangle" fill="#FF0600" points="3 7 21 7 24 28 0 28"></polygon>
                                    <path transform="translate(0.001)" d="M25.127,28.083,22.92,7.066a.864.864,0,0,0-.86-.774H17.912V5.347a5.347,5.347,0,0,0-10.694,0v.946H3.071a.864.864,0,0,0-.86.774L0,28.083a.864.864,0,0,0,.86.954h23.4a.864.864,0,0,0,.86-.954ZM8.947,5.347a3.618,3.618,0,0,1,7.237,0v.946H8.947ZM1.823,27.309,3.849,8.021h3.37v1.9a.864.864,0,0,0,1.728,0v-1.9h7.237v1.9a.864.864,0,1,0,1.728,0v-1.9h3.37l2.026,19.288Zm0,0" />
                                </svg>
                            <?php
                            } else {
                            ?>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20.004" height="23.113" viewBox="0 0 20.004 23.113">
                                    <polygon class="Rectangle" fill="#FF0600" points="2.91163455 5.95850783 17.2213376 5.95850783 19.0646568 22 1.45478092 22"></polygon>

                                    <path transform="translate(0.001)" fill="#fff" d="M20,22.353,18.243,5.625a.688.688,0,0,0-.684-.616h-3.3V4.256a4.256,4.256,0,0,0-8.512,0v.753h-3.3a.688.688,0,0,0-.684.616L0,22.353a.688.688,0,0,0,.684.76H19.315a.688.688,0,0,0,.684-.76ZM7.121,4.256a2.88,2.88,0,0,1,5.76,0v.753H7.121ZM1.451,21.737,3.063,6.384H5.746V7.9a.688.688,0,0,0,1.376,0V6.384h5.76V7.9a.688.688,0,1,0,1.376,0V6.384h2.682l1.612,15.353Zm0,0" />
                                </svg>
                            <?php
                            }

                            if ($cartItemCount > 0) {
                            ?>
                        </a>
                    <?php
                            } else {
                    ?>
                        </p>
                    <?php
                            }
                    ?>
                </li>

                <li class="accountOption menuButton">
                    <button class="headerMobileMenuButton" onclick="handleHeaderMobileMenuClick()">
                        <span></span>
                    </button>
                </li>
            </ul>
        </nav>
    </div>
</header>

<style>
    html {
        margin-top: 0px !important;
    }

    /* div#wpadminbar {
            display: none;
        } */
</style>

<script>
    var headerHideShowOnScrollY = window.scrollY; //px

    function handleHeaderHideShowOnScroll() {
        const mobileScreenBreak = 800; //px

        //if (window.innerWidth <= mobileScreenBreak) { return; }

        const header = document.getElementsByClassName("header-liveCoverage")[0];

        if (!header) {
            return;
        }

        const headerOuter = header.getElementsByClassName("outer")[0];

        if (!headerOuter) {
            return;
        }

        const headerOuterHeight = headerOuter.clientHeight; //px
        const windowScrollY = window.scrollY; //px
        const headerHeight = windowScrollY > headerHideShowOnScrollY ? 0 : headerOuterHeight; //px
        const headerOverflow = windowScrollY > headerHideShowOnScrollY ? "hidden" : null;

        headerHideShowOnScrollY = windowScrollY;
        header.style.overflow = "hidden";

        if (windowScrollY <= headerOuterHeight) {
            if (windowScrollY > headerHideShowOnScrollY || windowScrollY == 0) {
                header.style.height = null;
                header.style.overflow = null;
                header.classList.remove("fixed");

                return;
            }

            setTimeout(function() {
                header.style.overflow = null;
            }, 201);

            return;
        }

        header.style.height = headerHeight + "px";
        header.classList.add("fixed");

        setTimeout(function() {
            header.style.overflow = headerOverflow;
        }, 201);

        return;
    }

    function resetHeaders() {
        const header = document.getElementsByClassName("header-liveCoverage")[0];

        if (!header) {
            return;
        }

        header.style.height = null;
        header.classList.remove("fixed");

        return;
    }

    window.addEventListener("resize", () => {
        resetHeaders();
    });
    window.addEventListener("scroll", () => {
        handleHeaderHideShowOnScroll();
    });
</script>