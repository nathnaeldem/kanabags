import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'

export default defineConfig({
  plugins: [vue()],
  server: {
    port: 3000,
    proxy: {
      // Proxy /api/* to your PHP server (XAMPP/WAMP/Laragon typically on port 80)
      '/api': {
        target: 'http://localhost:80',
        changeOrigin: true,
        // Adjust the rewrite below if your PHP files are in a subdirectory:
        // e.g. if your project is at http://localhost/kanabagsllc/api/
        // rewrite: (path) => path.replace(/^\/api/, '/kanabagsllc/api')
      }
    }
  },
  build: {
    outDir: 'dist',
    emptyOutDir: true,
  }
})
