import{n as o,V as r}from"./js/_plugin-vue2_normalizer.61652a7c.js";import{c,a as d,b as p,B as u,e as l}from"./js/Caret.19b10233.js";import{C as h}from"./js/Tabs.94a491a6.js";import{C as v}from"./js/Index.6dd703b2.js";import{S as m,a as f}from"./js/Twitter.79b93d10.js";import{S as g}from"./js/Settings.26e66713.js";import{g as b,a as C,b as w}from"./js/html.68197829.js";import{C as k}from"./js/FacebookPreview.045d1185.js";import{C as y}from"./js/GoogleSearchPreview.de6f40ef.js";import{T as $}from"./js/TruSeoScore.339d22e1.js";import{S}from"./js/Exclamation.fd45a7b0.js";import{i as D}from"./js/helpers.871dba46.js";import{C as E}from"./js/TwitterPreview.122d83c8.js";import{t as T}from"./js/translations.c394afe3.js";import"./js/_commonjsHelpers.f84db168.js";import"./js/SaveChanges.e40a9083.js";import"./js/vuex.esm.8fdeb4b6.js";import"./js/Information.93f80cbf.js";import"./js/Slide.15a07930.js";import"./js/Img.b3dc0554.js";import"./js/Profile.c44d4735.js";import"./js/Book.9dd59972.js";import"./js/default-i18n.3a91e0e5.js";const x={};var V=function(){var t=this,e=t._self._c;return e("svg",{staticClass:"aioseo-icon-google",attrs:{viewBox:"0 0 24 24",fill:"none",xmlns:"http://www.w3.org/2000/svg"}},[e("circle",{attrs:{cx:"12",cy:"12",r:"11.5",fill:"white",stroke:"#D0D1D7"}}),e("g",{attrs:{"clip-path":"url(#clip0_3359_97687)"}},[e("path",{attrs:{d:"M19.04 12.1666C19.04 11.6466 18.9933 11.1466 18.9067 10.6666H12V13.5032H15.9467C15.7767 14.4199 15.26 15.1966 14.4833 15.7166V17.5566H16.8533C18.24 16.2799 19.04 14.3999 19.04 12.1666Z",fill:"#4285F4"}}),e("path",{attrs:{d:"M12 19.3332C13.98 19.3332 15.64 18.6765 16.8533 17.5565L14.4833 15.7165C13.8267 16.1565 12.9867 16.4165 12 16.4165C10.09 16.4165 8.47332 15.1265 7.89665 13.3932H5.44666V15.2932C6.65332 17.6899 9.13332 19.3332 12 19.3332Z",fill:"#34A853"}}),e("path",{attrs:{d:"M7.89663 13.3931C7.74996 12.9531 7.66663 12.4831 7.66663 11.9998C7.66663 11.5164 7.74996 11.0464 7.89663 10.6064V8.70642H5.44663C4.93329 9.72833 4.66617 10.8562 4.66663 11.9998C4.66663 13.1831 4.94996 14.3031 5.44663 15.2931L7.89663 13.3931Z",fill:"#FBBC05"}}),e("path",{attrs:{d:"M12 7.58323C13.0767 7.58323 14.0433 7.95323 14.8033 8.6799L16.9067 6.57657C15.6367 5.39323 13.9767 4.66656 12 4.66656C9.13332 4.66656 6.65332 6.3099 5.44666 8.70656L7.89666 10.6066C8.47332 8.87323 10.09 7.58323 12 7.58323Z",fill:"#EA4335"}})]),e("defs",[e("clipPath",{attrs:{id:"clip0_3359_97687"}},[e("rect",{attrs:{width:"16",height:"16",fill:"white",transform:"translate(4 3.99994)"}})])])])},F=[],A=o(x,V,F,!1,null,null,null,null);const I=A.exports,P={components:{CoreFacebookPreview:k},data(){return{facebookData:b()}}};var B=function(){var t=this,e=t._self._c;return e("div",{staticClass:"preview-wrapper"},[e("core-facebook-preview",{attrs:{description:t.facebookData.description,image:t.facebookData.image,title:t.facebookData.title}})],1)},K=[],M=o(P,B,K,!1,null,null,null,null);const O=M.exports,R={components:{CoreGoogleSearchPreview:y},data(){return{googleData:C()}}};var G=function(){var t=this,e=t._self._c;return e("div",{staticClass:"preview-wrapper"},[e("core-google-search-preview",{attrs:{description:t.googleData.description,domain:t.googleData.domain,title:t.googleData.title}})],1)},j=[],L=o(R,G,j,!1,null,null,null,null);const H=L.exports;const U={computed:{metaTags(){var a,n;const s=[],t=[{label:this.$t.__("Title",this.$td),value:document.title||""},{label:this.$t.__("Description",this.$td),value:((a=document.querySelector('meta[name="description"]'))==null?void 0:a.content)||""},{label:this.$t.__("Canonical",this.$td),value:((n=document.querySelector('link[rel="canonical"]'))==null?void 0:n.href)||""}],e=document.querySelectorAll('meta[property^="og:"][content],meta[name^="twitter:"][content]');return t.forEach(i=>{i.value&&s.push({label:i.label,value:i.value})}),0<(e==null?void 0:e.length)&&e.forEach(i=>{i.content&&s.push({label:i.getAttribute("name")?i.getAttribute("name"):i.getAttribute("property"),value:i.content})}),s}},methods:{isUrl:D}};var q=function(){var t=this,e=t._self._c;return e("div",{staticClass:"aioseo-seo-preview-standalone-view-meta-tags"},[e("dl",[t._l(t.metaTags,function(a,n){return[e("dt",{key:n+"label"},[t._v(" "+t._s(a.label)+" ")]),e("dd",{key:n+"value"},[t.isUrl(a.value)?e("a",{attrs:{href:a.value,target:"_blank"}},[t._v(" "+t._s(a.value)+" ")]):[t._v(t._s(a.value))]],2)]})],2)])},Y=[],Z=o(U,q,Y,!1,null,"7d32ee87",null,null);const z=Z.exports;const N={components:{SvgIconPencil:c,SvgCircleCheck:d,SvgCircleExclamation:S,SvgCircleClose:p,ViewMetaTags:z},computed:{focusKeyphrase(){var s,t,e;return((e=(t=(s=this.$aioseo)==null?void 0:s.keyphrases)==null?void 0:t.focus)==null?void 0:e.keyphrase)||!1}},methods:{getCheckObject(s){var t,e;return(e=(t=this.$aioseo)==null?void 0:t.page_analysis)==null?void 0:e.analysis[s]},getCheckErrors(s){var t;return((t=this.getCheckObject(s))==null?void 0:t.errors)||0},getCheckIconComponent(s){const t=this.getErrorClass(this.getCheckErrors(s));return t==="red"?"svg-circle-close":t==="orange"?"svg-circle-exclamation":"svg-circle-check"},checkErrorsExists(s){var t,e;return typeof((e=(t=this.$aioseo.page_analysis.analysis)==null?void 0:t[s])==null?void 0:e.errors)<"u"},isCheckEligible(){var s;return typeof((s=this.$aioseo.page_analysis)==null?void 0:s.analysis)<"u"}},mixins:[$],data(){return{strings:{focusKeyphrase:this.$t.__("Focus Keyphrase",this.$td),checks:this.$t.__("Checks",this.$td),basicSeo:this.$t.__("Basic SEO",this.$td),readability:this.$t.__("Readability",this.$td),title:this.$t.__("Title",this.$td),metaTags:this.$t.__("Meta Tags",this.$td),noKeyphraseFound:this.$t.__("No keyphrase found",this.$td),noDataYet:this.$t.__("No data yet",this.$td)}}}};var W=function(){var t=this,e=t._self._c;return e("div",{staticClass:"aioseo-seo-preview-standalone-view-seo-inspector"},[e("div",[t.isCheckEligible()?e("div",{staticClass:"first-half"},[e("div",{staticClass:"child"},[e("dl",[e("dt",[t._v(t._s(t.strings.focusKeyphrase))]),e("dd",[t.focusKeyphrase?e("span",[t._v(" "+t._s(t.focusKeyphrase)+" ")]):t._e(),t.focusKeyphrase?t._e():e("span",{staticClass:"no-keyphrase-found"},[e("svg-circle-exclamation",{attrs:{width:"20"}}),t._v(" "+t._s(t.strings.noKeyphraseFound)+" ")],1)]),e("dt",[t._v(t._s(t.strings.checks))]),e("dd",[t.checkErrorsExists("basic")?e("div",{staticClass:"check"},[e(t.getCheckIconComponent("basic"),{tag:"component",staticClass:"check__icon",class:t.getErrorClass(t.getCheckErrors("basic"))}),e("div",[e("span",{staticClass:"check__title"},[t._v(t._s(t.strings.basicSeo)+": ")]),e("span",{staticClass:"check__feedback"},[t._v(t._s(t.getErrorDisplay(t.getCheckErrors("basic"))))])])],1):e("div",{staticClass:"check"},[e("span",{staticClass:"check__title"},[t._v(t._s(t.strings.basicSeo)+": ")]),e("span",{staticClass:"check__feedback"},[t._v(t._s(t.strings.noDataYet))])]),t.checkErrorsExists("title")?e("div",{staticClass:"check"},[e(t.getCheckIconComponent("title"),{tag:"component",staticClass:"check__icon",class:t.getErrorClass(t.getCheckErrors("title"))}),e("div",[e("span",{staticClass:"check__title"},[t._v(t._s(t.strings.title)+": ")]),e("span",{staticClass:"check__feedback"},[t._v(t._s(t.getErrorDisplay(t.getCheckErrors("title"))))])])],1):e("div",{staticClass:"check"},[e("span",{staticClass:"check__title"},[t._v(t._s(t.strings.title)+": ")]),e("span",{staticClass:"check__feedback"},[t._v(t._s(t.strings.noDataYet))])]),t.checkErrorsExists("readability")?e("div",{staticClass:"check"},[e(t.getCheckIconComponent("readability"),{tag:"component",staticClass:"check__icon",class:t.getErrorClass(t.getCheckErrors("readability"))}),e("div",[e("span",{staticClass:"check__title"},[t._v(t._s(t.strings.readability)+": ")]),e("span",{staticClass:"check__feedback"},[t._v(t._s(t.getErrorDisplay(t.getCheckErrors("readability"))))])])],1):e("div",{staticClass:"check"},[e("span",{staticClass:"check__title"},[t._v(t._s(t.strings.readability)+": ")]),e("span",{staticClass:"check__feedback"},[t._v(t._s(t.strings.noDataYet))])])])])])]):t._e(),e("div",{staticClass:"second-half"},[e("div",{staticClass:"child"},[e("dl",[e("dt",[t._v(t._s(t.strings.metaTags))]),e("dd",[e("view-meta-tags")],1)])])])])])},Q=[],J=o(N,W,Q,!1,null,"53343f04",null,null);const X=J.exports,tt={components:{CoreTwitterPreview:E},data(){return{twitterData:w()}}};var et=function(){var t=this,e=t._self._c;return e("div",{staticClass:"preview-wrapper"},[e("core-twitter-preview",{attrs:{card:t.twitterData.card,description:t.twitterData.description,image:t.twitterData.image,title:t.twitterData.title}})],1)},st=[],at=o(tt,et,st,!1,null,null,null,null);const it=at.exports;const ot={components:{BaseButton:u,CoreMainTabs:h,CoreModal:v,SvgIconFacebook:m,SvgIconGoogle:I,SvgIconPencil:c,SvgIconSettings:g,SvgIconTwitter:f,ViewFacebook:O,ViewGoogle:H,ViewSeoInspector:X,ViewTwitter:it},methods:{styleShadowDom(){const s=document.querySelector(".aioseo-seo-preview-shadow-wrapper");if(!s)return!1;this.$aioseo.mainAssetCssQueue.forEach(t=>{if(typeof t.url>"u"||!t.url)return;const e=document.createElement("link");e.setAttribute("rel","stylesheet"),e.setAttribute("media","all"),e.setAttribute("href",t.url),s.shadowRoot.prepend(e)})},watchClicks(){const s=document.querySelector("#wp-admin-bar-aioseo-seo-preview a");s&&s.addEventListener("click",t=>{t.preventDefault(),this.display=!0})}},data(){return{activeTab:"ViewGoogle",display:!1,loadingEditPreviewDataBtn:!1,strings:{modalHeader:this.$t.__("SEO Preview",this.$td)},tabs:[{slug:"ViewGoogle",icon:"svg-icon-google",name:"Google",component:"ViewGoogle"},{slug:"ViewFacebook",icon:"svg-icon-facebook",name:"Facebook",component:"ViewFacebook"},{slug:"ViewTwitter",icon:"svg-icon-twitter",name:"Twitter",component:"ViewTwitter"},{slug:"ViewSeoInspector",icon:"svg-icon-settings",name:this.$t.__("SEO Inspector",this.$td),component:"ViewSeoInspector"}],editSnippetData(){var t,e,a;const s={url:"",btnText:""};return this.activeTab==="ViewGoogle"?(s.url=((t=this.$aioseo)==null?void 0:t.editGoogleSnippetUrl)||"",s.btnText=this.$t.__("Edit Snippet",this.$td)):this.activeTab==="ViewFacebook"?(s.url=((e=this.$aioseo)==null?void 0:e.editFacebookSnippetUrl)||"",s.btnText=this.$t.__("Edit Facebook Meta Data",this.$td)):this.activeTab==="ViewTwitter"&&(s.url=((a=this.$aioseo)==null?void 0:a.editTwitterSnippetUrl)||"",s.btnText=this.$t.__("Edit Twitter Meta Data",this.$td)),s},editObjectData(){var t,e;const s={url:"",btnText:""};return this.activeTab==="ViewSeoInspector"&&(s.url=((t=this.$aioseo)==null?void 0:t.editObjectUrl)||"",s.btnText=((e=this.$aioseo)==null?void 0:e.editObjectBtnText)||""),s}}},mounted(){this.styleShadowDom(),this.watchClicks()}};var rt=function(){var t=this,e=t._self._c;return t.display?e("core-modal",{attrs:{classes:["aioseo-app","aioseo-seo-preview-standalone"]},on:{close:function(a){t.display=!1}},scopedSlots:t._u([{key:"headerTitle",fn:function(){return[t._v(" "+t._s(t.strings.modalHeader)+" ")]},proxy:!0},{key:"footer",fn:function(){return[t.editSnippetData().url||t.editObjectData().url?e("div",{staticClass:"btn-edit-preview-data-wrapper"},[e("base-button",{staticClass:"btn-edit-preview-data",attrs:{href:t.editSnippetData().url||t.editObjectData().url,loading:t.loadingEditPreviewDataBtn,type:"gray",size:"small",tag:"a"},on:{click:function(a){if(a.ctrlKey||a.shiftKey||a.altKey||a.metaKey)return null;t.loadingEditPreviewDataBtn=!0}}},[e("svg-icon-pencil"),t._v(" "+t._s(t.editSnippetData().btnText||t.editObjectData().btnText)+" ")],1)],1):t._e()]},proxy:!0}],null,!1,2064945741)},[e("div",{staticClass:"aioseo-modal-content",attrs:{slot:"body"},slot:"body"},[e("core-main-tabs",{attrs:{tabs:t.tabs,showSaveButton:!1,active:t.activeTab},on:{changed:a=>this.activeTab=a},scopedSlots:t._u([{key:"md-tab-icon",fn:function({tab:a}){return[e(a.icon,{tag:"component"})]}}],null,!1,2353149503)}),e("div",{staticClass:"component-overflow"},[e("div",{staticClass:"component-container"},[e("div",{staticClass:"component-wrapper",class:"tab"+t.activeTab},[e(t.activeTab,{tag:"component",attrs:{parentComponentContext:"modal"}})],1)])])],1)]):t._e()},nt=[],ct=o(ot,rt,nt,!1,null,"46b933d6",null,null);const lt=ct.exports;r.use(l.MdButton);r.use(l.MdTabs);r.prototype.$t=T;r.prototype.$td="all-in-one-seo-pack";r.prototype.$aioseo=window.aioseoSeoPreview;const _=document.createElement("div");{const s=document.createElement("div"),t=s.attachShadow({mode:"open"}),e=document.createElement("div");s.setAttribute("class","aioseo-seo-preview-shadow-wrapper"),s.setAttribute("style","margin:0;padding:0;border:0"),e.setAttribute("dir",(document==null?void 0:document.dir)||"ltr"),e.setAttribute("style","margin:0;padding:0;border:0"),t.appendChild(e),e.appendChild(_),document.body.appendChild(s)}new r({render:s=>s(lt)}).$mount(_);
