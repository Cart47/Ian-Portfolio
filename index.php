<?php
if(!isset($_SESSION)) { session_start();}

$modal =false;

if (isset($_POST["modal"])) {
    
    $_SESSION["session"] = "true";
    
    if(isset($_POST["name"])) $_SESSION["name"] = $_POST["name"];
    if(isset($_POST["place"])) $_SESSION["place"] = $_POST["place"];
    if(isset($_POST["color"])) $_SESSION["color"] = $_POST["color"];
    
}

if (isset($_SESSION["session"])) 
{
    if(isset($_SESSION["name"]))  $name = $_SESSION["name"];
    if(isset($_SESSION["place"])) $place = $_SESSION["place"];
    if(isset($_SESSION["color"])) $color = $_SESSION["color"];
    if(isset($_SESSION["username"])) { $username = $_SESSION["username"]; } else { $username = $name; };
    if(isset($_SESSION["useremail"])) $email = $_SESSION["useremail"];
    if(isset($_SESSION["usermessage"])) $message = $_SESSION["usermessage"];
} 
else
{
    $modal = true;
    $name = "Ian";
    $place = "Kingston, ON";
    $color = "orange";
}

?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ian Gauthier's Portfolio</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/main.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans|Poiret+One|Fontdiner+Swanky|Press+Start+2P|Playball|Raleway:400,900' rel='stylesheet' type='text/css'>
   <script>document.cookie='resolution='+Math.max(screen.width,screen.height)+'; path=/';</script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/basket.js/0.5.2/basket.full.min.js"></script>
   <script type="text/javascript">
        
         var query = <?php  echo '"' . $place . '"'?>;
         var modal = false;
        basket.clear(true);
        basket.require(
            {url: '//code.jquery.com/jquery-1.11.3.min.js'},
            {url: 'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js'}
                      )
            .then(function() {
                basket.require(
                    {url: '//code.jquery.com/ui/1.11.4/jquery-ui.min.js', expire: 168},
                    {url: '//code.jquery.com/jquery-migrate-1.2.1.min.js', expire: 168},
                    { url: 'JS/functions.js', skipCache: true },
                    { url: 'JS/parsley.min.js', expire: 168},
                    { url: 'JS/jquery.easing.min.js', expire: 168},
                    { url: 'JS/supersized.3.2.7.min.js', expire: 168},
                    { url: 'JS/jquery.onepage-scroll.min.js', expire: 168},
                    { url: 'JS/jquery.flexslider-min.js', expire: 168},
                    { url: 'https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/2.2.2/isotope.pkgd.min.js', expire: 168}
                )
                .then(function() {
                    basket.require(
                        { url: 'JS/jquery.ui.touch-punch.min.js', expire: 168},
                        { url: "JS/modal.js", skipCache: true }
                    )
                })
        
            });
            
    </script>
</head>

<body>
    <?php if($modal) { ?> 
        <script type="text/javascript"> modal = true; </script>  
     <div id="modal-wrapper">
         <video autoplay loop poster="img/water_background_image.png" id="back-vid">
            <source src="video/water_background.webm" type="video/webm">
            <source src="video/water_background.mp4" type="video/mp4">
        </video>
        <div class="initial-social-icons">
            <ul>
                <!--           write a JS script that will expand to show the name-->
                <li><a href="https://ca.linkedin.com/in/iangauthier47" target="_blank"><i class="fa fa-linkedin-square"></i></a></li>
                <li><a href="https://github.com/Cart47" target="_blank"><i class="fa fa-github"></i></a></li>
                <li><a href="http://stackoverflow.com/users/5044821/ian-gauthier" target="_blank"><i class="fa fa-stack-overflow"></i></a></li>
                <li><a href="https://www.facebook.com/IanGauthier7" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
                <li><a href="https://twitter.com/IanGauthier7" target="_blank"><i class="fa fa-twitter-square"></i></a></li>
            </ul>
        </div>
<!--       <div class="background-photo"></div>-->
        <div class="form-wrapper">
            <p class="modal-header">Welcome to Ian Gauthier's Portfolio </p>
            <p class="modal-subhead"> Please Provide the Following Details</p>
          <form id="modal-form" action="index.php" method="post">
            <fieldset>
              <label for="name">Please Provide your Name:</label>
              <input type="text" name="name" id="name" placeholder="Please Provide a Name" autofocus required>
              <div class="place-form">
                  <label for="place">Please Include your Favourite City:</label>
                  <input type="text" name="place" id="place" placeholder="What is your Favourite City to Visit?" required> 
              </div>
              <label for="color">Please Pick a Color:</label>
              <div class="styled-select">
                  <select name="color" id="color" required>
                    <option value="red" selected>Red</option>
                    <option value="orange">Orange</option>
                    <option value="green">Green</option>
                    <option value="yellow">Yellow</option>
                    <option value="purple">Purple</option>
                    <option value="blue">Blue</option>
                    <option value="brown">Brown</option>
                  </select>
              </div>
              <input type="submit" name="modal">
            </fieldset>
          </form>
          </div>
     </div>
     <div class="darkened-background"></div>
        
     
     <?php  } ?>
      <div class="dark-screen">
          <img src="img/ajax-loader.gif" class="loader" alt="" />
      </div>
        <nav>
            <ul>
                <li><a index-value="1">Introduction</a></li>
                <li><a index-value="2">About Me</a></li>
                <li><a index-value="3">My Skills</a></li>
                <li><a index-value="4">Portfolio</a></li>
                <li><a index-value="5">Contact Me</a></li>
            </ul>  

        </nav>
        <div class="scroll-wrapper">
            <p>Scroll Down for More</p>
            <button class="scroll-down">
                <span><i class="glyphicon glyphicon-chevron-down"></i></span>
            </button>
        </div>
        <div class="social-wrapper">
            <ul>
                <!--           write a JS script that will expand to show the name-->
                <li><a href="https://ca.linkedin.com/in/iangauthier47" target="_blank"><i class="fa fa-linkedin-square"></i><span>LinkedIn</span></a></li>
                <li><a href="https://github.com/Cart47" target="_blank"><i class="fa fa-github"></i><span>GitHub</span></a></li>
                <li><a href="http://stackoverflow.com/users/5044821/ian-gauthier" target="_blank"><i class="fa fa-stack-overflow"></i><span>Stack Overflow</span></a></li>
                <li><a href="https://www.facebook.com/IanGauthier7" target="_blank"><i class="fa fa-facebook-square"></i><span>Facebook</span></a></li>
                <li><a href="https://twitter.com/IanGauthier7" target="_blank"><i class="fa fa-twitter-square"></i><span>Twitter</span></a></li>

            </ul>
        </div>
        <div class="main">
            <section class="intro-section">
                   <div class="front-wrapper">
                        <div class="main-slider"></div>
                        <div id="slidecaption"></div>
                        <div class="traingles">
                            <div class="triangle12"></div>
                            <div class="triangle11"></div>
                            <div class="triangle10"></div>
                            <div class="triangle9"></div>
                            <div class="triangle8"></div>
                            <div class="triangle7"></div>
                            <div class="triangle6"></div>
                            <div class="triangle5"></div>
                            <div class="triangle4"></div>
                            <div class="triangle3"></div>
                            <div class="triangle2"></div>
                            <div class="triangle1"></div>
                        </div>
                    </div>
                    <div class="main-headings">
                        <h1>Ian Gauthier</h1>
                        <h2>Web Designer &amp; Developer</h2>
                    </div>
            </section>
            <section class="about-section">
                <div id="space-invader"></div>
                <img class="myPic" src="img/Ian-Gauthier.jpg" alt="Picture of Ian Gauthier">
                <div class="intro-content">
                    <h2>Let Me Tell You a Little About Myself, <?php echo $name ?></h2>
                    <p>We live in an ever-evolving world. What is top of the line today can become obsolete by tomorrow. The key to success in this turbulent world is creating and producing something that can adapt to meet the needs of today and the demands of tomorrow.</p>

                    <p>My name is Ian Gauthier and I am a freelance, full-stack web developer. In today’s world, web developers are challenged more than ever. It is no longer acceptable to create "just a website". I believe in taking a holistic approach. The challenges and problems that appear at the beginning of any project are the tip of the iceberg. How a website is built and structured will dramatically impact the client and their target audience. What the website needs to accomplish, how a visitor will use it, and how it adapts to changing consumer trends, all need to be considered. As such, I design websites to be living connections that can respond to the needs of today and adapt to the demands of tomorrow.
                    </p>
                    <p class="work-call">Looking to chat about web coding?&nbsp;<a class="contactme" index-value="5">Click here</a> </p>
                    <p class="work-call">Looking to contact me regarding work?&nbsp;<a class="contactme" index-value="5">Click here</a> </p>
                    <p class="work-call">Have a position you think I would be great for?&nbsp;<a class="contactme" index-value="5">Click here</a> </p>
                </div>
            </section>
            <section class="skills-section">
                <div class="skills-wrapper">
                    <h2>Take a Look <?php echo $name ?>, I Have a Few Skills You Might Find Helpful</h2>
                    <p>Drag each skill over the graph to find out more</p>
                    <div class="skills">
                           <div class="left-column">
                                <div class="skill-group">
                                    <h3>Marketing Communication</h3>
                                    <ul>
                                        <li passion="6" experience="7.3">Marketing &amp; Advertising</li>
                                        <li passion="8.1" experience="7.6">Web Design &amp; Development</li>
                                        <li passion="9.2" experience="8.3">Web Project Management</li>
                                        <li passion="8.2" experience="8">Team Leadership</li>
                                        <li passion="10" experience="10">Teamwork</li>
                                        <li passion="5" experience="9">Public Speaking</li>
                                        <li passion="4.5" experience="3">Social Media Marketing</li>
                                        <li passion="5.3" experience="7">Market Research &amp; Strategy</li>
                                        <li passion="4" experience="6">Copywriting</li>
                                        <li passion="8.3" experience="6.4">Event Management</li>
                                    </ul>
                                </div>
                                <div class="skill-group" style="margin-top: 20px;">
                                    <h3>Software Knowledge</h3>
                                    <ul>
                                        <li passion="7" experience="9.3">Apple Mac OS X</li>
                                        <li passion="4" experience="8.4">Microsoft Windows OS</li>
                                        <li passion="3.2" experience="3">Visual Studios</li>
                                        <li passion="7.2" experience="7.7">Adobe Creative Suite</li>
                                        <li passion="2.4" experience="9.6">Microsoft Office</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="right-column">
                                <div class="skill-group">
                                    <h3>Web Development</h3>
                                    <ul>
                                        <li passion="4.5" experience="9.8">HTML / CSS</li>
                                        <li passion="10" experience="10">Responsive Web Design</li>
                                        <li passion="9.9" experience="8.1">Javascript &amp; JSON</li>
                                        <li passion="9.9" experience="7.1">UI &amp; UX Design</li>
                                        <li passion="4" experience="5">XML</li>
                                        <li passion="8.4" experience="8.3">LESS &amp; SASS </li>
                                        <li passion="3" experience="6.4">Twitter Bootstrap</li>
                                        <li passion="8" experience="5.3">Wordpress CMS</li>
                                        <li passion="7" experience="4.1">REST &amp; SOAP APIs</li>
                                        <li passion="7" experience="3">Command Line</li>
                                        <li passion="8" experience="3">Grunt &amp; GULP Scaffolding</li>
                                        <li passion="6" experience="7.6">SQL &amp; MySQL</li>
                                        <li passion="7" experience="7.3">PHP</li>
                                        <li passion="8.5" experience="8.5">jQuery &amp; jQuery UI</li>
                                        <li passion="9.0" experience="8.3">GreenSock Animation Platform</li>
                                        <li passion="9.5" experience="4.6">AngularJS</li>
                                        <li passion="9.8" experience="2">Node.JS</li>
                                        <li passion="9" experience="3">Mongo DB</li>
                                        <li passion="9.7" experience="1">Amazon Web Services</li>

                                    </ul>
                                </div>
                        </div>
                    </div>
                    <div class="graph-container">
                        <div class="graph-wrapper">
                            <div class="lines">
                               <div class="horizontal-line">
                                   <span class="right-rated">Very Passionate</span>
                                   <span class="left-rated">Humbly Passionate</span>
                               </div>
                               <div class="vertical-line">
                                   <span class="top-rated">Professional</span>
                                   <span class="bottom-rated">Still a Beginner</span>
                               </div>
                            </div>
                        </div>
                   </div>
                </div>
            </section>
            <section class="projects-section">
               <div id="project-modal">
                  <div class="project-overview">
                       <h3 class="modal-head"></h3>
                       <p class="modal-description"></p>
                   </div>
                   <div class="modal-slider">
                      <div class="loading-modal">
                          <img src="img/loading_spinner.gif">
                      </div>
                       <div class="flexslider" id="slider">
                           <ul class="slides"></ul>
                       </div>
                   </div>
               </div>
                <div class="projects-wrapper">
                    <h2>Examples of Projects I've Worked On</h2>
                    <div class="project-sorting">
                        <button onclick='sortProjects("*")'>All</button>
                        <button onclick='sortProjects(".js")'>Javascript</button>
                        <button onclick='sortProjects(".jq")'>JQuery</button>
                        <button onclick='sortProjects(".xml")'>XML</button>
                        <button onclick='sortProjects(".php")'>PHP</button>
                        <button onclick='sortProjects(".less")'>LESS</button>
                        <button onclick='sortProjects(".sass")'>SASS</button>
                        <button onclick='sortProjects(".sql")'>SQL</button>
                        <button onclick='sortProjects(".ang")'>AngularJS</button>
                        <button onclick='sortProjects(".node")'>Node.JS</button>
                        <button onclick='sortProjects(".mdb")'>MongoDB</button>
                        <button onclick='sortProjects(".rwd")'>Responsive Web Design</button>
                        <button onclick='sortProjects(".wp")'>Wordpress</button>
                        <button onclick='sortProjects(".bs")'>Twitter Bootstrap</button>
                    </div>
                     <div class="project-container">
                      <div class="projects">
                        <div class="project-sizer"></div>
                        <div class="project-element doubleHigh php js sql xml sass rwd">
                           <img class="project-image" src="img/CITF-screen.jpg" alt="Chorus in the Forest project">
                            <a class="project-tag" project-number="1">
                                <div class="inner-project">
                                    <p class="citf">Chorus <br> in <br>  the <br>  Forest</p>
                                </div>
                            </a>
                        </div>
                        <div class="project-element rwd sass">
                           <img class="project-image" src="img/aldershot-screen.png" alt="Aldershot Communications project">
                            <a class="project-tag" project-number="3">
                                <div class="inner-project">
                                    <p class="alderwood">Alderwood</p>
                                </div>
                            </a>
                        </div>
                        <div class="project-element js jq rwd">
                           <img class="project-image" src="img/NakedStock-screen.png" alt="Naked Stock project">
                            <a class="project-tag" project-number="4">
                                <div class="inner-project">
                                    <p class="nakedStock">Naked <br>  Stock <br>  Cafe</p>
                                </div>
                            </a>
                        </div>
                        <div class="project-element doubleWide doubleHigh js rwd ang node mdb">
                           <img class="project-image" src="img/tripnout-screen.png" alt="Trip n Out project">
                            <a class="project-tag" project-number="2">
                                <div class="inner-project">
                                    <p class="tripout">Trip <br>  n <br>  Out</p>
                                </div>
                            </a>
                        </div>
                        <div class="project-element">
                           <img class="project-image" src="img/space-screen.png" alt="The Planets project">
                            <a class="project-tag" project-number="5">
                                <div class="inner-project">
                                    <p class="planets">The <br>  Planets</p>
                                </div>
                            </a>
                        </div>
                        <div class="project-element php js rwd jq less bs">
                           <img class="project-image" src="img/caplans-screen.jpg" alt="Caplans Appliances project">
                            <a class="project-tag" project-number="6">
                                <div class="inner-project">
                                    <p class="caplans">Caplans Appliances</p>
                                </div>
                            </a>
                        </div>
                        <div class="project-element doubleHigh rwd less wp js jq php">
                           <img class="project-image" src="img/7jdesign-screen.png" alt="7J Design project">
                            <a class="project-tag" project-number="7">
                                <div class="inner-project">
                                    <p class="design7J">7J <br> Design</p>
                                </div>
                            </a>
                        </div>
                        <div class="project-element doubleWide php bs js jq rwd">
                           <img class="project-image" src="img/TOWD-screen.png" alt="Toronto Web Design project">
                            <a class="project-tag" project-number="8">
                                <div class="inner-project">
                                    <p class="TOWeb">Toronto <br>  Web Design</p>
                                </div>
                            </a>
                        </div>
                        <div class="project-element doubleHigh js jq rwd less">
                           <img class="project-image" src="img/webpro-screen.png" alt="WebPro Canada project">
                            <a class="project-tag" project-number="9">
                                <div class="inner-project">
                                    <p class="webpro">WebPro <br>  Canada</p>
                                </div>
                            </a>
                        </div>
                        <div class="project-element php js jq rwd less">
                           <img class="project-image" src="img/royalAmbassador.png" alt="Zabiha Halal project">
                            <a class="project-tag" project-number="10">
                                <div class="inner-project">
                                    <p class="royal">Royal Ambassador Catering</p>
                                </div>
                            </a>
                        </div>
                        <div class="project-element wp less php bs rwd">
                           <img class="project-image" src="img/solkor-screen.jpg" alt="Solkor Landscaping project">
                            <a class="project-tag" project-number="11">
                                <div class="inner-project">
                                    <p class="solkor">Solkor Landscaping</p>
                                </div>
                            </a>
                        </div>
                        <div class="project-element js">
                           <img class="project-image" src="img/RCC-screen.jpg" alt="Theatrics PLus project">
                            <a class="project-tag" project-number="12">
                                <div class="inner-project">
                                    <p class="theatre">Theatrics Plus</p>
                                </div>
                            </a>
                        </div>
                        <div class="project-element ang js sass jq rwd">
                           <img class="project-image" src="img/IGPortfolio-screen.png" alt="Ian Gauthier Portfolio project">
                            <a class="project-tag" project-number="13">
                                <div class="inner-project">
                                    <p class="portfolio">Ian Gauthier <br> Old Portfolio</p>
                                </div>
                            </a>
                        </div>
                       </div>
                    </div>
                </div>
            </section>
            <section class="contact-section">
                <div class="contact-wrapper">
                    <div class="col-sm-12">
                        <h3 class="col-sm-push-1 col-sm-10">Feel free to drop me a line <?php echo $name; ?>, by using the form below</h3>
                    </div>
                    <form class="form-horizontal" id="contact-form" role="form" method="post" action="contact.php">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="name" name="name" placeholder="First & Last Name" value=<?php if(isset($username)){ echo '"' . $username . '"'; } else { echo '""';} ?> required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value=<?php if(isset($email)){ echo '"' . $email . '"'; } else { echo '""';} ?> required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message" class="col-sm-2 control-label">Message</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" rows="4" name="message" placeholder="Place Message Here" required><?php if(isset($message)) echo $message ; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="human" class="col-sm-2 control-label">2 + 3 = ?</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="human" name="human" placeholder="Your Answer" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                <button id="form-submit" name="form-submit" type="submit"  class="btn btn-primary">Send</button>
                            </div>
                        </div>
                    </form>

                </div>
            </section>
        </div>
        <div class="darkened-background"></div>
</body>

</html>