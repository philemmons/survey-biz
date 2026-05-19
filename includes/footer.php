<footer class="site-footer cta-band sf-footer">

  <div class="container sf-inner">
    <div class="sf-top">

      <div class="sf-brand">
        <span class="sf-wordmark">philemmons.net</span>
        <p class="sf-descriptor">Ready to launch a better survey experience?</p>
        <p class="sf-cta mt-4"><a href="/inquiry.php">Let's discuss your questionnaire, timeline, fielding goals, and business needs.</a></p>
      </div>

      <nav class="sf-nav" aria-label="Footer navigation">
        <div class="sf-col">
          <button class="sf-nav-toggle" type="button" aria-expanded="true" aria-controls="sf-panel-business">
            <span class="sf-col-head">Business</span>
            <span class="sf-nav-indicator" aria-hidden="true"></span>
          </button>
          <div class="sf-nav-panel" id="sf-panel-business">
            <ul>
              <li><a href="/">Home</a></li>
              <li><a href="/services.php">Services</a></li>
              <li><a href="/use-cases.php">Use Cases</a></li>
              <li><a href="/pricing.php">Pricing</a></li>
            </ul>
          </div>
        </div>

        <div class="sf-col">
          <button class="sf-nav-toggle" type="button" aria-expanded="true" aria-controls="sf-panel-company">
            <span class="sf-col-head">Company</span>
            <span class="sf-nav-indicator" aria-hidden="true"></span>
          </button>
          <div class="sf-nav-panel" id="sf-panel-company">
            <ul>
              <li><a href="/about.php">About</a></li>
              <li><a href="/inquiry.php">Inquiry</a></li>
            </ul>
          </div>
        </div>

        <div class="sf-col">
          <button class="sf-nav-toggle" type="button" aria-expanded="true" aria-controls="sf-panel-resources">
            <span class="sf-col-head">Resources</span>
            <span class="sf-nav-indicator" aria-hidden="true"></span>
          </button>
          <div class="sf-nav-panel" id="sf-panel-resources">
            <ul>
              <li><a href="/insights.php">Insights</a></li>
              <li><a href="/security.php">Security</a></li>
            </ul>
          </div>
        </div>

        <div class="sf-col">
          <button class="sf-nav-toggle" type="button" aria-expanded="true" aria-controls="sf-panel-legal">
            <span class="sf-col-head">Legal</span>
            <span class="sf-nav-indicator" aria-hidden="true"></span>
          </button>
          <div class="sf-nav-panel" id="sf-panel-legal">
            <ul>
              <li><a href="/privacy.php">Privacy Policy</a></li>
              <li><a href="/terms.php">Terms of Service</a></li>
              <li><a href="/accessibility.php">Accessibility Statement</a></li>
            </ul>
          </div>
        </div>
      </nav>


      <div class="sf-contact">
        <p class="sf-col-head">Contact</p>
        <ul class="sf-contact-list">
          <li>
            <span class="sf-contact-icon" aria-hidden="true">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.38 2 2 0 0 1 3.6 1.18h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.77a16 16 0 0 0 6.29 6.29l.96-.96a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"></path>
              </svg>
            </span>
            <a href="tel:<?= SITE_TEL; ?>"><?= SITE_PHONE; ?></a>
          </li>
          <li>
            <span class="sf-contact-icon" aria-hidden="true">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
              </svg>
            </span>
            <a href="mailto:<?= CONTACT_EMAIL; ?>"><?= CONTACT_EMAIL; ?></a>
          </li>
        </ul>
        <p class="sf-support">Cleaner data. More respondents. Built to hold up at scale.</p>
      </div>
    </div>

    <div class="sf-bottom">
      <p class="sf-copy">&copy; <?php echo date("Y"); ?> philemmons.net All Rights Reserved.</p>
    </div>

  </div>

</footer>

<div id="sr-announcements" class="sr-only" aria-live="polite" aria-atomic="true"></div>
<script src="js/navigation.js"></script>
<script src="js/motion.js"></script>
<script src="js/forms.js"></script>
<script src="js/footer-nav.js"></script>
</body>

</html>