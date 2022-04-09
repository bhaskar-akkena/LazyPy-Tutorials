//Create an array of images
var imageArray = ["http://solace.ist.rit.edu/~jga4809/240/project2/assets/images/Seneca-park-zoo-img1.jpg", "http://solace.ist.rit.edu/~jga4809/240/project2/assets/images/Seneca-park-zoo-img2.jpg", "http://solace.ist.rit.edu/~jga4809/240/project2/assets/images/Seneca-park-zoo-img3.jpg", "http://solace.ist.rit.edu/~jga4809/240/project2/assets/images/Seneca-park-zoo-img4.jpg","http://solace.ist.rit.edu/~jga4809/240/project2/assets/images/Seneca-park-zoo-img5.jpg"];

//Save total size of array to variable arraySize
var arraySize = imageArray.length;

//Set wait time between slides in milliseconds
setInterval(runit, 2000);

var x = 1; //Used to count up to arraySize

//Function runit play slideshow when called
function runit() {
    //Set image to next picture in image array
    document.getElementById('slideshow').src = imageArray[x];

    //Increase count by 1
    x++;

    //If count has reached the last index of imageArray than set count back to starting index.
    if (x === arraySize) {
        x = 0;
    }
}

