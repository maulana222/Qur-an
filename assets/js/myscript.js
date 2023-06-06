var teks = document.getElementById("dataMateri").innerText;

// Periksa jumlah karakter dalam teks
var jumlahKarakter = teks.length;

// Potong teks jika jumlah karakter lebih dari 80
if (jumlahKarakter > 80) {
  var potonganTeks = teks.slice(0, 80) + "..."; 
  
  // Tampilkan potongan teks
  document.getElementById("dataMateri").innerText = potonganTeks;
}
