"use strict";

/**
 * Purpose:
 * Handle motion, focus, and scroll behaviors shared across pages.
 *
 * Responsibilities:
 * - Respect reduced-motion user preferences.
 * - Manage focus for in-page navigation and error recovery.
 * - Run reveal and counter animations when elements enter the viewport.
 *
 * Why:
 * Separating these behaviors keeps accessibility-sensitive interaction logic
 * out of page templates and easier to maintain consistently.
 */
document.addEventListener("DOMContentLoaded", function () {
  /*
  |--------------------------------------------------------------------------
  | Motion Preference
  |--------------------------------------------------------------------------
  | Capture reduced-motion once and reuse it across all animation behavior.
  */
  const prefersReducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  /**
   * Move focus to a target element without forcing an abrupt scroll jump.
   * If the element is not naturally focusable, a temporary tabindex is added
   * and removed on blur to preserve clean semantics.
   */
  function moveFocusToElement(targetElement) {
    if (!(targetElement instanceof HTMLElement)) {
      return;
    }

    const hadTabIndex = targetElement.hasAttribute("tabindex");
    if (!hadTabIndex) {
      targetElement.setAttribute("tabindex", "-1");
    }
    targetElement.focus({ preventScroll: true });

    if (!hadTabIndex) {
      targetElement.addEventListener(
        "blur",
        function () {
          targetElement.removeAttribute("tabindex");
        },
        { once: true }
      );
    }
  }

  /*
  |--------------------------------------------------------------------------
  | Error Summary Focus
  |--------------------------------------------------------------------------
  | On postback with validation errors, move focus to the summary container
  | so assistive technologies announce the error context immediately.
  */
  const errorSummary = document.getElementById("form-errors");
  if (errorSummary) {
    moveFocusToElement(errorSummary);
  }

  /*
  |--------------------------------------------------------------------------
  | Anchor Navigation Enhancement
  |--------------------------------------------------------------------------
  | Replaces default jump links with smooth scrolling when allowed and then
  | explicitly transfers focus to the target for keyboard/screen-reader flow.
  */
  document.querySelectorAll("a[href^='#']").forEach(function (anchor) {
    anchor.addEventListener("click", function (event) {
      const anchorHref = anchor.getAttribute("href");
      if (!anchorHref || anchorHref.length < 2) {
        return;
      }

      const anchorTargetElement = document.querySelector(anchorHref);
      if (!anchorTargetElement) {
        return;
      }

      event.preventDefault();
      anchorTargetElement.scrollIntoView({ behavior: prefersReducedMotion ? "auto" : "smooth", block: "start" });
      moveFocusToElement(anchorTargetElement);
    });
  });

  /*
  |--------------------------------------------------------------------------
  | Reveal-on-Scroll Animation
  |--------------------------------------------------------------------------
  | Uses IntersectionObserver for efficient viewport-triggered transitions.
  | Falls back to immediate visibility for unsupported browsers or reduced
  | motion users.
  */
  const revealItems = document.querySelectorAll("[data-reveal]");
  if (!prefersReducedMotion && "IntersectionObserver" in window && revealItems.length > 0) {
    const revealObserver = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (!entry.isIntersecting) {
            return;
          }
          entry.target.classList.add("is-visible");
          revealObserver.unobserve(entry.target);
        });
      },
      { rootMargin: "0px 0px -8% 0px", threshold: 0.15 }
    );

    revealItems.forEach(function (item) {
      item.classList.add("reveal");
      // Clamp optional data-reveal-delay so one element cannot stall layout.
      const revealDelay = Math.min(240, item.dataset.revealDelay ? Number(item.dataset.revealDelay) : 0);
      if (Number.isFinite(revealDelay) && revealDelay > 0) {
        item.style.transitionDelay = revealDelay + "ms";
      }
      revealObserver.observe(item);

      const children = item.querySelectorAll(".feature-card, .icon-card, .post-card, .panel");
      children.forEach(function (child, index) {
        child.style.transitionDelay = Math.min(index * 35, 140) + "ms";
      });
    });
  } else {
    revealItems.forEach(function (item) {
      item.classList.add("is-visible");
    });
  }

  const counters = document.querySelectorAll("[data-count-to]");
  if (counters.length === 0) {
    return;
  }

  /**
   * Animate numeric counters with ease-out timing for a more natural finish.
   * Input assumptions:
   * - data-count-to is a positive number.
   * - optional data-prefix/suffix are display-only strings.
   */
  const animateCounterValue = function (counterElement) {
    const goal = Number(counterElement.getAttribute("data-count-to"));
    const duration = 1100;
    const suffix = counterElement.getAttribute("data-suffix") || "";
    const prefix = counterElement.getAttribute("data-prefix") || "";

    if (!Number.isFinite(goal) || goal <= 0 || prefersReducedMotion) {
      return;
    }

    const startedAt = performance.now();

    const renderFrame = function (now) {
      const progress = Math.min((now - startedAt) / duration, 1);
      // Cubic ease-out front-loads motion and slows near completion.
      const eased = 1 - Math.pow(1 - progress, 3);
      const value = Math.floor(goal * eased);
      counterElement.textContent = prefix + value.toLocaleString() + suffix;
      if (progress < 1) {
        requestAnimationFrame(renderFrame);
      }
    };

    requestAnimationFrame(renderFrame);
  };

  /*
  |--------------------------------------------------------------------------
  | Counter Triggering
  |--------------------------------------------------------------------------
  | Start counters only when visible to avoid offscreen work and ensure users
  | see the full animation.
  */
  if ("IntersectionObserver" in window && !prefersReducedMotion) {
    const counterObserver = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (!entry.isIntersecting) {
            return;
          }
          animateCounterValue(entry.target);
          counterObserver.unobserve(entry.target);
        });
      },
      { threshold: 0.5 }
    );

    counters.forEach(function (counter) {
      counterObserver.observe(counter);
    });
  } else {
    counters.forEach(function (counter) {
      animateCounterValue(counter);
    });
  }
});
