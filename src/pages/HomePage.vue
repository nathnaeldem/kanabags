<template>
  <div class="home-page">
    <!-- 1. Announcement bar -->
    <div class="announce">
      <div class="announce-track">
        <span>Factory-direct paper packaging — made in Lorton, VA</span>
        <span class="dot">·</span>
        <span>Skip 45-day importer waits — buy from the manufacturer</span>
        <span class="dot">·</span>
        <span>Chips pockets from 10¢ · Cups from 8¢ · Call (571) 632-6843</span>
        <span class="dot">·</span>
        <span>Wholesale &amp; partner commissions available</span>
      </div>
    </div>

    <!-- 2. Hero: left copy + right product slideshow -->
    <section class="hero" aria-label="Hero">
      <div class="hero-inner container">
        <div class="hero-copy">
          <p class="eyebrow">KanaBags LLC · USA Manufacturer</p>
          <h1>
            {{ slides[activeSlide].title }}
          </h1>
          <p class="hero-lead">{{ slides[activeSlide].desc }}</p>
          <div class="hero-actions">
            <router-link :to="slides[activeSlide].ctaTo" class="btn-hero-primary">
              {{ slides[activeSlide].cta }}
            </router-link>
            <router-link to="/products" class="btn-hero-ghost">Shop catalog</router-link>
          </div>
          <ul class="hero-bullets">
            <li><Factory class="ico" /> Real manufacturer — not a reseller</li>
            <li><Zap class="ico" /> Faster than overseas importers</li>
            <li><BadgeDollarSign class="ico" /> Factory &amp; wholesale pricing</li>
          </ul>
        </div>

        <div class="hero-slideshow">
          <div class="slide-stage">
            <Transition name="fade-slide" mode="out-in">
              <div :key="activeSlide" class="slide">
                <img :src="slides[activeSlide].img" :alt="slides[activeSlide].title" />
                <div class="slide-cap">
                  <span class="slide-name">{{ slides[activeSlide].product }}</span>
                  <span class="slide-price">{{ slides[activeSlide].price }}</span>
                </div>
              </div>
            </Transition>
          </div>
          <div class="slide-controls">
            <button class="slide-btn" @click="prev" aria-label="Previous slide"><ChevronLeft /></button>
            <div class="slide-dots">
              <button
                v-for="(s, i) in slides"
                :key="s.product"
                class="dot"
                :class="{ on: i === activeSlide }"
                @click="go(i)"
                :aria-label="s.product"
              />
            </div>
            <button class="slide-btn" @click="next" aria-label="Next slide"><ChevronRight /></button>
          </div>
          <div class="slide-thumbs">
            <button
              v-for="(s, i) in slides"
              :key="'t-' + s.product"
              class="thumb"
              :class="{ on: i === activeSlide }"
              @click="go(i)"
            >
              <img :src="s.img" :alt="s.product" />
            </button>
          </div>
        </div>
      </div>
    </section>

    <!-- 3. Custom print promo (image + text) -->
    <section class="section promo">
      <div class="container promo-grid">
        <div class="promo-text">
          <div class="section-label">Custom Printing</div>
          <h2>Put Your Brand on <span class="gradient-text">Every Cup &amp; Bag</span></h2>
          <p>
            Elevate your shop with factory-direct custom print — chips pockets, ice cream cups,
            and paper cups with your logo. Stand out on every order without importer markups.
          </p>
          <router-link to="/order" class="btn btn-primary btn-lg">Custom order now</router-link>
        </div>
        <div class="promo-media">
          <img src="/your_logo.png" alt="Custom branded KanaBags packaging" />
        </div>
      </div>
    </section>

    <!-- 4. Featured products grid -->
    <section class="section featured" id="shop">
      <div class="container">
        <div class="section-header">
          <div class="section-label section-label-amber">Featured Packaging</div>
          <h2>Factory Pricing That <span class="gradient-text">Starts Low</span></h2>
          <p class="section-desc">Order direct from our Lorton, VA plant. Volume discounts and partner rates available.</p>
        </div>
        <div class="product-grid">
          <article v-for="p in featured" :key="p.name" class="product-card">
            <router-link to="/order" class="product-img">
              <img :src="p.img" :alt="p.name" />
              <span v-if="p.tag" class="tag">{{ p.tag }}</span>
            </router-link>
            <div class="product-body">
              <h3>{{ p.name }}</h3>
              <p>{{ p.desc }}</p>
              <div class="product-foot">
                <div class="price-block">
                  <span class="from">From</span>
                  <strong>{{ p.price }}</strong>
                </div>
                <router-link to="/order" class="btn btn-primary order-btn">Order</router-link>
              </div>
            </div>
          </article>
        </div>
      </div>
    </section>

    <!-- 5. Shop categories — accordion left + image right (inspo pattern) -->
    <section class="section shop-cats">
      <div class="container cats-grid">
        <div class="cats-list">
          <h2>Shop Our <span class="gradient-text">Packaging</span></h2>
          <p class="cats-intro">Hover or tap a category — see the product, then order factory-direct.</p>
          <div
            v-for="(cat, i) in categories"
            :key="cat.name"
            class="cat-item"
            :class="{ open: i === activeCat }"
            @mouseenter="activeCat = i"
            @click="activeCat = i"
          >
            <button class="cat-btn" type="button">
              <span class="cat-num">0{{ i + 1 }}.</span>
              <span class="cat-name">{{ cat.name }}</span>
              <ArrowRight class="cat-arrow" />
            </button>
            <div class="cat-body">
              <p>{{ cat.desc }}</p>
              <div class="cat-meta">
                <strong>{{ cat.price }}</strong>
                <router-link to="/order" class="cat-link">Order now</router-link>
              </div>
            </div>
          </div>
        </div>
        <div class="cats-visual">
          <Transition name="fade-slide" mode="out-in">
            <div :key="activeCat" class="cats-frame">
              <img :src="categories[activeCat].img" :alt="categories[activeCat].name" />
              <div class="cats-cap">
                <span>{{ categories[activeCat].name }}</span>
                <em>{{ categories[activeCat].price }}</em>
              </div>
            </div>
          </Transition>
        </div>
      </div>
    </section>

    <!-- 6. Why manufacturer / promises -->
    <section class="section promises">
      <div class="container">
        <div class="section-header left">
          <div class="section-label">What We Promise</div>
          <h2>Buy From the <span class="gradient-text">Source</span></h2>
        </div>
        <div class="promise-grid">
          <div v-for="item in promises" :key="item.title" class="promise">
            <div class="promise-ico"><component :is="item.icon" /></div>
            <h3>{{ item.title }}</h3>
            <p>{{ item.desc }}</p>
          </div>
        </div>

        <div class="compare">
          <div class="compare-col bad">
            <h3>Importers &amp; resellers</h3>
            <ul>
              <li><XCircle class="x" /> 30–45+ day overseas waits</li>
              <li><XCircle class="x" /> Middleman markups every unit</li>
              <li><XCircle class="x" /> They buy from manufacturers like us</li>
            </ul>
          </div>
          <div class="compare-col good">
            <h3>KanaBags — manufacturer</h3>
            <ul>
              <li><CheckCircle2 class="c" /> Made in Lorton, VA</li>
              <li><CheckCircle2 class="c" /> Factory pricing, no secondhand cut</li>
              <li><CheckCircle2 class="c" /> Wholesale &amp; partner commissions</li>
            </ul>
            <router-link to="/order" class="btn btn-primary">Order from the factory</router-link>
          </div>
        </div>
      </div>
    </section>

    <!-- 7. Partner strip -->
    <section class="section partners">
      <div class="container partner-row">
        <div>
          <div class="section-label section-label-teal">Wholesale &amp; Partners</div>
          <h2>Earn With Us — Become a <span class="gradient-text">Partner</span></h2>
          <p>
            Distributors, shops, and connectors can earn commissions and wholesale rates.
            Stop letting importers take the cut — partner with the factory instead.
          </p>
        </div>
        <div class="partner-actions">
          <router-link to="/order" class="btn btn-amber btn-lg">Apply as partner</router-link>
          <router-link to="/contact" class="btn btn-outline btn-lg">Talk to sales</router-link>
        </div>
      </div>
    </section>

    <!-- 8. Category tiles -->
    <section class="section tiles">
      <div class="container">
        <div class="section-header">
          <h2>Shop All Our <span class="gradient-text">Lines</span></h2>
        </div>
        <div class="tile-grid">
          <router-link
            v-for="t in tiles"
            :key="t.name"
            to="/products"
            class="tile"
          >
            <img :src="t.img" :alt="t.name" />
            <span>{{ t.name }}</span>
          </router-link>
        </div>
      </div>
    </section>

    <!-- 9. Final CTA -->
    <section class="cta">
      <div class="container cta-inner">
        <div>
          <h2>Ready to order from the factory?</h2>
          <p>Chips pockets from 10¢ · Single-wall cups from 8¢ · Double-wall from 10¢</p>
        </div>
        <div class="cta-actions">
          <router-link to="/order" class="btn-hero-primary">Place order</router-link>
          <a href="tel:+15716326843" class="btn-hero-ghost dark">(571) 632-6843</a>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import {
  ChevronLeft, ChevronRight, ArrowRight, Factory, Zap, BadgeDollarSign,
  XCircle, CheckCircle2, Handshake, Truck, Leaf, Users
} from 'lucide-vue-next'

export default {
  name: 'HomePage',
  components: {
    ChevronLeft, ChevronRight, ArrowRight, Factory, Zap, BadgeDollarSign,
    XCircle, CheckCircle2, Handshake, Truck, Leaf, Users
  },
  data() {
    return {
      activeSlide: 0,
      activeCat: 0,
      _timer: null,
      _catTimer: null,
      slides: [
        {
          title: 'Custom Printing',
          desc: 'Brand your chips pockets, ice cream cups, and paper cups with your logo — printed at our Virginia factory.',
          cta: 'Custom order now',
          ctaTo: '/order',
          product: 'Custom Print Packaging',
          price: 'Ask quote',
          img: '/your_logo.png',
        },
        {
          title: 'Factory-Direct Cups',
          desc: 'Ice cream cups and single-wall cups from 8¢. Double-wall from 10¢. No importer middleman.',
          cta: 'Order cups',
          ctaTo: '/order',
          product: 'Ice Cream & Paper Cups',
          price: 'from 8¢',
          img: '/image.png',
        },
        {
          title: 'Chips Pocket Bags',
          desc: 'Grease-ready paper pockets for snacks and takeout — starting at 10¢ per unit, wholesale ready.',
          cta: 'Order pockets',
          ctaTo: '/order',
          product: 'Chips Pocket Bags',
          price: 'from 10¢',
          img: '/image_chips.png',
        },
        {
          title: 'Skip the 45-Day Wait',
          desc: 'Importers buy from manufacturers like us, then make you wait. Cut them out — order from KanaBags.',
          cta: 'Buy from the source',
          ctaTo: '/order',
          product: 'Made in Lorton, VA',
          price: 'USA factory',
          img: '/hero.jpg',
        },
      ],
      featured: [
        {
          name: 'Chips Pocket Paper Bags',
          desc: 'Snack & takeout pockets. Brandable, high-volume ready.',
          price: '10¢',
          tag: 'Best seller',
          img: '/image_chips.png',
        },
        {
          name: 'Ice Cream Cups',
          desc: 'Food-safe cups for scoops and soft serve shops.',
          price: '8¢',
          tag: 'New',
          img: '/image.png',
        },
        {
          name: 'Single Wall Cups',
          desc: 'Lightweight cups for cold drinks and light hot use.',
          price: '8¢',
          tag: null,
          img: '/paper_cup.jpg',
        },
        {
          name: 'Double Wall Cups',
          desc: 'Insulated hot cups — no sleeve needed.',
          price: '10¢',
          tag: 'Hot drinks',
          img: '/paper_cup.jpg',
        },
      ],
      categories: [
        {
          name: 'Chips Pocket Bags',
          desc: 'Grease-resistant paper pockets for chips, fries, and snacks. Built for food service volume.',
          price: 'From 10¢ / unit',
          img: '/image_chips.png',
        },
        {
          name: 'Ice Cream Cups',
          desc: 'Dessert-ready paper cups for scoops and soft serve. Custom print available.',
          price: 'From 8¢ / unit',
          img: '/image.png',
        },
        {
          name: 'Single Wall Cups',
          desc: 'Clean, lightweight paper cups for everyday beverage service.',
          price: 'From 8¢ / unit',
          img: '/paper_cup.jpg',
        },
        {
          name: 'Double Wall Cups',
          desc: 'Premium insulated cups for hot coffee and specialty drinks.',
          price: 'From 10¢ / unit',
          img: '/paper_cup.jpg',
        },
        {
          name: 'Grocery Paper Bags',
          desc: 'Strong carry bags with reinforced handles for retail and grocery.',
          price: 'Volume quote',
          img: '/grocery_bag.jpg',
        },
      ],
      promises: [
        {
          icon: 'Factory',
          title: 'We Manufacture',
          desc: 'Produced in our Lorton, VA facility — you buy from the source, not a secondhand merchant.',
        },
        {
          icon: 'Zap',
          title: 'Faster Than Importing',
          desc: 'Skip 30–45 day overseas lead times. Get packaging without the importer delay.',
        },
        {
          icon: 'BadgeDollarSign',
          title: 'Factory Pricing',
          desc: 'Starting 8¢–10¢ on core SKUs. Wholesale tiers as you scale.',
        },
        {
          icon: 'Handshake',
          title: 'Partner Commissions',
          desc: 'Resellers and partners can earn — take the cut importers usually keep.',
        },
      ],
      tiles: [
        { name: 'Chips Pockets', img: '/image_chips.png' },
        { name: 'Ice Cream Cups', img: '/image.png' },
        { name: 'Hot Cups', img: '/paper_cup.jpg' },
        { name: 'Grocery Bags', img: '/grocery_bag.jpg' },
        { name: 'Custom Print', img: '/your_logo.png' },
        { name: 'Partner Program', img: '/hero.jpg' },
      ],
    }
  },
  mounted() {
    this._timer = setInterval(this.next, 4500)
    this._catTimer = setInterval(() => {
      this.activeCat = (this.activeCat + 1) % this.categories.length
    }, 5000)
  },
  beforeUnmount() {
    clearInterval(this._timer)
    clearInterval(this._catTimer)
  },
  methods: {
    next() {
      this.activeSlide = (this.activeSlide + 1) % this.slides.length
    },
    prev() {
      this.activeSlide = (this.activeSlide - 1 + this.slides.length) % this.slides.length
    },
    go(i) {
      this.activeSlide = i
    },
  },
}
</script>

<style scoped>
.home-page { overflow-x: hidden; }

/* Announcement */
.announce {
  margin-top: 5.5rem;
  background: linear-gradient(90deg, var(--green-800), var(--green-700), var(--teal-dark));
  color: #fff;
  font-size: 0.85rem;
  font-weight: 600;
  padding: 0.65rem 1rem;
  overflow: hidden;
}
.announce-track {
  display: flex;
  gap: 1.25rem;
  justify-content: center;
  flex-wrap: wrap;
  text-align: center;
}
.announce .dot { opacity: 0.5; }

/* Hero split */
.hero {
  padding: 3.5rem 0 4rem;
  background:
    radial-gradient(ellipse 60% 80% at 0% 20%, rgba(34,179,107,0.1), transparent 55%),
    radial-gradient(ellipse 50% 60% at 100% 80%, rgba(232,155,30,0.08), transparent 50%),
    var(--bg);
}
.hero-inner {
  display: grid;
  grid-template-columns: 1fr 1.05fr;
  gap: 3rem;
  align-items: center;
}
.eyebrow {
  font-size: 0.78rem;
  font-weight: 800;
  letter-spacing: 0.14em;
  text-transform: uppercase;
  color: var(--green-700);
  margin-bottom: 0.85rem;
}
.hero-copy h1 {
  font-size: clamp(2.4rem, 4.5vw, 3.75rem);
  letter-spacing: -0.03em;
  margin-bottom: 1rem;
  min-height: 2.4em;
}
.hero-lead {
  font-size: 1.08rem;
  max-width: 34rem;
  margin-bottom: 1.5rem;
  color: var(--text-secondary);
}
.hero-actions {
  display: flex;
  flex-wrap: wrap;
  gap: 0.75rem;
  margin-bottom: 1.75rem;
}
.btn-hero-primary {
  display: inline-flex;
  align-items: center;
  padding: 0.95rem 1.75rem;
  border-radius: 999px;
  background: var(--amber);
  color: #1a1200;
  font-weight: 800;
  box-shadow: 0 8px 24px rgba(232,155,30,0.35);
  transition: all var(--transition);
}
.btn-hero-primary:hover {
  transform: translateY(-2px);
  background: #f0ad2e;
}
.btn-hero-ghost {
  display: inline-flex;
  align-items: center;
  padding: 0.95rem 1.75rem;
  border-radius: 999px;
  border: 1.5px solid var(--green-600);
  color: var(--green-800);
  font-weight: 700;
  transition: all var(--transition);
}
.btn-hero-ghost:hover {
  background: var(--green-50);
}
.btn-hero-ghost.dark {
  border-color: rgba(255,255,255,0.55);
  color: #fff;
}
.hero-bullets {
  list-style: none;
  display: flex;
  flex-direction: column;
  gap: 0.55rem;
}
.hero-bullets li {
  display: flex;
  align-items: center;
  gap: 0.55rem;
  font-size: 0.92rem;
  font-weight: 600;
  color: var(--text-primary);
}
.hero-bullets .ico {
  width: 18px;
  height: 18px;
  color: var(--green-600);
}

/* Right slideshow */
.hero-slideshow { width: 100%; }
.slide-stage {
  position: relative;
  border-radius: 28px;
  overflow: hidden;
  aspect-ratio: 1 / 1;
  background: var(--surface-1);
  box-shadow: var(--shadow-lg);
  border: 1px solid var(--border);
}
.slide { position: relative; width: 100%; height: 100%; }
.slide img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
}
.slide-cap {
  position: absolute;
  left: 0; right: 0; bottom: 0;
  padding: 1.75rem 1.25rem 1.15rem;
  background: linear-gradient(transparent, rgba(6,28,18,0.85));
  display: flex;
  justify-content: space-between;
  align-items: flex-end;
  gap: 1rem;
}
.slide-name { color: #fff; font-weight: 700; font-size: 1.05rem; }
.slide-price { color: var(--amber); font-weight: 800; font-size: 1.1rem; }
.slide-controls {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 0.85rem;
  margin-top: 1rem;
}
.slide-btn {
  width: 40px; height: 40px;
  border-radius: 50%;
  border: 1px solid var(--border);
  background: var(--surface-1);
  color: var(--green-800);
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: all var(--transition);
}
.slide-btn:hover {
  background: var(--green-800);
  color: #fff;
}
.slide-btn :deep(svg) { width: 18px; height: 18px; }
.slide-dots { display: flex; gap: 0.4rem; }
.dot {
  width: 8px; height: 8px;
  border-radius: 999px;
  border: none;
  background: rgba(12,42,28,0.2);
  cursor: pointer;
  padding: 0;
  transition: all 0.25s ease;
}
.dot.on { width: 22px; background: var(--amber); }
.slide-thumbs {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 0.6rem;
  margin-top: 0.85rem;
}
.thumb {
  border: 2px solid transparent;
  border-radius: 14px;
  overflow: hidden;
  padding: 0;
  cursor: pointer;
  background: none;
  aspect-ratio: 1;
  opacity: 0.65;
  transition: all var(--transition);
}
.thumb img { width: 100%; height: 100%; object-fit: cover; display: block; }
.thumb.on, .thumb:hover {
  opacity: 1;
  border-color: var(--amber);
}

.fade-slide-enter-active, .fade-slide-leave-active {
  transition: opacity 0.35s ease, transform 0.35s ease;
}
.fade-slide-enter-from { opacity: 0; transform: translateX(12px); }
.fade-slide-leave-to { opacity: 0; transform: translateX(-12px); }

/* Promo */
.promo {
  background: linear-gradient(135deg, var(--amber-soft), var(--surface-1) 45%, var(--teal-soft));
}
.promo-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 3rem;
  align-items: center;
}
.promo-text h2 { margin: 0.75rem 0 1rem; }
.promo-text p { margin-bottom: 1.5rem; }
.promo-media {
  border-radius: 24px;
  overflow: hidden;
  box-shadow: var(--shadow-md);
  border: 1px solid var(--border);
  aspect-ratio: 16 / 10;
}
.promo-media img { width: 100%; height: 100%; object-fit: cover; }

/* Featured products */
.section-header { text-align: center; margin-bottom: 2.5rem; }
.section-header.left { text-align: left; }
.section-desc { max-width: 560px; margin: 0.75rem auto 0; }
.product-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 1.25rem;
}
.product-card {
  background: var(--surface-1);
  border: 1px solid var(--border);
  border-radius: 22px;
  overflow: hidden;
  display: flex;
  flex-direction: column;
  box-shadow: var(--shadow-sm);
  transition: all var(--transition);
}
.product-card:hover {
  transform: translateY(-4px);
  box-shadow: var(--shadow-md);
}
.product-img {
  position: relative;
  display: block;
  height: 190px;
  overflow: hidden;
}
.product-img img {
  width: 100%; height: 100%; object-fit: cover;
  transition: transform 0.4s ease;
}
.product-card:hover .product-img img { transform: scale(1.05); }
.tag {
  position: absolute;
  top: 0.7rem; left: 0.7rem;
  background: var(--amber);
  color: #1a1200;
  font-size: 0.7rem;
  font-weight: 800;
  padding: 0.28rem 0.65rem;
  border-radius: 999px;
  text-transform: uppercase;
}
.product-body {
  padding: 1.15rem;
  display: flex;
  flex-direction: column;
  flex: 1;
}
.product-body h3 { font-size: 1.05rem; margin-bottom: 0.35rem; }
.product-body p { font-size: 0.88rem; flex: 1; margin-bottom: 1rem; }
.product-foot {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 0.5rem;
  padding-top: 0.85rem;
  border-top: 1px solid var(--border);
}
.from {
  display: block;
  font-size: 0.68rem;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  color: var(--text-muted);
  font-weight: 700;
}
.price-block strong {
  font-family: 'Outfit', sans-serif;
  font-size: 1.45rem;
  color: var(--green-700);
}
.order-btn { padding: 0.55rem 1.1rem; border-radius: 999px; }

/* Shop categories */
.shop-cats {
  background: var(--surface-1);
  border-top: 1px solid var(--border);
  border-bottom: 1px solid var(--border);
}
.cats-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 3rem;
  align-items: center;
}
.cats-list h2 { margin-bottom: 0.5rem; }
.cats-intro { margin-bottom: 1.5rem; }
.cat-item {
  border-top: 1px solid var(--border);
  padding: 0.35rem 0;
}
.cat-item:last-child { border-bottom: 1px solid var(--border); }
.cat-btn {
  width: 100%;
  display: flex;
  align-items: center;
  gap: 0.75rem;
  background: none;
  border: none;
  padding: 1rem 0.25rem;
  cursor: pointer;
  text-align: left;
  color: var(--text-primary);
}
.cat-num {
  font-weight: 800;
  color: var(--text-muted);
  font-size: 0.9rem;
  min-width: 2rem;
}
.cat-name {
  flex: 1;
  font-family: 'Outfit', sans-serif;
  font-size: 1.2rem;
  font-weight: 700;
}
.cat-arrow {
  width: 18px; height: 18px;
  color: var(--text-muted);
  transition: transform 0.25s ease, color 0.25s ease;
}
.cat-item.open .cat-name { color: var(--green-700); }
.cat-item.open .cat-num { color: var(--amber-dark); }
.cat-item.open .cat-arrow {
  color: var(--amber-dark);
  transform: translateX(4px);
}
.cat-body {
  max-height: 0;
  overflow: hidden;
  opacity: 0;
  transition: all 0.35s ease;
  padding: 0 0.25rem;
}
.cat-item.open .cat-body {
  max-height: 160px;
  opacity: 1;
  padding-bottom: 1rem;
}
.cat-body p { font-size: 0.92rem; margin-bottom: 0.75rem; }
.cat-meta {
  display: flex;
  align-items: center;
  gap: 1rem;
}
.cat-meta strong { color: var(--green-700); font-size: 1rem; }
.cat-link {
  color: var(--amber-dark);
  font-weight: 800;
  font-size: 0.9rem;
}
.cats-visual {
  border-radius: 28px;
  overflow: hidden;
  aspect-ratio: 1;
  box-shadow: var(--shadow-lg);
  border: 1px solid var(--border);
  background: var(--surface-2);
}
.cats-frame { position: relative; width: 100%; height: 100%; }
.cats-frame img {
  width: 100%; height: 100%; object-fit: cover; display: block;
}
.cats-cap {
  position: absolute;
  left: 0; right: 0; bottom: 0;
  padding: 1.5rem 1.25rem 1.1rem;
  background: linear-gradient(transparent, rgba(6,28,18,0.82));
  display: flex;
  justify-content: space-between;
  color: #fff;
  font-weight: 700;
}
.cats-cap em {
  font-style: normal;
  color: var(--amber);
  font-weight: 800;
}

/* Promises */
.promise-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 1.25rem;
  margin-bottom: 2.5rem;
}
.promise {
  background: var(--surface-1);
  border: 1px solid var(--border);
  border-radius: 18px;
  padding: 1.5rem;
  box-shadow: var(--shadow-sm);
}
.promise-ico {
  width: 44px; height: 44px;
  border-radius: 12px;
  background: var(--green-50);
  color: var(--green-700);
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 1rem;
}
.promise-ico :deep(svg) { width: 22px; height: 22px; }
.promise h3 { font-size: 1.05rem; margin-bottom: 0.4rem; }
.promise p { font-size: 0.88rem; margin: 0; }
.promise:nth-child(2) .promise-ico { background: var(--amber-soft); color: var(--amber-dark); }
.promise:nth-child(3) .promise-ico { background: var(--teal-soft); color: var(--teal-dark); }
.promise:nth-child(4) .promise-ico { background: var(--sky-soft); color: var(--sky); }

.compare {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 1.25rem;
}
.compare-col {
  border-radius: 20px;
  padding: 1.75rem;
  border: 1px solid var(--border);
}
.compare-col.bad { background: #fff8f7; border-color: rgba(232,93,76,0.25); }
.compare-col.good {
  background: linear-gradient(160deg, var(--green-50), #fff);
  border-color: rgba(34,179,107,0.35);
}
.compare-col h3 { margin-bottom: 1rem; font-size: 1.15rem; }
.compare-col ul { list-style: none; display: flex; flex-direction: column; gap: 0.7rem; margin-bottom: 1.25rem; }
.compare-col li {
  display: flex; align-items: center; gap: 0.55rem;
  font-weight: 500; font-size: 0.95rem; color: var(--text-secondary);
}
.x { width: 18px; height: 18px; color: var(--coral); flex-shrink: 0; }
.c { width: 18px; height: 18px; color: var(--green-600); flex-shrink: 0; }

/* Partners */
.partners {
  background: linear-gradient(135deg, var(--teal-soft), var(--green-50));
}
.partner-row {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 2rem;
  flex-wrap: wrap;
}
.partner-row h2 { margin: 0.6rem 0 0.75rem; }
.partner-row p { max-width: 520px; }
.partner-actions { display: flex; gap: 0.75rem; flex-wrap: wrap; }

/* Tiles */
.tile-grid {
  display: grid;
  grid-template-columns: repeat(6, 1fr);
  gap: 1rem;
}
.tile {
  position: relative;
  border-radius: 18px;
  overflow: hidden;
  aspect-ratio: 1;
  display: block;
  box-shadow: var(--shadow-sm);
  border: 1px solid var(--border);
}
.tile img {
  width: 100%; height: 100%; object-fit: cover;
  transition: transform 0.4s ease;
}
.tile:hover img { transform: scale(1.06); }
.tile span {
  position: absolute;
  left: 0; right: 0; bottom: 0;
  padding: 1.25rem 0.75rem 0.75rem;
  background: linear-gradient(transparent, rgba(6,28,18,0.85));
  color: #fff;
  font-weight: 700;
  font-size: 0.88rem;
}

/* CTA */
.cta {
  padding: 4.5rem 0;
  background: linear-gradient(135deg, var(--green-800), var(--green-700) 50%, var(--teal-dark));
}
.cta-inner {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 2rem;
  flex-wrap: wrap;
}
.cta h2 { color: #fff; margin-bottom: 0.4rem; }
.cta p { color: rgba(255,255,255,0.85); margin: 0; }
.cta-actions { display: flex; gap: 0.75rem; flex-wrap: wrap; }

@media (max-width: 1100px) {
  .product-grid { grid-template-columns: repeat(2, 1fr); }
  .promise-grid { grid-template-columns: repeat(2, 1fr); }
  .tile-grid { grid-template-columns: repeat(3, 1fr); }
}
@media (max-width: 900px) {
  .announce { margin-top: 4.75rem; }
  .hero-inner, .promo-grid, .cats-grid, .compare { grid-template-columns: 1fr; }
  .hero-copy h1 { min-height: 0; }
  .cats-visual { max-width: 480px; margin: 0 auto; width: 100%; }
  .cta-inner, .partner-row { flex-direction: column; text-align: center; }
  .partner-actions, .cta-actions { justify-content: center; }
  .section-header.left { text-align: center; }
}
@media (max-width: 600px) {
  .product-grid, .promise-grid, .tile-grid { grid-template-columns: 1fr 1fr; }
  .slide-thumbs { grid-template-columns: repeat(4, 1fr); }
  .announce-track { font-size: 0.78rem; }
}
</style>
