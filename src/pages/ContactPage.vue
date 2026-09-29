<template>
  <div class="contact-page">
    <section class="page-hero">
      <div class="container">
        <div class="section-label"><Mail class="icon-inline" /> Get In Touch</div>
        <h1>Contact <span class="gradient-text">KanaBags LLC</span></h1>
        <p class="page-hero-sub">We'd love to hear from you. Reach out for quotes, partnerships, or general inquiries.</p>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="contact-grid">
          <!-- Contact Info -->
          <div class="contact-info">
            <h2>Contact <span class="gradient-text">Information</span></h2>
            <p>Our team is ready to assist with all your packaging needs. Reach us by phone, email, or visit our facility in Lorton, VA.</p>

            <div class="info-cards">
              <div class="info-card">
                <div class="ic-icon"><MapPin class="icon-md" /></div>
                <div>
                  <strong>Address</strong>
                  <p>8390 Suite C Terminal Road</p>
                  <p>Lorton, VA 22079</p>
                </div>
              </div>
              <div class="info-card">
                <div class="ic-icon"><Phone class="icon-md" /></div>
                <div>
                  <strong>Phone</strong>
                  <a href="tel:+15716326843">(571) 632-6843</a>
                  <a href="tel:+12023363453">(202) 336-3453</a>
                </div>
              </div>
              <div class="info-card">
                <div class="ic-icon"><Mail class="icon-md" /></div>
                <div>
                  <strong>Email</strong>
                  <a href="mailto:operations@kanabagsllc.net">operations@kanabagsllc.net</a>
                  <a href="mailto:info@kanabagsllc.net">info@kanabagsllc.net</a>
                </div>
              </div>
              <div class="info-card">
                <div class="ic-icon"><Clock class="icon-md" /></div>
                <div>
                  <strong>Business Hours</strong>
                  <p>Monday – Friday: 9am – 5pm EST</p>
                  <p>24h response for enterprise inquiries</p>
                </div>
              </div>
            </div>

            <div class="map-preview">
              <a href="https://maps.google.com/?q=8390+Terminal+Road+Lorton+VA+22079" target="_blank" rel="noopener noreferrer" class="map-link">
                <div class="map-placeholder">
                  <MapPin class="map-big-pin" />
                  <div class="map-info">
                    <strong>KanaBags LLC</strong>
                    <span>8390 Suite C Terminal Road, Lorton, VA 22079</span>
                    <span class="view-map">View on Google Maps <ArrowRight class="icon-inline" /></span>
                  </div>
                </div>
              </a>
            </div>
          </div>

          <!-- Contact Form -->
          <div class="contact-form-wrap">
            <div class="form-card">
              <h3>Send Us a Message</h3>

              <div v-if="submitted" class="success-box">
                <CheckCircle class="icon-inline" /> <strong>Message sent!</strong> We'll get back to you within 24 hours.
              </div>
              <div v-if="error" class="error-box">
                <XCircle class="icon-inline" /> {{ error }}
              </div>

              <form v-if="!submitted" @submit.prevent="submitContact" id="contact-form" novalidate>
                <div class="form-row">
                  <div class="form-group">
                    <label class="form-label" for="c_name">Name *</label>
                    <input id="c_name" class="form-input" type="text" v-model="form.name" placeholder="Your full name" required />
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="c_email">Email *</label>
                    <input id="c_email" class="form-input" type="email" v-model="form.email" placeholder="your@email.com" required />
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="form-label" for="c_subject">Subject *</label>
                  <input id="c_subject" class="form-input" type="text" v-model="form.subject" placeholder="e.g. Custom Cup Quote" required />
                </div>
                <div class="form-group">
                  <label class="form-label" for="c_message">Message *</label>
                  <textarea id="c_message" class="form-textarea" v-model="form.message" placeholder="Tell us how we can help..." style="min-height:80px;" required></textarea>
                </div>
                <button type="submit" id="send-message-btn" class="btn btn-submit-white btn-lg" style="width:100%;justify-content:center;margin-top:0.5rem;" :disabled="loading">
                  <span v-if="!loading"><Send class="icon-inline" /> Send Message</span>
                  <span v-else><Hourglass class="icon-inline" /> Sending...</span>
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import { Mail, MapPin, Phone, Clock, ArrowRight, CheckCircle, XCircle, Send, Hourglass } from 'lucide-vue-next'

export default {
  name: 'ContactPage',
  components: { Mail, MapPin, Phone, Clock, ArrowRight, CheckCircle, XCircle, Send, Hourglass },
  data() {
    return {
      loading: false,
      submitted: false,
      error: null,
      form: { name: '', email: '', subject: '', message: '' }
    }
  },
  methods: {
    async submitContact() {
      this.loading = true
      this.error = null
      try {
        const res = await fetch('/api/contact.php', {
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
        this.error = 'Network error. Please email us directly at info@kanabagsllc.net'
      } finally {
        this.loading = false
      }
    }
  }
}
</script>

<style scoped>
.contact-page { padding-top: 80px; }
.page-hero {
  padding: 3rem 0 2rem;
  text-align: center;
  background: radial-gradient(ellipse at top, rgba(37,168,100,0.08) 0%, transparent 60%);
  border-bottom: 1px solid var(--border);
}
.page-hero h1 { margin: 0.5rem 0 0.5rem; font-size: 2.2rem; }
.page-hero-sub { color: var(--text-secondary); font-size: 0.95rem; max-width: 540px; margin: 0 auto; }

.contact-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 2rem;
  align-items: start;
}
.contact-info h2 { margin-bottom: 0.5rem; font-size: 1.5rem; }
.contact-info > p { margin-bottom: 1.5rem; font-size: 0.9rem; color: var(--text-muted); }

.info-cards { display: grid; grid-template-columns: 1fr 1fr; gap: 0.75rem; margin-bottom: 1.5rem; }
.info-card {
  display: flex;
  gap: 0.75rem;
  align-items: flex-start;
  background: var(--surface-1);
  border: 1px solid var(--border);
  border-radius: var(--radius-sm);
  padding: 1rem;
  transition: border-color var(--transition);
}
.info-card:hover { border-color: var(--border-hover); }
.ic-icon {
  width: 36px; height: 36px;
  background: rgba(37,168,100,0.1);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
  color: var(--green-400);
}
.info-card strong { display: block; color: var(--text-primary); margin-bottom: 0.25rem; font-size: 0.85rem; }
.info-card p, .info-card a {
  display: block;
  font-size: 0.8rem;
  color: var(--text-muted);
  transition: color var(--transition);
  line-height: 1.4;
}
.info-card a:hover { color: var(--green-300); }

.map-link { text-decoration: none; }
.map-placeholder {
  display: flex;
  gap: 1rem;
  align-items: center;
  background: var(--surface-1);
  border: 1px solid var(--border);
  border-radius: var(--radius-sm);
  padding: 1rem;
  cursor: pointer;
  transition: all var(--transition);
}
.map-placeholder:hover { border-color: var(--border-hover); background: var(--surface-2); }
.map-big-pin { width: 32px; height: 32px; color: var(--green-400); flex-shrink: 0; }
.map-info strong { display: block; color: var(--text-primary); font-size: 0.85rem; margin-bottom: 0.2rem; }
.map-info span { display: block; font-size: 0.8rem; color: var(--text-muted); }
.view-map { color: var(--green-400) !important; margin-top: 0.2rem; font-weight: 600; display: flex; align-items: center; }

.form-card {
  background: var(--surface-1);
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  padding: 1.5rem;
}
.form-card h3 { margin-bottom: 1rem; font-size: 1.25rem; }
.form-row {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 0.75rem;
}
.form-group {
  margin-bottom: 0.75rem;
}

.success-box {
  background: rgba(37,168,100,0.1);
  border: 1px solid var(--green-600);
  border-radius: var(--radius-sm);
  padding: 1rem;
  color: var(--green-200);
  font-size: 0.9rem;
  margin-bottom: 1rem;
}
.error-box {
  background: rgba(168,37,37,0.1);
  border: 1px solid #6b2222;
  border-radius: var(--radius-sm);
  padding: 1rem;
  color: #ffb3b3;
  font-size: 0.9rem;
  margin-bottom: 1rem;
}

.icon-inline { width: 16px; height: 16px; margin-right: 4px; vertical-align: text-bottom; }
.icon-md { width: 20px; height: 20px; }
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
.btn-submit-white:disabled { opacity: 0.6; cursor: not-allowed; }

@media (max-width: 900px) {
  .contact-grid { grid-template-columns: 1fr; }
  .info-cards { grid-template-columns: 1fr; }
  .form-row { grid-template-columns: 1fr; }
}
</style>
