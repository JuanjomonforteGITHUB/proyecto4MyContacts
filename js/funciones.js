// '.tbl-content' consumed little space for vertical scrollbar, scrollbar width depend on browser/os/platfrom. Here calculate the scollbar width .
$(window).on("load resize ", function() {
  var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
  $('.tbl-header').css({'padding-right':scrollWidth});
}).resize();
/*global $, alert, console, confrim, prompt, parseInt*/
$(function () {
    "use strict";
    $('.wrapper-login .viewport-login .tabs > div').on('click', function () {
        var $this       = $(this),
            forms       = $('.wrapper-login .viewport-login .forms'),
            formLogin   = $('.wrapper-login .viewport-login .forms > .form-login');
        $this.addClass('active').siblings('div').removeClass('active');
        if ($this.hasClass('btn-sign')) {
            forms.children('form')[0].reset();
            forms.animate({
                scrollLeft : formLogin.width()
            }, 300);
        } else {
            forms.children('form')[1].reset();
            forms.animate({
                scrollLeft : 0
            }, 300);
        }
    });
    // Hide Placeholder
    var inputLogin      = $('.wrapper-login .viewport-login .forms .form-group input'),
        placeLogin      = $('.wrapper-login .viewport-login .forms .form-group .place');
    inputLogin.on('focus', function () {
        var $this = $(this);
        $this.parent().addClass('on');
        $this.focusin();
    });
    inputLogin.on('blur', function () {
        var $this = $(this);
        if ($this.val().length < 1) {
            $this.parent().removeClass('on');
        }
    });
    placeLogin.on('click', function () {
        var $this = $(this);
        $this.parent().addClass('on');
        $this.parent().find('input').focus();
    });
    $('.eye-btn').on('click', function () {
        var $this       = $(this),
            pass        = $this.parent().find('.eye-pass'),
            $thisEye    = $this.children('i');
        $thisEye.toggleClass('fa-eye-slash');
        $thisEye.hasClass('fa-eye-slash') ? pass.attr('type', 'text') : pass.attr('type', 'password');
        pass.focus();
    });
});


$(".profile").addClass("pre-enter");
setTimeout(function(){
    $(".profile").addClass("on-enter");
}, 500);
setTimeout(function(){
    $(".profile").removeClass("pre-enter on-enter");
}, 3000);

/***********************************************************************************/

function funeliminarusuari() {
    confirm("Estas segur que vols donar-te de baixa de MyContacts?");
}
