

<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see bootstrap_preprocess_page()
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see bootstrap_process_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
?>

<header id="navbar" role="banner" class="<?php print $navbar_classes; ?>">

  <div class="bg-glow-outer">
    <div class="bg-glow"></div>
  </div>

  <div class="container">

    <div class="navbar-header">
      <?php if ($logo): ?>
      <a class="logo navbar-btn pull-left" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
        <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
      </a>
      <?php endif; ?>

      <?php if (!empty($site_name)): ?>
      <a class="name navbar-brand" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><?php print $site_name; ?></a>
      <?php endif; ?>

      <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    

 

    <?php if (!empty($primary_nav) || !empty($page['navigation'])): ?>
      <div class="navbar-collapse collapse navbar-right">
        <nav role="navigation">

          <?php if (!empty($primary_nav)): ?>
            <?php print render($primary_nav); ?>
          <?php endif; ?>

          <?php if (!empty($page['navigation'])): ?>
            <?php print render($page['navigation']); ?>
          <?php endif; ?>
        </nav>
      </div>
    <?php endif; ?>

  </div>
</header>


  <div id="rotating-item-wrapper">
    <div class="header-slideshow img-responsive">
        <img class="rotating-item" src="/sites/all/themes/burningmanbikecourse/images/bikecourselogo1.jpg" width="100%" />
        <img class="rotating-item" src="/sites/all/themes/burningmanbikecourse/images/topless-bump.jpg" width="100%" />
        <img class="rotating-item" src="/sites/all/themes/burningmanbikecourse/images/bike-course-1.jpg" width="100%" />
        <img class="rotating-item" src="/sites/all/themes/burningmanbikecourse/images/kelley-bump.jpg" width="100%" />
        <img class="rotating-item" src="/sites/all/themes/burningmanbikecourse/images/kurt-teeter.jpg" width="100%" />
    </div>
  </div>
<script type="text/javascript"></script><script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script><script type="text/javascript" src="js/infinite-rotator.js"></script>



<!--<div class ="header-image">
	<img src="/sites/all/themes/burningmanbikecourse/images/bikecourselogo_0.jpg" width="100%">
</div>
-->

<div class="container">
	<h1>Burningman Bike Course</h1>
	<p>Welcome to the home of the Burningman Bike Course</p>
  	<div class="row">
  		<div class="col-md-5 well">
  			<h2>Images</h2>
  			<p>Checkout pictures from previous years</p>
  		</div>
  		<div class="col-md-5 col-md-offset-1 well">
  			<h2>Donate</h2>
  			<p>Give us some money so we can build more things that you can hurt yourself on</p>
  		</div>
  	</div>
</div>

<?php if (!empty($page['belt'])): ?>
<div class="container belt">
    <div class="row">
          <?php print render($page['belt']); ?>
    </div>
</div>
<?php endif; ?>

<!-- START - footer -->
<div class="full-width-footer">
  <div class="container footer">
    <div class="row">
    <p class="text-center">Burningman Bike Course 2015</p>
      <?php if (!empty($page['footer'])): ?>
        <?php print render($page['footer']); ?>
      <?php endif; ?>
    </div>
  </div>
</div>
<!-- END - footer -->








