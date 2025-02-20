<!-- Tombol Scroll ke Atas -->
<button id="scrollToTopBtn" onclick="scrollToTop()"><i class="fa-solid fa-arrow-up"></i></button>

<style>
    /* Gaya Tombol Scroll ke Atas */
#scrollToTopBtn {
    display: none; /* Disembunyikan secara default */
    position: fixed;
    bottom: 20px;
    right: 20px;
    z-index: 99;
    background-color: #2699CB; /* Warna biru */
    color: white;
    border: none;
    outline: none;
    cursor: pointer;
    width: 40px; /* Lebar kotak */
    height: 40px; /* Tinggi kotak */
    font-size: 24px; /* Ukuran tanda panah */
    border-radius: 4px; /* Sudut kotak */
    text-align: center;
    line-height: 40px; /* Vertikal tengah */
  }
  
  #scrollToTopBtn:hover {
    background-color: #0056b3; /* Biru lebih gelap saat hover */
  }
  
  
</style>