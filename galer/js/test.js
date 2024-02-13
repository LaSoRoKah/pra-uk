// disable submit
function checkform() {
    const formElements = document.forms["yourForm"].elements;
    let submitBtnActive = true;

    for (let inputEl = 0; inputEl < formElements.length; inputEl++) {
        if (formElements[inputEl].value.length == 0) submitBtnActive = false;
    }

    if (submitBtnActive) {
        document.getElementById("submitbutton").disabled = false;
    } else {
        document.getElementById("submitbutton").disabled = "disabled";
    }
}