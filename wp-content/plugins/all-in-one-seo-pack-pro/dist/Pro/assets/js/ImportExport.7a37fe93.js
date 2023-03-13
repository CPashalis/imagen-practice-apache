import{a as k,m as n,c as v}from"./vuex.esm.8fdeb4b6.js";import{C as d,S as b}from"./index.7f221297.js";import{C as l}from"./Card.c59372cc.js";import{C as S}from"./Index.6dd703b2.js";import{C as c}from"./NetworkSiteSelector.60f32d7e.js";import{C as y}from"./Tooltip.68a8a92b.js";import{S as x}from"./Plus.6984df43.js";import{S as w}from"./Caret.19b10233.js";import{S as C}from"./History.3424d012.js";import{S as B}from"./Refresh.8f2b379b.js";import{n as a}from"./_plugin-vue2_normalizer.61652a7c.js";import{G as p,a as u}from"./Row.830f6397.js";import{d as O}from"./WpTable.3c2ff867.js";import"./default-i18n.3a91e0e5.js";import"./constants.6399c725.js";import"./index.27dba198.js";import"./SaveChanges.e40a9083.js";import{B as h}from"./Checkbox.60ba2f56.js";import{S as E}from"./Upload.93e86260.js";import{S as _}from"./Download.ef366516.js";import{C as I}from"./Blur.f36c594d.js";import{C as A}from"./Index.dc1072bb.js";import"./client.e62d6c37.js";import"./_commonjsHelpers.f84db168.js";import"./translations.c394afe3.js";import"./helpers.871dba46.js";import"./portal-vue.esm.98f2e05b.js";import"./Slide.15a07930.js";import"./attachments.f493e563.js";import"./cleanForSlug.5e4ade1a.js";import"./isArrayLikeObject.8300bb8d.js";import"./html.68197829.js";import"./Checkmark.f26f6201.js";const R={components:{CoreAlert:d,CoreCard:l,CoreModal:S,CoreNetworkSiteSelector:c,CoreTooltip:y,SvgCirclePlus:x,SvgClose:w,SvgHistory:C,SvgRefresh:B,SvgTrash:b},data(){return{site:null,timeout:null,backupToDelete:null,backupToRestore:null,backupsDeleteSuccess:!1,showModal:!1,backupsRestoreSuccess:!1,loading:!1,strings:{backupSettings:this.$t.__("Backup Settings",this.$td),areYouSureDeleteBackup:this.$t.__("Are you sure you want to delete this backup?",this.$td),areYouSureRestoreBackup:this.$t.__("Are you sure you want to restore this backup?",this.$td),yesDeleteBackup:this.$t.__("Yes, I want to delete this backup",this.$td),yesRestoreBackup:this.$t.__("Yes, I want to restore this backup",this.$td),noChangedMind:this.$t.__("No, I changed my mind",this.$td),actionCannotBeUndone:this.$t.__("This action cannot be undone.",this.$td),noBackups:this.$t.__("You have no saved backups.",this.$td),createBackup:this.$t.__("Create Backup",this.$td),restore:this.$t.__("Restore",this.$td),delete:this.$t.__("Delete",this.$td),backupSuccessfullyDeleted:this.$t.__("Success! The backup was deleted.",this.$td),backupSuccessfullyRestored:this.$t.__("Success! The backup was restored.",this.$td)}}},computed:{...k(["backups","networkBackups"]),getBackups(){return this.site?this.networkBackups[this.site.blog_id]||[]:this.backups},areYouSure(){return this.backupToDelete?this.strings.areYouSureDeleteBackup:this.strings.areYouSureRestoreBackup},iAmSure(){return this.backupToDelete?this.strings.yesDeleteBackup:this.strings.yesRestoreBackup}},methods:{...n(["createBackup","deleteBackup","restoreBackup"]),processCreateBackup(){this.loading=!0,this.createBackup({siteId:this.site?this.site.blog_id:null}).then(()=>{this.loading=!1})},maybeDeleteBackup(i){this.showModal=!0,this.backupToRestore=null,this.backupToDelete=i},maybeRestoreBackup(i){this.showModal=!0,this.backupToDelete=null,this.backupToRestore=i},processDeleteBackup(){this.loading=!0,this.deleteBackup({backup:this.backupToDelete,siteId:this.site?this.site.blog_id:null}).then(()=>{clearTimeout(this.timeout),this.loading=!1,this.showModal=!1,this.backupToDelete=null,this.backupsDeleteSuccess=!0,this.timeout=setTimeout(()=>{this.backupsDeleteSuccess=!1,this.backupsRestoreSuccess=!1},3e3)})},processRestoreBackup(){this.loading=!0,this.restoreBackup({backup:this.backupToRestore,siteId:this.site?this.site.blog_id:null}).then(()=>{clearTimeout(this.timeout),this.loading=!1,this.showModal=!1,this.backupToRestore=null,this.backupsRestoreSuccess=!0,this.timeout=setTimeout(()=>{this.backupsDeleteSuccess=!1,this.backupsRestoreSuccess=!1},3e3)})},getBackupName(i){const t=this.$dateTime.fromMillis(i*1e3).setZone(this.$dateTime.local().zoneName);return this.$t.sprintf(this.$t.__("%1$s at %2$s",this.$td),"<strong>"+t.toFormat("MMMM d, yyyy")+"</strong>","<strong>"+t.toFormat("h:mma ZZZZ")+"</strong>")},processBackupAction(){return this.backupToDelete?this.processDeleteBackup():this.processRestoreBackup()}}};var T=function(){var t=this,s=t._self._c;return s("core-card",{staticClass:"aioseo-backup-settings",attrs:{slug:"backupSettings",toggles:!1,"no-slide":"","header-text":t.strings.backupSettings},scopedSlots:t._u([{key:"header-icon",fn:function(){return[s("svg-history")]},proxy:!0}])},[t.$aioseo.data.isNetworkAdmin?s("div",{staticClass:"aioseo-settings-row"},[s("div",{staticClass:"select-site"},[t._v(" "+t._s(t.strings.selectSite)+" ")]),s("core-network-site-selector",{on:{"selected-site":function(e){t.site=e}}})],1):t._e(),t.backupsDeleteSuccess?s("core-alert",{attrs:{type:"green"}},[t._v(" "+t._s(t.strings.backupSuccessfullyDeleted)+" ")]):t._e(),t.backupsRestoreSuccess?s("core-alert",{attrs:{type:"green"}},[t._v(" "+t._s(t.strings.backupSuccessfullyRestored)+" ")]):t._e(),t.getBackups.length?t._e():s("div",{staticClass:"aioseo-section-description"},[t._v(" "+t._s(t.strings.noBackups)+" ")]),t.getBackups.length&&!(t.$aioseo.data.isNetworkAdmin&&!t.site)?[s("div",{staticClass:"backups-table"},[s("div",{staticClass:"backups-rows"},t._l(t.getBackups,function(e,r){return s("div",{key:r,staticClass:"backup-row",class:{even:r%2===0}},[s("div",{staticClass:"backup-name",domProps:{innerHTML:t._s(t.getBackupName(e))}}),s("div",{staticClass:"backup-actions"},[s("core-tooltip",{attrs:{type:"action"},scopedSlots:t._u([{key:"tooltip",fn:function(){return[t._v(" "+t._s(t.strings.restore)+" ")]},proxy:!0}],null,!0)},[s("svg-refresh",{nativeOn:{click:function(o){return t.maybeRestoreBackup(e)}}})],1),s("core-tooltip",{attrs:{type:"action"},scopedSlots:t._u([{key:"tooltip",fn:function(){return[t._v(" "+t._s(t.strings.delete)+" ")]},proxy:!0}],null,!0)},[s("svg-trash",{nativeOn:{click:function(o){return t.maybeDeleteBackup(e)}}})],1)],1)])}),0)])]:t._e(),s("base-button",{attrs:{type:"blue",size:"medium",loading:t.loading,disabled:t.$aioseo.data.isNetworkAdmin&&!t.site},on:{click:t.processCreateBackup}},[s("svg-circle-plus"),t._v(" "+t._s(t.strings.createBackup)+" ")],1),t.showModal?s("core-modal",{attrs:{"no-header":""},on:{close:function(e){t.showModal=!1}},scopedSlots:t._u([{key:"body",fn:function(){return[s("div",{staticClass:"aioseo-modal-body"},[s("button",{staticClass:"close",on:{click:function(e){e.stopPropagation(),t.showModal=!1}}},[s("svg-close",{on:{click:function(e){t.showModal=!1}}})],1),s("h3",[t._v(t._s(t.areYouSure))]),s("div",{staticClass:"reset-description",domProps:{innerHTML:t._s(t.strings.actionCannotBeUndone)}}),s("base-button",{attrs:{type:"blue",size:"medium"},on:{click:t.processBackupAction}},[t._v(" "+t._s(t.iAmSure)+" ")]),s("base-button",{attrs:{type:"gray",size:"medium"},on:{click:function(e){t.showModal=!1}}},[t._v(" "+t._s(t.strings.noChangedMind)+" ")])],1)]},proxy:!0}],null,!1,1131809547)}):t._e()],2)},D=[],F=a(R,T,D,!1,null,null,null,null);const m=F.exports;const P={components:{BaseCheckbox:h,CoreCard:l,CoreNetworkSiteSelector:c,GridColumn:p,GridRow:u,SvgUpload:E},mixins:[O],data(){return{site:null,options:{},postOptions:{},loading:!1,strings:{selectSite:this.$t.__("Select Site",this.$td),exportSettings:this.$t.__("Export Settings",this.$td),allSettings:this.$t.__("Export All Settings",this.$td),allPostTypes:this.$t.__("Export All Post Types",this.$td)}}},computed:{canExport(){if(this.$aioseo.data.isNetworkAdmin&&!this.site)return!1;const i=[];return Object.keys(this.options).forEach(t=>{i.push(this.options[t])}),Object.keys(this.postOptions).forEach(t=>{i.push(this.postOptions[t])}),i.some(t=>t)},canExportPostOptions(){return["aioseo_page_general_settings","aioseo_page_advanced_settings","aioseo_page_schema_settings","aioseo_page_social_settings","aioseo_page_local_seo_settings"].some(i=>this.$allowed(i))}},methods:{...n(["exportSettings"]),processExportSettings(){const i=[];this.options.all?(this.$isPro&&i.push("general"),i.push("internal"),this.toolsSettings.filter(e=>e.value!=="all").forEach(e=>{i.push(e.value)})):Object.keys(this.options).forEach(e=>{this.options[e]&&i.push(e)});const t=[];this.postOptions.all?this.$aioseo.postData.postTypes.forEach(e=>{t.push(e.name)}):Object.keys(this.postOptions).forEach(e=>{this.postOptions[e]&&t.push(e)});const s=this.site?`${this.site.domain}${this.site.path.replace("/","-")}`:"";this.loading=!0,this.exportSettings({settings:i,postOptions:t,siteId:this.site?this.site.blog_id:null}).then(e=>{this.loading=!1,this.options={},this.postOptions={};const r=new Blob([JSON.stringify(e.body.settings)],{type:"application/json"}),o=document.createElement("a");o.href=URL.createObjectURL(r),o.download=`aioseo-export-settings-${s}${this.$dateTime.now().toFormat("yyyy-MM-dd")}.json`,o.click(),URL.revokeObjectURL(o.href)})}}};var U=function(){var t=this,s=t._self._c;return s("core-card",{staticClass:"aioseo-export-settings",attrs:{slug:"exportSettings",toggles:!1,"no-slide":"","header-text":t.strings.exportSettings},scopedSlots:t._u([{key:"header-icon",fn:function(){return[s("svg-upload")]},proxy:!0}])},[t.$aioseo.data.isNetworkAdmin?s("div",{staticClass:"aioseo-settings-row"},[s("div",{staticClass:"select-site"},[t._v(" "+t._s(t.strings.selectSite)+" ")]),s("core-network-site-selector",{on:{"selected-site":function(e){t.site=e}}})],1):t._e(),s("div",{staticClass:"export-settings",class:{"aioseo-settings-row":t.canExportPostOptions}},[s("grid-row",[s("grid-column",{staticClass:"export-all"},[s("base-checkbox",{attrs:{size:"medium",disabled:t.$aioseo.data.isNetworkAdmin&&!t.site},model:{value:t.options.all,callback:function(e){t.$set(t.options,"all",e)},expression:"options.all"}},[t._v(" "+t._s(t.strings.allSettings)+" ")])],1),t._l(t.toolsSettings,function(e,r){return s("grid-column",{key:r,attrs:{sm:"6"}},[t.options.all?t._e():s("base-checkbox",{attrs:{size:"medium",disabled:t.$aioseo.data.isNetworkAdmin&&!t.site},model:{value:t.options[e.value],callback:function(o){t.$set(t.options,e.value,o)},expression:"options[setting.value]"}},[t._v(" "+t._s(e.label)+" ")]),e.value!=="all"&&t.options.all?s("base-checkbox",{attrs:{size:"medium",value:!0,disabled:""}},[t._v(" "+t._s(e.label)+" ")]):t._e()],1)})],2)],1),t.canExportPostOptions?s("div",{staticClass:"export-post-types"},[s("grid-row",[s("grid-column",{staticClass:"export-all"},[s("base-checkbox",{attrs:{size:"medium",disabled:t.$aioseo.data.isNetworkAdmin&&!t.site},model:{value:t.postOptions.all,callback:function(e){t.$set(t.postOptions,"all",e)},expression:"postOptions.all"}},[t._v(" "+t._s(t.strings.allPostTypes)+" ")])],1),t._l(t.$aioseo.postData.postTypes,function(e,r){return s("grid-column",{key:r,attrs:{sm:"6"}},[t.postOptions.all?t._e():s("base-checkbox",{attrs:{size:"medium",disabled:t.$aioseo.data.isNetworkAdmin&&!t.site},model:{value:t.postOptions[e.name],callback:function(o){t.$set(t.postOptions,e.name,o)},expression:"postOptions[postType.name]"}},[t._v(" "+t._s(e.label)+" ")]),e.name!=="all"&&t.postOptions.all?s("base-checkbox",{attrs:{size:"medium",value:!0,disabled:""}},[t._v(" "+t._s(e.label)+" ")]):t._e()],1)})],2)],1):t._e(),s("base-button",{staticClass:"import",attrs:{type:"blue",size:"medium",disabled:!t.canExport,loading:t.loading},on:{click:t.processExportSettings}},[t._v(" "+t._s(t.strings.exportSettings)+" ")])],1)},M=[],N=a(P,U,M,!1,null,null,null,null);const g=N.exports;const z={components:{CoreAlert:d,CoreCard:l,CoreNetworkSiteSelector:c,SvgDownload:_},data(){return{site:null,inputFile:null,filename:null,file:null,uploadError:!1,uploadSuccess:!1,loading:!1,strings:{selectSite:this.$t.__("Select Site",this.$td),importRestoreAioseoSettings:this.$t.sprintf(this.$t.__("Import / Restore %1$s Settings",this.$td),"AIOSEO"),fileUploadPlaceholder:this.$t.__("Import from a JSON or INI file...",this.$td),chooseAFile:this.$t.__("Choose a File",this.$td),fileUploadDescription:this.$t.__("Imported settings will overwrite existing settings and will not be merged.",this.$td),import:this.$t.__("Import",this.$td),jsonFileTypeRequired:this.$t.__("A JSON or INI file is required to import settings.",this.$td),fileUploadedSuccessfully:this.$t.__("Success! Your settings have been imported.",this.$td),fileUploadFailed:this.$t.__("There was an error importing your settings. Please make sure you are uploading the correct file or it is in the proper format.",this.$td),v3ImportWarning:this.$t.sprintf(this.$t.__("Please note that if you are importing post/term meta from %1$s v3.7.1 or below, this will only be successful if the post/term IDs of this site are identical to those of the source site.",this.$td),"AIOSEO")}}},computed:{importValidated(){return!(this.$aioseo.data.isNetworkAdmin&&!this.site||!this.file.type||!this.file.name||this.file.type!=="application/json"&&!this.file.name.endsWith(".ini"))}},methods:{...n(["uploadFile"]),reset(){this.uploadError=!1,this.filename=null,this.file=null,this.inputFile=null},triggerFileUpload(){this.reset(),this.$refs.file.$el.querySelector("input").focus(),this.$refs.file.$el.querySelector("input").click()},submitFile(){this.loading=!0,this.uploadFile({file:this.file,filename:this.filename,siteId:this.site?this.site.blog_id:null}).then(()=>{this.reset(),this.uploadSuccess=!0,this.loading=!1}).catch(()=>{this.reset(),this.loading=!1,this.uploadError=this.strings.fileUploadFailed})},handleFileUpload(){this.reset(),this.file=this.$refs.file.$el.querySelector("input").files[0],this.file&&(this.filename=this.file.name,this.file.type!=="application/json"&&!this.file.name.endsWith(".ini")&&(this.uploadError=this.strings.jsonFileTypeRequired))}}};var j=function(){var t=this,s=t._self._c;return s("core-card",{staticClass:"aioseo-import-aioseo",attrs:{slug:"importAioseoSettings",toggles:!1,"no-slide":"","header-text":t.strings.importRestoreAioseoSettings},scopedSlots:t._u([{key:"header-icon",fn:function(){return[s("svg-download")]},proxy:!0}])},[t.$aioseo.data.isNetworkAdmin?s("div",{staticClass:"aioseo-settings-row"},[s("div",{staticClass:"select-site"},[t._v(" "+t._s(t.strings.selectSite)+" ")]),s("core-network-site-selector",{on:{"selected-site":function(e){t.site=e}}})],1):t._e(),t.uploadError?s("core-alert",{staticClass:"import-alert",attrs:{type:"red"}},[t._v(" "+t._s(t.uploadError)+" ")]):t._e(),t.filename&&t.filename.endsWith(".ini")?s("core-alert",{staticClass:"import-alert",attrs:{type:"yellow"}},[t._v(" "+t._s(t.strings.v3ImportWarning)+" ")]):t._e(),t.uploadSuccess?s("core-alert",{staticClass:"import-alert",attrs:{type:"green"}},[t._v(" "+t._s(t.strings.fileUploadedSuccessfully)+" ")]):t._e(),s("div",{staticClass:"file-upload"},[s("base-input",{class:{"aioseo-error":t.uploadError},attrs:{size:"medium",placeholder:t.strings.fileUploadPlaceholder,disabled:t.$aioseo.data.isNetworkAdmin&&!t.site},on:{focus:t.triggerFileUpload},model:{value:t.filename,callback:function(e){t.filename=e},expression:"filename"}}),s("base-button",{attrs:{type:"black",size:"medium",disabled:t.$aioseo.data.isNetworkAdmin&&!t.site},on:{click:t.triggerFileUpload}},[t._v(" "+t._s(t.strings.chooseAFile)+" ")])],1),s("base-input",{ref:"file",attrs:{type:"file"},on:{click:t.reset,change:t.handleFileUpload},model:{value:t.inputFile,callback:function(e){t.inputFile=e},expression:"inputFile"}}),s("div",{staticClass:"aioseo-description"},[t._v(" "+t._s(t.strings.fileUploadDescription)+" ")]),s("base-button",{staticClass:"import",attrs:{type:"blue",size:"medium",disabled:!t.file||!t.importValidated,loading:t.loading},on:{click:t.submitFile}},[t._v(" "+t._s(t.strings.import)+" ")])],1)},Y=[],L=a(z,j,Y,!1,null,null,null,null);const f=L.exports;const q={components:{BaseCheckbox:h,CoreAlert:d,CoreCard:l,CoreNetworkSiteSelector:c,GridColumn:p,GridRow:u,SvgDownload:_},data(){return{site:null,importSuccess:!1,importError:!1,options:{},plugin:null,loading:!1,strings:{selectSite:this.$t.__("Select Site",this.$td),importSettingsFromOtherPlugins:this.$t.__("Import Settings From Other Plugins",this.$td),importOthersDescription:this.$t.sprintf(this.$t.__("Choose a plugin to import SEO data directly into %1$s.",this.$td),"AIOSEO"),selectPlugin:this.$t.__("Select a plugin...",this.$td),import:this.$t.__("Import",this.$td),allSettings:this.$t.__("All Settings",this.$td),notInstalled:this.$t.__("not installed",this.$td)}}},watch:{plugin(){this.importSuccess=!1,this.importError=!1,this.options={}}},computed:{settings(){const i=[{value:"settings",label:this.$t.__("SEO Settings",this.$td)},{value:"postMeta",label:this.$t.__("Post Meta",this.$td)}];return this.$isPro&&i.push({value:"termMeta",label:this.$t.__("Term Meta",this.$td)}),i},plugins(){const i=[];return this.$aioseo.importers.forEach(t=>{i.push({value:t.slug,label:t.name,canImport:t.canImport,version:t.version,$isDisabled:!t.installed})}),i},canImport(){if(this.$aioseo.data.isNetworkAdmin&&!this.site)return!1;const i=[];return Object.keys(this.options).forEach(t=>{i.push(this.options[t])}),i.some(t=>t)},importSuccessful(){return this.$t.sprintf(this.$t.__("%1$s was successfully imported!",this.$td),this.plugin.label)},importErrorMessage(){return this.$t.sprintf(this.$t.__("An error occurred while importing %1$s. Please try again.",this.$td),this.plugin.label)}},methods:{...n(["importPlugins"]),processImportPlugin(){this.importSuccess=!1,this.importError=!1,this.loading=!0;const i=[];this.options.all?this.settings.filter(t=>t.value!=="all").forEach(t=>{i.push(t.value)}):Object.keys(this.options).forEach(t=>{this.options[t]&&i.push(t)}),this.importPlugins({plugins:[{plugin:this.plugin.value,settings:i}],siteId:this.site?this.site.blog_id:null}).then(()=>{this.loading=!1,this.importSuccess=!0,this.options={}}).catch(()=>{this.loading=!1,this.importError=!0,this.options={}})},invalidVersion(i){return this.$t.sprintf(this.$t.__("We do not support importing from the currently installed version of %1$s (%2$s). Please upgrade to the latest version and try again.",this.$td),i.label,i.version)}}};var W=function(){var t=this,s=t._self._c;return s("core-card",{staticClass:"aioseo-import-others",attrs:{id:"aioseo-import-others",slug:"importOtherPlugins",toggles:!1,"no-slide":"","header-text":t.strings.importSettingsFromOtherPlugins},scopedSlots:t._u([{key:"header-icon",fn:function(){return[s("svg-download")]},proxy:!0}])},[t.$aioseo.data.isNetworkAdmin?s("div",{staticClass:"aioseo-settings-row"},[s("div",{staticClass:"select-site"},[t._v(" "+t._s(t.strings.selectSite)+" ")]),s("core-network-site-selector",{on:{"selected-site":function(e){t.site=e}}})],1):t._e(),s("div",{staticClass:"aioseo-section-description"},[t._v(" "+t._s(t.strings.importOthersDescription)+" ")]),t.importSuccess?s("core-alert",{staticClass:"import-success",attrs:{type:"green"}},[t._v(" "+t._s(t.importSuccessful)+" ")]):t._e(),t.importError?s("core-alert",{staticClass:"import-error",attrs:{type:"red"}},[t._v(" "+t._s(t.importErrorMessage)+" ")]):t._e(),s("base-select",{attrs:{size:"medium",options:t.plugins,placeholder:t.strings.selectPlugin,disabled:t.$aioseo.data.isNetworkAdmin&&!t.site},scopedSlots:t._u([{key:"option",fn:function({option:e}){return[s("div",{staticClass:"import-plugin-label"},[s("span",{staticClass:"plugin-label"},[t._v(t._s(e.label))]),e.$isDisabled?s("span",{staticClass:"plugin-status"},[t._v(t._s(t.strings.notInstalled))]):t._e()])]}}]),model:{value:t.plugin,callback:function(e){t.plugin=e},expression:"plugin"}}),t.plugin?s("div",{staticClass:"import-settings"},[t.plugin.canImport?s("grid-row",[s("grid-column",[s("base-checkbox",{attrs:{size:"medium"},model:{value:t.options.all,callback:function(e){t.$set(t.options,"all",e)},expression:"options.all"}},[t._v(" "+t._s(t.strings.allSettings)+" ")])],1),t._l(t.settings,function(e,r){return s("grid-column",{key:r,attrs:{sm:"6"}},[t.options.all?t._e():s("base-checkbox",{attrs:{size:"medium"},model:{value:t.options[e.value],callback:function(o){t.$set(t.options,e.value,o)},expression:"options[setting.value]"}},[t._v(" "+t._s(e.label)+" ")]),e.value!=="all"&&t.options.all?s("base-checkbox",{attrs:{size:"medium",value:!0,disabled:""}},[t._v(" "+t._s(e.label)+" ")]):t._e()],1)})],2):t._e(),t.plugin.canImport?t._e():s("core-alert",{attrs:{type:"red"}},[t._v(" "+t._s(t.invalidVersion(t.plugin))+" ")])],1):t._e(),s("base-button",{staticClass:"import",attrs:{type:"blue",size:"medium",disabled:!t.plugin||!t.canImport,loading:t.loading},on:{click:t.processImportPlugin}},[t._v(" "+t._s(t.strings.import)+" ")])],1)},H=[],Z=a(q,W,H,!1,null,null,null,null);const $=Z.exports;const G={components:{BackupSettings:m,GridColumn:p,GridRow:u,ExportSettings:g,ImportAioseo:f,ImportOthers:$}};var V=function(){var t=this,s=t._self._c;return s("div",{staticClass:"aioseo-tools-import-export"},[s("grid-row",[s("grid-column",{attrs:{md:"6"}},[s("import-aioseo"),s("import-others")],1),s("grid-column",{attrs:{md:"6"}},[s("export-settings")],1)],1),s("grid-row",[s("grid-column",[s("backup-settings")],1)],1)],1)},J=[],K=a(G,V,J,!1,null,null,null,null);const Q=K.exports;const X={components:{BackupSettings:m,CoreBlur:I,Cta:A,GridColumn:p,GridRow:u,ExportSettings:g,ImportAioseo:f,ImportOthers:$},data(){return{strings:{ctaHeader:this.$t.sprintf(this.$t.__("This feature is not available in your current plan.",this.$td),"AIOSEO","Pro"),ctaButtonText:this.$t.__("Upgrade Your Plan and Unlock Network Tools",this.$td),networkDatabaseToolsDescription:this.$t.__("Unlock network-level tools to manage all your sites from one easy-to-use location. Migrate data or create backups without the need to visit each dashboard.",this.$td)}}}};var tt=function(){var t=this,s=t._self._c;return s("div",{staticClass:"aioseo-tools-import-export"},[s("core-blur",[s("grid-row",[s("grid-column",{attrs:{md:"6"}},[s("import-aioseo"),s("import-others")],1),s("grid-column",{attrs:{md:"6"}},[s("export-settings")],1)],1),s("grid-row",[s("grid-column",[s("backup-settings")],1)],1)],1),s("cta",{attrs:{"cta-link":t.$links.getPricingUrl("network-tools","import-export"),"button-text":t.strings.ctaButtonText,"learn-more-link":t.$links.getUpsellUrl("network-tools","import-export","home")},scopedSlots:t._u([{key:"header-text",fn:function(){return[t._v(" "+t._s(t.strings.ctaHeader)+" ")]},proxy:!0},{key:"description",fn:function(){return[t._v(" "+t._s(t.strings.networkDatabaseToolsDescription)+" ")]},proxy:!0}])})],1)},st=[],et=a(X,tt,st,!1,null,null,null,null);const it=et.exports,ot={components:{ImportExport:Q,LiteImportExport:it},computed:{...v(["isUnlicensed"])}};var rt=function(){var t=this,s=t._self._c;return s("div",[!t.$aioseo.data.isNetworkAdmin||!t.isUnlicensed&&t.$license.hasCoreFeature("tools","network-tools-import-export")?s("import-export"):t._e(),t.$aioseo.data.isNetworkAdmin&&(t.isUnlicensed||!t.$license.hasCoreFeature("tools","network-tools-import-export"))?s("lite-import-export"):t._e()],1)},at=[],nt=a(ot,rt,at,!1,null,null,null,null);const jt=nt.exports;export{jt as default};
