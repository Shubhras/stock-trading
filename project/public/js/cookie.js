/* (window.webpackJsonp=window.webpackJsonp||[]).push([[2],{182:function(t,n,o){o(183),t.exports=o(236)},183:function(t,n,o){"use strict";o.r(n);var i=o(2);iziToast.show({theme:"dark",message:Object(i.a)("app.cookie_consent"),class:"cookie-consent",close:!1,timeout:!1,position:"bottomCenter",buttons:[["<button><b>"+Object(i.a)("app.accept")+"</b></button>",function(t,n){axios.post("/cookie/accept").then((function(o){void 0!==o.data.success&&o.data.success&&t.hide({transitionOut:"fadeOut"},n,"button")}))}],["<button>"+Object(i.a)("app.privacy_policy")+"</button>",function(t,n){window.location.href="/page/privacy-policy"}]]})},2:function(t,n,o){"use strict";function i(t){return void 0!==window.i18n?e(window.i18n,t,t):t}function c(t){return void 0!==window.cfg?e(window.cfg,t):t}function e(t,n){var o=arguments.length>2&&void 0!==arguments[2]?arguments[2]:null;return function(n){for(var i=0,c=(n=n.split(".")).length;i<c;i++){if(void 0===t[n[i]])return o||void 0;t=t[n[i]]}return t}(n)}o.d(n,"a",(function(){return i})),o.d(n,"b",(function(){return c}))},236:function(t,n){}},[[182,0]]]); */











