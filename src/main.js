import { createApp } from 'vue'
import { createRouter, createWebHistory } from 'vue-router'
import App from './App.vue'
import './index.css'

import HomePage from './pages/HomePage.vue'
import ProductsPage from './pages/ProductsPage.vue'
import AboutPage from './pages/AboutPage.vue'
import EnvironmentPage from './pages/EnvironmentPage.vue'
import OrderPage from './pages/OrderPage.vue'
import ContactPage from './pages/ContactPage.vue'

const router = createRouter({
  history: createWebHistory(),
  routes: [
    { path: '/', component: HomePage, meta: { title: 'KanaBags LLC – Industrial Grade Eco-Friendly Packaging' } },
    { path: '/products', component: ProductsPage, meta: { title: 'Products – Paper Cups & Bags | KanaBags LLC' } },
    { path: '/about', component: AboutPage, meta: { title: 'About Us | KanaBags LLC' } },
    { path: '/environment', component: EnvironmentPage, meta: { title: 'Environmental Commitment | KanaBags LLC' } },
    { path: '/order', component: OrderPage, meta: { title: 'Order & Request Quote | KanaBags LLC' } },
    { path: '/contact', component: ContactPage, meta: { title: 'Contact Us | KanaBags LLC' } },
  ],
  scrollBehavior() {
    return { top: 0 }
  }
})

router.afterEach((to) => {
  document.title = to.meta.title || 'KanaBags LLC'
})

createApp(App).use(router).mount('#app')
