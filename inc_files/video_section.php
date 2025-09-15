<section class="video-gallery">
  <h2 class="heading_1">Featured Videos</h2>

  <div class="video-gallery-grid">
    <!-- Video 1 -->
    <div class="video-card">
      <iframe 
        src="https://www.youtube.com/embed/h1NYXQkYO8Q?autoplay=1&mute=1&loop=1&playlist=h1NYXQkYO8Q&controls=0&modestbranding=1&rel=0&fs=0&disablekb=1&iv_load_policy=3" 
        title="Video 1" frameborder="0" allow="autoplay; encrypted-media">
      </iframe>
    </div>

    <!-- Video 2 -->
    <div class="video-card">
      <iframe 
        src="https://www.youtube.com/embed/Ahkt6Wrg1GI?autoplay=1&mute=1&loop=1&playlist=Ahkt6Wrg1GI&controls=0&modestbranding=1&rel=0&fs=0&disablekb=1&iv_load_policy=3" 
        title="Video 2" frameborder="0" allow="autoplay; encrypted-media">
      </iframe>
    </div>

    <!-- Video 3 -->
    <div class="video-card">
      <iframe 
        src="https://www.youtube.com/embed/KrCYPR5_Vt8?autoplay=1&mute=1&loop=1&playlist=KrCYPR5_Vt8&controls=0&modestbranding=1&rel=0&fs=0&disablekb=1&iv_load_policy=3" 
        title="Video 3" frameborder="0" allow="autoplay; encrypted-media">
      </iframe>
    </div>
  </div>
</section>

<style>
  .video-gallery-grid {
    display: grid;
    grid-template-columns: 1fr; /* Mobile: 1 per row */
    gap: 16px;
  }
  @media (min-width: 768px) {
    .video-gallery-grid {
      grid-template-columns: repeat(3, 1fr); /* Desktop: 3 per row */
      gap: 20px;
    }
  }
  .video-card {
    position: relative;
    aspect-ratio: 16/9; /* Keeps video responsive */
    overflow: hidden;
    border-radius: 12px;
    box-shadow: 0 6px 16px rgba(0,0,0,0.08);
  }
  .video-card iframe {
    width: 100%;
    height: 100%;
    display: block;
    pointer-events: none; /* 🚀 disables hover/click overlays */
  }
</style>
