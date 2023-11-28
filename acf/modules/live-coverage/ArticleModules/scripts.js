/* Read More Functions - start */
function readMoreLess(elmt = null) {
    if (elmt) {
        var readMoreParent = elmt.parentElement.parentElement;
        var readMoreContainer = elmt.parentElement;
        var readMoreElementArray = readMoreContainer.getElementsByTagName("P");
        var buttonInnerText = "Read more";
        var elementDisplay = "";

        readMoreParent.style.opacity = 0;

        setTimeout(function() {
            readMoreContainer.classList.remove("active");

            if (elmt.innerText == "Read more") {
                buttonInnerText = "Read less";
                elementDisplay = "inline";
                readMoreContainer.classList.add("active");

            }

            for (var a = 0; a < readMoreElementArray.length; a++) {
                if (readMoreElementArray[a] != elmt) {
                    readMoreElementArray[a].style.display = elementDisplay;
        
                }
            }

            var parentHeight = readMoreContainer.clientHeight;

            elmt.innerText = buttonInnerText;
            readMoreParent.style.height = parentHeight + 'px';

        }, 300);

        setTimeout(function() {
            readMoreParent.style.opacity = 1;

        }, 310);

    } else {
        console.log("function error: readMoreLess");

    }
}
/* Read More Functions - end */

/* Video Functions - start */
function handlePlayPauseVideo() {
    const eventTarget = event.currentTarget || event.target;

    if (!eventTarget) { return; }

    stopCarouselAutoShift(eventTarget);

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