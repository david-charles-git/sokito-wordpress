<?php
    $postID = get_the_ID();    
    $shareLinkCopy = get_the_permalink( $postID );

    if (have_rows('field_liveCoverage_details', $postID)) {
        while (have_rows('field_liveCoverage_details', $postID)) {
            the_row();

            $shareLinkTwitter = get_sub_field("shareLinkTwitter");
            $shareLinkFacebook = get_sub_field("shareLinkFacebook");
        }
    }
?>

<div class="shareButtonContainer" data-openClose="open">
    <button class="shareButton" onclick="handleShareButtonClick()">
        <p>Share</p>

        <div class="shareIcon">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 14.458 16">
                <path transform="translate(-4.5 -3)" fill="#fc4f00" d="M16.548,14.309a2.339,2.339,0,0,0-1.574.618L9.247,11.594a2.223,2.223,0,0,0,0-1.124l5.663-3.3a2.4,2.4,0,1,0-.771-1.759,2.629,2.629,0,0,0,.072.562l-5.663,3.3a2.41,2.41,0,1,0,0,3.518l5.719,3.341a2.266,2.266,0,0,0-.064.522,2.345,2.345,0,1,0,2.345-2.345Z"></path>
            </svg>

            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 185.343 185.343">
                <path d="M51.707,185.343c-2.741,0-5.493-1.044-7.593-3.149c-4.194-4.194-4.194-10.981,0-15.175    l74.352-74.347L44.114,18.32c-4.194-4.194-4.194-10.987,0-15.175c4.194-4.194,10.987-4.194,15.18,0l81.934,81.934    c4.194,4.194,4.194,10.987,0,15.175l-81.934,81.939C57.201,184.293,54.454,185.343,51.707,185.343z" fill="#fc4f00"></path>
            </svg>
        </div>
    </button>

    <div class="shareOptionContainer">
        <div class="inner">
<?php
            if ($shareLinkTwitter) {
?>
                <a class="shareOption" href="<?php echo $shareLinkTwitter; ?>" onclick="handleShareButtonClick()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 43.907 36.917">
                        <g transform="translate(1.499 1.5)">
                            <path transform="translate(0 -19.743)" d="M14.979,55.16a26.778,26.778,0,0,1-8.457-1.343A18.036,18.036,0,0,1-.273,49.874a2.072,2.072,0,0,1-1.009-1.166,2.135,2.135,0,0,1-.154-1.45,2.171,2.171,0,0,1,.8-1.211,2.136,2.136,0,0,1,1.231-.605H.607a21.91,21.91,0,0,1,2.578-.116c.618,0,1.213-.006,1.787-.05a29.85,29.85,0,0,1-2.938-2.7,2.481,2.481,0,0,1,1.088-4.089,29.414,29.414,0,0,1-2.7-5.275A2.292,2.292,0,0,1,.678,31.05a2.6,2.6,0,0,1,1.336-1,16.557,16.557,0,0,1-.089-7.6,2.4,2.4,0,0,1,2.4-1.895,2.471,2.471,0,0,1,1.746.7,19.965,19.965,0,0,0,6.053,4.06,27.825,27.825,0,0,0,5.415,1.72,9.866,9.866,0,0,1,1.523-4.2A10.09,10.09,0,0,1,23.936,18.8a9.278,9.278,0,0,1,3.2-.556,9.1,9.1,0,0,1,6.006,2.138,16.927,16.927,0,0,1,3.518-.885l.274-.048.012,0a2.512,2.512,0,0,1,2.582,1.213,2.293,2.293,0,0,1,.1,2.067l.145-.019a2.238,2.238,0,0,1,.286-.018,2.451,2.451,0,0,1,1.506,4.284c-.413.33-.821.672-1.253,1.033-.689.577-1.4,1.17-2.137,1.721a30.7,30.7,0,0,1-2.509,12.286,22.574,22.574,0,0,1-3.572,5.53,25.315,25.315,0,0,1-5.442,4.609A21.972,21.972,0,0,1,14.979,55.16ZM2.51,48.329A16.051,16.051,0,0,0,7.48,50.974a23.744,23.744,0,0,0,7.5,1.186,22.743,22.743,0,0,0,5.5-.65,15.375,15.375,0,0,0,4.562-1.887,20.333,20.333,0,0,0,7.9-8.855,28.426,28.426,0,0,0,2.248-11.825l0-.785.648-.445c.715-.491,1.43-1.072,2.129-1.654-.3.069-.58.143-.855.224l-3.745,1.107,2.041-3.329c.281-.458.557-.946.825-1.418l.014-.024a7.924,7.924,0,0,0-2.622.867l-1.135.715-.837-1.048a5.834,5.834,0,0,0-4.52-1.909,6.245,6.245,0,0,0-2.15.368,7.174,7.174,0,0,0-3.4,2.85,6.377,6.377,0,0,0-1.063,4.2l.259,2-1.994-.333c-5.9-.986-10.526-3.037-14.106-6.258a13.037,13.037,0,0,0,.884,7.155l1.087,2.611L3.88,33.276l-.194-.042a25.724,25.724,0,0,0,3.343,5.553l1.5,1.9-2.375.493a9.722,9.722,0,0,1-1.107.164A27.2,27.2,0,0,0,9.257,44.66l2.473,1.587L8.994,47.319a13.1,13.1,0,0,1-2.758.822,19.034,19.034,0,0,1-3.036.181C2.966,48.325,2.736,48.326,2.51,48.329Z" />
                        </g>
                    </svg>
                </a>
<?php
            }

            if ($shareLinkFacebook) {
?> 
                <a class="shareOption" href="<?php echo $shareLinkFacebook; ?>" onclick="handleShareButtonClick()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 21.86 38.016">
                        <g transform="translate(1.5 1.5)">
                            <path transform="translate(-52.518 0)" d="M67.858-1.5a13.3,13.3,0,0,1,2.983.347l.017,0a2.164,2.164,0,0,1,1.168.729,1.98,1.98,0,0,1,.851,1.741v.007a25.41,25.41,0,0,1-.543,4.706,2.365,2.365,0,0,1-.579,1.5,2.039,2.039,0,0,1-1.541.694,2.154,2.154,0,0,1-.277-.018,3.554,3.554,0,0,0-.464-.032A2.127,2.127,0,0,0,67.53,9.349a7.327,7.327,0,0,0-.817,2.171c1.032.073,2.106.159,3.246.26h.01a2.023,2.023,0,0,1,1.654,1.139,1.948,1.948,0,0,1,.333.655,11.525,11.525,0,0,1,.368,3.144l0,.158c0,.079,0,.159.006.24a4.7,4.7,0,0,1-.421,2.464,2.148,2.148,0,0,1-.454,1.034,2.09,2.09,0,0,1-1.588.771h-.026l-1.665.022-2.007.026c-.038,2.253-.009,4.534.019,6.749.025,1.985.051,4.037.03,6.066v.013a1.918,1.918,0,0,1-1.733,1.913,9.244,9.244,0,0,1-2.658.315c-.168,0-.327.005-.481.01h-.019c-.311.007-.632.015-.955.015a11.947,11.947,0,0,1-1.738-.108q-.08.006-.16.006a1.853,1.853,0,0,1-1.855-1.557,71.316,71.316,0,0,1-.673-12.752q0-.48.007-.957c-.985-.088-1.951-.2-2.884-.334l-.033-.005a1.879,1.879,0,0,1-1.367-.964,3.4,3.4,0,0,1-.616-2.376c0-.09,0-.174,0-.238,0-.207-.011-.422-.019-.65a11.082,11.082,0,0,1,.27-3.541,1.9,1.9,0,0,1,.759-1.032,1.96,1.96,0,0,1,1.012-.421c.976-.118,1.991-.206,3.075-.266.079-.978.185-1.884.321-2.743A12.042,12.042,0,0,1,60.325,1.3,11.165,11.165,0,0,1,67.858-1.5ZM69.71,1.676A10.124,10.124,0,0,0,67.858,1.5a8.209,8.209,0,0,0-5.542,2.042,9.083,9.083,0,0,0-2.872,5.5,36.875,36.875,0,0,0-.379,3.8l-.073,1.373-1.374.046c-1.278.043-2.446.121-3.549.236a13.316,13.316,0,0,0-.028,1.984c.008.231.016.47.02.7v.007c0,.117,0,.234,0,.347s-.006.262,0,.386c1.129.149,2.3.263,3.5.342l1.4.092v2.279q0,.743-.009,1.492a74.945,74.945,0,0,0,.49,11.355c.275.024.579.035.935.035.288,0,.577-.007.884-.014h0c.175-.005.35-.008.52-.011a9.759,9.759,0,0,0,1.447-.092c.008-1.729-.014-3.478-.036-5.177-.033-2.556-.066-5.2,0-7.817v-.029c.006-.121.006-.269.006-.425V18.463l1.488-.012c1.153-.009,2.321-.026,3.45-.041l.926-.013.216-.255a3.023,3.023,0,0,0,.054-.936c0-.092-.005-.183-.007-.273l0-.15a11.417,11.417,0,0,0-.158-2.016l-.075-.05c-1.506-.129-2.9-.231-4.233-.311l-1.6-.1.2-1.592a12.378,12.378,0,0,1,1.516-4.942A5.1,5.1,0,0,1,69.452,5.18a19.539,19.539,0,0,0,.384-3.162l-.013,0Z" />
                        </g>
                    </svg>
                </a>
<?php
            }

            if ($shareLinkCopy) {
?>
                <p class="shareOption" data-link="<?php echo $shareLinkCopy; ?>" onclick="handleShareButtonClick()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 37.08 37.071">
                        <g transform="translate(0 -0.036)">
                            <path transform="translate(0 -88.699)" d="M19.958,114.362l-5.673,5.674h0a6.018,6.018,0,0,1-8.511-8.51h0l5.673-5.674a2.006,2.006,0,0,0-2.837-2.837l-5.673,5.674h0a10.03,10.03,0,0,0,14.185,14.183h0L22.8,117.2a2.006,2.006,0,0,0-2.837-2.837Z" />
                            <path transform="translate(-88.727 0)" d="M125.808,10.061a10.03,10.03,0,0,0-17.122-7.092h0l-5.673,5.673a2.006,2.006,0,1,0,2.837,2.837l5.673-5.673h0a6.018,6.018,0,0,1,8.511,8.51h0L114.36,19.99a2.006,2.006,0,1,0,2.837,2.837l5.673-5.674h0A9.964,9.964,0,0,0,125.808,10.061Z" />
                            <path transform="translate(-70.353 -70.322)" d="M81.8,95.985a2.006,2.006,0,0,0,2.837,0L95.985,84.637A2.006,2.006,0,0,0,93.148,81.8L81.8,93.148A2.006,2.006,0,0,0,81.8,95.985Z" />
                        </g>
                    </svg>
                </p>
<?php
            }
?>
        </div>
    </div>
</div>