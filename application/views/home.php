		<div class="row">
			<div class="small-12 columns">
				<h1 class="main">Alcohol Recipe Database</h1>
			</div>
		</div>
		<?php foreach($companies as $company) : ?>
			Company: <?php print $company->get_name(); ?>
			<br/>
			City: <?php print $company->get_city(); ?>
			<br/>
			Country: <?php print $company->get_country(); ?>
			<br/>
			<br/>
		<?php endforeach; ?>
		<form id="name_search" action="<?php print site_url('search/recipe'); ?>" method="post" autocomplete="on" class="custom">
			<div class="row">
				<div class="small-6 small-offset-3 columns">
					<div class="row collapse">
						<div class="small-9 columns">
							<input type="text" placeholder="Search by recipe name" name="search_string"/>
						</div>
						<div class="small-3 columns">
							<button type="submit" class="button postfix radius">Search</button>
						</div>
					</div>
				</div>
			</div>
		</form>