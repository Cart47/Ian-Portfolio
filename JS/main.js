//Main variable and JS scripts for Ian Gauthier's Portfolio

var screenSize;
var filterCriteria;

var elements = {
    2: [ ".intro-content h2",".intro-content p"]  
};

var linkColour = $(".intro-content h2").css("color");


$(function(){
    
    screenMeasure();
    
   prepareElements(elements);
    
    $(".main").onepage_scroll({
       sectionContainer: "section",     
       easing: "ease-in-out",                  
                                        
       animationTime: 1000,             
       pagination: false,                
       updateURL: false,                
       beforeMove: function(index) {
           toggleNavigation(index);
       }, 
       afterMove: function(index) {
          slideAnimation(index);
            
       },   
       loop: false,                     
       keyboard: true,                  
       responsiveFallback: false,        
       direction: "vertical"             
    });
    
    $("nav a").eq(0).css({color: linkColour });
    
    $(".scroll-down").click(function(){
        $(".main").moveDown();
    })
    
    $('nav a').click(function () {
        $(".main").moveTo($(this).attr('index-value'));
    });
    
    $('.intro-content a').click(function () {
        $(".main").moveTo($(this).attr('index-value'));
    });
    
    $('.project-sorting button').eq(0).css({backgroundColor: "black", color: "#ffffff"});
    
    $('.project-sorting button').click(function () {
        $('.project-sorting button').css({backgroundColor: "", color: ""}, 1500);
        $(this).animate({backgroundColor: "black", color: "#ffffff"});
    });
    
     $('.project-element').click(function () {
        getProjects($(this).attr('index-value'));
    });
    
    $( ".skill-group li" ).draggable({
        revert: "invalid",
        containment: ".skills-wrapper"
    });
    
    $( ".graph-wrapper" ).droppable({
      activeClass: "drop-here",
      hoverClass: "item-hover",
      drop: function( event, ui ) {
        var horPos = (ui.draggable.attr("passion")*9.5) + '%',
            vertPos = (ui.draggable.attr("experience")*10) + '%',
            color = randomColor(),
            colorString = "rgb(" + color.red + "," + color.green + "," + color.blue + ")",
            reverseColor = "rgb(" + (255 - color.red) + "," + (255 - color.green) + "," + (255 - color.blue) + ")",
            appendString =  '<li class="graph-item" style="bottom:' + vertPos + ';left:' + horPos + ';color:' + colorString + '"><span style="background-color:' + colorString + ';color:' + reverseColor + ';">' + ui.draggable.text() + '</span></li>',
            contrastLevel = ((color.red * 299) + (color.green * 587) + (color.blue * 114)) / 1000;
            
        console.log(contrastLevel);
        $( this ).append(appendString);
        $(ui.draggable).remove(); 
      }
    });
    
    if (modal) {
        $('.dark-screen').fadeOut(1000);
    }
    
  
});

$(window).resize(function(){
    
    screenMeasure();
    adjustElements();
    
});

