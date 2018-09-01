<head>
    [[*id:eq=`[[++site_start]]`:then=`
        <title>[[*longtitle:default=`[[++site_name]]`]]</title>
    `:else=`
        <title>[[*longtitle:default=`[[*pagetitle]]`]] | [[++site_name]]</title>
    `]]
    <meta charset="utf-8">
    [[*description:notempty=`<meta name="description" content="[[*description]]">`]]
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="robots" content="[[+seoTab.robotsTag]]" />
    <meta property="og:title" content="[[*longtitle:default=`[[*pagetitle]]`]] | [[++site_name]]" />
    <meta property="og:description" content="[[*description:default=`[[*introtext]]`]]" />
    <meta property="og:image" content="[[+share.image]]" />
    <meta property="og:type" content="[[*id:eq=`[[++site_start]]`:then=`website`:else=`article`]]" />
    <meta property="og:site_name" content="[[++site_name]]" />
    <meta property="og:url" content="[[~[[*id]]? &scheme=`full`]]" />
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:url" content="[[~[[*id]]? &scheme=`full`]]"/>
    <meta name="twitter:title" content="[[*longtitle:default=`[[*pagetitle]]`]] | [[++site_name]]"/>
    <meta name="twitter:description" content="[[*description:default=`[[*introtext]]`]]"/>
    <meta name="twitter:image" content="[[+share.image]]"/>
    <!-- alleen wanneer de website is aangemeld bij Twitter:
    <meta name="twitter:creator:id" content="[[++twitter_account]]"/>
    -->
    <meta name="msapplication-TileImage" content="[[++site_url]]assets/img/metro-icon-win8.png">
    <meta name="msapplication-TileColor" content="[[++theme_color]]">
    <meta name="theme-color" content="[[++theme_color]]">
    <meta name="msapplication-navbutton-color" content="[[++theme_color]]">
    <link rel="canonical" href="[[~[[*id]]? &scheme=`full`]]">
    <link rel="shortcut icon" type="image/ico" href="/assets/img/favicon.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/assets/img/touch-icon.png">
    <link rel="stylesheet" type="text/css" href="[[modxMinify? &group=`css`]]" />
    <script>!function(e){ "use strict";function t(e,t,n){ e.addEventListener?e.addEventListener(t,n,!1):e.attachEvent&&e.attachEvent("on"+t,n)}function n(t,n){ return e.localStorage&&localStorage[t+"_content"]&&localStorage[t+"_file"]===n}function o(t,o){ if(e.localStorage&&e.XMLHttpRequest)n(t,o)?r(localStorage[t+"_content"]):a(t,o);else{ var i=l.createElement("link");i.href=o,i.id=t,i.rel="stylesheet",i.type="text/css",l.getElementsByTagName("head")[0].appendChild(i),l.cookie=t}}function a(e,t){ var n=new XMLHttpRequest;n.open("GET",t,!0),n.onreadystatechange=function(){ 4===n.readyState&&200===n.status&&(r(n.responseText),localStorage[e+"_content"]=n.responseText,localStorage[e+"_file"]=t)},n.send()}function r(e){ var t=l.createElement("style");t.setAttribute("type","text/css"),l.getElementsByTagName("head")[0].appendChild(t),t.styleSheet?t.styleSheet.cssText=e:t.innerHTML=e}var l=e.document,i=function(e,t,n){ function o(e){ return l.body?e():void setTimeout(function(){ o(e)})}function a(){ i.addEventListener&&i.removeEventListener("load",a),i.media=n||"all"}var r,i=l.createElement("link");if(t)r=t;else{ var s=(l.body||l.getElementsByTagName("head")[0]).childNodes;r=s[s.length-1]}var c=l.styleSheets;i.rel="stylesheet",i.href=e,i.media="only x",o(function(){ r.parentNode.insertBefore(i,t?r:r.nextSibling)});var d=function(e){ for(var t=i.href,n=c.length;n--;)if(c[n].href===t)return e();setTimeout(function(){ d(e)})};return i.addEventListener&&i.addEventListener("load",a),i.onloadcssdefined=d,d(a),i};"undefined"!=typeof exports?exports.loadCSS=i:e.loadCSS=i,e.loadLocalStorageCSS=function(a,r){ n(a,r)||l.cookie.indexOf(a)>-1?o(a,r):t(e,"load",function(){ o(a,r)})}}(this);</script>
    <script id="loadcss__webfonts">loadLocalStorageCSS("webfonts", "https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700");</script>
    [[$googleTagManagerHead]]
</head>
