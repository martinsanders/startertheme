var ClientConfig=function(n){n=n||{},ClientConfig.superclass.constructor.call(this,n)};Ext.extend(ClientConfig,Ext.Component,{page:{},window:{},grid:{},tree:{},panel:{},tabs:{},combo:{},config:{connector_url:""},inVersion:!1,destroyRTEs:function(n){for(var e=0;e<n.length;e++){var i=n[e];if(window.tinymce&&window.tinymce.editors&&window.tinymce.editors[i])window.tinymce.editors[i].remove();else if(window.CKEDITOR&&window.CKEDITOR.instances&&window.CKEDITOR.instances[i])CKEDITOR.instances[i].destroy();else if(window.$red){var o=$red("#"+i);o&&o.redactor&&o.redactor("core.destroy")}}}}),Ext.reg("clientconfig",ClientConfig),ClientConfig=new ClientConfig;