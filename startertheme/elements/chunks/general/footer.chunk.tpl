
<footer class="footer mt-5" itemscope itemtype="http://schema.org/WPFooter">
    <div class="footer--top">
        <div class="wrapper">
            <div class="row">
                <div class="col-12">
                    <ul class="social-follo-w text-center">
                        [[++facebook:notempty=`
                            <li class="social-follow--item social-follow--item__facebook">
                                <a href="[[++facebook]]" target="_blank" rel="noopener" title="[[%site.follow.facebook? &namespace=`startertheme`&topic=`default`]]" id="gtm-follow-facebook">
                                    <span class="fa-stack fa-2x">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                    </span>                                
                                </a>
                            </li>
                        `]]
                        
                        [[++twitter:notempty=`
                            <li class="social-follow--item social-follow--item__twitter">
                                <a href="[[++twitter]]" target="_blank" rel="noopener" title="[[%site.follow.twitter? &namespace=`startertheme`&topic=`default`]]" id="gtm-follow-twitter">
                                    <span class="fa-stack fa-2x">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                                    </span>   
                                </a>
                            </li>
                        `]]
                        
                        [[++youtube:notempty=`
                            <li class="social-follow--item social-follow--item__youtube">
                                <a href="[[++youtube]]" target="_blank" rel="noopener" title="[[%site.follow.youtube? &namespace=`startertheme`&topic=`default`]]" id="gtm-follow-youtube">
                                    <span class="fa-stack fa-2x">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-youtube fa-stack-1x fa-inverse"></i>
                                    </span>   
                                </a>
                            </li>
                        `]]
                        
                        [[++linkedin:notempty=`
                            <li class="social-follow--item social-follow--item__linkedin">
                                <a href="[[++linkedin]]" target="_blank" rel="noopener" title="[[%site.follow.linkedin? &namespace=`startertheme`&topic=`default`]]" id="gtm-follow-linkedin">
                                    <span class="fa-stack fa-2x">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-linkedin fa-stack-1x fa-inverse"></i>
                                    </span>   
                                </a>
                            </li>
                        `]]
                        
                        [[++instagram:notempty=`
                            <li class="social-follow--item social-follow--item__instagram">
                                <a href="[[++instagram]]" target="_blank" rel="noopener" title="[[%site.follow.instagram? &namespace=`startertheme`&topic=`default`]]" id="gtm-follow-instagram">
                                    <span class="fa-stack fa-2x">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-instagram fa-stack-1x fa-inverse"></i>
                                    </span>   
                                </a>
                            </li>
                        `]]
                        
                        [[++googleplus:notempty=`
                            <li class="social-follow--item social-follow--item__googleplus">
                                <a href="[[++googleplus]]" target="_blank" rel="noopener" title="[[%site.follow.googleplus? &namespace=`startertheme`&topic=`default`]]" id="gtm-follow-googleplus">
                                    <span class="fa-stack fa-2x">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-google-plus-g fa-stack-1x fa-inverse"></i>
                                    </span>   
                                </a>
                            </li>
                        `]]
                        
                        [[++pinterest:notempty=`
                            <li class="social-follow--item social-follow--item__pinterest">
                                <a href="[[++pinterest]]" target="_blank" rel="noopener" title="[[%site.follow.pinterest? &namespace=`startertheme`&topic=`default`]]" id="gtm-follow-pinterest">
                                    <span class="fa-stack fa-2x">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-pinterest-p fa-stack-1x fa-inverse"></i>
                                    </span>   
                                </a>
                            </li>
                        `]]
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer--bottom">
        <div class="wrapper">
            <div class="footer--copyright">
                &copy; <span itemprop="copyrightYear">[[!+year]]</span> <span itemprop="copyrightHolder">[[++site_name]]</span>
            </div>
            <div class="main-navigation main-navigation__footer">
                <ul itemscope itemtype="http://schema.org/SiteNavigationElement">
                    <li><a href="[[++page_sitemap:makeUrl]]" title="Privacy" itemprop="url"><span itemprop="name">Privacy &amp; Cookies</span></a></li>
                    <li><a href="[[++page_disclaimer:makeUrl]]" title="Disclaimer" itemprop="url"><span itemprop="name">Disclaimer</span></a></li>
                    <li><a href="[[++page_privacy:makeUrl]]" title="Sitemap" itemprop="url"><span itemprop="name">Sitemap</span></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

[[++google_maps_api_key:notempty=`<script>var GoogleMapsApiKey = "[[++google_maps_api_key]]";</script>`]]
<script id="inlinejs__preload-polfill">!function(t){ "use strict";var e=t.document,r={ };r.isPreloadSupported=function(){ try{ return e.createElement("link").relList.supports("preload")}catch(t){ return!1}},r.init=function(){ for(var t=e.getElementsByTagName("link"),r=0;r<t.length;r++){ var n=t[r];"preload"===n.rel&&"style"===n.getAttribute("as")&&(loadCSS(n.href,n),n.rel=null)}},window.loadCSS&&!r.isPreloadSupported()&&r.init()}(this);</script>
[[-<script src="[[modxMinify? &group=`js`]]"></script>]]

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="[[++base_url]]startertheme/assets/js/script.js"></script>
