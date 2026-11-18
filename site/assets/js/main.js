// Entersoftgroup: collapse the primary navigation into a popover only when it does not fit.
(() => {
  const header = document.querySelector('.site-header');
  const inner = header?.querySelector('.header-inner');
  const menu = header?.querySelector('#site-menu');
  if (!header || !inner || !menu) return;

  // No Popover API: show the links inline (CSS .no-popover) instead of a dead button.
  if (!Object.hasOwn(HTMLElement.prototype, 'popover')) {
    menu.removeAttribute('popover');
    document.documentElement.classList.add('no-popover');
    return;
  }

  let wide = false;
  let lastWidth = 0;

  const measure = () => {
    const width = inner.clientWidth;
    if (!wide && width <= lastWidth) return;         // collapsed: remeasure only when the header grows
    lastWidth = width;
    const wasOpen = menu.matches(':popover-open');
    header.classList.add('is-measuring', 'is-wide');
    menu.removeAttribute('popover');
    const fits = inner.scrollWidth <= inner.clientWidth;
    if (!fits) {
      header.classList.remove('is-wide');
      menu.setAttribute('popover', 'auto');
      if (wasOpen) menu.showPopover();
    }
    wide = fits;
    requestAnimationFrame(() => header.classList.remove('is-measuring'));
  };

  const ro = new ResizeObserver(measure);
  ro.observe(header);
  ro.observe(menu);
  // Close the open menu when a link inside it is followed (same-page anchors keep it from lingering).
  menu.addEventListener('click', (e) => {
    if (e.target.closest('a') && menu.matches(':popover-open')) menu.hidePopover();
  });
})();
