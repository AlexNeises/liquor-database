		<div class="row">
			<div class="small-12 columns">
				<h1 class="main">Recipe Results</h1>
			</div>
		</div>
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
			<div class="row">
				<div class="small-8 small-offset-2 columns">
					<table width="100%">
						<thead>
							<tr>
								<th width="25%">Drink Name</th>
								<th width="75%">Description</th>
							</tr>
						</thead>
						<tbody>
							<?php if($found_recipe_ids) : ?>
								<?php foreach($found_recipe_ids as $recipe_id) : ?>
									<?php $recipe = new Recipe_Model($recipe_id); ?>
									<tr>
										<td><?php print $recipe->get_name(); ?></td>
										<td><?php print $recipe->get_description(); ?></td>
									</tr>
								<?php endforeach; ?>
							<?php else : ?>
								<tr>
									<td colspan="2">No recipes found.</td>
								</tr>
							<?php endif; ?>
						</tbody>
					</table>
				</div>
			</div>
		</form>