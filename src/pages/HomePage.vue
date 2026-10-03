<template>
  <div class="home-page">
    <!-- Hero — ecommerce style -->
    <section class="hero" aria-label="Hero Banner">
      <div class="hero-bg">
        <img src="/hero.jpg" alt="KanaBags factory packaging products" class="hero-img" />
        <div class="hero-overlay"></div>
      </div>

      <div class="container hero-content">
        <div class="hero-copy animate-fade-up">
          <h1 class="brand-title">KanaBags</h1>
          <p class="hero-tagline">Factory-direct paper packaging. Skip the middleman.</p>
          <p class="hero-sub">
            Chips pockets, ice cream cups, and paper cups manufactured in Lorton, VA —
            not imported through secondhand merchants. Order from the source.
          </p>
          <div class="hero-actions">
            <router-link to="/order" class="btn-shop">Order now</router-link>
            <router-link to="/products" class="btn-ghost-light">Shop catalog</router-link>
          </div>
        </div>

        <!-- Product carousel -->
        <div class="hero-shop animate-fade-up">
          <div class="shop-track">
            <router-link
              v-for="(item, i) in shopProducts"
              :key="item.name"
              to="/order"
              class="shop-card"
              :class="{ active: i === activeSlide }"
              @mouseenter="activeSlide = i"
            >
              <img :src="item.img" :alt="item.name" />
              <div class="shop-card-meta">
                <span class="shop-name">{{ item.name }}</span>
                <span class="shop-price">{{ item.price }}</span>
              </div>
            </router-link>
          </div>

          <div class="shop-controls">
            <button class="shop-arrow" @click="prevSlide" aria-label="Previous products">
              <ChevronLeft />
            </button>
            <div class="shop-dots">
              <button
                v-for="(_, i) in shopProducts"
                :key="i"
                class="dot"
                :class="{ active: i === activeSlide }"
                @click="activeSlide = i"
                :aria-label="`Go to product ${i + 1}`"
              />
            </div>
            <button class="shop-arrow" @click="nextSlide" aria-label="Next products">
              <ChevronRight />
            </button>
          </div>
        </div>
      </div>
    </section>

    <!-- Why factory-direct -->
    <section class="section why-section">
      <div class="container">
        <div class="section-header">
          <div class="section-label">Why Buy From Us</div>
          <h2>Stop Waiting <span class="gradient-text">45 Days</span> on Importers</h2>
          <p class="section-desc">
            Most “suppliers” are secondhand merchants — they buy from manufacturers like us,
            mark it up, then make you wait. Cut them out. Buy factory-direct.
          </p>
        </div>

        <div class="compare-grid">
          <div class="compare-card bad">
            <div class="compare-badge">Importers / Resellers</div>
            <ul>
              <li><XCircle class="ico" /> 30–45+ day lead times overseas</li>
              <li><XCircle class="ico" /> Middleman markups on every unit</li>
              <li><XCircle class="ico" /> No control over production quality</li>
              <li><XCircle class="ico" /> You’re buying from someone who buys from us</li>
            </ul>
          </div>
          <div class="compare-card good">
            <div class="compare-badge win">KanaBags — Manufacturer</div>
            <ul>
              <li><CheckCircle2 class="ico" /> Made in our Lorton, VA facility</li>
              <li><CheckCircle2 class="ico" /> Factory pricing — no secondhand markup</li>
              <li><CheckCircle2 class="ico" /> Faster turnaround for US buyers</li>
              <li><CheckCircle2 class="ico" /> Custom print & wholesale partner rates</li>
            </ul>
            <router-link to="/order" class="btn btn-primary compare-cta">
              Order from the factory <ArrowRight class="icon-inline" />
            </router-link>
          </div>
        </div>
      </div>
    </section>

    <!-- Ecommerce product grid -->
    <section class="section shop-section" id="shop">
      <div class="container">
        <div class="section-header">
          <div class="section-label section-label-amber">Shop Packaging</div>
          <h2>Wholesale Pricing That <span class="gradient-text">Starts Low</span></h2>
          <p class="section-desc">Volume pricing for shops, restaurants, distributors, and partners. Starting prices shown — better rates as you scale.</p>
        </div>

        <div class="ecom-grid">
          <article v-for="p in catalog" :key="p.name" class="ecom-card">
            <div class="ecom-img">
              <img :src="p.img" :alt="p.name" />
              <span class="ecom-tag" v-if="p.tag">{{ p.tag }}</span>
            </div>
            <div class="ecom-body">
              <h3>{{ p.name }}</h3>
              <p>{{ p.desc }}</p>
              <div class="ecom-price-row">
                <div>
                  <span class="from">From</span>
                  <strong class="price">{{ p.price }}</strong>
                  <span class="unit">/ unit</span>
                </div>
                <router-link to="/order" class="btn btn-primary ecom-btn">Order</router-link>
              </div>
            </div>
          </article>
        </div>
      </div>
    </section>

    <!-- Partner / commission -->
    <section class="section partner-section">
      <div class="container">
        <div class="partner-inner">
          <div class="partner-copy">
            <div class="section-label section-label-teal">Wholesale & Partners</div>
            <h2>Earn With Us — Become a <span class="gradient-text">KanaBags Partner</span></h2>
            <p>
              We offer commissions and wholesale rates for people and businesses who sell,
              distribute, or introduce buyers. Importers make money sitting between you and the factory —
              now you can take that cut instead.
            </p>
            <ul class="partner-perks">
              <li><Handshake class="ico" /> Wholesale partner pricing & volume tiers</li>
              <li><BadgeDollarSign class="ico" /> Resale / referral commissions</li>
              <li><Users class="ico" /> Dedicated support for active partners</li>
              <li><Truck class="ico" /> Priority production for partner orders</li>
            </ul>
            <div class="partner-actions">
              <router-link to="/order" class="btn btn-amber btn-lg">Apply as Partner</router-link>
              <router-link to="/contact" class="btn btn-outline btn-lg">Talk to Sales</router-link>
            </div>
          </div>
          <div class="partner-stats">
            <div class="pstat">
              <span class="pstat-num">0¢–10¢</span>
              <span class="pstat-label">Entry unit pricing</span>
            </div>
            <div class="pstat">
              <span class="pstat-num">USA</span>
              <span class="pstat-label">Manufactured in Virginia</span>
            </div>
            <div class="pstat">
              <span class="pstat-num">Direct</span>
              <span class="pstat-label">No importer middlemen</span>
            </div>
            <div class="pstat">
              <span class="pstat-num">Custom</span>
              <span class="pstat-label">Print & private label</span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Trust strip -->
    <section class="trust-bar">
      <div class="container">
        <div class="trust-items">
          <div class="trust-item"><Factory class="icon-sm" /> <span>Real Manufacturer</span></div>
          <div class="trust-item"><MapPin class="icon-sm" /> <span>Lorton, VA Facility</span></div>
          <div class="trust-item"><Leaf class="icon-sm" /> <span>Eco Paper Packaging</span></div>
          <div class="trust-item"><BadgeDollarSign class="icon-sm" /> <span>Wholesale Commissions</span></div>
          <div class="trust-item"><Zap class="icon-sm" /> <span>Faster Than Importing</span></div>
        </div>
      </div>
    </section>

    <!-- Final CTA -->
    <section class="cta-banner">
      <div class="container">
        <div class="cta-inner">
          <div class="cta-text">
            <h2>Ready to Order From the <span class="gradient-text">Factory</span>?</h2>
            <p>Get a quote today — chips pockets from 10¢, single-wall cups from 8¢, double-wall from 10¢. Wholesale & partner rates available.</p>
          </div>
          <div class="cta-actions">
            <router-link to="/order" class="btn btn-primary btn-lg animate-pulse-glow">
              <ShoppingCart class="icon-inline" /> Place Order
            </router-link>
            <a href="tel:+15716326843" class="btn btn-amber btn-lg">
              <Phone class="icon-inline" /> Call (571) 632-6843
            </a>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import {
  ArrowRight, CheckCircle2, XCircle, ChevronLeft, ChevronRight,
  Handshake, BadgeDollarSign, Users, Truck, Factory, MapPin,
  Leaf, Zap, ShoppingCart, Phone
} from 'lucide-vue-next'

export default {
  name: 'HomePage',
  components: {
    ArrowRight, CheckCircle2, XCircle, ChevronLeft, ChevronRight,
    Handshake, BadgeDollarSign, Users, Truck, Factory, MapPin,
    Leaf, Zap, ShoppingCart, Phone
  },
  data() {
    return {
      activeSlide: 0,
      shopProducts: [
        { name: 'Chips Pocket Bags', price: 'from 10¢', img: '/retail_paperbg.jpg' },
        { name: 'Ice Cream Cups', price: 'from 8¢', img: '/paper_cup.jpg' },
        { name: 'Single Wall Cups', price: 'from 8¢', img: '/paper_cup.jpg' },
        { name: 'Double Wall Cups', price: 'from 10¢', img: '/paper_cup.jpg' },
        { name: 'Grocery Paper Bags', price: 'Ask quote', img: '/grocery_bag.jpg' },
      ],
      catalog: [
        {
          name: 'Chips Pocket Paper Bags',
          desc: 'Grease-resistant paper pockets for chips, snacks, and takeout. Brandable & made for high-volume food service.',
          price: '10¢',
          tag: 'Best seller',
          img: '/retail_paperbg.jpg',
        },
        {
          name: 'Ice Cream Cups',
          desc: 'Food-safe paper cups built for scoops, soft serve, and dessert shops. Custom print available.',
          price: '8¢',
          tag: 'New',
          img: '/paper_cup.jpg',
        },
        {
          name: 'Single Wall Cups',
          desc: 'Lightweight paper cups for cold drinks and light hot use. Clean look, factory-direct pricing.',
          price: '8¢',
          tag: null,
          img: '/paper_cup.jpg',
        },
        {
          name: 'Double Wall Cups',
          desc: 'Insulated double-wall construction for hot coffee & specialty drinks — no sleeve needed.',
          price: '10¢',
          tag: 'Hot drinks',
          img: '/paper_cup.jpg',
        },
        {
          name: 'Grocery Paper Bags',
          desc: 'Strong carry bags for grocery and retail. Reinforced handles, eco paper stock.',
          price: 'Quote',
          tag: null,
          img: '/grocery_bag.jpg',
        },
        {
          name: 'Custom Print Packaging',
          desc: 'Private-label printing for your brand — cups, pockets, and bags at manufacturer rates.',
          price: 'Quote',
          tag: 'Partners',
          img: '/your_logo.png',
        },
      ],
    }
  },
  mounted() {
    this._auto = setInterval(() => this.nextSlide(), 4200)
  },
  beforeUnmount() {
    clearInterval(this._auto)
  },
  methods: {
    nextSlide() {
      this.activeSlide = (this.activeSlide + 1) % this.shopProducts.length
    },
    prevSlide() {
      this.activeSlide = (this.activeSlide - 1 + this.shopProducts.length) % this.shopProducts.length
    }
  }
}
</script>

<style scoped>
.home-page { overflow-x: hidden; }

/* ===== Hero ===== */
.hero {
  position: relative;
  max-height: 100vh;
  display: flex;
  align-items: flex-end;
  padding: 7.5rem 0 2.5rem;
}
.hero-bg { position: absolute; inset: 0; }
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
    180deg,
    rgba(6, 28, 18, 0.55) 0%,
    rgba(6, 28, 18, 0.45) 40%,
    rgba(6, 28, 18, 0.78) 100%
  );
}
.hero-content {
  position: relative;
  z-index: 2;
  width: 100%;
  display: flex;
  flex-direction: column;
  gap: 2.5rem;
}
.hero-copy {
  max-width: 720px;
  text-align: left;
}
.brand-title {
  font-size: clamp(3rem, 8vw, 5.5rem);
  font-weight: 800;
  color: var(--amber);
  letter-spacing: -0.03em;
  margin-bottom: 0.35rem;
  text-shadow: 0 4px 30px rgba(0,0,0,0.35);
}
.hero-tagline {
  font-size: clamp(1.25rem, 2.5vw, 1.85rem);
  font-weight: 700;
  color: #fff;
  margin-bottom: 0.85rem;
  line-height: 1.3;
}
.hero-sub {
  color: rgba(255,255,255,0.88);
  font-size: 1.05rem;
  max-width: 560px;
  margin-bottom: 1.5rem;
  line-height: 1.7;
}
.hero-actions {
  display: flex;
  flex-wrap: wrap;
  gap: 0.85rem;
}
.btn-shop {
  display: inline-flex;
  align-items: center;
  padding: 0.95rem 2rem;
  border-radius: 999px;
  background: var(--amber);
  color: #1a1200;
  font-weight: 800;
  font-size: 1rem;
  box-shadow: 0 8px 28px rgba(232,155,30,0.45);
  transition: all var(--transition);
}
.btn-shop:hover {
  transform: translateY(-2px);
  background: #f0ad2e;
}
.btn-ghost-light {
  display: inline-flex;
  align-items: center;
  padding: 0.95rem 2rem;
  border-radius: 999px;
  border: 1.5px solid rgba(255,255,255,0.75);
  color: #fff;
  font-weight: 700;
  font-size: 1rem;
  transition: all var(--transition);
}
.btn-ghost-light:hover {
  background: rgba(255,255,255,0.12);
  transform: translateY(-2px);
}

/* Carousel */
.hero-shop { width: 100%; }
.shop-track {
  display: flex;
  gap: 1rem;
  padding-bottom: 0.5rem;
  overflow-x: auto;
  scroll-snap-type: x mandatory;
  scrollbar-width: none;
}
.shop-track::-webkit-scrollbar { display: none; }
.shop-card {
  flex: 0 0 calc(20% - 0.8rem);
  min-width: 160px;
  height: 200px;
  border-radius: 22px;
  overflow: hidden;
  position: relative;
  border: 2px solid transparent;
  box-shadow: 0 10px 30px rgba(0,0,0,0.25);
  transition: all 0.35s ease;
  text-decoration: none;
  scroll-snap-align: center;
}
.shop-card img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.4s ease;
}
.shop-card:hover img,
.shop-card.active img { transform: scale(1.06); }
.shop-card.active {
  border-color: var(--amber);
  transform: translateY(-6px) scale(1.03);
  box-shadow: 0 16px 40px rgba(232,155,30,0.35);
}
.shop-card-meta {
  position: absolute;
  left: 0; right: 0; bottom: 0;
  padding: 1.5rem 0.85rem 0.85rem;
  background: linear-gradient(transparent, rgba(0,0,0,0.85));
  display: flex;
  flex-direction: column;
  gap: 0.15rem;
}
.shop-name {
  color: #fff;
  font-weight: 700;
  font-size: 0.88rem;
}
.shop-price {
  color: var(--amber);
  font-weight: 800;
  font-size: 0.95rem;
}
.shop-controls {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 1rem;
  margin-top: 1.25rem;
}
.shop-arrow {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  border: 1.5px solid rgba(255,255,255,0.45);
  background: rgba(255,255,255,0.1);
  color: #fff;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: all var(--transition);
}
.shop-arrow:hover {
  background: var(--amber);
  border-color: var(--amber);
  color: #1a1200;
}
.shop-arrow :deep(svg) { width: 20px; height: 20px; }
.shop-dots { display: flex; gap: 0.4rem; align-items: center; }
.dot {
  width: 8px;
  height: 8px;
  border-radius: 999px;
  border: none;
  background: rgba(255,255,255,0.35);
  cursor: pointer;
  transition: all 0.3s ease;
  padding: 0;
}
.dot.active {
  width: 22px;
  background: var(--amber);
}

/* ===== Why / Compare ===== */
.why-section { background: var(--surface-1); }
.section-header { text-align: center; margin-bottom: 3rem; }
.section-desc { max-width: 640px; margin: 0.75rem auto 0; font-size: 1.05rem; }
.compare-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 1.5rem;
  max-width: 960px;
  margin: 0 auto;
}
.compare-card {
  border-radius: var(--radius-lg);
  padding: 2rem;
  border: 1px solid var(--border);
}
.compare-card.bad {
  background: #fff8f7;
  border-color: rgba(232, 93, 76, 0.25);
}
.compare-card.good {
  background: linear-gradient(160deg, var(--green-50), #fff);
  border-color: rgba(34, 179, 107, 0.35);
  box-shadow: var(--shadow-md);
}
.compare-badge {
  display: inline-block;
  font-size: 0.78rem;
  font-weight: 800;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  padding: 0.35rem 0.8rem;
  border-radius: 999px;
  background: var(--coral-soft);
  color: var(--coral);
  margin-bottom: 1.25rem;
}
.compare-badge.win {
  background: var(--green-50);
  color: var(--green-700);
  border: 1px solid rgba(34,179,107,0.3);
}
.compare-card ul {
  list-style: none;
  display: flex;
  flex-direction: column;
  gap: 0.85rem;
}
.compare-card li {
  display: flex;
  align-items: flex-start;
  gap: 0.65rem;
  font-size: 0.98rem;
  color: var(--text-secondary);
  font-weight: 500;
}
.compare-card .ico { width: 20px; height: 20px; flex-shrink: 0; margin-top: 2px; }
.compare-card.bad .ico { color: var(--coral); }
.compare-card.good .ico { color: var(--green-600); }
.compare-cta { margin-top: 1.5rem; }
.icon-inline { width: 18px; height: 18px; }

/* ===== Shop grid ===== */
.shop-section {
  background: linear-gradient(180deg, var(--amber-soft) 0%, var(--bg) 30%, var(--bg) 100%);
}
.ecom-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 1.5rem;
}
.ecom-card {
  background: var(--surface-1);
  border-radius: 22px;
  overflow: hidden;
  border: 1px solid var(--border);
  box-shadow: var(--shadow-sm);
  transition: all var(--transition);
  display: flex;
  flex-direction: column;
}
.ecom-card:hover {
  transform: translateY(-5px);
  box-shadow: var(--shadow-md);
  border-color: var(--border-hover);
}
.ecom-img {
  position: relative;
  height: 200px;
  overflow: hidden;
}
.ecom-img img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.4s ease;
}
.ecom-card:hover .ecom-img img { transform: scale(1.05); }
.ecom-tag {
  position: absolute;
  top: 0.75rem;
  left: 0.75rem;
  background: var(--amber);
  color: #1a1200;
  font-size: 0.72rem;
  font-weight: 800;
  padding: 0.3rem 0.7rem;
  border-radius: 999px;
  text-transform: uppercase;
  letter-spacing: 0.04em;
}
.ecom-body {
  padding: 1.35rem;
  display: flex;
  flex-direction: column;
  flex: 1;
}
.ecom-body h3 { margin-bottom: 0.4rem; font-size: 1.15rem; }
.ecom-body p {
  font-size: 0.9rem;
  margin-bottom: 1.25rem;
  flex: 1;
}
.ecom-price-row {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 0.75rem;
  padding-top: 1rem;
  border-top: 1px solid var(--border);
}
.from {
  display: block;
  font-size: 0.7rem;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  color: var(--text-muted);
  font-weight: 700;
}
.price {
  font-family: 'Outfit', sans-serif;
  font-size: 1.6rem;
  font-weight: 800;
  color: var(--green-700);
}
.unit { font-size: 0.8rem; color: var(--text-muted); margin-left: 0.2rem; }
.ecom-btn { padding: 0.65rem 1.25rem; border-radius: 999px; }

/* ===== Partner ===== */
.partner-section {
  background: linear-gradient(135deg, var(--teal-soft), var(--surface-1) 50%, var(--green-50));
}
.partner-inner {
  display: grid;
  grid-template-columns: 1.3fr 1fr;
  gap: 3rem;
  align-items: center;
}
.partner-copy h2 { margin: 0.75rem 0 1rem; }
.partner-copy > p { margin-bottom: 1.5rem; }
.partner-perks {
  list-style: none;
  display: flex;
  flex-direction: column;
  gap: 0.75rem;
  margin-bottom: 1.75rem;
}
.partner-perks li {
  display: flex;
  align-items: center;
  gap: 0.65rem;
  font-weight: 600;
  color: var(--text-primary);
  background: rgba(255,255,255,0.7);
  padding: 0.7rem 1rem;
  border-radius: 12px;
  border: 1px solid var(--border);
}
.partner-perks .ico { width: 20px; height: 20px; color: var(--teal); flex-shrink: 0; }
.partner-actions { display: flex; flex-wrap: wrap; gap: 0.85rem; }
.partner-stats {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 1rem;
}
.pstat {
  background: var(--surface-1);
  border: 1px solid var(--border);
  border-radius: 18px;
  padding: 1.5rem 1.25rem;
  text-align: center;
  box-shadow: var(--shadow-sm);
}
.pstat:nth-child(1) { border-top: 3px solid var(--amber); }
.pstat:nth-child(2) { border-top: 3px solid var(--green-500); }
.pstat:nth-child(3) { border-top: 3px solid var(--teal); }
.pstat:nth-child(4) { border-top: 3px solid var(--sky); }
.pstat-num {
  display: block;
  font-family: 'Outfit', sans-serif;
  font-size: 1.6rem;
  font-weight: 800;
  color: var(--text-primary);
  margin-bottom: 0.25rem;
}
.pstat-label {
  font-size: 0.8rem;
  color: var(--text-muted);
  font-weight: 600;
}

/* Trust */
.trust-bar {
  background: linear-gradient(90deg, var(--green-800), var(--green-700) 40%, var(--teal-dark) 100%);
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
  font-weight: 600;
  color: #fff;
}
.icon-sm { width: 16px; height: 16px; color: var(--amber); }

/* CTA */
.cta-banner {
  padding: 5rem 0;
  background: linear-gradient(135deg, var(--green-800) 0%, var(--green-700) 45%, var(--teal-dark) 100%);
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
.cta-text p { max-width: 520px; color: rgba(255,255,255,0.85); }
.cta-actions { display: flex; gap: 1rem; flex-wrap: wrap; }
.cta-actions .btn-primary {
  background: linear-gradient(135deg, var(--amber-dark), var(--amber));
  color: #1a1200;
  box-shadow: 0 4px 20px rgba(232,155,30,0.4);
}

@media (max-width: 1000px) {
  .shop-card { flex: 0 0 calc(33% - 0.7rem); }
  .ecom-grid { grid-template-columns: repeat(2, 1fr); }
  .partner-inner, .compare-grid { grid-template-columns: 1fr; }
}
@media (max-width: 700px) {
  .hero { padding-top: 6.5rem; min-height: auto; }
  .shop-card { flex: 0 0 calc(70% - 0.5rem); height: 180px; }
  .ecom-grid { grid-template-columns: 1fr; }
  .cta-inner { flex-direction: column; text-align: center; }
  .cta-actions { justify-content: center; }
  .hero-copy { text-align: center; }
  .hero-sub { margin-left: auto; margin-right: auto; }
  .hero-actions { justify-content: center; }
}
</style>
