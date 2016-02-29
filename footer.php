<?php $template_url = get_bloginfo('template_url'); ?>	

<?php
	$parent = array_reverse(get_post_ancestors($post->ID));
	$top_parent = get_page($parent[0]);
	$top_parent_name = $top_parent->post_title;

	if  ( is_page_template('page-landing.php') ) {
		// do not include contact bar on old landing page template
	} else {
		include (TEMPLATEPATH . '/inc/contact.php'); 
	};
?>

<?php if ( !is_page_template( 'page-department_select_interest_with-popup.php' ) ) { ?>
	<!-- Google form submission tracking code -->
	
	<?php
	function parse_google_cookie($__utmz){
	   $data = array();
	   foreach((array)preg_split('~([.|])(?=ut)~', $__utmz) as $pair){
	       list($key, $value) = explode('=', $pair);
	       $data[$key] = $value;
	   }
	   return $data;
	}
	
	
	if (isset($_COOKIE["__utmz"])) {
		$AnalyticsCookie = parse_google_cookie($_COOKIE["__utmz"]);
	
		if(strlen($AnalyticsCookie['utmgclid']) > 0) {
			$AnalyticsInformation = "\n\nSource: google\nType: CPC\nKeyword: ".$AnalyticsCookie['utmctr'];
		} else {
			$AnalyticsInformation = "\n\nSource: ".$AnalyticsCookie['utmcsr']."\nType: ".$AnalyticsCookie['utmccn']."\nKeyword: ".$AnalyticsCookie['utmctr'];
		}
			$AnalyticsInformation = str_replace(")","",str_replace("(","",$AnalyticsInformation));
			
	} else { 
		$AnalyticsInformation = "\n\nNo Analytics Information Captured";
		}
		
		$TrafficSource="";
		$type="";
		$Keyword="";
		
		if(strlen($AnalyticsCookie['utmgclid']) > 0)
		{
			$TrafficSource="google";
			$type="CPC";
			$Keyword=$AnalyticsCookie['utmctr'];   
		} else {   
			$TrafficSource=$AnalyticsCookie['utmcsr'];
			$type=$AnalyticsCookie['utmccn'];
			$Keyword=$AnalyticsCookie['utmctr'];  
		}
	?>
<?php } ?>




<!-- ##### DLMA signup pop-up ##### -->
<?php
	$competition_signup_heading = get_field('competition_signup_heading', 31419);
	$competition_signup_date = get_field('competition_signup_date', 31419);
	$competition_signup_subheading = get_field('competition_signup_subheading', 31419);
	$competition_signup_content = get_field('competition_signup_content', 31419);
?>

<div id="lynch-signup" class="hidden">
	<div class="fish"></div>
	<h2><?php echo $competition_signup_heading; ?></h2>
	<h4><?php echo $competition_signup_date; ?></h4>
	<h3><?php echo $competition_signup_subheading; ?></h3>
	<?php echo $competition_signup_content; ?>
	
	<!-- Begin MailChimp Signup Form -->
	<div id="mc_embed_signup">
		<form action="//mum.us8.list-manage.com/subscribe/post?u=22fad1e3d15e93d858349d4a6&amp;id=382e0ddc97" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
			<input type="hidden" id="mce-MMERGE4" name="MMERGE4" value="<?php echo $TrafficSource; ?>" />
	    	<input type="hidden" id="mce-MMERGE5" name="MMERGE5" value="<?php echo $type; ?>" />
	    	<input type="hidden" id="mce-MMERGE6" name="MMERGE6" value="<?php echo $Keyword; ?>" />
			<div id="mc_embed_signup_scroll">

				<div class="mc-field-group">
					<input type="text" value="First Name *" name="FNAME" class="required clearDefault" id="mce-FNAME">
				</div>
				<div class="mc-field-group">
					<input type="email" value="Email Address *" name="EMAIL" class="required email clearDefault" id="mce-EMAIL">
				</div>
				<div class="mc-field-group">
				    <input type="text" value="Phone Number *" name="MMERGE3" class="required phone clearDefault" id="mce-MMERGE3">
				</div>	
				<div class="mc-field-group input-group">
				    <p>Do you have an undergraduate degree?</p>
				    <ul>
				    	<li><input type="radio" value="Yes" name="MMERGE11" id="mce-MMERGE11-0"><label for="mce-MMERGE11-0">Yes</label></li>
						<li><input type="radio" value="No" name="MMERGE11" id="mce-MMERGE11-1"><label for="mce-MMERGE11-1">No</label></li>
					</ul>
				</div>
				<div id="mce-responses" class="clear">
					<div class="response" id="mce-error-response" style="display:none"></div>
					<div class="response" id="mce-success-response" style="display:none"></div>
				</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
				<div style="position: absolute; left: -5000px;"><input type="text" name="b_22fad1e3d15e93d858349d4a6_382e0ddc97" tabindex="-1" value=""></div>
				<div class="clear"><input type="submit" value="Download Now!" name="subscribe" id="mc-embedded-subscribe" class="button" onclick="fbq('track', 'DLMA info packet submit');"></div>
			</div>
		</form>
	</div>
	<!--End mc_embed_signup-->
</div>

<footer class="gray">
 	<div class="container">
 		<div class="col">
 			<a class="box" href="/contact-us/">
 				<span class="icon chat"></span>
 				<strong>Contact Us</strong><br />
				Please fill out this form to get in touch with us.
 			</a>
 			<a class="box" href="/admissions/visitors-weekends/">
 				<span class="icon visit"></span>
 				<strong>Visitors Weekend</strong><br />
				How to schedule your visit to our campus.
 			</a>
 		</div>
 		<div class="col">
 			<a class="box" href="/apply/">
 				<span class="icon apply"></span>
 				<strong>Apply Online</strong><br />
				If you are ready to apply, here's the place to do it.
 			</a>
 			<a class="box" href="/about-mum/accreditation/">
 				<span class="icon accred"></span>
 				<strong>Accreditation</strong><br />
				Your degree from MUM is meaningful.
 			</a>
 		</div>
 		<div class="col">
 			<a class="box" href="/contact-us/">
 				<span class="icon phone"></span>
 				<strong>(800) 369-6480</strong><br />
				Feel free to call us with any questions.
 			</a>
 			<a class="box" href="/contact-us/">
 				<span class="icon location"></span>
 				<strong class="small">1000 North Fourth St.<br />Fairfield, Iowa 52557</strong>
 			</a>
 		</div>
 		<div class="col last">
 			<a class="logo" href="<?php echo home_url(); ?>"></a>
 			<p>Maharishi University<br />of Management</p>
	 		<ul class="social">
				<li><a href="http://www.facebook.com/Maharishi.University" class="icon facebook">Facebook</a></li>
				<li><a href="http://www.twitter.com/maharishiu" class="icon twitter">Twitter</a></li>
				<li><a href="https://plus.google.com/u/0/116959779618900502274/posts" class="icon google">Google+</a></li>
				<li class="last"><a href="http://www.youtube.com/maharishiu" class="icon youtube">YouTube</a></li>
			</ul> 		
 		</div>

		<div class="clearFix"></div>
 	</div>
</footer>

<section class="footer">
	<div class="container">
		<p class="copyright">Copyright &copy; <?php echo date('Y'); ?> MUM.  All rights reserved.</p>
		<p><a href="/sitemap">Sitemap</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href="/conditions-of-use/">Conditions of Use</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href="/consumer-information/">Consumer Information</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href="/privacy-information/">Privacy Statement</a></p>
	</div>
</section>

<?php wp_footer(); ?>

<!-- Google+ Share Button -->
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>

<!-- AdRoll -->
<script type="text/javascript">
adroll_adv_id = "MHKGCGOE2JFFZBCXJ7GNRM";
adroll_pix_id = "FRKBTUO7TBD5JDNW2UIBJG";
(function () {
var oldonload = window.onload;
window.onload = function(){
   __adroll_loaded=true;
   var scr = document.createElement("script");
   var host = (("https:" == document.location.protocol) ? "https://s.adroll.com" : "http://a.adroll.com");
   scr.setAttribute('async', 'true');
   scr.type = "text/javascript";
   scr.src = host + "/j/roundtrip.js";
   ((document.getElementsByTagName('head') || [null])[0] ||
    document.getElementsByTagName('script')[0].parentNode).appendChild(scr);
   if(oldonload){oldonload()}};
}());
</script>

<?php if( !is_front_page() && !is_page_template( 'index_MMY.php' ) && !is_page_template( 'index_TEST.php' ) && !is_page_template( 'page-department.php' ) ) { ?>
<!-- begin usabilla live embed code --> <script type="text/javascript">/*{literal}<![CDATA[*/window.lightningjs||function(c){function g(b,d){d&&(d+=(/\?/.test(d)?"&":"?")+"lv=1");c[b]||function(){var i=window,h=document,j=b,g=h.location.protocol,l="load",k=0;(function(){function b(){a.P(l);a.w=1;c[j]("_load")}c[j]=function(){function m(){m.id=e;return c[j].apply(m,arguments)}var b,e=++k;b=this&&this!=i?this.id||0:0;(a.s=a.s||[]).push([e,b,arguments]);m.then=function(b,c,h){var d=a.fh[e]=a.fh[e]||[],j=a.eh[e]=a.eh[e]||[],f=a.ph[e]=a.ph[e]||[];b&&d.push(b);c&&j.push(c);h&&f.push(h);return m};return m};var a=c[j]._={};a.fh={};a.eh={};a.ph={};a.l=d?d.replace(/^\/\//,(g=="https:"?g:"http:")+"//"):d;a.p={0:+new Date};a.P=function(b){a.p[b]=new Date-a.p[0]};a.w&&b();i.addEventListener?i.addEventListener(l,b,!1):i.attachEvent("on"+l,b);var q=function(){function b(){return["<head></head><",c,' onload="var d=',n,";d.getElementsByTagName('head')[0].",d,"(d.",g,"('script')).",i,"='",a.l,"'\"></",c,">"].join("")}var c="body",e=h[c];if(!e)return setTimeout(q,100);a.P(1);var d="appendChild",g="createElement",i="src",k=h[g]("div"),l=k[d](h[g]("div")),f=h[g]("iframe"),n="document",p;k.style.display="none";e.insertBefore(k,e.firstChild).id=o+"-"+j;f.frameBorder="0";f.id=o+"-frame-"+j;/MSIE[ ]+6/.test(navigator.userAgent)&&(f[i]="javascript:false");f.allowTransparency="true";l[d](f);try{f.contentWindow[n].open()}catch(s){a.domain=h.domain,p="javascript:var d="+n+".open();d.domain='"+h.domain+"';",f[i]=p+"void(0);"}try{var r=f.contentWindow[n];r.write(b());r.close()}catch(t){f[i]=p+'d.write("'+b().replace(/"/g,String.fromCharCode(92)+'"')+'");d.close();'}a.P(2)};a.l&&setTimeout(q,0)})()}();c[b].lv="1";return c[b]}var o="lightningjs",k=window[o]=g(o);k.require=g;k.modules=c}({}); window.usabilla_live = lightningjs.require("usabilla_live", "//w.usabilla.com/0966f33cd010.js"); /*]]>{/literal}*/</script> <!-- end usabilla live embed code -->
<?php } ?>

<!-- Google Code for AllPage -->
<!-- Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. For instructions on adding this tag and more information on the above requirements, read the setup guide: google.com/ads/remarketingsetup -->
<script type="text/javascript">
var google_conversion_id = 1071453490;
var google_conversion_label = "q1M2CIz-rwQQsqr0_gM";
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/1071453490/?value=1.00&amp;currency_code=USD&amp;label=q1M2CIz-rwQQsqr0_gM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

</body>
</html>
