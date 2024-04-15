
/**
 * simplebar - v6.2.5
 * Scrollbars, simpler.
 * https://grsmto.github.io/simplebar/
 *
 * Made by Adrien Denat from a fork by Jonathan Nicol
 * Under MIT License
 */

var SimpleBar=function(){"use strict";var e=function(t,i){return e=Object.setPrototypeOf||{__proto__:[]}instanceof Array&&function(e,t){e.__proto__=t}||function(e,t){for(var i in t)Object.prototype.hasOwnProperty.call(t,i)&&(e[i]=t[i])},e(t,i)};var t=!("undefined"==typeof window||!window.document||!window.document.createElement),i="object"==typeof global&&global&&global.Object===Object&&global,s="object"==typeof self&&self&&self.Object===Object&&self,r=i||s||Function("return this")(),l=r.Symbol,o=Object.prototype,n=o.hasOwnProperty,a=o.toString,c=l?l.toStringTag:void 0;var h=Object.prototype.toString;var u=l?l.toStringTag:void 0;function d(e){return null==e?void 0===e?"[object Undefined]":"[object Null]":u&&u in Object(e)?function(e){var t=n.call(e,c),i=e[c];try{e[c]=void 0;var s=!0}catch(e){}var r=a.call(e);return s&&(t?e[c]=i:delete e[c]),r}(e):function(e){return h.call(e)}(e)}var p=/\s/;var v=/^\s+/;function f(e){return e?e.slice(0,function(e){for(var t=e.length;t--&&p.test(e.charAt(t)););return t}(e)+1).replace(v,""):e}function m(e){var t=typeof e;return null!=e&&("object"==t||"function"==t)}var b=/^[-+]0x[0-9a-f]+$/i,g=/^0b[01]+$/i,x=/^0o[0-7]+$/i,y=parseInt;function E(e){if("number"==typeof e)return e;if(function(e){return"symbol"==typeof e||function(e){return null!=e&&"object"==typeof e}(e)&&"[object Symbol]"==d(e)}(e))return NaN;if(m(e)){var t="function"==typeof e.valueOf?e.valueOf():e;e=m(t)?t+"":t}if("string"!=typeof e)return 0===e?e:+e;e=f(e);var i=g.test(e);return i||x.test(e)?y(e.slice(2),i?2:8):b.test(e)?NaN:+e}var O=function(){return r.Date.now()},w=Math.max,S=Math.min;function A(e,t,i){var s,r,l,o,n,a,c=0,h=!1,u=!1,d=!0;if("function"!=typeof e)throw new TypeError("Expected a function");function p(t){var i=s,l=r;return s=r=void 0,c=t,o=e.apply(l,i)}function v(e){return c=e,n=setTimeout(b,t),h?p(e):o}function f(e){var i=e-a;return void 0===a||i>=t||i<0||u&&e-c>=l}function b(){var e=O();if(f(e))return g(e);n=setTimeout(b,function(e){var i=t-(e-a);return u?S(i,l-(e-c)):i}(e))}function g(e){return n=void 0,d&&s?p(e):(s=r=void 0,o)}function x(){var e=O(),i=f(e);if(s=arguments,r=this,a=e,i){if(void 0===n)return v(a);if(u)return clearTimeout(n),n=setTimeout(b,t),p(a)}return void 0===n&&(n=setTimeout(b,t)),o}return t=E(t)||0,m(i)&&(h=!!i.leading,l=(u="maxWait"in i)?w(E(i.maxWait)||0,t):l,d="trailing"in i?!!i.trailing:d),x.cancel=function(){void 0!==n&&clearTimeout(n),c=0,s=a=r=n=void 0},x.flush=function(){return void 0===n?o:g(O())},x}var k=function(){return k=Object.assign||function(e){for(var t,i=1,s=arguments.length;i<s;i++)for(var r in t=arguments[i])Object.prototype.hasOwnProperty.call(t,r)&&(e[r]=t[r]);return e},k.apply(this,arguments)},W=null,M=null;function N(){if(null===W){if("undefined"==typeof document)return W=0;var e=document.body,t=document.createElement("div");t.classList.add("simplebar-hide-scrollbar"),e.appendChild(t);var i=t.getBoundingClientRect().right;e.removeChild(t),W=i}return W}function L(e){return e&&e.ownerDocument&&e.ownerDocument.defaultView?e.ownerDocument.defaultView:window}function z(e){return e&&e.ownerDocument?e.ownerDocument:document}t&&window.addEventListener("resize",(function(){M!==window.devicePixelRatio&&(M=window.devicePixelRatio,W=null)}));var C=function(e){return Array.prototype.reduce.call(e,(function(e,t){var i=t.name.match(/data-simplebar-(.+)/);if(i){var s=i[1].replace(/\W+(.)/g,(function(e,t){return t.toUpperCase()}));switch(t.value){case"true":e[s]=!0;break;case"false":e[s]=!1;break;case void 0:e[s]=!0;break;default:e[s]=t.value}}return e}),{})};function T(e,t){var i;e&&(i=e.classList).add.apply(i,t.split(" "))}function R(e,t){e&&t.split(" ").forEach((function(t){e.classList.remove(t)}))}function D(e){return".".concat(e.split(" ").join("."))}var V=Object.freeze({__proto__:null,getElementWindow:L,getElementDocument:z,getOptions:C,addClasses:T,removeClasses:R,classNamesToQuery:D}),H=L,j=z,B=C,_=T,q=R,P=D,X=function(){function e(t,i){void 0===i&&(i={});var s=this;if(this.removePreventClickId=null,this.minScrollbarWidth=20,this.stopScrollDelay=175,this.isScrolling=!1,this.isMouseEntering=!1,this.scrollXTicking=!1,this.scrollYTicking=!1,this.wrapperEl=null,this.contentWrapperEl=null,this.contentEl=null,this.offsetEl=null,this.maskEl=null,this.placeholderEl=null,this.heightAutoObserverWrapperEl=null,this.heightAutoObserverEl=null,this.rtlHelpers=null,this.scrollbarWidth=0,this.resizeObserver=null,this.mutationObserver=null,this.elStyles=null,this.isRtl=null,this.mouseX=0,this.mouseY=0,this.onMouseMove=function(){},this.onWindowResize=function(){},this.onStopScrolling=function(){},this.onMouseEntered=function(){},this.onScroll=function(){var e=H(s.el);s.scrollXTicking||(e.requestAnimationFrame(s.scrollX),s.scrollXTicking=!0),s.scrollYTicking||(e.requestAnimationFrame(s.scrollY),s.scrollYTicking=!0),s.isScrolling||(s.isScrolling=!0,_(s.el,s.classNames.scrolling)),s.showScrollbar("x"),s.showScrollbar("y"),s.onStopScrolling()},this.scrollX=function(){s.axis.x.isOverflowing&&s.positionScrollbar("x"),s.scrollXTicking=!1},this.scrollY=function(){s.axis.y.isOverflowing&&s.positionScrollbar("y"),s.scrollYTicking=!1},this._onStopScrolling=function(){q(s.el,s.classNames.scrolling),s.options.autoHide&&(s.hideScrollbar("x"),s.hideScrollbar("y")),s.isScrolling=!1},this.onMouseEnter=function(){s.isMouseEntering||(_(s.el,s.classNames.mouseEntered),s.showScrollbar("x"),s.showScrollbar("y"),s.isMouseEntering=!0),s.onMouseEntered()},this._onMouseEntered=function(){q(s.el,s.classNames.mouseEntered),s.options.autoHide&&(s.hideScrollbar("x"),s.hideScrollbar("y")),s.isMouseEntering=!1},this._onMouseMove=function(e){s.mouseX=e.clientX,s.mouseY=e.clientY,(s.axis.x.isOverflowing||s.axis.x.forceVisible)&&s.onMouseMoveForAxis("x"),(s.axis.y.isOverflowing||s.axis.y.forceVisible)&&s.onMouseMoveForAxis("y")},this.onMouseLeave=function(){s.onMouseMove.cancel(),(s.axis.x.isOverflowing||s.axis.x.forceVisible)&&s.onMouseLeaveForAxis("x"),(s.axis.y.isOverflowing||s.axis.y.forceVisible)&&s.onMouseLeaveForAxis("y"),s.mouseX=-1,s.mouseY=-1},this._onWindowResize=function(){s.scrollbarWidth=s.getScrollbarWidth(),s.hideNativeScrollbar()},this.onPointerEvent=function(e){var t,i;s.axis.x.track.el&&s.axis.y.track.el&&s.axis.x.scrollbar.el&&s.axis.y.scrollbar.el&&(s.axis.x.track.rect=s.axis.x.track.el.getBoundingClientRect(),s.axis.y.track.rect=s.axis.y.track.el.getBoundingClientRect(),(s.axis.x.isOverflowing||s.axis.x.forceVisible)&&(t=s.isWithinBounds(s.axis.x.track.rect)),(s.axis.y.isOverflowing||s.axis.y.forceVisible)&&(i=s.isWithinBounds(s.axis.y.track.rect)),(t||i)&&(e.stopPropagation(),"pointerdown"===e.type&&"touch"!==e.pointerType&&(t&&(s.axis.x.scrollbar.rect=s.axis.x.scrollbar.el.getBoundingClientRect(),s.isWithinBounds(s.axis.x.scrollbar.rect)?s.onDragStart(e,"x"):s.onTrackClick(e,"x")),i&&(s.axis.y.scrollbar.rect=s.axis.y.scrollbar.el.getBoundingClientRect(),s.isWithinBounds(s.axis.y.scrollbar.rect)?s.onDragStart(e,"y"):s.onTrackClick(e,"y")))))},this.drag=function(t){var i,r,l,o,n,a,c,h,u,d,p;if(s.draggedAxis&&s.contentWrapperEl){var v=s.axis[s.draggedAxis].track,f=null!==(r=null===(i=v.rect)||void 0===i?void 0:i[s.axis[s.draggedAxis].sizeAttr])&&void 0!==r?r:0,m=s.axis[s.draggedAxis].scrollbar,b=null!==(o=null===(l=s.contentWrapperEl)||void 0===l?void 0:l[s.axis[s.draggedAxis].scrollSizeAttr])&&void 0!==o?o:0,g=parseInt(null!==(a=null===(n=s.elStyles)||void 0===n?void 0:n[s.axis[s.draggedAxis].sizeAttr])&&void 0!==a?a:"0px",10);t.preventDefault(),t.stopPropagation();var x=("y"===s.draggedAxis?t.pageY:t.pageX)-(null!==(h=null===(c=v.rect)||void 0===c?void 0:c[s.axis[s.draggedAxis].offsetAttr])&&void 0!==h?h:0)-s.axis[s.draggedAxis].dragOffset,y=(x="x"===s.draggedAxis&&s.isRtl?(null!==(d=null===(u=v.rect)||void 0===u?void 0:u[s.axis[s.draggedAxis].sizeAttr])&&void 0!==d?d:0)-m.size-x:x)/(f-m.size)*(b-g);"x"===s.draggedAxis&&s.isRtl&&(y=(null===(p=e.getRtlHelpers())||void 0===p?void 0:p.isScrollingToNegative)?-y:y),s.contentWrapperEl[s.axis[s.draggedAxis].scrollOffsetAttr]=y}},this.onEndDrag=function(e){var t=j(s.el),i=H(s.el);e.preventDefault(),e.stopPropagation(),q(s.el,s.classNames.dragging),t.removeEventListener("mousemove",s.drag,!0),t.removeEventListener("mouseup",s.onEndDrag,!0),s.removePreventClickId=i.setTimeout((function(){t.removeEventListener("click",s.preventClick,!0),t.removeEventListener("dblclick",s.preventClick,!0),s.removePreventClickId=null}))},this.preventClick=function(e){e.preventDefault(),e.stopPropagation()},this.el=t,this.options=k(k({},e.defaultOptions),i),this.classNames=k(k({},e.defaultOptions.classNames),i.classNames),this.axis={x:{scrollOffsetAttr:"scrollLeft",sizeAttr:"width",scrollSizeAttr:"scrollWidth",offsetSizeAttr:"offsetWidth",offsetAttr:"left",overflowAttr:"overflowX",dragOffset:0,isOverflowing:!0,forceVisible:!1,track:{size:null,el:null,rect:null,isVisible:!1},scrollbar:{size:null,el:null,rect:null,isVisible:!1}},y:{scrollOffsetAttr:"scrollTop",sizeAttr:"height",scrollSizeAttr:"scrollHeight",offsetSizeAttr:"offsetHeight",offsetAttr:"top",overflowAttr:"overflowY",dragOffset:0,isOverflowing:!0,forceVisible:!1,track:{size:null,el:null,rect:null,isVisible:!1},scrollbar:{size:null,el:null,rect:null,isVisible:!1}}},"object"!=typeof this.el||!this.el.nodeName)throw new Error("Argument passed to SimpleBar must be an HTML element instead of ".concat(this.el));this.onMouseMove=function(e,t,i){var s=!0,r=!0;if("function"!=typeof e)throw new TypeError("Expected a function");return m(i)&&(s="leading"in i?!!i.leading:s,r="trailing"in i?!!i.trailing:r),A(e,t,{leading:s,maxWait:t,trailing:r})}(this._onMouseMove,64),this.onWindowResize=A(this._onWindowResize,64,{leading:!0}),this.onStopScrolling=A(this._onStopScrolling,this.stopScrollDelay),this.onMouseEntered=A(this._onMouseEntered,this.stopScrollDelay),this.init()}return e.getRtlHelpers=function(){if(e.rtlHelpers)return e.rtlHelpers;var t=document.createElement("div");t.innerHTML='<div class="simplebar-dummy-scrollbar-size"><div></div></div>';var i=t.firstElementChild,s=null==i?void 0:i.firstElementChild;if(!s)return null;document.body.appendChild(i),i.scrollLeft=0;var r=e.getOffset(i),l=e.getOffset(s);i.scrollLeft=-999;var o=e.getOffset(s);return document.body.removeChild(i),e.rtlHelpers={isScrollOriginAtZero:r.left!==l.left,isScrollingToNegative:l.left!==o.left},e.rtlHelpers},e.prototype.getScrollbarWidth=function(){try{return this.contentWrapperEl&&"none"===getComputedStyle(this.contentWrapperEl,"::-webkit-scrollbar").display||"scrollbarWidth"in document.documentElement.style||"-ms-overflow-style"in document.documentElement.style?0:N()}catch(e){return N()}},e.getOffset=function(e){var t=e.getBoundingClientRect(),i=j(e),s=H(e);return{top:t.top+(s.pageYOffset||i.documentElement.scrollTop),left:t.left+(s.pageXOffset||i.documentElement.scrollLeft)}},e.prototype.init=function(){t&&(this.initDOM(),this.rtlHelpers=e.getRtlHelpers(),this.scrollbarWidth=this.getScrollbarWidth(),this.recalculate(),this.initListeners())},e.prototype.initDOM=function(){var e,t;this.wrapperEl=this.el.querySelector(P(this.classNames.wrapper)),this.contentWrapperEl=this.options.scrollableNode||this.el.querySelector(P(this.classNames.contentWrapper)),this.contentEl=this.options.contentNode||this.el.querySelector(P(this.classNames.contentEl)),this.offsetEl=this.el.querySelector(P(this.classNames.offset)),this.maskEl=this.el.querySelector(P(this.classNames.mask)),this.placeholderEl=this.findChild(this.wrapperEl,P(this.classNames.placeholder)),this.heightAutoObserverWrapperEl=this.el.querySelector(P(this.classNames.heightAutoObserverWrapperEl)),this.heightAutoObserverEl=this.el.querySelector(P(this.classNames.heightAutoObserverEl)),this.axis.x.track.el=this.findChild(this.el,"".concat(P(this.classNames.track)).concat(P(this.classNames.horizontal))),this.axis.y.track.el=this.findChild(this.el,"".concat(P(this.classNames.track)).concat(P(this.classNames.vertical))),this.axis.x.scrollbar.el=(null===(e=this.axis.x.track.el)||void 0===e?void 0:e.querySelector(P(this.classNames.scrollbar)))||null,this.axis.y.scrollbar.el=(null===(t=this.axis.y.track.el)||void 0===t?void 0:t.querySelector(P(this.classNames.scrollbar)))||null,this.options.autoHide||(_(this.axis.x.scrollbar.el,this.classNames.visible),_(this.axis.y.scrollbar.el,this.classNames.visible))},e.prototype.initListeners=function(){var e,t=this,i=H(this.el);if(this.el.addEventListener("mouseenter",this.onMouseEnter),this.el.addEventListener("pointerdown",this.onPointerEvent,!0),this.el.addEventListener("mousemove",this.onMouseMove),this.el.addEventListener("mouseleave",this.onMouseLeave),null===(e=this.contentWrapperEl)||void 0===e||e.addEventListener("scroll",this.onScroll),i.addEventListener("resize",this.onWindowResize),this.contentEl){if(window.ResizeObserver){var s=!1,r=i.ResizeObserver||ResizeObserver;this.resizeObserver=new r((function(){s&&i.requestAnimationFrame((function(){t.recalculate()}))})),this.resizeObserver.observe(this.el),this.resizeObserver.observe(this.contentEl),i.requestAnimationFrame((function(){s=!0}))}this.mutationObserver=new i.MutationObserver((function(){i.requestAnimationFrame((function(){t.recalculate()}))})),this.mutationObserver.observe(this.contentEl,{childList:!0,subtree:!0,characterData:!0})}},e.prototype.recalculate=function(){if(this.heightAutoObserverEl&&this.contentEl&&this.contentWrapperEl&&this.wrapperEl&&this.placeholderEl){var e=H(this.el);this.elStyles=e.getComputedStyle(this.el),this.isRtl="rtl"===this.elStyles.direction;var t=this.contentEl.offsetWidth,i=this.heightAutoObserverEl.offsetHeight<=1,s=this.heightAutoObserverEl.offsetWidth<=1||t>0,r=this.contentWrapperEl.offsetWidth,l=this.elStyles.overflowX,o=this.elStyles.overflowY;this.contentEl.style.padding="".concat(this.elStyles.paddingTop," ").concat(this.elStyles.paddingRight," ").concat(this.elStyles.paddingBottom," ").concat(this.elStyles.paddingLeft),this.wrapperEl.style.margin="-".concat(this.elStyles.paddingTop," -").concat(this.elStyles.paddingRight," -").concat(this.elStyles.paddingBottom," -").concat(this.elStyles.paddingLeft);var n=this.contentEl.scrollHeight,a=this.contentEl.scrollWidth;this.contentWrapperEl.style.height=i?"auto":"100%",this.placeholderEl.style.width=s?"".concat(t||a,"px"):"auto",this.placeholderEl.style.height="".concat(n,"px");var c=this.contentWrapperEl.offsetHeight;this.axis.x.isOverflowing=0!==t&&a>t,this.axis.y.isOverflowing=n>c,this.axis.x.isOverflowing="hidden"!==l&&this.axis.x.isOverflowing,this.axis.y.isOverflowing="hidden"!==o&&this.axis.y.isOverflowing,this.axis.x.forceVisible="x"===this.options.forceVisible||!0===this.options.forceVisible,this.axis.y.forceVisible="y"===this.options.forceVisible||!0===this.options.forceVisible,this.hideNativeScrollbar();var h=this.axis.x.isOverflowing?this.scrollbarWidth:0,u=this.axis.y.isOverflowing?this.scrollbarWidth:0;this.axis.x.isOverflowing=this.axis.x.isOverflowing&&a>r-u,this.axis.y.isOverflowing=this.axis.y.isOverflowing&&n>c-h,this.axis.x.scrollbar.size=this.getScrollbarSize("x"),this.axis.y.scrollbar.size=this.getScrollbarSize("y"),this.axis.x.scrollbar.el&&(this.axis.x.scrollbar.el.style.width="".concat(this.axis.x.scrollbar.size,"px")),this.axis.y.scrollbar.el&&(this.axis.y.scrollbar.el.style.height="".concat(this.axis.y.scrollbar.size,"px")),this.positionScrollbar("x"),this.positionScrollbar("y"),this.toggleTrackVisibility("x"),this.toggleTrackVisibility("y")}},e.prototype.getScrollbarSize=function(e){var t,i;if(void 0===e&&(e="y"),!this.axis[e].isOverflowing||!this.contentEl)return 0;var s,r=this.contentEl[this.axis[e].scrollSizeAttr],l=null!==(i=null===(t=this.axis[e].track.el)||void 0===t?void 0:t[this.axis[e].offsetSizeAttr])&&void 0!==i?i:0,o=l/r;return s=Math.max(~~(o*l),this.options.scrollbarMinSize),this.options.scrollbarMaxSize&&(s=Math.min(s,this.options.scrollbarMaxSize)),s},e.prototype.positionScrollbar=function(t){var i,s,r;void 0===t&&(t="y");var l=this.axis[t].scrollbar;if(this.axis[t].isOverflowing&&this.contentWrapperEl&&l.el&&this.elStyles){var o=this.contentWrapperEl[this.axis[t].scrollSizeAttr],n=(null===(i=this.axis[t].track.el)||void 0===i?void 0:i[this.axis[t].offsetSizeAttr])||0,a=parseInt(this.elStyles[this.axis[t].sizeAttr],10),c=this.contentWrapperEl[this.axis[t].scrollOffsetAttr];c="x"===t&&this.isRtl&&(null===(s=e.getRtlHelpers())||void 0===s?void 0:s.isScrollOriginAtZero)?-c:c,"x"===t&&this.isRtl&&(c=(null===(r=e.getRtlHelpers())||void 0===r?void 0:r.isScrollingToNegative)?c:-c);var h=c/(o-a),u=~~((n-l.size)*h);u="x"===t&&this.isRtl?-u+(n-l.size):u,l.el.style.transform="x"===t?"translate3d(".concat(u,"px, 0, 0)"):"translate3d(0, ".concat(u,"px, 0)")}},e.prototype.toggleTrackVisibility=function(e){void 0===e&&(e="y");var t=this.axis[e].track.el,i=this.axis[e].scrollbar.el;t&&i&&this.contentWrapperEl&&(this.axis[e].isOverflowing||this.axis[e].forceVisible?(t.style.visibility="visible",this.contentWrapperEl.style[this.axis[e].overflowAttr]="scroll",this.el.classList.add("".concat(this.classNames.scrollable,"-").concat(e))):(t.style.visibility="hidden",this.contentWrapperEl.style[this.axis[e].overflowAttr]="hidden",this.el.classList.remove("".concat(this.classNames.scrollable,"-").concat(e))),this.axis[e].isOverflowing?i.style.display="block":i.style.display="none")},e.prototype.showScrollbar=function(e){void 0===e&&(e="y"),this.axis[e].isOverflowing&&!this.axis[e].scrollbar.isVisible&&(_(this.axis[e].scrollbar.el,this.classNames.visible),this.axis[e].scrollbar.isVisible=!0)},e.prototype.hideScrollbar=function(e){void 0===e&&(e="y"),this.axis[e].isOverflowing&&this.axis[e].scrollbar.isVisible&&(q(this.axis[e].scrollbar.el,this.classNames.visible),this.axis[e].scrollbar.isVisible=!1)},e.prototype.hideNativeScrollbar=function(){this.offsetEl&&(this.offsetEl.style[this.isRtl?"left":"right"]=this.axis.y.isOverflowing||this.axis.y.forceVisible?"-".concat(this.scrollbarWidth,"px"):"0px",this.offsetEl.style.bottom=this.axis.x.isOverflowing||this.axis.x.forceVisible?"-".concat(this.scrollbarWidth,"px"):"0px")},e.prototype.onMouseMoveForAxis=function(e){void 0===e&&(e="y");var t=this.axis[e];t.track.el&&t.scrollbar.el&&(t.track.rect=t.track.el.getBoundingClientRect(),t.scrollbar.rect=t.scrollbar.el.getBoundingClientRect(),this.isWithinBounds(t.track.rect)?(this.showScrollbar(e),_(t.track.el,this.classNames.hover),this.isWithinBounds(t.scrollbar.rect)?_(t.scrollbar.el,this.classNames.hover):q(t.scrollbar.el,this.classNames.hover)):(q(t.track.el,this.classNames.hover),this.options.autoHide&&this.hideScrollbar(e)))},e.prototype.onMouseLeaveForAxis=function(e){void 0===e&&(e="y"),q(this.axis[e].track.el,this.classNames.hover),q(this.axis[e].scrollbar.el,this.classNames.hover),this.options.autoHide&&this.hideScrollbar(e)},e.prototype.onDragStart=function(e,t){var i;void 0===t&&(t="y");var s=j(this.el),r=H(this.el),l=this.axis[t].scrollbar,o="y"===t?e.pageY:e.pageX;this.axis[t].dragOffset=o-((null===(i=l.rect)||void 0===i?void 0:i[this.axis[t].offsetAttr])||0),this.draggedAxis=t,_(this.el,this.classNames.dragging),s.addEventListener("mousemove",this.drag,!0),s.addEventListener("mouseup",this.onEndDrag,!0),null===this.removePreventClickId?(s.addEventListener("click",this.preventClick,!0),s.addEventListener("dblclick",this.preventClick,!0)):(r.clearTimeout(this.removePreventClickId),this.removePreventClickId=null)},e.prototype.onTrackClick=function(e,t){var i,s,r,l,o=this;void 0===t&&(t="y");var n=this.axis[t];if(this.options.clickOnTrack&&n.scrollbar.el&&this.contentWrapperEl){e.preventDefault();var a=H(this.el);this.axis[t].scrollbar.rect=n.scrollbar.el.getBoundingClientRect();var c=null!==(s=null===(i=this.axis[t].scrollbar.rect)||void 0===i?void 0:i[this.axis[t].offsetAttr])&&void 0!==s?s:0,h=parseInt(null!==(l=null===(r=this.elStyles)||void 0===r?void 0:r[this.axis[t].sizeAttr])&&void 0!==l?l:"0px",10),u=this.contentWrapperEl[this.axis[t].scrollOffsetAttr],d=("y"===t?this.mouseY-c:this.mouseX-c)<0?-1:1,p=-1===d?u-h:u+h,v=function(){o.contentWrapperEl&&(-1===d?u>p&&(u-=40,o.contentWrapperEl[o.axis[t].scrollOffsetAttr]=u,a.requestAnimationFrame(v)):u<p&&(u+=40,o.contentWrapperEl[o.axis[t].scrollOffsetAttr]=u,a.requestAnimationFrame(v)))};v()}},e.prototype.getContentElement=function(){return this.contentEl},e.prototype.getScrollElement=function(){return this.contentWrapperEl},e.prototype.removeListeners=function(){var e=H(this.el);this.el.removeEventListener("mouseenter",this.onMouseEnter),this.el.removeEventListener("pointerdown",this.onPointerEvent,!0),this.el.removeEventListener("mousemove",this.onMouseMove),this.el.removeEventListener("mouseleave",this.onMouseLeave),this.contentWrapperEl&&this.contentWrapperEl.removeEventListener("scroll",this.onScroll),e.removeEventListener("resize",this.onWindowResize),this.mutationObserver&&this.mutationObserver.disconnect(),this.resizeObserver&&this.resizeObserver.disconnect(),this.onMouseMove.cancel(),this.onWindowResize.cancel(),this.onStopScrolling.cancel(),this.onMouseEntered.cancel()},e.prototype.unMount=function(){this.removeListeners()},e.prototype.isWithinBounds=function(e){return this.mouseX>=e.left&&this.mouseX<=e.left+e.width&&this.mouseY>=e.top&&this.mouseY<=e.top+e.height},e.prototype.findChild=function(e,t){var i=e.matches||e.webkitMatchesSelector||e.mozMatchesSelector||e.msMatchesSelector;return Array.prototype.filter.call(e.children,(function(e){return i.call(e,t)}))[0]},e.rtlHelpers=null,e.defaultOptions={forceVisible:!1,clickOnTrack:!0,scrollbarMinSize:25,scrollbarMaxSize:0,ariaLabel:"scrollable content",classNames:{contentEl:"simplebar-content",contentWrapper:"simplebar-content-wrapper",offset:"simplebar-offset",mask:"simplebar-mask",wrapper:"simplebar-wrapper",placeholder:"simplebar-placeholder",scrollbar:"simplebar-scrollbar",track:"simplebar-track",heightAutoObserverWrapperEl:"simplebar-height-auto-observer-wrapper",heightAutoObserverEl:"simplebar-height-auto-observer",visible:"simplebar-visible",horizontal:"simplebar-horizontal",vertical:"simplebar-vertical",hover:"simplebar-hover",dragging:"simplebar-dragging",scrolling:"simplebar-scrolling",scrollable:"simplebar-scrollable",mouseEntered:"simplebar-mouse-entered"},scrollableNode:null,contentNode:null,autoHide:!0},e.getOptions=B,e.helpers=V,e}(),Y=X.helpers,F=Y.getOptions,I=Y.addClasses,$=function(t){function i(){for(var e=[],s=0;s<arguments.length;s++)e[s]=arguments[s];var r=t.apply(this,e)||this;return i.instances.set(e[0],r),r}return function(t,i){if("function"!=typeof i&&null!==i)throw new TypeError("Class extends value "+String(i)+" is not a constructor or null");function s(){this.constructor=t}e(t,i),t.prototype=null===i?Object.create(i):(s.prototype=i.prototype,new s)}(i,t),i.initDOMLoadedElements=function(){document.removeEventListener("DOMContentLoaded",this.initDOMLoadedElements),window.removeEventListener("load",this.initDOMLoadedElements),Array.prototype.forEach.call(document.querySelectorAll("[data-simplebar]"),(function(e){"init"===e.getAttribute("data-simplebar")||i.instances.has(e)||new i(e,F(e.attributes))}))},i.removeObserver=function(){var e;null===(e=i.globalObserver)||void 0===e||e.disconnect()},i.prototype.initDOM=function(){var e,t,i,s=this;if(!Array.prototype.filter.call(this.el.children,(function(e){return e.classList.contains(s.classNames.wrapper)})).length){for(this.wrapperEl=document.createElement("div"),this.contentWrapperEl=document.createElement("div"),this.offsetEl=document.createElement("div"),this.maskEl=document.createElement("div"),this.contentEl=document.createElement("div"),this.placeholderEl=document.createElement("div"),this.heightAutoObserverWrapperEl=document.createElement("div"),this.heightAutoObserverEl=document.createElement("div"),I(this.wrapperEl,this.classNames.wrapper),I(this.contentWrapperEl,this.classNames.contentWrapper),I(this.offsetEl,this.classNames.offset),I(this.maskEl,this.classNames.mask),I(this.contentEl,this.classNames.contentEl),I(this.placeholderEl,this.classNames.placeholder),I(this.heightAutoObserverWrapperEl,this.classNames.heightAutoObserverWrapperEl),I(this.heightAutoObserverEl,this.classNames.heightAutoObserverEl);this.el.firstChild;)this.contentEl.appendChild(this.el.firstChild);this.contentWrapperEl.appendChild(this.contentEl),this.offsetEl.appendChild(this.contentWrapperEl),this.maskEl.appendChild(this.offsetEl),this.heightAutoObserverWrapperEl.appendChild(this.heightAutoObserverEl),this.wrapperEl.appendChild(this.heightAutoObserverWrapperEl),this.wrapperEl.appendChild(this.maskEl),this.wrapperEl.appendChild(this.placeholderEl),this.el.appendChild(this.wrapperEl),null===(e=this.contentWrapperEl)||void 0===e||e.setAttribute("tabindex","0"),null===(t=this.contentWrapperEl)||void 0===t||t.setAttribute("role","region"),null===(i=this.contentWrapperEl)||void 0===i||i.setAttribute("aria-label",this.options.ariaLabel)}if(!this.axis.x.track.el||!this.axis.y.track.el){var r=document.createElement("div"),l=document.createElement("div");I(r,this.classNames.track),I(l,this.classNames.scrollbar),r.appendChild(l),this.axis.x.track.el=r.cloneNode(!0),I(this.axis.x.track.el,this.classNames.horizontal),this.axis.y.track.el=r.cloneNode(!0),I(this.axis.y.track.el,this.classNames.vertical),this.el.appendChild(this.axis.x.track.el),this.el.appendChild(this.axis.y.track.el)}X.prototype.initDOM.call(this),this.el.setAttribute("data-simplebar","init")},i.prototype.unMount=function(){X.prototype.unMount.call(this),i.instances.delete(this.el)},i.initHtmlApi=function(){this.initDOMLoadedElements=this.initDOMLoadedElements.bind(this),"undefined"!=typeof MutationObserver&&(this.globalObserver=new MutationObserver(i.handleMutations),this.globalObserver.observe(document,{childList:!0,subtree:!0})),"complete"===document.readyState||"loading"!==document.readyState&&!document.documentElement.doScroll?window.setTimeout(this.initDOMLoadedElements):(document.addEventListener("DOMContentLoaded",this.initDOMLoadedElements),window.addEventListener("load",this.initDOMLoadedElements))},i.handleMutations=function(e){e.forEach((function(e){e.addedNodes.forEach((function(e){1===e.nodeType&&(e.hasAttribute("data-simplebar")?!i.instances.has(e)&&document.documentElement.contains(e)&&new i(e,F(e.attributes)):e.querySelectorAll("[data-simplebar]").forEach((function(e){"init"!==e.getAttribute("data-simplebar")&&!i.instances.has(e)&&document.documentElement.contains(e)&&new i(e,F(e.attributes))})))})),e.removedNodes.forEach((function(e){1===e.nodeType&&("init"===e.getAttribute("data-simplebar")?i.instances.has(e)&&!document.documentElement.contains(e)&&i.instances.get(e).unMount():Array.prototype.forEach.call(e.querySelectorAll('[data-simplebar="init"]'),(function(e){i.instances.has(e)&&!document.documentElement.contains(e)&&i.instances.get(e).unMount()})))}))}))},i.instances=new WeakMap,i}(X);return t&&$.initHtmlApi(),$}();
/*!
* metismenu https://github.com/onokumus/metismenu#readme
* A jQuery menu plugin
* @version 3.0.6
* @author Osman Nuri Okumus <onokumus@gmail.com> (https://github.com/onokumus)
* @license: MIT 
*/
!function(e,n){"object"==typeof exports&&"undefined"!=typeof module?module.exports=n(require("jquery")):"function"==typeof define&&define.amd?define(["jquery"],n):(e=e||self).metisMenu=n(e.jQuery)}(this,function(o){"use strict";function a(){return(a=Object.assign||function(e){for(var n=1;n<arguments.length;n++){var t=arguments[n];for(var i in t)Object.prototype.hasOwnProperty.call(t,i)&&(e[i]=t[i])}return e}).apply(this,arguments)}o=o&&Object.prototype.hasOwnProperty.call(o,"default")?o.default:o;var i,n,r,s=(n="transitionend",r={TRANSITION_END:"mmTransitionEnd",triggerTransitionEnd:function(e){i(e).trigger(n)},supportsTransitionEnd:function(){return Boolean(n)}},(i=o).fn.mmEmulateTransitionEnd=e,i.event.special[r.TRANSITION_END]={bindType:n,delegateType:n,handle:function(e){if(i(e.target).is(this))return e.handleObj.handler.apply(this,arguments)}},r);function e(e){var n=this,t=!1;return i(this).one(r.TRANSITION_END,function(){t=!0}),setTimeout(function(){t||r.triggerTransitionEnd(n)},e),this}var t="metisMenu",g="metisMenu",l="."+g,h=o.fn[t],f={toggle:!0,preventDefault:!0,triggerElement:"a",parentTrigger:"li",subMenu:"ul"},d={SHOW:"show"+l,SHOWN:"shown"+l,HIDE:"hide"+l,HIDDEN:"hidden"+l,CLICK_DATA_API:"click"+l+".data-api"},u="metismenu",c="mm-active",p="mm-show",m="mm-collapse",T="mm-collapsing",v=function(){function r(e,n){this.element=e,this.config=a({},f,{},n),this.transitioning=null,this.init()}var e=r.prototype;return e.init=function(){var a=this,s=this.config,e=o(this.element);e.addClass(u),e.find(s.parentTrigger+"."+c).children(s.triggerElement).attr("aria-expanded","true"),e.find(s.parentTrigger+"."+c).parents(s.parentTrigger).addClass(c),e.find(s.parentTrigger+"."+c).parents(s.parentTrigger).children(s.triggerElement).attr("aria-expanded","true"),e.find(s.parentTrigger+"."+c).has(s.subMenu).children(s.subMenu).addClass(m+" "+p),e.find(s.parentTrigger).not("."+c).has(s.subMenu).children(s.subMenu).addClass(m),e.find(s.parentTrigger).children(s.triggerElement).on(d.CLICK_DATA_API,function(e){var n=o(this);if("true"!==n.attr("aria-disabled")){s.preventDefault&&"#"===n.attr("href")&&e.preventDefault();var t=n.parent(s.parentTrigger),i=t.siblings(s.parentTrigger),r=i.children(s.triggerElement);t.hasClass(c)?(n.attr("aria-expanded","false"),a.removeActive(t)):(n.attr("aria-expanded","true"),a.setActive(t),s.toggle&&(a.removeActive(i),r.attr("aria-expanded","false"))),s.onTransitionStart&&s.onTransitionStart(e)}})},e.setActive=function(e){o(e).addClass(c);var n=o(e).children(this.config.subMenu);0<n.length&&!n.hasClass(p)&&this.show(n)},e.removeActive=function(e){o(e).removeClass(c);var n=o(e).children(this.config.subMenu+"."+p);0<n.length&&this.hide(n)},e.show=function(e){var n=this;if(!this.transitioning&&!o(e).hasClass(T)){var t=o(e),i=o.Event(d.SHOW);if(t.trigger(i),!i.isDefaultPrevented()){if(t.parent(this.config.parentTrigger).addClass(c),this.config.toggle){var r=t.parent(this.config.parentTrigger).siblings().children(this.config.subMenu+"."+p);this.hide(r)}t.removeClass(m).addClass(T).height(0),this.setTransitioning(!0);t.height(e[0].scrollHeight).one(s.TRANSITION_END,function(){n.config&&n.element&&(t.removeClass(T).addClass(m+" "+p).height(""),n.setTransitioning(!1),t.trigger(d.SHOWN))}).mmEmulateTransitionEnd(350)}}},e.hide=function(e){var n=this;if(!this.transitioning&&o(e).hasClass(p)){var t=o(e),i=o.Event(d.HIDE);if(t.trigger(i),!i.isDefaultPrevented()){t.parent(this.config.parentTrigger).removeClass(c),t.height(t.height())[0].offsetHeight,t.addClass(T).removeClass(m).removeClass(p),this.setTransitioning(!0);var r=function(){n.config&&n.element&&(n.transitioning&&n.config.onTransitionEnd&&n.config.onTransitionEnd(),n.setTransitioning(!1),t.trigger(d.HIDDEN),t.removeClass(T).addClass(m))};0===t.height()||"none"===t.css("display")?r():t.height(0).one(s.TRANSITION_END,r).mmEmulateTransitionEnd(350)}}},e.setTransitioning=function(e){this.transitioning=e},e.dispose=function(){o.removeData(this.element,g),o(this.element).find(this.config.parentTrigger).children(this.config.triggerElement).off(d.CLICK_DATA_API),this.transitioning=null,this.config=null,this.element=null},r.jQueryInterface=function(i){return this.each(function(){var e=o(this),n=e.data(g),t=a({},f,{},e.data(),{},"object"==typeof i&&i?i:{});if(n||(n=new r(this,t),e.data(g,n)),"string"==typeof i){if(void 0===n[i])throw new Error('No method named "'+i+'"');n[i]()}})},r}();return o.fn[t]=v.jQueryInterface,o.fn[t].Constructor=v,o.fn[t].noConflict=function(){return o.fn[t]=h,v.jQueryInterface},v});
/**
* main config
*/
!function(){var t=sessionStorage.getItem("__HYPER_CONFIG__"),e=document.getElementsByTagName("html")[0],i={theme:"light",nav:"vertical",layout:{mode:"fluid",position:"fixed"},topbar:{color:"light"},menu:{color:"dark"},sidenav:{size:"default",user:!1}},o=(this.html=document.getElementsByTagName("html")[0],config=Object.assign(JSON.parse(JSON.stringify(i)),{}),this.html.getAttribute("data-bs-theme")),o=(config.theme=null!==o?o:i.theme,this.html.getAttribute("data-layout")),o=(config.nav=null!==o?"topnav"===o?"horizontal":"vertical":i.nav,this.html.getAttribute("data-layout-mode")),o=(config.layout.mode=null!==o?o:i.layout.mode,this.html.getAttribute("data-layout-position")),o=(config.layout.position=null!==o?o:i.layout.position,this.html.getAttribute("data-topbar-color")),o=(config.topbar.color=null!=o?o:i.topbar.color,this.html.getAttribute("data-sidenav-size")),o=(config.sidenav.size=null!==o?o:i.sidenav.size,this.html.getAttribute("data-sidenav-user")),o=(config.sidenav.user=null!==o||i.sidenav.user,this.html.getAttribute("data-menu-color"));if(config.menu.color=null!==o?o:i.menu.color,window.defaultConfig=JSON.parse(JSON.stringify(config)),null!==t&&(config=JSON.parse(t)),window.config=config,"topnav"===e.getAttribute("data-layout")?config.nav="horizontal":config.nav="vertical",config&&(e.setAttribute("data-bs-theme",config.theme),e.setAttribute("data-layout-mode",config.layout.mode),e.setAttribute("data-menu-color",config.menu.color),e.setAttribute("data-topbar-color",config.topbar.color),e.setAttribute("data-layout-position",config.layout.position),"vertical"==config.nav)){let t=config.sidenav.size;window.innerWidth<=767?t="full":767<=window.innerWidth&&window.innerWidth<=1140&&"full"!==self.config.sidenav.size&&"fullscreen"!==self.config.sidenav.size&&(t="condensed"),e.setAttribute("data-sidenav-size",t),config.sidenav.user&&"true"===config.sidenav.user.toString()?e.setAttribute("data-sidenav-user",!0):e.removeAttribute("data-sidenav-user")}}();
/**
* Theme: Hyper - Responsive Bootstrap 5 Admin Dashboard
* Author: Coderthemes
* Module/App: Main Js
*/

var App = {
  window: jQuery(window),
  windowHeight: jQuery(window).height(),
  document: jQuery(document),
  html: jQuery('html'),
  body: jQuery('body'),
};


(function ($) {

    'use strict';

    // Bootstrap Components
    function initComponents() {
        // Popovers
        const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
        const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))

        // Tooltips
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

        // offcanvas
        const offcanvasElementList = document.querySelectorAll('.offcanvas')
        const offcanvasList = [...offcanvasElementList].map(offcanvasEl => new bootstrap.Offcanvas(offcanvasEl))

        //Toasts
        var toastPlacement = document.getElementById("toastPlacement");
        if (toastPlacement) {
            document.getElementById("selectToastPlacement").addEventListener("change", function () {
                if (!toastPlacement.dataset.originalClass) {
                    toastPlacement.dataset.originalClass = toastPlacement.className;
                }
                toastPlacement.className = toastPlacement.dataset.originalClass + " " + this.value;
            });
        }

        var toastElList = [].slice.call(document.querySelectorAll('.toast'))
        var toastList = toastElList.map(function (toastEl) {
            return new bootstrap.Toast(toastEl)
        })

        // Bootstrap Alert Live Example
        const alertPlaceholder = document.getElementById('liveAlertPlaceholder')
        const alert = (message, type) => {
            const wrapper = document.createElement('div')
            wrapper.innerHTML = [
                `<div class="alert alert-${type} alert-dismissible" role="alert">`,
                `   <div>${message}</div>`,
                '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
                '</div>'
            ].join('')

            alertPlaceholder.append(wrapper)
        }
    }

    //  Multi Dropdown
    function initMultiDropdown() {
        $('.dropdown-menu a.dropdown-toggle').on('click', function () {
            var dropdown = $(this).next('.dropdown-menu');
            var otherDropdown = $(this).parent().parent().find('.dropdown-menu').not(dropdown);
            otherDropdown.removeClass('show')
            otherDropdown.parent().find('.dropdown-toggle').removeClass('show')
            return false;
        });
    }

    // Left Sidebar Menu (Vertical Menu)
    function initLeftSidebar() {
        var self = this;

        if ($(".side-nav").length) {
            var navCollapse = $('.side-nav li .collapse');
            var navToggle = $(".side-nav li [data-bs-toggle='collapse']");
            navToggle.on('click', function (e) {
                return false;
            });

            // open one menu at a time only
            navCollapse.on({
                'show.bs.collapse': function (event) {
                    var parent = $(event.target).parents('.collapse.show');
                    $('.side-nav .collapse.show').not(event.target).not(parent).collapse('hide');
                }
            });

            // activate the menu in left side bar (Vertical Menu) based on url
            $(".side-nav a").each(function () {
                var pageUrl = window.location.href.split(/[?#]/)[0];
                if (this.href == pageUrl) {
                    $(this).addClass("active");
                    $(this).parent().addClass("menuitem-active");
                    $(this).parent().parent().parent().addClass("show");
                    $(this).parent().parent().parent().parent().addClass("menuitem-active"); // add active to li of the current link

                    var firstLevelParent = $(this).parent().parent().parent().parent().parent().parent();
                    if (firstLevelParent.attr('id') !== 'sidebar-menu') firstLevelParent.addClass("show");

                    $(this).parent().parent().parent().parent().parent().parent().parent().addClass("menuitem-active");

                    var secondLevelParent = $(this).parent().parent().parent().parent().parent().parent().parent().parent().parent();
                    if (secondLevelParent.attr('id') !== 'wrapper') secondLevelParent.addClass("show");

                    var upperLevelParent = $(this).parent().parent().parent().parent().parent().parent().parent().parent().parent().parent();
                    if (!upperLevelParent.is('body')) upperLevelParent.addClass("menuitem-active");
                }
            });


            setTimeout(function () {
                var activatedItem = document.querySelector('li.menuitem-active .active');
                if (activatedItem != null) {
                    var simplebarContent = document.querySelector('.leftside-menu .simplebar-content-wrapper');
                    var offset = activatedItem.offsetTop - 300;
                    if (simplebarContent && offset > 100) {
                        scrollTo(simplebarContent, offset, 600);
                    }
                }
            }, 200);

            // scrollTo (Left Side Bar Active Menu)
            function easeInOutQuad(t, b, c, d) {
                t /= d / 2;
                if (t < 1) return c / 2 * t * t + b;
                t--;
                return -c / 2 * (t * (t - 2) - 1) + b;
            }
            function scrollTo(element, to, duration) {
                var start = element.scrollTop, change = to - start, currentTime = 0, increment = 20;
                var animateScroll = function () {
                    currentTime += increment;
                    var val = easeInOutQuad(currentTime, start, change, duration);
                    element.scrollTop = val;
                    if (currentTime < duration) {
                        setTimeout(animateScroll, increment);
                    }
                };
                animateScroll();
            }
        }
    }

    // Topbar Fullscreen Button
    function initfullScreenListener() {
        var self = this;
        var fullScreenBtn = document.querySelector('[data-toggle="fullscreen"]');

        if (fullScreenBtn) {
            fullScreenBtn.addEventListener('click', function (e) {
                e.preventDefault();
                document.body.classList.toggle('fullscreen-enable')
                if (!document.fullscreenElement && /* alternative standard method */ !document.mozFullScreenElement && !document.webkitFullscreenElement) {  // current working methods
                    if (document.documentElement.requestFullscreen) {
                        document.documentElement.requestFullscreen();
                    } else if (document.documentElement.mozRequestFullScreen) {
                        document.documentElement.mozRequestFullScreen();
                    } else if (document.documentElement.webkitRequestFullscreen) {
                        document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
                    }
                } else {
                    if (document.cancelFullScreen) {
                        document.cancelFullScreen();
                    } else if (document.mozCancelFullScreen) {
                        document.mozCancelFullScreen();
                    } else if (document.webkitCancelFullScreen) {
                        document.webkitCancelFullScreen();
                    }
                }
            });
        }
    }
	
    function init() {
        initComponents();
        initMultiDropdown();
        initLeftSidebar()
        initfullScreenListener();
    }

    init();
	//重写ajax
	App.ajax = function(settings){
		var settings = settings || {};
		let option = $.extend({}, {
			dataType:'json',
			type:'get',
			data:{},
			success: function(data){}
		}, settings);
		$.ajax({
		    url: option.url,
		    dataType: option.dataType,
		    type: option.type,
		    data: option.data,
		    beforeSend: function () {
		        parent.App.loading();
		    },
		    success: function (data) {
		        parent.App.closeAll();
				option.success(data);
		    },
		    error: function (jqXHR, textStatus, errorThrown) {
		        if( jqXHR.hasOwnProperty("responseJSON") ){
		            parent.swal({title: jqXHR.responseJSON.message, type: 'error'})
		        }else{
		            parent.swal({title: jqXHR.responseText, type: 'error'})
		        }
		    },
		    complete: function () {
		        parent.App.closeAll();
		    }
		});
	}
	App.timestampToTime = function(timestamp) {
	    var date = new Date(timestamp * 1000);
	    Y = date.getFullYear() + '-';
	    M = (date.getMonth()+1 < 10 ? '0'+(date.getMonth()+1) : date.getMonth()+1) + '-';
	    D = (date.getDate() < 10 ? '0'+(date.getDate()) : date.getDate()) + ' ';
	    h = (date.getHours() < 10 ? '0'+(date.getHours()) : date.getHours()) + ':';
	    m = (date.getMinutes() < 10 ? '0'+(date.getMinutes()) : date.getMinutes());
	    return Y+M+D+h+m;
	}
	//生成折线图
	App.renderChartLine = function(container, data, settings = {}){
		let myChart = echarts.init(document.getElementById(container), window.config.theme == 'dark' ?'dark':'light');
		let option = $.extend({}, {
			color: [
				"#39b54a",
				"#0081ff",
				"#e54d42",
				"#6739b6",
				"#1cbbb4",
				"#e03997"
			],
			backgroundColor:'transparent',
			title: {
				text: data.title,
				left: "center",
			},
			tooltip: {
				trigger: 'axis'
			},
			legend: {
				bottom: '0'
			},
			grid: {
				left: '1%',
				right: '2%',
				bottom: '10%',
				containLabel: true
			},
			xAxis: {
				type: 'category',
				boundaryGap: false,
				data: data.categories,
				axisLabel: {
					formatter: function(value, index) {
						return echarts.format.formatTime('MM-dd', new Date(value));
					},
				},
			},
			yAxis: {
				type: 'value',
			},
			series: data.list
		}, settings);
		option && myChart.setOption(option);
	}
	//生成圆形空心图
	App.renderChartCycle = function(container, data, settings = {}) {
		let myChart = echarts.init(document.getElementById(container), window.config.theme == 'dark' ?'dark':'light');
		let option = $.extend({}, {
			color: [
				"#39b54a",
				"#0081ff",
				"#e54d42",
				"#6739b6",
				"#1cbbb4",
				"#e03997"
			],
			backgroundColor:'transparent',
			tooltip: {
				trigger: 'item'
			},
			title: {
				text: data.total,
				subtext: data.name,
				left: "center",
				top: '40%',
			},
			legend: {
				type: 'plain',
				bottom: '0',
				left: 'center',
				icon: 'circle',
				padding: 0,
				symbolKeepAspect: false,
				formatter: function(name) {
					let data = option.series[0].data
					let total = 0
					let tarValue
					for (let i = 0; i < data.length; i++) {
						total += data[i].value
						if (data[i].name == name) {
							tarValue = data[i].value
						}
					}
					return `${name}(${tarValue})`
				},
			},
			series: [{
				name: data.name,
				type: 'pie',
				radius: ['40%', '80%'],
				center: ["50%", "45%"], //饼状图位置
				avoidLabelOverlap: false,
				label: {
					normal: {
						show: true,
						position: "inner",
						textStyle: {
							fontWeight: 200,
							fontSize: 12, //文字的字体大小
						},
						formatter: "{d}%" /*饼状图内显示百分比*/ ,
					},
					emphasis: {
						show: false /*空心文字出现*/ ,
					},
				},
				labelLine: {
					show: false
				},
				data: data.list
			}]
		}, settings);
		option && myChart.setOption(option);
		
	}
	//生成柱状图
	App.renderChartBar = function(container, data, settings = {}) {
		let myChart = echarts.init(document.getElementById(container), window.config.theme == 'dark' ?'dark':'light');
		let option = $.extend({}, {
			color: [
				"#39b54a",
				"#0081ff",
				"#e54d42",
				"#6739b6",
				"#1cbbb4",
				"#e03997"
			],
			tooltip: {
				trigger: 'axis',
				axisPointer: {
					type: 'shadow'
				}
			},
			grid: {
				left: '3%',
				right: '4%',
				bottom: '3%',
				containLabel: true
			},
			xAxis: [{
				type: 'category',
				data: data.categories,
				axisTick: {
					alignWithLabel: true
				},
				axisLabel: { interval: 0, rotate: 30 }
			}],
			yAxis: [{
				type: 'value'
			}],
			series: [{
				name: data.name,
				type: 'bar',
				barWidth: '60%',
				label: {
					show: true,
					position: 'inside'
				},
				data: data.list,
			}]
		}, settings);
		option && myChart.setOption(option);
		
	}
	App.ruselinkurl = function() {
		if ($("#islink").prop('checked')) {
			$('#linkurl').removeAttr('disabled');
		} else {
			$('#linkurl').attr('disabled', true);
		}
	}
	
	App.copyUrl = function(url) {
		var oInput = document.createElement('input');
		oInput.value = url;
		document.body.appendChild(oInput);
		oInput.select(); // 选择对象
		document.execCommand("Copy"); // 执行浏览器复制命令
		oInput.className = 'hidden';
		oInput.style.display = 'none';
		alert('复制成功');
	}
	
	App.copyJsCode = function(id) {
		$('#' + id).select();
		document.execCommand("Copy");
		alert('复制成功');
	}
	
	App.reCycleColor = function(c) {
		var b = ["#39b54a", "#e54d42", "#0081ff ", "#fbbd08", "#1cbbb4", "#e03997","#a5673f"];
		var a = b.length;
		if (c >= a) {
			c = c % a
		}
		return b[c]
	}
	
	App.renderTicketColor = function(b, c) {
		var a = App.reCycleColor(b);
		$("#" + c + b).css("background-color", a)
	}
	App.renderOffcanvas = function(id, title){
		const wrapper = document.createElement('div')
		wrapper.innerHTML = [`<div class="offcanvas offcanvas-end" tabindex="-1" id="${id}"></div>`].join('')
		document.body.appendChild(wrapper);
		//new SimpleBar(document.getElementById('simplebar-content'));
		document.getElementById(id).addEventListener('hidden.bs.offcanvas', event => {
			wrapper.remove()
		})
	}
	App.renderModal = function(url, size = ''){
		const modalHtml = document.createElement('div')
		modalHtml.innerHTML = [`<div class="modal fade" id="ajaxModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"><div class="modal-dialog modal-dialog-scrollable ${size}"><div class="modal-content"></div></div></div>`].join('')
		//const modalHtml = `<div class="modal fade" id="ajaxModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"><div class="modal-dialog ${size}"><div class="modal-content"></div></div></div>`;
		document.body.appendChild(modalHtml);
		//new SimpleBar(document.getElementById('simplebar-content'));
		
		const modalEl = document.getElementById('ajaxModal')
		const ajaxModal = new bootstrap.Modal(modalEl, {keyboard: false})
		modalEl.addEventListener('show.bs.modal', () => {
			$('#ajaxModal').find('.modal-content').load(url);
		})
		modalEl.addEventListener('hidden.bs.modal', event => {
			modalHtml.remove()
		})
		ajaxModal.show()
	}
	App.loading = function(){
		var div = document.createElement("div");
		div.id = 'loadingDiv';
		div.style.position = 'fixed';
		div.style.top = 0;
		div.style.left = 0;
		div.style.right = 0;
		div.style.bottom = 0;
		div.style.zIndex = '99999';
		div.style.background = 'rgba(0,0,0,0)';
		div.innerHTML = '<div class="spinner-border text-primary" style="border-width: 0.125rem;position: absolute;left: 50%;top: 50%;margin: -1rem 0 0 -1rem;display: block;"></div>';
		document.body.appendChild(div);
	
	},
	App.closeAll = function(){
		document.getElementById("loadingDiv")&&document.body.removeChild(document.getElementById("loadingDiv"));
	}
	

})(jQuery)


/**
* Theme: Hyper - Responsive Bootstrap 5 Admin Dashboard
* Author: Coderthemes
* Module/App: Layout Js
*/

class ThemeCustomizer {

    constructor() {
        this.html = document.getElementsByTagName('html')[0]
        this.config = {};
        this.defaultConfig = window.config;
    }

    initConfig() {
        this.defaultConfig = JSON.parse(JSON.stringify(window.defaultConfig));
        this.config = JSON.parse(JSON.stringify(window.config));
        this.setSwitchFromConfig();
    }

    changeMenuColor(color) {
        this.config.menu.color = color;
        this.html.setAttribute('data-menu-color', color);
        this.setSwitchFromConfig();
    }

    changeLeftbarSize(size, save = true) {
        this.html.setAttribute('data-sidenav-size', size);
        if (save) {
            this.config.sidenav.size = size;
            this.setSwitchFromConfig();
        }
    }

    changeLayoutMode(mode, save = true) {
        this.html.setAttribute('data-layout-mode', mode);
        if (save) {
            this.config.layout.mode = mode;
            this.setSwitchFromConfig();
        }
    }

    changeLayoutPosition(position) {
        this.config.layout.position = position;
        this.html.setAttribute('data-layout-position', position);
        this.setSwitchFromConfig();
    }

    changeLayoutColor(color) {
        this.config.theme = color;
        this.html.setAttribute('data-bs-theme', color);
		let topWin = window.top.document.getElementById("J_iframe");
		topWin && topWin.contentWindow.html.setAttribute('data-bs-theme', color);
        this.setSwitchFromConfig();
    }

    changeTopbarColor(color) {
        this.config.topbar.color = color;
        this.html.setAttribute('data-topbar-color', color);
        this.setSwitchFromConfig();
    }

    changeSidebarUser(showUser) {

        this.config.sidenav.user = showUser;
        if (showUser) {
            this.html.setAttribute('data-sidenav-user', showUser);
        } else {
            this.html.removeAttribute('data-sidenav-user');
        }
        this.setSwitchFromConfig();
    }

    resetTheme() {
        this.config = JSON.parse(JSON.stringify(window.defaultConfig));
        this.changeMenuColor(this.config.menu.color);
        this.changeLeftbarSize(this.config.sidenav.size);
        this.changeLayoutColor(this.config.theme);
        this.changeLayoutMode(this.config.layout.mode);
        this.changeLayoutPosition(this.config.layout.position);
        this.changeTopbarColor(this.config.topbar.color);
        this.changeSidebarUser(this.config.sidenav.user);
        this._adjustLayout();
    }

    initSwitchListener() {
        var self = this;
        document.querySelectorAll('input[name=data-menu-color]').forEach(function (element) {
            element.addEventListener('change', function (e) {
                self.changeMenuColor(element.value);
            })
        });

        document.querySelectorAll('input[name=data-sidenav-size]').forEach(function (element) {
            element.addEventListener('change', function (e) {
                self.changeLeftbarSize(element.value);
            })
        });

        document.querySelectorAll('input[name=data-bs-theme]').forEach(function (element) {
            element.addEventListener('change', function (e) {
                self.changeLayoutColor(element.value);
            })
        });
        document.querySelectorAll('input[name=data-layout-mode]').forEach(function (element) {
            element.addEventListener('change', function (e) {
                self.changeLayoutMode(element.value);
            })
        });

        document.querySelectorAll('input[name=data-layout-position]').forEach(function (element) {
            element.addEventListener('change', function (e) {
                self.changeLayoutPosition(element.value);
            })
        });
        document.querySelectorAll('input[name=data-layout]').forEach(function (element) {
            element.addEventListener('change', function (e) {
                window.location = element.value === 'horizontal' ? 'layouts-horizontal.html' : 'index.html'
            })
        });
        document.querySelectorAll('input[name=data-topbar-color]').forEach(function (element) {
            element.addEventListener('change', function (e) {
                self.changeTopbarColor(element.value);
            })
        });
        document.querySelectorAll('input[name=sidebar-user]').forEach(function (element) {
            element.addEventListener('change', function (e) {
                self.changeSidebarUser(element.checked);
            })
        });


        //TopBar Light Dark
        var themeColorToggle = document.getElementById('light-dark-mode');
        if (themeColorToggle) {
            themeColorToggle.addEventListener('click', function (e) {

                if (self.config.theme === 'light') {
                    self.changeLayoutColor('dark');
                } else {
                    self.changeLayoutColor('light');
                }
            });
        }

        var resetBtn = document.querySelector('#reset-layout')
        if (resetBtn) {
            resetBtn.addEventListener('click', function (e) {
                self.resetTheme();
            });
        }

        var menuToggleBtn = document.querySelector('.button-toggle-menu');
        if (menuToggleBtn) {
            menuToggleBtn.addEventListener('click', function () {
                var configSize = self.config.sidenav.size;
                var size = self.html.getAttribute('data-sidenav-size', configSize);

                if (size === 'full') {
                    self.showBackdrop();
                } else {
                    if (configSize == 'fullscreen') {
                        if (size === 'fullscreen') {
                            self.changeLeftbarSize(configSize == 'fullscreen' ? 'default' : configSize, false);
                        } else {
                            self.changeLeftbarSize('fullscreen', false);
                        }
                    } else {
                        if (size === 'condensed') {
                            self.changeLeftbarSize(configSize == 'condensed' ? 'default' : configSize, false);
                        } else {
                            self.changeLeftbarSize('condensed', false);
                        }
                    }
                }

                // Todo: old implementation
                self.html.classList.toggle('sidebar-enable');

            });
        }

        var menuCloseBtn = document.querySelector('.button-close-fullsidebar');
        if (menuCloseBtn) {
            menuCloseBtn.addEventListener('click', function () {
                self.html.classList.remove('sidebar-enable');
                self.hideBackdrop();
            });
        }

        var hoverBtn = document.querySelectorAll('.button-sm-hover');
        hoverBtn.forEach(function (element) {
            element.addEventListener('click', function () {
                var configSize = self.config.sidenav.size;
                var size = self.html.getAttribute('data-sidenav-size', configSize);

                if (size === 'sm-hover-active') {
                    self.changeLeftbarSize('sm-hover', false);
                } else {
                    self.changeLeftbarSize('sm-hover-active', false);
                }
            });
        })
    }

    showBackdrop() {
        const backdrop = document.createElement('div');
        backdrop.id = 'custom-backdrop';
        backdrop.classList = 'offcanvas-backdrop fade show';
        document.body.appendChild(backdrop);
        document.body.style.overflow = "hidden";
        if (window.innerWidth > 767) {
            document.body.style.paddingRight = "15px";
        }
        const self = this
        backdrop.addEventListener('click', function (e) {
            self.html.classList.remove('sidebar-enable');
            self.hideBackdrop();
        })
    }

    hideBackdrop() {
        var backdrop = document.getElementById('custom-backdrop');
        if (backdrop) {
            document.body.removeChild(backdrop);
            document.body.style.overflow = null;
            document.body.style.paddingRight = null;
        }
    }


    initWindowSize() {
        var self = this;
        window.addEventListener('resize', function (e) {
            self._adjustLayout();
        })
    }

    _adjustLayout() {
        var self = this;

        if (window.innerWidth <= 767.98) {
            self.changeLeftbarSize('full', false);
        } else if (window.innerWidth >= 767 && window.innerWidth <= 1140) {
            if (self.config.sidenav.size !== 'full' && self.config.sidenav.size !== 'fullscreen') {
                if (self.config.sidenav.size === 'sm-hover') {
                    self.changeLeftbarSize('condensed');
                } else {
                    self.changeLeftbarSize('condensed', false);
                }
            }
        } else {
            self.changeLeftbarSize(self.config.sidenav.size);
            self.changeLayoutMode(self.config.layout.mode);
        }
    }

    setSwitchFromConfig() {

        sessionStorage.setItem('__HYPER_CONFIG__', JSON.stringify(this.config));
        // localStorage.setItem('__HYPER_CONFIG__', JSON.stringify(this.config));

        document.querySelectorAll('.right-bar input[type=checkbox]').forEach(function (checkbox) {
            checkbox.checked = false;
        })

        var config = this.config;
        if (config) {
            var layoutNavSwitch = document.querySelector('input[type=radio][name=data-layout][value=' + config.nav + ']');
            var layoutColorSwitch = document.querySelector('input[type=radio][name=data-bs-theme][value=' + config.theme + ']');
            var layoutModeSwitch = document.querySelector('input[type=radio][name=data-layout-mode][value=' + config.layout.mode + ']');
            var topbarColorSwitch = document.querySelector('input[type=radio][name=data-topbar-color][value=' + config.topbar.color + ']');
            var menuColorSwitch = document.querySelector('input[type=radio][name=data-menu-color][value=' + config.menu.color + ']');
            var leftbarSizeSwitch = document.querySelector('input[type=radio][name=data-sidenav-size][value=' + config.sidenav.size + ']');
            var layoutSizeSwitch = document.querySelector('input[type=radio][name=data-layout-position][value=' + config.layout.position + ']');
            var sidebarUserSwitch = document.querySelector('input[type=checkbox][name=sidebar-user]');

            if (layoutNavSwitch) layoutNavSwitch.checked = true;
            if (layoutColorSwitch) layoutColorSwitch.checked = true;
            if (layoutModeSwitch) layoutModeSwitch.checked = true;
            if (topbarColorSwitch) topbarColorSwitch.checked = true;
            if (menuColorSwitch) menuColorSwitch.checked = true;
            if (leftbarSizeSwitch) leftbarSizeSwitch.checked = true;
            if (layoutSizeSwitch) layoutSizeSwitch.checked = true;
            if (sidebarUserSwitch && config.sidenav.user.toString() === "true") sidebarUserSwitch.checked = true;
        }
    }

    init() {
        this.initConfig();
        this.initSwitchListener();
        this.initWindowSize();
        this._adjustLayout();
        this.setSwitchFromConfig();
    }
}
new ThemeCustomizer().init();

yii.confirm = function(message, ok, cancel) {
    var url = $(this).attr('href');
    var if_pjax = $(this).attr('data-pjax') ? $(this).attr('data-pjax') : 0;
    var method = $(this).attr('data-method') ? $(this).attr('data-method') : "post";
    var data = $(this).attr('data-params') ? JSON.parse( $(this).attr('data-params') ) : '';
	parent.swal({
		title: message,
		type: 'question',
		showConfirmButton: true,
		showCancelButton: true,
	}).then(function() {
		if( parseInt( if_pjax ) ){
		    !ok || ok();
		}else {
			App.ajax({
				url: url,
				type: method,
				data: data,
				success: function (data) {
					if(data.code == 200){
						parent.swal({title: data.message, type: 'success', timer: 2000}).then(function() {location.reload();})
					}else{
						parent.swal({title: data.message, type: 'error'})
					}
					
					
				}
			});
		}
	}, function(dismiss) {
		!cancel || cancel();
	})
}
/* 
 * 全局事件 
 */
$(function() {
	var container = "#pjax-container"; //容器
	if ($.support.pjax) {
		$(document).pjax('a[data-pjax],form[data-pjax]', container);
	}

	$(container).on('pjax:beforeSend', function(args) {
		//alert('beforeSend');
		parent.App.loading();
	})
	$(container).on('pjax:error', function(args) {
		//alert('error');
		//parent.layer.alert('数据加载出错！', {icon: 2})
	})
	$(container).on('pjax:complete', function(args) {
		//alert('success');
		parent.App.closeAll();
	})
	//多选后处理ajax
	$(container).on('click', '.multi-operate-ajax', function(e){
	    e.preventDefault();
		var that = $(this);
	    var url = $(this).attr('href');
	    var method = $(this).attr('data-method') ? $(this).attr('data-method') : "post";
	    var paramSign = that.attr('param-sign') ? that.attr('param-sign') : "id";
	    var ids = [];
	    $(container+" input[name='selection[]']:checked").each(function(){
	        ids.push($(this).val());
	    });
	    if(ids.length <= 0){
			parent.swal({title: '未选中任何数据！', type: 'error', timer: 1500})
	        return false;
	    }
		parent.swal({
			title: $(this).attr("data-confirm"),
			type: 'question',
			showConfirmButton: true,
			showCancelButton: true,
		}).then(function() {
			if( that.hasClass("jump") ){//含有jump的class不做ajax处理，跳转页面
			    var jumpUrl = url.indexOf('?') !== -1 ? url + '&' + paramSign + '=' + ids : url + '?' + paramSign + '=' + ids;
			    location.href = jumpUrl;
			    return false;
			}
			App.ajax({
				url: url,
				type: method,
				data: {id:ids},
				success: function (data) {
					location.reload();
				}
			});
		}, function(dismiss) {
		})
	    return false;
	})
	//多选模态框处理
	$(document).on('click', '.multi-operate-modal', function(e){
		e.preventDefault();
		var url = $(this).attr('href');
		var ids = [];
		$(container+" input[name='selection[]']:checked").each(function(){
		    ids.push($(this).val());
		});
		if(ids.length <= 0){
		    parent.swal({title: '未选中任何数据！', type: 'error', timer: 1500})
		    return false;
		}
		var param = ids.join(",");
		url = url.indexOf('?') !== -1 ? url + '&ids=' + param : url + '?ids=' + param;
		parent.App.renderModal(url);
		
		
		/* const customModalEl = document.getElementById('customModal')
		const customModal = new bootstrap.Modal(customModalEl, {keyboard: false})
		customModalEl.addEventListener('show.bs.modal', () => {
			console.log(url)
			$('#customModal').find('.modal-content').load(url);
		})
		customModalEl.addEventListener('hidden.bs.modal', event => {
			$('#customModal').find('.modal-content').html($('#rfModalBody').html());
		})
		customModal.show() */
		
		return false;
		
	});
	//点击弹出模态框
	$(document).on('click', '[data-toggle="modal"]', function (event) {
		let url = $(this).data('remote');
		let modalSize = $(this).data('size');
		parent.App.renderModal(url, modalSize);
	});
	
	//提交表单后除form为none-loading的class显示loading效果
	$("form:not(.none-loading)").bind("beforeSubmit", function () {
	    $(this).find("button[type=submit]").attr("disabled", true);
	})
	//排序
	$(document).on('click', '.listorder', function(event){
		event.preventDefault();
		var that = $(this);
		var url = $(this).attr('href');
		var method = $(this).attr('data-method') ? $(this).attr('data-method') : "post";
		
		App.ajax({
			url: url,
			type: method,
			data: $("#myform").serialize(),
			success: function (data) {
				location.reload();
			}
		});
		
		
	});
	
	$(document).on('beforeSubmit', 'form#form-setting', function() {
		var form = $(this);
		if (form.find('.has-error').length) {
			return false;
		}
		App.ajax({
			url: form.attr('action'),
			type: 'post',
			data: form.serialize(),
			success: function (data) {
				parent.swal({title: '保存成功', type: 'success', timer: 2000})
			}
		});
		return false;
	});
	
	
	$(document).on('click', '.export', function(event){
		event.preventDefault();
		var url = $(this).attr('href');
		let param = $('#search-form').serialize();
		window.location.href = url.indexOf('?') !== -1 ? url + '&' + param : url + '?' + param;
		return false;
		
	});
	

});