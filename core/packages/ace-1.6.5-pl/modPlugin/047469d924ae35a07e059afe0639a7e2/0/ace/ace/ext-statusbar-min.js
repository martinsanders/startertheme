ace.define("ace/ext/statusbar",["require","exports","module","ace/lib/dom","ace/lib/lang"],function(e,t,n){"use strict";var a=e("ace/lib/dom"),i=e("ace/lib/lang"),c=function(e,t){this.element=a.createElement("div"),this.element.className="ace_status-indicator",this.element.style.cssText="display: inline-block;",t.appendChild(this.element);var n=i.delayedCall(function(){this.updateStatus(e)}.bind(this));e.on("changeStatus",function(){n.schedule(100)}),e.on("changeSelection",function(){n.schedule(100)})};(function(){this.updateStatus=function(e){function t(e,t){e&&n.push(e,t||"|")}var n=[];t(e.keyBinding.getStatusText(e)),e.commands.recording&&t("REC");var a=e.selection.lead;if(t(a.row+":"+a.column," "),!e.selection.isEmpty()){var i=e.getSelectionRange();t("("+(i.end.row-i.start.row)+":"+(i.end.column-i.start.column)+")")}n.pop(),this.element.textContent=n.join("")}}).call(c.prototype),t.StatusBar=c}),function(){ace.require(["ace/ext/statusbar"],function(){})}();