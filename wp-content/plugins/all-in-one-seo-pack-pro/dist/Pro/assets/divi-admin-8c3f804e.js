import{n as r,V as s}from"./js/_plugin-vue2_normalizer.61652a7c.js";import{C as i}from"./js/index.7f221297.js";import{S as a}from"./js/Standalone.b221365b.js";import{s as l}from"./js/index.27dba198.js";import"./js/client.e62d6c37.js";import"./js/_commonjsHelpers.f84db168.js";import"./js/translations.c394afe3.js";import"./js/default-i18n.3a91e0e5.js";import"./js/Caret.19b10233.js";import"./js/constants.6399c725.js";import"./js/isArrayLikeObject.8300bb8d.js";import"./js/helpers.871dba46.js";import"./js/portal-vue.esm.98f2e05b.js";import"./js/vuex.esm.8fdeb4b6.js";const c=window.aioseo.urls.aio.searchAppearance,u={components:{CoreAlert:i},mixins:[a],data(){return{strings:{alert:this.$t.sprintf(this.$t.__("The options below are disabled because you are using %1$s to manage your SEO. They can be changed in the %2$sSearch Appearance menu%3$s.",this.$td),"All in One SEO",`<a href="${c}" target="_blank">`,"</a>")}}}};var p=function(){var e=this,n=e._self._c;return n("div",{staticClass:"aioseo-divi-seo-admin-notice-container"},[n("core-alert",{domProps:{innerHTML:e._s(e.strings.alert)}})],1)},m=[],d=r(u,p,m,!1,null,null,null,null);const _=d.exports,f=()=>{const o=document.querySelectorAll("#wrap-seo .et-tab-content");for(let e=0;e<o.length;e++){const n=document.createElement("div");n.setAttribute("id",`aioseo-divi-seo-admin-notice-container-${e}`),o[e].insertBefore(n,o[e].firstChild),new s({store:l,render:t=>t(_)}).$mount(`#${n.getAttribute("id")}`)}},h=()=>{const o=document.querySelectorAll('#wrap-seo input[type="text"], #wrap-seo textarea');for(let t=0;t<o.length;t++)o[t].style.pointerEvents="none",o[t].setAttribute("readonly",!0);const e=document.querySelectorAll("#wrap-seo select");for(let t=0;t<e.length;t++)e[t].style.pointerEvents="none",e[t].setAttribute("disabled",!0);const n=document.querySelectorAll("#wrap-seo .et-checkbox");for(let t=0;t<n.length;t++)n[t].setAttribute("disabled",!0),n[t].nextElementSibling.style.pointerEvents="none"},y=()=>{const o=window.aioseo.urls.aio.searchAppearance,e=document.querySelector('a[href="#wrap-seo"]');if(!o||!e)return;const n=e.cloneNode(!0);n.setAttribute("href",o),e.parentNode.replaceChild(n,e)};window.addEventListener("load",()=>{f(),h(),y()});
