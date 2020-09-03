/*
	SocialShare
*/

/*
Plugin Name: socialShare
Version: 1.0
Plugin URI: https://github.com/tolgaergin/social
Description: To share any page with 46 icons 
Author: Tolga Ergin
Author URI: http://tolgaergin.com
Designer: Gökhun Güneyhan
Designer URI: http://gokhunguneyhan.com
*/

/* PLUGIN USAGE */
/* 
$('#clickable').socialShare({
      social: 'blogger,delicious,digg,facebook,friendfeed,google,linkedin,myspace,pinterest,reddit,stumbleupon,tumblr,twitter,windows,yahoo'
    });
*/

! function(e) {

    "use strict";

    e.fn.extend({
        socialShare: function(t) {
            function a() {
                if (window.getSelection) return window.getSelection();
                if (document.getSelection) return document.getSelection();
                var e = document.selection && document.selection.createRange();
                return e.text ? e.text : !1
            }

            function r(t, a, r) {
                var i = e(t);
                i.each(function(t) {
                    e(this).delay(t * a).fadeTo(a, r)
                })
            }

            function i() {
                for (var a = {
                        facebook: {
                            text: "Facebook",
                            className: "facebook",
                            url: "http://www.facebook.com/sharer.php?u={u}",
                            svg: '<use x="0" y="0" xlink:href="#i-facebook"></use>',
                            da: ""
                        },
                        twitter: {
                            text: "Twitter",
                            className: "twitter",
                            url: "http://twitter.com/home?status={t}%20{u}",
                            svg: '<use x="0" y="0" xlink:href="#i-twitter"></use>',
                            da: ""
                        },
                        google: {
                            text: "Google+",
                            className: "googleplus",
                            url: "https://plus.google.com/share?url={u}",
                            svg: '<use x="0" y="0" xlink:href="#i-googleplus"></use>',                            
                            da: ""
                        },
                        pinterest: {
                            text: "Pinterest",
                            className: "pinterest",
                            url: "http://pinterest.com/pin/create/button/?url={u}&amp;media={m}&amp;description={t}",
                            svg: '<use x="0" y="0" xlink:href="#i-pinterest"></use>',                                                        
                            da: ""
                        },
                        linkedin: {
                            text: "LinkedIn",
                            className: "linkedin",
                            url: "http://www.linkedin.com/shareArticle?mini=true&amp;url={u}&amp;title={t}&amp;ro=false&amp;summary=&amp;source=",
                            svg: '<use x="0" y="0" xlink:href="#i-linkedin"></use>',                                                                                    
                            da: ""
                        },
                        vkontakte: {
                            text: "VKontakte",
                            className: "vkontakte",
                            url: "http://vk.com/share.php?url={u}&amp;title={t}&amp;image={m}",
                            svg: '<use x="0" y="0" xlink:href="#i-vkontakte"></use>',                                                                                                                
                            da: ""
                        },
                        whatsapp: {
                            text: "WhatsApp",
                            className: "whatsapp",
                            url: "https://api.whatsapp.com/send?text={u}",
                            svg: '<use x="0" y="0" xlink:href="#i-whatsapp"></use>',
                            da: "data-action='share/whatsapp/share'"
                        },
                        telegram: {
                            text: "Telegram",
                            className: "telegram",
                            url: "https://t.me/share/url?url={u}",
                            svg: '<use x="0" y="0" xlink:href="#i-telegram"></use>',
                            da: ""
                        },  
                        viber: {
                            text: "Viber",
                            className: "viber",
                            url: "viber://forward?text={u}",
                            svg: '<use x="0" y="0" xlink:href="#i-viber"></use>',
                            da: ""
                        },                                                
                        blogger: {
                            text: "Blogger",
                            className: "blogger",
                            url: "http://www.blogger.com/blog_this.pyra?t=&amp;u={u}&amp;n={t}",
                            svg: '<use x="0" y="0" xlink:href="#i-blogger"></use>',                                                                                                                                            
                            da: ""
                        },

                       
                    }, r = t.social.split(","), i = "", o = 0; o <= r.length - 1; o++) a[r[o]].url = a[r[o]].url.replace("{t}", encodeURIComponent(t.title)).replace("{u}", encodeURI(t.shareUrl)).replace("{d}", encodeURIComponent(t.description)).replace("{m}", encodeURI(t.mediaUrl)), i += '<li class="' + a[r[o]].className + '"><a href="' + a[r[o]].url + '" target="_blank" ' + a[r[o]].da + "><svg class='svg-icon' viewBox='0 0 24 24' enable-background='new 0 0 24 24' xml:space='preserve'>" + a[r[o]].svg + "</svg><span class='s-circle_bg'></span></a></li>";
                e("body").append(d + i + u)
            }

            function o(t) {
                t.blur && e("body").removeClass("photoswipe-blur"), e(".arthrefSocialShare").find(".overlay").removeClass("active"), e(".arthrefSocialShare").find("ul").removeClass("active"), setTimeout(function() {
                    e(".arthrefSocialShare").find(".overlay").css("display", "none"), e(".arthrefSocialShare").remove()
                }, 300)
            }
            var l = {
                social: "",
                title: document.title,
                shareUrl: window.location.href,
                description: e('meta[name="description"]').attr("content"),
                mediaUrl: e(".social-sharing").attr("data-shareimg"),
                animation: "launchpad",
                chainAnimationSpeed: 100,
                whenSelect: !1,
                selectContainer: "body",
                blur: !1
            };
            if (e("#page-wrap").hasClass("mc-dark")) var s = "sdark";
            else var s = "";
            var t = e.extend(!0, l, t),
                n = e(".box-share-master-container, .post-share-container").attr("data-name"),
                c = e(".social-sharing").attr("data-name"),
                d = '<div class="arthref arthrefSocialShare ' + s + '"><div class="overlay ' + t.animation + '"><div class="icon-container"><div class="centered"><div class="share-title"><h4>' + n + "</h4><h1>" + c + '</h1></div><ul class="social-icons">',
                u = "</ul></div></div></div></div>";
            return this.each(function() {
                var l = t,
                    s = e(this);
                l.whenSelect && e(l.selectContainer).mouseup(function(e) {
                    var r = a();
                    r && (r = new String(r).replace(/^\s+|\s+$/g, "")) && (t.title = r)
                }), 
                s.on('click', function() {
                    i(), l.blur && (e(".arthrefSocialShare").find(".overlay").addClass("opaque"), e("body").not(".arthref, script").addClass("photoswipe-blur")), e(".arthrefSocialShare").find(".overlay").css("display", "block"), setTimeout(function() {
                        e(".arthrefSocialShare").find(".overlay").addClass("active"), e(".arthrefSocialShare").find("ul").addClass("active"), "chain" == l.animation && r(e(".arthrefSocialShare").find("li"), l.chainAnimationSpeed, "1")
                    }, 0)
                }), e(document).on("click touchstart", ".arthrefSocialShare .overlay", function(e) {
                    o(l)
                }), e(document).on("keydown", function(e) {
                    27 == e.keyCode && o(l)
                }), e(document).on("click touchstart", ".arthrefSocialShare li", function(e) {
                    e.stopPropagation()
                })
            })
        }
    })
}(jQuery);