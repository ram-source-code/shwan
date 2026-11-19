(() => {
  const root = document.documentElement;
  const KEY = 'esg-theme';
  const switcher = document.querySelector('.theme-switch');
  const meta = document.querySelector('meta[name="theme-color"]');
  const dark = matchMedia('(prefers-color-scheme: dark)');
  const read = () => { try { return localStorage.getItem(KEY); } catch { return null; } };
  const apply = (choice) => {
    if (choice === 'light' || choice === 'dark') root.dataset.theme = choice;
    else delete root.dataset.theme;
    const effective = root.dataset.theme || (dark.matches ? 'dark' : 'light');
    if (meta) meta.content = effective === 'dark' ? '#06111b' : '#0c3f68';
    switcher?.querySelectorAll('button').forEach((b) => b.setAttribute('aria-pressed', String(b.dataset.themeSet === (choice || 'auto'))));
  };
  if (switcher) {
    switcher.hidden = false;
    switcher.addEventListener('click', (e) => {
      const btn = e.target.closest('button[data-theme-set]');
      if (!btn) return;
      const choice = btn.dataset.themeSet;
      try { choice === 'auto' ? localStorage.removeItem(KEY) : localStorage.setItem(KEY, choice); } catch {}
      apply(choice);
    });
  }
  apply(read());
  dark.addEventListener('change', () => apply(read()));
})();

(() => {
  const header = document.querySelector('.site-header');
  const inner = header?.querySelector('.header-inner');
  const menu = header?.querySelector('#site-menu');
  if (!header || !inner || !menu) return;
  if (!Object.hasOwn(HTMLElement.prototype, 'popover')) {
    menu.removeAttribute('popover');
    document.documentElement.classList.add('no-popover');
    return;
  }

  let wide = false;
  let lastWidth = 0;

  const measure = () => {
    const width = inner.clientWidth;
    if (!wide && width <= lastWidth) return;
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
  menu.addEventListener('click', (e) => {
    if (e.target.closest('a') && menu.matches(':popover-open')) menu.hidePopover();
  });
})();
