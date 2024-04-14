let buttons = document.querySelectorAll(".action-button");
buttons.forEach(function(btn){
  btn.addEventListener("click",function(){
    let bubbleAction = btn.nextElementSibling;
  
  // Memeriksa apakah elemen ".bubble-action" yang terkait sudah ditampilkan atau tidak
  if (bubbleAction.style.display === "block") {
      // Jika sudah ditampilkan, maka sembunyikan elemen tersebut
      bubbleAction.style.display = "none";
  } else {
      // Jika belum ditampilkan, maka sembunyikan semua elemen ".bubble-action" yang sedang ditampilkan
      document.querySelectorAll(".bubble-action").forEach(function(pek) {
          if (pek.style.display === "block") {
              pek.style.display = "none";
          }
      });

      // Kemudian tampilkan elemen ".bubble-action" yang terkait dengan tombol yang ditekan
      bubbleAction.style.display = "block";
    }
  });
});