<section class="video-gallery-slider fullwidth">
  <h2 class="heading_1">Featured Videos</h2>

  <div class="video-slider" id="videoSlider" aria-roledescription="carousel">
    <button class="nav-btn prev" aria-label="Previous video" id="vsPrev">‹</button>

    <div class="track" id="vsTrack">
      <!-- Slide 1 -->
      <div class="video-slide" data-index="0" aria-roledescription="slide" aria-label="1 of 3">
        <div class="skeleton"></div>
        <div class="anti-overlay"></div>
        <div class="player-host" id="yt-host-0" data-video="h1NYXQkYO8Q"></div>
      </div>

      <!-- Slide 2 -->
      <div class="video-slide" data-index="1" aria-roledescription="slide" aria-label="2 of 3">
        <div class="skeleton"></div>
        <div class="anti-overlay"></div>
        <div class="player-host" id="yt-host-1" data-video="Ahkt6Wrg1GI"></div>
      </div>

      <!-- Slide 3 -->
      <div class="video-slide" data-index="2" aria-roledescription="slide" aria-label="3 of 3">
        <div class="skeleton"></div>
        <div class="anti-overlay"></div>
        <div class="player-host" id="yt-host-2" data-video="KrCYPR5_Vt8"></div>
      </div>
    </div>

    <button class="nav-btn next" aria-label="Next video" id="vsNext">›</button>
    <div class="dots" id="vsDots"></div>
  </div>
</section>

<style>
  .video-gallery-slider.fullwidth {
    width: 100vw;  /* take entire viewport width */
    margin-left: calc(-50vw + 50%); /* break out of container if nested */
  }
  .video-slider { position: relative; width: 100%; overflow: hidden; }
  .video-slider .track {
    display: flex; transition: transform 450ms ease; will-change: transform;
  }
  .video-slide {
    min-width: 100%;
    aspect-ratio: 16 / 9;
    background:#000; overflow: hidden;
  }
  .player-host, .player-host iframe { width:100%; height:100%; }

  .skeleton {
    position:absolute; inset:0;
    background: linear-gradient(90deg, #1a1a1a 25%, #2a2a2a 37%, #1a1a1a 63%);
    background-size: 400% 100%;
    animation: shimmer 1.3s infinite;
  }
  @keyframes shimmer { 0%{background-position:100% 0;} 100%{background-position:0 0;} }

  .anti-overlay {
    position:absolute; inset:0; background:#000; opacity:1; pointer-events:none;
    transition: opacity .35s ease;
  }
  .video-slide.ready .anti-overlay { opacity:0; }

  .video-slider .nav-btn {
    position:absolute; top:50%; transform:translateY(-50%); z-index:3;
    width:44px; height:44px; border-radius:50%; border:none;
    background:rgba(0,0,0,0.45); color:#fff; font-size:26px; cursor:pointer;
  }
  .video-slider .prev { left:12px; }
  .video-slider .next { right:12px; }
  .video-slider .nav-btn:hover { background:rgba(0,0,0,0.6); }

  .video-slider .dots {
    position:absolute; bottom:10px; left:50%; transform:translateX(-50%);
    display:flex; gap:8px; z-index:3;
  }
  .video-slider .dots button {
    width:10px; height:10px; border-radius:50%; border:none;
    background:rgba(255,255,255,0.5); cursor:pointer;
  }
  .video-slider .dots button[aria-selected="true"] { background:#fff; }
</style>

<script>
(function(){
  const tag = document.createElement('script');
  tag.src = "https://www.youtube.com/iframe_api";
  document.head.appendChild(tag);

  const track  = document.getElementById('vsTrack');
  const slides = Array.from(track.children);
  const prev   = document.getElementById('vsPrev');
  const next   = document.getElementById('vsNext');
  const dotsEl = document.getElementById('vsDots');

  let index = 0, autoplayTimer=null;
  const AUTOPLAY_MS = 5000;
  const players = new Array(slides.length).fill(null);
  const initialized = new Array(slides.length).fill(false);

  slides.forEach((_, i) => {
    const b = document.createElement('button');
    b.addEventListener('click', () => goTo(i));
    dotsEl.appendChild(b);
  });

  function updateDots(){
    Array.from(dotsEl.children).forEach((b, i) =>
      b.setAttribute('aria-selected', i===index?'true':'false'));
  }

  function createPlayer(i){
    if (initialized[i]) return;
    initialized[i] = true;
    const host = slides[i].querySelector('.player-host');
    const vid  = host.dataset.video;
    players[i] = new YT.Player(host, {
      videoId: vid,
      playerVars:{
        autoplay:1, mute:1, loop:1, playlist:vid,
        controls:0, modestbranding:1, rel:0, fs:0,
        disablekb:1, iv_load_policy:3, playsinline:1
      },
      events:{
        onReady: (e)=>{
          slides[i].classList.add('ready');
          slides[i].querySelector('.skeleton').style.display='none';
          e.target.mute(); e.target.playVideo();
          try { e.target.setPlaybackQuality('hd1080'); } catch(err){}
        }
      }
    });
  }

  function activate(i){
    slides.forEach((_, sIdx)=>{
      const p = players[sIdx];
      if (sIdx===i) {
        if (!p) createPlayer(sIdx);
        else try { p.playVideo(); p.setPlaybackQuality('hd1080'); }catch(e){}
      } else if (p && p.pauseVideo) try { p.pauseVideo(); }catch(e){}
    });
  }

  function goTo(i){
    index = (i+slides.length)%slides.length;
    track.style.transform = `translateX(${-index*100}%)`;
    updateDots(); activate(index); restartAutoplay();
  }
  function nextSlide(){ goTo(index+1); }
  function prevSlide(){ goTo(index-1); }
  prev.addEventListener('click', prevSlide);
  next.addEventListener('click', nextSlide);

  function startAutoplay(){ stopAutoplay(); autoplayTimer=setInterval(nextSlide,AUTOPLAY_MS); }
  function stopAutoplay(){ if(autoplayTimer) clearInterval(autoplayTimer); }
  function restartAutoplay(){ startAutoplay(); }

  window.onYouTubeIframeAPIReady=function(){
    createPlayer(0); goTo(0); startAutoplay();
  };
})();
</script>
