// search button
function toggleSearch() {
    const searchContainer = document.querySelector('.search-container');
    searchContainer.classList.toggle('active');
}

document.addEventListener('click', function(event) {
    const searchBar = document.querySelector('.search-bar');
    const searchContainer = document.querySelector('.search-container');

    // Cek apakah klik terjadi di luar elemen .search-bar
    if (!searchBar.contains(event.target)) {
        searchContainer.classList.remove('active');
    }
});


// navbar
// toggle
const menu = document.querySelector('.menu');

// ketika hamburger menu di klik
document.querySelector('#hamburger-menu').onclick = (e) => { 
    e.preventDefault();  // Mencegah halaman naik ke atas
    menu.classList.toggle('active');
};

// klik di mana saja agar hilang
const hamburger = document.querySelector('#hamburger-menu');

document.addEventListener('click', function(e) {
    if (!hamburger.contains(e.target) && !menu.contains(e.target)) {
        menu.classList.remove('active');
    }
});


// dropdown menu
document.addEventListener("DOMContentLoaded", function () {
    const dropdowns = document.querySelectorAll(".dropdown");

    dropdowns.forEach(dropdown => {
        const dropdownToggle = dropdown.querySelector('.dropdown-toggle');
        const dropdownMenu = dropdown.querySelector('.dropdown-menu');

        dropdownToggle.addEventListener("click", function (e) {
            e.preventDefault(); // Cegah hanya jika tombol dropdown diklik
            e.stopPropagation();

            // Tutup semua dropdown menu lainnya sebelum membuka yang baru
            dropdowns.forEach(d => {
                const menu = d.querySelector('.dropdown-menu');
                if (menu !== dropdownMenu) {
                    menu.classList.remove("show");
                }
            });

            // Toggle dropdown menu yang diklik
            dropdownMenu.classList.toggle("show");
        });

        dropdownMenu.addEventListener("click", function (e) {
            // Izinkan klik pada link di dalam dropdown-menu
            e.stopPropagation();
        });
    });

    // Tutup semua dropdown ketika klik di luar area dropdown
    document.addEventListener("click", function () {
        dropdowns.forEach(dropdown => {
            const dropdownMenu = dropdown.querySelector('.dropdown-menu');
            dropdownMenu.classList.remove("show");
        });
    });
});





// Tampilkan tombol saat scroll ke bawah
window.onscroll = function() {
    toggleScrollButton();
  };
  
  function toggleScrollButton() {
    const button = document.getElementById("scrollToTopBtn");
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
      button.style.display = "block";
    } else {
      button.style.display = "none";
    }
  }
  
  // Fungsi Scroll ke Atas
  function scrollToTop() {
    window.scrollTo({top: 0, behavior: 'smooth'});
  }
  






// fitur  partner geser
const partnerContainer = document.querySelector('.partner');
let scrollSpeed = 2; // Adjust the scrolling speed
let containerWidth = partnerContainer.scrollWidth; // Get the width of the entire container

function scrollLogos() {
    partnerContainer.scrollLeft += scrollSpeed; // Move the scroll position

    // If the container has scrolled to the end, reset scrollLeft to 0 instantly
    if (partnerContainer.scrollLeft >= containerWidth - partnerContainer.clientWidth) {
        partnerContainer.scrollLeft = 0;
    }

    // Repeat the scroll effect
    requestAnimationFrame(scrollLogos);
}

// Start the scrolling effect
scrollLogos();



// slider team
document.addEventListener('DOMContentLoaded', () => {
    const carousel = document.getElementById('carousel');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');

    prevBtn.addEventListener('click', () => {
        carousel.scrollBy({ left: -300, behavior: 'smooth' });
    });

    nextBtn.addEventListener('click', () => {
        carousel.scrollBy({ left: 300, behavior: 'smooth' });
    });

    let isDown = false;
    let startX;
    let scrollLeft;

    carousel.addEventListener('mousedown', (e) => {
        isDown = true;
        carousel.classList.add('active');
        startX = e.pageX - carousel.offsetLeft;
        scrollLeft = carousel.scrollLeft;
    });
    carousel.addEventListener('mouseleave', () => {
        isDown = false;
        carousel.classList.remove('active');
    });
    carousel.addEventListener('mouseup', () => {
        isDown = false;
        carousel.classList.remove('active');
    });
    carousel.addEventListener('mousemove', (e) => {
        if (!isDown) return;
        e.preventDefault();
        const x = e.pageX - carousel.offsetLeft;
        const walk = (x - startX) * 3; // Scroll-fast
        carousel.scrollLeft = scrollLeft - walk;
    });
});




document.addEventListener("DOMContentLoaded", () => {
    const emailInput = document.getElementById("email");
    const rememberCheckbox = document.getElementById("remember");

    // Saat halaman dimuat, cek localStorage
    if (localStorage.getItem("rememberEmail")) {
        emailInput.value = localStorage.getItem("rememberEmail");
        rememberCheckbox.checked = true;
    }

    // Saat form dikirim
    document.querySelector("form").addEventListener("submit", () => {
        if (rememberCheckbox.checked) {
            localStorage.setItem("rememberEmail", emailInput.value);
        } else {
            localStorage.removeItem("rememberEmail");
        }
    });
});



// pagination
document.addEventListener('DOMContentLoaded', function () {
    const paginationLinks = document.querySelectorAll('.pagination a');

    paginationLinks.forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            const url = this.href;

            // Fetch the new page content
            fetch(url)
                .then(response => response.text())
                .then(html => {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    const newContent = doc.querySelector('#update-news .card-box').innerHTML;

                    // Replace the content and scroll to #update-news
                    document.querySelector('#update-news .card-box').innerHTML = newContent;
                    document.querySelector('#update-news').scrollIntoView({ behavior: 'smooth' });

                    // Update browser URL
                    history.pushState(null, '', url);
                });
        });
    });
});





// tombol kiri kanan
// Ambil elemen tombol dan kontainer
const scrollLeftButton = document.getElementById('scroll-left');
const scrollRightButton = document.getElementById('scroll-right');
const cardContainer = document.querySelector('.card_container');

// Fungsi untuk menggulir ke kiri
scrollLeftButton.addEventListener('click', () => {
    cardContainer.scrollBy({
        left: -300, // Geser ke kiri sejauh 300px
        behavior: 'smooth' // Scroll halus
    });
});

// Fungsi untuk menggulir ke kanan
scrollRightButton.addEventListener('click', () => {
    cardContainer.scrollBy({
        left: 300, // Geser ke kanan sejauh 300px
        behavior: 'smooth' // Scroll halus
    });
});



// video traininig
function openVideo(videoSrc) {
    const modal = document.getElementById("videoModal");
    const videoPlayer = document.getElementById("modalVideo");

    modal.style.display = "flex"; // Tampilkan modal
    videoPlayer.src = videoSrc; // Set src video
    videoPlayer.play(); // Putar otomatis
}

// Tutup modal ketika klik di luar video
function closeVideo(event) {
    const modal = document.getElementById("videoModal");
    const videoPlayer = document.getElementById("modalVideo");

    // Jika yang diklik adalah modal (bukan video), tutup modal
    if (event.target === modal) {
        videoPlayer.pause(); // Pause video
        videoPlayer.src = ""; // Reset src agar tidak ada suara sisa
        modal.style.display = "none"; // Sembunyikan modal
    }
}
function openVideo(videoSrc) {
    const modal = document.getElementById("videoModal");
    const videoPlayer = document.getElementById("modalVideo");

    modal.style.display = "flex"; // Munculkan modal saat tombol ditekan
    videoPlayer.src = videoSrc; // Set video yang dipilih
    videoPlayer.play(); // Putar otomatis
}

// Tutup modal ketika klik di luar video
function closeVideo(event) {
    const modal = document.getElementById("videoModal");
    const videoPlayer = document.getElementById("modalVideo");

    // Jika yang diklik adalah modal (bukan video), tutup modal
    if (event.target === modal) {
        videoPlayer.pause(); // Pause video
        videoPlayer.src = ""; // Reset src agar tidak ada suara sisa
        modal.style.display = "none"; // Sembunyikan modal
    }
}




// chatbot
