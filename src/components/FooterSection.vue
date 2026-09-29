<template>
  <footer class="footer">
    <div class="footer-glow"></div>
    <div class="container">
      <div class="footer-grid">
        <!-- Brand -->
        <div class="footer-brand">
          <div class="footer-logo">
            <img src="/kanabags-logo.png" alt="KanaBags Logo" class="logo-icon" />
          </div>
          <p class="brand-desc">
            Based in Lorton, Virginia — the forward-thinking packaging division of Kana PLC.
            Established in 2025, specializing in high-volume, eco-friendly paper solutions for
            the North American supply chain.
          </p>
          <div class="eco-badges">
            <span class="eco-badge"><Leaf class="icon-inline" /> FSC Certified</span>
            <span class="eco-badge"><Recycle class="icon-inline" /> Recyclable</span>
            <span class="eco-badge"><MapPin class="icon-inline" /> Made in USA</span>
          </div>
        </div>

        <!-- Quick Links -->
        <div class="footer-col">
          <h4 class="footer-title">Quick Links</h4>
          <ul class="footer-links">
            <li><router-link to="/">Home</router-link></li>
            <li><router-link to="/about">About Us</router-link></li>
            <li><router-link to="/products">Products</router-link></li>
            <li><router-link to="/environment">Environment</router-link></li>
            <li><router-link to="/order">Procurement Portal</router-link></li>
            <li><router-link to="/contact">Contact</router-link></li>
          </ul>
        </div>

        <!-- Products -->
        <div class="footer-col">
          <h4 class="footer-title">Products</h4>
          <ul class="footer-links">
            <li><router-link to="/products">Paper Cups (8–20oz)</router-link></li>
            <li><router-link to="/products">Retail Paper Bags</router-link></li>
            <li><router-link to="/products">Grocery Paper Bags</router-link></li>
            <li><router-link to="/order">Custom Printing</router-link></li>
            <li><router-link to="/order">Enterprise Quotes</router-link></li>
          </ul>
        </div>

        <!-- Contact -->
        <div class="footer-col">
          <h4 class="footer-title">Facility Location</h4>
          <div class="footer-contact">
            <div class="contact-item">
              <MapPin class="contact-icon" />
              <div>
                <p>8390 Suite C Terminal Road</p>
                <p>Lorton, VA 22079</p>
              </div>
            </div>
            <div class="contact-item">
              <Phone class="contact-icon" />
              <div>
                <a href="tel:+15716326843">(571) 632-6843</a>
                <a href="tel:+12023363453">(202) 336-3453</a>
              </div>
            </div>
            <div class="contact-item">
              <Mail class="contact-icon" />
              <div>
                <a href="mailto:operations@kanabagsllc.net">operations@kanabagsllc.net</a>
                <a href="mailto:info@kanabagsllc.net">info@kanabagsllc.net</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="footer-bottom">
        <p>© 2026 KanaBags LLC. Manufactured in the USA. All rights reserved.</p>
        <div class="footer-bottom-links">
          <router-link to="/order">Place Order</router-link>
          <span>·</span>
          <router-link to="/contact">Contact</router-link>
        </div>
      </div>
    </div>
  </footer>
</template>

<script>
import { Leaf, Recycle, MapPin, Phone, Mail } from 'lucide-vue-next'

export default {
  name: 'FooterSection',
  components: { Leaf, Recycle, MapPin, Phone, Mail }
}
</script>

<style scoped>
.footer {
  background: var(--green-950);
  border-top: 1px solid var(--border);
  padding: 5rem 0 2rem;
  position: relative;
  overflow: hidden;
}
.footer-glow {
  position: absolute;
  top: -80px; left: 50%;
  transform: translateX(-50%);
  width: 600px; height: 200px;
  background: radial-gradient(ellipse, rgba(37,168,100,0.08) 0%, transparent 70%);
  pointer-events: none;
}
.footer-grid {
  display: grid;
  grid-template-columns: 1.8fr 1fr 1fr 1.4fr;
  gap: 3rem;
  margin-bottom: 3rem;
}
.footer-logo {
  display: flex;
  align-items: center;
  gap: 0.6rem;
  margin-bottom: 1rem;
}
.logo-icon { height: 60px; width: auto; max-width: 200px; object-fit: contain; }
.brand-desc {
  font-size: 0.88rem;
  color: var(--text-muted);
  line-height: 1.7;
  margin-bottom: 1.2rem;
}
.eco-badges {
  display: flex;
  flex-wrap: wrap;
  gap: 0.5rem;
}
.icon-inline { width: 14px; height: 14px; vertical-align: middle; margin-right: 2px; }
.eco-badge {
  display: flex;
  align-items: center;
  font-size: 0.75rem;
  font-weight: 600;
  padding: 0.3rem 0.7rem;
  background: rgba(37,168,100,0.08);
  border: 1px solid var(--border);
  border-radius: 999px;
  color: var(--green-300);
}
.footer-title {
  font-size: 0.85rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.1em;
  color: var(--green-400);
  margin-bottom: 1.2rem;
}
.footer-links {
  list-style: none;
  display: flex;
  flex-direction: column;
  gap: 0.6rem;
}
.footer-links a {
  color: var(--text-muted);
  font-size: 0.9rem;
  transition: color var(--transition);
}
.footer-links a:hover { color: var(--green-300); }
.footer-contact { display: flex; flex-direction: column; gap: 1rem; }
.contact-item {
  display: flex;
  gap: 0.75rem;
  align-items: flex-start;
}
.contact-icon { width: 18px; height: 18px; color: var(--text-muted); margin-top: 2px; flex-shrink: 0; }
.contact-item p, .contact-item a {
  display: block;
  font-size: 0.88rem;
  color: var(--text-muted);
  transition: color var(--transition);
  line-height: 1.6;
}
.contact-item a:hover { color: var(--green-300); }
.footer-bottom {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding-top: 2rem;
  border-top: 1px solid var(--border);
  flex-wrap: wrap;
  gap: 1rem;
}
.footer-bottom p {
  font-size: 0.83rem;
  color: var(--text-muted);
}
.footer-bottom-links {
  display: flex;
  align-items: center;
  gap: 0.75rem;
}
.footer-bottom-links span { color: var(--text-muted); }
.footer-bottom-links a {
  font-size: 0.83rem;
  color: var(--text-muted);
  transition: color var(--transition);
}
.footer-bottom-links a:hover { color: var(--green-300); }

@media (max-width: 900px) {
  .footer-grid { grid-template-columns: 1fr 1fr; }
  .footer-brand { grid-column: span 2; }
}
@media (max-width: 600px) {
  .footer-grid { grid-template-columns: 1fr; }
  .footer-brand { grid-column: span 1; }
  .footer-bottom { flex-direction: column; text-align: center; }
}
</style>
