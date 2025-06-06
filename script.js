document.getElementById('bookForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const title = document.getElementById('title').value;
    const author = document.getElementById('author').value;

    fetch('register.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `title=${encodeURIComponent(title)}&author=${encodeURIComponent(author)}`
    }).then(response => response.text())
      .then(data => {
          alert(data);
          loadBooks();
      });
});

function loadBooks() {
    fetch('books.php')
        .then(response => response.json())
        .then(data => {
            const bookList = document.getElementById('bookList');
            bookList.innerHTML = '';
            data.forEach(book => {
                const div = document.createElement('div');
                div.textContent = `${book.title} - ${book.author}`;
                bookList.appendChild(div);
            });
        });
}

window.onload = loadBooks;