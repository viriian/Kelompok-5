function redirectToDescription(url) {
  window.location.href = url;
}

function toggleBorrow(button) {
  if (button.classList.contains("available")) {
    button.classList.remove("available");
    button.classList.add("borrowed");
    button.innerText = "Kembalikan";
    button.previousElementSibling.innerText = "Status: Terpinjam";
  } else {
    button.classList.remove("borrowed");
    button.classList.add("available");
    button.innerText = "Pinjam";
    button.previousElementSibling.innerText = "Status: Tersedia";
  }
}
