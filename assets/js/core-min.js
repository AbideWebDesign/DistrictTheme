function print_screen(){window.print()}jQuery((function($){var t=$("#search-toggle i"),a=$("#search-bar"),e=$("#search-text");$("#nav-top-links a").on("click",(function(o){"search-toggle"==$(this).attr("id")&&(a.is(":visible")?t.removeClass("fa-search-minus").addClass("fa-search"):t.removeClass("fa-search").addClass("fa-search-minus"),a.slideToggle(250,(function(){e.focus()})))})),$("#searchform").submit((function(t){t.preventDefault()}));let o=location.href.replace(/\/$/,"");if(location.hash){const t=o.split("#");$('.nav-tabs a[href="#'+t[1]+'"]').tab("show"),o=location.href.replace(/\/#/,"#"),history.replaceState(null,null,o),setTimeout((()=>{$(window).scrollTop(0)}),400),$("html, body").animate({scrollTop:$("#tabs-block-header").offset().top},600)}$('a[data-toggle="tab"]').on("click",(function(){let t;const a=$(this).attr("href");t="#home"==a?o.split("#")[0]:o.split("#")[0]+a,t+="/",history.replaceState(null,null,t)})),$(".btn-tab").on("click",(function(t){t.preventDefault();var a="#"+$(this).attr("aria-controls")+"-tab";$("html, body").animate({scrollTop:$(a).offset().top},"fast"),$(a).tab("show")}));var n=["csd509j.net","csd509j.us2","https://teachcorvallis.org","https://www.parentsquare.com","corvallis-school-district.local"];$('a[href^="http"]:not(.btn-popup)').on("click",(function(t){var a=$(this).attr("href");void 0===n.find((function(t){var e=new RegExp(t);return null!==a.match(e)}))&&(t.preventDefault(),$("#externalLink").attr("href",$(this).attr("href")),$("#modalNotification").modal("show"))})),$("#department-select").change((function(){location.href=$(this).val()})),$("#course-select").change((function(){location.href=$(this).val()}))})),$(document).ready((function(){var t=$("#full-width-header").height();t%2==0&&$("#header-right").css({height:t+1})}));