const propertiesState = {
  order: 'asc',
  page: 1,
};

document.addEventListener('click', function (e) {

 /*  SORT */
  const sortBtn = e.target.closest('.js-sort');
  if (sortBtn) {
    e.preventDefault();

    propertiesState.order =
      propertiesState.order === 'asc' ? 'desc' : 'asc';
    propertiesState.page = 1;

    const dynamic = document.getElementById('properties-dynamic');
    if (!dynamic) return;

    dynamic.classList.add('opacity-50');

    fetch(
      `${propertiesAjax.ajaxUrl}?action=sort_properties&order=${propertiesState.order}`
    )
      .then(res => res.text())
      .then(html => {
        dynamic.innerHTML = html;

        // update button UI
        sortBtn.innerHTML =
          `Sort by price (${propertiesState.order === 'asc'
            ? 'Low to High'
            : 'High to Low'
          }) <span class="ms-1">${propertiesState.order === 'asc' ? '↓' : '↑'
          }</span>`;
      })
      .finally(() => {
        dynamic.classList.remove('opacity-50');
      });

    return;
  }

 /* LOAD MORE */
  const loadBtn = e.target.closest('.js-load-more');
  if (loadBtn) {
    e.preventDefault();

    propertiesState.page += 1;
    const max = parseInt(loadBtn.dataset.max, 10);

    loadBtn.disabled = true;
    loadBtn.textContent = 'Loading...';

    fetch(
      `${propertiesAjax.ajaxUrl}?action=load_more_properties&page=${propertiesState.page}&order=${propertiesState.order}`
    )
      .then(res => res.text())
      .then(html => {
        if (html.trim()) {
          document
            .getElementById('properties-list')
            .insertAdjacentHTML('beforeend', html);

          loadBtn.disabled = false;
          loadBtn.textContent = 'Load more';

          if (propertiesState.page >= max) {
            loadBtn.remove();
          }
        } else {
          loadBtn.remove();
        }
      });
  }
});
