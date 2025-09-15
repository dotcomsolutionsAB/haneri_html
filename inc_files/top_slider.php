<section class="video-gallery-slider">
  <h2 class="heading_1">Featured Videos</h2>

  <div class="video-slider" id="videoSlider" aria-roledescription="carousel">
    <button class="nav-btn prev" aria-label="Previous video" id="vsPrev">‹</button>

    <div class="track" id="vsTrack">
      <!-- Slide 1 -->
      <div class="video-slide" data-index="0" aria-roledescription="slide" aria-label="1 of 3">
        <div class="skeleton"></div>
        <div class="anti-overlay"></div>
        <div class="player-host" id="yt-host-0"
             data-video="h1NYXQkYO8Q"></div>
      </div>

      <!-- Slide 2 -->
      <div class="video-slide" data-index="1" aria-roledescription="slide" aria-label="2 of 3">
        <div class="skeleton"></div>
        <div class="anti-overlay"></div>
        <div class="player-host" id="yt-host-1"
             data-video="Ahkt6Wrg1GI"></div>
      </div>

      <!-- Slide 3 -->
      <div class="video-slide" data-index="2" aria-roledescription="slide" aria-label="3 of 3">
        <div class="skeleton"></div>
        <div class="anti-overlay"></div>
        <div class="player-host" id="yt-host-2"
             data-video="KrCYPR5_Vt8"></div>
      </div>
    </div>

    <button class="nav-btn next" aria-label="Next video" id="vsNext">›</button>

    <div class="dots" id="vsDots" role="tablist" aria-label="Slides navigation"></div>
  </div>
</section>

<style>
  .video-gallery-slider { width: 100%; }
  .video-slider { position: relative; width: 100%; overflow: hidden; }
  .video-slider .track {
    display: flex; transition: transform 450ms ease; will-change: transform;
  }
  .video-slide {
    min-width: 100%; position: relative; aspect-ratio: 16/9; background:#000; overflow: hidden;
  }
  .player-host, .player-host iframe {
    width:100%; height:100%;
  }

  /* --- Skeleton shimmer --- */
  .skeleton {
    position:absolute; inset:0;
    background: linear-gradient(90deg, #1a1a1a 25%, #2a2a2a 37%, #1a1a1a 63%);
    background-size: 400% 100%;
    animation: shimmer 1.3s infinite;
  }
  @keyframes shimmer { 0% {background-position: 100% 0;} 100% {background-position: 0 0;} }

  /* --- Anti overlay (hides YT title/UI flash for ~1s on start) --- */
  .anti-overlay {
    position:absolute; inset:0; background:#000; opacity:1; pointer-events:none;
    transition: opacity .35s ease;
  }
  .video-slide.ready .anti-overlay { opacity:0; }

  /* Arrows */
  .video-slider .nav-btn {
    position: absolute; top: 50%; transform: translateY(-50%); z-index: 3;
    width: 44px; height: 44px; border-radius: 50%; border: none; cursor: pointer;
    background: rgba(0,0,0,0.45); color: #fff; font-size: 26px; line-height: 44px; text-align: center; padding: 0;
  }
  .video-slider .prev { left: 12px; }
  .video-slider .next { right: 12px; }
  .video-slider .nav-btn:hover { background: rgba(0,0,0,0.6); }

  /* Dots */
  .video-slider .dots {
    position: absolute; bottom: 10px; left: 50%; transform: translateX(-50%); z-index: 3; display:flex; gap:8px;
  }
  .video-slider .dots button {
    width: 10px; height:10px; border-radius:50%; border:none; background: rgba(255,255,255,0.5); cursor:pointer; padding:0;
  }
  .video-slider .dots button[aria-selected="true"] { background:#fff; }

  /* Responsive: full width one slide view on all sizes */
  @media (min-width: 768px) {
    .video-slide { aspect-ratio: 16/9; }
  }
</style>

<script>
(function(){
  // 1) Load YouTube Iframe API
  const tag = document.createElement('script');
  tag.src = "https://www.youtube.com/iframe_api";
  document.head.appendChild(tag);

  const slider = document.getElementById('videoSlider');
  const track  = document.getElementById('vsTrack');
  const slides = Array.from(track.children);
  const prev   = document.getElementById('vsPrev');
  const next   = document.getElementById('vsNext');
  const dotsEl = document.getElementById('vsDots');

  let index = 0;
  let autoplayTimer = null;
  const AUTOPLAY_MS = 5000; // 2) slide after 5 seconds
  const players = new Array(slides.length).fill(null);
  const initialized = new Array(slides.length).fill(false);

  // Build dots
  slides.forEach((_, i) => {
    const b = document.createElement('button');
    b.setAttribute('role', 'tab');
    b.setAttribute('aria-controls', 'slide-' + i);
    b.addEventListener('click', () => goTo(i));
    dotsEl.appendChild(b);
  });

  function updateDots(){
    Array.from(dotsEl.children).forEach((b, i) => {
      b.setAttribute('aria-selected', i === index ? 'true' : 'false');
    });
  }

  // Create a player for a given slide (lazy)
  function createPlayer(i){
    if (initialized[i]) return;
    initialized[i] = true;

    const host = slides[i].querySelector('.player-host');
    const vid  = host.dataset.video;

    players[i] = new YT.Player(host, {
      videoId: vid,
      playerVars: {
        autoplay: 1,
        mute: 1,
        loop: 1,
        playlist: vid,          // loop needs playlist=videoId
        controls: 0,
        modestbranding: 1,
        rel: 0,
        fs: 0,
        disablekb: 1,
        iv_load_policy: 3,
        playsinline: 1
      },
      events: {
        onReady: (e) => {
          // Hide skeleton, then briefly keep overlay to suppress initial YT title/options
          slides[i].classList.add('ready');
          const skel = slides[i].querySelector('.skeleton');
          if (skel) skel.style.display = 'none';

          // start playback
          try { e.target.mute(); e.target.playVideo(); } catch(e){}
          // allow a short mask to avoid the initial hover/title flash
          setTimeout(() => {
            // overlay will fade via CSS when .ready is present (already set)
          }, 1000);
        },
        onStateChange: (e) => {
          // If video ended (shouldn't with loop=1), replay
          if (e.data === YT.PlayerState.ENDED) {
            try { e.target.playVideo(); } catch(err){}
          }
        }
      }
    });
  }

  // Play/pause management so only active slide plays
  function activate(i){
    slides.forEach((slide, sIdx) => {
      if (sIdx === i) {
        if (!players[sIdx]) createPlayer(sIdx);
        // If already ready, ensure it's playing
        const p = players[sIdx];
        if (p && p.playVideo) { try { p.playVideo(); } catch(e){} }
      } else {
        const p = players[sIdx];
        if (p && p.pauseVideo) { try { p.pauseVideo(); } catch(e){} }
      }
    });
  }

  function goTo(i){
    index = (i + slides.length) % slides.length;
    const x = -index * 100;
    track.style.transform = `translateX(${x}%)`;
    updateDots();
    activate(index);
    restartAutoplay();
  }

  function nextSlide(){ goTo(index + 1); }
  function prevSlide(){ goTo(index - 1); }

  prev.addEventListener('click', prevSlide);
  next.addEventListener('click', nextSlide);

  // 3) Autoplay carousel
  function startAutoplay(){
    stopAutoplay();
    autoplayTimer = setInterval(nextSlide, AUTOPLAY_MS);
  }
  function stopAutoplay(){
    if (autoplayTimer) clearInterval(autoplayTimer);
    autoplayTimer = null;
  }
  function restartAutoplay(){ startAutoplay(); }

  // Pause on hover/focus (desktop)
  slider.addEventListener('mouseenter', stopAutoplay);
  slider.addEventListener('mouseleave', startAutoplay);
  slider.addEventListener('focusin', stopAutoplay);
  slider.addEventListener('focusout', startAutoplay);

  // Swipe support (mobile)
  let startX = 0, isDown = false;
  slider.addEventListener('touchstart', (e) => {
    isDown = true; startX = e.touches[0].clientX;
  }, {passive: true});
  slider.addEventListener('touchmove', (e) => {
    if (!isDown) return;
    const dx = e.touches[0].clientX - startX;
    if (Math.abs(dx) > 50) {
      isDown = false;
      if (dx < 0) nextSlide(); else prevSlide();
    }
  }, {passive: true});
  slider.addEventListener('touchend', () => { isDown = false; }, {passive: true});

  // Expose init after YT API loads
  window.onYouTubeIframeAPIReady = function(){
    // Pre-create the first player so skeleton disappears quickly
    createPlayer(0);
    goTo(0);
    startAutoplay();
  };
})();
</script>
