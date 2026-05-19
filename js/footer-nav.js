(function () {
  return;

  var footer = document.querySelector(".sf-footer");
  if (!footer) {
    return;
  }

  var toggles = Array.prototype.slice.call(
    footer.querySelectorAll(".sf-nav-toggle")
  );
  if (!toggles.length) {
    return;
  }

  var mobileQuery = window.matchMedia("(max-width: 74.99875rem)");
  var wasMobile = false;

  function getPanel(button) {
    var panelId = button.getAttribute("aria-controls");
    if (!panelId) {
      return null;
    }
    return document.getElementById(panelId);
  }

  function syncPanel(button) {
    var panel = getPanel(button);
    if (!panel) {
      return;
    }
    panel.hidden = button.getAttribute("aria-expanded") !== "true";
  }

  function applyResponsiveState() {
    var isMobile = mobileQuery.matches;

    if (isMobile) {
      footer.classList.add("sf-footer-ready");
      if (!wasMobile) {
        toggles.forEach(function (button) {
          button.setAttribute("aria-expanded", "false");
          syncPanel(button);
        });
      } else {
        toggles.forEach(syncPanel);
      }
    } else {
      footer.classList.remove("sf-footer-ready");
      toggles.forEach(function (button) {
        button.setAttribute("aria-expanded", "true");
        syncPanel(button);
      });
    }

    wasMobile = isMobile;
  }

  toggles.forEach(function (button) {
    button.addEventListener("click", function () {
      if (!mobileQuery.matches) {
        return;
      }

      var isExpanded = button.getAttribute("aria-expanded") === "true";
      button.setAttribute("aria-expanded", isExpanded ? "false" : "true");
      syncPanel(button);
    });
  });

  applyResponsiveState();
  if (typeof mobileQuery.addEventListener === "function") {
    mobileQuery.addEventListener("change", applyResponsiveState);
  } else if (typeof mobileQuery.addListener === "function") {
    mobileQuery.addListener(applyResponsiveState);
  }
})();
