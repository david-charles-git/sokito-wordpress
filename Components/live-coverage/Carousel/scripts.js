
/*  Carosuel Functions - start */
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

    for (var a = 0; a < carsouselItems.length; a++) {
        if (carsouselItems[a].classList.contains("active")) {
            carouselItemWidth = carsouselItems[a].clientWidth + 20; //px
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

focus();
var globalCarouselTouchX = 0;
const carouselAutoShiftInterval = setInterval(autoShiftCarousels, 3000);
const carouselIframeListener = window.addEventListener('blur', () => {
    if (document.activeElement === document.querySelector('IFRAME')) {
        stopCarouselAutoShift(document.activeElement);
    }

    window.removeEventListener('blur', carouselIframeListener);

    return;
});
const carouselOnLoadListener = window.addEventListener("load", () => {
    handleCarouselLeftButtonPosition();
    handleCarouselRightButtonPosition();

    return;
});
const carouselOnResizeListener = window.addEventListener("resize", () => {
    handleCarouselLeftButtonPosition();
    handleCarouselRightButtonPosition();

    return;
});
/* Carousel Functions - end */

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