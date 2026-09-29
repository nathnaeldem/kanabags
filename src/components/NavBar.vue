<template>
  <header class="navbar" :class="{ 'navbar-scrolled': scrolled, 'navbar-open': menuOpen }">
    <div class="container navbar-inner">
      <!-- Logo -->
      <router-link to="/" class="navbar-logo" @click="closeMenu">
        <img src="/kanabags-logo.png" alt="KanaBags Logo" class="logo-icon" />
      </router-link>

      <!-- Desktop Nav -->
      <nav class="navbar-links" aria-label="Main Navigation">
        <router-link to="/" class="nav-link" exact-active-class="nav-active">Home</router-link>
        <router-link to="/about" class="nav-link" active-class="nav-active">About</router-link>
        <router-link to="/products" class="nav-link" active-class="nav-active">Products</router-link>
        <router-link to="/environment" class="nav-link" active-class="nav-active">Environment</router-link>
        <router-link to="/contact" class="nav-link" active-class="nav-active">Contact</router-link>
      </nav>

      <!-- CTA -->
      <div class="navbar-cta">
        <router-link to="/order" class="btn btn-nav-cta">
          <span>Order Now</span>
          <ArrowRight class="icon-inline" />
        </router-link>
      </div>

      <!-- Hamburger -->
      <button class="hamburger" :class="{ open: menuOpen }" @click="toggleMenu" aria-label="Toggle Menu">
        <span></span><span></span><span></span>
      </button>
    </div>

    <!-- Mobile Menu -->
    <div class="mobile-menu" :class="{ open: menuOpen }">
      <nav class="mobile-links">
        <router-link to="/" class="mobile-link" @click="closeMenu">Home</router-link>
        <router-link to="/about" class="mobile-link" @click="closeMenu">About</router-link>
        <router-link to="/products" class="mobile-link" @click="closeMenu">Products</router-link>
        <router-link to="/environment" class="mobile-link" @click="closeMenu">Environment</router-link>
        <router-link to="/contact" class="mobile-link" @click="closeMenu">Contact</router-link>
        <router-link to="/order" class="btn btn-nav-cta" style="margin-top:1rem;" @click="closeMenu">Order Now</router-link>
      </nav>
    </div>
  </header>
</template>

<script>
import { Leaf, ArrowRight } from 'lucide-vue-next'

export default {
  name: 'NavBar',
  components: { Leaf, ArrowRight },
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
    onScroll() { this.scrolled = window.scrollY > 40 },
    toggleMenu() { this.menuOpen = !this.menuOpen },
    closeMenu() { this.menuOpen = false }
  }
}
</script>

<style scoped>
.navbar {
  position: fixed;
  top: 0; left: 0; right: 0;
  z-index: 1000;
  padding: 1rem 0;
  background: linear-gradient(135deg, var(--green-900) 0%, var(--green-800) 55%, var(--green-700) 100%);
  border-bottom: 1px solid rgba(61, 207, 132, 0.2);
  box-shadow: 0 4px 24px rgba(4, 32, 21, 0.25);
  transition: all 0.35s ease;
}
.navbar-scrolled {
  padding: 0.65rem 0;
  box-shadow: 0 6px 28px rgba(4, 32, 21, 0.35);
}
.navbar-inner {
  display: flex;
  align-items: center;
  gap: 2rem;
}
.navbar-logo {
  display: flex;
  align-items: center;
  gap: 0.6rem;
  text-decoration: none;
}
.logo-icon {
  height: 50px;
  width: auto;
  max-width: 180px;
  object-fit: contain;
  filter: brightness(1.05);
}
.navbar-links {
  display: flex;
  gap: 0.25rem;
  margin-left: auto;
}
.nav-link {
  padding: 0.5rem 0.9rem;
  border-radius: var(--radius-sm);
  color: var(--on-green-muted);
  font-size: 0.9rem;
  font-weight: 500;
  transition: all var(--transition);
  position: relative;
}
.nav-link::after {
  content: '';
  position: absolute;
  bottom: 2px; left: 50%; right: 50%;
  height: 2px;
  background: var(--amber);
  border-radius: 1px;
  transition: all var(--transition);
}
.nav-link:hover { color: var(--on-green); }
.nav-link:hover::after, .nav-active::after { left: 12px; right: 12px; }
.nav-active { color: #fff; }
.navbar-cta { margin-left: 1rem; }
.btn-nav-cta {
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  padding: 0.7rem 1.4rem;
  border-radius: var(--radius-md);
  font-weight: 700;
  font-size: 0.9rem;
  background: linear-gradient(135deg, var(--amber-dark), var(--amber));
  color: #fff;
  border: none;
  box-shadow: 0 4px 16px rgba(232, 155, 30, 0.4);
  transition: all var(--transition);
}
.btn-nav-cta:hover {
  transform: translateY(-2px);
  box-shadow: 0 8px 24px rgba(232, 155, 30, 0.5);
}
.icon-inline { width: 16px; height: 16px; margin-left: 6px; vertical-align: text-bottom; }

.hamburger {
  display: none;
  flex-direction: column;
  gap: 5px;
  background: none;
  border: none;
  cursor: pointer;
  padding: 4px;
  margin-left: auto;
}
.hamburger span {
  display: block;
  width: 24px;
  height: 2px;
  background: var(--on-green);
  border-radius: 2px;
  transition: all 0.3s ease;
}
.hamburger.open span:nth-child(1) { transform: rotate(45deg) translate(5px, 5px); }
.hamburger.open span:nth-child(2) { opacity: 0; }
.hamburger.open span:nth-child(3) { transform: rotate(-45deg) translate(5px, -5px); }

.mobile-menu {
  display: none;
  overflow: hidden;
  max-height: 0;
  transition: max-height 0.4s ease;
}
.mobile-menu.open { max-height: 400px; }
.mobile-links {
  display: flex;
  flex-direction: column;
  padding: 1rem 1.5rem 1.5rem;
  gap: 0.25rem;
  border-top: 1px solid rgba(61, 207, 132, 0.2);
  background: var(--green-950);
}
.mobile-link {
  padding: 0.75rem 0.5rem;
  color: var(--on-green-muted);
  font-size: 1rem;
  font-weight: 500;
  border-bottom: 1px solid rgba(61, 207, 132, 0.12);
  transition: color var(--transition);
}
.mobile-link:hover { color: var(--amber); }

@media (max-width: 768px) {
  .navbar-links, .navbar-cta { display: none; }
  .hamburger { display: flex; }
  .mobile-menu { display: block; }
}
</style>
