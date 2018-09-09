ace.define("ace/ext/menu_tools/overlay_page",["require","exports","module","ace/lib/dom"],function(e,o,t){"use strict";var n=e("../../lib/dom");n.importCssString("#ace_settingsmenu, #kbshortcutmenu {background-color: #F7F7F7;color: black;box-shadow: -5px 4px 5px rgba(126, 126, 126, 0.55);padding: 1em 0.5em 2em 1em;overflow: auto;position: absolute;margin: 0;bottom: 0;right: 0;top: 0;z-index: 9991;cursor: default;}.ace_dark #ace_settingsmenu, .ace_dark #kbshortcutmenu {box-shadow: -20px 10px 25px rgba(126, 126, 126, 0.25);background-color: rgba(255, 255, 255, 0.6);color: black;}.ace_optionsMenuEntry:hover {background-color: rgba(100, 100, 100, 0.1);-webkit-transition: all 0.5s;transition: all 0.3s}.ace_closeButton {background: rgba(245, 146, 146, 0.5);border: 1px solid #F48A8A;border-radius: 50%;padding: 7px;position: absolute;right: -8px;top: -8px;z-index: 1000;}.ace_closeButton{background: rgba(245, 146, 146, 0.9);}.ace_optionsMenuKey {color: darkslateblue;font-weight: bold;}.ace_optionsMenuCommand {color: darkcyan;font-weight: normal;}"),t.exports.overlayPage=function(e,o,t,r,a,i){function c(e){27===e.keyCode&&d.click()}t=t?"top: "+t+";":"",a=a?"bottom: "+a+";":"",r=r?"right: "+r+";":"",i=i?"left: "+i+";":"";var d=document.createElement("div"),s=document.createElement("div");d.style.cssText="margin: 0; padding: 0; position: fixed; top:0; bottom:0; left:0; right:0;z-index: 9990; background-color: rgba(0, 0, 0, 0.3);",d.addEventListener("click",function(){document.removeEventListener("keydown",c),d.parentNode.removeChild(d),e.focus(),d=null}),document.addEventListener("keydown",c),s.style.cssText=t+r+a+i,s.addEventListener("click",function(e){e.stopPropagation()});var u=n.createElement("div");u.style.position="relative";var l=n.createElement("div");l.className="ace_closeButton",l.addEventListener("click",function(){d.click()}),u.appendChild(l),s.appendChild(u),s.appendChild(o),d.appendChild(s),document.body.appendChild(d),e.blur()}}),ace.define("ace/ext/menu_tools/get_editor_keyboard_shortcuts",["require","exports","module","ace/lib/keys"],function(e,o,t){"use strict";var n=e("../../lib/keys");t.exports.getEditorKeybordShortcuts=function(e){var o=n.KEY_MODS,t=[],r={};return e.keyBinding.$handlers.forEach(function(e){var o=e.commandKeyBinding;for(var n in o){var a=n.replace(/(^|-)\w/g,function(e){return e.toUpperCase()}),i=o[n];Array.isArray(i)||(i=[i]),i.forEach(function(e){"string"!=typeof e&&(e=e.name),r[e]?r[e].key+="|"+a:(r[e]={key:a,command:e},t.push(r[e]))})}}),t}}),ace.define("ace/ext/keybinding_menu",["require","exports","module","ace/editor","ace/ext/menu_tools/overlay_page","ace/ext/menu_tools/get_editor_keyboard_shortcuts"],function(e,o,t){"use strict";function n(o){if(!document.getElementById("kbshortcutmenu")){var t=e("./menu_tools/overlay_page").overlayPage,n=e("./menu_tools/get_editor_keyboard_shortcuts").getEditorKeybordShortcuts,r=n(o),a=document.createElement("div"),i=r.reduce(function(e,o){return e+'<div class="ace_optionsMenuEntry"><span class="ace_optionsMenuCommand">'+o.command+'</span> : <span class="ace_optionsMenuKey">'+o.key+"</span></div>"},"");a.id="kbshortcutmenu",a.innerHTML="<h1>Keyboard Shortcuts</h1>"+i+"</div>",t(o,a,"0","0","0",null)}}var r=e("ace/editor").Editor;t.exports.init=function(e){r.prototype.showKeyboardShortcuts=function(){n(this)},e.commands.addCommands([{name:"showKeyboardShortcuts",bindKey:{win:"Ctrl-Alt-h",mac:"Command-Alt-h"},exec:function(e,o){e.showKeyboardShortcuts()}}])}}),function(){ace.require(["ace/ext/keybinding_menu"],function(){})}();