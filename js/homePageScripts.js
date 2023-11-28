function handleImageSwitchContainerImageSwitch() {
    const eventTarget = event.currentTarget || event.target;

    if (!eventTarget) { return; }

    const parentContainer = eventTarget.closest(".HeroBanner");

    if (!parentContainer) { return; }

    const imageSwitchContainer_switches = parentContainer.getElementsByClassName("imageSwitchContainer switches")[0];
    const imageSwitchContainer_images = eventTarget.getElementsByClassName("imageSwitchContainer images");
    const dataID = parseInt(eventTarget.getAttribute("data-id"));

    if (!imageSwitchContainer_switches || !imageSwitchContainer_images || isNaN(dataID)) { return; }

    setImagSwitchCotnainerImageByID(parentContainer, dataID);

    return;
}

function setImagSwitchCotnainerImageByID(parentContainer = null, dataID = 0) {
    if (!parentContainer || isNaN(dataID)) {  return; }

    const imageSwitchContainer_switches = parentContainer.getElementsByClassName("imageSwitchContainer switches")[0];
    const imageSwitchContainer_images = parentContainer.getElementsByClassName("imageSwitchContainer images")[0];

    if (!imageSwitchContainer_switches || !imageSwitchContainer_images) { return; }

    const images = imageSwitchContainer_images.getElementsByClassName("image");

    for (var a = 0; a < images.length; a++) {
        const imageDataID = parseInt(images[a].getAttribute("data-id"));

        images[a].classList.remove("active");

        if (!isNaN(imageDataID) && imageDataID == dataID) { images[a].classList.add("active"); }
    }

    const switches = imageSwitchContainer_switches.getElementsByClassName("switchButton");

    for (var a = 0; a < switches.length; a++) {
        const switcheDataID = parseInt(switches[a].getAttribute("data-id"));

        switches[a].classList.remove("active");

        if (!isNaN(switcheDataID) && switcheDataID == dataID) { switches[a].classList.add("active"); }
    }

    return;
}

function handleImageSwitchContainerImageSwitchOnScroll() {
    const parentContainers = document.getElementsByClassName("HeroBanner");

    for (var a = 0; a < parentContainers.length; a++) {
        const imageSwitchContainer_switches = parentContainers[a].getElementsByClassName("imageSwitchContainer switches")[0];
        const imageSwitchContainer_images = parentContainers[a].getElementsByClassName("imageSwitchContainer images")[0];

        if (!imageSwitchContainer_switches || !imageSwitchContainer_images) { continue; }

        const windowScrollY = window.scrollY; //px
        const elmtDistanceToPageTop = windowScrollY + imageSwitchContainer_images.getBoundingClientRect().top; //px

        if (windowScrollY < elmtDistanceToPageTop) { continue; }

        setImagSwitchCotnainerImageByID(parentContainers[a], 1);
    }

    return;
}
window.addEventListener("scroll", () => { handleImageSwitchContainerImageSwitchOnScroll(); });

function setBusinessCarouselTabContainerOverflow() {
    const businessCarouselParents = document.getElementsByClassName("businessReviews");

    for (var a = 0; a < businessCarouselParents.length; a++) {
        const tabContainer = businessCarouselParents[a].getElementsByClassName("tabContainer")[0];

        if (!tabContainer) { continue; }

        const tabContainerInner = tabContainer.getElementsByClassName("inner")[0];

        if (!tabContainerInner) { continue; }

        const tabContainerInnerWidth = tabContainerInner.clientWidth; //px
        const naigationTabs = tabContainerInner.getElementsByClassName("naigationTab");
        var contentWidth = (naigationTabs.length - 1) * 50; //px
        
        for (var b = 0; b < naigationTabs.length; b++) {
            contentWidth += naigationTabs[b].clientWidth; //px
        }

        tabContainerInner.classList.remove("overflow");

        if (tabContainerInnerWidth <= contentWidth) { tabContainerInner.classList.add("overflow"); }
    }

    return;
}


window.addEventListener("load", () => { setBusinessCarouselTabContainerOverflow(); });
window.addEventListener("resize", () => { setBusinessCarouselTabContainerOverflow(); });

function setFootballCarouselContainerFixed() {
    const footballerReviewSection = document.getElementById("footballerReviewSection");

    if (!footballerReviewSection) { return; }

    const footballerCarouselCoordinates = getElementCoordinates(footballerReviewSection);
    const footballerInner = footballerReviewSection.getElementsByClassName("inner")[0];

    if (!footballerInner) { return; }

    const footballerCarouselHeight = footballerInner.clientHeight; //px

    if (window.scrollY + 50 >= footballerCarouselCoordinates.top && window.scrollY < footballerCarouselCoordinates.bottom) { 
        footballerReviewSection.classList.add("fixed");
        footballerReviewSection.style.height = footballerCarouselHeight + "px";
        footballerInner.style.top = 50 + "px";

     } else {
        footballerReviewSection.classList.remove("fixed");
        footballerReviewSection.style.height = null;
        footballerInner.style.top = null;
     }

    return;
}
window.addEventListener("scroll", setFootballCarouselContainerFixed);

function setImageSwitchContainerParallaxData() {
    const imageSwitchContainers = document.getElementsByClassName("imageSwitchContainer");

    for (var a = 0; a < imageSwitchContainers.length; a++) {
        const parallaxItem = imageSwitchContainers[a].getElementsByClassName("parallaxItem")[0];

        if (!parallaxItem) { continue; }

        if (window.innerWidth > 1180) {
            parallaxItem.setAttribute("data-parallax-rate-y", 0.4);

        } else if (window.innerWidth > 680) {
            parallaxItem.setAttribute("data-parallax-rate-y", -0.6);

        } else {
            parallaxItem.setAttribute("data-parallax-rate-y", -0.5);

        }
    }
}


// window.addEventListener("load", setImageSwitchContainerParallaxData);
window.addEventListener("resize", setImageSwitchContainerParallaxData);

function setHeroBannerContentParallaxData() {
    const HeroBanners = document.getElementsByClassName("HeroBanner");

    for (var a = 0; a < HeroBanners.length; a++) {
        const parallaxItem = HeroBanners[a].getElementsByClassName("content parallaxItem")[0];

        if (!parallaxItem) { continue; }

        if (window.innerWidth > 1180) {
            parallaxItem.setAttribute("data-parallax-rate-y", -0.5);

        } else if (window.innerWidth > 680) {
            parallaxItem.setAttribute("data-parallax-rate-y", -0.6);

        } else {
            parallaxItem.setAttribute("data-parallax-rate-y", -0.5);

        }
    }
}


window.addEventListener("load", setHeroBannerContentParallaxData);
window.addEventListener("resize", setHeroBannerContentParallaxData);


function getElementDistanceToPageTop(elmt = null) {
    if (!elmt) { return 0; }

    const windowScrollY = window.scrollY; //px

    const elementDistanceToTop = windowScrollY + elmt.getBoundingClientRect().top; //px

    return elementDistanceToTop;
}
function handleGoodForSectionOnScroll() {
    const goodForSection = document.getElementById("goodForSection");

    if (!goodForSection) { return; }

    const windowTopScrollY = window.scrollY; //px
    const windowHeight = window.innerHeight; //px
    const windowBottomScrollY = windowTopScrollY + windowHeight; //px
    const elementDistanceToTop = getElementDistanceToPageTop(goodForSection) //px
    const elementHeight = goodForSection.clientHeight; //px

    if (windowTopScrollY < elementDistanceToTop) {
        goodForSection.classList.remove("fixed");
        goodForSection.classList.remove("atBottom");

        return;
    }

    if (windowBottomScrollY >= elementDistanceToTop + elementHeight) {
        goodForSection.classList.remove("fixed");
        goodForSection.classList.add("atBottom");

        return;
    }

    goodForSection.classList.add("fixed");
    goodForSection.classList.remove("atBottom");

    return;
}
function handleGoodForSectionItemChangeOnScroll() {
    const goodForSection = document.getElementById("goodForSection");

    if (!goodForSection) { return; }

    const windowTopScrollY = window.scrollY; //px
    const windowHeight = window.innerHeight; //px
    const windowBottomScrollY = windowTopScrollY + windowHeight; //px
    const elementDistanceToTop = getElementDistanceToPageTop(goodForSection) //px
    const elementHeight = goodForSection.clientHeight; //px
    const items = goodForSection.getElementsByClassName("item");
    const activeItem = goodForSection.getElementsByClassName("item active")[0];
    
    for (var a = items.length + 1; a > -1; a--) {
        const heightMultiplier = items.length + 1 - a;
         
        if (windowTopScrollY < elementDistanceToTop + elementHeight - (heightMultiplier * windowHeight)) { continue; }

        if (!items[a]) { continue; }

        if (activeItem) { activeItem.classList.remove("active"); }

        items[a].classList.add("active");

        if (a == items.length - 1) {
            goodForSection.classList.add("shrink");

            return;
        }

        goodForSection.classList.remove("shrink");

        return;
    }

    return;
}

function setGoodForSectionUSPContainerOverflow() {
    const goodForSection = document.getElementById("goodForSection");

    if (!goodForSection) { return; }

    const USPContainer = goodForSection.getElementsByClassName("USPContainer")[0];
    
    if (!USPContainer) { return; }

    const USPContainerInner = USPContainer.getElementsByClassName("inner")[0];
    
    if (!USPContainerInner) { return; }

    const USPContainerInnerWidth = USPContainerInner.clientWidth; //px
    const usps = USPContainerInner.getElementsByClassName("usp");
    var contentWidth = (usps.length - 1) * 50; //px
    
    for (var b = 0; b < usps.length; b++) {
        contentWidth += usps[b].clientWidth; //px
    }

    USPContainerInner.classList.remove("overflow");

    if (USPContainerInnerWidth <= contentWidth) { USPContainerInner.classList.add("overflow"); }

    return;
}


window.addEventListener("load", () => { setGoodForSectionUSPContainerOverflow(); });
window.addEventListener("resize", () => { setGoodForSectionUSPContainerOverflow(); });

window.addEventListener("scroll", () => {
    handleGoodForSectionOnScroll();
    handleGoodForSectionItemChangeOnScroll();
});

/* Element Functions */
var getElementCoordinates = function (element) {
    var elementTop = window.scrollY + element.getBoundingClientRect().top; //px
    var elementBottom = elementTop + element.clientHeight; //px
    var elementLeft = window.scrollX + element.getBoundingClientRect().left; //px
    var elementRight = elementLeft + element.clientWidth; //px
    var elementCoordinates = {
        top: elementTop,
        left: elementLeft,
        bottom: elementBottom,
        right: elementRight
    };
    return elementCoordinates;
};
var getElementIsAboveFold = function (element) {
    var elementCoordinates = getElementCoordinates(element);
    if (elementCoordinates.top > window.innerHeight) {
        return false;
    }
    return true;
};
var getElementIsInViewportX = function (element) {
    var elementCoordinates = getElementCoordinates(element);
    if (elementCoordinates.left > window.scrollX + window.innerWidth || elementCoordinates.right < window.scrollX) {
        return false;
    }
    return true;
};
var getElementIsInViewportY = function (element) {
    var elementCoordinates = getElementCoordinates(element);
    if (elementCoordinates.top > window.scrollY + window.innerHeight || elementCoordinates.bottom < window.scrollY) {
        return false;
    }
    return true;
};
var getElementIsInViewport = function (element) {
    if (!getElementIsInViewportX(element) || !getElementIsInViewportY(element)) {
        return false;
    }
    return true;
};
var getElementRelativeScrollY = function (element) {
    if (!element) {
        return 0;
    }
    var elementCoordinates = getElementCoordinates(element);
    var elementIsAboveFold = getElementIsAboveFold(element);
    var elementRelativeScrollY = window.scrollY + window.innerHeight - elementCoordinates.top; //px
    if (elementIsAboveFold) {
        elementRelativeScrollY = window.scrollY;
    }
    if (window.scrollY + window.innerHeight - elementCoordinates.top < 0) {
        elementRelativeScrollY = 0;
    }
    return elementRelativeScrollY;
};
var setElementEnterExit = function (element) {
    var enterExitType = element.getAttribute("data-enter-exit-type") || "";
    if (enterExitType == "enter") {
        if (getElementIsInViewportY(element) && !element.classList.contains("entered")) {
            element.classList.add("entered");
        }
        return;
    }
    if (enterExitType == "exit") {
        if (!getElementIsInViewportY(element) && element.classList.contains("entered")) {
            element.classList.remove("entered");
        }
        return;
    }
    if (!getElementIsInViewportY(element) && element.classList.contains("entered")) {
        element.classList.remove("entered");
    }
    if (getElementIsInViewportY(element) && !element.classList.contains("entered")) {
        element.classList.add("entered");
    }
    return;
};
var setElementParallax = function (element) {
    var parallaxParent = element.closest(".hasParallax") || null;
    if (!parallaxParent) {
        return;
    }
    var windowWidthToHeightRatio = window.innerWidth / window.innerHeight;
    var parentRelativeScroll = getElementRelativeScrollY(parallaxParent); //px
    var parallaxRateX = element.getAttribute("data-parallax-rate-x") || "";
    var parallaxRateY = element.getAttribute("data-parallax-rate-y") || "";
    var parallaxOffsetX = element.getAttribute("data-parallax-offset-x") || "";
    var parallaxOffsetY = element.getAttribute("data-parallax-offset-y") || "";
    var parallaxRateXValue = !isNaN(parseFloat(parallaxRateX)) ? parseFloat(parallaxRateX) : 0;
    var parallaxRateYValue = !isNaN(parseFloat(parallaxRateY)) ? parseFloat(parallaxRateY) : 0;
    var parallaxOffsetXValue = !isNaN(parseFloat(parallaxOffsetX)) ? parseFloat(parallaxOffsetX) : 0; //px
    var parallaxOffsetYValue = !isNaN(parseFloat(parallaxOffsetY)) ? parseFloat(parallaxOffsetY) : 0; //px
    var parallaxValueX = parallaxOffsetXValue + (parallaxRateXValue * parentRelativeScroll + windowWidthToHeightRatio); //px
    var parallaxValueY = parallaxOffsetYValue + (parallaxRateYValue * parentRelativeScroll); //px
    element.style.transform = "translate(" + parallaxValueX + "px, " + parallaxValueY + "px)";
    return;
};
var setBackgroundElementParallax = function (element) {
    var parallaxParent = element.closest(".hasParallaxBackground");
    if (!parallaxParent) {
        return;
    }
    var parentRelativeScroll = getElementRelativeScrollY(parallaxParent); //px
    var parallaxRateX = element.getAttribute("data-parallax-rate-x") || "";
    var parallaxRateY = element.getAttribute("data-parallax-rate-y") || "";
    var parallaxRateXValue = !isNaN(parseFloat(parallaxRateX)) ? parseFloat(parallaxRateX) : 0;
    var parallaxRateYValue = !isNaN(parseFloat(parallaxRateY)) ? parseFloat(parallaxRateY) : 0;
    var parallaxValueX = parallaxRateXValue * parentRelativeScroll; //px
    var parallaxValueY = parallaxRateYValue * parentRelativeScroll; //px
    element.style.transform = "translate(" + parallaxValueX + "px, " + parallaxValueY + "px)";
    return;
};

/* Enter Exit Functions */
var setEnterExitOffsets = function () {
    var enterExitItems = document.getElementsByClassName("enterExitItem");
    for (var a = 0; a < enterExitItems.length; a++) {
        var enterExitOffsetX = enterExitItems[a].getAttribute("data-enter-exit-offset-x") || "";
        var enterExitOffsetY = enterExitItems[a].getAttribute("data-enter-exit-offset-y") || "";
        var enterExitOffsetXValue = !isNaN(parseFloat(enterExitOffsetX)) ? parseFloat(enterExitOffsetX) : 0; //px
        var enterExitOffsetYValue = !isNaN(parseFloat(enterExitOffsetY)) ? parseFloat(enterExitOffsetY) : 0; //px
        var elementIsAboveFold = getElementIsAboveFold(enterExitItems[a]);
        var defaultDelay = elementIsAboveFold ? 500 : 0; //ms
        var enterExitDelay = enterExitItems[a].getAttribute("data-enter-exit-delay") || "";
        var enterExitDelayValue = !isNaN(parseFloat(enterExitDelay)) ? defaultDelay + parseFloat(enterExitDelay) : defaultDelay; //ms
        enterExitItems[a].style.transform = "translate(" + enterExitOffsetXValue + "px, " + enterExitOffsetYValue + "px)";
        enterExitItems[a].classList.add("enterExitSet");
        setTimeout(setElementEnterExit, enterExitDelayValue, enterExitItems[a]);
    }
    return;
};
var manageEnterExit = function () {
    var enterExitParents = document.getElementsByClassName("hasEnterExit");
    for (var a = 0; a < enterExitParents.length; a++) {
        var elementIsInViewport = getElementIsInViewportY(enterExitParents[a]);
        if (!elementIsInViewport) {
            continue;
        }
        var enterExitItems = enterExitParents[a].getElementsByClassName("enterExitItem");
        for (var b = 0; b < enterExitItems.length; b++) {
            setElementEnterExit(enterExitItems[b]);
        }
    }
    return;
};


window.addEventListener("load", function () { setEnterExitOffsets(); });
window.addEventListener("scroll", function () { manageEnterExit(); });

/* Parallax Functions */
var setParallaxOffsets = function () {
    var parallaxItems = document.getElementsByClassName("parallaxItem");
    for (var a = 0; a < parallaxItems.length; a++) {
        var parallaxParent = parallaxItems[a].closest(".hasParallax");
        if (!parallaxParent) {
            continue;
        }
        var parentCoordinates = getElementCoordinates(parallaxParent);
        var parallaxRateX = parallaxItems[a].getAttribute("data-parallax-rate-x") || "";
        var parallaxRateY = parallaxItems[a].getAttribute("data-parallax-rate-y") || "";
        var parallaxRateXValue = !isNaN(parseFloat(parallaxRateX)) ? parseFloat(parallaxRateX) : 0;
        var parallaxRateYValue = !isNaN(parseFloat(parallaxRateY)) ? parseFloat(parallaxRateY) : 0;
        var elementIsAboveFold = getElementIsAboveFold(parallaxItems[a]);
        var elementOffsetX = elementIsAboveFold ? 0 : (-1) * parallaxRateXValue * (window.innerWidth / 2 - parallaxItems[a].clientWidth); //px
        var elementOffsetY = elementIsAboveFold ? 0 : (-1) * parallaxRateYValue * (window.innerHeight - parallaxItems[a].clientHeight); //px
        parallaxItems[a].style.transform = "translate(" + elementOffsetX + "px, " + elementOffsetY + "px)";
        parallaxItems[a].setAttribute("data-parallax-offset-x", elementOffsetX);
        parallaxItems[a].setAttribute("data-parallax-offset-y", elementOffsetY);
        parallaxItems[a].classList.add("parallaxSet");
    }
    return;
};
var manageParallax = function () {
    var parallaxElements = document.getElementsByClassName("hasParallax");
    for (var a = 0; a < parallaxElements.length; a++) {
        var elementIsInViewport = getElementIsInViewportY(parallaxElements[a]);
        if (!elementIsInViewport) {
            continue;
        }
        var parallaxItems = parallaxElements[a].getElementsByClassName("parallaxItem");
        for (var b = 0; b < parallaxItems.length; b++) {
            setElementParallax(parallaxItems[b]);
        }
    }
    return;
};


window.addEventListener("load", function () { setParallaxOffsets(); });
window.addEventListener("scroll", function () { manageParallax(); });

/* Fade In Out of window */
var manageFadeInOut = function () {
    const fadeInOutItems = document.getElementsByClassName("fadeInOutItem");

    for (var a = 0; a < fadeInOutItems.length; a++) {
        const threshold = fadeInOutItems[a].getAttribute("data-fade-in-out-threshold");
        const elementModifiedHeight = fadeInOutItems[a].clientHeight * (1 - threshold / 100); //px
        const elementTop = fadeInOutItems[a].getBoundingClientRect().top; //px
        var opacity = 1;

        if (elementTop < 0) {
            opacity = Math.abs(elementTop / elementModifiedHeight) > 1 ? 0 : 1 - Math.abs(elementTop / elementModifiedHeight);

        } else if (elementTop > window.innerHeight) {
            opacity = 0;

        }

        // if in bottom poart of page

        fadeInOutItems[a].style.opacity = opacity;
    }

    return;
}
window.addEventListener("scroll", function () { manageFadeInOut(); });

function handleUSPContainerTabClick() {
    const eventTarget = event.currentTarget || event.target;

    if (!eventTarget) { return; }

    const content = eventTarget.closest(".content");

    if (!content) { return; }

    const USPContainer = content.getElementsByClassName("USPContainer")[0];
    const USP = content.getElementsByClassName("usp")[0];

    if (!USPContainer || !USP) { return; }

    const USPContainerOuter = USPContainer.getElementsByClassName("outer")[0];

    if (!USPContainerOuter) { return; }
    
    const USPWidth = USP.clientWidth; //px
    const dataID = parseInt(eventTarget.getAttribute("data-id")) ? parseInt(eventTarget.getAttribute("data-id")) : 0;
    const scrollXValue = USPWidth * dataID; //px

    USPContainerOuter.scrollTo({
        top: 0,
        left: scrollXValue,
        behavior: "smooth"
    });
}

function handleUSPContainerScroll() {
    const eventTarget = event.currentTarget || event.target;

    if (!eventTarget) { return; }

    const content = eventTarget.closest(".content");

    if (!content) { return; }

    const USP = content.getElementsByClassName("usp")[0];

    if (!USP) { return; }

    const USPWidth = USP.clientWidth; //px
    const tabs = content.getElementsByClassName("tab");
    const scrollLeft = eventTarget.scrollLeft; //px

    const activeTabID = Math.round(scrollLeft / USPWidth);

    for (var a = 0; a < tabs.length; a++) {
        tabs[a].classList.remove("active");
    }

    tabs[activeTabID].classList.add("active");
}

function setUSPContainerScrollListener() {
    const goodForSection = document.getElementById("goodForSection");

    if (!goodForSection) { return; }

    const USPCotnainer = goodForSection.getElementsByClassName("USPContainer")[0];

    if (!USPCotnainer) { return; }

    const USPContainerOuter = USPCotnainer.getElementsByClassName("outer")[0];

    if (!USPContainerOuter) { return; }

    USPContainerOuter.addEventListener("scroll", handleUSPContainerScroll);
}


window.addEventListener("load", setUSPContainerScrollListener);

function handleOpenInstgramPopUp() {
    const eventTarget = event.currentTarget || event.target;
    const popUpContainer = document.getElementById("instgramPopUps");

    if (!eventTarget || !popUpContainer) { return; }

    const targetID = parseInt(eventTarget.getAttribute("data-id")) ? parseInt(eventTarget.getAttribute("data-id")) : 0;
    const popUps = popUpContainer.getElementsByClassName("popUp");

    for (var a = 0; a < popUps.length; a++) {
        const popUpID = parseInt(popUps[a].getAttribute("data-id"));

        if (popUpID !== targetID) { continue; }

        //popUps[a].classList.add("active");

        popUps[a].style.display = "block";

        setTimeout(() => {
            popUps[a].style.opacity = 1;
        }, 100);

        return;
    }
}
function handleCloseInstgramPopUp() {
    const eventTarget = event.currentTarget || event.target;

    if (!eventTarget) { return; }

    const popUp = eventTarget.closest(".popUp");

    if (!popUp) { return; }

    popUp.classList.remove("active");
    popUp.style.opacity = 0;

        setTimeout(() => {
            popUp.style.display = "none";
        }, 600);

}

// $(document).ready(function(){
//     setBusinessCarouselTabContainerOverflow();  
//     setImageSwitchContainerParallaxData();
//     setHeroBannerContentParallaxData();
//     setGoodForSectionUSPContainerOverflow();
//     setEnterExitOffsets();
//     setParallaxOffsets();
//     setUSPContainerScrollListener();

//     console.log('DOCUMENT READY');
// });
