<template>
  <div class="products-page">
    <!-- Page Hero -->
    <section class="page-hero">
      <div class="container">
        <div class="section-label">Our Products</div>
        <h1>Factory-Direct Packaging <span class="gradient-text">Shop</span></h1>
        <p class="page-hero-sub">Chips pockets from 10¢ · Ice cream & single-wall cups from 8¢ · Double-wall from 10¢. Manufactured in Lorton, VA — not imported through middlemen.</p>
      </div>
    </section>

    <!-- Paper Cups Section -->
    <section class="section" id="paper-cups">
      <div class="container">
        <div class="product-detail-grid">
          <div class="pd-info">
            <div class="section-label"><Coffee class="icon-inline" /> Paper Cups</div>
            <h2>Ice Cream, Single &amp; <span class="gradient-text">Double Wall Cups</span></h2>
            <p>
              Factory-direct paper cups for ice cream shops, cafés, and QSR chains.
              Single wall from 8¢ · Double wall from 10¢. Custom print available —
              skip importer wait times and buy from the manufacturer.
            </p>
            <div class="pd-highlights">
              <div class="pd-hl"><Sprout class="icon-md" /> <span>FSC-Certified Premium Paperboard</span></div>
              <div class="pd-hl"><Recycle class="icon-md" /> <span>Aqueous Coating or PLA Compostable Lining</span></div>
              <div class="pd-hl"><Coffee class="icon-md" /> <span>Universal 90mm Lid Compatibility</span></div>
              <div class="pd-hl"><Palette class="icon-md" /> <span>Up to 6-Color Flexographic Printing</span></div>
            </div>
            <router-link to="/order" class="btn btn-primary btn-lg">
              <Beaker class="icon-inline" /> Request Sample Kit
            </router-link>
          </div>
          <div class="pd-specs-card">
            <div class="specs-title">Technical Specifications</div>
            <div class="specs-table">
              <div class="spec-row">
                <span>Available Sizes</span>
                <strong>8oz · 12oz · 16oz · 20oz</strong>
              </div>
              <div class="spec-row">
                <span>Material</span>
                <strong>FSC-Certified Premium Paperboard</strong>
              </div>
              <div class="spec-row">
                <span>Lining Options</span>
                <strong>Aqueous Coating or PLA (Compostable)</strong>
              </div>
              <div class="spec-row">
                <span>Lid Compatibility</span>
                <strong>Universal 90mm fitment</strong>
              </div>
              <div class="spec-row">
                <span>Customization</span>
                <strong>Up to 6-Color Flexographic Printing</strong>
              </div>
              <div class="spec-row">
                <span>Application</span>
                <strong>Hot & Cold Beverages</strong>
              </div>
              <div class="spec-row">
                <span>Starting Price</span>
                <strong>8¢ single · 10¢ double wall</strong>
              </div>
              <div class="spec-row">
                <span>MOQ</span>
                <strong>Contact for Wholesale Pricing</strong>
              </div>
            </div>
            <div class="specs-note">
              <Microscope class="icon-inline" /> Custom sizes and lining combinations available for enterprise partners.
            </div>
          </div>
        </div>

        <!-- Size Cards -->
        <div class="size-cards">
          <div v-for="size in cupSizes" :key="size.oz" class="size-card">
            <div class="size-icon"><component :is="size.icon" class="icon-xl" /></div>
            <div class="size-oz">{{ size.oz }}</div>
            <div class="size-label">{{ size.label }}</div>
            <router-link to="/order" class="btn btn-ghost" style="width:100%;justify-content:center;margin-top:auto;">Order</router-link>
          </div>
        </div>
      </div>
    </section>

    <!-- Retail Bags -->
    <section class="section bags-section" id="retail-bags">
      <div class="container">
        <div class="section-header">
          <div class="section-label"><ShoppingBag class="icon-inline" /> Retail Bags</div>
          <h2>Paper Bags for <span class="gradient-text">Every Use Case</span></h2>
          <p class="section-desc">Custom-branded bags that elevate your packaging and reduce your environmental impact.</p>
        </div>
        <div class="bags-grid">
          <div v-for="bag in bags" :key="bag.name" class="bag-card card">
            <div class="bag-card-image">
              <img :src="bag.bg" :alt="bag.name" />
              <span class="badge card-badge" :class="bag.available ? 'badge-green' : 'badge-coming'">
                {{ bag.available ? 'Available' : 'Coming Soon' }}
              </span>
            </div>
            <div class="bag-card-body">
              <h3>{{ bag.name }}</h3>
              <p>{{ bag.desc }}</p>
              <ul class="bag-features">
                <li v-for="f in bag.features" :key="f"><Check class="icon-inline text-green" /> {{ f }}</li>
              </ul>
              <div style="margin-top:auto;padding-top:1.5rem;">
                <router-link :to="bag.available ? '/order' : '/contact'" class="btn" :class="bag.available ? 'btn-primary' : 'btn-outline'" style="width:100%;justify-content:center;">
                  {{ bag.available ? 'Order Now' : 'Join Waitlist' }}
                </router-link>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Enterprise -->
    <section class="enterprise-cta">
      <div class="container">
        <div class="ent-inner">
          <Building class="ent-icon" />
          <div class="ent-text">
            <h2>Enterprise Partnership Inquiry</h2>
            <p>Direct access to our Lorton, VA manufacturing facility for high-volume retail partners. Get custom pricing, sample kits, and dedicated account management.</p>
          </div>
          <router-link to="/order" class="btn btn-primary btn-lg">Submit Technical RFP</router-link>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import { Coffee, Sprout, Recycle, Palette, Beaker, Microscope, GlassWater, CupSoda, Droplets, ShoppingBag, ShoppingCart, Paintbrush, Building, Check } from 'lucide-vue-next'

export default {
  name: 'ProductsPage',
  components: {
    Coffee, Sprout, Recycle, Palette, Beaker, Microscope, GlassWater, CupSoda, Droplets, ShoppingBag, ShoppingCart, Paintbrush, Building, Check
  },
  data() {
    return {
      cupSizes: [
        { oz: '8oz', label: 'Espresso / Small', icon: 'GlassWater' },
        { oz: '12oz', label: 'Medium Coffee', icon: 'Coffee' },
        { oz: '16oz', label: 'Large / Latte', icon: 'CupSoda' },
        { oz: '20oz', label: 'XL Cold Brew', icon: 'Droplets' },
      ],
      bags: [
        {
          name: 'Chips Pocket Paper Bags',
          icon: 'ShoppingBag',
          bg: '/retail_paperbg.jpg',
          available: true,
          desc: 'Grease-resistant paper pockets for chips and snacks. Starting from 10¢ per unit — factory-direct.',
          features: ['From 10¢ / unit', 'Food-service ready', 'Custom print options', 'High-volume production'],
        },
        {
          name: 'Ice Cream Cups',
          icon: 'CupSoda',
          bg: '/paper_cup.jpg',
          available: true,
          desc: 'Paper ice cream cups for scoops and soft serve. Starting from 8¢. Single & double wall options.',
          features: ['From 8¢ single wall', 'Double wall from 10¢', 'Dessert-shop ready', 'Private label available'],
        },
        {
          name: 'Grocery Paper Bags',
          icon: 'ShoppingCart',
          bg: '/grocery_bag.jpg',
          available: true,
          desc: 'Strong and reliable paper bags designed for grocery stores. Reinforced handles for easy carrying.',
          features: ['Heavy-duty construction', 'Reinforced handles', 'Eco-friendly materials', 'Bulk pricing available'],
        },
        {
          name: 'Custom Enterprise Packaging',
          icon: 'Paintbrush',
          bg: '/your_logo.png',
          available: true,
          desc: 'Private-label cups, pockets, and bags. Manufacturer rates with partner commissions available.',
          features: ['Full custom design', 'Partner commissions', 'Custom sizing', 'Dedicated account manager'],
        },
      ]
    }
  }
}
</script>

<style scoped>
.products-page { padding-top: 100px; }
.page-hero {
  padding: 5rem 0 3rem;
  text-align: center;
  background:
    radial-gradient(ellipse at 20% top, rgba(34,179,107,0.12) 0%, transparent 50%),
    radial-gradient(ellipse at 85% top, rgba(43,159,217,0.1) 0%, transparent 45%);
  border-bottom: 1px solid var(--border);
}
.page-hero h1 { margin: 0.75rem 0 1rem; }
.page-hero-sub { color: var(--text-secondary); font-size: 1.05rem; max-width: 540px; margin: 0 auto; }

/* Product Detail */
.product-detail-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 3rem;
  align-items: start;
  margin-bottom: 3rem;
}
.pd-info h2 { margin: 0.75rem 0 1rem; }
.pd-info p { margin-bottom: 1.5rem; }
.pd-highlights { display: flex; flex-direction: column; gap: 0.75rem; margin-bottom: 2rem; }
.pd-hl {
  display: flex;
  align-items: center;
  gap: 0.75rem;
  font-size: 0.95rem;
  color: var(--text-secondary);
  background: var(--surface-1);
  padding: 0.75rem 1rem;
  border-radius: var(--radius-sm);
  border: 1px solid var(--border);
}
.pd-hl span { flex: 1; }
.pd-specs-card {
  background: var(--surface-1);
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  padding: 2rem;
  box-shadow: var(--shadow-glow);
}
.specs-title {
  font-family: 'Outfit', sans-serif;
  font-weight: 700;
  font-size: 0.85rem;
  text-transform: uppercase;
  letter-spacing: 0.1em;
  color: var(--green-400);
  margin-bottom: 1.25rem;
}
.specs-table { display: flex; flex-direction: column; gap: 0; }
.spec-row {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0.85rem 0;
  border-bottom: 1px solid var(--border);
  gap: 1rem;
  font-size: 0.88rem;
}
.spec-row:last-child { border-bottom: none; }
.spec-row span { color: var(--text-muted); }
.spec-row strong { color: var(--green-700); text-align: right; }
.specs-note {
  margin-top: 1rem;
  font-size: 0.8rem;
  color: var(--text-muted);
  background: rgba(37,168,100,0.05);
  padding: 0.75rem;
  border-radius: var(--radius-sm);
  border: 1px solid var(--border);
}

/* Size Cards */
.size-cards {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 1rem;
}
.size-card {
  background: var(--surface-1);
  border: 1px solid var(--border);
  border-radius: var(--radius-md);
  padding: 1.5rem;
  text-align: center;
  transition: all var(--transition);
  display: flex;
  flex-direction: column;
  align-items: center;
}
.size-card:hover {
  border-color: var(--border-hover);
  transform: translateY(-4px);
  box-shadow: var(--shadow-glow);
}
.size-icon { margin-bottom: 0.75rem; color: var(--green-600); }
.size-card:nth-child(2) .size-icon { color: var(--teal); }
.size-card:nth-child(3) .size-icon { color: var(--amber-dark); }
.size-card:nth-child(4) .size-icon { color: var(--sky); }
.size-oz {
  font-family: 'Outfit', sans-serif;
  font-size: 1.4rem;
  font-weight: 800;
  color: var(--green-700);
  margin-bottom: 0.25rem;
}
.size-label { font-size: 0.8rem; color: var(--text-muted); margin-bottom: 1rem; }

/* Bags */
.bags-section { background: var(--surface-1); border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); }
.section-header { text-align: center; margin-bottom: 3rem; }
.section-desc { max-width: 540px; margin: 0.75rem auto 0; }
.bags-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 1.5rem;
}
.bag-card {
  display: flex;
  flex-direction: column;
  overflow: hidden;
  padding: 0;
}
.bag-card-image {
  position: relative;
  height: 200px;
  overflow: hidden;
}
.bag-card-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.4s ease;
}
.bag-card:hover .bag-card-image img {
  transform: scale(1.05);
}
.card-badge {
  position: absolute;
  top: 0.75rem;
  left: 0.75rem;
  z-index: 1;
}
.bag-card-body {
  padding: 1.5rem;
  display: flex;
  flex-direction: column;
  flex: 1;
}
.bag-card-body h3 { margin-bottom: 0.75rem; }
.bag-card-body p { font-size: 0.9rem; margin-bottom: 1rem; }
.bag-features {
  list-style: none;
  display: flex;
  flex-direction: column;
  gap: 0.4rem;
}
.bag-features li { font-size: 0.85rem; color: var(--text-muted); }
.text-green { color: var(--green-400); }

/* Enterprise */
.enterprise-cta {
  padding: 5rem 0;
  background: linear-gradient(135deg, var(--amber-soft), var(--teal-soft));
}
.ent-inner {
  display: flex;
  align-items: center;
  gap: 2rem;
  flex-wrap: wrap;
}
.ent-icon { width: 56px; height: 56px; flex-shrink: 0; color: var(--green-400); }
.ent-text { flex: 1; min-width: 280px; }
.ent-text h2 { margin-bottom: 0.5rem; }

.icon-inline { width: 16px; height: 16px; margin-right: 4px; vertical-align: text-bottom; }
.icon-md { width: 24px; height: 24px; color: var(--green-600); }
.icon-lg { width: 32px; height: 32px; }
.icon-xl { width: 40px; height: 40px; }

@media (max-width: 900px) {
  .product-detail-grid { grid-template-columns: 1fr; }
  .bags-grid { grid-template-columns: 1fr; }
  .size-cards { grid-template-columns: repeat(2, 1fr); }
  .ent-inner { flex-direction: column; text-align: center; }
}
@media (max-width: 600px) {
  .size-cards { grid-template-columns: repeat(2, 1fr); }
}
</style>
