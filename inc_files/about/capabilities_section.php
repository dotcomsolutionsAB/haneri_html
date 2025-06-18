<!-- Manufacturing & R&D Section -->
<div class="cpblts_107">
    <div class="cpblts_108">
        <div class="cpblts_109">
            <h2 class="cpblts_110">Excellence in Manufacturing, R&D, and Innovation</h2>
            <p class="cpblts_111">
                At Haneri, we seamlessly integrate design, innovation, and precision manufacturing, ensuring every product
                exemplifies quality, functionality, and elegance.
            </p>
        </div>
        <div class="cpblts_div_img">
            <img src="images/capa_2.png" alt="Manufacturing Image" class="cpblts_img" />
        </div>
    </div>

    <div class="cpblts_108">
        <div class="cpblts_109">
            <h2 class="cpblts_110">Product-Specific R&D and Prototyping Facilities</h2>
            <p class="cpblts_111">
                Innovation is at the heart of Haneri. Our dedicated research and development teams focus on creating products
                that redefine everyday living.
            </p>
        </div>
        <div class="cpblts_div_img">
            <img src="images/capa_1.png" alt="R&D Facility Image" class="cpblts_img" />
        </div>
    </div>

</div>

<style>
    .cpblts_div_img {
  width: 50%;
}

/* Section Wrapper */
.cpblts_107 {
  max-width: 100%;
  display: flex;
  flex-direction: column;
  gap: 4rem;
  padding: 3rem 0;
}

/* Content Row */
.cpblts_108 {
  display: flex;
  flex-direction: column;
}

@media (min-width: 992px) {
  .cpblts_108 {
    flex-direction: row;
    justify-content: space-between;
    align-items: flex-start;
  }
}

/* Text Column */
.cpblts_109 {
  width: 100%;
  padding-right: 0;
}
@media (min-width: 992px) {
  .cpblts_109 {
    width: 50%;
    max-width: 50%;
    padding-right: 0;
  }
}

/* Image Column */
.cpblts_112 {
  width: 100%;
}
@media (min-width: 992px) {
  .cpblts_112 {
    width: 50%;
    max-width: 50%;
  }
}

/* Headings */
.cpblts_110 {
  font-size: 58px;
  font-weight: 300;
  font-family: 'Barlow Condensed', sans-serif;
  color: #00473E;
  margin-bottom: 1rem;
  line-height: 1.2;
}

/* Paragraph */
.cpblts_111 {
  font-size: 30px;
  font-family: 'Open Sans', sans-serif;
  color: #000;
  line-height: 1.8;
}

/* Image */
.cpblts_img {
  width: 100%;
  height: auto;
  max-width: 880px;
  max-height: 586.67px;
  display: block;
  object-fit: cover;
}

/* ---------------------------- */
/* ✅ Responsive for ≤520px */
/* ---------------------------- */
@media (max-width: 520px) {
  .cpblts_107 {
    padding: 2rem 1rem;
    gap: 2.5rem;
  }

  .cpblts_108 {
    flex-direction: column;
    gap: 1.5rem;
  }

  .cpblts_109,
  .cpblts_div_img {
    width: 100%;
    max-width: 100%;
  }

  .cpblts_110 {
    font-size: 36px;
    text-align: left;
  }

  .cpblts_111 {
    font-size: 18px;
    line-height: 1.6;
    text-align: left;
  }

  .cpblts_img {
    max-width: 100%;
    height: auto;
    max-height: none;
  }
}

</style>