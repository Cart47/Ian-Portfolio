function screenMeasure() {
    screenSize = {
        X: $(window).width(),
        Y: $(window).height()
    }
}

function adjustElements () {
    $(".front-wrapper, .intro-wrapper").height(screenSize.Y);
    $(".triangle1,.triangle2, .triangle3, .triangle4, .triangle5, .triangle6, .triangle7,.triangle8, .triangle9, .triangle10, .triangle11, .triangle12").css({
        borderTopWidth: screenSize.Y ,
        borderRightWidth: screenSize.X * .3
    });
    
}

function introAnimation () {
    TweenMax.from(".triangle1", 2, {x: -500, delay: .1});
    TweenMax.from(".triangle2", 2, {x: -500, delay: .2});
    TweenMax.from(".triangle3", 2, {x: -500, delay: .3});
    TweenMax.from(".triangle4", 2, {x: -500, delay: .4});
    TweenMax.from(".triangle5", 2, {x: -500, delay: .5});
    TweenMax.from(".triangle6", 2, {x: -500, delay: .6});
    TweenMax.from(".triangle7", 2, {x: -500, delay: .7});
    TweenMax.from(".triangle8", 2, {x: -500, delay: .8});
    TweenMax.from(".triangle9", 2, {x: -500, delay: .9});
    TweenMax.from(".triangle10", 2, {x: -500, delay: 1});
    TweenMax.from(".triangle11", 2, {x: -500, delay: 1.1});
    TweenMax.from(".triangle12", 2, {x: -500, delay: 1.2});
    TweenMax.from(".main-headings h1", 3, {opacity: 0, y:50});
    TweenMax.from(".main-headings h2", 3, {opacity: 0, y: -50});
    TweenMax.from("nav", 2, {y: -100, delay: 2.5});
    TweenMax.from(".social-wrapper", 2, {x: -75, delay: 2.5});
    
}

function prepareElements(elements) {
    //This will prepare all of the elements on the page
    $.each(elements, function(key, value){
                
        $.each(value, function(key2, value2){
        
            TweenMax.to(value2, 0, {x:30, y:50, opacity: 0});
        
        });
    });
    
}

function slideAnimation(slideIndex) {
    
    var slideElements = elements[slideIndex];
    
    if (elements[slideIndex]){

        //grabs the approprite object from the array
        $.each(slideElements, function(key, value){
            TweenMax.to(value, 1, {x: 0, y: 0, opacity:1});
        });
    }
}

function toggleNavigation (slideIndex) {
    $("nav li a").css({color: ''});
    $("nav li a").eq( slideIndex - 1).css({color: linkColour});
}

function randomColor () {
    return {
        red: Math.ceil(Math.random()*255),
        green: Math.ceil(Math.random()*255),
        blue: Math.ceil(Math.random()*255),
    }
}

function sortProjects (criteria) {
    
    $('.projects').isotope({filter: criteria});
    
}

function getProjects (criteria) {
    alert("Project Selected");
}

function mainJS() {
    basket.require(
                { url: 'JS/main.js', skipCache: true },
                { url: 'JS/FlickrAPI.js', skipCache: true }
            ); 
};

