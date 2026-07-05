jQuery('.TheBanner').owlCarousel({
    loop:true,
    nav:true,
    items:1,
    autoplay:true,
    autoplaySpeed:9500,
// autoplayTimeout:9500,
    dots:false,
    animateOut: 'fadeOut',
    animateInClass:'fadeOut',
})

jQuery('.FeaturedItems').owlCarousel({
    loop:true,
    nav:false,
    items:1,
    autoplay:true,
    autoplayHoverPause: true,
    dots:true,
    autoplaySpeed:6000,
})
jQuery(document).ready(function() {
  jQuery('.FeaturedClients').owlCarousel({
    loop: true,
    margin: 20,
    dots:true,
   autoplaySpeed:3000,
   autoplay:true,
    responsiveClass: true,
    responsive: {
      0: {
        items: 2,
        nav: false
      },
      500: {
        items: 3,
        nav: false
      },
      1000: {
        items: 5,
        nav: false,
        margin: 20
      }
    }
  })
})

// CREEP
!function(a){a.extend(a.fn,{creep:function(c){return c=a.extend({},a.fn.creep.options,c),this.each(function(){var d=a(this);d.click(function(a){var e=d.attr("href"),f=e.replace("#","");return e.match("#")&&"#"!==e&&!e.match("http")?(a.preventDefault(),b(f,c),!1):void 0})})},creepTo:function(c){return c=a.extend({},a.fn.creep.options,c),this.each(function(){var d=a(this);d.click(function(a){var e=d.attr("href"),f=e.replace("#","");return e.match("#")&&"#"!==e&&!e.match("http")?(a.preventDefault(),b(f,c),!1):void 0})})}});var b=function(b,c){var d=a("a[name='"+b+"']");"undefined"==typeof d.offset()&&(d=a("#"+b)),"undefined"!=typeof d.offset()&&(a("html, body").animate({scrollTop:d.offset().top+c.offset},c.speed),history.pushState&&history.pushState(null,null,"#"+b))};a.fn.creep.options={offset:0,speed:1e3}}(jQuery,window,document);

// SCROLL REVEAL
!function(){"use strict";function e(n){return"undefined"==typeof this||Object.getPrototypeOf(this)!==e.prototype?new e(n):(O=this,O.version="3.3.2",O.tools=new E,O.isSupported()?(O.tools.extend(O.defaults,n||{}),O.defaults.container=t(O.defaults),O.store={elements:{},containers:[]},O.sequences={},O.history=[],O.uid=0,O.initialized=!1):"undefined"!=typeof console&&null!==console,O)}function t(e){if(e&&e.container){if("string"==typeof e.container)return window.document.documentElement.querySelector(e.container);if(O.tools.isNode(e.container))return e.container}return O.defaults.container}function n(e,t){return"string"==typeof e?Array.prototype.slice.call(t.querySelectorAll(e)):O.tools.isNode(e)?[e]:O.tools.isNodeList(e)?Array.prototype.slice.call(e):[]}function i(){return++O.uid}function o(e,t,n){t.container&&(t.container=n),e.config?e.config=O.tools.extendClone(e.config,t):e.config=O.tools.extendClone(O.defaults,t),"top"===e.config.origin||"bottom"===e.config.origin?e.config.axis="Y":e.config.axis="X"}function r(e){var t=window.getComputedStyle(e.domEl);e.styles||(e.styles={transition:{},transform:{},computed:{}},e.styles.inline=e.domEl.getAttribute("style")||"",e.styles.inline+="; visibility: visible; ",e.styles.computed.opacity=t.opacity,t.transition&&"all 0s ease 0s"!==t.transition?e.styles.computed.transition=t.transition+", ":e.styles.computed.transition=""),e.styles.transition.instant=s(e,0),e.styles.transition.delayed=s(e,e.config.delay),e.styles.transform.initial=" -webkit-transform:",e.styles.transform.target=" -webkit-transform:",a(e),e.styles.transform.initial+="transform:",e.styles.transform.target+="transform:",a(e)}function s(e,t){var n=e.config;return"-webkit-transition: "+e.styles.computed.transition+"-webkit-transform "+n.duration/1e3+"s "+n.easing+" "+t/1e3+"s, opacity "+n.duration/1e3+"s "+n.easing+" "+t/1e3+"s; transition: "+e.styles.computed.transition+"transform "+n.duration/1e3+"s "+n.easing+" "+t/1e3+"s, opacity "+n.duration/1e3+"s "+n.easing+" "+t/1e3+"s; "}function a(e){var t,n=e.config,i=e.styles.transform;t="top"===n.origin||"left"===n.origin?/^-/.test(n.distance)?n.distance.substr(1):"-"+n.distance:n.distance,parseInt(n.distance)&&(i.initial+=" translate"+n.axis+"("+t+")",i.target+=" translate"+n.axis+"(0)"),n.scale&&(i.initial+=" scale("+n.scale+")",i.target+=" scale(1)"),n.rotate.x&&(i.initial+=" rotateX("+n.rotate.x+"deg)",i.target+=" rotateX(0)"),n.rotate.y&&(i.initial+=" rotateY("+n.rotate.y+"deg)",i.target+=" rotateY(0)"),n.rotate.z&&(i.initial+=" rotateZ("+n.rotate.z+"deg)",i.target+=" rotateZ(0)"),i.initial+="; opacity: "+n.opacity+";",i.target+="; opacity: "+e.styles.computed.opacity+";"}function l(e){var t=e.config.container;t&&O.store.containers.indexOf(t)===-1&&O.store.containers.push(e.config.container),O.store.elements[e.id]=e}function c(e,t,n){var i={target:e,config:t,interval:n};O.history.push(i)}function f(){if(O.isSupported()){y();for(var e=0;e<O.store.containers.length;e++)O.store.containers[e].addEventListener("scroll",d),O.store.containers[e].addEventListener("resize",d);O.initialized||(window.addEventListener("scroll",d),window.addEventListener("resize",d),O.initialized=!0)}return O}function d(){T(y)}function u(){var e,t,n,i;O.tools.forOwn(O.sequences,function(o){i=O.sequences[o],e=!1;for(var r=0;r<i.elemIds.length;r++)n=i.elemIds[r],t=O.store.elements[n],q(t)&&!e&&(e=!0);i.active=e})}function y(){var e,t;u(),O.tools.forOwn(O.store.elements,function(n){t=O.store.elements[n],e=w(t),g(t)?(t.config.beforeReveal(t.domEl),e?t.domEl.setAttribute("style",t.styles.inline+t.styles.transform.target+t.styles.transition.delayed):t.domEl.setAttribute("style",t.styles.inline+t.styles.transform.target+t.styles.transition.instant),p("reveal",t,e),t.revealing=!0,t.seen=!0,t.sequence&&m(t,e)):v(t)&&(t.config.beforeReset(t.domEl),t.domEl.setAttribute("style",t.styles.inline+t.styles.transform.initial+t.styles.transition.instant),p("reset",t),t.revealing=!1)})}function m(e,t){var n=0,i=0,o=O.sequences[e.sequence.id];o.blocked=!0,t&&"onload"===e.config.useDelay&&(i=e.config.delay),e.sequence.timer&&(n=Math.abs(e.sequence.timer.started-new Date),window.clearTimeout(e.sequence.timer)),e.sequence.timer={started:new Date},e.sequence.timer.clock=window.setTimeout(function(){o.blocked=!1,e.sequence.timer=null,d()},Math.abs(o.interval)+i-n)}function p(e,t,n){var i=0,o=0,r="after";switch(e){case"reveal":o=t.config.duration,n&&(o+=t.config.delay),r+="Reveal";break;case"reset":o=t.config.duration,r+="Reset"}t.timer&&(i=Math.abs(t.timer.started-new Date),window.clearTimeout(t.timer.clock)),t.timer={started:new Date},t.timer.clock=window.setTimeout(function(){t.config[r](t.domEl),t.timer=null},o-i)}function g(e){if(e.sequence){var t=O.sequences[e.sequence.id];return t.active&&!t.blocked&&!e.revealing&&!e.disabled}return q(e)&&!e.revealing&&!e.disabled}function w(e){var t=e.config.useDelay;return"always"===t||"onload"===t&&!O.initialized||"once"===t&&!e.seen}function v(e){if(e.sequence){var t=O.sequences[e.sequence.id];return!t.active&&e.config.reset&&e.revealing&&!e.disabled}return!q(e)&&e.config.reset&&e.revealing&&!e.disabled}function b(e){return{width:e.clientWidth,height:e.clientHeight}}function h(e){if(e&&e!==window.document.documentElement){var t=x(e);return{x:e.scrollLeft+t.left,y:e.scrollTop+t.top}}return{x:window.pageXOffset,y:window.pageYOffset}}function x(e){var t=0,n=0,i=e.offsetHeight,o=e.offsetWidth;do isNaN(e.offsetTop)||(t+=e.offsetTop),isNaN(e.offsetLeft)||(n+=e.offsetLeft),e=e.offsetParent;while(e);return{top:t,left:n,height:i,width:o}}function q(e){function t(){var t=c+a*s,n=f+l*s,i=d-a*s,y=u-l*s,m=r.y+e.config.viewOffset.top,p=r.x+e.config.viewOffset.left,g=r.y-e.config.viewOffset.bottom+o.height,w=r.x-e.config.viewOffset.right+o.width;return t<g&&i>m&&n>p&&y<w}function n(){return"fixed"===window.getComputedStyle(e.domEl).position}var i=x(e.domEl),o=b(e.config.container),r=h(e.config.container),s=e.config.viewFactor,a=i.height,l=i.width,c=i.top,f=i.left,d=c+a,u=f+l;return t()||n()}function E(){}var O,T;e.prototype.defaults={origin:"bottom",distance:"20px",duration:500,delay:0,rotate:{x:0,y:0,z:0},opacity:0,scale:.9,easing:"cubic-bezier(0.6, 0.2, 0.1, 1)",container:window.document.documentElement,mobile:!0,reset:!1,useDelay:"always",viewFactor:.2,viewOffset:{top:0,right:0,bottom:0,left:0},beforeReveal:function(e){},beforeReset:function(e){},afterReveal:function(e){},afterReset:function(e){}},e.prototype.isSupported=function(){var e=document.documentElement.style;return"WebkitTransition"in e&&"WebkitTransform"in e||"transition"in e&&"transform"in e},e.prototype.reveal=function(e,s,a,d){var u,y,m,p,g,w;if(void 0!==s&&"number"==typeof s?(a=s,s={}):void 0!==s&&null!==s||(s={}),u=t(s),y=n(e,u),!y.length)return O;a&&"number"==typeof a&&(w=i(),g=O.sequences[w]={id:w,interval:a,elemIds:[],active:!1});for(var v=0;v<y.length;v++)p=y[v].getAttribute("data-sr-id"),p?m=O.store.elements[p]:(m={id:i(),domEl:y[v],seen:!1,revealing:!1},m.domEl.setAttribute("data-sr-id",m.id)),g&&(m.sequence={id:g.id,index:g.elemIds.length},g.elemIds.push(m.id)),o(m,s,u),r(m),l(m),O.tools.isMobile()&&!m.config.mobile||!O.isSupported()?(m.domEl.setAttribute("style",m.styles.inline),m.disabled=!0):m.revealing||m.domEl.setAttribute("style",m.styles.inline+m.styles.transform.initial);return!d&&O.isSupported()&&(c(e,s,a),O.initTimeout&&window.clearTimeout(O.initTimeout),O.initTimeout=window.setTimeout(f,0)),O},e.prototype.sync=function(){if(O.history.length&&O.isSupported()){for(var e=0;e<O.history.length;e++){var t=O.history[e];O.reveal(t.target,t.config,t.interval,!0)}f()}return O},E.prototype.isObject=function(e){return null!==e&&"object"==typeof e&&e.constructor===Object},E.prototype.isNode=function(e){return"object"==typeof window.Node?e instanceof window.Node:e&&"object"==typeof e&&"number"==typeof e.nodeType&&"string"==typeof e.nodeName},E.prototype.isNodeList=function(e){var t=Object.prototype.toString.call(e),n=/^\[object (HTMLCollection|NodeList|Object)\]$/;return"object"==typeof window.NodeList?e instanceof window.NodeList:e&&"object"==typeof e&&n.test(t)&&"number"==typeof e.length&&(0===e.length||this.isNode(e[0]))},E.prototype.forOwn=function(e,t){if(!this.isObject(e))throw new TypeError('Expected "object", but received "'+typeof e+'".');for(var n in e)e.hasOwnProperty(n)&&t(n)},E.prototype.extend=function(e,t){return this.forOwn(t,function(n){this.isObject(t[n])?(e[n]&&this.isObject(e[n])||(e[n]={}),this.extend(e[n],t[n])):e[n]=t[n]}.bind(this)),e},E.prototype.extendClone=function(e,t){return this.extend(this.extend({},e),t)},E.prototype.isMobile=function(){return/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)},T=window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||function(e){window.setTimeout(e,1e3/60)},"function"==typeof define&&"object"==typeof define.amd&&define.amd?define(function(){return e}):"undefined"!=typeof module&&module.exports?module.exports=e:window.ScrollReveal=e}();
// EMBED
!function(a,b){"use strict";function c(){if(!e){e=!0;var a,c,d,f,g=-1!==navigator.appVersion.indexOf("MSIE 10"),h=!!navigator.userAgent.match(/Trident.*rv:11\./),i=b.querySelectorAll("iframe.wp-embedded-content");for(c=0;c<i.length;c++)if(d=i[c],!d.getAttribute("data-secret")){if(f=Math.random().toString(36).substr(2,10),d.src+="#?secret="+f,d.setAttribute("data-secret",f),g||h)a=d.cloneNode(!0),a.removeAttribute("security"),d.parentNode.replaceChild(a,d)}else;}}var d=!1,e=!1;if(b.querySelector)if(a.addEventListener)d=!0;if(a.wp=a.wp||{},!a.wp.receiveEmbedMessage)if(a.wp.receiveEmbedMessage=function(c){var d=c.data;if(d.secret||d.message||d.value)if(!/[^a-zA-Z0-9]/.test(d.secret)){var e,f,g,h,i,j=b.querySelectorAll('iframe[data-secret="'+d.secret+'"]'),k=b.querySelectorAll('blockquote[data-secret="'+d.secret+'"]');for(e=0;e<k.length;e++)k[e].style.display="none";for(e=0;e<j.length;e++)if(f=j[e],c.source===f.contentWindow){if(f.removeAttribute("style"),"height"===d.message){if(g=parseInt(d.value,10),g>1e3)g=1e3;else if(~~g<200)g=200;f.height=g}if("link"===d.message)if(h=b.createElement("a"),i=b.createElement("a"),h.href=f.getAttribute("src"),i.href=d.value,i.host===h.host)if(b.activeElement===f)a.top.location.href=d.value}else;}},d)a.addEventListener("message",a.wp.receiveEmbedMessage,!1),b.addEventListener("DOMContentLoaded",c,!1),a.addEventListener("load",c,!1)}(window,document);

jQuery(document).ready(function(){
jQuery("a").creep();
});


       jQuery(document).ready(function() {
       jQuery('.headroom').each(function () {
         var $win = jQuery(window)
           , $self = jQuery(this)

           , isHidden = false
           , lastScrollTop = 0

         $win.on('scroll', function () {
           var scrollTop = $win.scrollTop()
           var offset = scrollTop - lastScrollTop
           lastScrollTop = scrollTop

           // min-offset, min-scroll-top
           if (offset > 10 && scrollTop > 30 ) {
             if (!isHidden) {
               $self.addClass('headroom-hidden')
               isHidden = true
             }
           } else if (offset < -10 || scrollTop < 30) {
             if (isHidden) {
               $self.removeClass('headroom-hidden')
               isHidden = false
             }
           }
         })
       })
     })



  //this is where we apply opacity to the arrow
  jQuery(window).scroll( function(){

    //get scroll position
    var topWindow = jQuery(window).scrollTop();
    //multiply by 1.5 so the arrow will become transparent half-way up the page
    var topWindow = topWindow * 2.5;

    //get height of window
    var windowHeight = jQuery(window).height();

    //set position as percentage of how far the user has scrolled
    var position = topWindow / windowHeight;
    //invert the percentage
    position = 1 - position;

    //define arrow opacity as based on how far up the page the user has scrolled
    //no scrolling = 1, half-way up the page = 0
    jQuery('.scroll-down').css('opacity', position);

  });

  /*! bigSlide - v0.12.0 - 2016-08-01
  * http://ascott1.github.io/bigSlide.js/
  * Copyright (c) 2016 Adam D. Scott; Licensed MIT */
  !function(a){"use strict";"function"==typeof define&&define.amd?define(["jquery"],a):"object"==typeof exports?module.exports=a(require("jquery")):a(jQuery)}(function(a){"use strict";function b(a,b){for(var c,d=a.split(";"),e=b.split(" "),f="",g=0,h=d.length;h>g;g++){c=!0;for(var i=0,j=e.length;j>i;i++)(""===d[g]||-1!==d[g].indexOf(e[i]))&&(c=!1);c&&(f+=d[g]+"; ")}return f}a.fn.bigSlide=function(c){var d=this,e=a.extend({menu:"#menu",push:".push",shrink:".shrink",hiddenThin:".hiddenThin",side:"left",menuWidth:"15.625em",semiOpenMenuWidth:"4em",speed:"300",state:"closed",activeBtn:"active",easyClose:!1,saveState:!1,semiOpenStatus:!1,semiOpenScreenWidth:480,beforeOpen:function(){},afterOpen:function(){},beforeClose:function(){},afterClose:function(){}},c),f="transition -o-transition -ms-transition -moz-transitions webkit-transition "+e.side,g={menuCSSDictionary:f+" position top bottom height width",pushCSSDictionary:f,state:e.state},h={init:function(){i.init()},_destroy:function(){return i._destroy(),delete d.bigSlideAPI,d},changeState:function(){"closed"===g.state?g.state="open":g.state="closed"},setState:function(a){g.state=a},getState:function(){return g.state}},i={init:function(){this.$menu=a(e.menu),this.$push=a(e.push),this.$shrink=a(e.shrink),this.$hiddenThin=a(e.hiddenThin),this.width=e.menuWidth,this.semiOpenMenuWidth=e.semiOpenMenuWidth;var b={position:"fixed",top:"0",bottom:"0",height:"100%"},c={"-webkit-transition":e.side+" "+e.speed+"ms ease","-moz-transition":e.side+" "+e.speed+"ms ease","-ms-transition":e.side+" "+e.speed+"ms ease","-o-transition":e.side+" "+e.speed+"ms ease",transition:e.side+" "+e.speed+"ms ease"},f={"-webkit-transition":"all "+e.speed+"ms ease","-moz-transition":"all "+e.speed+"ms ease","-ms-transition":"all "+e.speed+"ms ease","-o-transition":"all "+e.speed+"ms ease",transition:"all "+e.speed+"ms ease"},g=!1;b[e.side]="-"+e.menuWidth,b.width=e.menuWidth;var j="closed";e.saveState?(j=localStorage.getItem("bigSlide-savedState"),j||(j=e.state)):j=e.state,h.setState(j),this.$menu.css(b);var k=a(window).width();"closed"===j?e.semiOpenStatus&&k>e.semiOpenScreenWidth?(this.$hiddenThin.hide(),this.$menu.css(e.side,"0"),this.$menu.css("width",this.semiOpenMenuWidth),this.$push.css(e.side,this.semiOpenMenuWidth),this.$shrink.css({width:"calc(100% - "+this.semiOpenMenuWidth+")"}),this.$menu.addClass("semiOpen")):this.$push.css(e.side,"0"):"open"===j&&(this.$menu.css(e.side,"0"),this.$push.css(e.side,this.width),this.$shrink.css({width:"calc(100% - "+this.width+")"}),d.addClass(e.activeBtn));var l=this;d.on("click.bigSlide touchstart.bigSlide",function(a){g||(l.$menu.css(c),l.$push.css(c),l.$shrink.css(f),g=!0),a.preventDefault(),"open"===h.getState()?i.toggleClose():i.toggleOpen()}),e.semiOpenStatus&&a(window).resize(function(){var b=a(window).width();b>e.semiOpenScreenWidth?"closed"===h.getState()&&(l.$hiddenThin.hide(),l.$menu.css({width:l.semiOpenMenuWidth}),l.$menu.css(e.side,"0"),l.$push.css(e.side,l.semiOpenMenuWidth),l.$shrink.css({width:"calc(100% - "+l.semiOpenMenuWidth+")"}),l.$menu.addClass("semiOpen")):(l.$menu.removeClass("semiOpen"),"closed"===h.getState()&&(l.$menu.css(e.side,"-"+l.width).css({width:l.width}),l.$push.css(e.side,"0"),l.$shrink.css("width","100%"),l.$hiddenThin.show()))}),e.easyClose&&a(document).on("click.bigSlide",function(b){a(b.target).parents().addBack().is(d)||a(b.target).closest(e.menu).length||"open"!==h.getState()||i.toggleClose()})},_destroy:function(){this.$menu.each(function(){var c=a(this);c.attr("style",b(c.attr("style"),g.menuCSSDictionary).trim())}),this.$push.each(function(){var c=a(this);c.attr("style",b(c.attr("style"),g.pushCSSDictionary).trim())}),this.$shrink.each(function(){var c=a(this);c.attr("style",b(c.attr("style"),g.pushCSSDictionary).trim())}),d.removeClass(e.activeBtn).off("click.bigSlide touchstart.bigSlide"),this.$menu=null,this.$push=null,this.$shrink=null,localStorage.removeItem("bigSlide-savedState")},toggleOpen:function(){e.beforeOpen(),h.changeState(),i.applyOpenStyles(),d.addClass(e.activeBtn),e.afterOpen(),e.saveState&&localStorage.setItem("bigSlide-savedState","open")},toggleClose:function(){e.beforeClose(),h.changeState(),i.applyClosedStyles(),d.removeClass(e.activeBtn),e.afterClose(),e.saveState&&localStorage.setItem("bigSlide-savedState","closed")},applyOpenStyles:function(){var b=a(window).width();e.semiOpenStatus&&b>e.semiOpenScreenWidth?(this.$hiddenThin.show(),this.$menu.animate({width:this.width},{duration:Math.abs(e.speed-100),easing:"linear"}),this.$push.css(e.side,this.width),this.$shrink.css({width:"calc(100% - "+this.width+")"}),this.$menu.removeClass("semiOpen")):(this.$menu.css(e.side,"0"),this.$push.css(e.side,this.width),this.$shrink.css({width:"calc(100% - "+this.width+")"}))},applyClosedStyles:function(){var b=a(window).width();e.semiOpenStatus&&b>e.semiOpenScreenWidth?(this.$hiddenThin.hide(),this.$menu.animate({width:this.semiOpenMenuWidth},{duration:Math.abs(e.speed-100),easing:"linear"}),this.$push.css(e.side,this.semiOpenMenuWidth),this.$shrink.css({width:"calc(100% - "+this.semiOpenMenuWidth+")"}),this.$menu.addClass("semiOpen")):(this.$menu.css(e.side,"-"+this.width),this.$push.css(e.side,"0"),this.$shrink.css("width","100%"))}};return h.init(),this.bigSlideAPI={settings:e,model:g,controller:h,view:i,destroy:h._destroy},this}});
  jQuery('.menu-link').bigSlide({
     menu: "#mobile-menu",
     speed: 200,
     side:"left",
    //  push:".site",
     easyClose:false
   });

   jQuery('.OurCoreValues .Passion').click( function(){
       jQuery('.PassionContent').toggleClass('Open');
   });

   jQuery('.OurCoreValues .Trust').click( function(){
       jQuery('.TrustContent').toggleClass('Open');
   });

   jQuery('.OurCoreValues .Wow').click( function(){
       jQuery('.WowContent').toggleClass('Open');
   });

   jQuery('.OurCoreValues .Innovation').click( function(){
       jQuery('.InnovationContent').toggleClass('Open');
   });

   jQuery('.OurCoreValues .Excellence').click( function(){
       jQuery('.ExcellenceContent').toggleClass('Open');
   });

   jQuery('.menu-link').click( function(){
       jQuery('.site-main').toggleClass('Overlay');
   });

  window.sr = ScrollReveal({ reset: true });
                sr.reveal('.Hype');

                jQuery('.ToggleContentBtn').click(function(){
                    jQuery('.ToggleContent').toggleClass('Open');
                    jQuery('.ToggleContentBtn').toggleClass('Minus');
                    // jQuery('.Insurance').toggleClass('current-menu-item');
                });

                // jQuery('.menu-item-434').mouseleave(function(){
                //     jQuery('.menu-item-434 .sub-menu').removeClass('drop');
                // });

                jQuery(".panel .sub-menu").mCustomScrollbar({
                    axis:"y" // vertical and horizontal scrollbar
                });
