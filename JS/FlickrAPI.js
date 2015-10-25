// This will be the API for the places aspect of the website.


var mainURL = 'https://api.flickr.com/services/rest/?'
var methodURL = 'method=flickr.places.find';
var photosURL = 'method=flickr.photos.search';
var apiKey = '&api_key=1720c3db8ef5df8eb1eec95e15f9dba1';
var apiFormat = '&format=json&nojsoncallback=1';
var slideArray = [];

// Variables for the Flickr Call
var placeURL = '&query=' + query;

//global transferable variables
var placeIdURL,
    privacy = '&privacy_filter=1',
    content = '&content_type=1',
    geo = '&geo_context=2',
    tags = '&tags=landscape,city,water,music,nature,architecture,park,',
    radius = '&radius=50',
    extras = '&extras=url_o',
    per_page = '&per_page=500';

var url_place = mainURL + methodURL + apiKey + apiFormat + placeURL;

var url_photos = mainURL + photosURL + apiKey + apiFormat + privacy + content + radius + extras + per_page;

$(document).ready(function() {

    $.getJSON(url_place, function(data) {
        var counter = 0;
        placeIdURL = '&place_id=' + data.places.place[0].place_id;
        console.log(data.places.place[0]._content);
        url_photos += placeIdURL;  
        

        $.getJSON(url_photos, function(data) {
            $.each(data.photos.photo, function(index, element) {
                if(element.width_o) {
                    var height = element.height_o,
                        width = element.width_o,
                        aspect = width/height;
                        
                    
                    if(element.width_o > 1000 && element.width_o < 5000 && aspect > 1.2 && counter < 20){
                        var farmID = element.farm,
                        serverID = element.server,
                        ID = element.id,
                        secret = element.secret,
                        slideTitle = element.title,
                        slideData = {
                            image: 'https://farm' + farmID + '.staticflickr.com/' + serverID + '/' + ID + '_' + secret + '.jpg',
                            title: slideTitle,
                            width: element.width_o
                        };
                        
                        slideArray.push(slideData);
                        counter++;
                        
                    }
                }

            });
            
            console.log(slideArray.length);
            console.log(counter);
            
            $.supersized({

                // Functionality
                slideshow: 1, // Slideshow on/off
                autoplay: 1, // Slideshow starts playing automatically
                start_slide: 0, // Start slide (0 is random)
                stop_loop: 0, // Pauses slideshow on last slide
                random: 0, // Randomize slide order (Ignores start slide)
                slide_interval: 3000, // Length between transitions
                transition: 6, // 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
                transition_speed: 1500, // Speed of transition
                new_window: 0, // Image links open in new window/tab
                pause_hover: 0, // Pause slideshow on hover
                keyboard_nav: 0, // Keyboard navigation on/off
                performance: 1, // 0-Normal, 1-Hybrid speed/quality, 2-Optimizes image quality, 3-Optimizes transition speed // (Only works for Firefox/IE, not Webkit)
                image_protect: 1, // Disables image dragging and right click with Javascript

                // Size & Position						   
                min_width: 0, // Min width allowed (in pixels)
                min_height: 0, // Min height allowed (in pixels)
                vertical_center: 1, // Vertically center background
                horizontal_center: 1, // Horizontally center background
                fit_always: 0, // Image will never exceed browser width or height (Ignores min. dimensions)
                fit_portrait: 0, // Portrait images will not exceed browser height
                fit_landscape: 0, // Landscape images will not exceed browser width

                // Components							
                slide_links: 'blank', // Individual links for each slide (Options: false, 'num', 'name', 'blank')
                thumb_links: 0, // Individual thumb links for each slide
                thumbnail_navigation: 0, // Thumbnail navigation
                slides: slideArray,

                // Theme Options			   
                progress_bar: 0, // Timer for each slide							
                mouse_scrub: 0

            });
            
            windowLoaded();
            
         });
        
    });   
            
            
            
   
    
    
    

});