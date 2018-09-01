<p class="sisea-results">
    [[+resultInfo]]
</p>

<div class="sisea-results-list">
    <ul class="search-results">
        [[+results]]
    </ul>
</div>
[[+total:greaterthan=`10`:then=`
    <div class="sisea-paging">
        <span class="sisea-result-pages">
            <p>[[%sisea.result_pages]]</p>
        </span>

        [[+paging]]
    </div>
`:else=``]]