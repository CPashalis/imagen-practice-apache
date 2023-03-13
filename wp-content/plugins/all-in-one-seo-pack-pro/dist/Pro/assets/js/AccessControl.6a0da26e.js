import{a,c as u}from"./vuex.esm.8fdeb4b6.js";import{A as l}from"./WebmasterTools.841e7f47.js";import{B as p}from"./Checkbox.60ba2f56.js";import{G as d,a as h}from"./Row.830f6397.js";import{n as r}from"./_plugin-vue2_normalizer.61652a7c.js";import{C as c}from"./Card.c59372cc.js";import{C as g}from"./ProBadge.66f48bdc.js";import{C as _}from"./SettingsRow.edbb3005.js";import{C as S}from"./Blur.f36c594d.js";import{C as m}from"./Index.dc1072bb.js";import"./WpTable.3c2ff867.js";import"./helpers.871dba46.js";import"./index.27dba198.js";import"./isArrayLikeObject.8300bb8d.js";import"./default-i18n.3a91e0e5.js";import"./attachments.f493e563.js";import"./cleanForSlug.5e4ade1a.js";import"./constants.6399c725.js";import"./Caret.19b10233.js";import"./_commonjsHelpers.f84db168.js";import"./html.68197829.js";import"./Index.6dd703b2.js";import"./MetaTag.1c306c27.js";import"./SaveChanges.e40a9083.js";import"./Checkmark.f26f6201.js";import"./Tooltip.68a8a92b.js";import"./index.7f221297.js";import"./client.e62d6c37.js";import"./translations.c394afe3.js";import"./portal-vue.esm.98f2e05b.js";import"./Slide.15a07930.js";const f={components:{BaseCheckbox:p,GridColumn:d,GridRow:h},props:{disabled:{type:Boolean,default(){return!1}},value:{type:Boolean,required:!0},roleSettings:{type:Object,required:!0}},data(){return{strings:{generalSeoSettings:this.$t.__("General SEO Settings:",this.$tdPro),postSettings:this.$t.__("Post SEO Settings:",this.$tdPro),useDefaultSettings:this.$t.__("Use Default Settings",this.$td),dashboard:this.$t.__("Dashboard",this.$td),setupWizard:this.$t.__("Setup Wizard",this.$td),generalSettings:this.$t.__("General Settings",this.$td),searchAppearanceSettings:this.$t.__("Search Appearance Settings",this.$tdPro),socialNetworksSettings:this.$t.__("Social Networks Settings",this.$tdPro),sitemapSettings:this.$t.__("Sitemap Settings",this.$td),linkAssistantSettings:this.$t.__("Link Assistant Settings",this.$tdPro),redirectsManage:this.$t.__("Manage Redirects",this.$tdPro),pageRedirectsManage:this.$t.__("Manage Redirects",this.$tdPro),redirectsSettings:this.$t.__("Redirects Settings",this.$tdPro),seoAnalysisSettings:this.$t.__("SEO Analysis",this.$td),toolsSettings:this.$t.__("Tools",this.$td),featureManagerSettings:this.$t.__("Feature Manager Settings",this.$tdPro),pageAnalysis:this.$t.__("Page Analysis",this.$td),searchStatisticsSettings:this.$t.__("Search Statistics",this.$td),pageAdvancedSettings:this.$t.__("Advanced Settings",this.$td),pageSchemaSettings:this.$t.__("Schema Settings",this.$tdPro),pageSocialSettings:this.$t.__("Social Settings",this.$tdPro),localSeoSettings:this.$t.__("Local SEO Settings",this.$tdPro),pageLinkAssistantSettings:this.$t.__("Link Assistant",this.$td)}}},computed:{...a(["options"]),settings(){return{general:[{key:"dashboard",label:this.strings.dashboard},{key:"generalSettings",label:this.strings.generalSettings},{key:"searchAppearanceSettings",label:this.strings.searchAppearanceSettings},{key:"socialNetworksSettings",label:this.strings.socialNetworksSettings},{key:"sitemapSettings",label:this.strings.sitemapSettings},{key:"linkAssistantSettings",label:this.strings.linkAssistantSettings},{key:"redirectsManage",label:this.strings.redirectsManage},{key:"redirectsSettings",label:this.strings.redirectsSettings},{key:"seoAnalysisSettings",label:this.strings.seoAnalysisSettings},{key:"searchStatisticsSettings",label:this.strings.searchStatisticsSettings},{key:"toolsSettings",label:this.strings.toolsSettings},{key:"featureManagerSettings",label:this.strings.featureManagerSettings},{key:"localSeoSettings",label:this.strings.localSeoSettings},{key:"setupWizard",label:this.strings.setupWizard}],page:[{key:"pageAnalysis",label:this.strings.pageAnalysis},{key:"pageGeneralSettings",label:this.strings.generalSettings},{key:"pageAdvancedSettings",label:this.strings.pageAdvancedSettings},{key:"pageSchemaSettings",label:this.strings.pageSchemaSettings},{key:"pageSocialSettings",label:this.strings.pageSocialSettings},{key:"pageLocalSeoSettings",label:this.strings.localSeoSettings},{key:"pageLinkAssistantSettings",label:this.strings.pageLinkAssistantSettings},{key:"pageRedirectsManage",label:this.strings.pageRedirectsManage}]}}},methods:{emitInput(n){this.$emit("input",n)}}};var $=function(){var t=this,s=t._self._c;return s("div",{staticClass:"aioseo-access-control-toggle"},[s("base-toggle",{attrs:{disabled:t.disabled,value:t.value},on:{input:t.emitInput}},[t._v(" "+t._s(t.strings.useDefaultSettings)+" ")]),t.value?t._t("description"):t._e(),t.value?t._e():s("div",{staticClass:"access-control-settings"},[s("div",{staticClass:"title"},[t._v(" "+t._s(t.strings.generalSeoSettings)+" ")]),s("grid-row",t._l(t.settings.general,function(e,i){return s("grid-column",{key:i,attrs:{md:"4"}},[s("base-checkbox",{attrs:{size:"medium"},model:{value:t.roleSettings[e.key],callback:function(o){t.$set(t.roleSettings,e.key,o)},expression:"roleSettings[setting.key]"}},[t._v(" "+t._s(e.label)+" ")])],1)}),1),s("div",{staticClass:"title"},[t._v(" "+t._s(t.strings.postSettings)+" ")]),s("grid-row",t._l(t.settings.page,function(e,i){return s("grid-column",{key:i,attrs:{md:"4"}},[s("base-checkbox",{attrs:{size:"medium"},model:{value:t.roleSettings[e.key],callback:function(o){t.$set(t.roleSettings,e.key,o)},expression:"roleSettings[setting.key]"}},[t._v(" "+t._s(e.label)+" ")])],1)}),1)],1)],2)},y=[],k=r(f,$,y,!1,null,null,null,null);const v=k.exports;const b={components:{CoreAccessControlOptions:v,CoreCard:c,CoreProBadge:g,CoreSettingsRow:_},mixins:[l],computed:{...a(["options","dynamicOptions"])},methods:{canShowRole(n){let t=n.name;return t!=="administrator"?(["seoManager","seoEditor"].includes(t)&&(t=t.replace("seo","aioseo_").toLowerCase()),t in this.$aioseo.user.roles):this.$aioseo.data.isMultisite},getSettings(n){return n.dynamic?this.dynamicOptions.accessControl[n.name]:this.options.accessControl[n.name]}}};var C=function(){var t=this,s=t._self._c;return s("div",{staticClass:"aioseo-access-control"},[s("core-card",{attrs:{slug:"accessControl"},scopedSlots:t._u([{key:"header",fn:function(){return[s("span",[t._v(t._s(t.strings.accessControl))]),s("core-pro-badge")]},proxy:!0},{key:"tooltip",fn:function(){return[t._v(" "+t._s(t.strings.tooltip)+" ")]},proxy:!0}])},[t._l(t.getRoles,function(e){return[t.canShowRole(e)?s("core-settings-row",{key:e.name,attrs:{name:e.label},scopedSlots:t._u([{key:"content",fn:function(){return[s("core-access-control-options",{attrs:{roleSettings:t.getSettings(e)},scopedSlots:t._u([{key:"description",fn:function(){return[s("p",{staticClass:"aioseo-description",domProps:{innerHTML:t._s(e.description)}})]},proxy:!0}],null,!0),model:{value:t.getSettings(e).useDefault,callback:function(i){t.$set(t.getSettings(e),"useDefault",i)},expression:"getSettings(role).useDefault"}})]},proxy:!0}],null,!0)}):t._e()]})],2)],1)},A=[],x=r(b,C,A,!1,null,null,null,null);const R=x.exports;const P={components:{CoreBlur:S,CoreCard:c,CoreProBadge:g,CoreSettingsRow:_,Cta:m},mixins:[l],data(){return{strings:{wpRoles:this.$t.__("WP Roles (Editor, Author)",this.$td),seoManagerRole:this.$t.__("SEO Manager Role",this.$td),seoEditorRole:this.$t.__("SEO Editor Role",this.$td),defaultSettings:this.$t.__("Default settings that just work",this.$td),granularControl:this.$t.__("Granular controls per role",this.$td),ctaButtonText:this.$t.__("Upgrade to Pro and Unlock Access Control",this.$td),ctaHeader:this.$t.sprintf(this.$t.__("Access Control is only available for licensed %1$s %2$s users.",this.$td),"AIOSEO","Pro")}}},computed:{getLiteRoles(){const n=this.getRoles;let t=1;for(;8>n.length;)n.push({label:this.$t.__("Custom Role",this.$td)+" "+t,name:"customRole"+t}),t++;return n}}};var M=function(){var t=this,s=t._self._c;return s("div",{staticClass:"aioseo-access-control-lite"},[s("core-card",{attrs:{slug:"accessControl"},scopedSlots:t._u([{key:"header",fn:function(){return[s("span",[t._v(t._s(t.strings.accessControl))]),s("core-pro-badge")]},proxy:!0},{key:"tooltip",fn:function(){return[t._v(" "+t._s(t.strings.tooltip)+" ")]},proxy:!0}])},[s("core-blur",[t._l(t.getLiteRoles,function(e){return[s("core-settings-row",{key:e.name,attrs:{name:e.label},scopedSlots:t._u([{key:"content",fn:function(){return[s("div",{staticClass:"toggle"},[s("base-toggle",{attrs:{disabled:!0,value:!0}},[t._v(" "+t._s(t.strings.useDefaultSettings)+" ")])],1)]},proxy:!0}],null,!0)})]})],2),s("cta",{attrs:{"feature-list":[t.strings.granularControl,t.strings.wpRoles,t.strings.seoManagerRole,t.strings.seoEditorRole],"cta-link":t.$links.getPricingUrl("access-control","access-control-upsell"),"button-text":t.strings.ctaButtonText,"learn-more-link":t.$links.getUpsellUrl("access-control",null,"home"),"align-top":""},scopedSlots:t._u([{key:"header-text",fn:function(){return[t._v(" "+t._s(t.strings.ctaHeader)+" ")]},proxy:!0},{key:"description",fn:function(){return[t._v(" "+t._s(t.strings.tooltip)+" ")]},proxy:!0}])})],1)],1)},w=[],L=r(P,M,w,!1,null,null,null,null);const O=L.exports,E={components:{AccessControl:R,AccessControlLite:O},computed:{...u(["isUnlicensed"])}};var U=function(){var t=this,s=t._self._c;return s("div",{staticClass:"aioseo-access-control"},[t.isUnlicensed?t._e():s("access-control"),t.isUnlicensed?s("access-control-lite"):t._e()],1)},D=[],B=r(E,U,D,!1,null,null,null,null);const dt=B.exports;export{dt as default};
