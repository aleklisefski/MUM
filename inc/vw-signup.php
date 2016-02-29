<?php if(get_field('visitors_weekend_dates', 84)): ?>
	<div class="visitors-weekend-dates blue">
		<h3>Visit Us</h3>
		<form>
			<a class="button goURL not-mobile" href="#" onclick="_gaq.push(['_trackEvent', 'VW', 'Signup']); document.location.href=document.getElementById('VWdates').value; return false;">Sign Up</a>
			<div class="select">
				<select id="VWdates">
					<option value="">choose a date</option>
					<?php while(has_sub_field('visitors_weekend_dates', 84)): ?>
					<?php  
						$date = get_sub_field('date');
						$link = get_sub_field('link');
					?>
					<option value="<?php echo $link; ?>"><?php echo $date; ?></option>
	 				<?php endwhile; ?>
	 			</select>
			</div>
			<a class="button goURL mobile" href="#" onclick="_gaq.push(['_trackEvent', 'VW', 'Signup']); document.location.href=document.getElementById('VWdates').value; return false;">Sign Up</a>
		</form>
	</div>
<?php endif; ?>