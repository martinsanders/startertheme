FormIt.grid.Forms=function(t){t=t||{},Ext.applyIf(t,{id:"formit-grid-forms",url:FormIt.config.connectorUrl,baseParams:{action:"mgr/form/getlist"},fields:["id","form","values","ip","date","hash"],autoHeight:!0,paging:!0,remoteSort:!0,columns:[{header:_("id"),dataIndex:"id"},{header:_("formit.form"),dataIndex:"form"},{header:_("formit.values"),dataIndex:"values",width:250,renderer:function(t){t=JSON.parse(t);var e="";for(var r in t)e+="<b>"+r+"</b>: "+t[r]+"\n";return e}},{header:_("formit.date"),dataIndex:"date",width:250,renderer:function(t){return Date.parseDate(t,"U").format("Y/m/d H:i")}},{header:_("formit.hash"),dataIndex:"hash"}]}),FormIt.grid.Forms.superclass.constructor.call(this,t)},Ext.extend(FormIt.grid.Forms,MODx.grid.Grid,{windows:{},getMenu:function(){var t=[];t.push({text:_("formit.form_view"),handler:this.viewItem}),t.push("-"),t.push({text:_("formit.form_remove"),handler:this.remove}),this.addContextMenuItem(t)},viewItem:function(t,e){if(!this.menu.record)return!1;var r=JSON.parse(this.menu.record.values),o="";for(var i in r)o+="<b>"+i+"</b>: "+r[i]+"<br/>";var a=Date.parseDate(this.menu.record.date,"U");new Ext.Window({title:_("formit.values"),modal:!0,width:640,height:400,preventBodyReset:!0,html:"<p><b>"+_("formit.date")+":</b> "+a.format("Y/m/d H:i")+"<br/><b>"+_("formit.ip")+":</b> "+this.menu.record.ip+"</p><hr/>"+o}).show()},remove:function(t,e){if(!this.menu.record)return!1;MODx.msg.confirm({title:_("formit.form_remove"),text:_("formit.form_remove_confirm"),url:FormIt.config.connectorUrl,params:{action:"mgr/form/remove",id:this.menu.record.id},listeners:{success:{fn:function(t){this.refresh()},scope:this}}})},search:function(t,e,r){this.getStore().baseParams.query=t.getValue(),this.getBottomToolbar().changePage(1),this.refresh()},export:function(t,e){var r={action:"mgr/form/export",form:Ext.getCmp("form").getValue(),context_key:Ext.getCmp("context").getValue(),startDate:Ext.util.Format.date(Ext.getCmp("startdate").getValue(),"Y-m-d"),endDate:Ext.util.Format.date(Ext.getCmp("enddate").getValue(),"Y-m-d"),download:!1,limit:0,HTTP_MODAUTH:MODx.siteId},o=FormIt.config.connectorUrl+"?"+Ext.urlEncode(r);window.open(o,"_blank").focus()}}),Ext.reg("formit-grid-forms",FormIt.grid.Forms);