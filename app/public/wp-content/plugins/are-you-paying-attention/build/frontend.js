!function(){"use strict";var e={n:function(n){var t=n&&n.__esModule?function(){return n.default}:function(){return n};return e.d(t,{a:t}),t},d:function(n,t){for(var r in t)e.o(t,r)&&!e.o(n,r)&&Object.defineProperty(n,r,{enumerable:!0,get:t[r]})},o:function(e,n){return Object.prototype.hasOwnProperty.call(e,n)}},n=window.wp.element,t=(window.React,window.ReactDOM),r=e.n(t);function o(e){return(0,n.createElement)("div",{className:"paying-attention-frontend"},(0,n.createElement)("p",null,e.question),(0,n.createElement)("ul",null,e.answers.map((function(e){return(0,n.createElement)("li",null,e)}))))}document.querySelectorAll(".paying-attention-update-me").forEach((function(e){const t=JSON.parse(e.querySelector("pre").innerHTML);r().render((0,n.createElement)(o,t),e),e.classList.remove("paying-attention-update-me")}))}();