//Main variable and JS scripts for Ian Gauthier's Portfolio

var screenSize;
var filterCriteria;

var elements = {
    2: [ ".intro-content h2",".intro-content p"]  
};

var linkColour = $(".intro-content h2").css("color");
var originalModal = $('#project-modal').html();

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
    
     $('.project-tag').click(function (e) {
         var data = getProjects($(this).attr('project-number'));
         $( "#project-modal" ).dialog( "option", "width", (screenSize.X * .95) );
         $( "#project-modal" ).dialog( "option", "height", (screenSize.Y * .95) );
         console.log(data);
         $( "#project-modal" ).dialog( "open" );
    });
    
    $( ".skill-group li" ).draggable({
        revert: "invalid",
        containment: ".skills-wrapper"
    });
    
    $( ".graph-wrapper" ).droppable({
      activeClass: "drop-here",
      hoverClass: "item-hover",
      drop: function( event, ui ) {
        var horPos = (ui.draggable.attr("passion")*9) + '%',
            vertPos = (ui.draggable.attr("experience")*10) + '%',
            color = randomColor(),
            colorString = "rgb(" + color.red + "," + color.green + "," + color.blue + ")",
            //reverseColor = "rgb(" + (255 - color.red) + "," + (255 - color.green) + "," + (255 - color.blue) + ")",
            
            yiq = ((color.red*299)+(color.green*587)+(color.blue*114))/1000;
            
            if(yiq >= 128) { 
                var reverseColor = 'black'; 
            } else { 
                var reverseColor = 'white';
            };
          
           var  appendString =  '<li class="graph-item" style="bottom:' + vertPos + ';left:' + horPos + ';color:' + colorString + '"><span style="background-color:' + colorString + ';color:' + reverseColor + ';">' + ui.draggable.text() + '</span></li>';
            
        $( this ).append(appendString);
        $(ui.draggable).remove(); 
      }
    });
    
    $( "#project-modal" ).dialog({
      autoOpen: false,
      draggable: false,
      smoothHeight: true,
      show: {
        effect: "size",
        duration: 1000
      },
      hide: {
        effect: "explode",
        duration: 500
      },
      open: function( event, ui ) { $('.darkened-background').fadeIn(500);  $('span.ui-button-text').html("X");},
      close: function( event, ui ) { $('.darkened-background').fadeOut(200); destroyDialog(); }    
    });
    
    $('#contact-form').parsley();
    
    if (modal) {
        $('.dark-screen').fadeOut(1000);
    }
    
  
});

$(window).resize(function(){
    
    screenMeasure();
    adjustElements();
    
});

