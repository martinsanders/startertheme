<header itemscope itemtype="http://schema.org/WPHeader">
            <div class="main-navigation-wrapper" style="background-image: url([[++header-image]]);"> 
                <div class="container">
                    <div class="row">       
                        <div class="col-12">
                            <nav itemscope itemtype="http://schema.org/SiteNavigationElement">
                                [[pdoMenu?
                                    &parents=`0`
                                    &outerClass=`nav nav-pills nav-justified`
                                    &hereClass=`active`
                                    &sortby=`menuindex`
                                    &rowClass=`nav-item`
                                    &sortdir=`asc`
                                    &limit=`0`
                                    &level=`2`
                                    &hideSubMenus=`0`
                                    &checkPermissions=`load`
                                    &fastMode=`1`
                                    &tpl=`@INLINE <li[[+classes]]><a href="[[+link]]" title="[[+menutitle]]" [[+attributes]] itemprop="url" class="nav-link"><span itemprop="name">[[+menutitle]]</span></a></li>`
                                    &tplParentRow=`@INLINE <li class="[[+classnames]] has-subnav"><a href="[[+link]]" title="[[+menutitle]]" [[+attributes]] itemprop="url"><span itemprop="name">[[+menutitle]]</span></a>[[+wrapper]]</li>`
                                ]]
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
</header>
<button role="button" id="btn-top" onclick="topFunction()" class="btn-top" title="[[%site.to_top? &namespace=`startertheme`&topic=`default`]]"><i class="fas fa-arrow-up"></i></button>
<div class="side-buttons">
    <a href="tel:[[++phone:formatPhone=`whatsapp`]]" class="phone" title="[[%site.call_us? &namespace=`startertheme` &topic=`default`]]"><i class="fas fa-phone"></i></a>
    <a href="mailto:[[++email_client]]" class="email" title="[[%site.mail_us? &namespace=`startertheme` &topic=`default`]]"><i class="far fa-envelope"></i></a>
</div>