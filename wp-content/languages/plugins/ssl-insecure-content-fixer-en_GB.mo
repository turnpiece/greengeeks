��    L      |  e   �      p  1   q     �  }   �  �   6  i   �  g   9  j   �  #   	     0	     A	  5   \	  �   �	  �   (
  #   �
      �
  l   �
     a  T   r  ;   �       Y     S   f  #   �     �     �       I   3  6   }  5   �  4   �          6  Q   P  R   �     �  [     a   l  ^   �  �   -  ;   �  ^   �  .   ]  +   �  0   �  q   �  s   [     �     �  .   
  I   9  d   �     �               7  !   U     w     �     �  9   �  =   
  ^   H  0   �     �  w   �  W   o  1   �  P   �  4   J  8     Q   �  *   
  %   5  #   [  1     4  �  1   �       }   -  �   �  i   D  g   �  j     #   �     �     �  5   �  �     �   �  #   $      H  l   i     �  T   �  ;   <     x  Y   �  S   �  #   /      S      [      g   6   o   #   �   "   �   !   �      !     !  >   !  ?   Y!     �!  H   �!  N   �!  K   9"  �   �"  (   #  K   0#     |#     �#     �#  ^   �#  `   .$     �$     �$     �$  0   �$  K   %     ]%  	   r%     |%     �%     �%     �%     �%  	   �%  %   �%  )   �%  J   &  !   N&     p&  h   �&  H   �&  "   2'  A   U'  %   �'  )   �'  B   �'     *(     F(     ](  "   r(                 7      5   =       *   6                        8   1       H      2   %   @   B       I   .          ?   4   G       >                ,           ;      9   !          F       -      J          E   #   +      A   "          )      	   (      <       K      L      :      &          C   /       
                    0          D          '          3      $    Clean up WordPress website HTTPS insecure content Fix insecure content If you know of a way to detect HTTPS on your server, please <a href="%s" target="_blank" rel="noopener">tell me about it</a>. It looks like your server is behind Amazon CloudFront, not configured to send HTTP_X_FORWARDED_PROTO. The recommended setting for HTTPS detection is %s. It looks like your server is behind Windows Azure ARR. The recommended setting for HTTPS detection is %s. It looks like your server is behind a reverse proxy. The recommended setting for HTTPS detection is %s. It looks like your server uses Cloudflare Flexible SSL. The recommended setting for HTTPS detection is %s. Multisite network settings updated. Running tests... SSL Insecure Content Fixer SSL Insecure Content Fixer multisite network settings SSL Insecure Content Fixer requires <a target="_blank" rel="noopener" href="%1$s">PCRE</a> version %2$s or higher; your website has PCRE version %3$s SSL Insecure Content Fixer requires these missing PHP extensions. Please contact your website host to have these extensions installed. SSL Insecure Content Fixer settings SSL Insecure Content Fixer tests Select the level of fixing. Try the Simple level first, it has the least impact on your website performance. Tests completed. These settings affect all sites on this network that have not been set individually. This page checks to see whether WordPress can detect HTTPS. WebAware Your server can detect HTTPS normally. The recommended setting for HTTPS detection is %s. Your server cannot detect HTTPS. The recommended setting for HTTPS detection is %s. Your server environment shows this: fix level settingsCapture fix level settingsCapture All fix level settingsContent fix level settingsEverything on the page, from the header to the footer: fix level settingsEverything that Content does, plus: fix level settingsEverything that Simple does, plus: fix level settingsNo insecure content will be fixed fix level settingsOff fix level settingsSimple fix level settingsThe biggest potential to break things, but sometimes necessary fix level settingsThe fastest method with the least impact on website performance fix level settingsWidgets fix level settingscapture the whole page and fix scripts, stylesheets, and other resources fix level settingsdata returned from <code>wp_upload_dir()</code> (e.g. for some CAPTCHA images) fix level settingsexcludes AJAX calls, which can cause compatibility and performance problems fix level settingsimages and other media loaded by calling <code>wp_get_attachment_image()</code>, <code>wp_get_attachment_image_src()</code>, etc. fix level settingsimages loaded by the plugin Image Widget fix level settingsincludes AJAX calls, which can cause compatibility and performance problems fix level settingsresources in "Text" widgets fix level settingsresources in any widgets fix level settingsresources in the page content fix level settingsscripts registered using <code>wp_register_script()</code> or <code>wp_enqueue_script()</code> fix level settingsstylesheets registered using <code>wp_register_style()</code> or <code>wp_enqueue_style()</code> https://shop.webaware.com.au/ https://ssl.webaware.net.au/ ignore external settingsIgnore external sites ignore external settingsOnly fix content pointing to this WordPress site ignore external settingsSelect only if you wish to leave content pointing to external sites as http menu linkSSL Insecure Content menu linkSSL Tests plugin details linksDonate plugin details linksGet help plugin details linksInstructions plugin details linksRating plugin details linksSettings plugin details linksTranslate plugin fix settingsFixes for specific plugins and themes plugin fix settingsSelect only the fixes your website needs. plugin fix settingsWooCommerce  + Google Chrome HTTP_HTTPS bug (fixed in WooCommerce v2.3.13) proxy settings* detected as recommended setting proxy settingsHTTPS detection proxy settingsHTTP_CF_VISITOR (Cloudflare Flexible SSL); deprecated, since Cloudflare sends HTTP_X_FORWARDED_PROTO now proxy settingsHTTP_CLOUDFRONT_FORWARDED_PROTO (Amazon CloudFront HTTPS cached content) proxy settingsHTTP_X_ARR_SSL (Windows Azure ARR) proxy settingsHTTP_X_FORWARDED_PROTO (e.g. load balancer, reverse proxy, NginX) proxy settingsHTTP_X_FORWARDED_SCHEME (e.g. KeyCDN) proxy settingsHTTP_X_FORWARDED_SSL (e.g. reverse proxy) proxy settingsSelect how WordPress should detect that a page is loaded via HTTPS proxy settingsstandard WordPress function proxy settingsunable to detect HTTPS settings errorFix level is invalid settings errorHTTPS detection setting is invalid PO-Revision-Date: 2017-11-29 18:51:10+0000
MIME-Version: 1.0
Content-Type: text/plain; charset=UTF-8
Content-Transfer-Encoding: 8bit
Plural-Forms: nplurals=2; plural=n != 1;
X-Generator: GlotPress/2.4.0-alpha
Language: en_GB
Project-Id-Version: Plugins - SSL Insecure Content Fixer - Stable (latest release)
 Clean up WordPress website HTTPS insecure content Fix insecure content If you know of a way to detect HTTPS on your server, please <a href="%s" target="_blank" rel="noopener">tell me about it</a>. It looks like your server is behind Amazon CloudFront, not configured to send HTTP_X_FORWARDED_PROTO. The recommended setting for HTTPS detection is %s. It looks like your server is behind Windows Azure ARR. The recommended setting for HTTPS detection is %s. It looks like your server is behind a reverse proxy. The recommended setting for HTTPS detection is %s. It looks like your server uses Cloudflare Flexible SSL. The recommended setting for HTTPS detection is %s. Multisite network settings updated. Running tests... SSL Insecure Content Fixer SSL Insecure Content Fixer multisite network settings SSL Insecure Content Fixer requires <a target="_blank" rel="noopener" href="%1$s">PCRE</a> version %2$s or higher; your website has PCRE version %3$s SSL Insecure Content Fixer requires these missing PHP extensions. Please contact your website host to have these extensions installed. SSL Insecure Content Fixer settings SSL Insecure Content Fixer tests Select the level of fixing. Try the Simple level first, it has the least impact on your website performance. Tests completed. These settings affect all sites on this network that have not been set individually. This page checks to see whether WordPress can detect HTTPS. WebAware Your server can detect HTTPS normally. The recommended setting for HTTPS detection is %s. Your server cannot detect HTTPS. The recommended setting for HTTPS detection is %s. Your server environment shows this: Capture Capture All Content Everything on the page, from the header to the footer: Everything that Content does, plus: Everything that Simple does, plus: No insecure content will be fixed Off Simple The biggest potential to break things, but sometimes necessary The fastest method with the least impact on website performance Widgets capture the whole page and fix scripts, stylesheets, and other resources data returned from <code>wp_upload_dir()</code> (e.g. for some CAPTCHA images) excludes AJAX calls, which can cause compatibility and performance problems images and other media loaded by calling <code>wp_get_attachment_image()</code>, <code>wp_get_attachment_image_src()</code>, etc. images loaded by the plugin Image Widget includes AJAX calls, which can cause compatibility and performance problems resources in "Text" widgets resources in any widgets resources in the page content scripts registered using <code>wp_register_script()</code> or <code>wp_enqueue_script()</code> stylesheets registered using <code>wp_register_style()</code> or <code>wp_enqueue_style()</code> https://shop.webaware.com.au/ https://ssl.webaware.net.au/ Ignore external sites Only fix content pointing to this WordPress site Select only if you wish to leave content pointing to external sites as http SSL Insecure Content SSL Tests Donate Get help Instructions Rating Settings Translate Fixes for specific plugins and themes Select only the fixes your website needs. WooCommerce  + Google Chrome HTTP_HTTPS bug (fixed in WooCommerce v2.3.13) * detected as recommended setting HTTPS detection HTTP_CF_VISITOR (Cloudflare Flexible SSL); deprecated, since Cloudflare sends HTTP_X_FORWARDED_PROTO now HTTP_CLOUDFRONT_FORWARDED_PROTO (Amazon CloudFront HTTPS cached content) HTTP_X_ARR_SSL (Windows Azure ARR) HTTP_X_FORWARDED_PROTO (e.g. load balancer, reverse proxy, NginX) HTTP_X_FORWARDED_SCHEME (e.g. KeyCDN) HTTP_X_FORWARDED_SSL (e.g. reverse proxy) Select how WordPress should detect that a page is loaded via HTTPS standard WordPress function unable to detect HTTPS Fix level is invalid HTTPS detection setting is invalid 