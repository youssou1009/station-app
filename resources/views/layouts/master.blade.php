
<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SEN_METEO</title>

<link rel="stylesheet" href="{{mix("css/app.css")}}"/>
@livewireStyles

<script nonce="df5642dd-aaf9-4343-833c-3854f87c9ee0">try{(function(w,d){!function(kL,kM,kN,kO){kL[kN]=kL[kN]||{};kL[kN].executed=[];kL.zaraz={deferred:[],listeners:[]};kL.zaraz.q=[];kL.zaraz._f=function(kP){return async function(){var kQ=Array.prototype.slice.call(arguments);kL.zaraz.q.push({m:kP,a:kQ})}};for(const kR of["track","set","debug"])kL.zaraz[kR]=kL.zaraz._f(kR);kL.zaraz.init=()=>{var kS=kM.getElementsByTagName(kO)[0],kT=kM.createElement(kO),kU=kM.getElementsByTagName("title")[0];kU&&(kL[kN].t=kM.getElementsByTagName("title")[0].text);kL[kN].x=Math.random();kL[kN].w=kL.screen.width;kL[kN].h=kL.screen.height;kL[kN].j=kL.innerHeight;kL[kN].e=kL.innerWidth;kL[kN].l=kL.location.href;kL[kN].r=kM.referrer;kL[kN].k=kL.screen.colorDepth;kL[kN].n=kM.characterSet;kL[kN].o=(new Date).getTimezoneOffset();if(kL.dataLayer)for(const kY of Object.entries(Object.entries(dataLayer).reduce(((kZ,k$)=>({...kZ[1],...k$[1]})),{})))zaraz.set(kY[0],kY[1],{scope:"page"});kL[kN].q=[];for(;kL.zaraz.q.length;){const la=kL.zaraz.q.shift();kL[kN].q.push(la)}kT.defer=!0;for(const lb of[localStorage,sessionStorage])Object.keys(lb||{}).filter((ld=>ld.startsWith("_zaraz_"))).forEach((lc=>{try{kL[kN]["z_"+lc.slice(7)]=JSON.parse(lb.getItem(lc))}catch{kL[kN]["z_"+lc.slice(7)]=lb.getItem(lc)}}));kT.referrerPolicy="origin";kT.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(kL[kN])));kS.parentNode.insertBefore(kT,kS)};["complete","interactive"].includes(kM.readyState)?zaraz.init():kL.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,"zarazData","script");})(window,document)}catch(e){throw fetch("/cdn-cgi/zaraz/t"),e;};</script></head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

<x-topnav />

<aside class="main-sidebar sidebar-dark-primary elevation-4">

<a href="index3.html" class="brand-link d-flex justify-content-center align-items-center">
<span class="brand-text font-weight-light">SEN_METEO</span>
</a>

<div class="sidebar">

<div class="user-panel mt-3 pb-3 mb-3 d-flex">
<div class="image">
<img src="{{asset('/images/isra.png')}}" class="img-circle elevation-2" alt="User Image">
</div>
<div class="info"> 
<a href="#" class="d-block bg-link">{{userFullName()}}</a>
</div>
</div>

<x-menu />

</div>

</aside>

<div class="content-wrapper">
<div class="content">
<div class="container-fluid">

    @yield("contenu")

</div>
</div>
</div>

<x-sidebar />

<footer class="main-footer">

{{-- <div class="float-right d-none d-sm-inline">
Anything you want
</div> --}}
<footer class="footer">
    <div class="container text-center">
        <strong>Copyright &copy; 2024 <a href="https://adminlte.io">Youssou&Lamine</a>.</strong>
    </div>
</footer>
{{-- <strong>Copyright &copy; 2024 <a href="https://adminlte.io">Lamine&Youssou</a>.</strong>  --}}
</footer>
</div>

<script src="{{mix("js/app.js")}}"></script>
@livewireScripts


</body>
</html>
