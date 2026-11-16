'use strict';

const pages = ['Dashboard', 'Categories', 'Topics', 'Storytelling', 'Hook Studio',
  'CTA Studio', 'Storyboard', 'Video Timeline', 'Brand Studio', 'Production',
  'Content Library', 'Media Assets', 'Engine', 'Diagnostics', 'Settings'];

const byId = (id) => document.getElementById(id);
let currentPage = 'Dashboard';

function render() {
  byId('heading').textContent = currentPage === 'Dashboard'
    ? 'Editorial Dashboard' : currentPage;
  byId('nav').replaceChildren(...pages.map((page) => {
    const button = document.createElement('button');
    button.textContent = page;
    button.classList.toggle('active', page === currentPage);
    button.addEventListener('click', () => {
      currentPage = page;
      render();
    });
    return button;
  }));

  const view = byId('view');
  view.replaceChildren();
  const card = document.createElement('article');
  card.className = 'card';
  const title = document.createElement('h2');
  title.textContent = currentPage === 'Dashboard' ? 'Editorial workflow' : currentPage;
  const text = document.createElement('p');
  text.textContent = currentPage === 'Dashboard'
    ? 'Category → Topic → Story → Hooks & CTAs → Storyboard → Production → Review'
    : 'This module is planned for a future development milestone.';
  card.append(title, text);
  view.append(card);
}

render();
