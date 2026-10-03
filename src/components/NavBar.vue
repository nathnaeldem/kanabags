<template>
  <header class="navbar-wrap" :class="{ scrolled: scrolled, open: menuOpen }">
    <div class="navbar">
      <router-link to="/" class="navbar-logo" @click="closeMenu">
        <img src="/kanabags-logo.png" alt="KanaBags Logo" class="logo-icon" />
        <span class="logo-text">KanaBags</span>
      </router-link>

      <nav class="navbar-links" aria-label="Main Navigation">
        <router-link to="/" class="nav-link" exact-active-class="nav-active">
          <Home class="nav-ico" /> Home
        </router-link>
        <router-link to="/products" class="nav-link" active-class="nav-active">
          <ShoppingBag class="nav-ico" /> Shop
        </router-link>
        <router-link to="/about" class="nav-link" active-class="nav-active">
          <Factory class="nav-ico" /> About
        </router-link>
        <router-link to="/contact" class="nav-link" active-class="nav-active">
          <Phone class="nav-ico" /> Contact
        </router-link>
      </nav>

      <div class="navbar-right">
        <a href="tel:+15716326843" class="nav-phone">
          <Phone class="nav-ico" />
          <span>(571) 632-6843</span>
        </a>
        <router-link to="/order" class="nav-order-btn">
          <ShoppingCart class="nav-ico" />
          <span>Order</span>
        </router-link>
      </div>

      <button class="hamburger" :class="{ open: menuOpen }" @click="toggleMenu" aria-label="Toggle Menu">
        <span></span><span></span><span></span>
      </button>
    </div>

    <div class="mobile-menu" :class="{ open: menuOpen }">
      <router-link to="/" class="mobile-link" @click="closeMenu"><Home class="nav-ico" /> Home</router-link>
      <router-link to="/products" class="mobile-link" @click="closeMenu"><ShoppingBag class="nav-ico" /> Shop</router-link>
      <router-link to="/about" class="mobile-link" @click="closeMenu"><Factory class="nav-ico" /> About</router-link>
      <router-link to="/environment" class="mobile-link" @click="closeMenu"><Leaf class="nav-ico" /> Environment</router-link>
      <router-link to="/contact" class="mobile-link" @click="closeMenu"><Phone class="nav-ico" /> Contact</router-link>
      <a href="tel:+15716326843" class="mobile-link" @click="closeMenu"><Phone class="nav-ico" /> (571) 632-6843</a>
      <router-link to="/order" class="nav-order-btn mobile-order" @click="closeMenu">
        <ShoppingCart class="nav-ico" /> Order Now
      </router-link>
    </div>
  </header>
</template>

<script>
import { Home, ShoppingBag, Phone, ShoppingCart, Factory, Leaf } from 'lucide-vue-next'

export default {
  name: 'NavBar',
  components: { Home, ShoppingBag, Phone, ShoppingCart, Factory, Leaf },
  data() {
    return { scrolled: false, menuOpen: false }
  },
  mounted() {
    window.addEventListener('scroll', this.onScroll)
  },
  beforeUnmount() {
    window.removeEventListener('scroll', this.onScroll)
  },
  methods: {
    onScroll() { this.scrolled = window.scrollY > 24 },
    toggleMenu() { this.menuOpen = !this.menuOpen },
    closeMenu() { this.menuOpen = false }
  }
}
</script>

<style scoped>
.navbar-wrap {
  position: fixed;
  top: 0; left: 0; right: 0;
  z-index: 1000;
  padding: 1rem 1.25rem 0;
  pointer-events: none;
}
.navbar {
  pointer-events: auto;
  max-width: 1180px;
  margin: 0 auto;
  display: flex;
  align-items: center;
  gap: 1rem;
  padding: 0.65rem 0.85rem 0.65rem 1.1rem;
  background: rgba(250, 248, 242, 0.94);
  backdrop-filter: blur(16px);
  -webkit-backdrop-filter: blur(16px);
  border-radius: 999px;
  border: 1px solid rgba(12, 42, 28, 0.08);
  box-shadow: 0 10px 40px rgba(12, 42, 28, 0.12);
  transition: box-shadow 0.3s ease, transform 0.3s ease;
}
.navbar-wrap.scrolled .navbar {
  box-shadow: 0 14px 44px rgba(12, 42, 28, 0.18);
}

.navbar-logo {
  display: flex;
  align-items: center;
  gap: 0.55rem;
  text-decoration: none;
  flex-shrink: 0;
}
.logo-icon {
  height: 38px;
  width: auto;
  max-width: 120px;
  object-fit: contain;
}
.logo-text {
  font-family: 'Outfit', sans-serif;
  font-weight: 800;
  font-size: 1.15rem;
  color: var(--green-900);
  letter-spacing: -0.02em;
}

.navbar-links {
  display: flex;
  align-items: center;
  gap: 0.2rem;
  margin-left: auto;
}
.nav-link {
  display: inline-flex;
  align-items: center;
  gap: 0.35rem;
  padding: 0.55rem 1rem;
  border-radius: 999px;
  color: var(--green-800);
  font-size: 0.9rem;
  font-weight: 600;
  transition: all var(--transition);
}
.nav-link:hover { background: rgba(22, 122, 74, 0.08); }
.nav-active {
  background: var(--green-800) !important;
  color: #fff !important;
}
.nav-ico { width: 16px; height: 16px; flex-shrink: 0; }

.navbar-right {
  display: flex;
  align-items: center;
  gap: 0.65rem;
  margin-left: 0.5rem;
}
.nav-phone {
  display: inline-flex;
  align-items: center;
  gap: 0.35rem;
  color: var(--green-800);
  font-size: 0.85rem;
  font-weight: 600;
  white-space: nowrap;
  transition: color var(--transition);
}
.nav-phone:hover { color: var(--green-600); }
.nav-phone .nav-ico { color: var(--green-600); }

.nav-order-btn {
  display: inline-flex;
  align-items: center;
  gap: 0.4rem;
  padding: 0.6rem 1.15rem;
  border-radius: 999px;
  background: var(--amber);
  color: #1a1200;
  font-weight: 800;
  font-size: 0.88rem;
  box-shadow: 0 4px 14px rgba(232, 155, 30, 0.35);
  transition: all var(--transition);
  white-space: nowrap;
}
.nav-order-btn:hover {
  background: #f0ad2e;
  transform: translateY(-1px);
  box-shadow: 0 8px 20px rgba(232, 155, 30, 0.45);
}

.hamburger {
  display: none;
  flex-direction: column;
  gap: 5px;
  background: none;
  border: none;
  cursor: pointer;
  padding: 6px;
  margin-left: auto;
}
.hamburger span {
  display: block;
  width: 22px;
  height: 2px;
  background: var(--green-900);
  border-radius: 2px;
  transition: all 0.3s ease;
}
.hamburger.open span:nth-child(1) { transform: rotate(45deg) translate(5px, 5px); }
.hamburger.open span:nth-child(2) { opacity: 0; }
.hamburger.open span:nth-child(3) { transform: rotate(-45deg) translate(5px, -5px); }

.mobile-menu {
  pointer-events: auto;
  display: none;
  max-width: 1180px;
  margin: 0.6rem auto 0;
  background: rgba(250, 248, 242, 0.98);
  border-radius: 24px;
  padding: 0.75rem;
  border: 1px solid rgba(12, 42, 28, 0.08);
  box-shadow: 0 16px 40px rgba(12, 42, 28, 0.14);
  flex-direction: column;
  gap: 0.2rem;
  max-height: 0;
  overflow: hidden;
  opacity: 0;
  transition: all 0.35s ease;
}
.mobile-menu.open {
  max-height: 480px;
  opacity: 1;
  padding: 0.85rem;
}
.mobile-link {
  display: flex;
  align-items: center;
  gap: 0.55rem;
  padding: 0.85rem 1rem;
  border-radius: 14px;
  color: var(--green-800);
  font-weight: 600;
}
.mobile-link:hover { background: rgba(22, 122, 74, 0.08); }
.mobile-order {
  justify-content: center;
  margin-top: 0.4rem;
}

@media (max-width: 980px) {
  .nav-phone span { display: none; }
}
@media (max-width: 820px) {
  .navbar-links, .navbar-right { display: none; }
  .hamburger { display: flex; }
  .mobile-menu { display: flex; }
  .navbar { border-radius: 22px; }
  .logo-text { display: none; }
}
</style>
