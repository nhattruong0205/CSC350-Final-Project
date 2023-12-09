function showContact(event) {
  event.preventDefault();
  document.getElementById('home').style.display = 'none';
  document.getElementById('news').style.display = 'none';
  document.getElementById('contact').style.display = 'block';
}

function showHome(event) {
  event.preventDefault();
  document.getElementById('contact').style.display = 'none';
  document.getElementById('news').style.display = 'none';
  document.getElementById('home').style.display = 'block';
}

function showNews(event) {
  event.preventDefault();
  document.getElementById('contact').style.display = 'none';
  document.getElementById('home').style.display = 'none';
  document.getElementById('news').style.display = 'block';
}
