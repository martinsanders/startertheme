FormIt.panel.Migrate=function(e){e=e||{},Ext.apply(e,{border:!1,baseCls:"modx-formpanel",id:"formit-migrate-panel",cls:"container",items:[{html:"<h2>"+_("formit")+" - "+_("formit.migrate")+"</h2>",border:!1,cls:"modx-page-header"},{xtype:"modx-panel",defaults:{border:!1,autoHeight:!0},border:!0,activeItem:0,hideMode:"offsets",cls:"x-tab-panel-bwrap main-wrapper",items:[{html:"<p>"+_("formit.migrate_desc")+"</p>",border:!1}]},{xtype:"modx-panel",defaults:{border:!1,autoHeight:!0},border:!0,activeItem:0,hideMode:"offsets",cls:"x-tab-panel-bwrap main-wrapper",items:[{html:"<h2>"+_("formit.migrate_status")+"</h2>",border:!1},{id:"formit-migrate-panel-status",html:"",border:!1}]}],listeners:{render:{fn:this.migrateRedirects,scope:this}}}),FormIt.panel.Migrate.superclass.constructor.call(this,e)},Ext.extend(FormIt.panel.Migrate,MODx.Panel,{migrateRedirects:function(){MODx.Ajax.request({url:FormIt.config.connectorUrl,params:{action:"mgr/form/migrate"},listeners:{success:{fn:function(e){if(e.total){var t;0==e.total?(t="<p>"+_("formit.migrate_success_msg")+"</p>",MODx.msg.alert(_("formit.migrate_success"),_("formit.migrate_success_msg"),function(){location.href=MODx.config.manager_url+"?a=home&namespace="+MODx.request.namespace})):(t="<p>"+_("formit.migrate_running")+"</p>",Ext.getCmp("formit-migrate-panel").fireEvent("render")),Ext.getCmp("formit-migrate-panel-status").update(t)}},scope:this},failure:{fn:function(e){},scope:this}}})}}),Ext.reg("formit-panel-migrate",FormIt.panel.Migrate);