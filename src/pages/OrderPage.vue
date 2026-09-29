<template>
  <div class="order-page">
    <section class="page-hero">
      <div class="container">
        <div class="section-label"><ShoppingCart class="icon-inline" /> Procurement Portal</div>
        <h1>Order &amp; <span class="gradient-text">Request a Quote</span></h1>
        <p class="page-hero-sub">Direct access to our Lorton, VA manufacturing facility. Fill out the form below and our team will respond within 24 hours.</p>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="order-grid">
          <!-- Order Form -->
          <div class="order-form-wrap">
            <div class="form-card">
              <div class="form-header">
                <h2>Enterprise Partnership Inquiry</h2>
                <p>For high-volume orders, custom printing, and sample kits.</p>
              </div>

              <!-- Success / Error messages -->
              <div v-if="submitted" class="success-box">
                <CheckCircle class="icon-inline" /> <strong>Order submitted successfully!</strong> Our team will contact you within 24 hours with pricing and next steps.
              </div>
              <div v-if="error" class="error-box">
                <XCircle class="icon-inline" /> {{ error }}
              </div>

              <form v-if="!submitted" @submit.prevent="submitOrder" id="order-form" novalidate>
                <div class="form-row form-row-3">
                  <div class="form-group">
                    <label class="form-label" for="company_name">Company Name *</label>
                    <input id="company_name" class="form-input" type="text" v-model="form.company_name" placeholder="e.g. Starbucks Regional" required />
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="contact_name">Your Name *</label>
                    <input id="contact_name" class="form-input" type="text" v-model="form.contact_name" placeholder="Full name" required />
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="email">Corporate Email *</label>
                    <input id="email" class="form-input" type="email" v-model="form.email" placeholder="name@company.com" required />
                  </div>
                </div>

                <div class="form-row form-row-3">
                  <div class="form-group">
                    <label class="form-label" for="phone">Phone Number</label>
                    <input id="phone" class="form-input" type="tel" v-model="form.phone" placeholder="+1 (555) 000-0000" />
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="product_type">Product Type *</label>
                    <select id="product_type" class="form-select" v-model="form.product_type" required>
                      <option value="">Select a product</option>
                      <option value="paper_cups">Paper Cups (8oz–20oz)</option>
                      <option value="grocery_bags">Grocery Paper Bags</option>
                      <option value="retail_bags">Retail Paper Bags</option>
                      <option value="custom_enterprise">Custom Enterprise Bundle</option>
                      <option value="sample_kit">Free Sample Kit</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="monthly_volume">Monthly Volume *</label>
                    <select id="monthly_volume" class="form-select" v-model="form.monthly_volume" required>
                      <option value="">Select target volume</option>
                      <option value="under_10k">Under 10,000 units</option>
                      <option value="10k_50k">10,000 – 50,000 units</option>
                      <option value="50k_250k">50,000 – 250,000 units</option>
                      <option value="250k_1m">250,000 – 1,000,000 units</option>
                      <option value="over_1m">Over 1,000,000 units</option>
                    </select>
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group">
                    <label class="form-label" for="lead_time">Desired Lead Time</label>
                    <input id="lead_time" class="form-input" type="text" v-model="form.lead_time" placeholder="e.g. 45 Days" />
                  </div>
                </div>

                <!-- Customization options for cups -->
                <div v-if="form.product_type === 'paper_cups'" class="cup-options">
                  <div class="form-row">
                    <div class="form-group">
                      <label class="form-label" for="cup_sizes">Cup Sizes Needed</label>
                      <select id="cup_sizes" class="form-select" v-model="form.cup_sizes">
                        <option value="">Select sizes</option>
                        <option value="8oz">8oz Only</option>
                        <option value="12oz">12oz Only</option>
                        <option value="16oz">16oz Only</option>
                        <option value="20oz">20oz Only</option>
                        <option value="mixed">Mixed Sizes</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="lining">Lining Option</label>
                      <select id="lining" class="form-select" v-model="form.lining">
                        <option value="">Select lining</option>
                        <option value="aqueous">Aqueous Coating (Standard)</option>
                        <option value="pla">PLA Compostable</option>
                        <option value="both">Both Options</option>
                      </select>
                    </div>
                  </div>
                </div>

                <!-- Sample Kit Checkbox -->
                <div class="sample-checkbox">
                  <label class="checkbox-label">
                    <input type="checkbox" v-model="form.request_sample" id="request_sample" />
                    <span class="checkbox-box"></span>
                    <span><Package class="icon-inline" /> Send me a Free Sample Kit (Cups &amp; Bags)</span>
                  </label>
                </div>

                <div class="form-row" v-if="form.request_sample">
                  <div class="form-group">
                    <label class="form-label" for="shipping_address">Shipping Address for Samples *</label>
                    <textarea id="shipping_address" class="form-textarea" v-model="form.shipping_address" placeholder="Full shipping address..." style="min-height:50px;"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label class="form-label" for="notes">Technical Specifications / Additional Notes</label>
                  <textarea id="notes" class="form-textarea" v-model="form.notes" placeholder="Custom printing requirements, branding details, etc." style="min-height:50px;"></textarea>
                </div>

                <button type="submit" class="btn btn-submit-white btn-lg submit-btn" :disabled="loading" id="submit-order-btn">
                  <span v-if="!loading"><Rocket class="icon-inline" /> Submit Technical RFP</span>
                  <span v-else><Hourglass class="icon-inline" /> Submitting...</span>
                </button>
              </form>
            </div>
          </div>

          <!-- Sidebar Info -->
          <div class="order-sidebar">
            <div class="sidebar-card">
              <h3>What Happens Next?</h3>
              <div class="steps">
                <div class="step" v-for="(s, i) in steps" :key="i">
                  <div class="step-num">{{ i + 1 }}</div>
                  <div>
                    <strong>{{ s.title }}</strong>
                    <p>{{ s.desc }}</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="sidebar-card">
              <h3>Products Available</h3>
              <div class="product-list">
                <div class="pl-item">
                  <Coffee class="icon-md" />
                  <div>
                    <strong>Paper Cups (8–20oz)</strong>
                    <span class="badge badge-green ml">In Stock</span>
                    <p>FSC-certified, custom print, PLA or aqueous lining.</p>
                  </div>
                </div>
                <div class="pl-item">
                  <ShoppingCart class="icon-md" />
                  <div>
                    <strong>Grocery Paper Bags</strong>
                    <span class="badge badge-green ml">In Stock</span>
                    <p>Reinforced handles, bulk pricing available.</p>
                  </div>
                </div>
                <div class="pl-item">
                  <ShoppingBag class="icon-md" />
                  <div>
                    <strong>Retail Paper Bags</strong>
                    <span class="badge badge-coming ml">Coming Soon</span>
                    <p>Custom branded bags — coming soon.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="sidebar-card contact-quick">
              <h3>Quick Contact</h3>
              <a href="tel:+15716326843" class="qc-item"><Phone class="icon-inline" /> (571) 632-6843</a>
              <a href="tel:+12023363453" class="qc-item"><Phone class="icon-inline" /> (202) 336-3453</a>
              <a href="mailto:operations@kanabagsllc.net" class="qc-item"><Mail class="icon-inline" /> operations@kanabagsllc.net</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import { ShoppingCart, CheckCircle, XCircle, Package, Rocket, Hourglass, Coffee, ShoppingBag, Phone, Mail } from 'lucide-vue-next'

export default {
  name: 'OrderPage',
  components: {
    ShoppingCart, CheckCircle, XCircle, Package, Rocket, Hourglass, Coffee, ShoppingBag, Phone, Mail
  },
  data() {
    return {
      loading: false,
      submitted: false,
      error: null,
      form: {
        company_name: '', contact_name: '', email: '', phone: '', product_type: '',
        monthly_volume: '', lead_time: '', cup_sizes: '', lining: '', request_sample: false,
        shipping_address: '', notes: '',
      },
      steps: [
        { title: 'We Review Your RFP', desc: 'Reviewed within 24 hours.' },
        { title: 'Custom Quote Prepared', desc: 'Pricing proposal based on specs.' },
        { title: 'Sample Kit Shipped', desc: 'If requested, free samples sent.' },
        { title: 'Partnership Begins', desc: 'Dedicated account manager assigned.' },
      ]
    }
  },
  methods: {
    async submitOrder() {
      this.loading = true
      this.error = null
      try {
        const res = await fetch('/api/order.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify(this.form),
        })
        const data = await res.json()
        if (data.success) {
          this.submitted = true
        } else {
          this.error = data.message || 'Something went wrong. Please try again.'
        }
      } catch (e) {
        this.error = 'Network error. Please email us directly at operations@kanabagsllc.net'
      } finally {
        this.loading = false
      }
    }
  }
}
</script>

<style scoped>
.order-page { padding-top: 80px; }
.page-hero {
  padding: 2.5rem 0 1.5rem;
  text-align: center;
  background: radial-gradient(ellipse at top, rgba(37,168,100,0.08) 0%, transparent 60%);
  border-bottom: 1px solid var(--border);
}
.page-hero h1 { margin: 0.5rem 0 0.5rem; font-size: 2rem; }
.page-hero-sub { color: var(--text-secondary); font-size: 0.95rem; max-width: 560px; margin: 0 auto; }

.order-grid {
  display: grid;
  grid-template-columns: 1.8fr 1fr;
  gap: 1.5rem;
  align-items: start;
}
.form-card {
  background: var(--surface-1);
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  padding: 1.5rem;
}
.form-header h2 { margin-bottom: 0.25rem; font-size: 1.25rem; }
.form-header p { font-size: 0.85rem; margin-bottom: 1rem; color: var(--text-muted); }
.form-row {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 0.75rem;
  margin-bottom: 0.5rem;
}
.form-row-3 {
  grid-template-columns: 1fr 1fr 1fr;
}
.form-group {
  margin-bottom: 0.5rem;
}
.cup-options {
  background: var(--surface-2);
  border: 1px solid var(--border);
  border-radius: var(--radius-sm);
  padding: 0.75rem;
  margin-bottom: 0.5rem;
}
.sample-checkbox { margin-bottom: 0.75rem; margin-top: 0.5rem; }
.checkbox-label {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  cursor: pointer;
  font-size: 0.85rem;
  color: var(--text-secondary);
}
.checkbox-label input { display: none; }
.checkbox-box {
  width: 16px; height: 16px;
  border: 1.5px solid var(--green-600);
  border-radius: 4px;
  background: var(--surface-2);
  flex-shrink: 0;
  position: relative;
  transition: all var(--transition);
}
.checkbox-label input:checked + .checkbox-box {
  background: var(--green-500);
  border-color: var(--green-400);
}
.checkbox-label input:checked + .checkbox-box::after {
  content: '✓';
  position: absolute;
  top: -2px; left: 1px;
  font-size: 0.75rem;
  color: white;
  font-weight: 700;
}
.submit-btn {
  width: 100%;
  justify-content: center;
  margin-top: 0.5rem;
  padding: 0.6rem;
  font-size: 1rem;
}
.submit-btn:disabled { opacity: 0.6; cursor: not-allowed; }
.btn-submit-white {
  background: #ffffff;
  color: #0e3320;
  font-weight: 700;
  box-shadow: 0 4px 20px rgba(255,255,255,0.15);
}
.btn-submit-white:hover {
  background: #f0faf5;
  transform: translateY(-2px);
  box-shadow: 0 8px 30px rgba(255,255,255,0.25);
}
.success-box, .error-box {
  border-radius: var(--radius-sm);
  padding: 1rem;
  font-size: 0.9rem;
  margin-bottom: 1rem;
}
.success-box { background: rgba(37,168,100,0.1); border: 1px solid var(--green-600); color: var(--green-200); }
.error-box { background: rgba(168,37,37,0.1); border: 1px solid #6b2222; color: #ffb3b3; }

/* Sidebar */
.order-sidebar { display: flex; flex-direction: column; gap: 1rem; }
.sidebar-card {
  background: var(--surface-1);
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  padding: 1.25rem;
}
.sidebar-card h3 { margin-bottom: 0.75rem; font-size: 0.95rem; }
.steps { display: flex; flex-direction: column; gap: 0.75rem; }
.step { display: flex; gap: 0.75rem; align-items: flex-start; }
.step-num {
  width: 22px; height: 22px;
  border-radius: 50%;
  background: var(--green-800);
  border: 1px solid var(--green-600);
  display: flex; align-items: center; justify-content: center;
  font-size: 0.7rem; font-weight: 700; color: var(--green-300); flex-shrink: 0;
}
.step strong { display: block; font-size: 0.85rem; color: var(--text-primary); margin-bottom: 0.15rem; }
.step p { font-size: 0.75rem; margin: 0; line-height: 1.4; color: var(--text-muted); }
.product-list { display: flex; flex-direction: column; gap: 0.75rem; }
.pl-item { display: flex; gap: 0.5rem; align-items: flex-start; }
.pl-item > .icon-md { flex-shrink: 0; margin-top: 2px; color: var(--green-400); }
.pl-item strong { display: inline; font-size: 0.85rem; color: var(--text-primary); margin-right: 0.5rem; }
.pl-item .ml { vertical-align: middle; }
.pl-item p { font-size: 0.75rem; margin-top: 0.15rem; color: var(--text-muted); }
.qc-item {
  display: block;
  padding: 0.5rem 0;
  border-bottom: 1px solid var(--border);
  font-size: 0.85rem;
  color: var(--text-muted);
  transition: color var(--transition);
}
.qc-item:last-child { border-bottom: none; }
.qc-item:hover { color: var(--green-300); }

.icon-inline { width: 16px; height: 16px; vertical-align: text-bottom; margin-right: 4px; }
.icon-md { width: 20px; height: 20px; }

@media (max-width: 900px) {
  .order-grid { grid-template-columns: 1fr; }
  .form-row, .form-row-3 { grid-template-columns: 1fr; }
}
</style>
