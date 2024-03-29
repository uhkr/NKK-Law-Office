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
$(window).on('load resize', function(e) {
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
  var pos = 0;
  $NAV = $("#nav");
  $NAV_BTN = $("#headerBtn");
  $NAV_BTN.click(function(){
    if(BOOL_NAV_ACTIVE){
      $('body').removeClass('-fixed').css({'top': ""});
      $(window).scrollTop(pos);
      $(this).removeClass("active");
      $NAV.removeClass("active");
      $NAV.fadeOut();
      BOOL_NAV_ACTIVE = false;
    }else{
      pos = $(window).scrollTop();
      $('body').addClass('-fixed').css({'top': -pos});
      $(this).addClass("active");
      $NAV.addClass("active");
      $NAV.fadeIn();
      BOOL_NAV_ACTIVE = true;
    }
  });
  $NAV.find("a").click(function(){
    $('body').removeClass('-fixed').css({'top': ""});
    setTimeout(function(){
      $NAV_BTN.removeClass("active");
      $NAV.removeClass("active");
      $NAV.fadeOut();
      BOOL_NAV_ACTIVE = false;
    }, 300);
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
          adaptiveHeight: true,
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
          adaptiveHeight: true,
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

// お問い合わせ
$(window).on('load onpageshow', function (){
  const $check = $("#input-privacy[type='checkbox']");
  if(!$check.length) return;
  const $items_check = $(".js-contact-check");
  const $items_form = $(".js-contact-form");
  const $hidden = $("#_form-privacy-hidden input[type='checkbox']");
  if($hidden.prop("checked") == true){
    $items_check.hide();
    $items_form.show();
  }else{
    $items_check.show();
    $items_form.hide();
  }
  $("#button-privacy").click(function(){
    if($check.prop("checked") == true){
      $items_check.hide();
      $items_form.show();
      $(window).scrollTop(0);
      $hidden.attr("checked", true).prop("checked", true).change();
    }else{
      $("#error-privacy").show();
    }
  });
});

// 投稿タイトル・目次
$(function(){
  const $cntBox = $("#_post .cntBox");
  const $toc = $("#toc_container .toc_list");
  if(!$cntBox) return;
  var h1_index = 0;
  var h3_index = 0;
  var h4_index = 0;
  var h5_index = 0;
  var h6_index = 0;
  var hierarchy = 0;
  var index = 0;
  var html = "";
  $cntBox.find("h1, h2, h3, h4, h5, h6").each(function(){
    var localName = $(this).prop("localName");
    var num = ('00' + index).slice(-2);
    $(this).prop("id", "title-" + num);
    if($(this).hasClass("is-style-numbered")){
      var h = "";
      switch(localName){
        case "h1":
        case "h2":
          h1_index++;
          h = '<span class="num">' + ('00' + h1_index).slice(-2) + ".</span>" + $(this).html();
          break;
        case "h3":
          h3_index++;
          h = '<span class="num">' + ('00' + h3_index).slice(-2) + ".</span>" + $(this).html();
          break;
        case "h4":
          h4_index++;
          h = '<span class="num">' + ('00' + h4_index).slice(-2) + ".</span>" + $(this).html();
          break;
        case "h5":
          h5_index++;
          h = '<span class="num">' + ('00' + h5_index).slice(-2) + ".</span>" + $(this).html();
          break;
        case "h6":
          h6_index++;
          h = '<span class="num">' + ('00' + h6_index).slice(-2) + ".</span>" + $(this).html();
          break;
      }
      $(this).html(h)
    }
    if(localName == "h1" || localName == "h2"){
      if(hierarchy > 0){
        hierarchy = 0;
        h3_index = 0;
        h4_index = 0;
        h5_index = 0;
        h6_index = 0;
        html += "</ul>";
      }
      html += '<li><a class="js-offset-100" href="#title-'+ num +'">'+ $(this).html() +'</a>';
    }else if(localName == "h3" || localName == "h4" || localName == "h5"){
      if(hierarchy === 0){
        html += "<ul>";
      }else if(localName == "h3" && hierarchy > 3){
        h4_index = 0;
        h5_index = 0;
      }else if(localName == "h4" && hierarchy > 4){
        h5_index = 0;
      }
      h6_index = 0;
      hierarchy = Number((localName).slice(-1));
      html += '<li><a class="js-offset-100" href="#title-'+ num +'">'+ $(this).html() +'</a></li>';
    }
    index++;
  });
  if(hierarchy > 0){
    hierarchy = 0;
    html += "</ul>";
  }
  html += "</li>";
  $toc.html(html);
  if(index < 3){
    $("#toc_container").hide();
  }
  const hash = location.hash;
  if(hash && hash.startsWith("#title-")){
    const $target = $(hash);
    if($target){
      $("html, body").animate({scrollTop:$target.offset().top - 100}, 500, "swing");
    }
  }
});

// 取扱業務
var $SERVICE_LIST = [];
var $SERVICE_TITLE;
$(window).on('load resize', function(e) {

  if(e.type == "load"){
    $SERVICE_LIST = $("#_services .cntList");
    $SERVICE_TITLE = $SERVICE_LIST.find(".js-htit");
  }
  if(!$SERVICE_LIST.length) return;

  if(IS_PC){
    $SERVICE_LIST.each(function(){
      var $titles = $(this).find(".js-htit");
      $titles.each(function(index){
        var height = $(this).children(".txt").height();
        var fsize = $(this).css("font-size").replace("px", "");
        if(height > (fsize * 2)){
          if(index % 2 === 0){
            $titles.eq(index + 1).css("height", height);
          }else{
            $titles.eq(index - 1).css("height", height);
          }
        }else{
          if(index % 2 === 0){
            $titles.eq(index + 1).css("height", "");
          }else{
            $titles.eq(index - 1).css("height", "");
          }
        }
        index++;
      });
    });
  }else{
    $SERVICE_TITLE.css("height", "");
  }
});

// ページ内リンク
$(function(){
  $('a[href^="#"]').click(function(){
    var speed = 500;
    var href= $(this).attr("href");
    var target = $(href == "#" || href == "" ? 'html' : href);
    var position = target.offset().top;
    if($(this).hasClass("js-offset-100")) position -= 100;
    $("html, body").animate({scrollTop:position}, speed, "swing");
    return false;
  });
});