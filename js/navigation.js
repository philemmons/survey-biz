"use strict";

/**
 * Purpose:
 * Control responsive primary navigation behavior and keyboard interactions.
 *
 * Responsibilities:
 * - Toggle mobile navigation state and ARIA attributes.
 * - Provide keyboard navigation support and focus management.
 * - Announce menu state changes for assistive technologies.
 *
 * Why:
 * Navigation has accessibility-critical behavior that is easier to reason
 * about when grouped in one dedicated file.
 */
document.addEventListener("DOMContentLoaded", function () {
  /*
  |--------------------------------------------------------------------------
  | Progressive Enhancement Flag
  |--------------------------------------------------------------------------
  | Allows CSS to opt into JS-enhanced nav behavior while preserving no-JS
  | fallbacks.
  */
  document.documentElement.classList.add("js");

  const header = document.querySelector(".site-header");
  const navToggle = document.getElementById("nav-toggle");
  const primaryNavigation = document.getElementById("primary-nav");
  const announcementRegion = document.getElementById("sr-announcements");
  const mobileViewportQuery = window.matchMedia("(max-width: 61.99875rem)");

  /**
   * Pushes short status updates to an aria-live region.
   * Clearing then setting text helps force announcement when repeated messages
   * are similar.
   */
  function announce(message) {
    if (!announcementRegion) {
      return;
    }
    announcementRegion.textContent = "";
    window.setTimeout(function () {
      announcementRegion.textContent = message;
    }, 10);
  }

  /*
  |--------------------------------------------------------------------------
  | Header + Nav State Helpers
  |--------------------------------------------------------------------------
  | Keeps visual state, hidden state, and ARIA state synchronized.
  */
  function updateHeaderScrollState() {
    if (!header) {
      return;
    }

    if (window.scrollY > 12) {
      header.classList.add("is-scrolled");
    } else {
      header.classList.remove("is-scrolled");
    }
  }

  function getNavigationLinks() {
    if (!primaryNavigation) {
      return [];
    }
    return Array.from(primaryNavigation.querySelectorAll("a"));
  }

  /**
   * Apply one canonical navigation state update.
   * Inputs:
   * - isOpen: desired open/closed state.
   * - shouldAnnounce: whether to emit aria-live updates.
   */
  function setNavigationState(isOpen, shouldAnnounce) {
    if (!primaryNavigation || !navToggle) {
      return;
    }

    primaryNavigation.classList.toggle("is-open", isOpen);
    navToggle.setAttribute("aria-expanded", String(isOpen));
    navToggle.setAttribute("aria-label", isOpen ? "Close primary navigation" : "Open primary navigation");

    if (mobileViewportQuery.matches) {
      primaryNavigation.hidden = !isOpen;
    } else {
      primaryNavigation.hidden = false;
    }

    // Announcements are scoped to mobile mode where open/close state changes
    // are meaningful to the current interaction model.
    if (shouldAnnounce && mobileViewportQuery.matches) {
      announce(isOpen ? "Navigation menu opened." : "Navigation menu closed.");
    }
  }

  // Optionally restore focus to the toggle so Escape returns users to their
  // starting control.
  function closeNavigationMenu(returnFocusToToggle) {
    if (!primaryNavigation || !navToggle) {
      return;
    }
    if (!primaryNavigation.classList.contains("is-open")) {
      return;
    }
    setNavigationState(false, true);
    if (returnFocusToToggle) {
      navToggle.focus();
    }
  }

  /**
   * Reconcile nav behavior with viewport mode changes.
   * Mobile uses collapsible navigation; desktop keeps navigation visible.
   */
  function syncNavigationMode() {
    if (!primaryNavigation || !navToggle) {
      return;
    }

    if (mobileViewportQuery.matches) {
      setNavigationState(false, false);
    } else {
      primaryNavigation.classList.remove("is-open");
      primaryNavigation.hidden = false;
      navToggle.setAttribute("aria-expanded", "false");
      navToggle.setAttribute("aria-label", "Open primary navigation");
    }
  }

  /*
  |--------------------------------------------------------------------------
  | Initialization
  |--------------------------------------------------------------------------
  | Ensure header state and nav mode are correct before user interaction.
  */
  updateHeaderScrollState();
  window.addEventListener("scroll", updateHeaderScrollState, { passive: true });

  if (!primaryNavigation || !navToggle) {
    return;
  }

  syncNavigationMode();

  // Support both modern and legacy MediaQueryList listener APIs.
  if (mobileViewportQuery.addEventListener) {
    mobileViewportQuery.addEventListener("change", syncNavigationMode);
  } else if (mobileViewportQuery.addListener) {
    mobileViewportQuery.addListener(syncNavigationMode);
  }

  /*
  |--------------------------------------------------------------------------
  | Interaction Handlers
  |--------------------------------------------------------------------------
  | Mouse and keyboard flows keep ARIA state, visibility, and focus aligned.
  */
  navToggle.addEventListener("click", function () {
    const isOpen = !primaryNavigation.classList.contains("is-open");
    setNavigationState(isOpen, true);
    if (isOpen) {
      const firstLink = getNavigationLinks()[0];
      if (firstLink) {
        firstLink.focus();
      }
    }
  });

  // ArrowDown opens the menu and moves focus into it for keyboard-first users.
  navToggle.addEventListener("keydown", function (event) {
    if (event.key !== "ArrowDown" || !mobileViewportQuery.matches) {
      return;
    }

    event.preventDefault();
    setNavigationState(true, true);
    const firstLink = getNavigationLinks()[0];
    if (firstLink) {
      firstLink.focus();
    }
  });

  document.addEventListener("keydown", function (event) {
    // Escape acts as a universal close action for the mobile menu.
    if (event.key === "Escape") {
      closeNavigationMenu(true);
      return;
    }

    // Left/Right/Home/End support roving focus across nav links.
    if (!["ArrowRight", "ArrowLeft", "Home", "End"].includes(event.key)) {
      return;
    }

    const links = getNavigationLinks();
    const activeIndex = links.indexOf(document.activeElement);
    if (activeIndex === -1) {
      return;
    }

    let nextIndex = activeIndex;
    if (event.key === "ArrowRight") {
      nextIndex = (activeIndex + 1) % links.length;
    } else if (event.key === "ArrowLeft") {
      nextIndex = (activeIndex - 1 + links.length) % links.length;
    } else if (event.key === "Home") {
      nextIndex = 0;
    } else if (event.key === "End") {
      nextIndex = links.length - 1;
    }

    event.preventDefault();
    links[nextIndex].focus();
  });

  // Close on outside click in mobile mode to match dialog-like expectations.
  document.addEventListener("click", function (event) {
    if (!mobileViewportQuery.matches || !primaryNavigation.classList.contains("is-open")) {
      return;
    }

    const clickTarget = event.target;
    if (clickTarget instanceof Node && !header.contains(clickTarget)) {
      closeNavigationMenu(false);
    }
  });

  // After choosing a link on mobile, close the menu to reduce extra tab stops.
  primaryNavigation.addEventListener("click", function (event) {
    if (!mobileViewportQuery.matches) {
      return;
    }
    if (!(event.target instanceof Element) || !event.target.closest("a")) {
      return;
    }
    closeNavigationMenu(false);
  });
});
