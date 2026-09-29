<template>
  <div id="app-root">
    <NavBar />
    <main>
      <router-view />
    </main>
    <FooterSection />
  </div>
</template>

<script>
import NavBar from './components/NavBar.vue'
import FooterSection from './components/FooterSection.vue'

export default {
  name: 'App',
  components: { NavBar, FooterSection }
}
</script>

<style>
#app-root {
  display: flex;
  flex-direction: column;
  min-height: 100vh;
}
main { flex: 1; }
</style>
