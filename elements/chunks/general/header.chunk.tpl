<button role="button" class="btn-top" title="[[%site.to_top? &namespace=`startertheme`&topic=`default`]]">[[%site.to_top? &namespace=`startertheme`&topic=`default`]]</button>
<div class="side-buttons">
    <a href="tel:[[++phone:formatPhone=`whatsapp`]]" class="phone" title="[[%site.call_us? &namespace=`startertheme` &topic=`default`]]">[[%site.call_us? &namespace=`startertheme` &topic=`default`]]</a>
    <a href="mailto:[[++email_client]]" class="email" title="[[%site.mail_us? &namespace=`startertheme` &topic=`default`]]">[[%site.mail_us? &namespace=`startertheme` &topic=`default`]]</a>
</div>

<header class="header navigation navigation__slide-down" itemscope itemtype="http://schema.org/WPHeader">
    <div class="header--search">
        <div class="wrapper">
            <form action="[[++page_search:makeUrl]]" class="search-form" method="GET" data-alert="[[%site.form.search.empty? &namespace=`startertheme` &topic=`default`]]">
                <input type="text" class="search-form-input form-control" name="search" placeholder="[[%site.form.search.placeholder? &namespace=`startertheme` &topic=`default`]]" onfocus="this.placeholder=''" onblur="this.placeholder='[[%site.form.search.placeholder? &namespace=`startertheme` &topic=`default`]]'">
                <button type="submit" class="search-form-button" value="[[%site.form.search.submit? &namespace=`startertheme` &topic=`default`]]">[[%site.form.search.submit? &namespace=`startertheme` &topic=`default`]]</button>
            </form>
        </div>
    </div>
    <div class="header--content">
        <div class="wrapper">
            <div class="nav-toggle">
                <div class="nav-toggle--icon">
                    <div class="one"></div>
                    <div class="two"></div>
                    <div class="three"></div>
                </div>
                <div class="nav-toggle--title">
                    <span class="open">[[%site.menu? &namespace=`startertheme` &topic=`default`]]</span>
                    <span class="close">[[%site.close? &namespace=`startertheme` &topic=`default`]]</span>
                </div>
            </div>
            <a href="/" title="[[++site_name]]" class="logo">
                <img src="/assets/img/logo-prototype.gif" title="[[++site_name]]" alt="[[++site_name]]" />
            </a>
            <button role="button" class="search-toggle" title="[[%site.search? &namespace=`startertheme` &topic=`default`]]">[[%site.search? &namespace=`startertheme` &topic=`default`]]</button>
            <nav class="main-navigation main-navigation__header" itemscope itemtype="http://schema.org/SiteNavigationElement">
                [[pdoMenu?
                    &parents=`0`
                    &outerClass=`nav`
                    &sortby=`menuindex`
                    &sortdir=`asc`
                    &limit=`0`
                    &level=`2`
                    &hideSubMenus=`0`
                    &checkPermissions=`load`
                    &fastMode=`1`
                    &tpl=`@INLINE <li[[+classes]]><a href="[[+link]]" title="[[+menutitle]]" [[+attributes]] itemprop="url"><span itemprop="name">[[+menutitle]]</span></a></li>`
                    &tplParentRow=`@INLINE <li class="[[+classnames]] has-subnav"><a href="[[+link]]" title="[[+menutitle]]" [[+attributes]] itemprop="url"><span itemprop="name">[[+menutitle]]</span></a><button role="button" class="toggle-subnav"></button>[[+wrapper]]</li>`
                ]]
            </nav>
        </div>
    </div>
</header>
