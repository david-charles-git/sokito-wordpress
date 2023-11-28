/* Header Functions - start */
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
/* Header Functions - end */

/* Read More Functions - start */
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

        // const readMoreElements = readMoreContainer.getElementsByTagName("P");

        // for (var b = 0; b < readMoreElements.length; b++) {
        //     if (readMoreElements[b].classList.contains("readMoreButton")) { 
        //         readMoreElements[b].innerText = "Read More";
        //         readMoreElements[b].classList.remove("active");

        //         break;
        //     }
    
        //     readMoreElements[b].style.display = null;
        // }

        //readMoreParents[a].setAttribute("data-openClose", "open");
        readMoreParents[a].style.height = readMoreContainer.clientHeight + "px";
    }

    return;
}

window.addEventListener("resize", readMoreOnResizeListener);
/* Read More Functions - end */

/* Video Functions - start */
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
/* Video Functions - end */

/* Carousel Functions - start */
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
/* Carousel Functions - end */

/* Scroll Carousel Functions - start */
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
/* Scroll Carousel Functions - end */

/* Subscription Form Functions - start */
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
    console.log("handleSubscriptionFormSubmission" + event)
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

        if (formId === 5) { // 5 DEV | 5 PROD
            gform_confirmation_loaded_SubscriptionForm();
            
        } else if (formId === 7) { // 6 DEV | 7 PROD
            gform_confirmation_loaded_NewsletterForm();

        } else if (formId === 8) { // 7 DEV | 8 PROD
            gform_confirmation_loaded_OutOfStickNotification();

        } else if (formId === 9) {
            gform_confirmation_loaded_SignUpForm();
        }
    
        return;
    })
});
/* Subscription Form Functions - end */

/* Share Button Functions - start */
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
/* Share Button Functions - end */