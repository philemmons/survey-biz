"use strict";

/**
 * Keep reset confirmation global because inquiry.php uses inline onclick.
 * Returns true to continue native reset behavior, false to cancel.
 */
window.resetFields = function () {
  return window.confirm("Are you sure you want to reset this form?");
};

/**
 * Purpose:
 * Provide client-side validation UX for the inquiry form.
 *
 * Responsibilities:
 * - Validate required fields on blur/input/submit.
 * - Keep field-level and summary errors synchronized.
 * - Expose validation state with accessible ARIA attributes.
 *
 * Why:
 * Client-side checks provide immediate feedback and reduce avoidable
 * round-trips; server-side validation remains authoritative.
 */
document.addEventListener("DOMContentLoaded", function () {
  const inquiryForm = document.querySelector("form.form-shell");
  if (!(inquiryForm instanceof HTMLFormElement)) {
    return;
  }

  /*
  |--------------------------------------------------------------------------
  | Field Rules
  |--------------------------------------------------------------------------
  | Centralizes selectors and validation rules so behavior stays consistent
  | across blur/input/submit flows.
  */
  const fieldConfigByName = {
    name: {
      input: inquiryForm.querySelector("#name"),
      error: inquiryForm.querySelector("#name-error"),
      validate: function (value) {
        return value.trim() === "" ? "Please enter your name." : "";
      },
    },
    email: {
      input: inquiryForm.querySelector("#email"),
      error: inquiryForm.querySelector("#email-error"),
      validate: function (value) {
        const trimmed = value.trim();
        if (trimmed === "") {
          return "Please enter your email address.";
        }
        // Practical email format check for UX only; server validation enforces
        // final acceptance/security requirements.
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(trimmed) ? "" : "Please enter a valid email address.";
      },
    },
    description: {
      input: inquiryForm.querySelector("#description"),
      error: inquiryForm.querySelector("#description-error"),
      validate: function (value) {
        return value.trim() === "" ? "Please describe your study goals and requirements." : "";
      },
    },
    subject: {
      input: inquiryForm.querySelector("#subject"),
      error: inquiryForm.querySelector("#subject-error"),
      validate: function (value) {
        return value.trim() === "" ? "Please enter a subject." : "";
      },
    },
  };

  const validationDebounceTimerByField = {};

  /*
  |--------------------------------------------------------------------------
  | Validation Helpers
  |--------------------------------------------------------------------------
  | Handles field-level error rendering and summary generation.
  */
  // Update error text + ARIA invalid state in one place to avoid drift.
  function setFieldError(fieldName, message) {
    const fieldConfig = fieldConfigByName[fieldName];
    if (!fieldConfig || !(fieldConfig.input instanceof HTMLElement) || !(fieldConfig.error instanceof HTMLElement)) {
      return;
    }

    fieldConfig.error.textContent = message;
    if (message) {
      fieldConfig.input.setAttribute("aria-invalid", "true");
    } else {
      fieldConfig.input.removeAttribute("aria-invalid");
    }
  }

  /**
   * Validate one configured field by name.
   * Returns the current message (empty string means valid) so submit logic
   * can aggregate errors without duplicating validation rules.
   */
  function validateField(fieldName) {
    const fieldConfig = fieldConfigByName[fieldName];
    if (!fieldConfig || !(fieldConfig.input instanceof HTMLInputElement || fieldConfig.input instanceof HTMLTextAreaElement)) {
      return "";
    }

    const message = fieldConfig.validate(fieldConfig.input.value);
    setFieldError(fieldName, message);
    return message;
  }

  /**
   * Render or update a summary list of client-side validation errors.
   * Focus moves to this container so keyboard and screen-reader users receive
   * immediate context after a blocked submit.
   */
  function renderClientValidationSummary(validationErrorsByField) {
    let errorSummary = inquiryForm.querySelector("#form-errors");
    if (!errorSummary) {
      errorSummary = document.createElement("div");
      errorSummary.id = "form-errors";
      errorSummary.className = "alert alert-danger";
      errorSummary.setAttribute("role", "alert");
      errorSummary.setAttribute("tabindex", "-1");
      inquiryForm.insertBefore(errorSummary, inquiryForm.firstElementChild.nextElementSibling);
    }

    errorSummary.textContent = "";

    const intro = document.createElement("p");
    intro.className = "mb-2";
    // Static markup string (not user-provided), safe to inject as HTML.
    intro.innerHTML = "<strong>Please correct the following:</strong>";
    errorSummary.appendChild(intro);

    const list = document.createElement("ul");
    list.className = "error-summary-list";
    Object.keys(validationErrorsByField).forEach(function (fieldName) {
      const listItem = document.createElement("li");
      const link = document.createElement("a");
      link.href = "#" + fieldName;
      link.textContent = validationErrorsByField[fieldName];
      listItem.appendChild(link);
      list.appendChild(listItem);
    });
    errorSummary.appendChild(list);

    errorSummary.focus();
  }

  /**
   * Reset all client-side validation UI so form state matches cleared inputs.
   */
  function clearClientValidationState() {
    Object.keys(fieldConfigByName).forEach(function (fieldName) {
      setFieldError(fieldName, "");
    });

    const errorSummary = inquiryForm.querySelector("#form-errors");
    if (errorSummary) {
      errorSummary.remove();
    }
  }

  /*
  |--------------------------------------------------------------------------
  | Live Field Validation
  |--------------------------------------------------------------------------
  | Blur validates immediately; input validates after a short debounce so
  | users are not interrupted on every keystroke.
  */
  Object.keys(fieldConfigByName).forEach(function (fieldName) {
    const fieldConfig = fieldConfigByName[fieldName];
    if (!(fieldConfig.input instanceof HTMLElement)) {
      return;
    }

    fieldConfig.input.addEventListener("blur", function () {
      validateField(fieldName);
    });

    fieldConfig.input.addEventListener("input", function () {
      if (validationDebounceTimerByField[fieldName]) {
        window.clearTimeout(validationDebounceTimerByField[fieldName]);
      }

      // Debounce avoids noisy rapid-fire validation while typing.
      validationDebounceTimerByField[fieldName] = window.setTimeout(function () {
        validateField(fieldName);
      }, 250);
    });
  });

  /*
  |--------------------------------------------------------------------------
  | Submit Gate
  |--------------------------------------------------------------------------
  | Prevent form submission only when client-side checks fail; server-side
  | validation still runs for all accepted requests.
  */
  inquiryForm.addEventListener("submit", function (event) {
    const submitValidationErrors = {};

    Object.keys(fieldConfigByName).forEach(function (fieldName) {
      const message = validateField(fieldName);
      if (message) {
        submitValidationErrors[fieldName] = message;
      }
    });

    if (Object.keys(submitValidationErrors).length > 0) {
      event.preventDefault();
      renderClientValidationSummary(submitValidationErrors);
    }
  });

  inquiryForm.addEventListener("reset", function () {
    // Wait until browser applies native reset values, then clear UX state.
    window.setTimeout(function () {
      clearClientValidationState();
    }, 0);
  });
});
