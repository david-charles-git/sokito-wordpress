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
function handleSubscriptionFormSubmission () {
    const eventTarget = event.currentTarget || event.target;

    if (!eventTarget) { return; }

    const form = eventTarget.closest(".form");
    const submissionForm = document.getElementById("gform_5");

    if (!form || !submissionForm) { return; }

    const emailContainer = form.getElementsByTagName("INPUT")[0];
    const emailTypeContainer = form.getElementsByClassName("currentValue")[0];
    const submissionFormEmailInput = document.getElementById("input_5_5");
    const submissionFormEmailTypeInput = document.getElementById("input_5_7");

    if (!emailContainer || !emailTypeContainer || !submissionFormEmailInput || !submissionFormEmailTypeInput) { return; }

    const emailValue = emailContainer.value;
    const emailTypeValue = emailTypeContainer.getAttribute("data-value");
    var validEmail = false;
    var validEmailType = false;

    if (isValidEmail(emailValue)) {
        submissionFormEmailInput.value = emailValue;
        validEmail = true;
        emailContainer.classList.remove("error");

    } else {
        emailContainer.classList.add("error");

    }

    if (isValidEmailType(emailTypeValue)) {
        submissionFormEmailTypeInput.value = emailTypeValue;
        validEmailType = true;
        emailTypeContainer.parentElement.classList.remove("error");

    } else {
        emailTypeContainer.parentElement.classList.add("error");

    }

    if (validEmail && validEmailType) { submissionForm.submit(); }

    return;
}
function handleSubscriptionFormEmailChange() {
    const eventTarget = event.currentTarget || event.target;

    if (!eventTarget) { return; }

    eventTarget.classList.remove("error");

    return;
}

function isValidEmail(email = null) {
    if (!email) { return false; }

    var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

    if (email.match(validRegex)) { return true; }

    return false;
}
function isValidEmailType(emailType = null) {
    if (!emailType) { return false; }

    return true;
}
/* Subscription Form Functions - end */