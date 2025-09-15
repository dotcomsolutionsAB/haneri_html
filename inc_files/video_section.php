<section class="video-gallery">
  <h2 class="heading_1">Featured Videos</h2>

  <div class="video-gallery-grid">
    <!-- Video 1 -->
    <div class="video-card">
      <iframe width="100%" height="100%" 
        src="https://www.youtube.com/embed/h1NYXQkYO8Q" 
        title="Video 1" frameborder="0" allowfullscreen>
      </iframe>
    </div>

    <!-- Video 2 -->
    <div class="video-card">
      <iframe width="100%" height="100%" 
        src="https://www.youtube.com/embed/Ahkt6Wrg1GI" 
        title="Video 2" frameborder="0" allowfullscreen>
      </iframe>
    </div>

    <!-- Video 3 -->
    <div class="video-card">
      <iframe width="100%" height="100%" 
        src="https://www.youtube.com/embed/KrCYPR5_Vt8" 
        title="Video 3" frameborder="0" allowfullscreen>
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
    aspect-ratio: 16/9; /* Keep responsive ratio */
    overflow: hidden;
    border-radius: 12px;
    box-shadow: 0 6px 16px rgba(0,0,0,0.08);
  }
  .video-card iframe {
    width: 100%;
    height: 100%;
    display: block;
  }
</style>
