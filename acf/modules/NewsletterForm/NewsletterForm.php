<?php
    $formShortCode = "[gravityform id='6' title='false' ajax='true']";
    $backgroundImage = get_stylesheet_directory_uri() . "/assets/images/liveCoveragesArticles-backgroundIamge.png";
?>
    <section class="NewsletterForm">
        <div class="background" style="background-image: url(<?php echo $backgroundImage; ?>);"></div>

        <div class="confirmationContainer">
            <div class="background" onclick="handleNewsletterFormConfirmationClose()"></div>

            <div class="outer">
                <div class="inner">
                    <h6>Thanks for subbing in!</h6>

                    <p>We just sent a confirmation email to <span class="userEmail"></span></p>

                    <button class="closeButton" onclick="handleNewsletterFormConfirmationClose()">Close</button>
                </div>
            </div>
        </div>

        <div class="outer">
            <div class="inner">
                <h6>
                    Newsletter
                    <span style="background-image: url(<?php echo get_stylesheet_directory_uri() . "/assets/images/SOK_Underline.png"; ?>);"></span>
                </h6>

                <p>Fancy hearing about new launches, events, and more of this cool stuff? Sign up to our newsletter, and you’ll also <strong>get 10% off your first order</strong>.</p>

                <div class="form">
                    <div class="inner">
                        <div class="emailContainer">
                            <input type="email" placeholder="Email address" onchange="handleNewsletterFormEmailChange()" />
                            <span class="errorText">Please enter a valid email address</span>
                        </div>

                        <button class="submit" onclick="handleNewsletterFormSubmission()">Submit</button>
                    </div>
                </div>

                <div id="newsletterGForm" style="display: none;">
<?php
                    echo do_shortcode($formShortCode);
?>
                </div>
            </div>
        </div>
    </section>

    <script>
        function handleNewsletterFormSubmission() {
            const eventTarget = event.currentTarget || event.target;

            if (!eventTarget) { return; }

            if (eventTarget.classList.contains("loading")) { return; }

            const form = eventTarget.closest(".NewsletterForm");
            const submissionForm = document.getElementById("gform_6");

            if (!form || !submissionForm) { return; }

            const emailContainer = form.getElementsByTagName("INPUT")[0];
            const submissionFormEmailInput = document.getElementById("input_6_5");
            const userEmail = form.getElementsByClassName("userEmail")[0];

            if (!emailContainer || !submissionFormEmailInput || !userEmail) { return; }

            const emailValue = emailContainer.value;
            var validEmail = false;

            if (isValidEmail(emailValue)) {
                userEmail.innerText = emailValue;
                submissionFormEmailInput.value = emailValue;
                validEmail = true;
                emailContainer.parentElement.classList.remove("error");

            } else {
                emailContainer.parentElement.classList.add("error");

            }

            if (validEmail) {
                eventTarget.classList.add("loading");
                submissionForm.submit();
            }

            return;
        }
        function handleNewsletterFormEmailChange() {
            const eventTarget = event.currentTarget || event.target;

            if (!eventTarget) { return; }

            const parentContainer = eventTarget.closest(".emailContainer");

            if (!parentContainer) { return; }

            parentContainer.classList.remove("error");

            return;
        }
        function handleNewsletterFormConfirmationClose() {
            const eventTarget = event.currentTarget || event.target;

            if (!eventTarget) { return; }

            const submissionForm = eventTarget.closest(".NewsletterForm");

            if (!submissionForm) { return; }

            submissionForm.classList.add("complete");

            return; 
        }
    </script>

    <style>
        section.NewsletterForm {
            position: relative;
        }
        section.NewsletterForm > .background {
            position: absolute;
            top: 0;
            width: 100%;
            height: 100%;
            background-position: center center;
            background-size: cover;
            background-repeat: no-repeat;
        }
        section.NewsletterForm > .confirmationContainer {
            display: none;
            opacity: 0;
            transition: opacity 200ms ease;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 10;
            height: 100vh;
            background-color: rgba(0, 0, 0, 0.4);
        }
        section.NewsletterForm.submitted > .confirmationContainer {
            display: block;
            opacity: 1;
        }
        section.NewsletterForm.submitted.complete > .confirmationContainer {
            display: none;
            opacity: 0;
        }
        section.NewsletterForm > .confirmationContainer > .background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            z-index: 2;
        }
        section.NewsletterForm > .confirmationContainer > .outer {
            max-width: 1920px;
            padding: 10vh 50px;
            margin: 0 auto;
            height: 100vh;
            position: relative;
            display: grid;
            align-content: center;
            justify-content: center;
            align-items: center;
            grid-template-columns: 1fr;
        }
        section.NewsletterForm > .confirmationContainer > .outer > .inner {
            max-width: 800px;
            margin: 0 auto;
            padding: 40px;
            border-radius: 30px;
            background-color: black;
            width: 100%;
            position: relative;
            z-index: 3;
        }
        section.NewsletterForm > .confirmationContainer > .outer > .inner > h6 {
            margin-bottom: 20px;
            font-size: 34px;
            line-height: 1.1;
            letter-spacing: 0;
            font-weight: bold;
            font-family: 'Gza';
            color: #FC4F00;
        }
        section.NewsletterForm > .confirmationContainer > .outer > .inner > p {
            font-family: 'Univers LT Roman';
            font-size: 18px;
            line-height: 1.1;
            letter-spacing: 0.01em;
            color: #fff;
            margin-bottom: 20px;
        }
        section.NewsletterForm > .confirmationContainer > .outer > .inner > .closeButton {
            font-family: 'Univers LT Roman';
            font-size: 18px;
            font-weight: bold;
            line-height: 1.1;
            letter-spacing: 0.01em;
            color: #fff;
            transition: color 200ms ease;
            background: none;
            border: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            cursor: pointer;
            padding: 0;
        }
        section.NewsletterForm > .outer {
            max-width: 1920px;
            padding: 0 50px;
            margin: 0 auto;
            position: relative;
        }
        section.NewsletterForm > .outer > .inner {
            max-width: 1000px;
            margin: 0 auto;
            display: grid;
            grid-gap: 20px;
            grid-template-columns: 1fr 1fr;
            grid-template-areas: 
                "heading heading"
                "content form";
            padding: 50px 0;
        }
        section.NewsletterForm > .outer > .inner > h6 {
            grid-area: heading;
            font-size: 48px;
            line-height: 1.1;
            letter-spacing: 0.01em;
            font-family: 'Extenda Trial 40 Hecto';
            color: #fff;
            font-weight: 400;
            margin: 0 auto;
            text-align: center;
            display: inline-block;
            width: 140px;
            position: relative;
        }
        section.NewsletterForm > .outer > .inner > h6 > span{
            display: block;
            position: absolute;
            width: 100%;
            height: 20px;
            background-position: center;
            background-size: contain;
            background-repeat: no-repeat;
            left: 0;
            bottom: -10px;
        }
        section.NewsletterForm > .outer > .inner > p {
            grid-area: content;
            font-size: 18px;
            line-height: 1.1;
            letter-spacing: 0.01em;
            font-family: 'Univers LT Roman';
            color: #fff;
        }
        section.NewsletterForm > .outer > .inner > .form {
            grid-area: form;
        }
        section.NewsletterForm > .outer > .inner > .form > .inner {
            position: relative;
        }
        section.NewsletterForm > .outer > .inner > .form > .inner > .emailContainer {
            
        }
        section.NewsletterForm > .outer > .inner > .form > .inner > .emailContainer > input {
            font-family: 'Gza';
            font-size: 16px;
            line-height: 1.1;
            letter-spacing: 0;
            color: #000;
            padding: 1rem 2rem;
            border-radius: 30px;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border: 1px solid #FFFFFF;
            transition: all 200ms ease;
            width: 100%;
            height: 53px;
        }
        section.NewsletterForm > .outer > .inner > .form > .inner > .emailContainer.error > input {
            border-color: red;
        }
        section.NewsletterForm > .outer > .inner > .form > .inner > .emailContainer > .errorText {
            font-family: 'Gza';
            font-size: 12px;
            line-height: 1.1;
            letter-spacing: 0;
            color: #fff;
            padding: 16px 32px;
            position: absolute;
            bottom: 0;
            left: 0;
            display: block;
            width: 100%;
            transform: translateY(100%);
            opacity: 0;
            transition: opacity 200ms ease;
            overflow: hidden;
        }
        section.NewsletterForm > .outer > .inner > .form > .inner > .emailContainer.error > .errorText {
            opacity: 1;
        }
        section.NewsletterForm > .outer > .inner > .form > .inner > .submit {
            grid-area: submit;
            font-family: 'Gza';
            font-size: 18px;
            font-weight: bold;
            line-height: 1.3;
            letter-spacing: 0.05em;
            color: #FFF;
            padding: 1rem 2rem;
            border-radius: 30px;
            margin: 0;
            border: none;
            background-color: #FC4F00;
            position: relative;
            opacity: 1;
            transition: opacity 200ms ease;
            position: absolute;
            top: 0;
            right: 0;
            height: 53px;
            min-width: 180px;
        }
        section.NewsletterForm > .outer > .inner > .form > .inner > .submit::after {
            content: "Submitting...";
            font-family: 'Gza';
            font-size: 18px;
            font-weight: bold;
            line-height: 1.3;
            letter-spacing: 0.05em;
            color: #FFF;
            padding: 1rem 2rem;
            border-radius: 30px;
            margin: 0;
            border: none;
            background-color: #FC4F00;
            position: absolute;
            opacity: 0;
            transition: opacity 200ms ease;
            top: 0;
            left: 0;
            display: block;
            width: 100%;
        }
        section.NewsletterForm > .outer > .inner > .form > .inner > .submit.loading {
            cursor: not-allowed;
            opacity: 0.5;
        }
        section.NewsletterForm > .outer > .inner > .form > .inner > .submit.loading::after {
            opacity: 1;
            cursor: not-allowed;
        }

        @media (max-width: 1080px) {
            section.NewsletterForm > .confirmationContainer > .outer {
                padding: 10vh 20px;
            }
            section.NewsletterForm > .confirmationContainer > .outer > .inner > h6 {
                font-size: 26px;
            }
            section.NewsletterForm > .outer {
                padding: 0 20px;
            }
            section.NewsletterForm > .outer > .inner {
                max-width: 500px;
                grid-template-columns: 1fr;
                grid-template-areas:
                    "heading"
                    "content"
                    "form";
                padding: 50px 0;
            }
            section.NewsletterForm > .outer > .inner > h6 {
                font-size: 40px;
            }
            section.NewsletterForm > .outer > .inner > p {
                font-size: 16px;
            }
        }

        @media (max-width: 500px) {
            section.NewsletterForm > .outer > .inner > .form > .inner > .submit {
                position: relative;
                margin-top: 20px;
                width: 100%;
            }

        }
    </style>