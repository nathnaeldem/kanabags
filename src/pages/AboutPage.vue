<template>
  <div class="about-page">
    <section class="page-hero">
      <div class="container">
        <div class="section-label">Our Story</div>
        <h1>From Humble Beginnings to <span class="gradient-text">Global Growth</span></h1>
        <p class="page-hero-sub">A family-owned manufacturer rooted in African excellence, growing sustainable solutions for a global market.</p>
      </div>
    </section>

    <!-- Story Section -->
    <section class="section">
      <div class="container">
        <div class="story-grid">
          <div class="story-text">
            <h2>Who We Are</h2>
            <p>
              KanaBags LLC, established in 2025 in the United States, is a proud extension of
              <strong>Kana PLC</strong> — a well-established company founded in 2010 with operations
              across various parts of Africa. As a diversified industry leader, Kana PLC has built
              a strong reputation as a service provider and manufacturer in multiple sectors,
              committed to excellence and sustainable development.
            </p>
            <p style="margin-top:1rem;">
              Building on this solid foundation, KanaBags LLC was created to focus on eco-friendly
              packaging solutions. As a family-owned manufacturing company, we are dedicated to
              producing high-quality, environmentally responsible products that serve as sustainable
              alternatives to plastics.
            </p>
            <p style="margin-top:1rem;">
              Our mission is to help businesses reduce their ecological footprint by offering
              durable, affordable, and innovative packaging products. Starting with paper bags,
              KanaBags LLC is now expanding into paper cup manufacturing to meet the growing
              global demand for sustainable packaging.
            </p>
          </div>
          <div class="story-visual">
            <div class="timeline">
              <div class="tl-item" v-for="event in timeline" :key="event.year">
                <div class="tl-dot"></div>
                <div class="tl-content">
                  <span class="tl-year">{{ event.year }}</span>
                  <strong>{{ event.title }}</strong>
                  <p>{{ event.desc }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Values -->
    <section class="section values-section">
      <div class="container">
        <div class="section-header">
          <div class="section-label">Our Values</div>
          <h2>What <span class="gradient-text">Drives Us</span></h2>
          <p class="section-desc">Four core principles guide every product we make and every partnership we build.</p>
        </div>
        <div class="values-grid">
          <div class="value-card card" v-for="v in values" :key="v.title">
            <div class="value-icon"><component :is="v.icon" class="icon-xl" /></div>
            <h3>{{ v.title }}</h3>
            <p>{{ v.desc }}</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Location -->
    <section class="section location-section">
      <div class="container">
        <div class="loc-inner">
          <div class="loc-info">
            <div class="section-label">Our Factory</div>
            <h2>Based in <span class="gradient-text">Lorton, Virginia</span></h2>
            <p>Our manufacturing facility is strategically located in Lorton, VA — optimally positioned for North American distribution and global export.</p>
            <div class="loc-details">
              <div class="loc-item">
                <div class="icon-circle"><MapPin class="icon-inline" /></div>
                <div>
                  <strong>Address</strong>
                  <p>8390 Suite C Terminal Road, Lorton VA 22079</p>
                </div>
              </div>
              <div class="loc-item">
                <div class="icon-circle"><Phone class="icon-inline" /></div>
                <div>
                  <strong>Phone</strong>
                  <a href="tel:+15716326843">(571) 632-6843</a>
                  <a href="tel:+12023363453">(202) 336-3453</a>
                </div>
              </div>
              <div class="loc-item">
                <div class="icon-circle"><Mail class="icon-inline" /></div>
                <div>
                  <strong>Email</strong>
                  <a href="mailto:operations@kanabagsllc.net">operations@kanabagsllc.net</a>
                  <a href="mailto:info@kanabagsllc.net">info@kanabagsllc.net</a>
                </div>
              </div>
            </div>
            <router-link to="/contact" class="btn btn-primary">Get in Touch</router-link>
          </div>
          <div class="loc-map">
            <div class="map-card">
              <div class="map-pin"><MapPin class="icon-2xl text-green" /></div>
              <div class="map-label">KanaBags LLC</div>
              <div class="map-addr">8390 Suite C Terminal Road<br/>Lorton, VA 22079</div>
              <a href="https://maps.google.com/?q=8390+Terminal+Road+Lorton+VA+22079" target="_blank" rel="noopener noreferrer" class="btn btn-ghost" style="margin-top:1rem;width:100%;justify-content:center;">
                <MapPin class="icon-inline" /> View on Google Maps
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import { Sprout, Target, Handshake, Lightbulb, MapPin, Phone, Mail } from 'lucide-vue-next'

export default {
  name: 'AboutPage',
  components: {
    Sprout, Target, Handshake, Lightbulb, MapPin, Phone, Mail
  },
  data() {
    return {
      timeline: [
        { year: '2010', title: 'Kana PLC Founded', desc: 'Parent company Kana PLC established, growing into a diversified African industry leader across manufacturing and services.' },
        { year: '2025', title: 'KanaBags LLC Launched', desc: 'KanaBags LLC established in Lorton, Virginia — focusing on eco-friendly packaging for North American and global markets.' },
        { year: '2025', title: 'Paper Bags Production', desc: 'Commenced manufacturing of high-quality grocery and retail paper bags with custom printing capabilities.' },
        { year: '2026', title: 'Paper Cups Expansion', desc: 'Launched premium industrial paper cups line for QSR and coffee chain markets, with FSC-certified materials.' },
      ],
      values: [
        { icon: 'Sprout', title: 'Sustainability', desc: 'We prioritize eco-friendly materials and processes to minimize our environmental impact at every step of production.' },
        { icon: 'Target', title: 'Quality', desc: 'Our products are manufactured to the highest standards of durability and functionality, meeting global QSR requirements.' },
        { icon: 'Handshake', title: 'Partnership', desc: 'We work closely with our clients to provide customized solutions that meet their specific business needs and brand identity.' },
        { icon: 'Lightbulb', title: 'Innovation', desc: 'We continuously explore new ways to improve our products and reduce our environmental footprint through R&D.' },
      ]
    }
  }
}
</script>

<style scoped>
.about-page { padding-top: 100px; }
.page-hero {
  padding: 5rem 0 3rem;
  text-align: center;
  background:
    radial-gradient(ellipse at 20% top, rgba(34,179,107,0.12) 0%, transparent 50%),
    radial-gradient(ellipse at 80% top, rgba(232,155,30,0.1) 0%, transparent 45%);
  border-bottom: 1px solid var(--border);
}
.page-hero h1 { margin: 0.75rem 0 1rem; }
.page-hero-sub { color: var(--text-secondary); font-size: 1.05rem; max-width: 560px; margin: 0 auto; }

.story-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 4rem;
  align-items: start;
}
.story-text h2 { margin-bottom: 1rem; }
.story-text p { font-size: 0.97rem; }
.timeline { display: flex; flex-direction: column; gap: 0; position: relative; padding-left: 1.5rem; }
.timeline::before {
  content: '';
  position: absolute;
  left: 8px; top: 0; bottom: 0;
  width: 2px;
  background: linear-gradient(to bottom, var(--green-500), var(--teal), var(--amber));
}
.tl-item {
  position: relative;
  padding-bottom: 2rem;
  padding-left: 1.5rem;
}
.tl-item:last-child { padding-bottom: 0; }
.tl-dot {
  position: absolute;
  left: -1.5rem;
  top: 4px;
  width: 14px; height: 14px;
  border-radius: 50%;
  background: var(--green-500);
  border: 3px solid var(--surface-1);
  box-shadow: 0 0 0 2px var(--amber), 0 4px 12px rgba(34,179,107,0.35);
}
.tl-year {
  font-size: 0.78rem;
  font-weight: 700;
  color: var(--amber-dark);
  text-transform: uppercase;
  letter-spacing: 0.1em;
  display: block;
  margin-bottom: 0.2rem;
}
.tl-content strong { display: block; color: var(--text-primary); margin-bottom: 0.4rem; }
.tl-content p { font-size: 0.87rem; }

.values-section { background: var(--surface-1); border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); }
.section-header { text-align: center; margin-bottom: 3rem; }
.section-desc { max-width: 540px; margin: 0.75rem auto 0; }
.values-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 1.5rem;
}
.value-card { text-align: center; }
.value-icon { margin-bottom: 1rem; color: var(--green-600); }
.value-card:nth-child(2) .value-icon { color: var(--teal); }
.value-card:nth-child(3) .value-icon { color: var(--amber-dark); }
.value-card:nth-child(4) .value-icon { color: var(--sky); }
.value-card h3 { margin-bottom: 0.5rem; }

.location-section { }
.loc-inner {
  display: grid;
  grid-template-columns: 1.2fr 1fr;
  gap: 4rem;
  align-items: center;
}
.loc-info h2 { margin: 0.75rem 0 1rem; }
.loc-info p { margin-bottom: 2rem; }
.loc-details { display: flex; flex-direction: column; gap: 1.25rem; margin-bottom: 2rem; }
.loc-item { display: flex; gap: 1rem; align-items: flex-start; }
.loc-item strong { display: block; color: var(--text-primary); margin-bottom: 0.25rem; font-size: 0.88rem; }
.loc-item p, .loc-item a {
  display: block;
  font-size: 0.88rem;
  color: var(--text-muted);
  line-height: 1.6;
  transition: color var(--transition);
}
.loc-item a:hover { color: var(--green-600); }
.map-card {
  background: var(--surface-1);
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  padding: 3rem 2rem;
  text-align: center;
  box-shadow: var(--shadow-glow);
}
.map-pin { margin-bottom: 1rem; }
.map-label {
  font-family: 'Outfit', sans-serif;
  font-weight: 700;
  font-size: 1.1rem;
  color: var(--text-primary);
  margin-bottom: 0.5rem;
}
.map-addr { font-size: 0.9rem; color: var(--text-muted); line-height: 1.6; }

.icon-inline { width: 16px; height: 16px; margin-right: 4px; vertical-align: text-bottom; }
.icon-xl { width: 40px; height: 40px; }
.icon-2xl { width: 48px; height: 48px; }
.text-green { color: var(--green-400); }

@media (max-width: 900px) {
  .story-grid, .loc-inner { grid-template-columns: 1fr; }
  .values-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 600px) {
  .values-grid { grid-template-columns: 1fr; }
}
</style>
