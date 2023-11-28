
function hideHotspotCards() { 
    const hotspotContainer = document.getElementById("hotspotContainer");

    if (!hotspotContainer) { return; }

    const hotspotArray = hotspotContainer.getElementsByClassName("hotspot");
    const cardArray = hotspotContainer.getElementsByClassName("content");

    for (var a = 0; a < hotspotArray.length; a++) { 
        hotspotArray[a].classList.remove("active");
    }

    for (var a = 0; a < cardArray.length; a++) { 
        cardArray[a].classList.remove("active");
    }
}

function showHotspotCardHover(elmt = null) { 
    const hotspotContainer = document.getElementById("hotspotContainer");
    const mobilScreeBreak = 1080;

    if (!elmt || !hotspotContainer || window.innerWidth <= mobilScreeBreak) { return; }
    
    
    const elmtID = elmt.getAttribute("data-id");                
    const hotspotArray = hotspotContainer.getElementsByClassName("hotspot");
    const cardArray = hotspotContainer.getElementsByClassName("content");

    for (var a = 0; a < hotspotArray.length; a++) {
        if (hotspotArray[a].getAttribute("data-id") === elmtID) {
            hotspotArray[a].classList.add("active");

            break;
        }
    }

    for (var a = 0; a < cardArray.length; a++) {
        if (cardArray[a].getAttribute("data-id") === elmtID) {
            cardArray[a].classList.add("active");

            break;
        }
    }
}

function showHotspotCardClick(elmt = null) {
    const hotspotContainer = document.getElementById("hotspotContainer");
    const mobilScreenBreak = 1080;

    if (!elmt || !hotspotContainer || window.innerWidth > mobilScreenBreak) { return; }

    hideHotspotCards();

    const elmtID = elmt.getAttribute("data-id");
    const hotspotArray = hotspotContainer.getElementsByClassName("hotspot");
    const cardArray = hotspotContainer.getElementsByClassName("content");

    for (var a = 0; a < hotspotArray.length; a++) {
        if (hotspotArray[a].getAttribute("data-id") === elmtID) {
            hotspotArray[a].classList.add("active");

            break;
        }
    }

    for (var a = 0; a < cardArray.length; a++) {
        if (cardArray[a].getAttribute("data-id") === elmtID) {
            const cardParent = cardArray[a].parentElement;
            const cardHeight = cardArray[a].clientHeight;

            cardArray[a].classList.add("active");
            cardParent.style.height = Math.ceil(cardHeight) + "px";

            break;
        }
    }
}

function handleMouseLeave() {
    const mobilScreeBreak = 1080;

    if (window.innerWidth <= mobilScreeBreak) { return; }

    hideHotspotCards();
}

function setHotpostTabInnerMinWidth() {
    const tabContainer = document.getElementById("tabContainer");

    if (!tabContainer) { return; }

    const innerElement = tabContainer.getElementsByClassName("inner")[0];
    const tabArray = tabContainer.getElementsByClassName("tab");
    var newInnerMinWidth = 0;

    for (var a = 0; a < tabArray.length; a++) {
        const tabWidth = tabArray[a].clientWidth;

        newInnerMinWidth += tabWidth;
    }

    newInnerMinWidth += (tabArray.length - 1) * 20;
    newInnerMinWidth = Math.ceil(newInnerMinWidth);
    innerElement.style.minWidth = newInnerMinWidth + "px";
}

function setdetailsContainerHeight() {
    const detailsContainer = document.getElementById("detailsContainer");

    if (!detailsContainer) { return; }

    const activeDetails = detailsContainer.getElementsByClassName("details active")[0];

    if (!activeDetails) { return; }

    const activeDetailsHeight = activeDetails.clientHeight;

    detailsContainer.style.height = Math.ceil(activeDetailsHeight) + "px";
}

function resetHotspotContaentContainerHeights() {
    const hotspotContainer = document.getElementById("hotspotContainer");

    if (!hotspotContainer) { return; }

    const contentGroupArray = hotspotContainer.getElementsByClassName("contentGroup");

    for (var a = 0; a < contentGroupArray.length; a++) {
        contentGroupArray[a].style.height = null;
    }

}

function handleViewChange(elmt = null) {
    const hotspotContainer = document.getElementById("productHotspotsModule");

    if (!elmt || !hotspotContainer) { return; }

    const tabContainer = document.getElementById("tabContainer");
    const tabArray = tabContainer.getElementsByClassName("tab");
    const detailsContainer = document.getElementById("detailsContainer");
    const detailsArray = detailsContainer.getElementsByClassName("details");                
    const hotspotsCotnainer = document.getElementById("hotspotContainer");
    const hotspotContentGroupArray = hotspotContainer.getElementsByClassName("contentGroup");
    const hotspotGroupArray = hotspotContainer.getElementsByClassName("hotspots");
    const elmtName = elmt.getAttribute("data-name");

    for (var a = 0; a < tabArray.length; a++) {
        const tabName = tabArray[a].getAttribute("data-name");

        tabArray[a].classList.remove("active");

        if (tabName === elmtName) { tabArray[a].classList.add("active"); }

    }

    for (var a = 0; a < detailsArray.length; a++) {
        const detailsName = detailsArray[a].getAttribute("data-name");

        detailsArray[a].classList.remove("active");

        if (detailsName === elmtName) {
            const detailsHeight = detailsArray[a].clientHeight;

            detailsArray[a].classList.add("active");
            detailsContainer.style.height = Math.ceil(detailsHeight) + "px";
        }
    }

    for (var a = 0; a < hotspotContentGroupArray.length; a++) {
        const contentName = hotspotContentGroupArray[a].getAttribute("data-name");

        hotspotContentGroupArray[a].classList.remove("active");

        if (contentName === elmtName) {
            hotspotContentGroupArray[a].classList.add("active");
        }
    }

    for (var a = 0; a < hotspotGroupArray.length; a++) {
        const hotspotName = hotspotGroupArray[a].getAttribute("data-name");

        hotspotGroupArray[a].classList.remove("active");

        if (hotspotName === elmtName) {
            hotspotGroupArray[a].classList.add("active");
        }
    }

    if (elmtName === "reviews") {
        hotspotsCotnainer.classList.remove("active");

    } else {
        hotspotsCotnainer.classList.add("active");

    }
}

function handleColorSwicth(elmt = null) {
    const hotspotContainer = document.getElementById("hotspotContainer");

    if (!elmt || !hotspotContainer) { return; }

    const imageContainer = hotspotContainer.getElementsByClassName("imageContainer")[0];
    const imageArray = imageContainer.getElementsByTagName("IMG");
    const colorSwitchArray = hotspotContainer.getElementsByClassName("colorSwitch");
    const elmtID = elmt.getAttribute("data-id");

    for (var a = 0; a < imageArray.length; a++) { 
        const imageID = imageArray[a].getAttribute("data-id");

        imageArray[a].classList.remove("active");

        if (elmtID === imageID) {
            imageArray[a].classList.add("active");
        }
    }

    for (var a = 0; a < colorSwitchArray.length; a++) { 
        const colorSwitchID = colorSwitchArray[a].getAttribute("data-id");

        colorSwitchArray[a].classList.remove("active");

        if (elmtID === colorSwitchID) {
            colorSwitchArray[a].classList.add("active");
        }
    }

}

function doOnloadFunctions() {
    setHotpostTabInnerMinWidth();
    setdetailsContainerHeight();
}

function doOnResizeFunctions() {
    setHotpostTabInnerMinWidth();
    setdetailsContainerHeight();
    hideHotspotCards();
    resetHotspotContaentContainerHeights();
}

window.addEventListener("load", doOnloadFunctions);
window.addEventListener("resize", doOnResizeFunctions);
