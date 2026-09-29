<template>
  <div class="env-page">
    <section class="page-hero">
      <div class="container">
        <div class="section-label"><Leaf class="icon-inline" /> Environmental Commitment</div>
        <h1>Protecting Our Planet, <span class="gradient-text">One Bag at a Time</span></h1>
        <p class="page-hero-sub">Environmental responsibility is at the core of everything we do. We believe businesses have a crucial role to play in creating a sustainable future.</p>
      </div>
    </section>

    <!-- Main Statement -->
    <section class="section">
      <div class="container">
        <div class="env-main-grid">
          <div class="env-big-visual">
            <div class="env-orb">
              <Globe class="orb-icon text-green" />
              <div class="orb-rings">
                <div class="r r1"></div>
                <div class="r r2"></div>
                <div class="r r3"></div>
              </div>
            </div>
            <div class="orb-caption">Manufactured in the USA · Eco-Certified</div>
          </div>
          <div class="env-main-text">
            <h2>Our Environmental <span class="gradient-text">Mission</span></h2>
            <p>
              At KanaBags LLC, environmental responsibility is at the core of everything we do.
              We believe that businesses have a crucial role to play in creating a sustainable future.
              All our paper products are made from responsibly sourced materials, with a significant
              portion coming from recycled paper.
            </p>
            <p style="margin-top:1rem;">
              Our manufacturing processes are designed to minimize waste and energy consumption.
              By choosing KanaBags, you're not just getting quality packaging — you're making a
              conscious choice to support environmental protection and reduce plastic pollution.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Pillars -->
    <section class="section pillars-section">
      <div class="container">
        <div class="section-header">
          <div class="section-label">Our Green Pillars</div>
          <h2>How We Make a <span class="gradient-text">Difference</span></h2>
        </div>
        <div class="pillars-grid">
          <div class="pillar-card" v-for="p in pillars" :key="p.title">
            <div class="pillar-icon-wrap">
              <component :is="p.icon" class="icon-xl text-green" />
            </div>
            <h3>{{ p.title }}</h3>
            <p>{{ p.desc }}</p>
            <div class="pillar-stat">
              <span class="ps-num">{{ p.stat }}</span>
              <span class="ps-label">{{ p.statLabel }}</span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Certifications -->
    <section class="section certs-section">
      <div class="container">
        <div class="section-header">
          <div class="section-label">Certifications & Standards</div>
          <h2>Our <span class="gradient-text">Green Credentials</span></h2>
        </div>
        <div class="certs-grid">
          <div class="cert-card card" v-for="c in certs" :key="c.name">
            <div class="cert-icon"><component :is="c.icon" class="icon-xl text-green" /></div>
            <div class="cert-name">{{ c.name }}</div>
            <div class="cert-desc">{{ c.desc }}</div>
          </div>
        </div>
      </div>
    </section>

    <!-- Impact Promise -->
    <section class="impact-section">
      <div class="container">
        <div class="impact-inner">
          <h2>Make the <span class="gradient-text">Sustainable Choice</span></h2>
          <p>Every order with KanaBags LLC directly contributes to reducing plastic pollution and supporting responsible forestry. Partner with us and make your brand part of the solution.</p>
          <div class="impact-actions">
            <router-link to="/order" class="btn btn-primary btn-lg" >Start Your Order</router-link>
            <router-link to="/contact" class="btn btn-outline btn-lg">Ask About Our Standards</router-link>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import { Leaf, Globe, Sprout, Recycle, Zap, Waves, Thermometer, Factory } from 'lucide-vue-next'

export default {
  name: 'EnvironmentPage',
  components: {
    Leaf, Globe, Sprout, Recycle, Zap, Waves, Thermometer, Factory
  },
  data() {
    return {
      pillars: [
        {
          icon: 'Sprout',
          title: 'Responsibly Sourced',
          desc: 'All our paper products are made from FSC-certified materials, with a significant portion coming from recycled paper and responsibly managed forests.',
          stat: '100%', statLabel: 'FSC-Certified Materials'
        },
        {
          icon: 'Recycle',
          title: 'Recycled Content',
          desc: 'We maximize the use of post-consumer recycled paper in our manufacturing process, reducing demand on virgin fiber and diverting waste from landfills.',
          stat: '60%+', statLabel: 'Recycled Input Content'
        },
        {
          icon: 'Zap',
          title: 'Energy Efficient',
          desc: 'Our manufacturing processes are designed to minimize energy consumption and carbon emissions at every stage of production.',
          stat: '40%', statLabel: 'Lower Carbon vs Plastic'
        },
        {
          icon: 'Waves',
          title: 'Plastic-Free',
          desc: 'Every bag and cup we produce is an alternative to single-use plastics, reducing ocean pollution and landfill waste across the supply chain.',
          stat: '0', statLabel: 'Plastic in Our Products'
        },
      ],
      certs: [
        { icon: 'Leaf', name: 'FSC Certified', desc: 'Forest Stewardship Council certification ensures responsible forest management for all paper inputs.' },
        { icon: 'Thermometer', name: 'PLA Compostable', desc: 'Our PLA-lined cups are industrially compostable, breaking down cleanly in commercial composting facilities.' },
        { icon: 'Recycle', name: 'Recyclable', desc: 'All our paper bags and non-coated cups are curbside recyclable in most municipalities.' },
        { icon: 'Factory', name: 'USA Manufactured', desc: 'Made in the USA under strict environmental and labor standards, supporting local communities.' },
      ]
    }
  }
}
</script>

<style scoped>
.env-page { padding-top: 80px; }
.page-hero {
  padding: 5rem 0 3rem;
  text-align: center;
  background:
    radial-gradient(ellipse at 30% top, rgba(26,166,160,0.14) 0%, transparent 50%),
    radial-gradient(ellipse at 70% top, rgba(34,179,107,0.1) 0%, transparent 45%);
  border-bottom: 1px solid var(--border);
}
.page-hero h1 { margin: 0.75rem 0 1rem; }
.page-hero-sub { color: var(--text-secondary); font-size: 1.05rem; max-width: 600px; margin: 0 auto; }
.section-header { text-align: center; margin-bottom: 3rem; }
.section-desc { max-width: 540px; margin: 0.75rem auto 0; }

.env-main-grid {
  display: grid;
  grid-template-columns: 1fr 1.5fr;
  gap: 4rem;
  align-items: center;
}
.env-big-visual {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 1.5rem;
}
.env-orb {
  position: relative;
  width: 240px;
  height: 240px;
  display: flex;
  align-items: center;
  justify-content: center;
}
.orb-icon {
  width: 96px; height: 96px;
  z-index: 2;
  animation: float 4s ease-in-out infinite;
  filter: drop-shadow(0 0 30px rgba(37,168,100,0.4));
}
.r {
  position: absolute;
  border-radius: 50%;
  border: 1px solid rgba(37,168,100,0.2);
}
.r1 { width: 120px; height: 120px; animation: rPulse 3s ease infinite; }
.r2 { width: 180px; height: 180px; animation: rPulse 3s ease infinite 0.6s; }
.r3 { width: 240px; height: 240px; animation: rPulse 3s ease infinite 1.2s; }
@keyframes rPulse {
  0%,100% { opacity: 0.5; }
  50% { opacity: 0.1; transform: scale(1.05); }
}
.orb-caption { font-size: 0.8rem; color: var(--text-muted); text-align: center; }
.env-main-text h2 { margin-bottom: 1rem; }

.pillars-section { background: var(--surface-1); border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); }
.pillars-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 1.5rem;
}
.pillar-card {
  background: var(--surface-2);
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  padding: 2rem 1.5rem;
  transition: all var(--transition);
  text-align: center;
}
.pillar-card:hover {
  border-color: var(--border-hover);
  box-shadow: var(--shadow-glow);
  transform: translateY(-4px);
}
.pillar-icon-wrap {
  width: 64px; height: 64px;
  border-radius: 50%;
  background: rgba(37,168,100,0.1);
  border: 1px solid rgba(37,168,100,0.2);
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto 1rem;
}
.pillar-card h3 { margin-bottom: 0.75rem; font-size: 1.05rem; }
.pillar-card p { font-size: 0.87rem; margin-bottom: 1.5rem; }
.pillar-stat { border-top: 1px solid var(--border); padding-top: 1rem; }
.ps-num {
  display: block;
  font-family: 'Outfit', sans-serif;
  font-size: 1.8rem;
  font-weight: 800;
  color: var(--green-700);
}
.pillar-card:nth-child(2) .ps-num { color: var(--teal); }
.pillar-card:nth-child(3) .ps-num { color: var(--amber-dark); }
.pillar-card:nth-child(4) .ps-num { color: var(--sky); }
.ps-label { font-size: 0.75rem; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.08em; }

.certs-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 1.5rem;
}
.cert-card { text-align: center; }
.cert-icon { margin-bottom: 0.75rem; }
.cert-name {
  font-weight: 700;
  color: var(--text-primary);
  margin-bottom: 0.5rem;
  font-size: 0.95rem;
}
.cert-desc { font-size: 0.85rem; color: var(--text-muted); }

.impact-section {
  padding: 6rem 0;
  background: linear-gradient(135deg, var(--green-800) 0%, var(--green-700) 45%, var(--teal-dark) 100%);
  border-top: none;
  text-align: center;
}
.impact-inner h2 { margin-bottom: 1rem; font-size: clamp(1.8rem, 3vw, 2.8rem); color: #fff; }
.impact-inner h2 .gradient-text {
  background: linear-gradient(135deg, #ffe08a, #fff, #7ee0db);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}
.impact-inner p { max-width: 600px; margin: 0 auto 2.5rem; font-size: 1.05rem; color: rgba(255,255,255,0.85); }
.impact-actions { display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap; }

.icon-inline { width: 16px; height: 16px; margin-right: 4px; vertical-align: text-bottom; }
.icon-xl { width: 40px; height: 40px; }
.text-green { color: var(--green-600); }

@media (max-width: 900px) {
  .env-main-grid { grid-template-columns: 1fr; }
  .pillars-grid, .certs-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 600px) {
  .pillars-grid, .certs-grid { grid-template-columns: 1fr; }
}
</style>
