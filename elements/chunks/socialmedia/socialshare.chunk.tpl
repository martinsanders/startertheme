<div class="social-share">
    <div class="wrapper">
        <div class="social-share--wrapper">
            <span class="social-share--label">[[%site.share? &namespace=`startertheme`&topic=`default`]]</span>
            <ul class="social-share--list">
                <li class="social-share--item social-share--item__whatsapp">
                    <a id="gtm-share-whatsapp" rel="noopener" target="_blank" href="https://api.whatsapp.com/?text=[[~[[*id]]? &scheme=`full`]]" data-action="share/whatsapp/share" class="social-share--link" title="[[%site.share.whatsapp? &namespace=`startertheme` &topic=`default`]]">
                        <span class="social-share--text">[[%site.share.whatsapp? &namespace=`startertheme` &topic=`default`]]</span>
                    </a>
                </li>
                <li class="social-share--item social-share--item__email">
                    <a id="gtm-share-email" rel="noopener" target="_blank" href="#mail-popup" class="social-share--link lightbox hash" data-lightbox-type="inline" title="[[%site.share.email? &namespace=`startertheme` &topic=`default`]]">
                        <span class="social-share--text">[[%site.share.email? &namespace=`startertheme` &topic=`default`]]</span>
                    </a>
                </li>
                <li class="social-share--item social-share--item__facebook">
                    <a id="gtm-share-facebook" rel="noopener" target="_blank" href="http://www.facebook.com/sharer.php?u=[[~[[*id]]? &scheme=`full`]]&amp;t=[[*longtitle:default=`[[*pagetitle]]`]]" class="social-share--link" title="[[%site.share.facebook? &namespace=`startertheme` &topic=`default`]]">
                        <span class="social-share--text">[[%site.share.facebook? &namespace=`startertheme` &topic=`default`]]</span>
                    </a>
                </li>
                <li class="social-share--item social-share--item__twitter">
                    <a id="gtm-share-twitter" rel="noopener" target="_blank" href="http://twitter.com/intent/tweet?text=[[*longtitle:default=`[[*pagetitle]]`]]&amp;url=[[~[[*id]]? &scheme=`full`]]" class="social-share--link" title="[[%site.share.twitter? &namespace=`startertheme` &topic=`default`]]">
                        <span class="social-share--text">[[%site.share.twitter? &namespace=`startertheme` &topic=`default`]]</span>
                    </a>
                </li>
                <li class="social-share--item social-share--item__linkedin">
                    <a id="gtm-share-linkedin" rel="noopener" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=[[~[[*id]]? &scheme=`full`]]&amp;title=[[*longtitle:default=`[[*pagetitle]]`]]&amp;summary=[[*introtext]]&amp;source=[[~[[++site_start]]? &scheme=`full`]]" class="social-share--link lightbox hash" data-lightbox-type="inline" title="[[%site.share.linkedin? &namespace=`startertheme` &topic=`default`]]">
                        <span class="social-share--text">[[%site.share.linkedin? &namespace=`startertheme` &topic=`default`]]</span>
                    </a>
                </li>
                <li class="social-share--item social-share--item__googleplus">
                    <a id="gtm-share-googleplus" rel="noopener" target="_blank" href="https://plus.google.com/share?url=[[~[[*id]]? &scheme=`full`]]" class="social-share--link" data-lightbox-type="inline" title="[[%site.share.googleplus? &namespace=`startertheme` &topic=`default`]]">
                        <span class="social-share--text">[[%site.share.googleplus? &namespace=`startertheme` &topic=`default`]]</span>
                    </a>
                </li>
                <li class="social-share--item social-share--item__pinterest">
                    <a id="gtm-share-pinterest" rel="noopener" target="_blank" href="http://pinterest.com/pin/create/button/?url=[[~[[*id]]? &scheme=`full`]]&amp;media=[[++site_url]][[*mainImage]]" class="social-share--link" data-lightbox-type="inline" title="[[%site.share.pinterest? &namespace=`startertheme` &topic=`default`]]">
                        <span class="social-share--text">[[%site.share.pinterest? &namespace=`startertheme` &topic=`default`]]</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

[[$mailShareForm]]
