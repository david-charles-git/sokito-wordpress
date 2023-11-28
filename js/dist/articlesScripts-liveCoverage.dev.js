"use strict";

/* Header Functions - start */
function handleHeaderMobileMenuClick() {
  var eventTarget = event.currentTarget || event.target;

  if (!eventTarget) {
    return;
  }

  var header = eventTarget.closest(".header");

  if (!header) {
    return;
  }

  header.classList.toggle("active");
  return;
}

function closeHeaderMobileMenu() {
  var header = document.getElementsByClassName("header")[0];

  if (!header) {
    return;
  }

  header.classList.remove("active");
  return;
}

function closeAllHeaderSubmenus() {
  var header = document.getElementsByClassName("header")[0];

  if (!header) {
    return;
  }

  var navigationElements = header.getElementsByClassName("navigationOption");

  for (var a = 0; a < navigationElements.length; a++) {
    navigationElements[a].classList.remove("active");
  }

  return;
}

function handleHeaderNavigationOptionClick() {
  var eventTarget = event.currentTarget || event.target;

  if (!eventTarget) {
    return;
  }

  var header = eventTarget.closest(".header");

  if (!header) {
    return;
  }

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
  var eventTarget = event.currentTarget || event.target;

  if (!eventTarget) {
    return;
  }

  var readMoreParent = eventTarget.closest(".readMoreParent");

  if (!readMoreParent) {
    return;
  }

  var readMoreContainer = readMoreParent.getElementsByClassName("readMoreContainer")[0];

  if (!readMoreContainer) {
    return;
  }

  var readMoreOpenClose = readMoreParent.getAttribute("data-openClose");
  var readMoreElements = readMoreContainer.getElementsByTagName("P");
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
  setTimeout(function () {
    for (var a = 0; a < readMoreElements.length; a++) {
      if (readMoreElements[a] == eventTarget) {
        break;
      }

      readMoreElements[a].style.display = elmtDisplay;
    }

    readMoreParent.setAttribute("data-openClose", openClose);
    eventTarget.innerText = buttonInnerText;
    eventTarget.classList.toggle("active");
    readMoreParent.style.height = readMoreContainer.clientHeight + "px";
  }, 200);
  setTimeout(function () {
    readMoreParent.style.opacity = 1;
  }, 210);
  return;
}

function readMoreOnResizeListener() {
  var readMoreParents = document.getElementsByClassName("readMoreParent");

  for (var a = 0; a < readMoreParents.length; a++) {
    var readMoreContainer = readMoreParents[a].getElementsByClassName("readMoreContainer")[0];

    if (!readMoreContainer) {
      break;
    } // const readMoreElements = readMoreContainer.getElementsByTagName("P");
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
  var eventTarget = event.currentTarget || event.target;

  if (!eventTarget) {
    return;
  }

  if (typeof stopCarouselAutoShift === "function") {
    stopCarouselAutoShift(eventTarget);
  }

  var videoContainer = eventTarget.closest(".videoContainer");

  if (!videoContainer) {
    return;
  }

  var video = videoContainer.getElementsByTagName("VIDEO")[0];

  if (!video) {
    return;
  }

  var playPause = video.getAttribute("data-playPause");

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
  var carousels = document.getElementsByClassName("Carousel");

  for (var a = 0; a < carousels.length; a++) {
    var leftButton = carousels[a].getElementsByClassName("carouselButton left")[0];

    if (!leftButton) {
      break;
    }

    var windowWidth = window.innerWidth; //px

    var carouselWidth = 1320; //px

    var leftButtonPosition = -1 * (windowWidth - carouselWidth) / 2; //px

    var leftButtonDispaly = leftButtonPosition > 0 ? "none" : "block";
    leftButton.style.display = leftButtonDispaly;
    leftButton.style.left = leftButtonPosition + "px";
  }

  return;
}

function handleCarouselRightButtonPosition() {
  var carousels = document.getElementsByClassName("Carousel");

  for (var a = 0; a < carousels.length; a++) {
    var rightButton = carousels[a].getElementsByClassName("carouselButton right")[0];

    if (!rightButton) {
      break;
    }

    var windowWidth = window.innerWidth; //px

    var carouselWidth = 1320; //px

    var rightButtonPosition = -1 * (windowWidth - carouselWidth) / 2; //px

    var rightButtonDispaly = rightButtonPosition > 0 ? "none" : "block";
    rightButton.style.display = rightButtonDispaly;
    rightButton.style.right = rightButtonPosition + "px";
  }

  return;
}

function handleCarouselLeftButtonClick() {
  var eventTarget = event.currentTarget || event.target;
  pauseAllCarouselVideos(eventTarget);
  stopCarouselAutoShift(eventTarget);
  shiftCarouselLeft(eventTarget);
  return;
}

function handleCarouselRightButtonClick() {
  var eventTarget = event.currentTarget || event.target;
  pauseAllCarouselVideos(eventTarget);
  stopCarouselAutoShift(eventTarget);
  shiftCarouselRight(eventTarget);
  return;
}

function handleCarouselNaviagationTabClick() {
  var eventTarget = event.currentTarget || event.target;
  pauseAllCarouselVideos(eventTarget);
  stopCarouselAutoShift(eventTarget);
  navigateCarousel(event);
  return;
}

function handleCarouselTouchStart() {
  var touchX = event.touches[0].clientX;

  if (isNaN(touchX)) {
    return;
  }

  globalCarouselTouchX = touchX;
  return;
}

function handleCarouselTouchEnd() {
  var eventTarget = event.currentTarget || event.target;
  var touchX = event.changedTouches[0].clientX;

  if (isNaN(touchX) || !eventTarget) {
    return;
  }

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

function shiftCarouselRight() {
  var eventTarget = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;

  if (!eventTarget) {
    return;
  }

  var carousel = eventTarget.closest(".Carousel");

  if (!carousel) {
    return;
  }

  var carsouselItems = carousel.getElementsByClassName("item");

  for (var a = 0; a < carsouselItems.length; a++) {
    if (carsouselItems[a].classList.contains("active")) {
      var newIndex = a + 1 >= carsouselItems.length ? 0 : a + 1;
      shiftCarouselToFrame(carousel, newIndex);
      return;
    }
  }

  return;
}

function shiftCarouselLeft() {
  var eventTarget = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;

  if (!eventTarget) {
    return;
  }

  var carousel = eventTarget.closest(".Carousel");

  if (!carousel) {
    return;
  }

  var carsouselItems = carousel.getElementsByClassName("item");

  for (var a = 0; a < carsouselItems.length; a++) {
    if (carsouselItems[a].classList.contains("active")) {
      var newIndex = a - 1 < 0 ? 0 : a - 1;
      shiftCarouselToFrame(carousel, newIndex);
      return;
    }
  }

  return;
}

function navigateCarousel() {
  var event = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;

  if (!event) {
    return;
  }

  var eventTarget = event.currentTarget || event.target;
  var carousel = eventTarget.closest(".Carousel");

  if (!carousel) {
    return;
  }

  var tabIndex = eventTarget.getAttribute("data-id") || 0;
  shiftCarouselToFrame(carousel, tabIndex);
  return;
}

function shiftCarouselToFrame() {
  var carousel = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;
  var frame = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 0;

  if (!carousel) {
    return;
  }

  var carouselInner = carousel.getElementsByClassName("inner")[0];

  if (!carouselInner) {
    return;
  }

  var carouselItemWidth = 0; //px

  var carsouselItems = carousel.getElementsByClassName("item");
  var tabItems = carousel.getElementsByClassName("naigationTab");
  var gridGap = !isNaN(parseFloat(carousel.getAttribute("data-gap"))) ? parseFloat(carousel.getAttribute("data-gap")) : 20; //px

  for (var a = 0; a < carsouselItems.length; a++) {
    if (carsouselItems[a].classList.contains("active")) {
      carouselItemWidth = carsouselItems[a].clientWidth + gridGap; //px
    }

    carsouselItems[a].classList.remove("active");
  }

  for (var a = 0; a < tabItems.length; a++) {
    tabItems[a].classList.remove("active");
  }

  var transformXValue = frame * carouselItemWidth; //px

  carouselInner.style.transform = "translateX(-" + transformXValue + "px)";
  carsouselItems[frame].classList.add("active");
  tabItems[frame].classList.add("active");
  var leftButton = carousel.getElementsByClassName("carouselButton left")[0];

  if (!leftButton) {
    return;
  }

  if (frame == 0) {
    leftButton.classList.remove("active");
  } else {
    leftButton.classList.add("active");
  }

  return;
}

function autoShiftCarousels() {
  var carousels = document.getElementsByClassName("Carousel");

  for (var a = 0; a < carousels.length; a++) {
    var autoShift = carousels[a].getAttribute("data-autoShift");
    var carouselInner = carousels[a].getElementsByClassName("inner")[0];

    if (autoShift == "true" && carouselInner) {
      shiftCarouselRight(carouselInner);
    }
  }

  return;
}

function stopCarouselAutoShift() {
  var eventTarget = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;

  if (!eventTarget) {
    return;
  }

  var carousel = eventTarget.closest(".Carousel");

  if (!carousel) {
    return;
  }

  carousel.setAttribute("data-autoShift", "false");
  return;
}

function stopCarouselAutoShiftInterval() {
  clearInterval(carouselAutoShiftInterval);
  return;
}

function pauseAllCarouselVideos() {
  var eventTarget = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;

  if (!eventTarget) {
    return;
  }

  var carousel = eventTarget.closest(".Carousel");

  if (!carousel) {
    return;
  }

  var carsouselVideoItems = carousel.getElementsByClassName("videoItem");

  for (var a = 0; a < carsouselVideoItems.length; a++) {
    var video = carsouselVideoItems[a].getElementsByTagName("VIDEO")[0];

    if (!video) {
      break;
    }

    var videoContainer = video.closest(".videoContainer");
    video.pause();
    video.setAttribute("data-playPause", "play");
    videoContainer.classList.remove("active");
  }

  return;
}

function carouselIframeListener() {
  if (document.activeElement === document.querySelector("IFRAME")) {
    stopCarouselAutoShift(document.activeElement);
  }

  window.removeEventListener("blur", carouselIframeListener);
  return;
}

function carouselOnLoadListener() {
  handleCarouselLeftButtonPosition();
  handleCarouselRightButtonPosition();
  return;
}

function carouselOnResizeListener() {
  handleCarouselLeftButtonPosition();
  handleCarouselRightButtonPosition();
  return;
}

focus();
var globalCarouselTouchX = 0;
var carouselAutoShiftInterval = setInterval(autoShiftCarousels, 3000);
window.addEventListener("blur", carouselIframeListener);
window.addEventListener("load", carouselOnLoadListener);
window.addEventListener("resize", carouselOnResizeListener);
/* Carousel Functions - end */

/* Scroll Carousel Functions - start */

function handleScrollCarouselLeftButtonPosition() {
  var carousels = document.getElementsByClassName("ScrollCarousel");

  for (var a = 0; a < carousels.length; a++) {
    var leftButton = carousels[a].getElementsByClassName("ScrollCarouselButton left")[0];

    if (!leftButton) {
      break;
    }

    var windowWidth = window.innerWidth; //px

    var carouselWidth = 1920; //px

    var leftButtonPosition = (windowWidth - carouselWidth) / 2 < 0 ? 0 : (windowWidth - carouselWidth) / 2; //px

    leftButton.style.left = leftButtonPosition + "px";
  }

  return;
}

function handleScrollCarouselRightButtonPosition() {
  var carousels = document.getElementsByClassName("ScrollCarousel");

  for (var a = 0; a < carousels.length; a++) {
    var rightButton = carousels[a].getElementsByClassName("ScrollCarouselButton right")[0];

    if (!rightButton) {
      break;
    }

    var windowWidth = window.innerWidth; //px

    var carouselWidth = 1920; //px

    var rightButtonPosition = (windowWidth - carouselWidth) / 2 < 0 ? 0 : 1 * (windowWidth - carouselWidth) / 2; //px

    rightButton.style.right = rightButtonPosition + "px";
  }

  return;
}

function handleScrollCarouselLeftButtonClick() {
  var eventTarget = event.currentTarget || event.target;
  shiftScrollCarouselLeft(eventTarget);
  return;
}

function handleScrollCarouselRightButtonClick() {
  var eventTarget = event.currentTarget || event.target;
  shiftScrollCarouselRight(eventTarget);
  return;
}

function shiftScrollCarouselLeft() {
  var eventTarget = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;

  if (!eventTarget) {
    return;
  }

  var scrollCarousel = eventTarget.closest(".ScrollCarousel");

  if (!scrollCarousel) {
    return;
  }

  var carouselOuter = scrollCarousel.getElementsByClassName("outer")[0];

  if (!carouselOuter) {
    return;
  }

  var carouselItems = scrollCarousel.getElementsByClassName("item");
  var leftButton = scrollCarousel.getElementsByClassName("ScrollCarouselButton left")[0];
  var rightButton = scrollCarousel.getElementsByClassName("ScrollCarouselButton right")[0];

  if (!leftButton || !rightButton || !carouselItems.length) {
    return;
  }

  var carouselScrollAmount = carouselItems[0].clientWidth + 20; //px

  var carouselScrollLeft = carouselOuter.scrollLeft; //px

  var newScrollLeft = carouselScrollLeft - carouselScrollAmount < 0 ? 0 : carouselScrollLeft - carouselScrollAmount; //px

  rightButton.classList.add("active");
  carouselOuter.scrollTo({
    top: 0,
    //px
    left: newScrollLeft,
    //px
    behavior: "smooth"
  });

  if (newScrollLeft == 0) {
    leftButton.classList.remove("active");
  }

  return;
}

function shiftScrollCarouselRight() {
  var eventTarget = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;

  if (!eventTarget) {
    return;
  }

  var scrollCarousel = eventTarget.closest(".ScrollCarousel");

  if (!scrollCarousel) {
    return;
  }

  var carouselOuter = scrollCarousel.getElementsByClassName("outer")[0];

  if (!carouselOuter) {
    return;
  }

  var carouselItems = scrollCarousel.getElementsByClassName("item");
  var leftButton = scrollCarousel.getElementsByClassName("ScrollCarouselButton left")[0];
  var rightButton = scrollCarousel.getElementsByClassName("ScrollCarouselButton right")[0];

  if (!leftButton || !rightButton || !carouselItems.length) {
    return;
  }

  var carouselScrollAmount = carouselItems[0].clientWidth + 20; //px

  var carouselScrollLeft = carouselOuter.scrollLeft; //px

  var newScrollLeft = carouselScrollLeft + carouselScrollAmount; //px

  var scrollMax = 0; //px

  for (var a = 0; a < carouselItems.length; a++) {
    scrollMax += carouselItems[a].clientWidth; //px
  }

  scrollMax += (carouselItems.length - 1) * 20; //px

  scrollMax += parseFloat(carouselOuter.style.paddingLeft); //px

  scrollMax -= carouselOuter.clientWidth; //px

  leftButton.classList.add("active");
  carouselOuter.scrollTo({
    top: 0,
    //px
    left: newScrollLeft,
    //px
    behavior: "smooth"
  }); // if (newScrollLeft >= scrollMax) { rightButton.classList.remove("active"); }

  return;
}

function setScrollCarouselOuterPaddingRight() {
  var scrollCarousels = document.getElementsByClassName("ScrollCarousel");

  for (var a = 0; a < scrollCarousels.length; a++) {
    var outerContainer = scrollCarousels[a].getElementsByClassName("outer")[0];

    if (!outerContainer) {
      break;
    }

    var windowWidth = window.innerWidth; //px

    var mobileScreenBreak = 1080; //px

    var minPadding = windowWidth <= mobileScreenBreak ? 20 : 50; //px

    var maxWidth = 1320; //px

    var outerContainerPaddingLeft = (windowWidth - maxWidth) / 2 > minPadding ? (windowWidth - maxWidth) / 2 : minPadding; //px

    outerContainer.style.paddingLeft = outerContainerPaddingLeft + "px";
  }

  return;
}

function handleScrollCarouselOnScroll() {
  var eventTarget = event.currentTarget || event.target;

  if (!eventTarget) {
    return;
  }

  var scrollCarousel = eventTarget.closest(".ScrollCarousel");

  if (!scrollCarousel) {
    return;
  }

  var outerContainer = scrollCarousel.getElementsByClassName("outer")[0];

  if (!outerContainer) {
    return;
  }

  var carouselItems = scrollCarousel.getElementsByClassName("item");

  if (carouselItems.length < 1) {
    return;
  }

  var activeCarouselItemIndex = 0;
  var activeCarouselItemWidth = 0; //px

  for (var a = 0; a < carouselItems.length; a++) {
    if (carouselItems[a].classList.contains("active")) {
      activeCarouselItemIndex = a;
      activeCarouselItemWidth = carouselItems[a].clientWidth; //px

      break;
    }
  }

  var previousScrollValue = parseFloat(outerContainer.getAttribute("data-scrollValue")); //px

  var scrollLeft = eventTarget.scrollLeft; //px

  var scrollDirectionIsRight = scrollLeft > previousScrollValue ? true : false;
  var rightBound = activeCarouselItemIndex * (activeCarouselItemWidth + 20) + activeCarouselItemWidth / 2; //px

  var leftBound = activeCarouselItemIndex * (activeCarouselItemWidth + 20) - activeCarouselItemWidth / 2; //px

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
  var scrollCarousels = document.getElementsByClassName("ScrollCarousel");

  for (var a = 0; a < scrollCarousels.length; a++) {
    var outerContainer = scrollCarousels[a].getElementsByClassName("outer")[0];

    if (!outerContainer) {
      break;
    }

    outerContainer.addEventListener("scroll", function () {
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

function scrollCarouselOnResizeListener() {
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
  var eventTarget = event.currentTarget || event.target;

  if (!eventTarget) {
    return;
  }

  openSubscriptionFormCloseDropDown(eventTarget);
  return;
}

function openSubscriptionFormCloseDropDown() {
  var dropdown = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;

  if (!dropdown) {
    return;
  }

  var optionsContainer = dropdown.getElementsByClassName("optionsContainer")[0];

  if (!optionsContainer) {
    return;
  }

  var openClose = optionsContainer.getAttribute("data-openClose");
  var optionsHeight = 0; //px

  if (openClose == "open") {
    var options = optionsContainer.getElementsByTagName("LI");

    for (var a = 0; a < options.length; a++) {
      var optionHeight = options[a].clientHeight; //px

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
  var eventTarget = event.currentTarget || event.target;

  if (!eventTarget) {
    return;
  }

  var emailTypeValue = eventTarget.getAttribute("data-value");
  var emailTypeName = eventTarget.getAttribute("data-name");
  var dropdownContainer = eventTarget.closest(".dropdownContainer");

  if (!dropdownContainer || !emailTypeName || !emailTypeValue) {
    return;
  }

  var currentValue = dropdownContainer.getElementsByClassName("currentValue")[0];

  if (!currentValue) {
    return;
  }

  if (!isValidEmailType(emailTypeValue)) {
    dropdownContainer.classList.add("error");
    return;
  }

  var options = dropdownContainer.getElementsByTagName("LI");

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
  var eventTarget = event.currentTarget || event.target;

  if (!eventTarget) {
    return;
  }

  if (eventTarget.classList.contains("loading")) {
    return;
  }

  var form = eventTarget.closest(".SubscriptionForm");
  var submissionForm = document.getElementById("gform_5");

  if (!form || !submissionForm) {
    return;
  }

  var emailContainer = form.getElementsByTagName("INPUT")[0];
  var emailTypeContainer = form.getElementsByClassName("currentValue")[0];
  var submissionFormEmailInput = document.getElementById("field_5_1"); //document.getElementById("input_5_1"); PROD

  var submissionFormEmailTypeInput = document.getElementById("input_5_3"); //document.getElementById("input_5_3"); PROD

  var userEmail = form.getElementsByClassName("userEmail")[0];
  console.log(emailContainer, emailTypeContainer, submissionFormEmailInput, submissionFormEmailTypeInput, userEmail);

  if (!emailContainer || !emailTypeContainer || !submissionFormEmailInput || !submissionFormEmailTypeInput || !userEmail) {
    return;
  }

  var emailValue = emailContainer.value;
  var emailTypeValue = emailTypeContainer.getAttribute("data-value");
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
  var eventTarget = event.currentTarget || event.target;

  if (!eventTarget) {
    return;
  }

  var parentContainer = eventTarget.closest(".emailContainer");

  if (!parentContainer) {
    return;
  }

  parentContainer.classList.remove("error");
  return;
}

function isValidEmail() {
  var email = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;

  if (!email) {
    return false;
  }

  var validRegex = new RegExp(/[^\s@]+@[^\s@]+\.[^\s@]+/, "gm");

  if (validRegex.test(email)) {
    return true;
  }

  return false;
}

function isValidEmailType() {
  var emailType = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;

  if (!emailType) {
    return false;
  }

  return true;
}

function handleSubscriptionFormConfirmationClose() {
  var eventTarget = event.currentTarget || event.target;

  if (!eventTarget) {
    return;
  }

  var submissionForm = eventTarget.closest(".SubscriptionForm");

  if (!submissionForm) {
    return;
  }

  submissionForm.classList.add("complete");
  return;
}

function gform_confirmation_loaded_OutOfStickNotification() {
  var outOfStockForm = document.getElementsByClassName("outOfStockForm")[0];

  if (!outOfStockForm) {
    return;
  }

  var formContainer = outOfStockForm.closest(".OutOfStockForm");

  if (!formContainer) {
    return;
  }

  var submitButton = formContainer.getElementsByClassName("submit")[0];

  if (!submitButton) {
    return;
  }

  formContainer.classList.add("submitted");
  submitButton.classList.remove("loading");
  return;
}

function gform_confirmation_loaded_NewsletterForm() {
  var newsLetterForm = document.getElementsByClassName("newsLetterForm")[0];

  if (!newsLetterForm) {
    return;
  }

  var formContainer = newsLetterForm.closest(".NewsletterForm");

  if (!formContainer) {
    return;
  }

  var submitButton = formContainer.getElementsByClassName("submit")[0];

  if (!submitButton) {
    return;
  }

  formContainer.classList.add("submitted");
  submitButton.classList.remove("loading");
  return;
}

function gform_confirmation_loaded_SubscriptionForm() {
  var submissionForm = document.getElementsByClassName("subscriptionForm")[0];

  if (!submissionForm) {
    return;
  }

  var formContainer = submissionForm.closest(".SubscriptionForm");

  if (!formContainer) {
    return;
  }

  var submitButton = formContainer.getElementsByClassName("submit")[0];

  if (!submitButton) {
    return;
  }

  formContainer.classList.add("submitted");
  submitButton.classList.remove("loading");
  return;
}

function gform_confirmation_loaded_SignUpForm() {
  var newsLetterForm = document.getElementsByClassName("signUpForm")[0];

  if (!newsLetterForm) {
    return;
  }

  var formContainer = newsLetterForm.closest(".SignUpFormPopUp");

  if (!formContainer) {
    return;
  }

  var submitButton = formContainer.getElementsByClassName("submit")[0];

  if (!submitButton) {
    return;
  }

  formContainer.classList.add("submitted");
  submitButton.classList.remove("loading");
  return;
}

jQuery(document).ready(function () {
  jQuery(document).on("gform_confirmation_loaded", function (event, formId) {
    if (!event) {
      return;
    }

    if (formId === 5) {
      gform_confirmation_loaded_SubscriptionForm();
    } else if (formId === 7) {
      gform_confirmation_loaded_NewsletterForm();
    } else if (formId === 8) {
      gform_confirmation_loaded_OutOfStickNotification(); //gform_confirmation_loaded_SignUpForm();
    } else if (formId === 9) {
      gform_confirmation_loaded_SignUpForm();
      sessionStorage.SignUpFormRegistered = "true";
    }

    return;
  });
});
/* Subscription Form Functions - end */

/* Share Button Functions - start */

function copyToClipBoard() {
  var content = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;

  if (!content) {
    return;
  }

  navigator.clipboard.writeText(content);
  alert("Article Link coppied to clipboard: " + content);
  return;
}

function handleShareButtonClick() {
  var eventTarget = event.currentTarget || event.target;

  if (!eventTarget) {
    return;
  }

  var dataLink = eventTarget.getAttribute("data-link");

  if (dataLink) {
    copyToClipBoard(dataLink);
  }

  toggleShareButtonActive(eventTarget);
  return;
}

function toggleShareButtonActive() {
  var eventTarget = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;

  if (!eventTarget) {
    return;
  }

  var shareButtonContainer = eventTarget.closest(".shareButtonContainer");

  if (!shareButtonContainer) {
    return;
  }

  var shareOptionContainer = shareButtonContainer.getElementsByClassName("shareOptionContainer")[0];

  if (!shareOptionContainer) {
    return;
  }

  var shareOptionInner = shareOptionContainer.getElementsByClassName("inner")[0];

  if (!shareOptionInner) {
    return;
  }

  var shareButtonOpenClose = shareButtonContainer.getAttribute("data-openClose");
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
//# sourceMappingURL=articlesScripts-liveCoverage.dev.js.map
