

function setIndicatorColors() {
    let indicator = document.getElementById("blindsIndicator");
    let rangeValue = document.getElementById("slider").value;

    if (rangeValue == 0) {
        indicator.style.color = "red";
    }
    else if (rangeValue == 99) {
        indicator.style.color = "green";
    }
    else {
        indicator.style.color = "orange";
    }
}

function changeIndicatorColor(className, color) {
    let indicator = document.getElementsByClassName(className);

    indicator[0].style.color = color;
}

function changeRangeIndicatorColor() { 
    let indicator = document.getElementById("blindsIndicator");
    let rangeValue = document.getElementById("slider").value;

    if (rangeValue == 0) {
        indicator.style.color = "red";
    }
    else if (rangeValue == 99) {
        indicator.style.color = "green";
    }
    else {
        indicator.style.color = "orange";
    }
}
