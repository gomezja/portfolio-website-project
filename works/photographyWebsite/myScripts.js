// initial starting slide
var slideIndex = 0;

// indicates current slide
updateCurrentSlide(slideIndex);

// called when left or right arrow is clicked
function changeSlide(change){
    slideIndex += change;

    updateCurrentSlide(slideIndex);
}

// called when user clicks on a carousel indicator
function goToSlide(choice) {
    slideIndex = choice;

    updateCurrentSlide(slideIndex);
}

function updateCurrentSlide(num) {
    var imgSlides = document.getElementsByClassName("img-slides");
    var indicator = document.getElementsByClassName("carousel-indicator");

    // check if slide index is out-of-bounds
    if(num < 0) {
        slideIndex = imgSlides.length - 1;
    } else if(num > imgSlides.length - 1) {
        slideIndex = 0;
    }

    // reset visibility of all image slides
    for(let i = 0; i < imgSlides.length; i++) {
        imgSlides[i].style.display = "none";
    }

    // reset fill of all carousel indicators
    for(let i = 0; i < indicator.length; i++) {
        indicator[i].className = indicator[i].className.replace(" current-indicator", "");
    }

    imgSlides[slideIndex].style.display = "block";
    indicator[slideIndex].className += " current-indicator";
}

// dropdown nav item is clicked
function dropdownClicked() {
    var drop = document.getElementById("dropdown");

    // display dropdown items and rotate dropdown icon
    if (drop.className === "dropdown-content") {
        drop.className = "dropdown-content clicked";
        document.getElementById("dropdown-icon").style.transform = "rotate(180deg)";
        document.getElementById("dropdown-btn").className = "dropdown-btn active";
    } else {
        drop.className = "dropdown-content";
        document.getElementById("dropdown-icon").style.transform = "none";
        document.getElementById("dropdown-btn").className = "dropdown-btn";
    }

    return false;
}