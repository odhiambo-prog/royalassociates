<?php
if (!defined('ABSPATH')) exit;

define('ROYAL_SHEPHERD_VERSION', '1.0.0');

function royal_shepherd_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption']);

    register_nav_menus([
        'primary' => __('Primary Menu', 'royal-shepherd'),
    ]);
}
add_action('after_setup_theme', 'royal_shepherd_setup');

add_filter('show_admin_bar', '__return_false');

function royal_shepherd_document_title($title) {
    global $pageTitle;
    if (!empty($pageTitle)) {
        return $pageTitle;
    }
    return $title;
}
add_filter('pre_get_document_title', 'royal_shepherd_document_title', 999);
add_filter('wpseo_title', 'royal_shepherd_document_title', 999);

/**
 * Prevent WordPress from redirecting /blog/<slug> URLs via redirect_canonical.
 * Without this, WP strips the /blog/ prefix and redirects to /<slug>/, which 404s.
 */
add_filter('redirect_canonical', function ($redirect_url, $requested_url) {
    if (strpos(parse_url($requested_url, PHP_URL_PATH), '/blog/') !== false) {
        return false;
    }
    return $redirect_url;
}, 10, 2);

/**
 * Override template for pages whose URLs conflict with CPT or post archives.
 * e.g. /products/ is hijacked by the "product" CPT, /blog/ by the post archive.
 */
function royal_shepherd_template_override($template) {
    $request = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    $theme_dir = get_template_directory();

    $overrides = [
        'products' => $theme_dir . '/page-products.php',
        'blog'     => $theme_dir . '/page-blog.php',
    ];

    if (isset($overrides[$request]) && file_exists($overrides[$request])) {
        return $overrides[$request];
    }

    if (preg_match('#^blog/.+#', $request)) {
        $single = $theme_dir . '/single.php';
        if (file_exists($single)) {
            return $single;
        }
    }

    return $template;
}
add_filter('template_include', 'royal_shepherd_template_override', 99);

/**
 * Auto-create Gravity Forms on admin init if they don't exist.
 */
function royal_shepherd_contact_form_definition() {
    return array(
        'title' => 'Contact Form',
        'description' => '',
        'labelPlacement' => 'top_label',
        'descriptionPlacement' => 'above',
        'button' => array('type' => 'text', 'text' => 'Submit'),
        'fields' => array(
            array('id' => 1, 'type' => 'text', 'label' => 'First name', 'isRequired' => true, 'placeholder' => 'First name*', 'size' => 'large'),
            array('id' => 2, 'type' => 'text', 'label' => 'Last name', 'isRequired' => true, 'placeholder' => 'Last name*', 'size' => 'large'),
            array('id' => 3, 'type' => 'email', 'label' => 'Email', 'isRequired' => true, 'placeholder' => 'Email*', 'size' => 'large'),
            array('id' => 4, 'type' => 'phone', 'label' => 'Phone', 'isRequired' => true, 'placeholder' => 'Phone*', 'size' => 'large'),
            array('id' => 5, 'type' => 'textarea', 'label' => 'Message', 'isRequired' => true, 'placeholder' => 'Message*', 'size' => 'large'),
            array(
                'id' => 6, 'type' => 'checkbox', 'label' => 'Privacy consent', 'isRequired' => true,
                'choices' => array(
                    array('text' => 'By submitting this form, you agree to the processing of your personal data by Royal Associates Insurance Brokers as described in our Privacy Policy.', 'value' => 'Consent given'),
                ),
            ),
        ),
        'notifications' => array(
            array(
                'id' => 'notif_contact', 'to' => 'info@royalassociates.co.ke', 'name' => 'Admin Notification',
                'event' => 'form_submission', 'toType' => 'email',
                'subject' => 'New Contact Form submission from {First name:1} {Last name:2}',
                'message' => '{all_fields}',
            ),
        ),
        'confirmations' => array(
            array(
                'id' => 'confirm_contact', 'name' => 'Default Confirmation', 'type' => 'message',
                'message' => 'Thank you for contacting us. We will get back to you within 48 hours.',
            ),
        ),
    );
}

function royal_shepherd_quote_form_definition() {
    return array(
        'title' => 'Get a Quote',
        'description' => '',
        'labelPlacement' => 'top_label',
        'descriptionPlacement' => 'above',
        'button' => array('type' => 'text', 'text' => 'Submit'),
        'fields' => array(
            array('id' => 1, 'type' => 'text', 'label' => 'First name', 'isRequired' => true, 'placeholder' => 'First name*', 'size' => 'large'),
            array('id' => 2, 'type' => 'text', 'label' => 'Last name', 'isRequired' => true, 'placeholder' => 'Last name*', 'size' => 'large'),
            array('id' => 3, 'type' => 'email', 'label' => 'Email', 'isRequired' => true, 'placeholder' => 'Email*', 'size' => 'large'),
            array('id' => 4, 'type' => 'phone', 'label' => 'Phone', 'isRequired' => true, 'placeholder' => 'Phone*', 'size' => 'large'),
            array('id' => 5, 'type' => 'text', 'label' => 'Product', 'isRequired' => false, 'placeholder' => 'Product', 'size' => 'large', 'cssClass' => 'gf-product-field'),
            array('id' => 6, 'type' => 'textarea', 'label' => 'Message', 'isRequired' => false, 'placeholder' => 'Message (optional)', 'size' => 'large'),
        ),
        'notifications' => array(
            array(
                'id' => 'notif_quote', 'to' => 'info@royalassociates.co.ke', 'name' => 'Admin Notification',
                'event' => 'form_submission', 'toType' => 'email',
                'subject' => 'New Quote request from {First name:1} {Last name:2}',
                'message' => '{all_fields}',
            ),
        ),
        'confirmations' => array(
            array(
                'id' => 'confirm_quote', 'name' => 'Default Confirmation', 'type' => 'message',
                'message' => 'Thank you for your inquiry. Our team will get back to you shortly.',
            ),
        ),
    );
}

function royal_shepherd_create_forms() {
    if (!class_exists('GFAPI') || defined('DOING_AJAX')) return;

    $existing = GFAPI::get_forms();
    $titles = array_map(function($f) { return $f['title']; }, $existing);

    if (!in_array('Contact Form', $titles)) {
        GFAPI::add_form(royal_shepherd_contact_form_definition());
    }
    if (!in_array('Get a Quote', $titles)) {
        GFAPI::add_form(royal_shepherd_quote_form_definition());
    }
}
add_action('admin_init', 'royal_shepherd_create_forms');

/**
 * Repair the Contact Form's privacy-consent checkbox.
 *
 * The checkbox field stored in the database is missing its `inputs` array.
 * Gravity Forms needs one input per choice (with dotted ids such as 6.1) for a
 * checkbox to render and validate correctly. Without it a *required* consent
 * checkbox always validates as empty ("This field is required.") and the value
 * is never saved. This routine regenerates the missing inputs from the field's
 * choices and persists the corrected form once.
 */
function royal_shepherd_repair_consent_checkbox() {
    if (!class_exists('GFAPI') || defined('DOING_AJAX')) {
        return;
    }
    foreach (GFAPI::get_forms() as $form) {
        if (empty($form['fields']) || $form['title'] !== 'Contact Form') {
            continue;
        }
        $needs_repair = false;
        foreach ($form['fields'] as &$field) {
            if ($field->type !== 'checkbox') {
                continue;
            }
            $has_inputs = !empty($field->inputs) && is_array($field->inputs);
            if (!$has_inputs && !empty($field->choices)) {
                $inputs = array();
                $index = 1;
                foreach ($field->choices as $choice) {
                    $inputs[] = array(
                        'id'    => $field->id . '.' . $index,
                        'label' => rgar($choice, 'text'),
                        'name'  => '',
                    );
                    $index++;
                }
                $field->inputs = $inputs;
                $needs_repair = true;
            }
        }
        unset($field);
        if ($needs_repair) {
            GFAPI::update_form($form);
        }
    }
}
add_action('wp_loaded', 'royal_shepherd_repair_consent_checkbox', 20);
add_action('admin_init', 'royal_shepherd_repair_consent_checkbox', 20);

/**
 * Safety net for the consent checkbox: even if GF misreads the posted value
 * (dotted vs. underscore input name), accept the submission when the consent
 * choice was actually posted, and store it correctly.
 */
function royal_shepherd_consent_validation($result, $value, $form, $field) {
    if ($field->type !== 'checkbox' || empty($field->isRequired)) {
        return $result;
    }
    $posted = false;
    if (!empty($field->inputs) && is_array($field->inputs)) {
        foreach ($field->inputs as $input) {
            $raw = isset($_POST['input_' . $input['id']]) ? $_POST['input_' . $input['id']] : null;
            if (is_string($raw) && trim($raw) !== '') {
                $posted = true;
                break;
            }
        }
    } else {
        $raw = isset($_POST['input_' . $field->id]) ? $_POST['input_' . $field->id] : null;
        $posted = (is_string($raw) && trim($raw) !== '');
    }
    if ($posted) {
        $result['is_valid'] = true;
        $result['message'] = '';
    }
    return $result;
}

function royal_shepherd_consent_save_value($value, $entry, $field, $form, $input_id) {
    if ($field->type !== 'checkbox') {
        return $value;
    }
    if (is_array($value) && count(array_filter($value)) > 0) {
        return $value;
    }
    if (!empty($field->inputs) && is_array($field->inputs)) {
        $recovered = array();
        foreach ($field->inputs as $input) {
            $raw = isset($_POST['input_' . $input['id']]) ? $_POST['input_' . $input['id']] : '';
            $recovered[strval($input['id'])] = is_string($raw) ? $raw : '';
        }
        if (count(array_filter($recovered)) > 0) {
            return $recovered;
        }
    }
    return $value;
}

if (class_exists('GFAPI')) {
    foreach (GFAPI::get_forms() as $form) {
        if ($form['title'] !== 'Contact Form') {
            continue;
        }
        foreach ($form['fields'] as $field) {
            if ($field->type === 'checkbox') {
                add_filter(
                    'gform_field_validation_' . $form['id'] . '_' . $field->id,
                    'royal_shepherd_consent_validation',
                    10,
                    4
                );
                add_filter(
                    'gform_save_field_value_' . $form['id'] . '_' . $field->id,
                    'royal_shepherd_consent_save_value',
                    10,
                    5
                );
            }
        }
    }
}

/**
 * Serve /assets/* static files from the theme directory.
 * The physical symlink at the WP root handles most cases;
 * this filter serves as a fallback for environments without symlink support.
 */
function royal_shepherd_serve_assets($continue, $wp, $query) {
    $request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    if (preg_match('#^/assets/(.+)$#', $request, $m)) {
        $file = get_template_directory() . '/assets/' . $m[1];
        if (file_exists($file)) {
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $mime_types = [
                'css' => 'text/css',
                'js'  => 'application/javascript',
                'jpg' => 'image/jpeg',
                'jpeg'=> 'image/jpeg',
                'png' => 'image/png',
                'gif' => 'image/gif',
                'webp'=> 'image/webp',
                'svg' => 'image/svg+xml',
                'ico' => 'image/x-icon',
                'mp4' => 'video/mp4',
                'woff'=> 'font/woff',
                'woff2'=> 'font/woff2',
                'ttf' => 'font/ttf',
                'otf' => 'font/otf',
            ];
            if (isset($mime_types[$ext])) {
                header('Content-Type: ' . $mime_types[$ext]);
            }
            readfile($file);
            exit;
        }
    }
    return $continue;
}
add_filter('do_parse_request', 'royal_shepherd_serve_assets', 10, 3);

/**
 * Site-wide styled toast + Gravity Forms AJAX confirmation handling.
 *
 * Any Gravity Form rendered with AJAX enabled (contact form, quote modal, etc.)
 * will, on successful submission, surface its confirmation message as a styled
 * toast on top of the page instead of replacing the form in place. The empty
 * form is then restored so the visitor can submit again with no page reload.
 *
 * This lives in the footer (after jQuery + Gravity Forms scripts) so the
 * gform_confirmation_loaded event is guaranteed to be bindable.
 */
function royal_shepherd_toast_markup() {
    ?>
<div id="royal-toast-region" class="royal-toast-region" role="status" aria-live="polite" aria-atomic="true"></div>
<style>
.royal-toast-region{position:fixed;z-index:100000;top:1.25rem;right:1.25rem;display:flex;flex-direction:column;gap:0.75rem;pointer-events:none;max-width:min(24rem,calc(100vw - 2rem))}
.royal-toast{pointer-events:auto;display:flex;align-items:flex-start;gap:0.75rem;background:#fff;color:#1d2130;border-left:4px solid #16a34a;box-shadow:0 12px 30px rgba(29,33,48,0.18),0 4px 10px rgba(29,33,48,0.10);border-radius:0.5rem;padding:1rem 1.1rem;transform:translateX(120%);opacity:0;transition:transform .4s cubic-bezier(0.22,1,0.36,1),opacity .4s ease}
.royal-toast.is-visible{transform:translateX(0);opacity:1}
.royal-toast.is-error{border-left-color:#dc2626}
.royal-toast__icon{flex:none;width:1.4rem;height:1.4rem;border-radius:50%;display:flex;align-items:center;justify-content:center;color:#fff;background:#16a34a;font-weight:700;font-size:0.9rem;line-height:1;margin-top:0.05rem}
.royal-toast.is-error .royal-toast__icon{background:#dc2626}
.royal-toast__body{flex:1 1 auto;min-width:0}
.royal-toast__title{font-weight:700;font-size:0.95rem;color:#2A2D8A;margin:0 0 0.15rem}
.royal-toast.is-error .royal-toast__title{color:#dc2626}
.royal-toast__msg{font-size:0.88rem;line-height:1.5;color:#475569;margin:0}
.royal-toast__msg *{margin:0}
.royal-toast__close{flex:none;background:none;border:none;color:#9aa0b3;font-size:1.15rem;line-height:1;cursor:pointer;padding:0;margin-left:0.25rem}
.royal-toast__close:hover{color:#2A2D8A}
/* Hide the in-place GF confirmation everywhere — the toast handles feedback. */
.gform_confirmation_wrapper{position:absolute!important;width:1px;height:1px;overflow:hidden;clip:rect(0 0 0 0);white-space:nowrap}
.gform_ajax_spinner{display:none!important}
.gform_button.submitting{background:#94a3b8!important;color:#fff!important}
@media (max-width:600px){
  .royal-toast-region{left:1rem;right:1rem;top:auto;bottom:1rem;max-width:none}
  .royal-toast{transform:translateY(120%)}
}
@media (prefers-reduced-motion: reduce){
  .royal-toast{transition:none;transform:none}
}
</style>
<script>
(function () {
  if (window.__royalToastInit) { return; }
  window.__royalToastInit = true;

  // Toasts render the message as plain TEXT (textContent), never innerHTML, so a
  // confirmation that ever includes submitted field values (GF merge tags such
  // as {Message:5}) cannot inject markup/script into the confirming user's page.
  window.royalToast = function (message, type) {
    var region = document.getElementById('royal-toast-region');
    if (!region) { return; }
    var isError = type === 'error';
    var toast = document.createElement('div');
    toast.className = 'royal-toast' + (isError ? ' is-error' : '');
    toast.setAttribute('role', isError ? 'alert' : 'status');

    var icon = document.createElement('span');
    icon.className = 'royal-toast__icon';
    icon.setAttribute('aria-hidden', 'true');
    icon.textContent = isError ? '!' : '\u2713';

    var body = document.createElement('div');
    body.className = 'royal-toast__body';
    var title = document.createElement('p');
    title.className = 'royal-toast__title';
    title.textContent = isError ? 'Something went wrong' : 'Message sent';
    var msg = document.createElement('div');
    msg.className = 'royal-toast__msg';
    msg.textContent = message;
    body.appendChild(title);
    body.appendChild(msg);

    var close = document.createElement('button');
    close.type = 'button';
    close.className = 'royal-toast__close';
    close.setAttribute('aria-label', 'Dismiss');
    close.innerHTML = '&times;';

    toast.appendChild(icon);
    toast.appendChild(body);
    toast.appendChild(close);
    region.appendChild(toast);

    requestAnimationFrame(function () { toast.classList.add('is-visible'); });

    var timer = setTimeout(dismiss, 7000);
    function dismiss() {
      clearTimeout(timer);
      toast.classList.remove('is-visible');
      setTimeout(function () { if (toast.parentNode) { toast.parentNode.removeChild(toast); } }, 450);
    }
    close.addEventListener('click', dismiss);
  };

  /* Snapshot each form's pristine markup so we can restore an empty form after
   * an AJAX submission (no page reload -> no "confirm form resubmission"). */
  var pristineForms = {};

  function snapshotForms() {
    var wrappers = document.querySelectorAll('.gform_wrapper');
    for (var i = 0; i < wrappers.length; i++) {
      var id = (wrappers[i].id || '').replace('gform_wrapper_', '');
      if (id && pristineForms[id] === undefined) {
        pristineForms[id] = wrappers[i].outerHTML;
      }
    }
  }

  /* Restore the pristine empty form. Because GF replaces the wrapper with the
   * confirmation, we look up the confirmation node and swap the saved wrapper
   * markup back in. Re-runs GF init so masks/validation work again. */
  function restoreForm(formId) {
    var html = pristineForms[formId];
    if (!html) { return; }
    var node = document.getElementById('gform_wrapper_' + formId)
            || document.getElementById('gform_confirmation_wrapper_' + formId);
    // The confirmation may be wrapped; walk up to a sensible container.
    if (node && node.id.indexOf('confirmation') !== -1) {
      // Replace the confirmation node (and its wrapper) with the fresh form.
      var target = node.closest ? (node.closest('.gform_confirmation_wrapper') || node) : node;
      var holder = document.createElement('div');
      holder.innerHTML = html;
      var fresh = holder.firstElementChild;
      if (fresh && target.parentNode) {
        target.parentNode.replaceChild(fresh, target);
      }
    } else if (node) {
      var holder2 = document.createElement('div');
      holder2.innerHTML = html;
      var fresh2 = holder2.firstElementChild;
      if (fresh2 && node.parentNode) { node.parentNode.replaceChild(fresh2, node); }
    }
    var formEl = document.getElementById('gform_' + formId);
    if (formEl) { try { formEl.reset(); } catch (e) {} }
    if (typeof window.gformInitSpinner === 'function') {
      try { window.gformInitSpinner(formId, ''); } catch (e) {}
    }
    if (typeof window.gf_apply_rules === 'function') {
      try { window.gf_apply_rules(formId, [], true); } catch (e) {}
    }
    if (window.jQuery) {
      window.jQuery(document).trigger('gform_post_render', [formId, 1]);
    }
    window['gf_submitting_' + formId] = false;
  }

  function extractConfirmation(doc, formId) {
    var el = doc.getElementById('gform_confirmation_message_' + formId)
          || doc.querySelector('.gform_confirmation_message');
    // Return plain text; the toast renders via textContent (no HTML injection).
    return el ? (el.textContent || '').trim() : '';
  }

  /* Native replacement for Gravity Forms' jQuery `.load()` iframe handler, which
   * is broken here because the theme loads jQuery 3.5.1 (where the `.load()`
   * event shorthand GF 2.3 relies on was removed). We listen on the AJAX iframe
   * directly with a version-independent native event. */
  function handleFrameLoad(iframe) {
    var formId = (iframe.id || '').replace('gform_ajax_frame_', '');
    var doc;
    try { doc = iframe.contentDocument || (iframe.contentWindow && iframe.contentWindow.document); }
    catch (e) { return; }
    if (!doc || !doc.body) { return; }

    var isPostback = (doc.body.className || '').indexOf('GF_AJAX_POSTBACK') !== -1
                  || (doc.documentElement.innerHTML || '').indexOf('GF_AJAX_POSTBACK') !== -1;
    if (!isPostback) {
      // Initial (blank) iframe load, not a submission response.
      return;
    }

    var isConfirmation = !!doc.getElementById('gform_confirmation_wrapper_' + formId)
                       || !!doc.querySelector('.gform_confirmation_message');
    var newFormWrapper = doc.getElementById('gform_wrapper_' + formId);

    if (isConfirmation) {
      var message = extractConfirmation(doc, formId) || 'Thank you. We will get back to you shortly.';
      window.royalToast(message, 'success');

      var overlay = document.getElementById('quote-modal');
      var inModal = overlay && overlay.querySelector('#gform_wrapper_' + formId);
      if (overlay && overlay.classList.contains('active') && typeof window.closeQuoteModal === 'function') {
        window.closeQuoteModal();
      }
      setTimeout(function () { restoreForm(formId); resetSubmitButton(formId); }, inModal ? 350 : 0);
    } else if (newFormWrapper) {
      // Validation failed: swap the returned form (with error markers) back in.
      var current = document.getElementById('gform_wrapper_' + formId);
      if (current) {
        current.innerHTML = newFormWrapper.innerHTML;
        if (typeof window.gformInitSpinner === 'function') {
          try { window.gformInitSpinner(formId, ''); } catch (e) {}
        }
        if (window.jQuery) {
          window.jQuery(document).trigger('gform_post_render', [formId, 1]);
        }
      }
      resetSubmitButton(formId);
      window['gf_submitting_' + formId] = false;
    }
  }

  function bindFrames() {
    var frames = document.querySelectorAll('iframe[id^="gform_ajax_frame_"]');
    for (var i = 0; i < frames.length; i++) {
      (function (frame) {
        if (frame.__royalBound) { return; }
        frame.__royalBound = true;
        frame.addEventListener('load', function () { handleFrameLoad(frame); });
      })(frames[i]);
    }
  }

  var submittingForms = {};

  function resetSubmitButton(formId) {
    var btn = document.querySelector('#gform_wrapper_' + formId + ' .gform_button');
    if (!btn) { return; }
    btn.classList.remove('submitting');
    btn.value = 'Submit';
    submittingForms[formId] = false;
  }

  document.addEventListener('click', function (e) {
    var btn = e.target.closest('.gform_button');
    if (!btn) { return; }
    var wrapper = btn.closest('.gform_wrapper');
    if (!wrapper) { return; }
    var formId = (wrapper.id || '').replace('gform_wrapper_', '');
    if (!formId || submittingForms[formId]) { return; }
    submittingForms[formId] = true;
    btn.classList.add('submitting');
    btn.value = 'Submitting\u2026';
  });

  function init() {
    snapshotForms();
    bindFrames();
    // Forms/iframes may be (re)rendered by GF; keep bindings fresh. These pages
    // run animation libraries that mutate the DOM constantly, so coalesce the
    // rescan into a single rAF tick per mutation burst to avoid churn.
    if (window.MutationObserver) {
      var scheduled = false;
      var rescan = function () {
        scheduled = false;
        snapshotForms();
        bindFrames();
      };
      var obs = new MutationObserver(function () {
        if (scheduled) { return; }
        scheduled = true;
        (window.requestAnimationFrame || window.setTimeout)(rescan, 0);
      });
      obs.observe(document.body, { childList: true, subtree: true });
    }
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();
</script>
    <?php
}
add_action('wp_footer', 'royal_shepherd_toast_markup', 100);

add_filter('gform_pre_submission_filter', function ($form) {
    $title = rgar($form, 'title');
    $targets = array('Get a Quote', 'Contact Form');
    if (in_array($title, $targets)) {
        file_put_contents('/tmp/royal-gf-hook-debug.log', date('H:i:s') . " gform_pre_submission_filter fired for: $title\n", FILE_APPEND);
        foreach ($form['notifications'] as &$notification) {
            $notification['isActive'] = true;
            $notification['to'] = 'info@royalassociates.co.ke';
            $notification['event'] = 'form_submission';
            $notification['toType'] = 'email';
        }
        if (empty($form['notifications'])) {
            $form['notifications'] = array(
                array(
                    'id' => 'notif_forced',
                    'isActive' => true,
                    'to' => 'info@royalassociates.co.ke',
                    'name' => 'Admin Notification',
                    'event' => 'form_submission',
                    'toType' => 'email',
                    'subject' => 'New submission from ' . $title,
                    'message' => '{all_fields}',
                ),
            );
        }
    }
    return $form;
});

add_action('gform_after_submission', function ($entry, $form) {
    $title = rgar($form, 'title');
    $targets = array('Get a Quote', 'Contact Form');
    if (in_array($title, $targets)) {
        file_put_contents('/tmp/royal-gf-hook-debug.log', date('H:i:s') . " gform_after_submission backup firing for: $title\n", FILE_APPEND);
        GFAPI::send_notifications($form, $entry, 'form_submission');
    }
}, 9, 2);
