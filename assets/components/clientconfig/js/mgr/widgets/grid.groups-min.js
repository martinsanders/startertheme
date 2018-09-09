ClientConfig.grid.Groups=function(t){t=t||{},Ext.applyIf(t,{url:ClientConfig.config.connectorUrl,id:"clientconfig-grid-groups",baseParams:{action:"mgr/groups/getlist"},save_action:"mgr/groups/updatefromgrid",autosave:!0,emptyText:_("clientconfig.error.noresults"),fields:[{name:"id",type:"int"},{name:"label",type:"string"},{name:"description",type:"string"},{name:"sortorder",type:"int"},{name:"settings_count",type:"int"}],paging:!0,remoteSort:!0,columns:[{header:_("clientconfig.id"),dataIndex:"id",sortable:!0,width:.1},{header:_("clientconfig.label"),dataIndex:"label",editor:{xtype:"textfield"},sortable:!0,width:.3},{header:_("clientconfig.description"),dataIndex:"description",editor:{xtype:"textfield"},sortable:!0,width:.5},{header:_("clientconfig.settings_count"),dataIndex:"settings_count",sortable:!0,width:.1},{header:_("clientconfig.sortorder"),dataIndex:"sortorder",editor:{xtype:"numberfield",allowDecimal:!1,allowNegative:!1},sortable:!0,width:.1}],tbar:[{text:_("clientconfig.add_group"),handler:this.addGroup,scope:this},"->",{text:_("clientconfig.export_groups"),handler:this.exportGroups,scope:this},"-",{text:_("clientconfig.import_groups"),handler:this.importGroups,scope:this}]}),ClientConfig.grid.Groups.superclass.constructor.call(this,t)},Ext.extend(ClientConfig.grid.Groups,MODx.grid.Grid,{addGroup:function(){MODx.load({xtype:"clientconfig-window-group",listeners:{success:{fn:function(t){this.refresh()},scope:this},scope:this}}).show()},updateGroup:function(){var t=this.menu.record,e=MODx.load({xtype:"clientconfig-window-group",listeners:{success:{fn:function(t){this.refresh()},scope:this},scope:this},isUpdate:!0});e.setValues(t),e.show()},removeGroup:function(){var t=this.menu.record.id;MODx.msg.confirm({title:_("clientconfig.remove_group"),text:_("clientconfig.remove_group.confirm"),url:this.config.url,params:{action:"mgr/groups/remove",id:t},listeners:{success:{fn:function(t){this.refresh()},scope:this},scope:this}})},getMenu:function(t){var e=[];return e.push({text:_("clientconfig.update_group"),handler:this.updateGroup,scope:this},"-",{text:_("clientconfig.remove_group"),handler:this.removeGroup,scope:this}),e},exportGroups:function(){Ext.Msg.confirm(_("clientconfig.export_groups"),_("clientconfig.export_groups.confirm"),function(t){"yes"==t&&(window.location=ClientConfig.config.connectorUrl+"?action=mgr/groups/export&HTTP_MODAUTH="+MODx.siteId)})},importGroups:function(){MODx.load({xtype:"clientconfig-window-import",title:_("clientconfig.import_groups"),introduction:_("clientconfig.import_groups.desc"),what:_("clientconfig.groups"),baseParams:{action:"mgr/groups/import"},listeners:{success:{fn:function(t){this.refresh()},scope:this},scope:this}}).show()}}),Ext.reg("clientconfig-grid-groups",ClientConfig.grid.Groups);