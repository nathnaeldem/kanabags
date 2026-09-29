<template>
  <div class="home-page">
    <!-- Hero Section -->
    <section class="hero" aria-label="Hero Banner">
      <div class="hero-bg">
        <img src="/hero.jpg" alt="KanaBags eco-friendly paper bags and cups" class="hero-img" />
        <div class="hero-overlay"></div>
      </div>
      <div class="container hero-content">
        <div class="hero-split">
          <!-- Left Side: Text and Actions -->
          <div class="hero-text animate-fade-up">
            <div class="section-label section-label-teal">
              <Leaf class="icon-inline" /> FSC Certified Manufacturing
            </div>
            <h1>
              Get your customized<br />
              <span class="gradient-text">paperbag</span>
            </h1>
            <p class="hero-sub">
              Scalable, sustainable packaging for global brands. KanaBags LLC delivers
              high-capacity paper cups and retail bags — engineered in Lorton, VA,
              for the world's leading coffee and retail chains.
            </p>
            <div class="hero-actions">
              <router-link to="/order" class="btn btn-primary btn-lg">
                Request Enterprise Quote
                <ArrowRight class="icon-inline" />
              </router-link>
              <router-link to="/products" class="btn btn-amber btn-lg">View Catalog</router-link>
            </div>
            <div class="hero-stats">
              <div class="stat">
                <span class="stat-num">4</span>
                <span class="stat-label">Cup Sizes</span>
              </div>
              <div class="stat-sep"></div>
              <div class="stat">
                <span class="stat-num">6</span>
                <span class="stat-label">Color Print</span>
              </div>
              <div class="stat-sep"></div>
              <div class="stat">
                <span class="stat-num">2025</span>
                <span class="stat-label">Est. USA</span>
              </div>
            </div>
          </div>
          
          <!-- Right Side: Logo/Image -->
          <div class="hero-image-wrap animate-fade-up">
            <img src="/your_logo.png" alt="KanaBags Custom Logo" class="hero-custom-img" />
          </div>
        </div>
      </div>
      <!-- Scroll indicator -->
      <div class="scroll-hint">
        <div class="scroll-dot"></div>
      </div>
    </section>

    <!-- Trust Bar -->
    <section class="trust-bar">
      <div class="container">
        <div class="trust-items">
          <div class="trust-item"><CheckCircle2 class="icon-sm" /> <span>FSC-Certified Materials</span></div>
          <div class="trust-item"><Recycle class="icon-sm" /> <span>Recyclable & Compostable</span></div>
          <div class="trust-item"><Factory class="icon-sm" /> <span>High-Volume Manufacturing</span></div>
          <div class="trust-item"><Palette class="icon-sm" /> <span>Custom Flexographic Printing</span></div>
          <div class="trust-item"><MapPin class="icon-sm" /> <span>Made in USA</span></div>
        </div>
      </div>
    </section>

    <!-- Products Preview -->
    <section class="section" id="products-preview">
      <div class="container">
        <div class="section-header">
          <div class="section-label">Our Products</div>
          <h2>Packaging Built for <span class="gradient-text">Scale</span></h2>
          <p class="section-desc">From QSR coffee chains to global retail brands — we manufacture the sustainable packaging the world needs.</p>
        </div>

        <div class="products-grid">
          <!-- Paper Cups -->
          <div class="product-card featured">
            <div class="product-card-image">
              <img src="/paper_cup.jpg" alt="Paper Cups" />
              <span class="badge badge-green card-badge">Available Now</span>
            </div>
            <div class="product-card-body">
              <h3>Paper Cups</h3>
              <p>Premium industrial paper cups for hot and cold beverages. Eco-friendly linings with superior heat retention.</p>
              <div class="product-specs">
                <div class="spec"><span>Sizes</span><strong>8oz · 12oz · 16oz · 20oz</strong></div>
                <div class="spec"><span>Lining</span><strong>Aqueous / PLA Compostable</strong></div>
                <div class="spec"><span>Lid Fit</span><strong>Universal 90mm</strong></div>
              </div>
              <div class="product-actions">
                <router-link to="/order" class="btn btn-primary">Order Now</router-link>
                <router-link to="/products" class="btn btn-ghost">View Specs</router-link>
              </div>
            </div>
          </div>

          <!-- Retail Bags -->
          <div class="product-card">
            <div class="product-card-image">
              <img src="/retail_paperbg.jpg" alt="Retail Paper Bags" />
              <span class="badge badge-coming card-badge">Coming Soon</span>
            </div>
            <div class="product-card-body">
              <h3>Retail Paper Bags</h3>
              <p>Durable and stylish paper bags perfect for retail stores. Available in various sizes with custom printing options.</p>
              <div class="product-actions">
                <router-link to="/order" class="btn btn-outline">Join Waitlist</router-link>
                <router-link to="/products" class="btn btn-ghost">Learn More</router-link>
              </div>
            </div>
          </div>

          <!-- Grocery Bags -->
          <div class="product-card">
            <div class="product-card-image">
              <img src="/grocery_bag.jpg" alt="Grocery Paper Bags" />
              <span class="badge badge-green card-badge">Available</span>
            </div>
            <div class="product-card-body">
              <h3>Grocery Paper Bags</h3>
              <p>Strong and reliable paper bags designed for grocery stores. Reinforced handles for easy carrying, eco-conscious materials.</p>
              <div class="product-actions">
                <router-link to="/order" class="btn btn-primary">Order Now</router-link>
                <router-link to="/products" class="btn btn-ghost">Learn More</router-link>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- About Snippet -->
    <section class="section about-strip">
      <div class="container">
        <div class="about-inner">
          <div class="about-text">
          <div class="section-label section-label-amber">Our Story</div>
            <h2>From Humble Beginnings to <span class="gradient-text">Global Growth</span></h2>
            <p>
              KanaBags LLC, established in 2025 in the United States, is a proud extension of
              <strong>Kana PLC</strong> — a well-established company founded in 2010 with
              operations across various parts of Africa. Building on a solid foundation of
              innovation and sustainability, we deliver eco-friendly packaging that helps
              businesses reduce their ecological footprint.
            </p>
            <div class="about-highlights">
              <div class="highlight-item">
                <div class="icon-circle"><Globe class="icon-md" /></div>
                <div>
                  <strong>Global Roots</strong>
                  <p>Extension of Kana PLC — operating since 2010 across Africa and the USA.</p>
                </div>
              </div>
              <div class="highlight-item">
                <div class="icon-circle"><Home class="icon-md" /></div>
                <div>
                  <strong>Family-Owned</strong>
                  <p>A family business committed to quality, community, and sustainability.</p>
                </div>
              </div>
            </div>
            <router-link to="/about" class="btn btn-outline">Read Our Story</router-link>
          </div>
          <div class="about-visual">
            <div class="visual-card animate-float">
              <div class="vc-icon"><Factory class="icon-xl" /></div>
              <div class="vc-title">Our Factory</div>
              <div class="vc-addr">8390 Suite C Terminal Road<br />Lorton, VA 22079</div>
              <div class="vc-phone"><Phone class="icon-sm" /> (571) 632-6843</div>
            </div>
            <div class="values-mini">
              <div class="vm-item"><Leaf class="icon-sm" /> Sustainability</div>
              <div class="vm-item"><CheckCircle class="icon-sm" /> Quality</div>
              <div class="vm-item"><Users class="icon-sm" /> Partnership</div>
              <div class="vm-item"><Lightbulb class="icon-sm" /> Innovation</div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Environment Snippet -->
    <section class="section env-section">
      <div class="container">
        <div class="env-inner">
          <div class="env-visual">
            <div class="env-circle">
              <span class="env-big-icon"><Leaf class="icon-giant" /></span>
              <div class="env-rings">
                <div class="ring ring-1"></div>
                <div class="ring ring-2"></div>
                <div class="ring ring-3"></div>
              </div>
            </div>
          </div>
          <div class="env-text">
            <div class="section-label section-label-teal">Environmental Commitment</div>
            <h2>Protecting Our Planet, <span class="gradient-text">One Bag at a Time</span></h2>
            <p>
              At KanaBags LLC, environmental responsibility is at the core of everything we do.
              All our products are made from responsibly sourced, recycled materials.
              Our manufacturing processes are designed to minimize waste and energy consumption.
            </p>
            <ul class="env-list">
              <li><Recycle class="icon-sm" /> Responsibly sourced & recycled paper inputs</li>
              <li><Leaf class="icon-sm" /> PLA compostable lining options available</li>
              <li><Zap class="icon-sm" /> Energy-efficient manufacturing processes</li>
              <li><Ban class="icon-sm" /> Reducing plastic pollution one order at a time</li>
            </ul>
            <router-link to="/environment" class="btn btn-primary">Learn More</router-link>
          </div>
        </div>
      </div>
    </section>

    <!-- CTA Banner -->
    <section class="cta-banner">
      <div class="container">
        <div class="cta-inner">
          <div class="cta-text">
            <h2>Ready to <span class="gradient-text">Go Green</span> at Scale?</h2>
            <p>Direct access to our Lorton, VA manufacturing facility for high-volume retail partners. Request a free sample kit today.</p>
          </div>
          <div class="cta-actions">
            <router-link to="/order" class="btn btn-primary btn-lg animate-pulse-glow">
              <Rocket class="icon-inline" /> Request Free Sample Kit
            </router-link>
            <router-link to="/contact" class="btn btn-amber btn-lg">Talk to Us</router-link>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import { 
  Leaf, ArrowRight, CheckCircle2, Recycle, Factory, Palette, MapPin, 
  Coffee, ShoppingBag, ShoppingCart, Globe, Home, Phone, CheckCircle, 
  Users, Lightbulb, Zap, Ban, Rocket 
} from 'lucide-vue-next'

export default {
  name: 'HomePage',
  components: {
    Leaf, ArrowRight, CheckCircle2, Recycle, Factory, Palette, MapPin,
    Coffee, ShoppingBag, ShoppingCart, Globe, Home, Phone, CheckCircle,
    Users, Lightbulb, Zap, Ban, Rocket
  }
}
</script>

<style scoped>
/* Hero */
.hero {
  position: relative;
  min-height: 100vh;
  display: flex;
  align-items: center;
  overflow: hidden;
}
.hero-bg {
  position: absolute;
  inset: 0;
}
.hero-img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center;
}
.hero-overlay {
  position: absolute;
  inset: 0;
  background: linear-gradient(
    120deg,
    rgba(243, 250, 246, 0.96) 0%,
    rgba(243, 250, 246, 0.88) 38%,
    rgba(232, 155, 30, 0.12) 70%,
    rgba(26, 166, 160, 0.18) 100%
  );
}
.hero-content {
  position: relative;
  z-index: 2;
  padding-top: 7rem;
  padding-bottom: 4rem;
  width: 100%;
}
.hero-split {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 4rem;
  align-items: center;
}
.hero-text { max-width: 680px; }
.hero-text h1 { margin: 0.75rem 0 1.25rem; letter-spacing: -0.02em; }
.hero-sub {
  font-size: 1.1rem;
  color: var(--text-secondary);
  max-width: 560px;
  margin-bottom: 2rem;
}
.hero-actions {
  display: flex;
  gap: 1rem;
  flex-wrap: wrap;
  margin-bottom: 2.5rem;
}
.hero-stats {
  display: flex;
  align-items: center;
  gap: 1.5rem;
  background: rgba(255,255,255,0.7);
  border: 1px solid var(--border);
  border-radius: var(--radius-md);
  padding: 1rem 1.5rem;
  backdrop-filter: blur(8px);
  width: fit-content;
}
.hero-image-wrap {
  display: flex;
  justify-content: center;
  align-items: center;
}
.hero-custom-img {
  max-width: 100%;
  border-radius: var(--radius-lg);
  box-shadow: var(--shadow-lg), 0 0 0 4px rgba(34,179,107,0.15), 0 0 0 8px rgba(232,155,30,0.1);
  border: 1px solid rgba(34,179,107, 0.2);
  object-fit: cover;
}

.stat { text-align: center; }
.stat-num {
  display: block;
  font-family: 'Outfit', sans-serif;
  font-size: 1.8rem;
  font-weight: 800;
  color: var(--green-600);
}
.stat:nth-child(3) .stat-num { color: var(--teal); }
.stat:nth-child(5) .stat-num { color: var(--amber-dark); }
.stat-label {
  font-size: 0.75rem;
  color: var(--text-muted);
  text-transform: uppercase;
  letter-spacing: 0.08em;
}
.stat-sep {
  width: 1px;
  height: 40px;
  background: var(--border);
}
.scroll-hint {
  position: absolute;
  bottom: 2rem;
  left: 50%;
  transform: translateX(-50%);
  z-index: 2;
}
.scroll-dot {
  width: 28px;
  height: 44px;
  border: 2px solid var(--green-400);
  border-radius: 14px;
  position: relative;
}
.scroll-dot::before {
  content: '';
  position: absolute;
  top: 6px;
  left: 50%;
  transform: translateX(-50%);
  width: 4px;
  height: 8px;
  background: var(--amber);
  border-radius: 2px;
  animation: scrollPulse 1.8s ease infinite;
}
@keyframes scrollPulse {
  0% { opacity: 1; top: 6px; }
  100% { opacity: 0; top: 22px; }
}

/* Icons */
.icon-inline { width: 18px; height: 18px; margin-right: 4px; vertical-align: text-bottom; }
.icon-sm { width: 16px; height: 16px; margin-right: 4px; vertical-align: text-bottom; }
.icon-md { width: 24px; height: 24px; }
.icon-xl { width: 40px; height: 40px; color: var(--green-600); }
.icon-giant { width: 80px; height: 80px; color: var(--teal); }

/* Trust Bar */
.trust-bar {
  background: linear-gradient(90deg, var(--green-800), var(--green-700) 40%, var(--teal-dark) 100%);
  border-top: none;
  border-bottom: none;
  padding: 1.25rem 0;
}
.trust-items {
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  gap: 2rem;
}
.trust-item {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  font-size: 0.88rem;
  color: rgba(255,255,255,0.7);
  font-weight: 500;
}
.trust-item span { color: #fff; }
.trust-item .icon-sm { color: var(--amber); }

/* Products Grid */
.section-header {
  text-align: center;
  margin-bottom: 3rem;
}
.section-desc {
  max-width: 560px;
  margin: 0.75rem auto 0;
  font-size: 1.05rem;
}
.products-grid {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  gap: 1.5rem;
  align-items: start;
}
.product-card {
  background: var(--surface-1);
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  overflow: hidden;
  transition: all var(--transition);
  display: flex;
  flex-direction: column;
  box-shadow: var(--shadow-sm);
}
.product-card:hover {
  border-color: var(--border-hover);
  box-shadow: var(--shadow-md), var(--shadow-glow);
  transform: translateY(-4px);
}
.product-card.featured {
  border-color: rgba(34,179,107,0.4);
  box-shadow: 0 8px 32px rgba(34,179,107,0.12);
}
.product-card:nth-child(2) {
  border-top: 3px solid var(--sky);
}
.product-card:nth-child(3) {
  border-top: 3px solid var(--amber);
}
.product-card.featured {
  border-top: 3px solid var(--green-500);
}
.product-card-image {
  position: relative;
  width: 100%;
  height: 200px;
  overflow: hidden;
}
.product-card-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.4s ease;
}
.product-card:hover .product-card-image img {
  transform: scale(1.05);
}
.card-badge {
  position: absolute;
  top: 0.75rem;
  left: 0.75rem;
  z-index: 1;
}
.product-card-body {
  padding: 1.5rem;
  display: flex;
  flex-direction: column;
  flex: 1;
}
.product-card-body h3 { margin-bottom: 0.5rem; }
.product-card-body > p { font-size: 0.9rem; margin-bottom: 1.25rem; }
.product-specs {
  display: flex;
  flex-direction: column;
  gap: 0.5rem;
  margin-bottom: 1.5rem;
  background: var(--surface-2);
  border-radius: var(--radius-sm);
  padding: 1rem;
}
.spec {
  display: flex;
  justify-content: space-between;
  font-size: 0.84rem;
  gap: 0.5rem;
}
.spec span { color: var(--text-muted); }
.spec strong { color: var(--green-700); text-align: right; }
.product-actions { display: flex; gap: 0.75rem; flex-wrap: wrap; margin-top: auto; }

/* About Strip */
.about-strip {
  background: linear-gradient(135deg, var(--amber-soft) 0%, var(--surface-1) 40%, var(--teal-soft) 100%);
  border-top: 1px solid var(--border);
  border-bottom: 1px solid var(--border);
}
.about-inner {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 4rem;
  align-items: center;
}
.about-text h2 { margin: 0.75rem 0 1rem; }
.about-text p { margin-bottom: 1.5rem; }
.about-highlights { display: flex; flex-direction: column; gap: 1rem; margin-bottom: 1.5rem; }
.highlight-item {
  display: flex;
  align-items: flex-start;
  gap: 1rem;
}
.highlight-item strong { display: block; color: var(--text-primary); margin-bottom: 0.25rem; }
.highlight-item p { font-size: 0.88rem; margin: 0; }
.icon-circle {
  display: flex; align-items: center; justify-content: center;
  width: 48px; height: 48px;
  background: var(--green-50);
  border-radius: 50%; color: var(--green-600);
  border: 1px solid rgba(34,179,107,0.25);
}
.highlight-item:nth-child(2) .icon-circle {
  background: var(--amber-soft);
  color: var(--amber-dark);
  border-color: rgba(232,155,30,0.3);
}
.about-visual {
  display: flex;
  flex-direction: column;
  gap: 1.5rem;
  align-items: center;
}
.visual-card {
  background: var(--surface-1);
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  padding: 2rem;
  text-align: center;
  width: 100%;
  box-shadow: var(--shadow-md);
}
.vc-icon { margin-bottom: 0.75rem; display: flex; justify-content: center; }
.vc-title {
  font-family: 'Outfit', sans-serif;
  font-weight: 700;
  font-size: 1.1rem;
  color: var(--text-primary);
  margin-bottom: 0.5rem;
}
.vc-addr { font-size: 0.88rem; color: var(--text-muted); line-height: 1.6; margin-bottom: 0.5rem; }
.vc-phone { font-size: 0.88rem; color: var(--green-700); font-weight: 600; }
.values-mini {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 0.75rem;
  width: 100%;
}
.vm-item {
  background: var(--surface-1);
  border: 1px solid var(--border);
  border-radius: var(--radius-sm);
  padding: 0.75rem;
  text-align: center;
  font-size: 0.85rem;
  color: var(--text-secondary);
  font-weight: 500;
  display: flex; align-items: center; justify-content: center; gap: 0.25rem;
  box-shadow: var(--shadow-sm);
}
.vm-item:nth-child(1) { border-left: 3px solid var(--green-500); }
.vm-item:nth-child(2) { border-left: 3px solid var(--sky); }
.vm-item:nth-child(3) { border-left: 3px solid var(--amber); }
.vm-item:nth-child(4) { border-left: 3px solid var(--teal); }

/* Environment */
.env-section {
  background: linear-gradient(180deg, var(--teal-soft) 0%, var(--bg) 100%);
}
.env-inner {
  display: grid;
  grid-template-columns: 1fr 1.2fr;
  gap: 4rem;
  align-items: center;
}
.env-visual {
  display: flex;
  justify-content: center;
}
.env-circle {
  position: relative;
  width: 220px;
  height: 220px;
  display: flex;
  align-items: center;
  justify-content: center;
}
.env-big-icon {
  position: relative;
  z-index: 2;
  filter: drop-shadow(0 8px 20px rgba(26,166,160,0.35));
  animation: float 3s ease-in-out infinite;
}
.ring {
  position: absolute;
  border-radius: 50%;
  border: 1px solid rgba(26,166,160,0.3);
}
.ring-1 { width: 140px; height: 140px; animation: ringPulse 3s ease infinite; border-color: rgba(34,179,107,0.35); }
.ring-2 { width: 180px; height: 180px; animation: ringPulse 3s ease infinite 0.5s; border-color: rgba(26,166,160,0.3); }
.ring-3 { width: 220px; height: 220px; animation: ringPulse 3s ease infinite 1s; border-color: rgba(232,155,30,0.25); }
@keyframes ringPulse {
  0%, 100% { opacity: 0.5; transform: scale(1); }
  50% { opacity: 0.15; transform: scale(1.05); }
}
.env-text h2 { margin: 0.75rem 0 1rem; }
.env-text p { margin-bottom: 1.5rem; }
.env-list {
  list-style: none;
  display: flex;
  flex-direction: column;
  gap: 0.7rem;
  margin-bottom: 2rem;
}
.env-list li {
  color: var(--text-secondary);
  font-size: 0.95rem;
  display: flex;
  align-items: center;
  background: var(--surface-1);
  padding: 0.65rem 1rem;
  border-radius: var(--radius-sm);
  border: 1px solid var(--border);
}
.env-list li .icon-sm { color: var(--teal); }

/* CTA Banner */
.cta-banner {
  padding: 5rem 0;
  background: linear-gradient(135deg, var(--green-800) 0%, var(--green-700) 45%, var(--teal-dark) 100%);
  border-top: none;
  position: relative;
  overflow: hidden;
}
.cta-banner::before {
  content: '';
  position: absolute;
  top: -40%;
  right: -10%;
  width: 400px;
  height: 400px;
  background: radial-gradient(circle, rgba(232,155,30,0.25), transparent 70%);
  pointer-events: none;
}
.cta-inner {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 2rem;
  flex-wrap: wrap;
  position: relative;
  z-index: 1;
}
.cta-text h2 { margin-bottom: 0.5rem; color: #fff; }
.cta-text h2 .gradient-text {
  background: linear-gradient(135deg, #ffe08a, #fff, #7ee0db);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}
.cta-text p { max-width: 500px; color: rgba(255,255,255,0.85); }
.cta-actions { display: flex; gap: 1rem; flex-wrap: wrap; }
.cta-actions .btn-primary {
  background: linear-gradient(135deg, var(--amber-dark), var(--amber));
  box-shadow: 0 4px 20px rgba(232,155,30,0.4);
}
.cta-actions .btn-amber {
  background: rgba(255,255,255,0.15);
  border: 1.5px solid rgba(255,255,255,0.5);
  box-shadow: none;
}
.cta-actions .btn-amber:hover {
  background: rgba(255,255,255,0.25);
}

@media (max-width: 900px) {
  .hero-split { grid-template-columns: 1fr; gap: 2rem; }
  .products-grid { grid-template-columns: 1fr; }
  .about-inner, .env-inner { grid-template-columns: 1fr; }
  .env-visual { order: -1; }
  .cta-inner { flex-direction: column; text-align: center; }
  .cta-actions { justify-content: center; }
}
</style>
