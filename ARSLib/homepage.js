// Fungsi untuk membuka sidebar
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
}

// Fungsi untuk menutup sidebar
function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
}

// Fungsi pencarian buku di sidebar
function searchBooksSidebar() {
  var input = document.getElementById("sidebarSearchInput").value;
  // Proses pencarian buku sesuai dengan input
  console.log("Pencarian buku di sidebar: " + input);
}

// Fungsi pencarian buku di halaman utama
function searchBooks() {
  var input = document.getElementById("searchInput").value;
  // Proses pencarian buku sesuai dengan input
  console.log("Pencarian buku di halaman utama: " + input);
}

// Fungsi untuk mengarahkan ke halaman peminjaman
function redirectToBorrow(url) {
  window.location.href = url;
}
