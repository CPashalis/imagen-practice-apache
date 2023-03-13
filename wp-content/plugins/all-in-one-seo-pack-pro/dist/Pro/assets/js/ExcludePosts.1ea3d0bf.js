import"./WpTable.3c2ff867.js";import"./default-i18n.3a91e0e5.js";import"./constants.6399c725.js";import{n as r}from"./_plugin-vue2_normalizer.61652a7c.js";import"./index.27dba198.js";import{J as a}from"./JsonValues.870a4901.js";import"./SaveChanges.e40a9083.js";import{m as l}from"./vuex.esm.8fdeb4b6.js";import{S as p}from"./AddPlus.9af097bc.js";import{S as c}from"./Caret.19b10233.js";import{S as u}from"./External.4c957e9a.js";const _={components:{SvgAddPlus:p,SvgClose:c,SvgExternal:u},mixins:[a],props:{options:{type:Object,required:!0},type:{type:String,required:!0}},data(){return{excludeOptions:[],strings:{typeToSearch:this.$t.__("Type to search...",this.$td),noOptionsPosts:this.$t.__("Begin typing a post ID, title or slug to search...",this.$td),noOptionsTerms:this.$t.__("Begin typing a term ID or name to search...",this.$td),noResult:this.$t.__("No results found for your search. Try again!",this.$td),clear:this.$t.__("Clear",this.$td),id:this.$t.__("ID",this.$td),type:this.$t.__("Type",this.$td)}}},computed:{optionName:{get(){return this.type==="posts"?this.options.excludePosts:this.options.excludeTerms},set(n){if(this.type==="posts"){this.options.excludePosts=n;return}this.options.excludeTerms=n}},noOptions(){return this.type==="posts"?this.strings.noOptionsPosts:this.strings.noOptionsTerms}},methods:{...l(["getObjects"]),processGetObjects(n){return this.getObjects({query:n,type:this.type}).then(t=>{this.excludeOptions=t.body.objects})},getOptionTitle(n,t){const s=new RegExp(`(${t})`,"gi");return n.replace(s,'<span class="search-term">$1</span>')},searchableLabel({value:n,label:t,slug:s}){return`${n} ${t} ${s}`}}};var m=function(){var t=this,s=t._self._c;return s("div",{staticClass:"aioseo-exclude-posts"},[s("base-select",{attrs:{options:t.excludeOptions,"ajax-search":t.processGetObjects,customLabel:t.searchableLabel,size:"medium",multiple:"",value:t.getJsonValues(t.optionName),placeholder:t.strings.typeToSearch},on:{input:e=>t.optionName=t.setJsonValues(e)},scopedSlots:t._u([{key:"noOptions",fn:function(){return[t._v(" "+t._s(t.noOptions)+" ")]},proxy:!0},{key:"noResult",fn:function(){return[t._v(" "+t._s(t.strings.noResult)+" ")]},proxy:!0},{key:"caret",fn:function({toggle:e}){return[s("base-button",{staticClass:"multiselect-toggle",staticStyle:{padding:"10px 13px",width:"40px",position:"absolute",height:"36px",right:"2px",top:"2px","text-align":"center",transition:"transform .2s ease"},attrs:{type:"gray"},on:{click:e}},[s("svg-add-plus",{staticStyle:{width:"14px",height:"14px",color:"black"}})],1)]}},{key:"option",fn:function({option:e,search:i}){return[s("div",{staticClass:"option"},[s("div",{staticClass:"option-title",domProps:{innerHTML:t._s(t.getOptionTitle(e.label,i))}}),s("div",{staticClass:"option-details"},[s("span",[t._v(t._s(t.strings.id)+": #"+t._s(e.value))]),s("span",[t._v(t._s(t.strings.type)+": "+t._s(e.type))])])]),s("a",{staticClass:"option-permalink",attrs:{href:e.link,target:"_blank"},on:{click:function(o){return o.stopPropagation(),(()=>{}).apply(null,arguments)}}},[s("svg-external")],1)]}},{key:"tag",fn:function({option:e,remove:i}){return[s("div",{staticClass:"multiselect__tag"},[s("div",{staticClass:"multiselect__tag-value"},[t._v(" "+t._s(e.label)+" - #"+t._s(e.value)+" ")]),s("div",{staticClass:"multiselect__tag-remove",on:{click:function(o){return o.stopPropagation(),i(e)}}},[s("svg-close",{nativeOn:{click:function(o){return o.stopPropagation(),i(e)}}})],1)])]}}])}),s("base-button",{attrs:{type:"gray",size:"medium"},on:{click:function(e){t.optionName=[]}}},[t._v(" "+t._s(t.strings.clear)+" ")])],1)},g=[],d=r(_,m,g,!1,null,null,null,null);const S=d.exports;export{S as C};
