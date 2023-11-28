/* Read More Functions  */
function toggleReadMore(event = null) {
    if (!event) { return; }

    const currentTarget = event.currentTarget || event.target;
    const parent = currentTarget.parentElement;

    if (!parent.classList.contains("readMore")) { return; }

    const readMoreLess = currentTarget.getAttribute("data-readMoreLess");
    var newReadMoreLess = readMoreLess === "... Read more" ? "Read less" : "... Read more";

    if (readMoreLess === "... Read more") {
        parent.classList.add("active");

    } else {
        parent.classList.remove("active");
    }

    currentTarget.setAttribute("data-readMoreLess", newReadMoreLess);
}
function readMoreLess() {
    const eventTarget = event.currentTarget || event.target;

    if (!eventTarget) { return; }

    const readMoreParent = eventTarget.closest(".readMoreParent");

    if (!readMoreParent) { return; }

    const readMoreContainer = readMoreParent.getElementsByClassName("readMoreContainer")[0];

    if (!readMoreContainer) { return; }

    const readMoreOpenClose = readMoreParent.getAttribute("data-openClose");
    const readMoreElements = readMoreContainer.getElementsByTagName("P");
    var openClose = "open";
    var buttonInnerText = "Read more";
    var elmtDisplay = null;

    if (readMoreOpenClose == "open") {
        openClose = "close";
        buttonInnerText = "Read less";
        elmtDisplay = "inline";
    }

    readMoreParent.style.opacity = 0;
    readMoreParent.focus();

    setTimeout(function() {
        for (var a = 0; a < readMoreElements.length; a++) {
            if (readMoreElements[a] == eventTarget) { break; }
    
            readMoreElements[a].style.display = elmtDisplay;
        }

        readMoreParent.setAttribute("data-openClose", openClose);
        eventTarget.innerText = buttonInnerText;
        eventTarget.classList.toggle("active");
        readMoreParent.style.height = readMoreContainer.clientHeight + "px";
    }, 200);

    setTimeout(function() { readMoreParent.style.opacity = 1; }, 210);

    return;
}
function readMoreOnResizeListener() {
    const readMoreParents = document.getElementsByClassName("readMoreParent");

    for (var a = 0; a < readMoreParents.length; a++) {
        const readMoreContainer = readMoreParents[a].getElementsByClassName("readMoreContainer")[0];

        if (!readMoreContainer) { break; }

        readMoreParents[a].style.height = readMoreContainer.clientHeight + "px";
    }

    return;
}
window.addEventListener("resize", readMoreOnResizeListener);

/* Header Functions */
function handleHeaderMobileMenuClick() {
    const eventTarget = event.currentTarget || event.target;

    if (!eventTarget) { return; }

    const header = eventTarget.closest(".header");

    if (!header) { return; }

    header.classList.toggle("active");

    return;
}
function closeHeaderMobileMenu() {
    const header = document.getElementsByClassName("header")[0];
    
    if (!header) { return; }

    header.classList.remove("active");

    return;
}
function closeAllHeaderSubmenus() {
    const header = document.getElementsByClassName("header")[0];

    if (!header) { return; }

    const navigationElements = header.getElementsByClassName("navigationOption");

    for (var a = 0; a < navigationElements.length; a++) {
        navigationElements[a].classList.remove("active");
    }

    return;
}
function handleHeaderNavigationOptionClick() {
    const eventTarget = event.currentTarget || event.target;

    if (!eventTarget) { return; }

    const header = eventTarget.closest(".header");

    if (!header) { return; }

    closeAllHeaderSubmenus();

    eventTarget.classList.add("active");

    return;
}
function headerNavigationOnResizeListener() {
    closeHeaderMobileMenu();
    closeAllHeaderSubmenus();

    return;
}
window.addEventListener("resize", headerNavigationOnResizeListener);

/* Video Functions */
function handlePlayPauseVideo() {
    const eventTarget = event.currentTarget || event.target;

    if (!eventTarget) { return; }

    if (typeof stopCarouselAutoShift === "function") { stopCarouselAutoShift(eventTarget); }

    const videoContainer = eventTarget.closest(".videoContainer");

    if (!videoContainer) { return; }

    const video = videoContainer.getElementsByTagName("VIDEO")[0];

    if (!video) { return; }

    const playPause = video.getAttribute("data-playPause");

    if (playPause === "play") {
        video.play();
        video.setAttribute("data-playPause", "pause");
        videoContainer.classList.add("active");
    }

    if (playPause === "pause") {
        video.pause();
        video.setAttribute("data-playPause", "play");
        videoContainer.classList.remove("active");
    }

    return;
}

/* Carousel Functions */
function handleCarouselLeftButtonPosition() {
    const carousels = document.getElementsByClassName("Carousel");

    for (var a = 0; a < carousels.length; a++) {
        const leftButton = carousels[a].getElementsByClassName("carouselButton left")[0];

        if (!leftButton) { break; }

        const windowWidth = window.innerWidth; //px
        const carouselWidth = 1320; //px
        const leftButtonPosition = ((-1) * (windowWidth - carouselWidth)) / 2; //px
        const leftButtonDispaly = leftButtonPosition > 0 ? "none" : "block";

        leftButton.style.display = leftButtonDispaly;
        leftButton.style.left = leftButtonPosition + "px";
    }

    return;
}
function handleCarouselRightButtonPosition() {
    const carousels = document.getElementsByClassName("Carousel");

    for (var a = 0; a < carousels.length; a++) {
        const rightButton = carousels[a].getElementsByClassName("carouselButton right")[0];

        if (!rightButton) { break; }

        const windowWidth = window.innerWidth; //px
        const carouselWidth = 1320; //px
        const rightButtonPosition = ((-1) * (windowWidth - carouselWidth)) / 2; //px
        const rightButtonDispaly = rightButtonPosition > 0 ? "none" : "block";

        rightButton.style.display = rightButtonDispaly;
        rightButton.style.right = rightButtonPosition + "px";
    }

    return;
}
function handleCarouselLeftButtonClick() {
    const eventTarget = event.currentTarget || event.target;

    pauseAllCarouselVideos(eventTarget);
    stopCarouselAutoShift(eventTarget);
    shiftCarouselLeft(eventTarget);

    return;
}
function handleCarouselRightButtonClick() {
    const eventTarget = event.currentTarget || event.target;
    
    pauseAllCarouselVideos(eventTarget);
    stopCarouselAutoShift(eventTarget);
    shiftCarouselRight(eventTarget);

    return;
}
function handleCarouselNaviagationTabClick() {
    const eventTarget = event.currentTarget || event.target;

    pauseAllCarouselVideos(eventTarget);
    stopCarouselAutoShift(eventTarget);
    navigateCarousel(event);

    return;
}
function handleCarouselTouchStart() {
    const touchX = event.touches[0].clientX;

    if (isNaN(touchX)) { return; }

    globalCarouselTouchX = touchX

    return;
}
function handleCarouselTouchEnd() {
    const eventTarget = event.currentTarget || event.target;
    const touchX = event.changedTouches[0].clientX;
    
    if (isNaN(touchX) || !eventTarget) { return; }

    if (globalCarouselTouchX > touchX) {
        pauseAllCarouselVideos(eventTarget);
        shiftCarouselRight(eventTarget);

    }
    
    if (globalCarouselTouchX < touchX) {
        pauseAllCarouselVideos(eventTarget);
        shiftCarouselLeft(eventTarget);
        
    }

    globalCarouselTouchX = 0;
    stopCarouselAutoShift(eventTarget);

    return;
}
function shiftCarouselRight(eventTarget = null) {
    if (!eventTarget) { return; }

    const carousel = eventTarget.closest(".Carousel");

    if (!carousel) { return; }

    const carsouselItems = carousel.getElementsByClassName("item");

    for (var a = 0; a < carsouselItems.length; a++) {
        if (carsouselItems[a].classList.contains("active")) {
            const newIndex = a + 1 >= carsouselItems.length ? 0 : a + 1;

            shiftCarouselToFrame(carousel, newIndex);

            return;
        }
    }

    return;
}
function shiftCarouselLeft(eventTarget = null) {
    if (!eventTarget) { return; }

    const carousel = eventTarget.closest(".Carousel");

    if (!carousel) { return; }

    const carsouselItems = carousel.getElementsByClassName("item");

    for (var a = 0; a < carsouselItems.length; a++) {
        if (carsouselItems[a].classList.contains("active")) {
            const newIndex = a - 1 < 0 ? 0 : a - 1;

            shiftCarouselToFrame(carousel, newIndex);
            
            return;
        }
    }

    return;
}
function navigateCarousel(event = null) {
    if (!event) { return; }

    const eventTarget = event.currentTarget || event.target;
    const carousel = eventTarget.closest(".Carousel");

    if (!carousel) { return; }
    
    const tabIndex = eventTarget.getAttribute("data-id") || 0;
    
    shiftCarouselToFrame(carousel, tabIndex);

    return;
}
function shiftCarouselToFrame(carousel= null, frame = 0) {
    if (!carousel) { return; }

    const carouselInner = carousel.getElementsByClassName("inner")[0];

    if (!carouselInner) { return; }

    var carouselItemWidth = 0; //px
    const carsouselItems = carousel.getElementsByClassName("item");
    const tabItems = carousel.getElementsByClassName("naigationTab");
    const gridGap = !isNaN(parseFloat(carousel.getAttribute("data-gap"))) ? parseFloat(carousel.getAttribute("data-gap")) : 20 ; //px

    console.log(gridGap);

    for (var a = 0; a < carsouselItems.length; a++) {
        if (carsouselItems[a].classList.contains("active")) {
            carouselItemWidth = carsouselItems[a].clientWidth + gridGap; //px
        }
        
        carsouselItems[a].classList.remove("active");
    }

    for (var a = 0; a < tabItems.length; a++) {
        tabItems[a].classList.remove("active");
    }

    const transformXValue = frame * carouselItemWidth; //px

    carouselInner.style.transform = "translateX(-" + ( transformXValue ) + "px)";
    carsouselItems[frame].classList.add("active");
    tabItems[frame].classList.add("active");

    const leftButton = carousel.getElementsByClassName("carouselButton left")[0];

    if (!leftButton) { return; }

    if (frame == 0) {
        leftButton.classList.remove("active");

    } else {
        leftButton.classList.add("active");
    }

    return;
}
function autoShiftCarousels() {
    const carousels = document.getElementsByClassName("Carousel");

    for (var a = 0; a < carousels.length; a++) {
        const autoShift = carousels[a].getAttribute("data-autoShift");
        const carouselInner = carousels[a].getElementsByClassName("inner")[0];

        if (autoShift == "true" && carouselInner) { shiftCarouselRight(carouselInner); }
    }

    return;
}
function stopCarouselAutoShift(eventTarget = null) {
    if (!eventTarget) { return; }

    const carousel = eventTarget.closest(".Carousel");
    
    if (!carousel) { return; }

    carousel.setAttribute("data-autoShift", "false");

    return;
}
function stopCarouselAutoShiftInterval() {
    clearInterval(carouselAutoShiftInterval);
    
    return;
}
function pauseAllCarouselVideos(eventTarget = null) {
    if (!eventTarget) { return; }

    const carousel = eventTarget.closest(".Carousel");

    if (!carousel) { return; }

    const carsouselVideoItems = carousel.getElementsByClassName("videoItem");

    for (var a = 0; a < carsouselVideoItems.length; a++) {
        const video = carsouselVideoItems[a].getElementsByTagName("VIDEO")[0];

        if (!video) { break; }

        const videoContainer = video.closest(".videoContainer");

        video.pause();
        video.setAttribute("data-playPause", "play");
        videoContainer.classList.remove("active");
    }

    return;
}
function carouselIframeListener() {
    if (document.activeElement === document.querySelector('IFRAME')) {
        stopCarouselAutoShift(document.activeElement);
    }

    window.removeEventListener('blur', carouselIframeListener);

    return;
}
function carouselOnLoadListener() {
    handleCarouselLeftButtonPosition();
    handleCarouselRightButtonPosition();

    return;
}
function carouselOnResizeListener()  {
    handleCarouselLeftButtonPosition();
    handleCarouselRightButtonPosition();

    return;
}
focus();
var globalCarouselTouchX = 0;
const carouselAutoShiftInterval = setInterval(autoShiftCarousels, 3000);
window.addEventListener("blur", carouselIframeListener);
window.addEventListener("load", carouselOnLoadListener);
window.addEventListener("resize", carouselOnResizeListener);

/* Scroll Carousel Functions */
function handleScrollCarouselLeftButtonPosition() {
    const carousels = document.getElementsByClassName("ScrollCarousel");

    for (var a = 0; a < carousels.length; a++) {
        const leftButton = carousels[a].getElementsByClassName("ScrollCarouselButton left")[0];

        if (!leftButton) { break; }

        const windowWidth = window.innerWidth; //px
        const carouselWidth = 1920; //px
        const leftButtonPosition = (windowWidth - carouselWidth) / 2 < 0 ? 0 : (windowWidth - carouselWidth) / 2; //px

        leftButton.style.left = leftButtonPosition + "px";
    }

    return;
}
function handleScrollCarouselRightButtonPosition() {
    const carousels = document.getElementsByClassName("ScrollCarousel");

    for (var a = 0; a < carousels.length; a++) {
        const rightButton = carousels[a].getElementsByClassName("ScrollCarouselButton right")[0];

        if (!rightButton) { break; }

        const windowWidth = window.innerWidth; //px
        const carouselWidth = 1920; //px
        const rightButtonPosition = (windowWidth - carouselWidth) / 2 < 0 ? 0 : ((1) * (windowWidth - carouselWidth)) / 2; //px

        rightButton.style.right = rightButtonPosition + "px";
    }

    return;
}
function handleScrollCarouselLeftButtonClick() {
    const eventTarget = event.currentTarget || event.target;

    shiftScrollCarouselLeft(eventTarget);

    return;
}
function handleScrollCarouselRightButtonClick() {
    const eventTarget = event.currentTarget || event.target;
    
    shiftScrollCarouselRight(eventTarget);

    return;
}
function shiftScrollCarouselLeft(eventTarget = null) {
    if (!eventTarget) { return; }

    const scrollCarousel = eventTarget.closest(".ScrollCarousel");

    if (!scrollCarousel) { return; }

    const carouselOuter = scrollCarousel.getElementsByClassName("outer")[0];

    if (!carouselOuter) { return; }

    const carouselItems = scrollCarousel.getElementsByClassName("item");
    const leftButton = scrollCarousel.getElementsByClassName("ScrollCarouselButton left")[0];
    const rightButton = scrollCarousel.getElementsByClassName("ScrollCarouselButton right")[0];

    if (!leftButton || !rightButton || !carouselItems.length) { return; }

    const carouselScrollAmount = carouselItems[0].clientWidth + 20; //px
    const carouselScrollLeft = carouselOuter.scrollLeft; //px
    const newScrollLeft = carouselScrollLeft - carouselScrollAmount < 0 ? 0 : carouselScrollLeft - carouselScrollAmount; //px

    rightButton.classList.add("active");
    carouselOuter.scrollTo(
        {
            top: 0, //px
            left: newScrollLeft, //px
            behavior: 'smooth'
        }
    );

    if (newScrollLeft == 0) { leftButton.classList.remove("active"); }

    return;
}
function shiftScrollCarouselRight(eventTarget = null) {
    if (!eventTarget) { return; }

    const scrollCarousel = eventTarget.closest(".ScrollCarousel");

    if (!scrollCarousel) { return; }

    const carouselOuter = scrollCarousel.getElementsByClassName("outer")[0];

    if (!carouselOuter) { return; }

    const carouselItems = scrollCarousel.getElementsByClassName("item");
    const leftButton = scrollCarousel.getElementsByClassName("ScrollCarouselButton left")[0];
    const rightButton = scrollCarousel.getElementsByClassName("ScrollCarouselButton right")[0];

    if (!leftButton || !rightButton || !carouselItems.length) { return; }

    const carouselScrollAmount = carouselItems[0].clientWidth + 20; //px
    const carouselScrollLeft = carouselOuter.scrollLeft; //px
    const newScrollLeft = carouselScrollLeft + carouselScrollAmount; //px
    var scrollMax = 0; //px

    for (var a = 0; a < carouselItems.length; a++) {
        scrollMax += carouselItems[a].clientWidth; //px
    }

    scrollMax += (carouselItems.length - 1) * 20; //px
    scrollMax += parseFloat(carouselOuter.style.paddingLeft); //px
    scrollMax -= carouselOuter.clientWidth; //px

    leftButton.classList.add("active");
    carouselOuter.scrollTo(
        {
            top: 0, //px
            left: newScrollLeft, //px
            behavior: 'smooth'
        }
    );

    // if (newScrollLeft >= scrollMax) { rightButton.classList.remove("active"); }

    return;
}
function setScrollCarouselOuterPaddingRight() {
    const scrollCarousels = document.getElementsByClassName("ScrollCarousel");

    for (var a = 0; a < scrollCarousels.length; a++) {
        const outerContainer = scrollCarousels[a].getElementsByClassName("outer")[0];

        if (!outerContainer) { break; }

        const windowWidth = window.innerWidth; //px
        const mobileScreenBreak = 1080; //px
        const minPadding = windowWidth <= mobileScreenBreak ? 20 : 50; //px
        const maxWidth = 1320; //px
        const outerContainerPaddingLeft = ((windowWidth - maxWidth) / 2) > minPadding ? ((windowWidth - maxWidth) / 2) : minPadding; //px

        outerContainer.style.paddingLeft = outerContainerPaddingLeft + "px";
    }

    return;
}
function handleScrollCarouselOnScroll() {
    const eventTarget = event.currentTarget || event.target;
    if (!eventTarget) { return; }

    const scrollCarousel = eventTarget.closest(".ScrollCarousel");
    if (!scrollCarousel) { return; }

    const outerContainer = scrollCarousel.getElementsByClassName("outer")[0];
    if (!outerContainer) { return; }

    const carouselItems = scrollCarousel.getElementsByClassName("item");
    if (carouselItems.length < 1) { return; }

    var activeCarouselItemIndex = 0;
    var activeCarouselItemWidth = 0; //px

    for (var a = 0; a < carouselItems.length; a++) {
        if (carouselItems[a].classList.contains("active")) {
            activeCarouselItemIndex = a;
            activeCarouselItemWidth = carouselItems[a].clientWidth; //px

            break;
        }
    }

    const previousScrollValue = parseFloat(outerContainer.getAttribute("data-scrollValue")); //px
    const scrollLeft = eventTarget.scrollLeft; //px
    const scrollDirectionIsRight = scrollLeft > previousScrollValue ? true : false;
    const rightBound = (activeCarouselItemIndex * (activeCarouselItemWidth + 20)) + (activeCarouselItemWidth / 2); //px
    const leftBound = (activeCarouselItemIndex * (activeCarouselItemWidth + 20)) - (activeCarouselItemWidth / 2); //px

    outerContainer.setAttribute("data-scrollValue", scrollLeft);

    if (scrollDirectionIsRight && scrollLeft > rightBound && carouselItems[activeCarouselItemIndex + 1]) {
        carouselItems[activeCarouselItemIndex].classList.remove("active");
        carouselItems[activeCarouselItemIndex + 1].classList.add("active");

        return;
    }

    if (!scrollDirectionIsRight && scrollLeft < leftBound && carouselItems[activeCarouselItemIndex - 1]) {
        carouselItems[activeCarouselItemIndex].classList.remove("active");
        carouselItems[activeCarouselItemIndex - 1].classList.add("active");

        return;
    }

    return;            
}
function setScrollCarouselOuterScrollListener() {
    const scrollCarousels = document.getElementsByClassName("ScrollCarousel");

    for (var a = 0; a < scrollCarousels.length; a++) {
        const outerContainer = scrollCarousels[a].getElementsByClassName("outer")[0];

        if (!outerContainer) { break; }

        outerContainer.addEventListener("scroll",  () => {
            handleScrollCarouselOnScroll();
        });
    }

    return;
}
function scrollCarouselOnLoadListener() {
    setScrollCarouselOuterPaddingRight();
    setScrollCarouselOuterScrollListener();
    handleScrollCarouselLeftButtonPosition();
    handleScrollCarouselRightButtonPosition();

    return;
}
function scrollCarouselOnResizeListener()  {
    setScrollCarouselOuterPaddingRight();
    setScrollCarouselOuterScrollListener();
    handleScrollCarouselLeftButtonPosition();
    handleScrollCarouselRightButtonPosition();

    return;
}
window.addEventListener("load", scrollCarouselOnLoadListener);
window.addEventListener("resize", scrollCarouselOnResizeListener);

/* Subscription Form Functions */
function handleSubscriptionFormDropDownClick() {
    const eventTarget = event.currentTarget || event.target;

    if (!eventTarget) { return; }

    openSubscriptionFormCloseDropDown(eventTarget);

    return;
}
function openSubscriptionFormCloseDropDown(dropdown = null) {
    if (!dropdown) { return; }

    const optionsContainer = dropdown.getElementsByClassName("optionsContainer")[0];
    
    if (!optionsContainer) { return; }

    const openClose = optionsContainer.getAttribute("data-openClose");
    var optionsHeight = 0; //px

    if (openClose == "open") {
        const options = optionsContainer.getElementsByTagName("LI");

        for (var a = 0; a < options.length; a++) {
            const optionHeight = options[a].clientHeight; //px

            optionsHeight += optionHeight;
        }

        optionsContainer.setAttribute("data-openClose", "close");
        optionsContainer.classList.add("active");
        dropdown.classList.add("active");

    } else if (openClose == "close") {
        optionsContainer.setAttribute("data-openClose", "open");
        optionsContainer.classList.remove("active");
        dropdown.classList.remove("active");
    }

    optionsContainer.style.height = optionsHeight + "px";

    return;
}
function handleSubscriptionFormEmailTypeChange() {
    const eventTarget = event.currentTarget || event.target;

    if (!eventTarget) { return; }

    const emailTypeValue = eventTarget.getAttribute("data-value");
    const emailTypeName = eventTarget.getAttribute("data-name");
    const dropdownContainer = eventTarget.closest(".dropdownContainer");

    if (!dropdownContainer || !emailTypeName || !emailTypeValue) { return; }

    const currentValue = dropdownContainer.getElementsByClassName("currentValue")[0];

    if (!currentValue) { return; }

    if (!isValidEmailType(emailTypeValue)) {
        dropdownContainer.classList.add("error");

        return;
    }

    const options = dropdownContainer.getElementsByTagName("LI");

    for (var a = 0; a < options.length; a++) {
        options[a].classList.remove("active");
    }

    eventTarget.classList.add("active");
    dropdownContainer.classList.remove("error");
    currentValue.setAttribute("data-value", emailTypeValue);
    currentValue.innerText = emailTypeName;

    return;
}
function handleSubscriptionFormSubmission() {
    console.log("testing testing");
    const eventTarget = event.currentTarget || event.target;

    if (!eventTarget) { return; }

    if (eventTarget.classList.contains("loading")) { return; }

    const form = eventTarget.closest(".SubscriptionForm");
    const submissionForm = document.getElementById("gform_5");
    console.log(form, submissionForm);

    if (!form || !submissionForm) { return; }

    const emailContainer = form.getElementsByTagName("INPUT")[0];
    const emailTypeContainer = form.getElementsByClassName("currentValue")[0];
    const submissionFormEmailInput = document.getElementById("field_5_1"); //document.getElementById("input_5_1"); PROD
    const submissionFormEmailTypeInput = document.getElementById("input_5_3"); //document.getElementById("input_5_3"); PROD
    const userEmail = form.getElementsByClassName("userEmail")[0];
    console.log(emailContainer, emailTypeContainer, submissionFormEmailInput, submissionFormEmailTypeInput, userEmail);

    if (!emailContainer || !emailTypeContainer || !submissionFormEmailInput || !submissionFormEmailTypeInput || !userEmail) { return; }

    const emailValue = emailContainer.value;
    const emailTypeValue = emailTypeContainer.getAttribute("data-value");
    var validEmail = false;
    var validEmailType = false;
    console.log(emailValue, emailTypeValue, validEmail, validEmailType);

    if (isValidEmail(emailValue)) {
        userEmail.innerText = emailValue;
        submissionFormEmailInput.value = emailValue;
        validEmail = true;
        emailContainer.parentElement.classList.remove("error");

    } else {
        emailContainer.parentElement.classList.add("error");

    }

    if (isValidEmailType(emailTypeValue)) {
        submissionFormEmailTypeInput.value = emailTypeValue;
        validEmailType = true;
        emailTypeContainer.parentElement.classList.remove("error");

    } else {
        emailTypeContainer.parentElement.classList.add("error");

    }

    if (validEmail && validEmailType) {
        eventTarget.classList.add("loading");
        submissionForm.submit();
    }

    return;
}
function handleSubscriptionFormEmailChange() {
    const eventTarget = event.currentTarget || event.target;

    if (!eventTarget) { return; }

    const parentContainer = eventTarget.closest(".emailContainer");

    if (!parentContainer) { return; }

    parentContainer.classList.remove("error");

    return;
}
function isValidEmail(email = null) {
    if (!email) { return false; }

    var validRegex = new RegExp(/[^\s@]+@[^\s@]+\.[^\s@]+/, "gm");

    if (validRegex.test(email)) { return true; }

    return false;
}
function isValidEmailType(emailType = null) {
    if (!emailType) { return false; }

    return true;
}
function handleSubscriptionFormConfirmationClose() {
    const eventTarget = event.currentTarget || event.target;

    if (!eventTarget) { return; }

    const submissionForm = eventTarget.closest(".SubscriptionForm");

    if (!submissionForm) { return; }

    submissionForm.classList.add("complete");

    return; 
}

/* Gform Conformation Functions */
function gform_confirmation_loaded_OutOfStickNotification() {
    const outOfStockForm = document.getElementsByClassName("outOfStockForm")[0];
    
    if (!outOfStockForm) { return; }

    const formContainer = outOfStockForm.closest(".OutOfStockForm");

    if (!formContainer) { return; }

    const submitButton = formContainer.getElementsByClassName("submit")[0];

    if (!submitButton) { return; }

    formContainer.classList.add("submitted");
    submitButton.classList.remove("loading");

    return;
}
function gform_confirmation_loaded_NewsletterForm() {
    const newsLetterForm = document.getElementsByClassName("newsLetterForm")[0];

    if (!newsLetterForm) { return; }

    const formContainer = newsLetterForm.closest(".NewsletterForm");

    if (!formContainer) { return; }

    const submitButton = formContainer.getElementsByClassName("submit")[0];

    if (!submitButton) { return; }

    formContainer.classList.add("submitted");
    submitButton.classList.remove("loading");

    return;
}
function gform_confirmation_loaded_SubscriptionForm() {
    const submissionForm = document.getElementsByClassName("subscriptionForm")[0];

    if (!submissionForm) { return; }

    const formContainer = submissionForm.closest(".SubscriptionForm");

    if (!formContainer) { return; }

    const submitButton = formContainer.getElementsByClassName("submit")[0];

    if (!submitButton) { return; }

    formContainer.classList.add("submitted");
    submitButton.classList.remove("loading");

    return;
}
function gform_confirmation_loaded_SignUpForm() {
    const newsLetterForm = document.getElementsByClassName("signUpForm")[0];

    if (!newsLetterForm) {
        return;
    }

    const formContainer = newsLetterForm.closest(".SignUpFormPopUp");

    if (!formContainer) {
        return;
    }

    const submitButton = formContainer.getElementsByClassName("submit")[0];

    if (!submitButton) {
        return;
    }

    formContainer.classList.add("submitted");
    submitButton.classList.remove("loading");

    return;
}
jQuery(document).ready(function() {
    jQuery(document).on('gform_confirmation_loaded', function(event, formId) {    
        if (!event) { return; }

        console.log(formId);

        if (formId === 5) {
            gform_confirmation_loaded_SubscriptionForm();
            
        } else if (formId === 6) {
            gform_confirmation_loaded_NewsletterForm();

        } else if (formId === 7) {
            gform_confirmation_loaded_OutOfStickNotification();

        } else if (formId === 9) {
            gform_confirmation_loaded_SignUpForm();
        }
    
        return;
    })
});

/* Share Button Functions */
function copyToClipBoard(content = null) {
    if (!content) { return; }

    navigator.clipboard.writeText(content);

    alert("Article Link coppied to clipboard: " + content);

    return
}
function handleShareButtonClick() {
    const eventTarget = event.currentTarget || event.target;

    if (!eventTarget) { return; }

    const dataLink = eventTarget.getAttribute("data-link");

    if (dataLink) { copyToClipBoard(dataLink); }   

    toggleShareButtonActive(eventTarget);

    return;
}
function toggleShareButtonActive(eventTarget = null) {
    if (!eventTarget) { return; }

    const shareButtonContainer = eventTarget.closest(".shareButtonContainer");

    if (!shareButtonContainer) { return; }

    const shareOptionContainer = shareButtonContainer.getElementsByClassName("shareOptionContainer")[0];

    if (!shareOptionContainer) { return; }

    const shareOptionInner = shareOptionContainer.getElementsByClassName("inner")[0];

    if (!shareOptionInner) { return; }

    const shareButtonOpenClose = shareButtonContainer.getAttribute("data-openClose");
    var newOpenClose = "open";
    var newOptionContainerWidth = 0; //px

    if (shareButtonOpenClose == "open") {
        newOptionContainerWidth = 70; //px
        newOpenClose = "close";

    }
    
    shareButtonContainer.classList.toggle("active");
    shareOptionContainer.style.width = newOptionContainerWidth + "px";
    shareButtonContainer.setAttribute("data-openClose", newOpenClose);

    return;
}

/* Woocommerce Add To Bag Functions */
function handleAddProductToBag() {
    const eventTarget = event.currentTarget || event.target;

    if (!eventTarget) { return; }

    if (eventTarget.classList.contains("disabled") || eventTarget.classList.contains("loading")) { return; }

    const productIDContainer = document.getElementById("productIDContainer");
    //const productSKUCotnainer = document.getElementById("productSKUCotnainer");
    const productQantityCotnainer = document.getElementById("productQantityCotnainer");
    const productVariationIDCotnainer = document.getElementById("productVariationIDCotnainer");

    if (!productIDContainer /*|| !productSKUCotnainer*/ || !productQantityCotnainer || !productVariationIDCotnainer) { return; }

    const productID = productIDContainer.value ? parseInt(productIDContainer.value) : 0;
    //const productSKU = productSKUCotnainer.value ? parseInt(productSKUCotnainer.value) : 0;
    const productQantity = productQantityCotnainer.value ? parseInt(productQantityCotnainer.value) : 0;
    const productVariationID = productVariationIDCotnainer.value ? parseInt(productVariationIDCotnainer.value) : 0;

    if (!productID /*|| !productSKU*/ || !productQantity || !productVariationID) { return; }

    eventTarget.classList.add("loading");

    ajax_addToCard(productID, "", productQantity, productVariationID);

    return;
}
function ajax_addToCard(ID = 0, SKU = 0, quantity = 0, variableID = 0) {
    const ajaxURL = "/wp-admin/admin-ajax.php";
    const ajaxAction = "handleAddProductToBag";

    $.ajax({
        type: 'POST',
        url: ajaxURL,
        dataType: 'html',
        data: {
            action : ajaxAction,
            productID : ID,
            productSKU : SKU,
            productVariableID : variableID,
            productQuantity : quantity
        },
        success: function (response) {
            const addProductToBagButton = document.getElementById("addProductToBag");

            if (addProductToBagButton) { addProductToBagButton.classList.remove("loading"); }
            
            if (!response) { handleProductAddToBagError(); return; }

            const JSONResponse = JSON.parse(response);
            const isError = JSONResponse["error"];
            
            if (isError) { handleProductAddToBagError(JSONResponse["errorType"]); return; }

            handleProductAddedToBag(JSONResponse["cartCount"]);

            return;
        },
        error: function (response) {
            const addProductToBagButton = document.getElementById("addProductToBag");

            if (addProductToBagButton) { addProductToBagButton.classList.remove("loading"); }

            handleProductAddToBagError();

            console.log('ajax failed ' + response);

            return;
        }
    });
}
function handleProductAddToBagError(errorType = null) {
    const productContainer = document.getElementById("productContainer");

    if (!productContainer) { return; }

    const addToBadErrorContainer = document.getElementById("addToBagErrorContainer");

    if (!addToBadErrorContainer) { return; }
    
    return; 
}
function handleProductAddedToBag(cartCount = 0) {
    if (!cartCount) { return; }

    const navigationCartCountContainer = document.getElementById("navigationCartCount");

    if (!navigationCartCountContainer) { return; }

    navigationCartCountContainer.innerText = cartCount;

    return;
}

/* Single Product Functions */
const productSizesUK   = [3, 3.5, 4, 4.5, 5, 5.5, 6, 6.5, 7, 7.5, 8, 8.5, 9, 9.5, 10, 10.5, 11, 11.5, 12, 13, 14, 15, 16, 17];
const productSizesUS   = [4, 4.5, 5, 5.5, 6, 6.5, 7, 7.5, 8, 8.5, 9, 9.5, 10, 10.5, 11, 11.5, 12, 12.5, 13, 14, 15, 16, 17, 18];
const productSizesEU   = [36, 37, 37.5, 38, 39, 39.5, 40, 40.5, 41.5, 42, 42.5, 43.5, 44, 44.5, 45, 46, 46.5, 47, 48, 49, 50.5, 51.5, 53, 54];
const productSizesCM   = [22.5, 23, 23.5, 24, 24.5, 25, 25.25, 25.5, 26, 26.5, 27, 27.5, 28, 28.25, 28.5, 29, 29.5, 30, 30.5, 31, 32, 33, 34, 34.5];
const productSizesINCH = [8.86, 9.06, 9.25, 9.45, 9.65, 9.84, 9.94, 10.04, 10.24, 10.43, 10.63, 10.83, 11.02, 11.12, 11.22, 11.42, 11.61, 11.81, 12.01, 12.21, 12.60, 12.99, 13.39, 13.58];

function handlePopUpClose() {
    const eventTarget = event.currentTarget || event.target;

    if (!eventTarget) { return; }

    const popUpParent = eventTarget.closest(".popUpParent");

    if (!popUpParent) { return; }

    const popUp = popUpParent.getElementsByClassName("popUp")[0];

    if (!popUp) { return; }

    popUp.classList.remove("active");

    return;
}
function handlePopUpOpen() {
    const eventTarget = event.currentTarget || event.target;

    if (!eventTarget) { return; }

    const popUpParent = eventTarget.closest(".popUpParent");

    if (!popUpParent) { return; }

    const popUp = popUpParent.getElementsByClassName("popUp")[0];

    if (!popUp) { return; }

    popUp.classList.add("active");

    return;
}
function handleProductNoStockClick() {
    const eventTarget = event.currentTarget || event.target;

    if (!eventTarget) { return; }

    const productContainer = eventTarget.closest("#productContainer");

    if (!productContainer) { return; }

    const outOfStockNotificationPopUp = productContainer.getElementsByClassName("outOfStockNotificationPopUp")[0];

    if (!outOfStockNotificationPopUp) { return; }
    
    const showSizeInput = outOfStockNotificationPopUp.getElementsByClassName("shoeSize")[0];
    var sizeValue = eventTarget.getAttribute("data-variation-size");

    if (!sizeValue || !showSizeInput) { return; }

    sizeValue = parseFloat(sizeValue.replace("-", "."));
    showSizeInput.value = sizeValue;
    outOfStockNotificationPopUp.classList.add("active");

    return;
}
function handleProductUnitToggleClick() {
    const eventTarget = event.currentTarget || event.target;

    if (!eventTarget) { return; }

    const unitToggleContainer = eventTarget.closest(".unitToggleContainer");
    const sizeGuidePopUp = eventTarget.closest(".sizeGuidePopUp");
    const unitContainerParent = document.getElementById("unitContainer");
    const unitType = eventTarget.getAttribute("data-unit");

    if (!unitToggleContainer || !sizeGuidePopUp || !unitContainerParent || !unitType) { return; }

    const unitContainer = sizeGuidePopUp.getElementsByClassName("unit")[0];
    const unitElements = unitContainerParent.getElementsByTagName("LI");

    if (!unitContainer) { return; }

    const unitToggles = unitToggleContainer.getElementsByClassName("unitToggle");

    for (var a = 0; a < unitToggles.length; a++) {
        unitToggles[a].classList.remove("active");
    }

    for (var a = 0; a < unitElements.length; a++) {
        if (!unitElements[a].classList.contains("rowName")) { 
            var unitArray = productSizesCM;
            const unitValue = parseFloat(unitElements[a].getElementsByTagName("P")[0].innerText);

            if (unitType === "inch") { unitArray = productSizesINCH; }

            if (unitType === "cm") {
                unitElements[a].getElementsByTagName("P")[0].innerText = productSizesCM[a - 1];

            } else if (unitType === "inch") {
                unitElements[a].getElementsByTagName("P")[0].innerText = productSizesINCH[a - 1];

            }
        }
    }

    eventTarget.classList.add("active");
    unitContainer.innerText = unitType;

    return;
}
function handleProductRatingCountClick() {
    const eventTarget = event.currentTarget || event.target;

    if (!eventTarget) { return; }

    const hotspotContainer = document.getElementById("productHotspotsModule");

    if (!hotspotContainer) { return; }

    const hotSpotTabContainer = document.getElementById("tabContainer");
    const hotspotOffsetTop = hotspotContainer.offsetTop; //px

    if (!hotSpotTabContainer || !hotspotOffsetTop) { return; }

    const tabs = hotSpotTabContainer.getElementsByClassName("tab");

    for (var a = 0; a < tabs.length; a++) {
        const tabName = tabs[a].getAttribute("data-name");

        if (tabName == "reviews") { tabs[a].click(); }
    }

    window.scrollTo({
        top: hotspotOffsetTop,
        left: 0,
        behavior: "smooth",
    });

    return;
}
function handleProductOutOfStockEmailChange() {
    const eventTarget = event.currentTarget || event.target;

    if (!eventTarget) { return; }

    const parentContainer = eventTarget.closest(".emailContainer");

    if (!parentContainer) { return; }

    parentContainer.classList.remove("error");

    return;
}
function handleProductOutOfStockFormSubmission() {
    const eventTarget = event.currentTarget || event.target;

    if (!eventTarget) { return; }

    if (eventTarget.classList.contains("loading")) { return; }

    const outOfStockForm = eventTarget.closest(".OutOfStockForm");
    const GForm = document.getElementById("gform_8");

    if (!outOfStockForm || !GForm) { return; }

    const emailContainer = outOfStockForm.getElementsByTagName("INPUT")[0];
    const sizeContainer = outOfStockForm.getElementsByClassName("shoeSize")[0];
    const nameContainer = outOfStockForm.getElementsByClassName("shoeName")[0];
    const GFormEmailInput = document.getElementById("input_8_1");
    const GFormSizeInput = document.getElementById("input_8_3");
    const GFormNameInput = document.getElementById("input_8_4"); //hete
    
    if (!emailContainer || !sizeContainer || !nameContainer || !GFormEmailInput || !GFormSizeInput  || !GFormNameInput) { return; }

    const emailValue = emailContainer.value;
    // const sizeValue = sizeContainer.value;
    // const nameValue = nameContainer.value;

    var validEmail = false;
    var validSize = true;
    var validName = true;

    if (isValidEmail(emailValue)) {
        GFormEmailInput.value = emailValue;
        validEmail = true;
        emailContainer.parentElement.classList.remove("error");

    } else {
        emailContainer.parentElement.classList.add("error");

    }

    if (validEmail && validSize && validName) {
        eventTarget.classList.add("loading");
        GForm.submit();
    }

    return;
}
function handleProductOutOfStockConfirmationClose() {
    const eventTarget = event.currentTarget || event.target;

    if (!eventTarget) { return; }

    const submissionForm = eventTarget.closest(".OutOfStockForm");
    const popUp = eventTarget.closest(".popUp")

    if (!submissionForm || !popUp) { return; }

    submissionForm.classList.add("complete");
    popUp.classList.remove("active")

    return; 
}
function updateProductSize(variationID = null) {
    if (!variationID) { return; }

    const productContainer = document.getElementById("productContainer");
    const productVariationIDCotnainer = document.getElementById("productVariationIDCotnainer");
    const addProductToBagContainer = document.getElementById("addProductToBag");

    if (!productContainer || !productVariationIDCotnainer || !addProductToBagContainer) { return; }

    const sizes = productContainer.getElementsByClassName("size");

    for (var a = 0; a < sizes.length; a++) {
        const sizeVariationID = sizes[a].getAttribute("data-variation-id");

        sizes[a].classList.remove("active");

        if (variationID === sizeVariationID) { sizes[a].classList.add("active"); }

    }

    addProductToBagContainer.classList.remove("disabled");
    productVariationIDCotnainer.value = variationID;

    return;
}
function updateHotspotProductSize(variationID = null) {
    if (!variationID) { return; }

    const hotspotContainer = document.getElementById("productHotspotsModule");
    const variationIDCotnainer = document.getElementById("hotSpotProductVariationIDCotnainer");
    const addProductToBagContainer = document.getElementById("hotSpotAddProductToBag");

    if (!hotspotContainer || !variationIDCotnainer || !addProductToBagContainer) { return; }

    const productSize = hotspotContainer.getElementsByClassName("productSize")[0];

    if (!productSize) { return; }

    const sizes = hotspotContainer.getElementsByClassName("size");
    
    for (var a = 0; a < sizes.length; a++) {
        const sizeVariationID = sizes[a].getAttribute("data-variation-id");
        const sizeVariationSize = sizes[a].getAttribute("data-variation-size");

        if (variationID === sizeVariationID) {
            productSize.innerText = parseFloat(sizeVariationSize.replace("-", "."));
        }
    }

    variationIDCotnainer.value = variationID;
    addProductToBagContainer.classList.remove("disabled");

    return;
}
function handleProductSizeClick() {
    const eventTarget = event.currentTarget || event.target;
    
    if (!eventTarget) { return; }

    const variationID = eventTarget.getAttribute("data-variation-id");

    if (!variationID) { return; }

    const productContainer = document.getElementById("productContainer");

    if (productContainer) {  updateProductSize(variationID); }

    const hotspotContainer = document.getElementById("productHotspotsModule");

    if (hotspotContainer) {  updateHotspotProductSize(variationID); }
    
    return;
}
function handleProcuctSizeTypeClick() {
    const eventTarget = event.currentTarget || event.target;

    if (!eventTarget) { return; }

    const sizeContainer = eventTarget.closest(".sizeContainer");
    const sizeType = eventTarget.getAttribute("data-id");

    if (!sizeContainer) { return; }

    const sizeTypes = sizeContainer.getElementsByClassName("sizeType");

    for (var a = 0; a < sizeTypes.length; a++) {
        sizeTypes[a].classList.remove("active");
    }

    eventTarget.classList.add("active");
    setProductSizesToType(sizeType);

    return;
}
function setProductSizesToType(sizeType = null) {
    if (!sizeType) { return; }

    const sizeSelectContainer = document.getElementsByClassName("sizeSelectContainer")[0];

    if (!sizeSelectContainer) { return; }

    const sizes = sizeSelectContainer.getElementsByClassName("size");

    for (var a = 0; a < sizes.length; a++) {
        var sizeValue = sizes[a].getAttribute("data-variation-size");

        if (!sizeValue) { break; }

        sizeValue = parseFloat(sizeValue.replace("-", "."));

        const sizeIndex = productSizesUK.indexOf(sizeValue);

        if (sizeIndex < 0) { break; }

        if (sizeType === "uk") {
            sizes[a].getElementsByTagName("P")[0].innerText = productSizesUK[sizeIndex];

        } else if (sizeType === "us") {
            sizes[a].getElementsByTagName("P")[0].innerText = productSizesUS[sizeIndex];

        } else if (sizeType === "eu") {
            sizes[a].getElementsByTagName("P")[0].innerText = productSizesEU[sizeIndex];

        }
    }

    return;
}