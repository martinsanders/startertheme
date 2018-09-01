<div class="overview--item">
    <a href="[[+id:makeUrl]]" title="[[+longtitle:default=`[[+pagetitle]]`]]">
        <div class="row">
            <div class="col-12 col-md-4 [[+idx:mod:isequalto=`1`:then=``:else=`order-1 order-md-2`]]">
                [[+tv.overviewImage:notempty=`<div class="overview--image">
                    <img src="[[+tv.overviewImage:phpthumbof=`w=265&h=162&zc=1`]]" srcset="[[+tv.overviewImage:phpthumbof=`w=768&h=480&zc=1`]] 768w, [[+tv.overviewImage:phpthumbof=`w=1536&h=960&zc=1`]] 1536w, [[+tv.overviewImage:phpthumbof=`w=265&h=162&zc=1`]] 265w, [[+tv.overviewImage:phpthumbof=`w=530&h=324&zc=1`]] 530w" sizes="(max-width: 767px) 768px, 265px" alt="[[+tv.overviewImageAlt]]" title="[[[+tv.overviewImageAlt]]" class="img-fluid" />
                </div>`]]
            </div>
            <div class="col-12 col-md-8 [[+idx:mod:isequalto=`1`:then=``:else=`order-2 order-md-1`]]">
                <div class="overview--content">
                    <h2 itemprop="name">[[+longtitle:default=`[[+pagetitle]]`]]</h2>
                    [[+introtext:notempty=`<p class="overview--description" itemprop="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi vitae accusamus neque itaque quam perspiciatis eveniet nam numquam <span class="overview--more">[[%site.readmore? &namespace=`startertheme` &topic=`default`]]</span></p>`]]
                </div>
            </div>
        </div>
    </a>
</div>