<?php 
/**
 * Template Name: Google Search 
 * @package WordPress
 * @subpackage CSD
 * @since CSD 1.0
 */
get_header();
?>
<div id="primary" class="content-area padding-vertical-two">
	<div class="container">
		<div class="row">
			<div class="col-main col-sm-12">
				<main id="main" class="site-main" role="main">
					<h1 class="entry-title padding-bottom-one">Search</h1>
					<div class="padding-bottom-two" id="search-form">
						<form role="search" id="sites-search" action="<?php echo esc_url( home_url( '/search' ) ); ?>" method="get">
							 <label class="sr-only" for="search-text">Search</label>
							 <input type="text" class="search-field input-lg" id="search-text" placeholder="Search..." value="<?php echo get_search_query(); ?>" name="q">
							 <button type="submit" class="btn btn-primary btn-lg">Search</button>
						</form>
					</div>					
						
					<?php while ( have_posts() ) : the_post(); ?>
					
					<div id='cse' style='width: 100%;'>Loading</div>
					<script src='//www.google.com/jsapi' type='text/javascript'></script>
					<script type='text/javascript'>
					google.load('search', '1', {language: 'en', style: google.loader.themes.MINIMALIST});
					google.setOnLoadCallback(function() {
					  var customSearchOptions = {};
					  var orderByOptions = {};
					  orderByOptions['keys'] = [{label: 'Relevance', key: ''} , {label: 'Date', key: 'date'}];
					  customSearchOptions['enableOrderBy'] = true;
					  customSearchOptions['orderByOptions'] = orderByOptions;
					  var customSearchControl =   new google.search.CustomSearchControl('016337402466016081001:ue4kkowxury', customSearchOptions);
					  customSearchControl.setResultSetSize(google.search.Search.FILTERED_CSE_RESULTSET);
					  var options = new google.search.DrawOptions();
					  options.enableSearchResultsOnly();
					  options.setAutoComplete(true);
					  customSearchControl.draw('cse', options);
					  function parseParamsFromUrl() {
					    var params = {};
					    var parts = window.location.search.substr(1).split('&');
					    for (var i = 0; i < parts.length; i++) {
					      var keyValuePair = parts[i].split('=');
					      var key = decodeURIComponent(keyValuePair[0]);
					      params[key] = keyValuePair[1] ?
					          decodeURIComponent(keyValuePair[1].replace(/\+/g, ' ')) :
					          keyValuePair[1];
					    }
					    return params;
					  }
					  var urlParams = parseParamsFromUrl();
					  var queryParamName = 'q';
					  if (urlParams[queryParamName]) {
					    customSearchControl.execute(urlParams[queryParamName]);
					  }
					}, true);
					</script>
					<?php endwhile; ?>					
					
				</main><!-- .site-main -->
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>