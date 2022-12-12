import{a}from"./vuex.esm.19624049.js";import{B as n}from"./Editor.c1c0327b.js";import{C as i}from"./index.499c6591.js";import{C as c}from"./Card.184c54d2.js";import{C as l}from"./SettingsRow.d7400549.js";import{n as u}from"./vueComponentNormalizer.67c9b86e.js";import"./_commonjsHelpers.10c44588.js";import"./Caret.eeb84d06.js";import"./client.90beecd8.js";import"./translations.3bc9d58c.js";import"./default-i18n.0e73c33c.js";import"./constants.e179df36.js";import"./isArrayLikeObject.44af21ce.js";import"./index.c630c4a6.js";import"./helpers.8308b279.js";import"./portal-vue.esm.18ed59c3.js";import"./Tooltip.d723c3c3.js";import"./Slide.9538a421.js";import"./Row.2d17f2cd.js";var p=function(){var t=this,s=t.$createElement,e=t._self._c||s;return e("div",{staticClass:"aioseo-tools-htaccess-editor"},[e("core-card",{attrs:{slug:"htaccessEditor","header-text":t.strings.htaccessEditor}},[e("div",{staticClass:"aioseo-settings-row aioseo-section-description",domProps:{innerHTML:t._s(t.strings.description)}}),e("core-settings-row",{attrs:{name:t.strings.editHtaccess,align:""},scopedSlots:t._u([{key:"content",fn:function(){return[t.htaccessError?e("core-alert",{attrs:{type:"red"}},[t._v(" "+t._s(t.htaccessError)+" ")]):t._e(),e("base-editor",{staticClass:"htaccess-editor",attrs:{disabled:!t.$aioseo.user.unfilteredHtml,"line-numbers":"",monospace:"","preserve-whitespace":""},model:{value:t.$aioseo.data.htaccess,callback:function(r){t.$set(t.$aioseo.data,"htaccess",r)},expression:"$aioseo.data.htaccess"}})]},proxy:!0}])})],1)],1)},d=[];const m={components:{BaseEditor:n,CoreAlert:i,CoreCard:c,CoreSettingsRow:l},data(){return{strings:{htaccessEditor:this.$t.__(".htaccess Editor",this.$td),editHtaccess:this.$t.__("Edit .htaccess",this.$td),description:this.$t.sprintf(this.$t.__("This allows you to edit the .htaccess file for your site. All WordPress sites on an Apache server have a .htaccess file and we have provided you with a convenient way of editing it. Care should always be taken when editing important files from within WordPress as an incorrect change could cause WordPress to become inaccessible. %1$sBe sure to make a backup before making changes and ensure that you have FTP access to your web server and know how to access and edit files via FTP.%2$s",this.$td),"<strong>","</strong>")}}},computed:{...a(["htaccessError"])}},o={};var _=u(m,p,d,!1,h,null,null,null);function h(t){for(let s in o)this[s]=o[s]}const R=function(){return _.exports}();export{R as default};
