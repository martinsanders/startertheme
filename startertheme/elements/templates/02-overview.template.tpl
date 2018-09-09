<!doctype html>
<html lang="[[++cultureKey:default=`nl`]]">
    [[$head]]
    <body>
        [[$googleTagManager]]
        [[$header]]
        [[$breadcrumbs]]
        <section class="main" id="content" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/WebPageElement">
            <div class="wrapper">
                <div class="richtext">
                    <h1 itemprop="headline">[[*longtitle:default=`[[*pagetitle]]`]]</h1>
                    <div itemprop="text">
                        [[*content]]
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-9 order-1 order-md-2">
                        [[!pdoPage?
                            &element=`pdoResources`
                            &parents=`[[*id]]`
                            &limit=`2`
                            &sortby=`menuindex`
                            &sortdir=`asc`
                            &includeTVs=`overviewImage,overviewImageAlt`

                            &tpl=`overviewItem`
                            &tplWrapper=`overviewWrapper`

                            &tplPage=`@INLINE <li class="page-item"><a class="page-link" href="[[+href]]" title="[[+pageNo]]">[[+pageNo]]</a></li>`
                            &tplPageActive=`@INLINE <li class="page-item active"><a class="page-link" href="[[+href]]" title="[[+pageNo]]">[[+pageNo]]</a></li>`
                            &tplPagePrev=`@INLINE <li class="page-item control prev"><a class="page-link" href="[[+href]]">&laquo;</a></li>`
                            &tplPageNext=`@INLINE <li class="page-item control next"><a class="page-link" href="[[+href]]">&raquo;</a></li>`
                            &tplPagePrevEmpty=``
                            &tplPageNextEmpty=``
                            &tplPageWrapper=`@INLINE <div class="pagination"><ul class="pagination--list">[[+prev]][[+pages]][[+next]]</ul></div>`
                        ]]
                    </div>
                    <div class="col-12 col-md-3 order-2 order-md-1">
                        <div class="main-navigation main-navigation__side">
                            <h2>Categorieën</h2>
                            <ul itemscope itemtype="http://schema.org/SiteNavigationElement">
                                <li><a href="#" title="Lorem ipsum 1" itemprop="url"><span itemprop="name">Lorem ipsum 1</span></a></li>
                                <li class="active"><a href="#" title="Lorem ipsum 2" itemprop="url"><span itemprop="name">Lorem ipsum 2</span></a>
                                    <ul>
                                        <li><a href="#" title="Lorem ipsum 1" itemprop="url"><span itemprop="name">Lorem ipsum 2.1</span></a></li>
                                        <li><a href="#" title="Lorem ipsum 2" itemprop="url"><span itemprop="name">Lorem ipsum 2.2</span></a></li>
                                        <li><a href="#" title="Lorem ipsum 3" itemprop="url"><span itemprop="name">Lorem ipsum 2.3</span></a></li>
                                    </ul>
                                </li>
                                <li><a href="#" title="Lorem ipsum 3" itemprop="url"><span itemprop="name">Lorem ipsum 3</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        [[$footer]]
    </body>
</html>
