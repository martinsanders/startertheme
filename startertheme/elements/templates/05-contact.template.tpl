<!doctype html>
<html lang="[[++cultureKey:default=`nl`]]">
    [[$head]]
    <body>
        [[$googleTagManager]]
        [[$header]]
        [[$breadcrumbs]]
        <section class="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/WebPageElement">
            <div class="wrapper">
                <div class="row">
                    <div class="col-12 col-sm-6 m-auto">
                        <div class="richtext">
                            <h1 itemprop="headline">[[*longtitle:default=`[[*pagetitle]]`]]</h1>
                            <div itemprop="text">
                                [[*content]]
                            </div>
                            <p><a href="#contactform" class="btn" title="Contact formulier">Contact formulier</a></p>
                            <div class="address" itemscope itemtype="http://schema.org/LocalBusiness">
                                <h2><span itemprop="name">[[++site_name]]</span></h2>
                                <p itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                                    <span itemprop="streetAddress">[[++street]] [[++housenumber]]</span><br />
                                    <span itemprop="postalCode">[[++zipcode]]</span><br />
                                    <span itemprop="addressLocality">[[++city]]</span>
                                </p>
                                <p><strong>Tel</strong>: <span itemprop="telephone">[[++phone]]</span><br />
                                <strong>E-mail</strong>: <span itemprop="email">[[++email_client]]</span></p>
                                <span itemprop="geo" itemscope="" itemtype="http://schema.org/GeoCoordinates">
                                    <meta itemprop="latitude" content="53.183917" />
                                    <meta itemprop="longitude" content="6.168483" />
                                </span>
                                <p><a href="https://www.google.com/maps?f=d&amp;daddr=[[++street]]+[[++housenumber]],[[+city]]" class="btn" title="[[%site.plan_route? &namespace=`startertheme` &topic=`default`]]" target="_blank" rel="noopener">[[%site.plan_route? &namespace=`startertheme` &topic=`default`]]</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="maps--wrapper">
                <div class="map">
                    <span data-api-key="[[++site.googlemaps.api_key]]"></span>
                    <div class="marker" data-lat="53.175540" data-lng="6.183115" data-icon="/assets/img/map/marker.png">
                        <p><strong>[[++site_name]]</strong><br />[[++street]] [[++housenumber]]<br />[[++zipcode]] [[++city]]</p>
                    </div>
                </div>
            </div>
            <div class="wrapper">
                <div class="row">
                    [[$contactForm]]
                </div>
            </div>
        </section>
        [[$footer]]
    </body>
</html>
