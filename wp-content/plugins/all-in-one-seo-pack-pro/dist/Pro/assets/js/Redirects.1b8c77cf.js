import{c as m,a as c,m as l,b as $}from"./vuex.esm.8fdeb4b6.js";import{W as R}from"./WpTable.3c2ff867.js";import"./default-i18n.3a91e0e5.js";import"./constants.6399c725.js";import{a as v,b,S as y}from"./Caret.19b10233.js";import{n as d}from"./_plugin-vue2_normalizer.61652a7c.js";import"./index.27dba198.js";import{J as C}from"./JsonValues.870a4901.js";import"./SaveChanges.e40a9083.js";import{s as u}from"./strings.cb25b091.js";import{a as h,C as T,R as k}from"./Index.98511e6d.js";import{C as _,a as S}from"./index.7f221297.js";import{C as w}from"./Tooltip.68a8a92b.js";import{C as p}from"./Table.e3a46b6a.js";import{S as D}from"./Information.93f80cbf.js";import{C as g}from"./Index.dc1072bb.js";import{C as x}from"./Blur.f36c594d.js";import{C as U}from"./Card.c59372cc.js";import{R as L}from"./RequiredPlans.eec6eb26.js";const A={components:{CoreAddRedirection:h,CoreAlert:_,CoreModalPortal:T,CoreTooltip:w,CoreWpTable:p,SvgCircleCheck:v,SvgCircleClose:b,SvgCircleInformation:D,SvgCircleQuestionMark:S,SvgClose:y},mixins:[C,R,k],props:{showBulkActions:{type:Boolean,default(){return!0}},showTableFooter:{type:Boolean,default(){return!0}},showHeader:{type:Boolean,default(){return!0}},disableSource:{type:Boolean,default(){return!1}},excludeColumns:Array},data(){return{tableId:"aioseo-redirects-wp-table",queryUrls:[],deletingRow:!1,showDeleteModal:!1,shouldDeleteRow:null,changeItemsPerPageSlug:"redirects",strings:{searchUrls:this.$t.__("Search URLs",this.$td),edit:this.$t.__("Edit",this.$td),checkRedirect:this.$t.__("Check Redirect",this.$td),delete:this.$t.__("Delete",this.$td),areYouSureDeleteRedirect:this.$t.__("Are you sure you want to delete this redirect?",this.$td),areYouSureDeleteRedirects:this.$t.__("Are you sure you want to delete these redirects?",this.$td),actionCannotBeUndone:this.$t.__("This action cannot be undone.",this.$td),yesDeleteRedirect:this.$t.__("Yes, I want to delete this redirect",this.$td),yesDeleteRedirects:this.$t.__("Yes, I want to delete these redirects",this.$td),noChangedMind:this.$t.__("No, I changed my mind",this.$td),rules:this.$t.__("Rules",this.$td),customRules:this.$t.__("Custom Rules",this.$td),regex:this.$t.__("Regex",this.$td),redirectTest:this.$t.__("Check redirect for",this.$td),summary:this.$t.__("Summary",this.$td),errors:this.$t.__("Errors",this.$td),responseCode:this.$t.__("Response Code",this.$td),sourceUrl:this.$t.__("Source URL",this.$td),targetUrl:this.$t.__("Target URL",this.$td),xRedirectBy:this.$t.__("Redirected By",this.$td),customUrl:this.$t.__("Custom URL",this.$td),testUrl:this.$t.__("Test Redirect",this.$td),redirectResultOk:this.$t.__("Woohoo! Your redirect worked perfectly!",this.$td)+" 🎉",redirectResultError:this.$t.__("Whoops! Your URL failed to redirect properly.",this.$td)+" 🤔",expected:this.$t.__("Expected",this.$td),result:this.$t.__("Result",this.$td),regexNeedsUrl:this.$t.sprintf(this.$t.__("You are using %1$sRegex%2$s for this redirect so you will need to manually add a URL to test.",this.$td),"<strong>","</strong>")},bulkOptions:[{label:this.$t.__("Enable",this.$td),value:"enable"},{label:this.$t.__("Disable",this.$td),value:"disable"},{label:this.$t.__("Reset Hits",this.$td),value:"reset-hits"},{label:this.$t.__("Delete",this.$td),value:"delete"}],customRuleInfo:null,redirectTestInfo:null,redirectTestResult:null,redirectTestLoading:!1,redirectTestUrl:""}},watch:{rows:{deep:!0,handler(){this.wpTableKey+=1}}},computed:{...m("redirects",["rows","getCurrentFilter"]),...c("redirects",["filters","totals","options","selectedFilters","lateRedirectsRefresh"]),...c(["currentPost"]),areYouSureDeleteRedirect(){return Array.isArray(this.shouldDeleteRow)?this.strings.areYouSureDeleteRedirects:this.strings.areYouSureDeleteRedirect},yesDeleteRedirect(){return Array.isArray(this.shouldDeleteRow)?this.strings.yesDeleteRedirects:this.strings.yesDeleteRedirect},columns(){const r=[{slug:"source_url",label:this.$t.__("Source URL",this.$td),sortable:!0,sortDir:this.orderBy==="source_url"?this.orderDir:"asc",sorted:this.orderBy==="source_url"},{slug:"target_url",label:this.$t.__("Target URL",this.$td),sortable:!0,sortDir:this.orderBy==="target_url"?this.orderDir:"asc",sorted:this.orderBy==="target_url"},{slug:"hits",label:this.$t.__("Hits",this.$td),width:"97px",sortable:!0,sortDir:this.orderBy==="hits"?this.orderDir:"asc",sorted:this.orderBy==="hits"},{slug:"type",label:this.$t.__("Type",this.$td),width:"100px",sortable:!0,sortDir:this.orderBy==="type"?this.orderDir:"asc",sorted:this.orderBy==="type"},{slug:"group",label:this.$t.__("Group",this.$td),width:"150px",sortable:!0,sortDir:this.orderBy==="group"?this.orderDir:"asc",sorted:this.orderBy==="group"},{slug:"enabled",label:this.$constants.GLOBAL_STRINGS.enabled,width:"85px",sortable:!0,sortDir:this.orderBy==="enabled"?this.orderDir:"asc",sorted:this.orderBy==="enabled"},{slug:"actions",label:"",width:"40px"}];if(this.options.main.method==="server"){const e=r.findIndex(t=>t.slug==="hits");e!==-1&&this.$delete(r,e)}return this.excludeColumns&&this.excludeColumns.length?r.filter(e=>!this.excludeColumns.find(t=>t===e.slug)):r},additionalFilters(){return[{label:this.$t.__("Filter by Group",this.$td),name:"group",options:[{label:this.$t.__("All Groups",this.$td),value:"all"}].concat(this.$constants.REDIRECT_GROUPS)}]},getRows(){return this.rows.map(r=>(r.target_url=r.target_url||"-",r))}},methods:{...l("redirects",{fetchData:"fetchRedirects",bulk:"bulk",delete:"delete",test:"test"}),...l("redirects",["setLateRedirectsRefresh"]),toggleInput(r,e){this.wpTableLoading=!0,this.bulk({action:e?"disable":"enable",rowIds:[r.id]}).then(()=>this.processFetchTableData()).then(()=>this.wpTableLoading=!1)},processBulkAction({action:r,selectedRows:e}){if(e.length){if(r==="delete"){this.shouldDeleteRow=e,this.showDeleteModal=!0;return}this.wpTableLoading=!0,this.bulk({action:r,rowIds:e}).then(()=>this.processFetchTableData()).then(()=>this.wpTableLoading=!1)}},getColumnLabel(r){return r===0?this.$t.__("Pass through",this.$td):r},maybeDeleteRow(r){const e=this.rows.find((t,s)=>s===r);e&&(this.showDeleteModal=!0,this.shouldDeleteRow=e.id)},processDeleteRow(){if(this.deletingRow=!0,Array.isArray(this.shouldDeleteRow))return this.bulk({action:"delete",rowIds:this.shouldDeleteRow}).then(()=>{this.deletingRow=!1,this.showDeleteModal=!1,this.shouldDeleteRow=null,this.refreshTable()});this.delete(this.shouldDeleteRow).then(()=>{this.deletingRow=!1,this.showDeleteModal=!1,this.shouldDeleteRow=null,this.refreshTable()})},showCustomRuleInfo(r){this.customRuleInfo=r.custom_rules.map(e=>{switch(e.type){case"role":e.value=e.value.map(t=>t.charAt(0).toUpperCase()+t.slice(1));break}return e})},isObject(r){return typeof r=="object"},showRedirectTest(r){this.redirectTestResult=null,this.redirectTestUrl=r.regex?"":r.source_url,r.regex||this.redirectTest(r.id),this.redirectTestInfo=r},redirectTest(r){this.redirectTestLoading=!0,this.redirectTestResult=null,this.test({id:r,payload:{sourceUrl:this.redirectTestUrl}}).then(e=>{this.redirectTestLoading=!1,this.redirectTestResult=e.body}).catch(()=>{this.redirectTestLoading=!1})},customUrlDescription(r){const e=u(r.source_url.replace(this.$aioseo.urls.mainSiteUrl,""));return this.$t.sprintf(this.$t.__("You can test redirects with a URL that includes your domain name ( %1$s ) or just the path ( %2$s )",this.$td),this.$aioseo.urls.mainSiteUrl+e,e)},addedRedirectRefresh(){this.orderBy=null,this.orderDir="asc",this.refreshTable()},sanitizeString:u},mounted(){this.$bus.$on("added-redirect",this.addedRedirectRefresh),this.lateRedirectsRefresh&&(this.refreshTable(),this.setLateRedirectsRefresh(!1))},beforeDestroy(){this.$bus.$off("added-redirect",this.addedRedirectRefresh)}};var I=function(){var e=this,t=e._self._c;return t("div",{staticClass:"aioseo-redirects-table"},[t("core-wp-table",{key:e.wpTableKey,ref:"table",attrs:{id:e.tableId,"additional-filters":e.additionalFilters,"bulk-options":e.bulkOptions,columns:e.columns,filters:e.filters,"initial-items-per-page":e.$aioseo.settings.tablePagination.redirects,"initial-page-number":e.pageNumber,"initial-search-term":e.searchTerm,loading:e.wpTableLoading,rows:e.getRows,"search-label":e.strings.searchUrls,"selected-filters":e.selectedFilters,"show-bulk-actions":e.showBulkActions,"show-header":e.showHeader,"show-table-footer":e.showTableFooter,totals:e.totals.main,"show-items-per-page":""},on:{"filter-table":e.processFilterTable,paginate:e.processPagination,"process-additional-filters":e.processAdditionalFilters,"process-bulk-action":e.processBulkAction,"process-change-items-per-page":e.processChangeItemsPerPage,search:e.processSearch,"sort-column":e.processSort},scopedSlots:e._u([{key:"source_url",fn:function({row:s,index:i,column:a,editRow:n}){return[t("strong",[t("a",{staticClass:"edit-link",attrs:{href:"#"},on:{click:function(o){return o.preventDefault(),n(i)}}},[e._v(e._s(a))])]),t("div",{staticClass:"row-actions"},[t("span",{staticClass:"edit"},[t("a",{attrs:{href:"#"},on:{click:function(o){return o.preventDefault(),n(i)}}},[e._v(e._s(e.strings.edit))]),e._v(" | ")]),s.enabled&&!e.redirectHasUnPublishedPost(s)?t("span",{staticClass:"test"},[t("a",{attrs:{href:"#"},on:{click:function(o){return o.preventDefault(),e.showRedirectTest(s)}}},[e._v(e._s(e.strings.checkRedirect))]),e._v(" | ")]):e._e(),t("span",{staticClass:"trash"},[t("a",{staticClass:"submitdelete",attrs:{href:"#"},on:{click:function(o){return o.preventDefault(),e.maybeDeleteRow(i)}}},[e._v(e._s(e.strings.delete))])])])]}},{key:"type",fn:function({column:s}){return[e._v(" "+e._s(e.getColumnLabel(s))+" ")]}},{key:"group",fn:function({row:s}){return[e._v(" "+e._s(s.groupName)+" ")]}},{key:"enabled",fn:function({column:s,row:i}){return[t("div",{staticStyle:{"text-align":"right"}},[t("base-toggle",{attrs:{value:s},on:{input:function(a){return e.toggleInput(i,s)}}})],1)]}},{key:"edit-row",fn:function({row:s,editRow:i}){return[t("core-add-redirection",{attrs:{edit:"",url:{id:s.id,url:s.source_url,regex:s.regex,ignoreSlash:s.ignore_slash,ignoreCase:s.ignore_case,showOptions:!0,errors:[],warnings:[]},target:s.target_url,type:s.type,query:s.query_param,rules:s.custom_rules,disableSource:e.disableSource,"post-id":s.post_id,"post-status":s.postStatus},on:{cancel:function(a){return i(null)}}})]}},{key:"actions",fn:function({row:s}){return[s.custom_rules&&0<s.custom_rules.length?t("span",[t("core-tooltip",{attrs:{type:"action"},scopedSlots:e._u([{key:"tooltip",fn:function(){return[e._v(" "+e._s(e.strings.rules)+" ")]},proxy:!0}],null,!0)},[t("svg-circle-information",{staticClass:"log-info",nativeOn:{click:function(i){return e.showCustomRuleInfo(s)}}})],1)],1):e._e()]}}])}),e.showDeleteModal?t("core-modal-portal",{attrs:{classes:["aioseo-redirects-test-modal","aioseo-redirects","delete-redirect"],"no-header":""},on:{close:function(s){e.showDeleteModal=!1}},scopedSlots:e._u([{key:"body",fn:function(){return[t("div",{staticClass:"aioseo-modal-body"},[t("button",{staticClass:"close",on:{click:function(s){s.stopPropagation(),e.showDeleteModal=!1}}},[t("svg-close",{on:{click:function(s){e.showDeleteModal=!1}}})],1),t("h3",[e._v(e._s(e.areYouSureDeleteRedirect))]),t("div",{staticClass:"reset-description",domProps:{innerHTML:e._s(e.strings.actionCannotBeUndone)}}),t("base-button",{attrs:{type:"blue",size:"medium",loading:e.deletingRow},on:{click:e.processDeleteRow}},[e._v(" "+e._s(e.yesDeleteRedirect)+" ")]),t("base-button",{attrs:{type:"gray",size:"medium"},on:{click:function(s){e.showDeleteModal=!1}}},[e._v(" "+e._s(e.strings.noChangedMind)+" ")])],1)]},proxy:!0}],null,!1,1995483884)}):e._e(),e.customRuleInfo?t("core-modal-portal",{attrs:{classes:["aioseo-redirects","custom-rule-info"]},on:{close:function(s){e.customRuleInfo=null}},scopedSlots:e._u([{key:"headerTitle",fn:function(){return[e._v(" "+e._s(e.strings.customRules)+" ")]},proxy:!0},{key:"body",fn:function(){return[t("div",{staticClass:"aioseo-modal-body"},e._l(e.customRuleInfo,function(s,i){return t("div",{key:i},[t("div",{staticClass:"rule"},[t("strong",[e._v(e._s(e.$constants.REDIRECTS_CUSTOM_RULES_LABELS[s.type])+":")]),e._v(" "+e._s(typeof s.value!="object"&&!s.key?e.$constants.REDIRECTS_CUSTOM_RULES_LABELS[s.value]||s.value:"")+" "),e.isObject(s.value)?t("ul",e._l(s.value,function(a,n){return t("li",{key:n},[e._v(e._s(e.$constants.REDIRECTS_CUSTOM_RULES_LABELS[a]||a)+" ")])}),0):e._e(),s.key?t("ul",[t("li",[t("strong",[e._v(e._s(s.key)+":")]),e._v(" "+e._s(s.value))])]):e._e()]),s.regex?t("div",{staticClass:"regex"},[t("base-toggle",{attrs:{value:s.regex,disabled:!0}},[e._v(" "+e._s(e.strings.regex)+" ")])],1):e._e()])}),0)]},proxy:!0}],null,!1,68637198)}):e._e(),e.redirectTestInfo?t("core-modal-portal",{attrs:{classes:["aioseo-redirects-test-modal","aioseo-redirects","redirect-test"],"allow-overflow":""},on:{close:function(s){e.redirectTestInfo=null}},scopedSlots:e._u([{key:"headerTitle",fn:function(){return[t("div",{staticClass:"title"},[e._v(e._s(e.strings.redirectTest)+":")]),t("core-tooltip",{scopedSlots:e._u([{key:"tooltip",fn:function(){return[t("div",[e._v(" "+e._s(e.sanitizeString(e.redirectTestInfo.source_url))+" ")])]},proxy:!0}],null,!1,253470511)},[t("div",{staticClass:"source"},[e._v(e._s(e.sanitizeString(e.redirectTestInfo.source_url)))])])]},proxy:!0},{key:"body",fn:function(){return[t("div",{staticClass:"aioseo-modal-body"},[t("div",{staticClass:"custom-url"},[e.redirectTestInfo.regex?t("core-alert",{staticClass:"alert-regex",attrs:{type:"blue",size:"medium"}},[t("svg-circle-information"),t("span",{domProps:{innerHTML:e._s(e.strings.regexNeedsUrl)}})],1):e._e(),t("div",{staticClass:"label"},[e._v(" "+e._s(e.strings.customUrl)+" "),t("core-tooltip",{scopedSlots:e._u([{key:"tooltip",fn:function(){return[e._v(" "+e._s(e.customUrlDescription(e.redirectTestInfo))+" ")]},proxy:!0}],null,!1,4132920)},[t("svg-circle-question-mark")],1)],1),t("div",{staticClass:"custom-url-input"},[t("base-input",{attrs:{size:"medium",value:e.redirectTestUrl,disabled:e.redirectTestLoading},on:{input:s=>e.redirectTestUrl=s}}),t("base-button",{attrs:{type:"green",size:"medium",loading:e.redirectTestLoading},on:{click:function(s){return s.preventDefault(),e.redirectTest(e.redirectTestInfo.id)}}},[e._v(" "+e._s(e.strings.testUrl)+" ")])],1)],1),e.redirectTestResult?t("div",{staticClass:"redirect-results"},[t("div",{staticClass:"result"},[e.redirectTestResult.errors.length===0?t("core-alert",{attrs:{type:"green",size:"medium"}},[t("svg-circle-check"),e._v(" "+e._s(e.strings.redirectResultOk)+" ")],1):e._e(),0<e.redirectTestResult.errors.length?t("core-alert",{attrs:{type:"red",size:"medium"}},[t("svg-circle-close"),e._v(" "+e._s(e.strings.redirectResultError)+" ")],1):e._e()],1),t("div",{staticClass:"summary"},[t("div",{staticClass:"label"},[e._v(e._s(e.strings.summary))]),t("table",{staticClass:"redirects-options-table small",attrs:{"aria-label":"Redirect Check Results"}},[t("thead",[t("tr",[t("td"),t("td",[e._v(e._s(e.strings.expected))]),t("td",[e._v(e._s(e.strings.result))])])]),t("tbody",[t("tr",{staticClass:"even"},[t("td",[e._v(e._s(e.strings.responseCode)+":")]),t("td",[e._v(e._s(e.redirectTestInfo.type))]),t("td",[e._v(e._s(e.redirectTestResult.redirect.responseCode))])]),e.redirectTestResult.redirect.location?t("tr",[t("td",[e._v(e._s(e.strings.targetUrl)+":")]),t("td",[e._v(e._s(e.redirectTestResult.redirect.targetUrl))]),t("td",[e._v(e._s(e.redirectTestResult.redirect.location))])]):e._e(),e.redirectTestResult.redirect.xRedirectBy?t("tr",{staticClass:"even"},[t("td",[e._v(e._s(e.strings.xRedirectBy)+":")]),t("td",[e._v("AIOSEO")]),t("td",[e._v(e._s(e.redirectTestResult.redirect.xRedirectBy))])]):e._e()])])]),0<e.redirectTestResult.errors.length?t("div",{staticClass:"errors"},[t("div",{staticClass:"label"},[e._v(e._s(e.strings.errors))]),t("core-alert",{attrs:{type:"red",size:"medium"}},[t("ul",e._l(e.redirectTestResult.errors,function(s,i){return t("li",{key:i},[t("span",{domProps:{innerHTML:e._s(s)}})])}),0)])],1):e._e()]):e._e()])]},proxy:!0}],null,!1,2189264549)}):e._e()],1)},B=[],E=d(A,I,B,!1,null,null,null,null);const _e=E.exports,M={components:{CoreAddRedirection:h,CoreBlur:x,CoreCard:U,CoreWpTable:p},props:{noCoreCard:Boolean},data(){return{strings:{addNewRedirection:this.$t.__("Add New Redirection",this.$td),searchUrls:this.$t.__("Search URLs",this.$td)},bulkOptions:[{label:"",value:""}]}},computed:{columns(){return[{slug:"source_url",label:this.$t.__("Source URL",this.$td)},{slug:"target_url",label:this.$t.__("Target URL",this.$td)},{slug:"hits",label:this.$t.__("Hits",this.$td),width:"97px"},{slug:"type",label:this.$t.__("Type",this.$td),width:"100px"},{slug:"group",label:this.$t.__("Group",this.$td),width:"150px"},{slug:"enabled",label:this.$constants.GLOBAL_STRINGS.enabled,width:"80px"}]},additionalFilters(){return[{label:this.$t.__("Filter by Group",this.$td),name:"group",options:[{label:this.$t.__("All Groups",this.$td),value:"all"}].concat(this.$constants.REDIRECT_GROUPS)}]}}};var P=function(){var e=this,t=e._self._c;return t("div",{staticClass:"aioseo-redirects-blur"},[e.noCoreCard?e._e():t("core-card",{attrs:{slug:"addNewRedirection","header-text":e.strings.addNewRedirection,noSlide:!0}},[t("core-blur",[t("core-add-redirection",{attrs:{type:e.$constants.REDIRECT_TYPES[0].value,query:e.$constants.REDIRECT_QUERY_PARAMS[0].value,slash:!0,case:!0}})],1)],1),e.noCoreCard?t("core-blur",[t("core-add-redirection",{attrs:{type:e.$constants.REDIRECT_TYPES[0].value,query:e.$constants.REDIRECT_QUERY_PARAMS[0].value,slash:!0,case:!0}})],1):e._e(),t("core-blur",[t("core-wp-table",{attrs:{filters:[],totals:{total:0,pages:0,page:1},columns:e.columns,rows:[],"search-label":e.strings.searchUrls,"bulk-options":e.bulkOptions,"additional-filters":e.additionalFilters}})],1)],1)},O=[],F=d(M,P,O,!1,null,null,null,null);const f=F.exports,Y={components:{Blur:f,CoreAlert:_,Cta:g},props:{noCoreCard:Boolean},data(){return{strings:{ctaButtonText:this.$t.__("Activate Redirects",this.$tdPro),ctaHeader:this.$t.__("Enable Redirects on your Site",this.$tdPro),serverRedirects:this.$t.__("Fast Server Redirects",this.$td),automaticRedirects:this.$t.__("Automatic Redirects",this.$td),redirectMonitoring:this.$t.__("Redirect Monitoring",this.$td),monitoring404:this.$t.__("404 Monitoring",this.$td),fullSiteRedirects:this.$t.__("Full Site Redirects",this.$td),siteAliases:this.$t.__("Site Aliases",this.$td),ctaDescription:this.$t.__("Our Redirection Manager allows you to easily create and manage redirects for your broken links to avoid confusing search engines and users, as well as losing valuable backlinks. It even automatically sends users and search engines from your old URLs to your new ones.",this.$td),activateError:this.$t.__("An error occurred while activating the addon. Please upload it manually or contact support for more information.",this.$td),permissionWarning:this.$t.__("You currently don't have permission to activate this addon. Please ask a site administrator to activate first.",this.$td)},failed:!1,activationLoading:!1}},computed:{...c("redirects",["filters","totals","options"])},methods:{...l("redirects",["filter","getRedirectOptions"]),...l(["installPlugins"]),...$(["updateAddon"]),activateAddon(){this.failed=!1,this.activationLoading=!0;const r=this.$addons.getAddon("aioseo-redirects");this.installPlugins([{plugin:r.basename}]).then(e=>{if(e.body.failed.length){this.activationLoading=!1,this.failed=!0;return}const t=[this.filter({slug:"all",page:1}),this.filter({slug:"logs",page:1}),this.filter({slug:"404",page:1}),this.getRedirectOptions()];Promise.all(t).then(()=>{this.activationLoading=!1,r.hasMinimumVersion=!0,r.isActive=!0,this.updateAddon(r),this.$bus.$emit("redirects-activated")})}).catch(()=>{this.activationLoading=!1})}}};var G=function(){var e=this,t=e._self._c;return t("div",{class:{"aioseo-redirects":!0,"core-card":!e.noCoreCard}},[t("blur",{attrs:{noCoreCard:e.noCoreCard}}),t("cta",{attrs:{"cta-button-visible":e.$addons.userCanInstallOrActivate("aioseo-redirects"),"cta-button-visible-warning":e.strings.permissionWarning,"cta-link":e.$aioseo.urls.aio.featureManager+"&aioseo-activate=aioseo-redirects","cta-button-action":"","cta-button-loading":e.activationLoading,"same-tab":"","button-text":e.strings.ctaButtonText,"learn-more-link":e.$links.getDocUrl("redirects"),"feature-list":[e.strings.serverRedirects,e.strings.automaticRedirects,e.strings.redirectMonitoring,e.strings.monitoring404,e.strings.fullSiteRedirects,e.strings.siteAliases]},on:{"cta-button-click":e.activateAddon},scopedSlots:e._u([{key:"header-text",fn:function(){return[e._v(" "+e._s(e.strings.ctaHeader)+" ")]},proxy:!0},{key:"description",fn:function(){return[e.failed?t("core-alert",{attrs:{type:"red"}},[e._v(" "+e._s(e.strings.activateError)+" ")]):e._e(),e._v(" "+e._s(e.strings.ctaDescription)+" ")]},proxy:!0},{key:"learn-more-text",fn:function(){return[e._v(" "+e._s(e.strings.learnMoreText)+" ")]},proxy:!0}])})],1)},H=[],z=d(Y,G,H,!1,null,null,null,null);const pe=z.exports,N={components:{Blur:f,RequiredPlans:L,Cta:g},props:{noCoreCard:Boolean,parentComponentContext:String},data(){return{strings:{ctaButtonText:this.$t.__("Upgrade to Pro and Unlock Redirects",this.$td),ctaHeader:this.$t.sprintf(this.$t.__("Redirects are only available for licensed %1$s %2$s users.",this.$td),"AIOSEO","Pro"),serverRedirects:this.$t.__("Fast Server Redirects",this.$td),automaticRedirects:this.$t.__("Automatic Redirects",this.$td),redirectMonitoring:this.$t.__("Redirect Monitoring",this.$td),monitoring404:this.$t.__("404 Monitoring",this.$td),fullSiteRedirects:this.$t.__("Full Site Redirects",this.$td),siteAliases:this.$t.__("Site Aliases",this.$td),redirectsDescription:this.$t.__("Our Redirection Manager allows you to easily create and manage redirects for your broken links to avoid confusing search engines and users, as well as losing valuable backlinks. It even automatically sends users and search engines from your old URLs to your new ones.",this.$td)}}}};var q=function(){var e=this,t=e._self._c;return t("div",{class:{"aioseo-redirects":!0,"core-card":!e.noCoreCard}},[t("blur",{attrs:{noCoreCard:e.noCoreCard}}),t("cta",{attrs:{"cta-link":e.$links.getPricingUrl("redirects","redirects-upsell",e.parentComponentContext?e.parentComponentContext:null),"button-text":e.strings.ctaButtonText,"learn-more-link":e.$links.getUpsellUrl("redirects",e.parentComponentContext?e.parentComponentContext:null,"home"),"feature-list":[e.strings.serverRedirects,e.strings.automaticRedirects,e.strings.redirectMonitoring,e.strings.monitoring404,e.strings.fullSiteRedirects,e.strings.siteAliases]},scopedSlots:e._u([{key:"header-text",fn:function(){return[e._v(" "+e._s(e.strings.ctaHeader)+" ")]},proxy:!0},{key:"description",fn:function(){return[t("required-plans",{attrs:{addon:"aioseo-redirects"}}),e._v(" "+e._s(e.strings.redirectsDescription)+" ")]},proxy:!0}])})],1)},W=[],j=d(N,q,W,!1,null,null,null,null);const ge=j.exports;export{pe as A,f as B,ge as L,_e as R};
