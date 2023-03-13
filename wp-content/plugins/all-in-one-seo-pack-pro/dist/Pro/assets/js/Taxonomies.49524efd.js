import{c as a,a as p,m as c}from"./vuex.esm.8fdeb4b6.js";import{A as l,T as m}from"./TitleDescription.742f9ed7.js";import{C as u}from"./Card.c59372cc.js";import{C as _}from"./Tabs.94a491a6.js";import{C as d}from"./Tooltip.68a8a92b.js";import{a as h}from"./index.7f221297.js";import{n as f}from"./_plugin-vue2_normalizer.61652a7c.js";import"./WpTable.3c2ff867.js";import"./helpers.871dba46.js";import"./index.27dba198.js";import"./isArrayLikeObject.8300bb8d.js";import"./default-i18n.3a91e0e5.js";import"./attachments.f493e563.js";import"./cleanForSlug.5e4ade1a.js";import"./constants.6399c725.js";import"./Caret.19b10233.js";import"./_commonjsHelpers.f84db168.js";import"./html.68197829.js";import"./Index.6dd703b2.js";import"./JsonValues.870a4901.js";import"./MaxCounts.12b45bab.js";import"./SaveChanges.e40a9083.js";import"./RadioToggle.e6e54396.js";import"./RobotsMeta.5a1b6c31.js";import"./Checkbox.60ba2f56.js";import"./Checkmark.f26f6201.js";import"./Row.830f6397.js";import"./SettingsRow.edbb3005.js";import"./GoogleSearchPreview.de6f40ef.js";import"./HtmlTagsEditor.f2bc0be7.js";import"./Editor.9e67f0a0.js";import"./UnfilteredHtml.b80b9d04.js";import"./Slide.15a07930.js";import"./TruSeoScore.339d22e1.js";import"./Information.93f80cbf.js";import"./client.e62d6c37.js";import"./translations.c394afe3.js";import"./portal-vue.esm.98f2e05b.js";const g={components:{Advanced:l,CoreCard:u,CoreMainTabs:_,CoreTooltip:d,SvgCircleQuestionMark:h,TitleDescription:m},data(){return{internalDebounce:null,strings:{label:this.$t.__("Label:",this.$td),name:this.$t.__("Slug:",this.$td),postTypes:this.$t.__("Post Types:",this.$td),ctaButtonText:this.$t.__("Upgrade to Pro and Unlock Custom Taxonomies",this.$td),ctaDescription:this.$t.sprintf(this.$t.__("%1$s %2$s lets you set the SEO title and description for custom taxonomies. You can also control all of the robots meta and other options just like the default category and tags taxonomies.",this.$td),"AIOSEO","Pro"),ctaHeader:this.$t.sprintf(this.$t.__("Custom Taxonomy Support is only available for licensed %1$s %2$s users.",this.$td),"AIOSEO","Pro")},tabs:[{slug:"title-description",name:this.$t.__("Title & Description",this.$td),access:"aioseo_search_appearance_settings",pro:!1},{slug:"advanced",name:this.$t.__("Advanced",this.$tdPro),access:"aioseo_search_appearance_settings",pro:!1}]}},computed:{...a(["isUnlicensed"]),...p(["options","dynamicOptions","settings"]),taxonomies(){return this.$aioseo.postData.taxonomies}},methods:{...c(["changeTab"]),processChangeTab(n,t){this.internalDebounce||(this.internalDebounce=!0,this.changeTab({slug:`${n}SA`,value:t}),setTimeout(()=>{this.internalDebounce=!1},50))}}};var b=function(){var t=this,s=t._self._c;return s("div",{staticClass:"aioseo-search-appearance-taxonomies"},t._l(t.taxonomies,function(e,r){return s("core-card",{key:r,attrs:{slug:`${e.name}SA`},scopedSlots:t._u([{key:"header",fn:function(){return[s("div",{staticClass:"icon dashicons",class:`${e.icon||"dashicons-admin-post"}`}),t._v(" "+t._s(e.label)+" "),s("core-tooltip",{attrs:{"z-index":"99999"},scopedSlots:t._u([{key:"tooltip",fn:function(){return[s("div",{staticClass:"aioseo-description"},[t._v(" "+t._s(t.strings.label)+" "),s("strong",[t._v(t._s(e.label))]),s("br"),t._v(" "+t._s(t.strings.name)+" "),s("strong",[t._v(t._s(e.name))]),s("br"),t._v(" "+t._s(t.strings.postTypes)),s("br"),s("ul",[t._l(e.postTypes,function(o,i){return[s("li",{key:i},[s("strong",[t._v(t._s(o))])])]})],2)])]},proxy:!0}],null,!0)},[s("svg-circle-question-mark")],1)]},proxy:!0},{key:"tabs",fn:function(){return[s("core-main-tabs",{attrs:{tabs:t.tabs,showSaveButton:!1,active:t.settings.internalTabs[`${e.name}SA`],internal:""},on:{changed:o=>t.processChangeTab(e.name,o)}})]},proxy:!0}],null,!0)},[s("transition",{attrs:{name:"route-fade",mode:"out-in"}},[s(t.settings.internalTabs[`${e.name}SA`],{tag:"component",attrs:{object:e,separator:t.options.searchAppearance.global.separator,options:t.dynamicOptions.searchAppearance.taxonomies[e.name],type:"taxonomies","show-bulk":!1}})],1)],1)}),1)},$=[],v=f(g,b,$,!1,null,null,null,null);const rt=v.exports;export{rt as default};
