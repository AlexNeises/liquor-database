		<div class="row">
			<div class="small-12 columns">
				<h1 class="main">Submit</h1>
			</div>
		</div>
		<div class="row">
			<div class="small-8 small-offset-2 columns">
				<?php if($this->session->flashdata('msg')) : ?>
					<div data-alert class="alert-box success radius">
						<?php print $this->session->flashdata('msg'); ?>
						<a href="javascript:void(0)" class="close">&times;</a>
					</div>
				<?php endif; ?>
				<form id="name_search" action="<?php print site_url('submit/send'); ?>" data-abide method="post" autocomplete="on" class="custom">
					<fieldset>
						<legend>Submit Recipe</legend>
						<div class="row">
							<div class="small-8 columns">
								<label>Recipe Name <input type="text" required name="recipe_name"/></label>
								<small class="error">This is required.</small>
							</div>
							<div class="small-4 columns">
								<label>Glass Type <select required name="recipe_glass_id">
									<option value>---</option>
									<?php foreach($glassware as $glass) : ?>
										<option value="<?php print $glass->get_glassware_id(); ?>"><?php print $glass->get_glass(); ?></option>
									<?php endforeach; ?>
								</select></label>
								<small class="error">This is required.</small>
							</div>
						</div>
						<fieldset>
							<legend>Liquors</legend>
							<div class="row">
								<div class="small-12 columns">
									<div class="row">
										<div class="small-4 small-offset-8 columns">
											<a href="javascript:void(0)" class="button add_liquor radius small expand">Add Liquor</a>
										</div>
									</div>
									<div class="row">
										<div class="small-12 columns">
											<table width="100%">
												<thead>
													<tr>
														<th width="60%">Liquor</th>
														<th width="30%">Amount</th>
														<th width="10%">Proof</th>
													</tr>
												</thead>
												<tbody id="needed_rows_liquor">
													<tr>
														<td><input name="liquors_needed[]" type="text"/></td>
														<td><input name="measures_needed[]" type="text"/></td>
														<td><input name="proof_needed[]" type="text"/></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</fieldset>
						<fieldset>
							<legend>Mixers</legend>
							<div class="row">
								<div class="small-12 columns">
									<div class="row">
										<div class="small-4 small-offset-8 columns">
											<a href="javascript:void(0)" class="button add_mixer radius small expand">Add Mixers</a>
										</div>
									</div>
									<div class="row">
										<div class="small-12 columns">
											<table width="100%">
												<thead>
													<tr>
														<th width="60%">Mixer</th>
														<th width="40%">Amount</th>
													</tr>
												</thead>
												<tbody id="needed_rows_mixer">
													<tr>
														<td><input name="mixer_needed[]" type="text"/></td>
														<td><input name="mixer_measure_needed[]" type="text"/></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</fieldset>
						<div class="row">
							<div class="small-6 columns">
								<label>Description <textarea required name="recipe_description" rows="8"></textarea></label>
								<small class="error">This is required.</small>
							</div>
							<div class="small-6 columns">
								<label>Instructions <textarea required name="recipe_instructions" rows="8"></textarea></label>
								<small class="error">This is required.</small>
							</div>
						</div>
						<div class="row">
							<div class="small-12 columns">
								<label>Tags <input type="text" required name="recipe_tags"/></label>
								<small class="error">This is required.</small>
							</div>
						</div>
						<div class="row">
							<div class="small-8 small-offset-2 columns">
								<a href="javascript:void(0)" class="button expand radius submit">Submit Recipe</a>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>