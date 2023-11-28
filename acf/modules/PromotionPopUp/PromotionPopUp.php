<?php
$formShortCode = "[gravityform id='8' title='false' ajax='true']";
$image = get_stylesheet_directory_uri() . "/assets/images/SOK_signUpForm_image.webp";
?>
<section class="SignUpFormPopUp">
    <div class="background" onclick="handleSignUpFormPopUpClose()"></div>

    <div class="outer">
        <div class="inner">
            <div class="left">
                <div class="background" style="background-image: url(<?php echo $image; ?>)">
                </div>
            </div>

            <div class="right">
                <div class="closeButton">
                    <button onclick="handleSignUpFormPopUpClose()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16.759" height="16.777" viewBox="0 0 16.759 16.777">
                            <g transform="translate(0.796 0.788)">
                                <g transform="translate(0 0.026)">
                                    <path data-name="Path 51" d="M8.026,7.6,15.062.559a.317.317,0,0,0-.006-.445.319.319,0,0,0-.439,0L7.578,7.15.542.114A.314.314,0,0,0,.1.123.319.319,0,0,0,.1.562L7.133,7.6.1,14.634a.312.312,0,0,0-.006.445.314.314,0,0,0,.445.006l.006-.006L7.578,8.043l7.036,7.036a.315.315,0,0,0,.445-.445Z" transform="translate(0 -0.026)" fill="#fff" stroke="#fff" stroke-width="1.5" />
                                </g>
                            </g>
                        </svg>
                    </button>
                </div>

                <div class="content">
                    <h6>
                        <span>Never miss</span>

                        <span>a thing</span>
                    </h6>

                    <p>Fancy hearing about new launches, events, and more of this cool stuff? Sign up to our newsletter, and you’ll also <strong>get 10% off your first order</strong>.</p>

                    <div class="form signUpForm">
                        <div class="inner">
                            <div class="emailContainer">
                                <input type="email" placeholder="Email address" onchange="handleSignUpPopUpFormEmailChange()" />
                                <span class="errorText email">Please enter a valid email address</span>
                            </div>

                            <button class="submit" onclick="handleSignUpPopUpFormSubmission()">Sign up</button>
                        </div>
                    </div>

                    <div id="signUpPopUpGForm" style="display: none;">
                        <?php
                        echo do_shortcode($formShortCode);
                        ?>
                    </div>
                </div>

                <div class="confirmation">
                    <h6>
                        Thanks,<br /> you're all set.
                    </h6>

                    <button onclick="handleSignUpFormPopUpClose()">
                        Close
                    </button>
                </div>
            </div>
</section>

<script>
    function handleSignUpPopUpFormEmailChange() {
        const eventTarget = event.currentTarget || event.target;

        if (!eventTarget) {
            return;
        }

        const parentContainer = eventTarget.closest(".emailContainer");

        if (!parentContainer) {
            return;
        }

        parentContainer.classList.remove("error");

        return;
    }

    function handleSignUpPopUpFormSubmission() {
        const eventTarget = event.currentTarget || event.target;

        if (!eventTarget) {
            return;
        }

        if (eventTarget.classList.contains("loading")) {
            return;
        }

        const form = eventTarget.closest(".signUpForm");
        const signUpForm = document.getElementById("gform_8"); //change

        if (!form || !signUpForm) {
            return;
        }

        const emailContainer = form.getElementsByTagName("INPUT")[0];
        const signUpFormEmailInput = document.getElementById("input_8_1"); //document.getElementById("input_5_1"); PROD

        if (!emailContainer || !signUpFormEmailInput) {
            return;
        }

        const emailValue = emailContainer.value;
        var validEmail = false;
        var validEmailType = false;

        console.log(emailContainer.value, signUpFormEmailInput)

        if (isValidEmail(emailValue)) {
            signUpFormEmailInput.value = emailValue;
            validEmail = true;
            emailContainer.parentElement.classList.remove("error");
        } else {
            emailContainer.parentElement.classList.add("error");
        }

        if (validEmail) {
            eventTarget.classList.add("loading");
            signUpForm.submit();
        }

        return;
    }

    function handleSignUpFormPopUpClose() {
        const eventTarget = event.currentTarget || event.target;

        if (!eventTarget) return;

        const signUpFormPopUpParent = eventTarget.closest(".SignUpFormPopUp");

        if (!signUpFormPopUpParent) return;

        signUpFormPopUpParent.classList.remove("active");

        return;
    }

    function handleSignUpFormPopUpOpen() {
        sessionStorage.setItem("SignUpFormShown", "true");

        const signUpFormPopUpParent = document.getElementsByClassName("SignUpFormPopUp")[0];

        if (!signUpFormPopUpParent) return;

        signUpFormPopUpParent.classList.add("active");

        return;
    }

    function signUpFormTimoutElapsed(timout_ms = 0) {
        console.log(timout_ms, parseInt(sessionStorage.SignUpFormShownTimeStamp), Date.now(), Date.now() - timout_ms > parseInt(sessionStorage.SignUpFormShownTimeStamp));
        if (!timout_ms || !sessionStorage.SignUpFormShownTimeStamp == "true") return false;

        if (Date.now() <= parseInt(sessionStorage.SignUpFormShownTimeStamp) + timout_ms) return false;


        return true;
    }

    window.addEventListener("load", () => {
        const timout_ms = 60000; //1200000;

        if (signUpFormTimoutElapsed(timout_ms) || !sessionStorage.SignUpFormShown == "true") {
            sessionStorage.setItem("SignUpFormShown", "false");
            sessionStorage.setItem("SignUpFormShownTimeStamp", Date.now().toString());

            setTimeout(handleSignUpFormPopUpOpen, 3000);
        }
    })
</script>

<style>

</style>