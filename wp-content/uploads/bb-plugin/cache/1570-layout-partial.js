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
$('.uabb-row-separator').parents('html').css('overflow-x','hidden');});var UABBBlogPosts;(function($){UABBBlogPosts=function(settings){this.nodeClass='.fl-node-'+settings.id;this.id=settings.id;this.wrapperClass=this.nodeClass+' .uabb-blog-posts';this.postClass=this.nodeClass+' .uabb-post-wrapper';this.pagination=settings.pagination;this.is_carousel=settings.is_carousel;this.infinite=settings.infinite;this.arrows=settings.arrows;this.desktop=settings.desktop;this.moduleUrl=settings.moduleUrl;this.loaderUrl=settings.loaderUrl;this.prevArrow=settings.prevArrow;this.nextArrow=settings.nextArrow;this.medium=settings.medium;this.small=settings.small;this.slidesToScroll=settings.slidesToScroll;this.autoplay=settings.autoplay;this.autoplaySpeed=settings.autoplaySpeed;this.dots=settings.dots;this.small_breakpoint=settings.small_breakpoint;this.medium_breakpoint=settings.medium_breakpoint;this.equal_height_box=settings.equal_height_box;this.mesonry_equal_height=settings.mesonry_equal_height;this.uabb_masonary_filter_type=settings.uabb_masonary_filter_type
if(this.is_carousel=='carousel'){this._uabbBlogPostCarousel();if(this.equal_height_box=='yes'){jQuery(this.nodeClass).find('.uabb-blog-posts-carousel').on('afterChange',this._uabbBlogPostCarouselHeight);jQuery(this.nodeClass).find('.uabb-blog-posts-carousel').on('init',$.proxy(this._uabbBlogPostCarouselEqualHeight,this));}}else if(this.is_carousel=='masonary'){this._uabbBlogPostMasonary();}else if(this.is_carousel=='grid'){this._uabbBlogPostGrid();}
if(settings.blog_image_position=='background'){this._uabbBlogPostImageResize();}
if(this._hasPosts()){this._initInfiniteScroll();}
this._openOnLink();};UABBBlogPosts.prototype={nodeClass:'',wrapperClass:'',is_carousel:'grid',infinite:'',arrows:'',desktop:'',medium:'',small:'',slidesToScroll:'',autoplay:'',autoplaySpeed:'',small_breakpoint:'',medium_breakpoint:'',equal_height_box:'yes',mesonry_equal_height:'no',uabb_masonary_filter_type:'buttons',_hasPosts:function()
{return $(this.postClass).length>0;},_initInfiniteScroll:function()
{if(this.pagination=='scroll'&&typeof FLBuilder==='undefined'){var $this=this;setTimeout(function(){$this._infiniteScroll();},500);}},_infiniteScroll:function(settings)
{var path=$(this.nodeClass+' .uabb-blogs-pagination a.next').attr('href');pagePattern=/(.*?(\/|\&|\?)paged-[0-9]{1,}(\/|=))([0-9]{1,})+(.*)/;wpPattern=/^(.*?\/?page\/?)(?:\d+)(.*?$)/;pageMatched=null;scrollData={navSelector:this.nodeClass+' .uabb-blogs-pagination',nextSelector:this.nodeClass+' .uabb-blogs-pagination a.next',itemSelector:this.postClass,prefill:true,bufferPx:200,loading:{msgText:'Loading',finishedMsg:'',img:this.moduleUrl+'/img/ajax-loader-grey.gif',speed:10,}};if(pagePattern.test(path)){scrollData.path=function(currPage){pageMatched=path.match(pagePattern);path=pageMatched[1]+currPage+pageMatched[5];return path;}}
else if(wpPattern.test(path)){scrollData.path=path.match(wpPattern).slice(1);}
$(this.wrapperClass).infinitescroll(scrollData,$.proxy(this._infiniteScrollComplete,this));},_infiniteScrollComplete:function(elements)
{var wrap=$(this.wrapperClass);elements=$(elements);if(this.is_carousel=='masonary'||this.is_carousel=='grid'){wrap.isotope('appended',elements);}},_uabbBlogPostCarousel:function(){if(this.equal_height_box=='yes'){this._uabbBlogPostCarouselEqualHeight();}
var grid=jQuery(this.nodeClass).find('.uabb-blog-posts-carousel');jQuery(this.nodeClass).find('.uabb-blog-posts-carousel').uabbslick({dots:this.dots,infinite:this.infinite,arrows:this.arrows,lazyLoad:'ondemand',slidesToShow:this.desktop,slidesToScroll:this.slidesToScroll,autoplay:this.autoplay,prevArrow:'<button type="button" data-role="none" class="slick-prev" aria-label="Previous" tabindex="0" role="button"><i class=" '+this.prevArrow+' "></i></button>',nextArrow:'<button type="button" data-role="none" class="slick-next" aria-label="Next" tabindex="0" role="button"><i class="'+this.nextArrow+' "></i></button>',autoplaySpeed:this.autoplaySpeed,adaptiveHeight:false,responsive:[{breakpoint:this.medium_breakpoint,settings:{slidesToShow:this.medium,slidesToScroll:this.medium,}},{breakpoint:this.small_breakpoint,settings:{slidesToShow:this.small,slidesToScroll:this.small,}}]});},_uabbBlogPostMasonary:function(){var id=this.id,nodeClass=this.nodeClass;if(this.mesonry_equal_height=='yes'){LayoutMode='fitRows';}
else{LayoutMode='masonry';}
$grid=jQuery(nodeClass).find('.uabb-blog-posts-masonary').isotope({layoutMode:LayoutMode,itemSelector:'.uabb-blog-posts-masonary-item-'+this.id,masonry:{columnWidth:'.uabb-blog-posts-masonary-item-'+this.id}});if(this.uabb_masonary_filter_type=='drop-down'){jQuery(nodeClass).find('.uabb-masonary-filters').on('change',function(){value=jQuery(nodeClass).find('.uabb-masonary-filters option:selected').data('filter');jQuery(nodeClass+' .uabb-blog-posts-masonary').isotope({filter:value})});}
else{jQuery(nodeClass).find('.uabb-masonary-filters .uabb-masonary-filter-'+id).on('click',function(){jQuery(this).siblings().removeClass('uabb-masonary-current');jQuery(this).addClass('uabb-masonary-current');var value=jQuery(this).data('filter');jQuery(nodeClass+' .uabb-blog-posts-masonary').isotope({filter:value})});}
if(this.mesonry_equal_height=='yes'){this._uabbBlogPostMesonryHeight();}},_uabbBlogPostGrid:function(){var id=this.id,nodeClass=this.nodeClass,LayoutMode='fitRows';$grid=jQuery(nodeClass).find('.uabb-blog-posts-grid').isotope({layoutMode:LayoutMode,itemSelector:'.uabb-blog-posts-grid-item-'+this.id,masonry:{columnWidth:'.uabb-blog-posts-grid-item-'+this.id}});if(this.uabb_masonary_filter_type=='drop-down'){jQuery(nodeClass).find('.uabb-masonary-filters').on('change',function(){value=jQuery(nodeClass).find('.uabb-masonary-filters option:selected').data('filter');jQuery(nodeClass+' .uabb-blog-posts-grid').isotope({filter:value})});}
else{jQuery(nodeClass).find('.uabb-masonary-filters .uabb-masonary-filter-'+id).on('click',function(){jQuery(this).siblings().removeClass('uabb-masonary-current');jQuery(this).addClass('uabb-masonary-current');var value=jQuery(this).data('filter');jQuery(nodeClass+' .uabb-blog-posts-grid').isotope({filter:value})});}
if(this.equal_height_box=='yes'){this._uabbBlogPostMesonryHeight();}},_openOnLink:function(){var nodeClass=jQuery(this.nodeClass);if(this.is_carousel=='masonary'){var layoutClass='.uabb-blog-posts-masonary';}else if(this.is_carousel=='grid'){var layoutClass='.uabb-blog-posts-grid';}
var pattern=new RegExp('^[\\w\\-]+$');var id=window.location.hash.substring(1);if(pattern.test(id)){$(this.nodeClass+layoutClass).each(function(){var selector=$(this);var filters=nodeClass.find('.uabb-masonary-filters');if(filters.length>0){if(''!==id){id='.'+id.toLowerCase();def_cat=id;def_cat_sel=filters.find('[data-filter="'+id+'"]');if(0===def_cat_sel.length){return;}
if(def_cat_sel.length>0){def_cat_sel.siblings().removeClass('uabb-masonary-current');def_cat_sel.addClass('uabb-masonary-current');}}}
selector.isotope({filter:def_cat,});});}},_uabbBlogPostCarouselEqualHeight:function(){var id=this.id,nodeClass=this.nodeClass,small_breakpoint=this.small_breakpoint,medium_breakpoint=this.medium_breakpoint,desktop=this.desktop,medium=this.medium,small=this.small,node=jQuery(nodeClass),grid=node.find('.uabb-blog-posts'),post_wrapper=grid.find('.uabb-post-wrapper'),post_active=grid.find('.uabb-post-wrapper.slick-active'),max_height=-1,wrapper_height=-1,i=1,counter=parseInt(desktop),childEleCount=post_wrapper.length,remainingNodes=(childEleCount%counter);if(window.innerWidth<=small_breakpoint){counter=parseInt(small);}else if(window.innerWidth>medium_breakpoint){counter=parseInt(desktop);}else{counter=parseInt(medium);}
post_active.each(function(){var $this=jQuery(this),this_height=$this.outerHeight(),selector=$this.find('.uabb-blog-posts-shadow'),blog_post=$this.find('.uabb-blog-post-inner-wrap'),selector_height=selector.outerHeight(),blog_post_height=blog_post.outerHeight();if(max_height<blog_post_height){max_height=blog_post_height;}
if(wrapper_height<this_height){wrapper_height=this_height}});post_active.each(function(){var $this=jQuery(this);$this.find('.uabb-blog-posts-shadow').css('height',max_height);});grid.find('.slick-list.draggable').animate({height:max_height},{duration:200,easing:'linear'});max_height=-1;wrapper_height=-1;post_wrapper.each(function(){$this=jQuery(this),selector=$this.find('.uabb-blog-posts-shadow'),selector_height=selector.outerHeight();if($this.hasClass('slick-active')){return true;}
selector.css('height',selector_height);});},_uabbBlogPostCarouselHeight:function(slick,currentSlide){var id=$(this).parents('.fl-module-blog-posts').data('node'),nodeClass='.fl-node-'+id,grid=$(nodeClass).find('.uabb-blog-posts-carousel'),post_wrapper=grid.find('.uabb-post-wrapper'),post_active=grid.find('.uabb-post-wrapper.slick-active'),max_height=-1,wrapper_height=-1;post_active.each(function(i){var this_height=$(this).outerHeight(),blog_post=$(this).find('.uabb-blog-post-inner-wrap'),blog_post_height=blog_post.outerHeight();if(max_height<blog_post_height){max_height=blog_post_height;}
if(wrapper_height<this_height){wrapper_height=this_height}});post_active.each(function(i){var selector=jQuery(this).find('.uabb-blog-posts-shadow');selector.css("height",max_height);});grid.find('.slick-list.draggable').animate({height:max_height},{duration:200,easing:'linear'});max_height=-1;wrapper_height=-1;post_wrapper.each(function(){var $this=jQuery(this),selector=$this.find('.uabb-blog-posts-shadow'),blog_post=$this.find('.uabb-blog-post-inner-wrap'),blog_post_height=blog_post.outerHeight();if($this.hasClass('slick-active')){return true;}
selector.css('height',blog_post_height);});},_uabbBlogPostMesonryHeight:function(){var id=this.id,nodeClass='.fl-node-'+id,max_height=-1,wrapper_height=-1;if(this.is_carousel=='masonary'){var grid=$(nodeClass).find('.uabb-blog-posts-masonary');}else if(this.is_carousel=='grid'){var grid=$(nodeClass).find('.uabb-blog-posts-grid');}
var post_wrapper=grid.find('.uabb-post-wrapper');post_wrapper.each(function(i){var this_height=$(this).outerHeight(),blog_post=$(this).find('.uabb-blog-post-inner-wrap'),blog_post_height=blog_post.outerHeight();if(max_height<blog_post_height){max_height=blog_post_height;}
if(wrapper_height<this_height){wrapper_height=this_height}});post_wrapper.each(function(i){var selector=jQuery(this).find('.uabb-blog-posts-shadow');selector.css("height",max_height);});},_uabbBlogPostImageResize:function(){var id=this.id,nodeClass=this.nodeClass,small_breakpoint=this.small_breakpoint,medium_breakpoint=this.medium_breakpoint,node=jQuery(nodeClass),grid=node.find('.uabb-blog-posts');grid.find('.uabb-post-wrapper').each(function(){var img_selector=jQuery(this).find('.uabb-post-thumbnail'),img_wrap_height=parseInt(img_selector.height()),img_height=parseInt(img_selector.find('img').height());if(!isNaN(img_wrap_height)&&!isNaN(img_height)){if(img_wrap_height>=img_height){img_selector.find('img').css('min-height','100%');}else{img_selector.find('img').css('min-height','');}}});}};})(jQuery);(function($){var document_width,document_height;var args={id:'5fa0e4073d3c8',pagination:'numbers',is_carousel:'grid',infinite:true,arrows:true,desktop:3,moduleUrl:'https://www.nus.edu.sg/cncs/wp-content/plugins/bb-ultimate-addon/modules/blog-posts',medium:2,small:1,slidesToScroll:1,prevArrow:'fas fa-angle-left',nextArrow:'fas fa-angle-right',autoplay:false,autoplaySpeed:1000,dots:false,small_breakpoint:767,medium_breakpoint:991,equal_height_box:'yes',uabb_masonary_filter_type:'buttons',mesonry_equal_height:'no',blog_image_position:'top'};jQuery(document).ready(function(){jQuery('.uabb-masonary-filters .uabb-masonary-current').trigger('click');var pattern=new RegExp('^\\d+$');var hashval=window.location.hash.substring(1);if(pattern.test(hashval)){if(hashval!=''){jQuery('.fl-node-5fa0e4073d3c8 .uabb-masonary-filters li').removeClass('uabb-masonary-current');jQuery('.fl-node-5fa0e4073d3c8 .uabb-masonary-filters li[data-filter=".uabb-masonary-cat-'+hashval+'"]').addClass('uabb-masonary-current');jQuery('.fl-node-5fa0e4073d3c8 .uabb-masonary-filters .uabb-masonary-filter-5fa0e4073d3c8.uabb-masonary-current').trigger('click');}}
document_width=$(document).width();document_height=$(document).height();UABBTrigger.addHook('uabb-accordion-click',function(argument,selector){var is_carousel='grid';var child_id=jQuery(selector+' .fl-module-blog-posts').data('node');if(child_id!==null){if(is_carousel==='carousel'){jQuery('.fl-node-'+child_id).find('.uabb-blog-posts-carousel').uabbslick('unslick');}
var child_args={id:child_id,is_carousel:'grid',infinite:true,arrows:true,desktop:3,medium:2,small:1,slidesToScroll:1,autoplay:false,autoplaySpeed:1000,small_breakpoint:767,medium_breakpoint:991,equal_height_box:'yes',blog_image_position:'top'};new UABBBlogPosts(child_args);}});UABBTrigger.addHook('uabb-modal-click',function(argument,selector){var is_carousel='grid';var child_id=jQuery(selector+' .fl-module-blog-posts').data('node');if(child_id!==null){if(is_carousel==='carousel'){jQuery('.fl-node-'+child_id).find('.uabb-blog-posts-carousel').uabbslick('unslick');}
var child_args={id:child_id,is_carousel:'grid',infinite:true,arrows:true,desktop:3,medium:2,small:1,slidesToScroll:1,autoplay:false,autoplaySpeed:1000,small_breakpoint:767,medium_breakpoint:991,equal_height_box:'yes',blog_image_position:'top'};new UABBBlogPosts(child_args);}});UABBTrigger.addHook('uabb-tab-click',function(argument,selector){var is_carousel='grid';var child_id=jQuery(selector+' .fl-module-blog-posts').data('node');if(child_id!==null){if(is_carousel==='carousel'){jQuery('.fl-node-'+child_id).find('.uabb-blog-posts-carousel').uabbslick('unslick');}
var child_args={id:child_id,is_carousel:'grid',infinite:true,arrows:true,desktop:3,medium:2,small:1,slidesToScroll:1,autoplay:false,autoplaySpeed:1000,small_breakpoint:767,medium_breakpoint:991,equal_height_box:'yes',blog_image_position:'top'};new UABBBlogPosts(child_args);}});});jQuery(window).on("load",function(){new UABBBlogPosts(args);});jQuery(window).resize(function(){if(document_width!==$(document).width()||document_height!==$(document).height()){document_width=$(document).width();document_height=$(document).height();new UABBBlogPosts(args);}});new UABBBlogPosts(args);})(jQuery);