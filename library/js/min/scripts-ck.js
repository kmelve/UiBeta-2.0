function callPlayer(e,t,n){window.jQuery&&e instanceof jQuery&&(e=e.get(0).id);var a=document.getElementById(e);a&&"IFRAME"!=a.tagName.toUpperCase()&&(a=a.getElementsByTagName("iframe")[0]),a&&a.contentWindow.postMessage(JSON.stringify({event:"command",func:t,args:n||[],id:e}),"*")}try{spanner(document.getElementsByClassName("logo"))}catch(e){console.warn(e)}window.getComputedStyle||(window.getComputedStyle=function(e,t){return this.el=e,this.getPropertyValue=function(t){var n=/(\-([a-z]){1})/g;return"float"==t&&(t="styleFloat"),n.test(t)&&(t=t.replace(n,function(){return arguments[2].toUpperCase()})),e.currentStyle[t]?e.currentStyle[t]:null},this}),"yes"==$.cookie("dyslexic")&&($("body, a, label, h1, h2, h3").addClass("dyslexic"),$("#dysleksi").removeClass("disabled")),$("#dysleksi").on("click",function(){"undefined"==$.cookie("dyslexic")||"no"==$.cookie("dyslexic")?($.cookie("dyslexic","yes",{expires:365,path:"/"}),$("body, a, label, h1, h2, h3").addClass("dyslexic"),$("#dysleksi").removeClass("disabled")):($.cookie("dyslexic","no",{expires:365,path:"/"}),$("body, a, label, h1, h2, h3").removeClass("dyslexic"),$("#dysleksi").addClass("disabled"))}),$.bigfoot(),$("#comment").wordcounter({limit:400,message:'Du hadde mykje på hjartet. Kanskje dette kunne blitt eit innlegg? Send oss gjerne ein <a href="#" onclick="location.href=&quot;mailto:knut.melvar@ahkr.uib.no?subject=Forslag%20til%20UiBeta&body=&quot;+document.getElementById(&quot;comment&quot;).value;" value="Send">epost</a>.'}),jQuery(document).ready(function($){var e=$(window).width();e>=768&&$(".comment img[data-gravatar]").each(function(){$(this).attr("src",$(this).attr("data-gravatar"))})}),function(e){function t(){i.setAttribute("content",l),d=!0}function n(){i.setAttribute("content",r),d=!1}function a(a){y=a.accelerationIncludingGravity,c=Math.abs(y.x),u=Math.abs(y.y),m=Math.abs(y.z),!e.orientation&&(c>7||(m>6&&8>u||8>m&&u>6)&&c>5)?d&&n():d||t()}if(/iPhone|iPad|iPod/.test(navigator.platform)&&navigator.userAgent.indexOf("AppleWebKit")>-1){var o=e.document;if(o.querySelector){var i=o.querySelector("meta[name=viewport]"),s=i&&i.getAttribute("content"),r=s+",maximum-scale=1",l=s+",maximum-scale=10",d=!0,c,u,m,y;i&&(e.addEventListener("orientationchange",t,!1),e.addEventListener("devicemotion",a,!1))}}}(this),function(e){e(document).foundation()}(jQuery);