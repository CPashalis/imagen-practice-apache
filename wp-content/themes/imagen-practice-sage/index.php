<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://use.typekit.net" crossorigin />
    <link rel="preload" as="style" href="https://use.typekit.net/ljl0wmp.css" />
    <link rel="stylesheet" href="https://use.typekit.net/ljl0wmp.css" media="print" onload="this.media='all'" />
    <noscript>
      <link rel="stylesheet" href="https://use.typekit.net/ljl0wmp.css" />
    </noscript>

    <link rel="preload" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.css"></noscript>

    <link rel="preload" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.min.css"></noscript>
    
    <?php wp_head(); ?>
    <script type="text/javascript" src="https://raw.githubusercontent.com/kombai/freewall/master/freewall.js"></script>
    <style>
      <?php 
        $primary = get_field('primary_color', 'option'); 
        $primaryLight = get_field('primary_color_light', 'option'); 
        $primaryLighter = get_field('primary_color_lighter', 'option');
        $primaryDark = get_field('primary_color_dark', 'option'); 
        $secondary = get_field('secondary_color', 'option');
        $secondaryLight = get_field('secondary_color_light', 'option');
        $secondaryDark = get_field('secondary_color_dark', 'option');
        $accent = get_field('accent_color', 'option'); 
        $bglight = get_field('bg_light', 'option'); 
        $bgdark = get_field('bg_dark', 'option');
        $gStart = get_field('gradient_start', 'option');
        $gEnd = get_field('gradient_end', 'option');
      ?>
      .text-primary,
      .wpforms-title { color: <?php echo $primary; ?>  }
      p span a{color: <?php echo $primaryLight; ?>}
      .formatted a{color: <?php echo $primaryLight; ?>}
      .callout-description p a{color: <?php echo $accent; ?>!important}
      .bg-primary { background-color: <?php echo $primary; ?> !important; }
      .fill-primary { fill: <?php echo $primary; ?> !important; }
      #menu-primary-nav a:hover { color: <?php echo $primary; ?>  }
      .text-primary-light{ color: <?php echo $primaryLight; ?>  }
      .bg-primary-light { background-color: <?php echo $primaryLight; ?> !important; }
      .fill-primary-light { fill: <?php echo $primaryLight; ?> !important; }
      .bg-primary-lighter { background-color: <?php echo $primaryLighter; ?> !important; }
      .text-primary-dark { color: <?php echo $primaryDark; ?>  }
      .bg-primary-dark  { background-color: <?php echo $primaryDark; ?> !important; }
      .fill-primary-dark  { fill: <?php echo $primaryDark; ?> !important; }
      a.bg-primary:hover,
      button.bg-primary:hover { background-color: <?php echo $primaryDark; ?> !important;}
      .text-secondary { color: <?php echo $secondary; ?>  }
      .bg-secondary { background-color: <?php echo $secondary; ?> !important; }
      .fill-secondary { fill: <?php echo $secondary; ?> !important; }
      .callout-icon svg path { fill: <?php echo $secondary; ?> !important; }
      .callout-button button,
      .callout-button a,
      .callout-button button:hover,
      .callout-button a:hover { background-color: <?php echo $secondary; ?> !important; }
      .text-secondary-light { color: <?php echo $secondaryLight; ?>  }
      .bg-secondary-light { background-color: <?php echo $secondaryLight; ?> !important; }
      .fill-secondary-light { fill: <?php echo $secondaryLight; ?> !important; }
      .text-secondary-dark { color: <?php echo $secondaryDark; ?>  }
      .bg-secondary-dark { background-color: <?php echo $secondaryDark; ?> !important; }
      .text-dark { color: <?php echo $secondaryDark; ?> !important; }
      .fill-secondary-dark { fill: <?php echo $secondaryDark; ?> !important; }
      .hero-icon svg path { fill: <?php echo $primary; ?> !important; }
      a.bg-secondary:hover,
      button.bg-secondary:hover { background-color: <?php echo $secondaryDark; ?> !important; }
      .text-accent { color: <?php echo $accent; ?>  }
      .bg-accent { background-color: <?php echo $accent; ?> !important; }
      .fill-accent { fill: <?php echo $accent; ?> !important; }
      .bg-light { background-color: <?php echo $bglight; ?> !important; }
      .bg-dark { background-color: <?php echo $bgdark; ?> !important; }
      .bg-grad { background-image: linear-gradient(<?php echo $gStart; ?>, <?php echo $gEnd; ?>);}
      .wprevpro {
        display: block !important;
      }
      .collapse{
        visibility:visible!important;
      }

      [id^='wprev-slider-'] .wprsp-star { color: <?php echo $primary; ?> !important; }
      .wprevpro_star_imgs span.svgicons { background: <?php echo $primary; ?> !important; }
      #sb_instagram .sbi_follow_btn a { background-color: <?php echo $primary; ?> !important; }

      @media (min-width: 768px) {
        .desktop-nav .menu-item > .sub-menu > .sub-menu {max-width: 768px;}  
        .hero-bg { background-color: rgba(255, 255, 255, 0.9) !important;}
      }

    </style>
  </head>

  <body <?php body_class(''); ?>>
    <?php wp_body_open(); ?>
    <?php do_action('get_header'); ?>

    <div id="app">
      <?php echo view(app('sage.view'), app('sage.data'))->render(); ?>
    </div>

    <?php do_action('get_footer'); ?>
    <?php wp_footer(); ?>

<script>
    let Cocoen=(()=>{var g=Object.defineProperty;var b=(n,e)=>{for(var t in e)g(n,t,{get:e[t],enumerable:!0})};var f={};b(f,{create:()=>s,parse:()=>p});var a="cocoen",r=`${a}-component`;var l=n=>Number.parseInt(window.getComputedStyle(n).width,10);var h=({dragElementWidth:n,hostElementWidth:e,x:t})=>{let i=t;t<0?i=n:t>=e&&(i=e-n);let o=i+n/2;return o/=e,o*100};var d=(n,e)=>{let t=0;n instanceof MouseEvent?t=n.clientX:n instanceof TouchEvent&&(t=n.touches[0].clientX);let i=e?.getBoundingClientRect().left||0;return t-i};var c=(n,e)=>{let t;return(...i)=>{let o;return t&&clearTimeout(t),t=setTimeout(()=>{o=n(...i)},e),o}};var m=n=>`${n}%`;var E=`
      :host {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        cursor: pointer;
        display: block;
        overflow: hidden;
        position: relative;
        user-select: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        -khtml-user-select: none;
        -ms-user-select: none;
      }

      :host *,
      :host *:after,
      :host *:before {
        box-sizing: inherit;
        -moz-box-sizing: inherit;
        -webkit-box-sizing: inherit;
      }

      #before {
        height: 100%;
        left: 0;
        overflow: hidden;
        position: absolute;
        top: 0;
        width: 50%;
      }

      #drag {
        background: var(--color, #fff);
        bottom: 0;
        cursor: ew-resize;
        left: 50%;
        margin-left: -1px;
        position: absolute;
        top: 0;
        width: 2px;
      }

      #drag:before {
        border: 3px solid var(--color, #fff);
        content: '';
        height: 44px;
        width: 44px;
        left: 50%;
        margin-left: -22px;
        margin-top: -22px;
        position: absolute;
        top: 50%;
        background: white;
        border-radius: 50%;
      }

      ::slotted(img) {
        max-height: 100%;
        object-fit: contain;
        pointer-events: none;
      }

      ::slotted(img[slot=before]) {
        max-width: none;
      }

      ::slotted(img[slot=after]) {
        display: block;
        max-width: 100%;
        width: 100%;
      }

      svg {
        display: inline-block;
        position: absolute;
        top: 50%;
        left: 50%;
        height: 12px;
        width: 12px;
        margin-top: -5px;
      }

      svg path {
        fill: <?php echo $primary; ?>;
      }
    `,v=class extends HTMLElement{constructor(){super();this.animateToValue=0;this.colorValue="#fff";this.dragElementWidthValue=0;this.elementWidthValue=0;this.isDraggingValue=!1;this.openRatioValue=50;this.isRenderedValue=!1;this.isVisibleValue=!1;this.xValue=0;this.drag=null,this.shadowDOM=this.attachShadow({mode:"open"}),this.onDragStartHandler=()=>this.onDragStart(),this.onDragEndHandler=()=>this.onDragEnd(),this.onDragHandler=e=>this.onDrag(e),this.onClickHandler=e=>this.onClick(e),this.onContextMenuHandler=()=>this.onContextMenu(),this.onIntersectionHandler=(e,t)=>this.onIntersection(e,t),this.debouncedUpdateDimensions=c(()=>{this.updateDimensions()},250),this.intersectionObserver=new IntersectionObserver(this.onIntersectionHandler,{root:null,rootMargin:"0px",threshold:0})}get x(){return this.xValue}set x(e){this.xValue=e,window.requestAnimationFrame(()=>{this.openRatio=h({x:this.xValue,dragElementWidth:this.dragElementWidth,hostElementWidth:this.elementWidth})})}get elementWidth(){return this.elementWidthValue}set elementWidth(e){this.elementWidthValue=e}get dragElementWidth(){return this.dragElementWidthValue}set dragElementWidth(e){this.dragElementWidthValue=e}get isDragging(){return this.isDraggingValue}set isDragging(e){this.isDraggingValue=e}get openRatio(){return this.openRatioValue}set openRatio(e){this.openRatioValue=e,window.requestAnimationFrame(()=>{this.updateStyles()})}get color(){return this.colorValue}set color(e){this.colorValue=e,window.requestAnimationFrame(()=>{this.style.setProperty("--color",this.color)})}get isVisible(){return this.isVisibleValue}set isVisible(e){this.isVisibleValue=e}get isRendered(){return this.isRenderedValue}set isRendered(e){this.isRenderedValue=e}get animateTo(){return this.animateToValue}set animateTo(e){this.animateToValue=e}static get observedAttributes(){return["start","color"]}attributeChangedCallback(e,t,i){t!==i&&(e==="start"&&(this.animateTo=Number.parseInt(String(this.getAttribute("start")),10),this.isVisible&&(this.openRatio=this.animateTo)),e==="color"&&(this.color=String(this.getAttribute("color"))))}connectedCallback(){this.isRendered||(this.render(),this.isRendered=!0,this.dispatchEvent(new CustomEvent(`${r}:connected`,this.customEventPayload())),this.drag=this.shadowDOM.querySelector("#drag"),this.updateDimensions(),this.addEventListener("mousedown",this.onDragStartHandler,{passive:!0}),this.addEventListener("touchstart",this.onDragStartHandler,{passive:!0}),this.addEventListener("mousemove",this.onDragHandler,{passive:!0}),this.addEventListener("touchmove",this.onDragHandler,{passive:!0}),this.addEventListener("click",this.onClickHandler,{passive:!0}),this.addEventListener("contextmenu",this.onContextMenuHandler,{passive:!0}),window.addEventListener("resize",this.debouncedUpdateDimensions,{passive:!0}),window.addEventListener("mouseup",this.onDragEndHandler,{passive:!0}),window.addEventListener("touchend",this.onDragEndHandler,{passive:!0}),this.intersectionObserver.observe(this))}disconnectedCallback(){this.dispatchEvent(new CustomEvent(`${r}:disconnected`,this.customEventPayload())),this.removeEventListener("mousedown",this.onDragStartHandler),this.removeEventListener("touchstart",this.onDragStartHandler),this.removeEventListener("mousemove",this.onDragHandler),this.removeEventListener("touchmove",this.onDragHandler),this.removeEventListener("click",this.onClickHandler),this.removeEventListener("contextmenu",this.onContextMenuHandler),window.removeEventListener("resize",this.debouncedUpdateDimensions),window.removeEventListener("mouseup",this.onDragEndHandler),window.removeEventListener("touchend",this.onDragEndHandler),this.intersectionObserver.unobserve(this)}render(){this.shadowDOM.innerHTML=`
      <style>${E}</style>
      <div id="before">
        <slot name="before"></slot>
      </div>
      <slot name="after"></slot>
      <div id="drag" part="drag"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" height="12" style="margin-left: -12px;"><path d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 246.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" height="12" style="margin-left: 0;"><path d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z"/></svg></div>
    `}updateDimensions(){this.elementWidth=l(this),this.drag&&(this.dragElementWidth=l(this.drag)),this.dispatchEvent(new CustomEvent(`${r}:resized`,this.customEventPayload()))}updateStyles(){let e=this.shadowDOM.querySelector("#before"),t=this.shadowDOM.querySelector("#drag"),i=m(this.openRatio);this.animateTo?(e.style.transition="width .75s",t.style.transition="left .75s"):(e.style.transition="none",t.style.transition="none"),e.style.width=i,t.style.left=i,this.dispatchEvent(new CustomEvent(`${r}:updated`,this.customEventPayload()))}onDragStart(){this.animateTo=0,this.isDragging=!0}onDrag(e){!this.isDragging||(this.x=d(e,this))}onDragEnd(){this.isDragging=!1}onClick(e){this.animateTo=0,this.x=d(e,this)}onContextMenu(){this.isDragging=!1}onIntersection(e,t){e.forEach(i=>{i.isIntersecting&&(this.dispatchEvent(new CustomEvent(`${r}:visible`,this.customEventPayload())),this.animateTo&&(this.openRatio=this.animateTo),this.isVisible=!0,t.unobserve(this))})}customEventPayload(){return{bubbles:!0,composed:!0,detail:{elementWidth:this.elementWidth,openRatio:this.openRatio,isRendered:this.isRendered,isVisible:this.isVisible}}}};customElements.define(r,v);var s=(n,e)=>{let t=document.createElement(r),i=n.querySelectorAll("img")[0],o=n.querySelectorAll("img")[1];if(!i||!o)throw new Error("Cocoen needs two images");return i.setAttribute("slot","before"),o.setAttribute("slot","after"),t.append(i.cloneNode(!0)),t.append(o.cloneNode(!0)),Object.keys(n.dataset).forEach(u=>t.setAttribute(u,String(n.dataset[u]))),e?.start&&t.setAttribute("start",String(e.start)),e?.color&&t.setAttribute("color",e.color),n.replaceWith(t),t};var p=n=>{[...n.querySelectorAll(`.${a}`)].map(t=>s(t))};return f;})();
    //# sourceMappingURL=cocoen.js.map
      Cocoen.parse(document.body);
    </script>
  </body>
</html>