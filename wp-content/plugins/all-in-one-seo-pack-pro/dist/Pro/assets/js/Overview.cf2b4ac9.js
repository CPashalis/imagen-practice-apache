import{m as n,a as l}from"./vuex.esm.8fdeb4b6.js";import{C as p}from"./index.7f221297.js";import{C as u}from"./DonutChartWithLegend.72361d7c.js";import{n as c}from"./_plugin-vue2_normalizer.61652a7c.js";const h={components:{CoreAlert:p,CoreDonutChartWithLegend:u},props:{isWpDashboard:{type:Boolean,default(){return!1}},toHide:{type:Array,default(){return[]}},showDescription:{type:Boolean,default(){return!0}}},data(){return{strings:{description:this.$t.__("Below are the TruSEO scores of your published posts. Take some time to improve your TruSEO score to help increase your rankings.",this.$td),choosePostType:this.$t.__("Choose a Post Type",this.$td),upgradeToPro:this.$t.sprintf(this.$t.__("Get additional keyphrases and many more modules! %1$s",this.$td),this.$links.getUpsellLink("dashboard-overview",this.$t.__("Upgrade to Pro Today!",this.$td),"liteUpgrade",!0))},postTypeInitial:!0,postType:{},parts:[{slug:"needsImprovement",name:this.$t.__("Needs Improvement",this.$td),color:"#DF2A4A"},{slug:"okay",name:this.$t.__("Okay",this.$td),color:"#F18200"},{slug:"good",name:this.$t.__("Good",this.$td),color:"#00AA63"},{slug:"withoutFocusKeyphrase",name:this.$t.__("Without a Focus Keyphrase",this.$td),color:"#E8E8EB"}]}},watch:{postType(s){if(this.postTypeInitial){this.postTypeInitial=!1;return}this.toggleRadio({slug:"overviewPostType",value:s.value})}},methods:{...n(["toggleRadio"])},computed:{...l(["settings"]),postTypes(){const s=[];return this.$aioseo.postData.postTypes.forEach(t=>{this.$aioseo.seoOverview[t.name]&&s.push({value:t.name,label:t.label})}),s},totalPosts(){return this.$aioseo.seoOverview[this.postType.value].total},totalPostsLabel(){return this.$t.sprintf(this.$t.__("Total %1$s",this.$td),this.postType.label)},sortedParts(){const s=this.parts;return s.forEach((t,e)=>{s[e].count=this.$aioseo.seoOverview[this.postType.value][t.slug],s[e].ratio=e===0?100:t.count/this.totalPosts*100,s[e].link=`${this.$aioseo.urls.editScreen}?post_status=publish&post_type=${this.postType.value}&aioseo-filter=${t.slug}`}),s.filter(t=>t.count!==0),s.forEach((t,e)=>(e===0||s.forEach((o,a)=>(e<a&&(t.ratio=t.ratio+o.ratio),t)),t)),s}},mounted(){this.$nextTick(()=>{var e;const s=(e=this.settings.toggledRadio)==null?void 0:e.overviewPostType,t=this.postTypes.findIndex(o=>s===o.value);this.postType=this.postTypes[t]||this.postTypes[0]})}};var d=function(){var t=this,e=t._self._c;return t.postType.value?e("div",{staticClass:"aioseo-overview",class:t.isWpDashboard?"aioseo-overview--wp-styles":""},[t.toHide.includes("description")?t._e():e("p",{staticClass:"aioseo-overview-description"},[t._v(" "+t._s(t.strings.description)+" ")]),e("div",{staticClass:"aioseo-overview-selector"},[e("strong",[t._v(t._s(t.strings.choosePostType))]),t.isWpDashboard?t._e():e("base-select",{attrs:{size:"medium",placeholder:t.strings.choosePostType,options:t.postTypes},model:{value:t.postType,callback:function(o){t.postType=o},expression:"postType"}}),t.isWpDashboard?e("select",{directives:[{name:"model",rawName:"v-model",value:t.postType,expression:"postType"}],on:{change:function(o){var a=Array.prototype.filter.call(o.target.options,function(r){return r.selected}).map(function(r){var i="_value"in r?r._value:r.value;return i});t.postType=o.target.multiple?a:a[0]}}},t._l(t.postTypes,function(o){return e("option",{key:o.value,domProps:{value:o}},[t._v(" "+t._s(o.label)+" ")])}),0):t._e()],1),e("core-donut-chart-with-legend",{attrs:{parts:t.sortedParts,total:t.totalPosts,label:t.totalPostsLabel,animatedNumber:!t.isWpDashboard}}),!t.toHide.includes("upgradeAlert")&&!t.$isPro?e("core-alert",{attrs:{type:"yellow"},domProps:{innerHTML:t._s(t.strings.upgradeToPro)}}):t._e()],1):t._e()},_=[],y=c(h,d,_,!1,null,null,null,null);const g=y.exports;export{g as C};
