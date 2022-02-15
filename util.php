<!-- <link rel="stylesheet" href="style.css"> -->

<?php
// require_once 'authenticator.php';

    //creating a function for heading which will be called in all pages
    function top_header(){
        if(isset($_SESSION['user_id'])){
            echo'
        <div class="nav">
        <!-- Nav menu with side menu -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light pmd-navbar pmd-z-depth fixed-top">
          
          <button class="navbar-toggler pmd-navbar-toggle" type="button" data-toggle="collapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" data-target="#navbarSupportedContent">
              <span class="navbar-toggler-icon"></span>
          </button>
          <a class="navbar-brand d-none d-sm-block" href="index.php" title="Home">English Language for Everyone</a>

          <div class="dropdown pmd-dropdown pmd-user-info d-lg-none top-img text-dark" style="margin-left: auto;">
          <a href="#" class="btn-user dropdown-toggle media align-items-center text-primary"  data-toggle="dropdown" data-sidebar="true" aria-expanded="false">
          <img class="profile_Pic " id="top-img" style="
          margin-left: auto;" src="'.$_SESSION['user_image'].'" width="40" height="40" alt="Profile">   
          <i class="material-icons md-light pmd-sm"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-right" role="menu">
            <a class="dropdown-item" href="dashboard.php"><i class="fas fa-tachometer-alt mr-3"></i>Dashboard</a><hr>
            <a class="dropdown-item" href="profile.php"><i class="fas fa-user mr-3"></i>My Profile</a>
            <a class="dropdown-item" href="change_password.php" target="_blank"><i class="fas fa-key mr-3"></i>Change Password</a>
            <a class="dropdown-item" href="change_email.php" target="_blank"><i class="fas fa-at mr-3"></i></i>Change Email</a>
            <a class="dropdown-item" href="#" target="_blank" onclick="toggle_notify()"><i class="fas fa-bell mr-3"></i>Notifications</a>
            <a class="dropdown-item" href="#" target="_blank"><i class="fas fa-comment-dots mr-3"></i>Messages</a>
            <a class="dropdown-item" href="courses.php"><i class="fab fa-discourse mr-3"></i>My Courses</a>
            <a class="dropdown-item" href="log_out.php"><i class="fas fa-sign-out-alt mr-3"></i>Log Out</a>
           </ul> </div>
         
          
          <div class="pmd-sidebar-overlay"></div>
          <div class="collapse navbar-collapse pmd-navbar-sidebar bg-light p-2 notify-menu" id="navbarSupportedContent" >
              <ul class="navbar-nav mr-auto items">
                    <li class="nav-item">
                     <h3 class="text-center"> <a class="nav-link text-dark d-block d-sm-none" href="index.php">English Language for Everyone</a> </h3>
                    </li>
                
                  <li class="nav-item dropdown pmd-dropdown ">
                      <a class="nav-link dropdown-toggle text-primary" href="#" id="navbarDropdown" data-sidebar="true" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Courses
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <i class="dropdown-item">Level Classes
                              <ul class="submenu dropdown-menu">
                                  <li class="dropdown-item"><a href="courses.php">Level 1</a> </li>
                                  <li class="dropdown-item"><a href="courses.php">Level 2</a> </li>
                                  <li class="dropdown-item"><a href="courses.php">Level 3</a> </li>
                                  <li class="dropdown-item"><a href="courses.php">Level 4</a> </li>
    
                              </ul>
                        </i>
                          <i class="dropdown-item" href="#">Advance Classes
                                  <ul class="submenu dropdown-menu">
                                  <li class="dropdown-item"><a href="#">Perspective 1</a> </li>
                                  <li class="dropdown-item"><a href="#">Perspective 2</a> </li>
                                  <li class="dropdown-item"><a href="#">Perspective 3</a> </li>
                                 </ul>
                          </i>
    
                          <div class="dropdown-divider"></div>
                          <i class="dropdown-item" href="#">Special classes
                                 <ul class="submenu dropdown-menu">
                                  <li class="dropdown-item"><a href="#">Intercom Grammar</a> </li>
                                  <li class="dropdown-item"><a href="#">Special Grammar</a> </li>
                                  <li class="dropdown-item"><a href="#" title="Professional English Language Class">PELC</a> </li>
                                  <li class="dropdown-item"><a href="#">Writing Class</a> </li>
                                  <li class="dropdown-item"><a href="#">Conversation Class</a> </li>
                                  <li class="dropdown-item"><a href="#">Vocabulary Class</a> </li>
                                  <li class="dropdown-item"><a href="#">Special Grammar</a> </li>
                                </ul>
                          </i>
                      </ul>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link text-primary" href="about.php">About Us</a>
                  </li>
                  
                  <li class="nav-item">
                      <a class="nav-link text-primary " href="log_out.php">Log Out</a>
                  </li>';
                  if(isset($_SESSION['user_verfied'])){
                      if($_SESSION['user_verfied'] == 0){
                           echo' <li class="nav-item">
                      <a class="nav-link text-danger " href="thank_you.php">Verify Your Account</a>
                         </li>';
                  }
                }
                 echo'
                  <li class="nav-item">
                  
                      <!-- <div class="pmd-navbar-right-icon ml-auto">
                              <a class="btn btn-md text-white pmd-btn-fab pmd-btn-flat pmd-ripple-effect" href="#">Search <i class="fas fa-search"></i></a>
                      </div> -->
                  </li>
        </ul>
                  <ul class="navbar-nav ml-auto">
                    <li class="nav-item d-none d-lg-block ">
                        <a class="nav-link icon text-dark" href="#" style="display:inline;font-size:20px"> <i class="fas fa-bell" onclick="toggle_notify()" style="cursor:pointer;" title="Show Notifications"></i><span>new</span></a>
                        <!-- <a class="nav-link mr-3 text-white" href="#" style="display:inline;font-size:20px"> <i class="fas fa-comment-dots" onclick="show_notification()" style="cursor:pointer;" title="Show Messages"></i></a> -->
                    </li>
                    <li class="nav-item d-block d-lg-none">
                        <a class="nav-link icon-text text-primary" href="#" onclick="toggle_notify()">Notifications<span>6</span></a>
                        <!-- <a class="nav-link  text-primary" href="#">Messages</a> -->
                    </li>
                    
            
              
              <div class="dropdown pmd-dropdown pmd-user-info">
                  <a href="#" class="btn-user dropdown-toggle media align-items-center text-primary"  data-toggle="dropdown" data-sidebar="true" aria-expanded="false">
                      <img class="mr-2 profile_Pic" src="'.$_SESSION['user_image'].'" width="40" height="40" alt="Profile">
                      <div class="media-body">
                          Hello! '.$_SESSION['user_name'].'
                      </div>
                      <i class="material-icons md-light ml-2 pmd-sm"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-right" role="menu">
                    <a class="dropdown-item" href="dashboard.php"><i class="fas fa-tachometer-alt mr-3"></i>Dashboard</a><hr>
                    <a class="dropdown-item" href="profile.php"><i class="fas fa-user mr-3"></i>My Profile</a>
                    <a class="dropdown-item" href="change_password.php" target="_blank"><i class="fas fa-key mr-3"></i>Change Password</a>
                    <a class="dropdown-item" href="change_email.php" target="_blank"><i class="fas fa-at mr-3"></i></i>Change Email</a>
                    <a class="dropdown-item" href="#" target="_blank" onclick="toggle_notify()"><i class="fas fa-bell mr-3"></i>Notifications</a>
                    <a class="dropdown-item" href="#" target="_blank"><i class="fas fa-comment-dots mr-3"></i>Messages</a>
                    <a class="dropdown-item" href="courses.php"><i class="fab fa-discourse mr-3"></i>My Courses</a>
                    <a class="dropdown-item" href="log_out.php"><i class="fas fa-sign-out-alt mr-3"></i>Log Out</a>
                   </ul> </div>

                   <!-- <form class="navbar-form" role="search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search">
                            <span class="input-group-btn">
                                <button type="reset" class="btn btn-default">
                                    <span class="glyphicon glyphicon-remove">
                                        <span class="sr-only">Close</span>
                                    </span>
                                </button>
                                <button type="submit" class="btn btn-default">
                                    <span class="glyphicon glyphicon-search">
                                        <span class="sr-only">Search</span>
                                    </span>
                                </button>
                            </span>
                        </div>
                    </form> -->

                   <div class="notification-box" style="" id="notification-box">
                        <h4>Notifications <span>17</span></h4>
                        <div class="notification-item">
                            <img src="images/default_Image.png"  alt="img1">
                            <div class="notification">
                                <h6>Abbas Rahim</h6>
                                <p>Liked your photo</p>
                            </div>
                        </div>
                        <div class="notification-item">
                            <img src="images/default_Image.png"  alt="img1">
                            <div class="notification">
                                <h6>Ihsan Ullah</h6>
                                <p>Liked your photo</p>
                            </div>
                        </div>
                        <div class="notification-item">
                            <img src="images/default_Image.png"  alt="img1">
                            <div class="notification">
                                <h6>Saeed Ullah</h6>
                                <p>Liked your photo</p>
                            </div>
                        </div>
                        <div class="notification-item">
                            <!-- <img src="images/default_Image.png"  alt="img1"> -->
                            <div class="notification">
                            <a href="#">See All Notifications</a>
    
                                <!-- <h6>M Adil</h6>
                                <p>Liked your photo</p> -->
                            </div>
                        </div>
                        
                    </div>
                    
              </div>
             
              </ul> 
          </div>
         
          <div class="pmd-sidebar-overlay"></div>
      </nav>
      </div>
                      <!-- <div class="search-box">
                       <input type="search" name="search" id="search" placeholder="Search">
                       <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                       </div> -->';
        }
        else
        {
            echo('
            <div class="nav">
            <!-- Nav menu with side menu -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light pmd-navbar pmd-z-depth fixed-top">
              
              <button class="navbar-toggler pmd-navbar-toggle" type="button" data-toggle="collapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" data-target="#navbarSupportedContent">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <a class="navbar-brand" href="index.php" title="Home">English Language for Everyone</a>
              <div class="pmd-sidebar-overlay"></div>
              <div class="collapse navbar-collapse pmd-navbar-sidebar bg-light p-2 notify-menu" id="navbarSupportedContent" >
                  <ul class="navbar-nav ml-auto items">
                      <li class="nav-item dropdown pmd-dropdown ">
                          <a class="nav-link dropdown-toggle text-primary" href="#" id="navbarDropdown" data-sidebar="true" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Courses
                          </a>
                          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <i class="dropdown-item">Level Classes
                                  <ul class="submenu dropdown-menu">
                                      <li class="dropdown-item"><a href="#">Level 1</a> </li>
                                      <li class="dropdown-item"><a href="#">Level 2</a> </li>
                                      <li class="dropdown-item"><a href="#">Level 3</a> </li>
                                      <li class="dropdown-item"><a href="#">Level 4</a> </li>
        
                                  </ul>
                            </i>
                              <i class="dropdown-item" href="#">Advance Classes
                                      <ul class="submenu dropdown-menu">
                                      <li class="dropdown-item"><a href="#">Perspective 1</a> </li>
                                      <li class="dropdown-item"><a href="#">Perspective 2</a> </li>
                                      <li class="dropdown-item"><a href="#">Perspective 3</a> </li>
                                     </ul>
                              </i>
        
                              <div class="dropdown-divider"></div>
                              <i class="dropdown-item" href="#">Special classes
                                     <ul class="submenu dropdown-menu">
                                      <li class="dropdown-item"><a href="#">Intercom Grammar</a> </li>
                                      <li class="dropdown-item"><a href="#">Special Grammar</a> </li>
                                      <li class="dropdown-item"><a href="#" title="Professional English Language Class">PELC</a> </li>
                                      <li class="dropdown-item"><a href="#">Writing Class</a> </li>
                                      <li class="dropdown-item"><a href="#">Conversation Class</a> </li>
                                      <li class="dropdown-item"><a href="#">Vocabulary Class</a> </li>
                                      <li class="dropdown-item"><a href="#">Special Grammar</a> </li>
                                    </ul>
                              </i>
                          </ul>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link text-primary" href="about.php">About Us</a>
                      </li>
                      
                      <li class="nav-item">
                          <a class="nav-link text-primary" href="log_in.php" title="Continue to your Account">Log In</a>
                      </li>
                      <li class="nav-item">
                      <a class="nav-link text-primary" href="sign_up.php" title="Create Account">Sign Up</a>
                     </li>
                      <li class="nav-item">
                      
                          <!-- <div class="pmd-navbar-right-icon ml-auto">
                                  <a class="btn btn-md text-primary pmd-btn-fab pmd-btn-flat pmd-ripple-effect" href="#">Search <i class="fas fa-search"></i></a>
                          </div> -->
                      </li>
            </ul>
                
                       
                        
                  </div>
                 
                  </ul> 
              </div>
             
              <div class="pmd-sidebar-overlay"></div>
          </nav>
          </div>');
        }
    }

    //creating function for footer which will be called on all pages

    function footer()
    {
        echo '<div class="container-fluid jumbotron footer text-center">
        <div class="row">
            <div class="col-sm-6">
                <!-- Some Links Here -->
                <h5>English Tutorials</h5>
                <a href="about.php">About</a><br>
                <a href="#">Careers</a><br>
                <a href="courses.php">Courses</a><br>
                <a href="#">Certificates</a>
            </div>
            <div class="col-sm-6">
                <!--About community here -->
                <h5>Community</h5>
                <a href="teachers.php">Teachers</a><br>
                <a href="learners.php">Learners</a><br>
                <a href="#">Help</a><br>
                <a href="faq\'s.php">FAQ\'s</a><br>
            </div>
            <div class="col-sm-12">
                <!-- Contact here -->
                <h5>Contact</h5>
                <a href="mailto:abbasrahim723@gmail.com">Email Us at : abbasrahim723@gmail.com</a><br>
                <a href="https://www.facebook.com/abbasrahim723"><i class="fab fa-facebook fa-2x social" title="Follow US on Facebook"></i></a>
                <a href="https://twitter.com/AbbasRahim9"><i class="fab fa-twitter fa-2x social" title="Follow US on Twitter"></i></a>
                <a href="https://www.linkedin.com/in/abbas-rahim-a23a371b3/"><i class="fab fa-linkedin fa-2x social" title="Follow US on Linkedin"></i></a>
                <a href="https://www.instagram.com/abbasrahim723/"><i class="fab fa-instagram fa-2x social" title="Follow US on Instagram"></i></a>
            </div>
            <div class="col-sm-12">
                <div class="container newsletter">
                    <div class="container">
                        <h5>Subscribe to our Newsletter</h5>
                            <p class="news_notes">
                                When you subscribe to our Newsletter, you get emails whenever we have something new on 
                                our website i.e. when new lecture is uploaded, notes are uploaded, or even you get 
                                updates on when we change our <a href="privacy_policy.php" class="text-primary">  Privacy Policy.</a> Don\'t worry You can unsubscribe any time you want.
                            </p>
                    </div>';
                    
                    if(isset($_SESSION['exist'])){
                        echo '<p stye="">';
                        echo $_SESSION['exist'];
                        echo '</p>';
                        unset($_SESSION['exist']);
                    }
                    if(isset($_SESSION['user_id'])){
                       echo '<form action="subscribe.php" method="post" id="form">
                       <input type="text" name="news_name" id="news_name" value="'.$_SESSION['user_name'].'" size="40" required/><br>
                       <input type="email" name="news_email" id="news_email" value="'.$_SESSION['user_email'].'" size="40" required/><br> 
                       <input type="submit" name="subscribe" id="subscribe" class="btn btn-success" value="Subscribe"/>
                   </form>'; 
                    }else{
                        echo '<form action="subscribe.php" method="post" id="form">
                        <input type="text" name="news_name" id="news_name" placeholder=" Name" size="40" required/><br>
                        <input type="email" name="news_email" id="news_email" placeholder=" Email Address" size="40" required/><br> 
                        <input type="submit" name="subscribe" id="subscribe" class="btn btn-success" value="Subscribe"/>
                    </form>';
                    }
                
               echo '</div>
                 </div>
                </div>
                </div>';
    };
    ?>
<script src="script.js"></script>

        

        
