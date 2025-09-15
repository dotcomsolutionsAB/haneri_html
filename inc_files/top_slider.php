<section class="video-gallery-slider">
  <h2 class="heading_1">Featured Videos</h2>

  <div class="video-slider" id="videoSlider" aria-roledescription="carousel">
    <button class="nav-btn prev" aria-label="Previous video" id="vsPrev">‹</button>

    <div class="track" id="vsTrack">
      <!-- Slide 1 -->
      <div class="video-slide" data-index="0" aria-roledescription="slide" aria-label="1 of 3">
        <iframe
          class="yt-frame"
          title="Video 1"
          frameborder="0"
          allow="autoplay; encrypted-media"
          allowfullscreen
          data-src="https://www.youtube.com/embed/h1NYXQkYO8Q?autoplay=1&mute=1&loop=1&playlist=h1NYXQkYO8Q&controls=0&modestbranding=1&rel=0&fs=0&disablekb=1&iv_load_policy=3">
        </iframe>
      </div>

      <!-- Slide 2 -->
      <div class="video-slide" data-index="1" aria-roledescription="slide" aria-label="2 of 3">
        <iframe
          class="yt-frame"
          title="Video 2"
          frameborder="0"
          allow="autoplay; encrypted-media"
          allowfullscreen
          data-src="https://www.youtube.com/embed/Ahkt6Wrg1GI?autoplay=1&mute=1&loop=1&playlist=Ahkt6Wrg1GI&controls=0&modestbranding=1&rel=0&fs=0&disablekb=1&iv_load_policy=3">
        </iframe>
      </div>

      <!-- Slide 3 -->
      <div class="video-slide" data-index="2" aria-roledescription="slide" aria-label="3 of 3">
        <iframe
          class="yt-frame"
          title="Video 3"
          frameborder="0"
          allow="autoplay; encrypted-media"
          allowfullscreen
          data-src="https://www.youtube.com/embed/KrCYPR5_Vt8?autoplay=1&mute=1&loop=1&playlist=KrCYPR5_Vt8&controls=0&modestbranding=1&rel=0&fs=0&disablekb=1&iv_load_policy=3">
        </iframe>
      </div>
    </div>

    <button class="nav-btn next" aria-label="Next video" id="vsNext">›</button>

    <div class="dots" id="vsDots" role="tablist" aria-label="Slides navigation"></div>
  </div>
</section>

<style>
  /* Layout */
  .video-gallery-slider { width: 100%; }
  .video-slider {
    position: relative;
    width: 100%;
    overflow: hidden;
  }
  .video-slider .track {
    display: flex;
    transition: transform 450ms ease;
    will-change: transform;
  }
  .video-slide {
    min-width: 100%;
    position: relative;
    aspect-ratio: 16 / 9; /* full-width responsive */
    background: #000;
  }
  .video-slide .yt-frame {
    width: 100%;
    height: 100%;
    display: block;
    border: 0;
    /* prevent hover overlays when you *do* allow pointer events elsewhere */
    pointer-events: none;
  }

  /* Arrows */
  .video-slider .nav-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 3;
    width: 44px;
    height: 44px;
    border-radius: 50%;
    border: none;
    cursor: pointer;
    background: rgba(0,0,0,0.45);
    color: #fff;
    font-size: 26px;
    line-height: 44px;
    text-align: center;
    padding: 0;
  }
  .video-slider .prev { left: 12px; }
  .video-slider .next { right: 12px; }
  .video-slider .nav-btn:hover { background: rgba(0,0,0,0.6); }

  /* Dots */
  .video-slider .dots {
    position: absolute;
    bottom: 10px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 3;
    display: flex;
    gap: 8px;
  }
  .video-slider .dots button {
    width: 10px; height: 10px;
    border-radius: 50%;
    border: none;
    background: rgba(255,255,255,0.5);
    cursor: pointer;
    padding: 0;
  }
  .video-slider .dots button[aria-selected="true"] {
    background: #fff;
  }

  /* Mobile: 1 per view (already full width). Desktop also full-width single slide. */
  @media (min-width: 768px) {
    .video-slide { aspect-ratio: 16 / 9; }
  }
</style>

<script>
(function(){
  const slider = document.getElementById('videoSlider');
  const track  = document.getElementById('vsTrack');
  const slides = Array.from(track.children);
  const prev   = document.getElementById('vsPrev');
  const next   = document.getElementById('vsNext');
  const dotsEl = document.getElementById('vsDots');

  let index = 0;
  let autoplayTimer = null;
  const AUTOPLAY_MS = 7000; // slide every 7s

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

  function lazyLoad(i){
    slides.forEach((slide, sIdx) => {
      const iframe = slide.querySelector('iframe');
      if (sIdx === i) {
        // activate current
        if (!iframe.src) iframe.src = iframe.dataset.src;
      } else {
        // stop videos on non-active slides by removing src
        if (iframe.src) iframe.src = '';
      }
    });
  }

  function goTo(i){
    index = (i + slides.length) % slides.length;
    const x = -index * 100;
    track.style.transform = `translateX(${x}%)`;
    lazyLoad(index);
    updateDots();
    restartAutoplay();
  }

  function nextSlide(){ goTo(index + 1); }
  function prevSlide(){ goTo(index - 1); }

  prev.addEventListener('click', prevSlide);
  next.addEventListener('click', nextSlide);

  // Autoplay
  function startAutoplay(){
    stopAutoplay();
    autoplayTimer = setInterval(nextSlide, AUTOPLAY_MS);
  }
  function stopAutoplay(){
    if (autoplayTimer) clearInterval(autoplayTimer);
    autoplayTimer = null;
  }
  function restartAutoplay(){
    startAutoplay();
  }

  // Pause on hover / focus (desktop)
  slider.addEventListener('mouseenter', stopAutoplay);
  slider.addEventListener('mouseleave', startAutoplay);
  slider.addEventListener('focusin', stopAutoplay);
  slider.addEventListener('focusout', startAutoplay);

  // Swipe support (mobile)
  let startX = 0, isDown = false;
  slider.addEventListener('touchstart', (e) => {
    isDown = true;
    startX = e.touches[0].clientX;
  }, {passive: true});
  slider.addEventListener('touchmove', (e) => {
    if (!isDown) return;
    const dx = e.touches[0].clientX - startX;
    // do not drag; just detect swipe threshold
    if (Math.abs(dx) > 50) {
      isDown = false;
      if (dx < 0) nextSlide(); else prevSlide();
    }
  }, {passive: true});
  slider.addEventListener('touchend', () => { isDown = false; }, {passive: true});

  // Init
  goTo(0);        // load first slide, stop the others
  startAutoplay(); // begin carousel
})();
</script>
