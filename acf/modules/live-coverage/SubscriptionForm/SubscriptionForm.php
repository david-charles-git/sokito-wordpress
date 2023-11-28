<?php
    $formShortCode = "[gravityform id='5' title='false' ajax='true']";
    $backgroundImage = get_stylesheet_directory_uri() . "/assets/images/subcriptionFormBackground.png";
?>
    <section class="SubscriptionForm">
        <!-- <div class="background" style="background-image: url(<?php echo $backgroundImage; ?>);"></div> -->

        <div class="confirmationContainer">
            <div class="background" onclick="handleSubscriptionFormConfirmationClose()"></div>

            <div class="outer">
                <div class="inner">
                    <h6>Thanks for subbing in!</h6>

                    <p>We just sent a confirmation email to <span class="userEmail"></span></p>

                    <button class="closeButton" onclick="handleSubscriptionFormConfirmationClose()">Close</button>
                </div>
            </div>
        </div>

        <div class="outer">
            <div class="background">
                <p>
                    <span>Subscribe</span>
                    <span>Subscribe</span>
                    <span>Subscribe</span>
                    <span>Subscribe</span>
                </p>
            </div>
            <div class="inner">
                <h6>
                    <span>Never miss</span>

                    <span>a thing</span>
                </h6>

                <p>Fancy hearing about new launches, events, and more of this cool stuff? Sign up to our newsletter, and you’ll also <strong>get 10% off your first order</strong>.</p>

                <div class="form">
                    <div class="inner">
                        <div class="emailContainer">
                            <input type="email" placeholder="Email address" onchange="handleSubscriptionFormEmailChange()" />
                            <span class="errorText email">Please enter a valid email address</span>
                        </div>

                        <div class="dropdownContainer" onclick="handleSubscriptionFormDropDownClick()">
                            <p class="currentValue" data-value="all">All email types</p>
                            <span class="errorText emailType">Please select a valid email type</span>

                            <ul class="optionsContainer" data-openClose="open">
                                <li class="active" onclick="handleSubscriptionFormEmailTypeChange()" data-value="all" data-name="all email types">All email types</li>

                                <li onclick="handleSubscriptionFormEmailTypeChange()" data-value="promotionsOffers" data-name="Promotions & offers only">Promotions & offers only</li>

                                <li onclick="handleSubscriptionFormEmailTypeChange()" data-value="newProducts" data-name="New product launches">New product launches</li>

                                <li onclick="handleSubscriptionFormEmailTypeChange()" data-value="other" data-name="Exclusive events, our sustainability journey, and more...">Exclusive events, our sustainability journey, and more...</li>
                            </ul>
                        </div>

                        <button class="submit" onclick="handleSubscriptionFormSubmission()">Subscribe</button>
                    </div>
                </div>

                <div id="subscriptionGForm" style="display: none;">
<?php
                    echo do_shortcode($formShortCode);
?>
                </div>
            </div>
        </div>
    </section>