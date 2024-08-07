<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=medium-dpi" />
	<meta name="google-site-verification" content="cs_bPub1x_89HvhnSSWmKWcA_wLZ8LP9_n_nxUAVGjg" />
	<meta name="norton-safeweb-site-verification" content="kidhpi26c1r8iu0y7e1okez6e4hqbuoyl68gz8vlbj98g6rfi7mcs1z7cfj60f1ue1kh6jup--luwn8py4fhte7wfh7h59pa24u9j8b62arbegrzwyeigx-cx6sphex2" />

	<?php
	
	if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)) {
	
		echo('<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">');
		
	} 
	
	?>

	<title><?php wp_title(''); ?></title>

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="shortcut icon" type="image/x-icon" href="<?php the_field('favicon', 'options'); ?>">
	
	<?php wp_head(); ?>
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-BPCX9LEPH8"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-BPCX9LEPH8');
</script>
	<script>
	  (function(d) {
	    var config = {
	      kitId: 'qta2ula',
	      scriptTimeout: 3000,
	      async: false
	    },
	    h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
	  })(document);
	</script>
	<script type="text/javascript">
	    window._monsido = window._monsido || {
	        token: "1rYykbPd0f2CRrSwJaMoYQ",
	        statistics: {
	            enabled: true,
	            documentTracking: {
	                enabled: false,
	                documentCls: "monsido_download",
	                documentIgnoreCls: "monsido_ignore_download",
	                documentExt: [],
	            },
	        },
	        pageCorrect: {
	            enabled: true,
	        },
	        pageAssistV2: {
	            enabled: true,
	            theme: "light",
	            mainColor: "#783CE2",
	            textColor: "#ffffff",
	            linkColor: "#783CE2",
	            buttonHoverColor: "#783CE2",
	            mainDarkColor: "#052942",
	            textDarkColor: "#ffffff",
	            linkColorDark: "#FFCF4B",
	            buttonHoverDarkColor: "#FFCF4B",
	            greeting: "Discover your personalization options",
	            direction: "leftbottom",
	            coordinates: "undefined undefined undefined undefined",
	            iconShape: "circle",
	            title: "Personalization Options",
	            titleText: "Welcome to PageAssist™ toolbar! Adjust the options below to cater the website to your accessibility needs.",
	            iconPictureUrl: "logo",
	            logoPictureUrl: "",
	            logoPictureBase64: "",
	            languages: ["en-US", "es-MX"],
	            defaultLanguage: "en-US",
	            skipTo: false,
	            alwaysOnTop: false,
	        },
	    };
	</script>
	<script type="text/javascript" async src="https://app-script.monsido.com/v2/monsido-script.js"></script>
</head>
<body <?php body_class(); ?>>
	<?php get_template_part('template-parts/content','alert'); ?>
	<div class="search">
		<div id="search-bar">
			<div class="search-bar-inner">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<form role="search" id="sites-search" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
								 <label class="sr-only" for="search-text"><?php _e('Search'); ?></label>
								 <input type="text" class="search-field" id="search-text" placeholder="Search..." value="<?php echo get_search_query(); ?>" name="s">
								 <button type="submit" id="ss-icon"><i class="fas fa-search"></i></button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="wrapper">
		<div class="wrapper-inner">
			<div id="header-mobile" class="d-block d-lg-none">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div id="logo" class="clearfix">
								<a href="<?php echo home_url(); ?>"><img class="img-fluid" src="<?php the_field('logo', 'option'); ?>" alt="<?php bloginfo('name'); ?>" /></a>
							</div>
							
							<?php wp_nav_menu( array('theme_location' => 'header-menu-mobile' )); ?>
						
						</div>
					</div>
				</div>
			</div>
			<div id="header-global" class="d-none d-lg-block">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-auto">
							<div id="logo" class="clearfix">
								<a href="<?php echo home_url(); ?>"><img class="img-fluid" src="<?php the_field('logo', 'option'); ?>" alt="<?php bloginfo('name'); ?>" /></a>
							</div>
						</div>
						<div class="col-lg-auto align-self-center">
							<div id="nav-top-links" class="d-flex">
								<div id="nav-top-links-container">
									<?php wp_nav_menu( array('theme_location' => 'header-toplinks', 'items_wrap' => '<ul class="nav navbar-nav" aria-label="Top Links">%3$s</ul>' )); ?>
								</div>
								<div id="nav-top-search-container">
									<a href="#" id="search-toggle" class="text-sm"><i class="fas fa-search"></i> <?php _e('Search'); ?></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="mainmenu" class="clearfix d-none d-lg-block" role="navigation">
				<div class="container">
					<div role="navigation">
						<div id="primary-nav" tabindex="0">
							<?php wp_nav_menu( array('theme_location' => 'header-menu', 'items_wrap' => '<ul class="nav navbar-nav" aria-label="primary navigation">%3$s</ul>' )); ?>						
						</div>
					</div>
				</div>
			</div>