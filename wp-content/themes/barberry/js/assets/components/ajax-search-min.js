!function(e){"use strict";"function"==typeof define&&define.amd?define(["jquery"],e):"object"==typeof exports&&"function"==typeof require?e(require("jquery")):e(jQuery)}((function(e){"use strict";function t(t,s){var i=e.noop,n=this,o={ajaxSettings:{},autoSelectFirst:!1,appendTo:document.body,serviceUrl:null,lookup:null,onSelect:null,onMouseOver:null,onMouseLeave:null,width:"100%",minChars:1,maxHeight:1e3,deferRequestBy:0,params:{},delimiter:null,zIndex:9999,type:"GET",noCache:!1,is_rtl:!1,onSearchStart:i,onSearchComplete:i,onSearchError:i,preserveInput:!1,wrapperaClass:"search-wrapp",containerClass:"search-suggestions-wrapp",preloaderClass:"search-preloader",closeTrigger:"search-close",tabDisabled:!1,dataType:"text",currentRequest:null,triggerSelectOnValidInput:!0,preventBadQueries:!0,lookupFilter:function(e,t,s){return-1!==e.value.toLowerCase().indexOf(s)},paramName:"query",transformResult:function(t){return"string"==typeof t?e.parseJSON(t):t},showNoSuggestionNotice:!1,noSuggestionNotice:"No results",orientation:"bottom"};this.element=t,this.el=e(t),this.suggestions=[],this.badQueries=[],this.selectedIndex=-1,this.currentValue=this.element.value,this.intervalId=0,this.cachedResponse={},this.detailsRequestsSent=[],this.onChangeInterval=null,this.onChange=null,this.isLocal=!1,this.suggestionsContainer=null,this.detailsContainer=null,this.noSuggestionsContainer=null,this.options=e.extend({},o,s),this.classes={selected:"search-suggestion-selected",suggestion:"search-suggestion"},this.hint=null,this.hintValue="",this.selection=null,this.initialize(),this.setOptions(s)}var s={escapeRegExChars:function(e){return e.replace(/[|\\{}()[\]^$+*?.]/g,"\\$&")},createNode:function(e){var t=document.createElement("div");return t.className=e,t.style.display="none",t}},i=27,n=9,o=13,a=37,r=38,l=39,h=40;t.utils=s,e.Autocomplete=t,t.prototype={killerFn:null,initialize:function(){var s=this,i="."+s.classes.suggestion,n=s.classes.selected,o=s.options,a,r="."+o.closeTrigger;s.killerFn=function(t){0===e(t.target).closest("."+s.options.containerClass).length&&(s.killSuggestions(),s.disableKillerFn())},s.noSuggestionsContainer=e('<div class="autocomplete-no-suggestion"></div>').html(this.options.noSuggestionNotice).get(0),s.suggestionsContainer=t.utils.createNode(o.containerClass),(a=e(s.suggestionsContainer)).appendTo(s.el.closest("."+o.wrapperaClass)),"auto"!==o.width&&a.width(o.width),a.on("mouseover.autocomplete",i,(function(){s.onMouseOver(e(this).data("index")),s.activate(e(this).data("index"))})),a.on("mouseout.autocomplete",(function(){})),e(document).on("click.autocomplete",r,(function(t){s.killerFn(t),s.clear(t),e(this).removeClass(o.closeTrigger),s.el.val("").focus()})),a.on("click.autocomplete",i,(function(){return s.select(e(this).data("index")),!1})),s.el.on("keydown.autocomplete",(function(e){s.onKeyPress(e)})),s.el.on("keyup.autocomplete",(function(e){s.onKeyUp(e)})),s.el.on("change.autocomplete",(function(e){s.onKeyUp(e)})),s.el.on("input.autocomplete",(function(e){s.onKeyUp(e)}))},onFocus:function(){var e=this;this.el.val().length>=this.options.minChars&&this.onValueChange()},onBlur:function(){this.enableKillerFn()},abortAjax:function(){var e=this;this.currentRequest&&(this.currentRequest.abort(),this.currentRequest=null)},setOptions:function(t){var s=this,i=s.options;e.extend(i,t),s.isLocal=e.isArray(i.lookup),s.isLocal&&(i.lookup=s.verifySuggestionsFormat(i.lookup)),i.orientation=s.validateOrientation(i.orientation,"bottom"),s.options.onSearchComplete=function(){s.preloader("hide",e("."+i.preloaderClass),i.closeTrigger)}},clearCache:function(){this.cachedResponse={},this.badQueries=[]},clear:function(){this.clearCache(),this.currentValue="",this.suggestions=[]},disable:function(){var e=this;this.disabled=!0,clearInterval(this.onChangeInterval),this.abortAjax()},enable:function(){this.disabled=!1},enableKillerFn:function(){var t=this;e(document).on("click.autocomplete",this.killerFn)},disableKillerFn:function(){var t=this;e(document).off("click.autocomplete",this.killerFn)},killSuggestions:function(){var t=this,s=e(t.suggestionsContainer).parent();t.stopKillSuggestions(),t.intervalId=window.setInterval((function(){t.visible&&(t.options.preserveInput||t.el.val(t.currentValue),t.hide()),t.stopKillSuggestions()}),50)},stopKillSuggestions:function(){window.clearInterval(this.intervalId)},isCursorAtEnd:function(){var e=this,t=this.el.val().length,s=this.element.selectionStart,i;return"number"==typeof s?s===t:!document.selection||((i=document.selection.createRange()).moveStart("character",-t),t===i.text.length)},onKeyPress:function(e){var t=this;if(this.disabled||this.visible||e.which!==h||!this.currentValue){if(!this.disabled&&this.visible){switch(e.which){case i:this.el.val(this.currentValue),this.hide();break;case l:if(this.hint&&this.options.onHint&&this.isCursorAtEnd()){this.selectHint();break}return;case n:if(this.hint&&this.options.onHint)return void this.selectHint();if(-1===this.selectedIndex)return void this.hide();if(this.select(this.selectedIndex),!1===this.options.tabDisabled)return;break;case o:if(-1===this.selectedIndex)return void this.hide();this.select(this.selectedIndex);break;case r:this.moveUp();break;case h:this.moveDown();break;default:return}e.stopImmediatePropagation(),e.preventDefault()}}else this.suggest()},onKeyUp:function(e){var t=this;if(!t.disabled){switch(e.which){case r:case h:return}clearInterval(t.onChangeInterval),t.currentValue!==t.el.val()&&(t.findBestHint(),t.options.deferRequestBy>0?t.onChangeInterval=setInterval((function(){t.onValueChange()}),t.options.deferRequestBy):t.onValueChange())}},onValueChange:function(){var t=this,s=this.options,i=this.el.val(),n=this.getQuery(i);this.selection&&this.currentValue!==n&&(this.selection=null,(s.onInvalidateSelection||e.noop).call(this.element)),clearInterval(this.onChangeInterval),this.currentValue=i,this.selectedIndex=-1,s.triggerSelectOnValidInput&&this.isExactMatch(n)?this.select(0):n.length<s.minChars?(e("."+this.options.closeTrigger).removeClass(this.options.closeTrigger),this.hide()):this.getSuggestions(n)},isExactMatch:function(e){var t=this.suggestions;return 1===t.length&&t[0].value.toLowerCase()===e.toLowerCase()},getQuery:function(t){var s=this.options.delimiter,i;return s?(i=t.split(s),e.trim(i[i.length-1])):t},getSuggestionsLocal:function(t){var s=this,i=this.options,n=t.toLowerCase(),o=i.lookupFilter,a=parseInt(i.lookupLimit,10),r;return r={suggestions:e.grep(i.lookup,(function(e){return o(e,t,n)}))},a&&r.suggestions.length>a&&(r.suggestions=r.suggestions.slice(0,a)),r},getSuggestions:function(t){var s,i=this,n=e(i.suggestionsContainer),o=i.options,a=o.serviceUrl,r,l,h;o.params[o.paramName]=t,r=o.ignoreParams?null:o.params,i.preloader("show",e("."+o.preloaderClass),"search-inner-preloader",n),!1!==o.onSearchStart.call(i.element,o.params)&&(e.isFunction(o.lookup)?o.lookup(t,(function(e){i.suggestions=e.suggestions,i.suggest(),o.onSearchComplete.call(i.element,t,e.suggestions)})):(i.isLocal?s=i.getSuggestionsLocal(t):(e.isFunction(a)&&(a=a.call(i.element,t)),l=a+"?"+e.param(r||{}),s=i.cachedResponse[l]),s&&e.isArray(s.suggestions)?(i.suggestions=s.suggestions,i.suggest(),o.onSearchComplete.call(i.element,t,s.suggestions)):i.isBadQuery(t)?o.onSearchComplete.call(i.element,t,[]):(i.abortAjax(),h={url:a,data:r,type:o.type,dataType:o.dataType},e.extend(h,o.ajaxSettings),i.currentRequest=e.ajax(h).done((function(e){var s;i.currentRequest=null,void 0!==(s=o.transformResult(e,t)).suggestions&&i.processResponse(s,t,l),o.onSearchComplete.call(i.element,t,s.suggestions)})).fail((function(e,s,n){o.onSearchError.call(i.element,t,e,s,n)})))))},isBadQuery:function(e){if(!this.options.preventBadQueries)return!1;for(var t=this.badQueries,s=t.length;s--;)if(0===e.indexOf(t[s]))return!0;return!1},hide:function(){var t=this,s=e(this.suggestionsContainer),i=e(this.suggestionsContainer).parent();e.isFunction(this.options.onHide)&&this.visible&&this.options.onHide.call(this.element,s),this.visible=!1,this.selectedIndex=-1,clearInterval(this.onChangeInterval),e(this.suggestionsContainer).hide(),e(this.detailsContainer).hide(),i.removeClass("search-open"),this.signalHint(null);var n=gsap.timeline(),o=e(".site-search"),a="50vh";e(window).width()<768&&(a="40vh"),n.to(o,{ease:"power4.InOut",height:a,duration:1})},suggest:function(){if(""!=this.suggestions){var t=this,s=this.options,i=s.groupBy,n=s.formatResult,o=this.getQuery(this.currentValue),a=this.classes.suggestion,r=this.classes.selected,l=e(this.suggestionsContainer),h=e(this.noSuggestionsContainer),u=s.beforeRender,c,g=function(e,t){var s=e.data[i];return c===s?"":'<div class="autocomplete-group"><strong>'+(c=s)+"</strong></div>"};if(s.triggerSelectOnValidInput&&this.isExactMatch(o))this.select(0);else{this.adjustContainerWidth(),h.detach(),l.html(this.suggestions);var d=gsap.timeline(),p=e(".site-search");d.to(p,{ease:"power4.InOut",height:"100vh",duration:1}),e.isFunction(u)&&u.call(this.element,l,this.suggestions),l.show(),l.parent().addClass("search-open"),s.autoSelectFirst&&(this.selectedIndex=0,l.scrollTop(0),l.children("."+a).first().addClass(r)),this.visible=!0,this.findBestHint()}}else this.options.showNoSuggestionNotice?this.noSuggestions():this.hide()},noSuggestions:function(){var t=this,s=e(this.suggestionsContainer),i=e(this.noSuggestionsContainer);this.adjustContainerWidth(),i.detach(),s.empty(),s.append(i),s.show(),this.visible=!0},adjustContainerWidth:function(){var t=this,s=this.options,i,n=e(this.suggestionsContainer).parent(),o=e(this.suggestionsContainer),a=550;"auto"===s.width&&(i=this.el.outerWidth(),o.css("width",i+"px"))},findBestHint:function(){var e=this,t,s=null;this.el.val().toLowerCase()&&this.signalHint(null)},signalHint:function(t){var s="",i=this;t&&(s=this.currentValue+t.value.substr(this.currentValue.length)),this.hintValue!==s&&(this.hintValue=s,this.hint=t,(this.options.onHint||e.noop)(s))},preloader:function(t,s,i,n){var o=gsap.timeline(),a=e(".site-search"),r,l="search-preloader-wrapp",h=null==i?l:l+" "+i;if(1==search.show_preloader&&0!=s.length){if("hide"===t&&(e(l).remove(),s.html(""),!e(".search-suggestions-wrapp .products")[0])){var u="50vh";e(window).width()<768&&(u="40vh"),o.to(a,{ease:"power4.InOut",height:u,duration:1})}"show"===t&&(n.html(""),s.html('<div class="preloader"></div>'),o.to(a,1,{ease:Power4.easeInOut,height:"100vh"}))}},validateOrientation:function(t,s){return t=e.trim(t||"").toLowerCase(),-1===e.inArray(t,["auto","bottom","top"])&&(t=s),t},processResponse:function(e,t,s){var i=this,n=this.options;n.noCache||(this.cachedResponse[s]=e,n.preventBadQueries&&!e.suggestions.length&&this.badQueries.push(t)),t===this.getQuery(this.currentValue)&&(this.suggestions=e.suggestions,this.suggest())},activate:function(t){var s=this,i,n=this.classes.selected,o=e(this.suggestionsContainer),a=o.find("."+this.classes.suggestion);return o.find("."+n).removeClass(n),this.selectedIndex=t,-1!==this.selectedIndex&&a.length>this.selectedIndex?(i=a.get(this.selectedIndex),e(i).addClass(n),i):null},selectHint:function(){var t=this,s=e.inArray(this.hint,this.suggestions);this.select(s)},select:function(e){var t=this;this.hide(),this.onSelect(e),this.disableKillerFn()},moveUp:function(){var t=this;if(-1!==this.selectedIndex)return 0===this.selectedIndex?(e(this.suggestionsContainer).children().first().removeClass(this.classes.selected),this.selectedIndex=-1,this.el.val(this.currentValue),void this.findBestHint()):void this.adjustScroll(this.selectedIndex-1)},moveDown:function(){var e=this;this.selectedIndex!==this.suggestions.length-1&&this.adjustScroll(this.selectedIndex+1)},adjustScroll:function(t){var s=this,i=this.activate(t);if(i){var n,o,a,r=e(i).outerHeight();n=i.offsetTop,a=(o=e(this.suggestionsContainer).scrollTop())+this.options.maxHeight-r,n<o?e(this.suggestionsContainer).scrollTop(n):n>a&&e(this.suggestionsContainer).scrollTop(n-this.options.maxHeight+r),this.options.preserveInput||this.el.val(this.getValue(this.suggestions[t].value)),this.signalHint(null)}},onSelect:function(t){var s=this,i=this.options.onSelect,n=this.suggestions[t];this.currentValue=this.getValue(n.value),this.currentValue===this.el.val()||this.options.preserveInput||this.el.val(this.currentValue),-1!=n.id&&(window.location.href=n.url),this.signalHint(null),this.suggestions=[],this.selection=n,e.isFunction(i)&&i.call(this.element,n)},onMouseOver:function(t){var s=this,i=this.options.onMouseOver,n=this.suggestions[t];e.isFunction(i)&&i.call(this.element,n)},onMouseLeave:function(t){var s=this,i=this.options.onMouseLeave,n=this.suggestions[t];e.isFunction(i)&&i.call(this.element,n)},getValue:function(e){var t=this,s=this.options.delimiter,i,n;return s?1===(n=(i=this.currentValue).split(s)).length?e:i.substr(0,i.length-n[n.length-1].length)+e:e},dispose:function(){var t=this;this.el.off(".autocomplete").removeData("autocomplete"),this.disableKillerFn(),e(this.suggestionsContainer).remove()}},e.fn.dgwtWcasAutocomplete=function(s,i){var n="autocomplete";return arguments.length?this.each((function(){var o=e(this),a=o.data(n);"string"==typeof s?a&&"function"==typeof a[s]&&a[s](i):(a&&a.dispose&&a.dispose(),a=new t(this,s),o.data(n,a))})):this.first().data(n)},e(document).ready((function(){e(".search-input").dgwtWcasAutocomplete({minChars:3,showNoSuggestionNotice:!0,autoSelectFirst:!1,triggerSelectOnValidInput:!1,serviceUrl:search.ajax_search_endpoint,paramName:"search_keyword",noSuggestionNotice:barberry_scripts_vars.noSuggestionNotice})}))}));