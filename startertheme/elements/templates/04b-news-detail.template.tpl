<!doctype html>
<html lang="[[++cultureKey:default=`nl`]]">
    [[$head]]
    <body>
        [[$googleTagManager]]
        [[$header]]
        [[$breadcrumbs]]
        <section class="main" itemscope itemtype="http://schema.org/NewsArticle">
            <div class="wrapper">
                <div class="inner">
                    <div class="col-12 col-sm-6 m-auto">
                        <div class="tinymce">
                            <h1 itemprop="headline">[[*longtitle:default=`[[*pagetitle]]`]]</h1>
                            <p class="date">
                                [[formatDate? &input=`[[*publishedon]]`]]
                                <meta itemprop="datePublished" content="[[formatDate? &input=`[[*publishedon]]` &options=`%Y-%m-%dT%H:%M:%S%z`]]" />
                                <meta itemprop="dateModified" content="[[formatDate? &input=`[[*editedon]]` &options=`%Y-%m-%dT%H:%M:%S%z`]]" />
                            </p>

                            <div itemprop="articleBody">
                                [[*content]]
                            </div>
    
                            <meta itemprop="author" content="[[*createdby:userinfo=`fullname`]]" />
                            <meta itemprop="publisher" content="[[++site_name]]" />
                        </div>
                    </div>
                </div>
            </div>
        </section>
        [[$footer]]
    </body>
</html>
