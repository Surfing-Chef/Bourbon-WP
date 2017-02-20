<?php
/*
 Template Name: Landing Page
*/
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">


  <link href='//fonts.googleapis.com/css?family=Questrial' rel='stylesheet' type='text/css'>

  <link href='//fonts.googleapis.com/css?family=Sanchez:400italic,400' rel='stylesheet' type='text/css'>

  <!-- <link rel="stylesheet" href="css/font-awesome.css" /> -->

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/src/css/style.css">


  <title><?php wp_title(''); ?></title>

</head>
<body class="home type-system-geometric">
  <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]-->

  <!-- HEADER -->
  <header  id="js-parallax-window" class="parallax-window">

    <div class="parallax-static-content">
      <!-- callout -->
      <section class="callout">
        <div class="callout-container">
          <p class="quote">Everyday carry crucifix meditation, ethical chicharrones godard gluten-free meditation, ethical chicharrones godard gluten-free meh meditation, ethical chicharrones godard gluten-free occupy bitters cliche tousled mustache master cleanse DIY. Cred tattooed vinyl.</p>
          <p class="author">Hipster O'Leary</p>
        </div>
      </section>
      <!-- End callout -->
    </div>

    <!-- centered-navigation -->
			<section class="centered-navigation" role="banner">
				<div class="centered-navigation-wrapper">
			    <a href="javascript:void(0)" class="mobile-logo">
			      <img src="<?php echo get_template_directory_uri(); ?>/src/images/mountain.svg" alt="Logo image">
			    </a>
			    <a href="javascript:void(0)" id="js-centered-navigation-mobile-menu" class="centered-navigation-mobile-menu">MENU</a>

					<nav role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">

						<?php wp_nav_menu(array(
							'theme_location'  => 'landing_menu',
							'menu'            => '',
							'container'       => '',
							'container_class' => '',
							'container_id'    => '',
							'menu_class'      => 'centered-navigation-menu show',
							'menu_id'         => 'js-centered-navigation-menu',
							'echo'            => true,
							'fallback_cb'     => 'wp_page_menu',
							'before'          => '',
							'after'           => '',
							'link_before'     => '',
							'link_after'      => '',
							'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'depth'           => 0,
							'walker'          => ''
						)); ?>

					</nav>

				</div><!-- End centered-navigation-wrapper -->
			</section><!-- End centered-navigation -->

    <div id="js-parallax-background" class="parallax-background"></div>
  </header>
  <!-- END HEADER -->

  <!-- MAIN -->
  <main>

    <!-- Welcome -->
    <article id="welcome">
      <div class="article-content">

        <h1>Welcome</h1>
        <section>
          <h2>Surfing-Chef.com is many things: repository, blog, reference, archive, experiment, et al. The design and development of the site itself stands as narrative to the ebb and flow of it's author's whims. Perhaps visitors will find value in its content in one manner or another.</h2>

          <p class="date">19 Feb 2017</p>

          <p>Much of my life involves the past, present and upcoming weather conditions. I spend a lot of time here between work and play, so it made sense to have a weather snapshot. This site was designed with WordPress as its framework from the start, and so I could easily have just installed a weather widget. I also could have just used a WordPress theme. But knowing how websites work is my thing.</p>
          <p>Surfing-Chef.com's HTML is not symantically perfect. You will not find beautifully crafted CSS or Javascript here. However, the fact that you are here with me means that I did something right. I like to design and develop web applications.  But I am truly passionate about learning the concepts involved and how to make them do the things I want them to.
          </p>
          <p>All the content on this website is simply a notebook of links, notes, thoughts and bookmarks that make up Surfing-Chef. Work. Play. Sleep. Repeat. Doesn't get any simpler than that.</p>

        </section>

        <aside>
          <h2>Weather</h2>

          <div id="weather">
            <p>I apologize for the lacking Dark Sky weather data.</p>
            <p><a href="https://darksky.net/forecast/50.2963,-117.6857/ca12/en" target="_blank">Nakusp Backcountry Current Conditions</a></p>
          </div>
          <div>
            <a href="https://darksky.net/poweredby/" target="_blank">Powered by Dark Sky</a>
          </div>
        </aside>

      </div>
    </article>
    <!-- End Welcome -->

    <!-- Culinaria -->
    <article id="culinary" class="bg-culinary">
      <div class="article-content">

        <h1>Culinaria</h1>

        <p>With so much information available today from so many different sources, offered here are some of the web-resources that I tend to frequent. The links in the sidebar are some bookmarks I find useful and below are some of the more content-rich sites I visit often.</p>
        <p>Cookbooks are something of an addiction - unless I have a few hours to kill, I need to steer clear of Chapters. A few of my favourites include any work of <strong>America's Test Kitchen</strong>, the classic <strong>Joy of Cooking</strong>, and <strong>Modernist Cuisine</strong> by Nathan Myhrvold, Chris Young, and Maxime Bilet. I also subscribe to 2 publications: the bi-monthly <strong>Cook's Illustrated</strong>, and quarterly <strong>Lucky Peach</strong>.</p>

        <ul class="accordion-tabs">
          <li class="tab-header-and-content">
            <a href="javascript:void(0)" class="is-active tab-link">Food 52</a>
            <div class="tab-content" id="food52">
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tincidunt pellentesque lorem, id suscipit dolor rutrum id. Morbi facilisis porta volutpat. Fusce adipiscing, mauris quis congue tincidunt, sapien purus suscipit odio, quis dictum odio tortor in sem. Ut sit amet libero nec orci mattis fringilla. Praesent eu ipsum in sapien tincidunt molestie sed ut magna. Nam accumsan dui at orci rhoncus pharetra tincidunt elit ullamcorper. Sed ac mauris ipsum. Nullam imperdiet sapien id purus pretium id aliquam mi ullamcorper.</p>
            </div>
          </li>
          <li class="tab-header-and-content">
            <a href="javascript:void(0)" class="tab-link">Epicurious</a>
            <div class="tab-content"  id="epicurious">
              <p>Ut laoreet augue et neque pretium non sagittis nibh pulvinar. Etiam ornare tincidunt orci quis ultrices. Pellentesque ac sapien ac purus gravida ullamcorper. Duis rhoncus sodales lacus, vitae adipiscing tellus pharetra sed. Praesent bibendum lacus quis metus condimentum ac accumsan orci vulputate. Aenean fringilla massa vitae metus facilisis congue. Morbi placerat eros ac sapien semper pulvinar. Vestibulum facilisis, ligula a molestie venenatis, metus justo ullamcorper ipsum, congue aliquet dolor tortor eu neque. Sed imperdiet, nibh ut vestibulum tempor, nibh dui volutpat lacus, vel gravida magna justo sit amet quam. Quisque tincidunt ligula at nisl imperdiet sagittis. Morbi rutrum tempor arcu, non ultrices sem semper a. Aliquam quis sem mi.</p>
            </div>
          </li>
          <li class="tab-header-and-content">
            <a href="javascript:void(0)" class="tab-link">Lucky Peach</a>
            <div class="tab-content"  id="luckypeach">
              <p>Donec mattis mauris gravida metus laoreet non rutrum sem viverra. Aenean nibh libero, viverra vel vestibulum in, porttitor ut sapien. Phasellus tempor lorem id justo ornare tincidunt. Nulla faucibus, purus eu placerat fermentum, velit mi iaculis nunc, bibendum tincidunt ipsum justo eu mauris. Nulla facilisi. Vestibulum vel lectus ac purus tempus suscipit nec sit amet eros. Nullam fringilla, enim eu lobortis dapibus, quam magna tincidunt nibh, sit amet imperdiet dolor justo congue turpis.</p>
            </div>
          </li>
          <li class="tab-header-and-content">
            <a href="javascript:void(0)" class="tab-link">Saveur</a>
            <div class="tab-content"  id="saveur">
              <p>Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Phasellus dui urna.</p>
            </div>
          </li>
          <li class="tab-header-and-content">
            <a href="javascript:void(0)" class="tab-link">Food &amp; Wine</a>
            <div class="tab-content"  id="foodandwine">
              <p>Four dollar toast bespoke snackwave mumblecore. Schlitz iceland lo-fi, echo park art party microdosing farm-to-table lyft tattooed. Poke chicharrones DIY, affogato brunch aesthetic paleo jianbing meditation lomo. Dreamcatcher poutine cred chia vexillologist, salvia ethical ramps lyft PBR&B cliche plaid wolf skateboard. Kitsch dreamcatcher tumeric, stumptown viral lo-fi man braid cred direct trade green juice williamsburg celiac bushwick taxidermy. Authentic microdosing bitters, pour-over disrupt pop-up chillwave chicharrones tote bag freegan banh mi franzen. Umami gluten-free sartorial, chicharrones distillery ennui ramps kale chips vinyl flexitarian farm-to-table synth waistcoat tumblr.</p>
            </div>
          </li>

        </ul>

        <aside>
          <h3>Of Interest</h3>
          <ul>
            <li><a href="#">A Link</a></li>
            <li><a href="#">A Link</a></li>
            <li><a href="#">A Link</a></li>
            <li><a href="#">A Link</a></li>
            <li><a href="#">A Link</a></li>
          </ul>
        </aside>

      </div>
    </article>
    <!-- End Culinaria -->

    <!-- Coding -->
    <article id="coding">
      <div class="article-content">

        <h1>Coding</h1>
        <section>
          <h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor, perferendis! Odit quisquam <code>code block</code> dicta illum ipsa quod natus iure aliquid necessitatibus veritatis, itaque magnam aliquam, dolorum nostrum nemo, explicabo perspiciatis nobis!</h2>

          <p class="date">30 Mar 2014</p>
          <p><span>Lorem ipsum dolor sit amet</span>, consectetur adipisicing elit. Consequatur a, ullam, voluptatum incidunt neque doloremque vel inventore distinctio laudantium harum</a> illo quam nulla dolor alias iure impedit! Accusamus! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, a, ullam, voluptatum incidunt neque porro numquam doloremque vel inventore distinctio laudantium harum illo quam nulla dolor alias iure impedit.
            <a href="javascript:void(0)" class="read-more">Read More <span>&rsaquo;</span></a>
          </p>
        </section>

        <aside>
          <h3>Bookmarks</h3>
          <ul>
            <li><a href="#">A Link</a></li>
            <li><a href="#">A Link</a></li>
            <li><a href="#">A Link</a></li>
            <li><a href="#">A Link</a></li>
            <li><a href="#">A Link</a></li>
          </ul>
        </aside>

      </div>
    </article>
    <!-- End Coding -->

    <!-- Blog -->
    <article id="blog">
      <div class="article-content">

        <h1>Recent Blog</h1>
        <section>
          <h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor, perferendis! Odit quisquam <code>code block</code> dicta illum ipsa quod natus iure aliquid necessitatibus veritatis, itaque magnam aliquam, dolorum nostrum nemo, explicabo perspiciatis nobis!</h2>

          <p class="date">30 Mar 2014</p>
          <p><span>Lorem ipsum dolor sit amet</span>, consectetur adipisicing elit. Consequatur a, ullam, voluptatum incidunt neque doloremque vel inventore distinctio laudantium harum</a> illo quam nulla dolor alias iure impedit! Accusamus! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, a, ullam, voluptatum incidunt neque porro numquam doloremque vel inventore distinctio laudantium harum illo quam nulla dolor alias iure impedit.
            <a href="javascript:void(0)" class="read-more">Read More <span>&rsaquo;</span></a>
          </p>
        </section>

        <aside>
          <h3>Recent Posts</h3>
          <p><span>Consequatur ullam, voluptatum</span> incidunt neque porro numquam doloremque vel inventore distinctio laudantium harum illo quam nulla dolor alias iure impedit. Accusamus. Consequatur, a, ullam, voluptatum incidunt neque porro numquam doloremque vel inventore distinctio laudantium harum illo quam nulla dolor alias iure impedit! Accusamus.</p>
          <p class="author">Author Name</p>
        </aside>

      </div>
    </article>
    <!-- End Blog -->

    <!-- Contacts -->
    <article id="contacts">
      <div class="article-content">

        <h1>Contact Me</h1>
        <section id="contact-form" class="clearfix">
          <?php
          //init variables
          $cf = array();
          $sr = false;

          if(isset($_SESSION['cf_returndata'])){
            $cf = $_SESSION['cf_returndata'];
            $sr = true;
          }
          ?>
          <ul id="errors" class="<?php echo ($sr && !$cf['form_ok']) ? 'visible' : ''; ?>">
            <li id="info">There were some problems with your form submission:</li>
            <?php
              if(isset($cf['errors']) && count($cf['errors']) > 0) :
                foreach($cf['errors'] as $error) :
                ?>
                <li><?php echo $error ?></li>
                <?php
                endforeach;
              endif;
            ?>
          </ul>
          <p id="success">Thanks for your message.  We'll be in touch ASAP.</p>
          <form action="process.php" method="post">

            <div id="contactInfo">
              <div class="name">
                <label for="name">Name: </label>
                <input type="text" id="name" name="name" value="" placeholder="John Doe" required="required">
              </div>
              <div class="email">
                <label for="email">Email Address: </label>
                <input type="email" id="email" name="email" value="" placeholder="johndoe@example.com" required="required">
              </div>
            </div>

            <label for="message">Message: </label>
            <textarea name="message" id="message" placeholder="Your message must be greater than 20 characters" data-minlength="20"></textarea>

            <span id="loading"></span>
            <input type="submit" value="Send It!" id="submit-button">
          </form>
          <?php unset($_SESSION['cf_returndata']); ?>
        </section>

      </div>
    </article>
    <!-- End Contacts -->

  </main>
  <!-- END MAIN  -->

  <!-- FOOTER -->
  <footer>
    <div class="footer-container">
      <section class="sociocon">
        <img class="icon" src="<?php echo get_template_directory_uri(); ?>/src/images/pinterest-sociocon.png" alt="link to Surfing Chef on Pinterest">
      </section>
      <section class="sociocon">
        <img class="icon" src="<?php echo get_template_directory_uri(); ?>/src/images/github-sociocon.png" alt="link to Surfing Chef on GitHub">
      </section>
      <section class="sociocon">
        <img class="icon" src="<?php echo get_template_directory_uri(); ?>/src/images/email-sociocon.png" alt="email Surfing Chef">
      </section>
      <section>
        <p>Powered by WordPress. Maintained with love. Copyright 2017 Surfing-Chef</p>
      </section>
    </div>

  </footer>
  <!-- END FOOTER  -->

  <!-- BACK TO TOP BUTTON  -->
  <a href="#" class="back-to-top" style="display: inline;">
    <i class="fa fa-long-arrow-up" aria-hidden="true"></i>
  </a>
  <!-- END BACK TO TOP BUTTON  -->

    <!-- +++++ NO SCRIPTS BEFORE THIS COMMENT +++++ -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js"></script>
    <script>var templateDir = "<?php bloginfo('template_directory') ?>";</script>

    <!-- +++++ All SCRIPTS AFTER THIS COMMENT +++++ -->

    <!-- IMPORTS -->
    <script src="<?php echo get_template_directory_uri(); ?>/src/js/script.min.js"></script>

    <!-- CUSTOM -->

    <!-- END SCRIPT IMPORTS -->

</body>
</html>
