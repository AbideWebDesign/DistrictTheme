function print_screen(){window.print()}jQuery((function($){var t=$("#search-toggle i"),e=$("#search-bar"),a=$("#search-text");$("#nav-top-links a").on("click",(function(o){"search-toggle"==$(this).attr("id")&&(e.is(":visible")?t.removeClass("fa-search-minus").addClass("fa-search"):t.removeClass("fa-search").addClass("fa-search-minus"),e.slideToggle(250,(function(){a.focus()})))})),$("#searchform").submit((function(t){t.preventDefault()}));let o=location.href.replace(/\/$/,"");if(location.hash){const t=o.split("#");$(".nav-tabs").size()?(console.log("made it"),$('.nav-tabs a[href="#'+t[1]+'"]').tab("show"),o=location.href.replace(/\/#/,"#"),history.replaceState(null,null,o),setTimeout((()=>{$(window).scrollTop(0)}),400),$("html, body").animate({scrollTop:$("#tabs-block-header").offset().top},600)):l(o)}$('a[data-toggle="tab"]').on("click",(function(){let t;const e=$(this).attr("href");t="#home"==e?o.split("#")[0]:o.split("#")[0]+e,t+="/",history.replaceState(null,null,t)})),$(".btn-tab").on("click",(function(t){t.preventDefault();var e="#"+$(this).attr("aria-controls")+"-tab";$("html, body").animate({scrollTop:$(e).offset().top},"fast"),$(e).tab("show")}));var n=["csd509j.net","csd509j.us2","https://teachcorvallis.org","https://www.parentsquare.com","corvallis-school-district.local"];function l(t){var e=t.split("#")[1];e&&$("#"+e).length&&$("html").animate({scrollTop:$("#"+e).offset().top-120},500)}$('a[href^="http"]:not(.btn-popup)').on("click",(function(t){var e=$(this).attr("href");void 0===n.find((function(t){var a=new RegExp(t);return null!==e.match(a)}))&&(t.preventDefault(),$("#externalLink").attr("href",$(this).attr("href")),$("#modalNotification").modal("show"))})),$("#department-select").change((function(){location.href=$(this).val()})),$("#course-select").change((function(){location.href=$(this).val()})),$(".anchor").click((function(t){t.preventDefault(),l(t.target.href)}))})),$(document).ready((function(){var t=$("#full-width-header").height();t%2==0&&$("#header-right").css({height:t+1})}));