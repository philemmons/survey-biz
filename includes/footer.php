<footer class="site-footer">
  <div class="container">
    <div class="footer-inner">
      <div class="footer-brand">
        <p class="footer-brand-title">Survey Programming &amp; Deployment</p>
        <p class="footer-summary">Survey programming and deployment built to collect cleaner data, reach more respondents, and hold up at scale.</p>
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
          <p class="footer-group-heading">Trust</p>
          <ul class="footer-links">
            <li><a href="privacy.php">Privacy Policy</a></li>
            <li><a href="terms.php">Terms of Service</a></li>
            <li><a href="accessibility.php">Accessibility Statement</a></li>
          </ul>
        </div>
      </nav>

      <div class="footer-contact">
        <p class="footer-group-heading">Contact</p>
        <ul class="footer-links footer-contact-links">
          <li><a href="tel:<?= SITE_TEL; ?>">Call <?= SITE_PHONE; ?></a></li>
          <li><a href="mailto:<?= CONTACT_EMAIL; ?>">Email <?= CONTACT_EMAIL; ?></a></li>
          <li><a href="inquiry.php">Go to Inquiry page</a></li>
        </ul>
        <p class="footer-support-line">Need survey programming, deployment support, or cleaner research data? Send an inquiry.</p>
        <a class="btn-primary footer-cta" href="inquiry.php">Send Inquiry</a>
      </div>
    </div>

    <p class="footer-copy">&copy; <?= date('Y'); ?> survey.philemmons.net</p>
  </div>
</footer>
<div id="sr-announcements" class="sr-only" aria-live="polite" aria-atomic="true"></div>
<script src="js/navigation.js"></script>
<script src="js/motion.js"></script>
<script src="js/forms.js"></script>
</body>
</html>
