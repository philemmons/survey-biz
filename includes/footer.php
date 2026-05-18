<style>
  .site-footer {
    background: var(--ink);
    overflow-x: hidden;
  }

  .site-footer.cta-band {
    padding: var(--space-10) 0 var(--space-6);
  }

  .site-footer .footer-shell {
    width: 80%;
    max-width: 80%;
    min-width: 80%;
    margin: 0 auto;
    box-sizing: border-box;
    padding-left: clamp(1rem, 3vw, 2.5rem);
    padding-right: clamp(1rem, 3vw, 2.5rem);
    position: relative;
    z-index: 1;
  }

  .site-footer .footer-top {
    align-items: start;
    gap: clamp(1.25rem, 2.4vw, 2.5rem);
    grid-template-columns: minmax(0, 1.15fr) minmax(0, 2fr) minmax(0, 1fr);
  }

  .site-footer .footer-nav {
    gap: 0.75rem 1.5rem;
    grid-template-columns: repeat(4, minmax(0, 1fr));
  }

  .site-footer .footer-brand,
  .site-footer .footer-nav,
  .site-footer .footer-group,
  .site-footer .footer-contact {
    min-width: 0;
  }

  .site-footer .footer-wordmark {
    letter-spacing: 0.12em;
  }

  .site-footer .footer-links li + li {
    margin-top: 0;
  }

  .site-footer .footer-links a {
    min-height: 34px;
    line-height: 1.35;
    overflow-wrap: anywhere;
  }

  .site-footer .footer-links a:hover,
  .site-footer .footer-links a:focus-visible {
    color: var(--white);
  }

  .site-footer .footer-bottom {
    flex-wrap: wrap;
    gap: 0.6rem 1rem;
  }

  .site-footer .footer-copy {
    max-width: 100%;
    overflow-wrap: anywhere;
  }

  @media (max-width: 1200px) {
    .site-footer .footer-top {
      grid-template-columns: 1fr 1.2fr;
    }

    .site-footer .footer-contact {
      grid-column: 1 / -1;
      max-width: 520px;
    }

    .site-footer .footer-nav {
      grid-template-columns: repeat(2, minmax(140px, 1fr));
    }
  }

  @media (max-width: 900px) {
    .site-footer .footer-shell {
      width: 80%;
      max-width: 80%;
      min-width: 80%;
      margin: 0 auto;
      padding-left: max(1rem, env(safe-area-inset-left));
      padding-right: max(1rem, env(safe-area-inset-right));
    }

    .site-footer .footer-top {
      grid-template-columns: 1fr;
    }

    .site-footer .footer-nav {
      grid-template-columns: repeat(2, minmax(0, 1fr));
      gap: 0.6rem 1rem;
    }

    .site-footer .footer-contact {
      grid-column: auto;
      max-width: none;
    }

    .site-footer .footer-bottom {
      align-items: flex-start;
      flex-direction: column;
      gap: 0.35rem;
    }

    .site-footer .footer-links a,
    .site-footer .footer-copy,
    .site-footer .footer-support-line {
      word-break: break-word;
      overflow-wrap: anywhere;
    }
  }

  @media (max-width: 640px) {
    .site-footer.cta-band {
      padding-top: var(--space-8);
      padding-bottom: var(--space-5);
    }

    .site-footer .footer-shell {
      width: 80%;
      max-width: 80%;
      min-width: 80%;
      margin: 0 auto;
      padding-left: max(1rem, env(safe-area-inset-left));
      padding-right: max(1rem, env(safe-area-inset-right));
    }

    .site-footer .footer-top {
      gap: 1.25rem;
    }

    .site-footer .footer-nav {
      display: flex;
      flex-wrap: nowrap;
      gap: 0.75rem;
      grid-template-columns: none;
      overflow-x: auto;
      overflow-y: hidden;
      padding-bottom: 0.2rem;
      scrollbar-width: thin;
      -webkit-overflow-scrolling: touch;
    }

    .site-footer .footer-group {
      flex: 0 0 min(42vw, 180px);
    }

    .site-footer .footer-group-heading {
      margin-bottom: 0.15rem;
    }

    .site-footer .footer-links a {
      min-height: 30px;
      display: inline-block;
    }

    .site-footer .footer-cta {
      width: 100%;
    }
  }
</style>

<footer class="site-footer cta-band">
  <div class="footer-shell">
    <div class="footer-top">
      <div class="footer-brand">
        <span class="footer-wordmark">philemmons.net</span>
        <p class="footer-descriptor">Survey Programming &amp; Deployment</p>
        <p class="footer-summary">Cleaner data. More respondents.<br>Built to hold up at scale.</p>
        <a class="btn-primary footer-cta" href="inquiry.php">Send Inquiry</a>
      </div>

      <nav class="footer-nav" aria-label="Footer">
        <div class="footer-group">
          <p class="footer-group-heading">Business</p>
          <ul class="footer-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="services.php">Services</a></li>
            <li><a href="use-cases.php">Use Cases</a></li>
            <li><a href="pricing.php">Pricing</a></li>
          </ul>
        </div>
        <div class="footer-group">
          <p class="footer-group-heading">Company</p>
          <ul class="footer-links">
            <li><a href="about.php">About</a></li>
            <li><a href="inquiry.php">Inquiry</a></li>
          </ul>
        </div>
        <div class="footer-group">
          <p class="footer-group-heading">Resources</p>
          <ul class="footer-links">
            <li><a href="insights.php">Insights</a></li>
            <li><a href="security.php">Security</a></li>
          </ul>
        </div>
        <div class="footer-group">
          <p class="footer-group-heading">Legal</p>
          <ul class="footer-links">
            <li><a href="privacy.php">Privacy Policy</a></li>
            <li><a href="terms.php">Terms of Service</a></li>
            <li><a href="accessibility.php">Accessibility</a></li>
          </ul>
        </div>
      </nav>

      <div class="footer-contact">
        <p class="footer-group-heading">Contact</p>
        <ul class="footer-links footer-contact-links">
          <li>
            <span class="footer-contact-icon" aria-hidden="true">
              <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.38 2 2 0 0 1 3.6 1.18h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.77a16 16 0 0 0 6.29 6.29l.96-.96a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/>
              </svg>
            </span>
            <a href="tel:<?= SITE_TEL; ?>"><?= SITE_PHONE; ?></a>
          </li>
          <li>
            <span class="footer-contact-icon" aria-hidden="true">
              <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect width="20" height="16" x="2" y="4" rx="2"/>
                <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
              </svg>
            </span>
            <a href="mailto:<?= CONTACT_EMAIL; ?>"><?= CONTACT_EMAIL; ?></a>
          </li>
        </ul>
        <p class="footer-support-line">Need survey programming, deployment support, or cleaner research data?</p>
      </div>
    </div>

    <div class="footer-bottom">
      <p class="footer-copy">&copy; <?= date('Y'); ?> survey.philemmons.net All Rights Reserved</p>
      <p class="footer-copy">Survey Programming &amp; Deployment</p>
    </div>
  </div>
</footer>
<div id="sr-announcements" class="sr-only" aria-live="polite" aria-atomic="true"></div>
<script src="js/navigation.js"></script>
<script src="js/motion.js"></script>
<script src="js/forms.js"></script>
</body>
</html>
