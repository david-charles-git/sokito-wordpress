/* Share Button Functions - start */
function handleShareButtonClick() {
    const eventTarget = event.currentTarget || event.target;

    if (!eventTarget) { return; }

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