<?php 
include ('libs/connection.inc.php');
// nuggets
$nuggets = getNuggets();
$count = 0;

// upcoming events
$upcomingEvents = getEvents();

// next upcoming event
$nextUpcomingEvent = getNextUpcomingEvent();
if(!empty($nextUpcomingEvent)) {
  $eventDateTime = "$nextUpcomingEvent->startDate $nextUpcomingEvent->startTime";
}


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Love of Jesus Prayer Assembly</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" type="text/css" href="style.css?v=<?php echo time(); ?>">
  </head>
  <body>

    <div id="navBackdrop" class="nav-backdrop"></div>
    <!-- NAVIGATION BAR -->
    <nav class="navbar navbar-expand-md bg-dark navbar-dark d-flex justify-content-start" id="navBar">
      <div class="d-flex justify-content-between">

        <!-- Hamburger Button -->
        <button id="navbarToggler" class="navbar-toggler" type="button">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Logo -->
        <a href="#" class="navbar-brand">
          <img src="images/logo.png" alt="logo.png" class="align-self-center">
        </a>

        <!-- NAVIGATION MENU -->
        <div class="collapse navbar-collapse" id="navMenu">
          <ul class="navbar-nav sm-flex-column">
            <li class="nav-item">
              <a href="#navBar" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="#upcomingEvents" class="nav-link">Events</a>
            </li>
            <li class="nav-item">
              <a href="#assistance" class="nav-link">Sermons</a>
            </li>
            <li class="nav-item">
              <a href="#blog" class="nav-link">Blog</a>
            </li>
            <li class="nav-item">
              <a href="#mainFooter" class="nav-link">About</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    
    <!-- NEXT UPCOMING EVENT -->
    <section id="nextUpcomingEvent">
      <div id="image-slider"><img src="./images/image-slider-1.png" alt=""></div>
      <div class="container text-center d-flex flex-column align-items-center p-5">
        <h2 class="mt-4">Next event in:<br><h6>Heart For The House Sunday</h6></h2>
        <span class="nextEventTime d-flex justify-content-between mb-4">
          <span><h3 id="days">00</h3><small>DAYS</small></span> <br>
          <span><h3 id="hrs">00</h3><small>HOURS</small></span> <br>
          <span><h3 id="mins">00</h3><small>MINUTES</small></span> <br>
          <span><h3 id="secs">00</h3><small>SECONDS</small></span> <br>
        </span>
        <button data-bs-toggle="modal" data-bs-target="#nextEventModal" class="btn p-3 bg-expand animated">EVENT DETAIL</button>
      </div>
    </section>

    <!-- Next Event Modal -->
    <div class="modal fade" id="nextEventModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="nextEventModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="nextEventModalLabel"><?= $nextUpcomingEvent->event ?? 'No Upcoming Event';?></h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <?php 
              if(!empty($nextUpcomingEvent)) {
                echo 'Venue: ' . $nextUpcomingEvent->venue . '<br>';
                echo 'Time: ' . timeConversion($nextUpcomingEvent->startTime) . ' - ' . timeConversion($nextUpcomingEvent->endTime) . '<br>';
                echo 'Date: ' . dateConversion($nextUpcomingEvent->startDate)[1] . ' - ' .  dateConversion($nextUpcomingEvent->endDate)[1];
              } else {
                echo 'No Upcoming Event';
              }
            ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Welcome Section -->
    <section id="welcomeSection" class="container d-flex flex-column align-items-center">
      <div class="images">
        <img src="images/church-mobile.png" alt="">
        <div class="iconView d-flex align-items-center justify-content-center"><img src="images/icon-view.svg" style="width: 30px;" alt="view"></div>
      </div>
      <aside class="mt-3 text">
        <div class="welcomeText">
          <h6>Welcome</h6>
          <h1>Loving God, Loving Others and Serving the World</h1>
          <br>
          <p>Welcome to Love of Jesus Prayer Assembly, we'd love to meet you! Come check us out this SUNDAY where you can meet us and experience the love of Jesus in the gathering of believers. Our heart and soul is to connect people with the living and powerful God.</p>
        </div>

        <article>
          <span><i class="bi bi-house-heart"></i></span>
          <h1>Follow with us</h1>
          <p>We would love to see you and your family & friends this weekend in our church at 8am.</p>
        </article>
        <article>
          <span><i class="bi bi-book"></i></span>
          <h1>What We Believe</h1>
          <p>We believe that the Bible is God's Word. It is accurate, authoritative and applicable to our everyday lives.</p>
        </article>
        <article>
          <span><i class="bi bi-person-fill"></i></span>
          <h1>New Here?</h1>
          <p>Tell us about yourwself to begin your journey with connecting to our community.</p>
        </article>
      </aside>  
    </section>

    <!-- Church Mission -->
    <section class="container" id="churchMission">
      <h2>Our church mission is to ignite a passion to follow Jesus.</h2>
      <p>"The church is the body of Christ on earth, empowered by the Holy Spirit to continue the task of reaching the lost and discipling the saved, helping them become fully devoted followers of Christ."<br><br>Ephesians 4:1-16</p>
    </section>

    <!-- Assistance -->
    <section class="container d-flex flex-column align-items-center" id="assistance">
      <h1 class="text-center">Get Connected. What's Your Next Step?</h1>
      <h1>Follow. Connect. Go</h1><br>
      <p class="text-center">Following Jesus as disciples and connecting with others as part of a spiritual family</p><br>

      <div><button class="btn animated">BIBLE STUDIES</button></div>
      <div><button class="btn animated">MISSIONS & DONATIONS</button></div>
      <div><button class="btn animated">MUSICAL WORSHIP TEAM</button></div>
    </section>

    <!-- List of Upcoming Events -->
    <section class="container" id="upcomingEvents">
      <h5 class="text-center">Upcoming Events</h5>
      <h2 class="text-center">Conferences & Events</h2>
       
      <?php if(!empty($upcomingEvents)) {
      foreach($upcomingEvents as $events) { ?>
        <div class="btn-group events" role="group">
          <button class="btn btn-primary date" disabled><?= dateConversion($events->startDate)[0] ?></button>
          <div class="container d-flex justify-content-between border meeting">
            <span class="d-flex align-items-center event"><?= $events->event ?></span>
            <div class="d-flex">
              <button class="btn btn-outline-secondary align-self-center disabled upcomingEventTime"><?= timeConversion($events->startTime) ?> <?= '-' . timeConversion($events->endTime) ?? null ?></button>
              <span class="d-flex align-self-center details" data-bs-toggle="modal" data-bs-target="#<?= $events->id ?>Modal"><button class="text-center text-light">Details</button></span>
            </div>
          </div>
        </div>

        <!-- Upcoming Events Modal -->
        <div class="modal fade" id="<?= $events->id ?>Modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="upcomingEventsModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="upcomingEventsModalLabel"><?= $events->event;?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <?php 
                  echo 'Venue: ' . $events->venue . '<br>';
                  echo 'Time: ' . timeConversion($events->startTime) . ' - ' . timeConversion($events->endTime) . '<br>';
                  echo 'Date: ' . dateConversion($events->startDate)[1] . ' - ' .  dateConversion($events->endDate)[1];
                ?>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      <?php }} else {
        echo '<h3 class="text-center" style="color:red">No Upcoming Events</h3>';
      } ?>
    </section>

    <!-- Theme display -->
    <section id="themes">
      <div class="row g-0">
        <!-- show only on small screens -->
        <div class="col-6 col-md-4 col-lg-3 img-container">
          <img src="./images/theme-1.png" alt="theme-1.png" class="theme-image">
          <div class="overlay-text">TRUTH DOES NOT HURT</div>
        </div>
        <div class="col-6 col-md-4 col-lg-3 img-container">
          <img src="./images/theme-2.png" alt="theme-2.png" class="theme-image">
          <div class="overlay-text">WE GIVE HOPE</div>
        </div>
        <div class="col-6 col-md-4 col-lg-3 img-container">
          <img src="./images/theme-3.png" alt="theme-2.png" class="theme-image">
          <div class="overlay-text">THROUGH THE NEVER</div>
        </div>
        <div class="col-6 col-md-4 col-lg-3 img-container">
          <img src="./images/theme-4.png" alt="theme-2.png" class="theme-image">
          <div class="overlay-text">FORGIVENESS & ACCEPTANCE</div>
        </div>

        <!-- show on both medium and large screens -->
        <div class="col-6 col-md-4 col-lg-3 d-none d-md-block img-container">
          <img src="./images/theme-5.png" alt="theme-2.png" class="theme-image">
          <div class="overlay-text">THE ANSWER IS GOD</div>
        </div>
        <div class="col-6 col-md-4 col-lg-3 d-none d-md-block img-container">
          <img src="./images/theme-6.png" alt="theme-2.png" class="theme-image">
          <div class="overlay-text">FIND LOVE INSIDE YOURSELF</div>
        </div>

        <!-- show only on large screens -->
        <div class="col-6 col-md-4 col-lg-3 d-none d-lg-block img-container">
          <img src="./images/theme-7.png" alt="theme-2.png" class="theme-image">
          <div class="overlay-text">THE POWER OF WORDS NOT SPOKEN</div>
        </div>
        <div class="col-6 col-md-4 col-lg-3 d-none d-lg-block img-container">
          <img src="./images/theme-8.png" alt="theme-2.png" class="theme-image">
          <div class="overlay-text">BASIC POINTS OF BELIEF</div>
        </div>
      </div>
    <section>

    <!-- Worship Team Resources -->
    <section class="container flex-column justify-content-center align-items-center" id="worshipTeamResources">
      <div><img src="./images/worshipTeam.jpg" alt="worshipTeam.jpg"></div>
      <div>
        <h5 class="text-center p-2">Lyrics, Chords & Translations</h5>
        <h1 class="text-center">Worship Team Resources</h1>
        <p>We're passionate about Jesus and leading others to worship Him! We hope these resources help equip you and your team as you lead worship.</p>
      </div>
    </section>

    <!-- Donation -->
    <div class="text-center" id="donation">
      <h1>Giving is an action of worship, affection & love for Jesus.</h1>
      <br>
      <p>Making a difference</p>
      <button class="btn"><a href="#" class="animated animated-one">GIVE NOW</a></button>
      <br><br>
      <button class="btn"><a href="#" class="animated animated-two">WAYS TO GIVE</a></button>
    </div>

    <!-- Blog -->
    <section class="container" id="blog">
      <div>
        <h4>Daily Nugget</h4>
        <h2>From our blog</h2>
      </div>
      <?php if(!empty($nuggets)) { ?>
      <div class="chevron">
        <div class="swiper-button-prev">
          <button>
            <i class="bi bi-chevron-left"></i>
          </button>
        </div>
        <div class="swiper-button-next">
          <button>
            <i class="bi bi-chevron-right"></i>
          </button>
        </div>
      </div>
      <div class="blogs">
        <div id="carouselBlog" class="swiper">
          <div class="swiper-wrapper">
            <?php
            foreach($nuggets as $nugget) {
              // echo $count;
              if ($count % 2 == 0) { ?>
                <div class="swiper-slide">
                <div class="card-wrapper d-flex">
              <?php } ?>

              <div class="card">
                <img src="./nuggets/<?= $nugget->image;?>" class="card-img-top">
                <div class="card-body">
                  <h6 class="card-title"><?= $nugget->title;?></h6>
                  <p class="card-text"><small><cite>Evang Adeolu Felix</cite></small></p>
                </div>
              </div>

              <?php if ($count % 2 == 1 || $count == count($nuggets) - 1) { ?>
                </div>
                </div>
              <?php }
              $count++; 
            }?>
          </div>
        </div>
      </div>
      <div class="swiper-scrollbar"></div>
      <?php } else {
        echo '<h3 class="text-center" style="color:red"> Nuggets Unavailable. </h3>';
      } ?> 

      <!-- Blog Modal -->
      <div class="modal" id="imageModal">
        <div class="modal-content">
          <button class="modal-close" id="closeModal">&times;</button>
          <button class="modal-nav prev" id="prevModal">&#10094;</button>
          <img src="" alt="Full View" id="modalImage"/>
          <button class="modal-nav next" id="nextModal">&#10095;</button>
        </div>
      </div>
    </section>

    <!-- Posts -->
    <section id="posts">
      <div class="leadersPost">
        <div id="carouselSlide" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselSlide" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselSlide" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselSlide" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <p>"I have two great passions: one is to build the Church of Jesus Christ and the other is to lift the lives of people and help them fulfil their potential in life"</p>
              <div class="d-flex justify-content-center align-items-center">
                <img src="./images/church-mobile.png" alt="" class="me-4">
                <span>
                  <small class="name">Israel Olu-Adeshina</small><br>
                  <small class="office">General Overseer</small>
                </span>
              </div>
            </div>
            <div class="carousel-item">
              <p>"I have been going to this church my whole life and it is such a blessing to me! I am so blessed to be able to atteng Love of Jesus Prayer Assembly and be a part of the amazing things that God is doing."</p>
              <div class="d-flex justify-content-center align-items-center">
                <img src="./images/church-mobile.jpg" alt="" class="me-4">
                <span>
                  <small class="name">Felix Adeolu</small><br>
                  <small class="office">Lead Pastor</small>
                </span>
              </div>
            </div>
            <div class="carousel-item">
              <p>"Me and my partners have our relationship with this team to be a very satisfying and mutually beneficial experience."</p>
              <div class="d-flex justify-content-center align-items-center">
                <img src="./images/church-desktop.jpg" alt="" class="me-4">
                <span>
                  <small class="name">Adesoji</small><br>
                  <small class="office">Executive Pastor</small>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer id="mainFooter" class="p-3 text-center">
      <p>Emerald &copy; 2025 All Rights Reserved.</p>
      <button><a href="#navBar">Back to Top</a></button>
    </footer>

    
     
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
      var eventDateTime = "<?= $eventDateTime; ?>"
    </script>
    <script src="main.js?v=<?php echo time(); ?>"></script>
  </body>
</html>