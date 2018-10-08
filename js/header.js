$(document).ready(function() {
var head = $('#head');
var titulo = $('#tituloH1');
var btn_menu = $('#btn_menu');
var nav = $('#navbar');
var logo = $('#log');
var headAncho = $(head).width();

if (headAncho > 800) {
  $(titulo).attr('class', 'col-xs-1');
  $(titulo).attr('style', 'text-align:center; margin-top:15px');
  $(nav).attr('style', 'visibility: visible');
  $(logo).attr('style', 'visibility: visible');
  $(btn_menu).attr('style', 'visibility: hidden');
} else if (headAncho > 417) {
  $(titulo).attr('class', 'col-xs-1');
  $(titulo).attr('style', 'text-align:center; margin-top:15px');
  $(nav).attr('style', 'visibility: hidden');
  $(logo).attr('style', 'visibility: hidden');
  $(btn_menu).attr('style', 'visibility: hidden');
} else {
  $(titulo).attr('class', 'col-70');
  $(titulo).attr('style', 'text-align:left; font-size:32px; margin-top:-2px');
  $(nav).attr('style', 'visibility: hidden');
  $(logo).attr('style', 'visibility: hidden');
  $(btn_menu).attr('style', 'visibility: visible');
}

$(window).resize(function() {
  headAncho = $(head).width();
  console.log(headAncho);
  if (headAncho > 800) {
    $(titulo).attr('class', 'col-xs-1');
    $(titulo).attr('style', 'text-align:center; margin-top:15px');
    $(nav).attr('style', 'visibility: visible');
    $(logo).attr('style', 'visibility: visible');
    $(btn_menu).attr('style', 'visibility: hidden');
  } else if (headAncho > 417) {
    $(titulo).attr('class', 'col-xs-1');
    $(titulo).attr('style', 'text-align:center; margin-top:15px');
    $(nav).attr('style', 'visibility: hidden');
    $(logo).attr('style', 'visibility: hidden');
    $(btn_menu).attr('style', 'visibility: hidden');
  } else {
    $(titulo).attr('class', 'col-70');
    $(titulo).attr('style', 'text-align:left; font-size:32px; margin-top:-2px');
    $(nav).attr('style', 'visibility: hidden');
    $(logo).attr('style', 'visibility: hidden');
    $(btn_menu).attr('style', 'visibility: visible');
  }
});

});
