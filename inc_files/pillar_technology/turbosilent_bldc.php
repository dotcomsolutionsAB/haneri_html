<style>
  /* Container and Layout */
  .bldc001 {
    /* max-width: 72rem; max-w-6xl */
    margin-left: auto;
    margin-right: auto;
    padding: 2rem 1rem;
  }

  .bldc102 {
    display: grid;
    grid-template-columns: 1fr;
    gap: 2.5rem;
    /* gap-10 */
  }

  @media (min-width: 1024px) {
    .bldc102 {
      grid-template-columns: repeat(2, 1fr);
    }
  }

  .bldc107 {
    display: grid;
    grid-template-columns: 1fr;
    gap: 2.5rem;
    margin-top: 3rem;
  }

  @media (min-width: 768px) {
    .bldc107 {
      grid-template-columns: repeat(2, 1fr);
    }
  }

  /* Headings */
  .bldc103 {
    font-size: 50px;
    font-family: 'Barlow Condensed';
    font-weight: 100;
    line-height: 1;
  }

  @media (min-width: 768px) {
    .bldc103 {
      font-size: 1.875rem;
    }
  }

  /* Text and Paragraphs */
  .bldc104 {
    margin-top: 1rem;
    text-align: justify;
    line-height: 1.75;
    color: #1f2937;
    font-size: 16px;
    line-height: 28.8px;
    font-weight: 400;
    font-family: 'Open Sans';
  }

  /* Image Wrapper Border */
  .bldc105 {
    border-width: 4px;
    border-color: #60a5fa;
    /* border-blue-400 */
    border-radius: 0.5rem;
    overflow: hidden;
  }

  /* List Styling */
  .bldc106 {
    list-style-type: disc;
    padding-left: 1.25rem;
    line-height: 1.75;
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
  }

  /* Benefits Block */
  .bldc108 {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
  }

  .bldc109 {
    display: flex;
    align-items: flex-start;
    gap: 0.75rem;
    font-size: 1.125rem;
    font-weight: 700;
    color: #047857;
    /* text-green-700 */
  }

  .bldc110 {
    width: 1.5rem;
    height: 1.5rem;
    margin-top: 0.25rem;
  }
</style>


<!-- Section 1 -->
<div class="bldc001">
  <div class="bldc102">
    <div>
      <img src="images/f12.png" alt="Motor Visual" class="w-full rounded" />
    </div>
    <div>
      <h2 class="bldc103">Introducing TurboSilent BLDC:<br>Unleashing Unmatched Power and Efficiency</h2>
      <p class="bldc104">
        At Haneri, we redefine engineering excellence with our proprietary TurboSilent BLDC Technology. This advanced
        motor design delivers higher torque, exceptional durability and unmatched energy efficiency, setting a new
        benchmark for fan performance and contributing to a greener environment.
      </p>
    </div>
  </div>

  <!-- Section 2 -->
  <div class="bldc102 mt-10">
    <div>
      <h2 class="bldc103 mb-4">Why TurboSilent BLDC Technology?</h2>
      <p class="bldc104">
        TurboSilent BLDC Technology features advanced thermal management, a compact design, and smart control systems
        that optimize performance and responsiveness. Real-time monitoring and predictive diagnostics further enhance
        its efficiency.
      </p>
    </div>
    <div class="bldc105">
      <img src="images/f12.png" alt="Blade Design" class="w-full object-contain" />
    </div>
  </div>

  <!-- Section 3 -->
  <div class="bldc102 mt-10">
    <div>
      <img src="images/f12.png" alt="Motor Render" class="w-full rounded" />
    </div>
    <div>
      <h2 class="bldc103 mb-4">The Science Behind Turbosilent BLDC Technology</h2>
      <ul class="bldc106">
        <li><strong>Electromagnetic Optimization:</strong> Finite Element Analysis (FEA) validates the magnetic circuit,
          minimizing losses.</li>
        <li><strong>Thermal Management:</strong> Optimized cooling and ventilation ensure performance under load.</li>
        <li><strong>Smart Power Electronics:</strong> FOC technology ensures consistent torque and speed regulation.
        </li>
        <li><strong>Structural Engineering:</strong> Durable, lightweight materials reduce weight and improve
          efficiency.</li>
      </ul>
    </div>
  </div>

  <!-- Section 4 -->
  <div class="bldc107">
    <!-- Left: Advantages -->
    <div>
      <h2 class="bldc103 mb-4">Unique Advantages of TurboSilent BLDC Technology</h2>
      <ul class="bldc106 text-justify">
        <li><strong>Higher Torque:</strong> Optimized magnetic design achieves better torque across speeds.</li>
        <li><strong>Long-Term Durability:</strong> Balanced rotors, precision bearings, and low-degradation materials.
        </li>
        <li><strong>Energy Efficiency:</strong> Reduced current ripple and improved performance up to 65% more
          efficient.</li>
        <li><strong>Electronics Reliability:</strong> Indian-made PCBs with rigorous heat and load testing.</li>
        <li><strong>Custom Testing:</strong> CAE simulation ensures robust design in real-world conditions.</li>
      </ul>
    </div>

    <!-- Right: Customer Benefits -->
    <div>
      <h2 class="bldc103 mb-4">Benefits For Customers</h2>
      <div class="bldc108">
        <div>
          <h3 class="bldc109"><img src="images/benifits/comfort.png" class="bldc110" alt="Comfort Icon" /> Enhanced
            Comfort</h3>
          <p>Experience superior cooling with high air delivery, ensuring a refreshing breeze in every corner of the
            room.</p>
        </div>
        <div>
          <h3 class="bldc109"><img src="images/benifits/cost savings.png" class="bldc110" alt="Savings Icon" /> Cost
            Savings</h3>
          <p>Energy-efficient operation translates to long-term savings on electricity bills.</p>
        </div>
        <div>
          <h3 class="bldc109"><img src="images/benifits/sustainable choice.png" class="bldc110" alt="Eco Icon" />
            Sustainable Choice</h3>
          <p>Air Curve Design contributes to a greener, more sustainable environment by reducing energy consumption</p>
        </div>
        <div>
          <h3 class="bldc109"><img src="images/benifits/enh.jpeg" class="bldc110" alt="Design Icon" /> Modern Aesthetics
          </h3>
          <p>Sleek, innovative blade designs complement contemporary interiors, adding a touch of sophistication to your
            space.</p>
        </div>
      </div>
    </div>
  </div>
</div>