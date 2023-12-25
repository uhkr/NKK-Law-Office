var IS_PC;
var IS_SP;
var $NAV;
var $NAV_BTN;
var BOOL_NAV_ACTIVE = false;
function is_pc(){
  if(window.innerWidth > 900){
    IS_PC = true;
    return true;
  }else{
    IS_PC = false;
    return false;
  }
}
function is_sp(){
  if(window.innerWidth <= 480){
    IS_SP = true;
    return true;
  }else{
    IS_SP = false;
    return false;
  }
}

// ロード、リサイズ
$(window).on('load resize', function() {
  is_pc();
  is_sp();
});
// ロード
$(window).on('load', function (){
  $('#loading').fadeOut(800);
});

// トップへ戻る
$(function(){
  var bool_topReturn = false;
  var $topReturn = $('#top');
  $topReturn.hide();
  $(window).scroll(function () {
    if ($(this).scrollTop() > 500 && !bool_topReturn) {
      $topReturn.fadeIn();
      bool_topReturn = true;
    } else if($(this).scrollTop() <= 500 && bool_topReturn) {
      $topReturn.fadeOut();
      bool_topReturn = false;
    }
  });
});

// ヘッダー
$(function(){
  $NAV = $("#nav");
  $NAV_BTN = $("#headerBtn");
  $NAV_BTN.click(function(){
   if(BOOL_NAV_ACTIVE){
     $(this).removeClass("active");
     $NAV.removeClass("active");
     $NAV.fadeOut();
     BOOL_NAV_ACTIVE = false;
   }else{
     $(this).addClass("active");
     $NAV.addClass("active");
     $NAV.fadeIn();
     BOOL_NAV_ACTIVE = true;
   }
  });
  $NAV.find("a").click(function(){
    setTimeout(function(){
      $NAV_BTN.removeClass("active");
      $NAV.removeClass("active");
      $NAV.fadeOut();
      BOOL_NAV_ACTIVE = false;
    }, 300);
  });
});

// ページ内リンク
$(function(){
  $('a[href^="#"]').click(function(){
    var speed = 500;
    var href= $(this).attr("href");
    var target = $(href == "#" || href == "" ? 'html' : href);
    var position = target.offset().top;
    $("html, body").animate({scrollTop:position}, speed, "swing");
    return false;
  });
});

// デバイス判定
$(function(){
  const ua = navigator.userAgent;
  if (ua.indexOf('iPhone') > -1 || (ua.indexOf('Android') > -1 && ua.indexOf('Mobile') > -1)) {
      $("body").addClass('userAgent-sp');
  } else if (ua.indexOf('iPad') > -1 || ua.indexOf('Android') > -1) {
    $("body").addClass('userAgent-tab');
  } else {
    $("body").addClass('userAgent-pc');
  }
});

// text-overflow
$(function(){
  var original_html = [];
  $(".js-overflow").each(function(){
    original_html.push($(this).html()) 
  });
  function setOverflow(){
    $targets = $(".js-overflow");
    for (let i = 0; i < $targets.length; i++) {
      const elem = $targets[i];
      var $target = $(elem);
      var lh = $target.data("lh");
      var line = $target.data("line");
      if(!IS_PC){
        if($target.data("sp-lh")) lh = $target.data("sp-lh");
        if($target.data("sp-line")) line = $target.data("sp-line");
      }
      if(!lh){ lh = 1; }
      // オリジナルの文章を取得する
      var html = original_html[i];
      // 対象の要素を、高さにautoを指定し非表示で複製する
      var $clone = $target.clone();
      $clone.css({
        display: 'none',
        position : 'absolute',
        overflow : 'visible',
        lineHeight : lh,
      }).width($target.width()).height('auto');
      $clone.html(html)
      // DOMを一旦追加
      $target.after($clone);
      // 指定した高さになるまで、1文字ずつ消去していく
      if(line){
        var height = parseInt($target.css('font-size')) * lh * line + 2;
        while((html.length > 0) && (parseInt($clone.height()) > height)) {
          html = html.substr(0, html.length - 1);
          $clone.html(html + '...');
        }
        // 文章を入れ替えて、複製した要素を削除する
        $target.css('line-height', lh);
        $target.html($clone.html());
      }
      $clone.remove();
    }
  }
  $(window).on("load resize", function() {
    setOverflow();
  });
});

// 新着情報
$(function(){
  if(!$("#_info")) return;

  var slick;
  var slick_seminar;

  $('#_info .cntList-nav .item').click(function(){
    $("#_info .cntList").removeClass("active");
    $("#_info .cntList-nav .item").removeClass("active");
    $("#_info .cntList.-"+$(this).data("cat")).addClass("active");
    $(this).addClass("active");
    if($(this).data("cat") == "seminar"){
      slick_seminar.slick('setPosition');
    }else{
      slick.slick('setPosition');
    }
  });

  slick = $('#_info .cntList:not(.-seminar)').slick({
    arrows: false,
    dots: false,
    draggable: false,
    infinite: false,
    speed: 300,
    rows: 4,
    centerMode: false,
    responsive: [
      {
        breakpoint: 480,
        settings: {
          arrows: true,
          draggable: true,
          rows: 2,
        }
      }
    ],
  });
  slick_seminar = $('#_info .cntList.-seminar').slick({
    arrows: false,
    dots: false,
    draggable: false,
    infinite: false,
    speed: 300,
    slidesToShow: 4,
    centerMode: false,
    responsive: [
      {
        breakpoint: 899,
        settings: {
          arrows: true,
          draggable: true,
          slidesToShow: 2,
        }
      }
    ],
  });
});

// アコーディオン
$(function(){
  $(window).on('load', function() {
    $("._Slider").each(function(){
      if($(this).hasClass("active")){
        $(this).next().show();
      }else{
        $(this).next().hide();
      }
    });
  });
  $(window).on('load resize', function() {
    var $sliders = $("._Slider-tabsp");
    if(IS_PC){
      $sliders.next().css("display","");
    }else{
      $sliders.each(function(){
        if($(this).hasClass("active")){
          $(this).next().show();
        }else{
          $(this).next().hide();
        }
      });
    }
  });
  $("._Slider, ._Slider-tabsp").click(function(){
    if(IS_PC && $(this).hasClass("_Slider-tabsp")) return;
    if($(this).hasClass("active")){
      $(this).next().slideUp();
      $(this).removeClass("active");
    }else{
      $(this).next().slideDown();
      $(this).addClass("active");
    }
  });
});