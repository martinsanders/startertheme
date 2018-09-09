ace.define("ace/ext/chromevox",["require","exports","module","ace/editor","ace/config"],function(e,o,n){function t(){return"undefined"!=typeof cvox&&cvox&&cvox.Api}function c(e){if(t())he(e);else{if(++Se>=ke)return;window.setTimeout(c,500,e)}}var r={};r.SpeechProperty,r.Cursor,r.Token,r.Annotation;var i={rate:.8,pitch:.4,volume:.9},a={rate:1,pitch:.5,volume:.9},u={rate:.8,pitch:.8,volume:.9},s={rate:.8,pitch:.3,volume:.9},p={rate:.8,pitch:.7,volume:.9},d={rate:.8,pitch:.8,volume:.9},l={punctuationEcho:"none",relativePitch:-.6},f="ALERT_NONMODAL",v="ALERT_MODAL",m="INVALID_KEYPRESS",g="insertMode",A="start",h=[{substr:";",newSubstr:" semicolon "},{substr:":",newSubstr:" colon "}],S={SPEAK_ANNOT:"annots",SPEAK_ALL_ANNOTS:"all_annots",TOGGLE_LOCATION:"toggle_location",SPEAK_MODE:"mode",SPEAK_ROW_COL:"row_col",TOGGLE_DISPLACEMENT:"toggle_displacement",FOCUS_TEXT:"focus_text"},k="CONTROL + SHIFT ";r.editor=null;var E=null,x={},y=!1,w=!1,T=!1,C=null,b={},O={},_=function(e){return k+String.fromCharCode(e)},L=function(){return"ace/keyboard/vim"===r.editor.keyBinding.getKeyboardHandler().$id},N=function(e){return r.editor.getSession().getTokenAt(e.row,e.column+1)},K=function(e){return r.editor.getSession().getLine(e.row)},P=function(e){x[e.row]&&cvox.Api.playEarcon(f),y?(cvox.Api.stop(),V(e),X(N(e)),q(e.row,1)):q(e.row,0)},I=function(e){var o=K(e),n=o.substr(e.column-1);return 0===e.column&&(n=" "+o),null!==/^\W(\w+)/.exec(n)},M={constant:{prop:i},entity:{prop:u},keyword:{prop:s},storage:{prop:p},variable:{prop:d},meta:{prop:a,replace:[{substr:"</",newSubstr:" closing tag "},{substr:"/>",newSubstr:" close tag "},{substr:"<",newSubstr:" tag start "},{substr:">",newSubstr:" tag end "}]}},D={prop:D},G=function(e,o){for(var n=e,t=0;t<o.length;t++){var c=o[t],r=new RegExp(c.substr,"g");n=n.replace(r,c.newSubstr)}return n},R=function(e,o,n){var t={};t.value="",t.type=e[o].type;for(var c=o;c<n;c++)t.value+=e[c].value;return t},B=function(e){if(e.length<=1)return e;for(var o=[],n=0,t=1;t<e.length;t++){var c=e[n],r=e[t];H(c)!==H(r)&&(o.push(R(e,n,t)),n=t)}return o.push(R(e,n,e.length)),o},F=function(e){var o=r.editor.getSession().getLine(e);return null!==/^\s*$/.exec(o)},q=function(e,o){var n=r.editor.getSession().getTokens(e);if(0===n.length||F(e))return void cvox.Api.playEarcon("EDITABLE_TEXT");n=B(n);var t=n[0];n=n.filter(function(e){return e!==t}),U(t,o),n.forEach(X)},W=function(e){U(e,0)},X=function(e){U(e,1)},H=function(e){if(e&&e.type){var o=e.type.split(".");if(0!==o.length){var n=o[0],t=M[n];return t||D}}},U=function(e,o){var n=H(e),t=G(e.value,h);n.replace&&(t=G(t,n.replace)),cvox.Api.speak(t,o,n.prop)},V=function(e){var o=K(e);cvox.Api.speak(o[e.column],1)},J=function(e,o){var n=K(o),t=n.substring(e.column,o.column);t=t.replace(/ /g," space "),cvox.Api.speak(t)},Y=function(e,o){if(1!==Math.abs(e.column-o.column)){var n=K(o).length;if(0===o.column||o.column===n)return void q(o.row,0);if(I(o))return cvox.Api.stop(),void X(N(o))}V(o)},$=function(e,o){r.editor.selection.isEmpty()?w?J(e,o):Y(e,o):(J(e,o),cvox.Api.speak("selected",1))},j=function(e){if(T)return void(T=!1);var o=r.editor.selection.getCursor();o.row!==E.row?P(o):$(E,o),E=o},z=function(e){r.editor.selection.isEmpty()&&cvox.Api.speak("unselected")},Q=function(e){switch(data.action){case"remove":cvox.Api.speak(data.text,0,l),T=!0;break;case"insert":cvox.Api.speak(data.text,0),T=!0}},Z=function(e){var o=e.row,n=e.column;return!x[o]||!x[o][n]},ee=function(e){x={};for(var o=0;o<e.length;o++){var n=e[o],t=n.row,c=n.column;x[t]||(x[t]={}),x[t][c]=n}},oe=function(e){var o=r.editor.getSession().getAnnotations();o.filter(Z).length>0&&cvox.Api.playEarcon(f),ee(o)},ne=function(e){var o=e.type+" "+e.text+" on "+ce(e.row,e.column);o=o.replace(";","semicolon"),cvox.Api.speak(o,1)},te=function(e){var o=x[e];for(var n in o)ne(o[n])},ce=function(e,o){return"row "+(e+1)+" column "+(o+1)},re=function(){cvox.Api.speak(ce(E.row,E.column))},ie=function(){for(var e in x)te(e)},ae=function(){if(L())switch(r.editor.keyBinding.$data.state){case g:cvox.Api.speak("Insert mode");break;case A:cvox.Api.speak("Command mode")}},ue=function(){y=!y,y?cvox.Api.speak("Speak location on row change enabled."):cvox.Api.speak("Speak location on row change disabled.")},se=function(){w=!w,w?cvox.Api.speak("Speak displacement on column changes."):cvox.Api.speak("Speak current character or word on column changes.")},pe=function(e){if(e.ctrlKey&&e.shiftKey){var o=b[e.keyCode];o&&o.func()}},de=function(e,o){if(L()){var n=o.keyBinding.$data.state;if(n!==C){switch(n){case g:cvox.Api.playEarcon(v),cvox.Api.setKeyEcho(!0);break;case A:cvox.Api.playEarcon(v),cvox.Api.setKeyEcho(!1)}C=n}}},le=function(e){var o=e.detail.customCommand,n=O[o];n&&(n.func(),r.editor.focus())},fe=function(){var e=ge.map(function(e){return{desc:e.desc+_(e.keyCode),cmd:e.cmd}}),o=document.querySelector("body");o.setAttribute("contextMenuActions",JSON.stringify(e)),o.addEventListener("ATCustomEvent",le,!0)},ve=function(e){e.match?q(E.row,0):cvox.Api.playEarcon(m)},me=function(){r.editor.focus()},ge=[{keyCode:49,func:function(){te(E.row)},cmd:S.SPEAK_ANNOT,desc:"Speak annotations on line"},{keyCode:50,func:ie,cmd:S.SPEAK_ALL_ANNOTS,desc:"Speak all annotations"},{keyCode:51,func:ae,cmd:S.SPEAK_MODE,desc:"Speak Vim mode"},{keyCode:52,func:ue,cmd:S.TOGGLE_LOCATION,desc:"Toggle speak row location"},{keyCode:53,func:re,cmd:S.SPEAK_ROW_COL,desc:"Speak row and column"},{keyCode:54,func:se,cmd:S.TOGGLE_DISPLACEMENT,desc:"Toggle speak displacement"},{keyCode:55,func:me,cmd:S.FOCUS_TEXT,desc:"Focus text"}],Ae=function(){r.editor=editor,editor.getSession().selection.on("changeCursor",j),editor.getSession().selection.on("changeSelection",z),editor.getSession().on("change",Q),editor.getSession().on("changeAnnotation",oe),editor.on("changeStatus",de),editor.on("findSearchBox",ve),editor.container.addEventListener("keydown",pe),E=editor.selection.getCursor()},he=function(e){Ae(),ge.forEach(function(e){b[e.keyCode]=e,O[e.cmd]=e}),e.on("focus",Ae),L()&&cvox.Api.setKeyEcho(!1),fe()},Se=0,ke=15,Ee=e("../editor").Editor;e("../config").defineOptions(Ee.prototype,"editor",{enableChromevoxEnhancements:{set:function(e){e&&c(this)},value:!0}})}),function(){ace.require(["ace/ext/chromevox"],function(){})}();