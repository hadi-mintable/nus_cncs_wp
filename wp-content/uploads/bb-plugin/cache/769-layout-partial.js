!function(name,definition){if(typeof module!='undefined'&&module.exports)module.exports=definition()
else if(typeof define=='function'&&define.amd)define(name,definition)
else this[name]=definition()}('bowser',function(){var t=true
function detect(ua){function getFirstMatch(regex){var match=ua.match(regex);return(match&&match.length>1&&match[1])||'';}
function getSecondMatch(regex){var match=ua.match(regex);return(match&&match.length>1&&match[2])||'';}
var iosdevice=getFirstMatch(/(ipod|iphone|ipad)/i).toLowerCase(),likeAndroid=/like android/i.test(ua),android=!likeAndroid&&/android/i.test(ua),nexusMobile=/nexus\s*[0-6]\s*/i.test(ua),nexusTablet=!nexusMobile&&/nexus\s*[0-9]+/i.test(ua),chromeos=/CrOS/.test(ua),silk=/silk/i.test(ua),sailfish=/sailfish/i.test(ua),tizen=/tizen/i.test(ua),webos=/(web|hpw)os/i.test(ua),windowsphone=/windows phone/i.test(ua),windows=!windowsphone&&/windows/i.test(ua),mac=!iosdevice&&!silk&&/macintosh/i.test(ua),linux=!android&&!sailfish&&!tizen&&!webos&&/linux/i.test(ua),edgeVersion=getFirstMatch(/edge\/(\d+(\.\d+)?)/i),versionIdentifier=getFirstMatch(/version\/(\d+(\.\d+)?)/i),tablet=/tablet/i.test(ua),mobile=!tablet&&/[^-]mobi/i.test(ua),xbox=/xbox/i.test(ua),result
if(/opera|opr|opios/i.test(ua)){result={name:'Opera',opera:t,version:versionIdentifier||getFirstMatch(/(?:opera|opr|opios)[\s\/](\d+(\.\d+)?)/i)}}
else if(/coast/i.test(ua)){result={name:'Opera Coast',coast:t,version:versionIdentifier||getFirstMatch(/(?:coast)[\s\/](\d+(\.\d+)?)/i)}}
else if(/yabrowser/i.test(ua)){result={name:'Yandex Browser',yandexbrowser:t,version:versionIdentifier||getFirstMatch(/(?:yabrowser)[\s\/](\d+(\.\d+)?)/i)}}
else if(/ucbrowser/i.test(ua)){result={name:'UC Browser',ucbrowser:t,version:getFirstMatch(/(?:ucbrowser)[\s\/](\d+(?:\.\d+)+)/i)}}
else if(/mxios/i.test(ua)){result={name:'Maxthon',maxthon:t,version:getFirstMatch(/(?:mxios)[\s\/](\d+(?:\.\d+)+)/i)}}
else if(/epiphany/i.test(ua)){result={name:'Epiphany',epiphany:t,version:getFirstMatch(/(?:epiphany)[\s\/](\d+(?:\.\d+)+)/i)}}
else if(/puffin/i.test(ua)){result={name:'Puffin',puffin:t,version:getFirstMatch(/(?:puffin)[\s\/](\d+(?:\.\d+)?)/i)}}
else if(/sleipnir/i.test(ua)){result={name:'Sleipnir',sleipnir:t,version:getFirstMatch(/(?:sleipnir)[\s\/](\d+(?:\.\d+)+)/i)}}
else if(/k-meleon/i.test(ua)){result={name:'K-Meleon',kMeleon:t,version:getFirstMatch(/(?:k-meleon)[\s\/](\d+(?:\.\d+)+)/i)}}
else if(windowsphone){result={name:'Windows Phone',windowsphone:t}
if(edgeVersion){result.msedge=t
result.version=edgeVersion}
else{result.msie=t
result.version=getFirstMatch(/iemobile\/(\d+(\.\d+)?)/i)}}
else if(/msie|trident/i.test(ua)){result={name:'Internet Explorer',msie:t,version:getFirstMatch(/(?:msie |rv:)(\d+(\.\d+)?)/i)}}else if(chromeos){result={name:'Chrome',chromeos:t,chromeBook:t,chrome:t,version:getFirstMatch(/(?:chrome|crios|crmo)\/(\d+(\.\d+)?)/i)}}else if(/chrome.+? edge/i.test(ua)){result={name:'Microsoft Edge',msedge:t,version:edgeVersion}}
else if(/vivaldi/i.test(ua)){result={name:'Vivaldi',vivaldi:t,version:getFirstMatch(/vivaldi\/(\d+(\.\d+)?)/i)||versionIdentifier}}
else if(sailfish){result={name:'Sailfish',sailfish:t,version:getFirstMatch(/sailfish\s?browser\/(\d+(\.\d+)?)/i)}}
else if(/seamonkey\//i.test(ua)){result={name:'SeaMonkey',seamonkey:t,version:getFirstMatch(/seamonkey\/(\d+(\.\d+)?)/i)}}
else if(/firefox|iceweasel|fxios/i.test(ua)){result={name:'Firefox',firefox:t,version:getFirstMatch(/(?:firefox|iceweasel|fxios)[ \/](\d+(\.\d+)?)/i)}
if(/\((mobile|tablet);[^\)]*rv:[\d\.]+\)/i.test(ua)){result.firefoxos=t}}
else if(silk){result={name:'Amazon Silk',silk:t,version:getFirstMatch(/silk\/(\d+(\.\d+)?)/i)}}
else if(/phantom/i.test(ua)){result={name:'PhantomJS',phantom:t,version:getFirstMatch(/phantomjs\/(\d+(\.\d+)?)/i)}}
else if(/slimerjs/i.test(ua)){result={name:'SlimerJS',slimer:t,version:getFirstMatch(/slimerjs\/(\d+(\.\d+)?)/i)}}
else if(/blackberry|\bbb\d+/i.test(ua)||/rim\stablet/i.test(ua)){result={name:'BlackBerry',blackberry:t,version:versionIdentifier||getFirstMatch(/blackberry[\d]+\/(\d+(\.\d+)?)/i)}}
else if(webos){result={name:'WebOS',webos:t,version:versionIdentifier||getFirstMatch(/w(?:eb)?osbrowser\/(\d+(\.\d+)?)/i)};if(/touchpad\//i.test(ua)){result.touchpad=t;}}
else if(/bada/i.test(ua)){result={name:'Bada',bada:t,version:getFirstMatch(/dolfin\/(\d+(\.\d+)?)/i)};}
else if(tizen){result={name:'Tizen',tizen:t,version:getFirstMatch(/(?:tizen\s?)?browser\/(\d+(\.\d+)?)/i)||versionIdentifier};}
else if(/qupzilla/i.test(ua)){result={name:'QupZilla',qupzilla:t,version:getFirstMatch(/(?:qupzilla)[\s\/](\d+(?:\.\d+)+)/i)||versionIdentifier}}
else if(/chromium/i.test(ua)){result={name:'Chromium',chromium:t,version:getFirstMatch(/(?:chromium)[\s\/](\d+(?:\.\d+)?)/i)||versionIdentifier}}
else if(/chrome|crios|crmo/i.test(ua)){result={name:'Chrome',chrome:t,version:getFirstMatch(/(?:chrome|crios|crmo)\/(\d+(\.\d+)?)/i)}}
else if(android){result={name:'Android',version:versionIdentifier}}
else if(/safari|applewebkit/i.test(ua)){result={name:'Safari',safari:t}
if(versionIdentifier){result.version=versionIdentifier}}
else if(iosdevice){result={name:iosdevice=='iphone'?'iPhone':iosdevice=='ipad'?'iPad':'iPod'}
if(versionIdentifier){result.version=versionIdentifier}}
else if(/googlebot/i.test(ua)){result={name:'Googlebot',googlebot:t,version:getFirstMatch(/googlebot\/(\d+(\.\d+))/i)||versionIdentifier}}
else{result={name:getFirstMatch(/^(.*)\/(.*) /),version:getSecondMatch(/^(.*)\/(.*) /)};}
if(!result.msedge&&/(apple)?webkit/i.test(ua)){if(/(apple)?webkit\/537\.36/i.test(ua)){result.name=result.name||"Blink"
result.blink=t}else{result.name=result.name||"Webkit"
result.webkit=t}
if(!result.version&&versionIdentifier){result.version=versionIdentifier}}else if(!result.opera&&/gecko\//i.test(ua)){result.name=result.name||"Gecko"
result.gecko=t
result.version=result.version||getFirstMatch(/gecko\/(\d+(\.\d+)?)/i)}
if(!result.msedge&&(android||result.silk)){result.android=t}else if(iosdevice){result[iosdevice]=t
result.ios=t}else if(mac){result.mac=t}else if(xbox){result.xbox=t}else if(windows){result.windows=t}else if(linux){result.linux=t}
var osVersion='';if(result.windowsphone){osVersion=getFirstMatch(/windows phone (?:os)?\s?(\d+(\.\d+)*)/i);}else if(iosdevice){osVersion=getFirstMatch(/os (\d+([_\s]\d+)*) like mac os x/i);osVersion=osVersion.replace(/[_\s]/g,'.');}else if(android){osVersion=getFirstMatch(/android[ \/-](\d+(\.\d+)*)/i);}else if(result.webos){osVersion=getFirstMatch(/(?:web|hpw)os\/(\d+(\.\d+)*)/i);}else if(result.blackberry){osVersion=getFirstMatch(/rim\stablet\sos\s(\d+(\.\d+)*)/i);}else if(result.bada){osVersion=getFirstMatch(/bada\/(\d+(\.\d+)*)/i);}else if(result.tizen){osVersion=getFirstMatch(/tizen[\/\s](\d+(\.\d+)*)/i);}
if(osVersion){result.osversion=osVersion;}
var osMajorVersion=osVersion.split('.')[0];if(tablet||nexusTablet||iosdevice=='ipad'||(android&&(osMajorVersion==3||(osMajorVersion>=4&&!mobile)))||result.silk){result.tablet=t}else if(mobile||iosdevice=='iphone'||iosdevice=='ipod'||android||nexusMobile||result.blackberry||result.webos||result.bada){result.mobile=t}
if(result.msedge||(result.msie&&result.version>=10)||(result.yandexbrowser&&result.version>=15)||(result.vivaldi&&result.version>=1.0)||(result.chrome&&result.version>=20)||(result.firefox&&result.version>=20.0)||(result.safari&&result.version>=6)||(result.opera&&result.version>=10.0)||(result.ios&&result.osversion&&result.osversion.split(".")[0]>=6)||(result.blackberry&&result.version>=10.1)||(result.chromium&&result.version>=20)){result.a=t;}
else if((result.msie&&result.version<10)||(result.chrome&&result.version<20)||(result.firefox&&result.version<20.0)||(result.safari&&result.version<6)||(result.opera&&result.version<10.0)||(result.ios&&result.osversion&&result.osversion.split(".")[0]<6)||(result.chromium&&result.version<20)){result.c=t}else result.x=t
return result}
var bowser=detect(typeof navigator!=='undefined'?navigator.userAgent:'')
bowser.test=function(browserList){for(var i=0;i<browserList.length;++i){var browserItem=browserList[i];if(typeof browserItem==='string'){if(browserItem in bowser){return true;}}}
return false;}
function getVersionPrecision(version){return version.split(".").length;}
function map(arr,iterator){var result=[],i;if(Array.prototype.map){return Array.prototype.map.call(arr,iterator);}
for(i=0;i<arr.length;i++){result.push(iterator(arr[i]));}
return result;}
function compareVersions(versions){var precision=Math.max(getVersionPrecision(versions[0]),getVersionPrecision(versions[1]));var chunks=map(versions,function(version){var delta=precision-getVersionPrecision(version);version=version+new Array(delta+1).join(".0");return map(version.split("."),function(chunk){return new Array(20-chunk.length).join("0")+chunk;}).reverse();});while(--precision>=0){if(chunks[0][precision]>chunks[1][precision]){return 1;}
else if(chunks[0][precision]===chunks[1][precision]){if(precision===0){return 0;}}
else{return-1;}}}
function isUnsupportedBrowser(minVersions,strictMode,ua){var _bowser=bowser;if(typeof strictMode==='string'){ua=strictMode;strictMode=void(0);}
if(strictMode===void(0)){strictMode=false;}
if(ua){_bowser=detect(ua);}
var version=""+_bowser.version;for(var browser in minVersions){if(minVersions.hasOwnProperty(browser)){if(_bowser[browser]){return compareVersions([version,minVersions[browser]])<0;}}}
return strictMode;}
function check(minVersions,strictMode,ua){return!isUnsupportedBrowser(minVersions,strictMode,ua);}
bowser.isUnsupportedBrowser=isUnsupportedBrowser;bowser.compareVersions=compareVersions;bowser.check=check;bowser._detect=detect;return bowser});(function($){UABBTrigger={triggerHook:function(hook,args)
{$('body').trigger('uabb-trigger.'+hook,args);},addHook:function(hook,callback)
{$('body').on('uabb-trigger.'+hook,callback);},removeHook:function(hook,callback)
{$('body').off('uabb-trigger.'+hook,callback);},};})(jQuery);jQuery(document).ready(function($){if(typeof bowser!=='undefined'&&bowser!==null){var uabb_browser=bowser.name,uabb_browser_v=bowser.version,uabb_browser_class=uabb_browser.replace(/\s+/g,'-').toLowerCase(),uabb_browser_v_class=uabb_browser_class+parseInt(uabb_browser_v);$('html').addClass(uabb_browser_class).addClass(uabb_browser_v_class);}
$('.uabb-row-separator').parents('html').css('overflow-x','hidden');});(function($){UABBAdvAccordion=function(settings)
{this.settings=settings;this.node=settings.id;this.nodeClass='.fl-node-'+settings.id;this.close_icon=settings.close_icon;this.open_icon=settings.open_icon;this._init();};UABBAdvAccordion.prototype={settings:{},node:'',nodeClass:'',close_icon:'fa fa-plus',open_icon:'fa fa-minus',_init:function()
{var button_level=$(this.nodeClass).find('.uabb-adv-accordion-button').first().closest('.uabb-adv-accordion');button_level.children('.uabb-adv-accordion-item').children('.uabb-adv-accordion-button').on('click keypress',$.proxy(this._buttonClick,this));this._enableFirst();this._initAnchorLinks();},_initAnchorLinks:function()
{$('a').each(this._initAnchorLink);},_initAnchorLink:function()
{var link=$(this),href=link.attr('href'),loc=window.location,id=null,element=null;if('undefined'!=typeof href&&href.indexOf('#')>-1){if(loc.pathname.replace(/^\//,'')==this.pathname.replace(/^\//,'')&&loc.hostname==this.hostname){try{id=href.split('#').pop();if(!id){return;}
element=$('#'+id);if(element.length>0){if(element.hasClass('uabb-adv-accordion-item')){jQuery(link).on('click',UABBAdvAccordion.prototype._scrollToAccordionLink);}}}
catch(e){}}}},_scrollToAccordionLink:function(){var hashval=$(this).attr('href');if(/^(f|ht)tps?:\/\//i.test(hashval)){hashvalarr=hashval.split("/");hashval=hashvalarr[hashvalarr.length-1];}
var hashvalarr=hashval.split("-"),dataindex=hashvalarr[hashvalarr.length-1],tab_id=hashval.replace('-'+dataindex,'');if(tab_id!=''){if(jQuery(tab_id).length>0){if(jQuery(tab_id).find('.uabb-adv-accordion > .uabb-adv-accordion-item[data-index="'+dataindex+'"]')){jQuery('html, body').animate({scrollTop:jQuery(tab_id).offset().top-250},1000);var enable_first='<?php echo $settings->enable_first; ?>';if(!(parseInt(dataindex)==0&&enable_first=='yes')){setTimeout(function(){jQuery(tab_id+' .uabb-adv-accordion-button').eq(dataindex).trigger('click');},1000);}}}}},_multiInstance:function(e)
{if(this._multiInstance.staticVar==undefined){this._multiInstance.staticVar=0;}
this._multiInstance.staticVar++;},_buttonClick:function(e)
{e.preventDefault();var firstitem=this.settings.enable_first;this._multiInstance();if(firstitem!='yes'){if(e.originalEvent==undefined&&this._multiInstance.staticVar>1){var totalAcc=$('.uabb-adv-accordion').length;if(this._multiInstance.staticVar==totalAcc){this._multiInstance.staticVar=0;}
return;}}
var button=$(e.target).closest('.uabb-adv-accordion-button'),accordion=button.closest('.uabb-adv-accordion'),item=button.closest('.uabb-adv-accordion-item'),allContent=accordion.find('.uabb-adv-accordion-content'),allIcons=accordion.find('.uabb-adv-accordion-button i.uabb-adv-accordion-button-icon'),content=button.siblings('.uabb-adv-accordion-content'),icon=button.find('i.uabb-adv-accordion-button-icon');if(accordion.hasClass('uabb-adv-accordion-collapse')){accordion.find('.uabb-adv-accordion-item-active').removeClass('uabb-adv-accordion-item-active');allContent.slideUp('normal');accordion.find('.uabb-adv-accordion-button').attr('aria-expanded','false');accordion.find('.uabb-adv-accordion-content').attr('aria-hidden','true');if(this.settings.icon_animation=='none'){allIcons.removeClass(this.open_icon);allIcons.addClass(this.close_icon);}}
if(content.is(':hidden')){button.attr('aria-expanded','true');item.find('.uabb-adv-accordion-content').attr('aria-hidden','false');item.addClass('uabb-adv-accordion-item-active');content.slideDown('normal',this._slideDownComplete);if(this.settings.icon_animation=='none'){icon.removeClass(this.close_icon);icon.addClass(this.open_icon);}}else{button.attr('aria-expanded','false');item.find('.uabb-adv-accordion-content').attr('aria-hidden','true');item.removeClass('uabb-adv-accordion-item-active');content.slideUp('normal',this._slideUpComplete);if(this.settings.icon_animation=='none'){icon.removeClass(this.open_icon);icon.addClass(this.close_icon);}}
var trigger_args='.fl-node-'+this.node+' .uabb-adv-accordion-item-active';UABBTrigger.triggerHook('uabb-accordion-click',trigger_args);},_focusIn:function(e)
{if(undefined!==e.target){var button=$(e.target).closest('.uabb-adv-accordion-button');if(undefined!==button){button.attr('aria-selected','true');}}},_focusOut:function(e)
{if(undefined!==e.target){var button=$(e.target).closest('.uabb-adv-accordion-button');if(undefined!==button){button.attr('aria-selected','false');}}},_slideUpComplete:function()
{var content=$(this),accordion=content.closest('.uabb-adv-accordion');accordion.trigger('fl-builder.uabb-adv-accordion-toggle-complete');},_slideDownComplete:function()
{var content=$(this),accordion=content.closest('.uabb-adv-accordion'),item=content.parent(),win=$(window);FLBuilderLayout.refreshGalleries(content);if(!accordion.hasClass('uabb-accordion-edit')){if(item.offset().top<win.scrollTop()+100){$('html, body').animate({scrollTop:item.offset().top-100},500,'swing');}}
accordion.trigger('fl-builder.uabb-adv-accordion-toggle-complete');var fireRefreshEventOnWindow=function(){var evt=document.createEvent("uabbAccordionCreate");evt.initEvent('resize',true,false);window.dispatchEvent(evt);};},_enableFirst:function()
{if(typeof this.settings.enable_first!=='undefined'){var firstitem=this.settings.enable_first;if(firstitem=='yes'){$(this.nodeClass+' .uabb-adv-accordion-button').eq(0).trigger('click');}}}};})(jQuery);;(function($){$(function(){new UABBAdvAccordion({id:'62578fa93b8db',close_icon:' fas fa-plus',open_icon:'fas fa-minus ',icon_animation:'none',enable_first:'yes',});});var pattern=new RegExp('^[\\w\\-]+$');var hashval=window.location.hash.substring(1);if(pattern.test(hashval)){var hashval_last_index=hashval.lastIndexOf('-');var tab_id=hashval.slice(0,hashval_last_index);var dataindex=hashval.slice(hashval_last_index+1,hashval.length);if(tab_id!==''){var tab_id="#"+tab_id;if(jQuery(tab_id).length>0){if(jQuery(tab_id).find('.uabb-adv-accordion > .uabb-adv-accordion-item[data-index="'+dataindex+'"]')){jQuery('html, body').animate({scrollTop:jQuery(tab_id).offset().top-250},1000);var enable_first='yes';if(!(parseInt(dataindex)===0&&enable_first==='yes')){setTimeout(function(){jQuery(tab_id+' .uabb-adv-accordion-button').eq(dataindex).trigger('click');},1000);}}}}}})(jQuery);