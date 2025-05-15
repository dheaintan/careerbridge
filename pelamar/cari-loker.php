<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Lowongan Kerja</title>
    <link rel="icon" type="image/x-icon" href="../logo%20careerbridge.png">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="../assets/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
  <nav class="navbar navbar-expand-lg bg-light">

    <div class="container-fluid">
      <a class="navbar-brand text-decoration-none">
        <img src="../logo%20careerbridge.png" alt="CareerBridge" height="40" class="d-inline-block align-top">
      </a>
    
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse"  data-bs-target="#navbarTogglerDemo02"aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active border-bottom border-dark" style="font-family: 'Inter', sans-serif;">Cari Lowongan Kerja</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./perusahaan/pasang-loker.php" style="font-family: 'Inter', sans-serif;">Pasang Lowongan</a>
          </li>

          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="artikel.html" style="font-family: 'Inter', sans-serif;">Tips Loker</a>
          </li>
        </ul>
        
        <form class="d-flex align-items-center mx-1">
          <div class="dropdown">
            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #e7f1a8; color: black; font-size: 0.90rem">
              Masuk
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="../masukpekerja.php">Masuk sebagai Pencari Kerja</a></li>
              <li><a class="dropdown-item" href="./perusahaan/masukperusahaan.php">Masuk sebagai Perusahaan</a></li>
            </ul>
          </div>
        </form>
      </div>
    </div>
  </nav>
    
  <div class="py-4 px-2" style="background-color: #364C84;">
    <div class="container">
      <div class="p-2 bg-light rounded d-flex flex-wrap gap-2 justify-content-center justify-content-md-between">

        <!-- Input kata kunci -->
        <div class="flex-grow-1 bg-light">
          <input type="text" class="form-control w-100" style="border: 1px solid black;" placeholder="Masukkan kata kunci">
        </div>
          
        <!-- Dropdown lokasi dengan ikon -->
        <div class="d-flex flex-grow-1 bg-light">
          <div class="input-group w-100">
            <span class="input-group-text border-black border-end-0"><i class="bi bi-geo-alt"></i></span>
            <select class="form-select border-black border-start-0">
              <option selected>Semua Lokasi</option>
              <option>Surabaya</option>
              <option>Jakarta</option>
            </select>
          </div>
        </div>
          
        <!-- Dropdown kategori dengan ikon -->
        <div class="d-flex flex-grow-1 bg-light">
          <div class="input-group w-100">
            <span class="input-group-text border-black border-end-0"><i class="bi bi-briefcase"></i></span>
            <select class="form-select border-black border-start-0">
              <option selected>Semua Kategori</option>
              <option>Desain</option>
              <option>Teknologi</option>
            </select>
          </div>
        </div>
          
              <!-- Tombol cari -->
              <div>
                  <button class="btn rounded px-3" style="background-color: #95B1EE;">
                      <i class="bi bi-search"></i>
                  </button>
              </div>
      </div>  
    </div>
  </div>
  
  <!-- Breadcrumb -->
  <div class="container mt-3 bg-light">
      <small>Beranda > Cari Lowongan Kerja</small>
  </div>
  
    <!-- Filter Buttons -->
    <div class="container py-4 bg-light">
        <div class="row align-items-center justify-content-between">

            <div class="col-md-auto mb-2 mb-md-0">
                <h4 class="fw-bold">Cari Lowongan Kerja</h4>
            </div>
  
            <!-- Filter Dropdowns -->
            <div class="col-md d-flex flex-wrap justify-content-md-end gap-2 bg-light">
                <select class="form-select w-auto bg-light" style="border: 1px solid black;">
                  <option selected>Semua Jenis Loker</option>
                  <option>Full Time</option>
                  <option>Part Time</option>
                </select>
  
                <select class="form-select w-auto bg-light" style="border: 1px solid black;">
                  <option selected>Semua Pendidikan</option>
                  <option>SMA/SMK</option>
                  <option>D3</option>
                  <option>S1</option>
                  <option>S2</option>
                  <option>S3</option>
                </select>
            </div>
        </div>
    </div>

    <!--Card-->
    <div class="row row-cols-1 row-cols-md-3 g-4 mx-auto bg-light">

        <div class="col">
            <div class="card h-100 border rounded-4 bg-white shadow-sm" onclick="window.location.href='./perusahaan/detail-pekerjaan.php'" style="cursor: pointer">
              <button class="btn rounded-circle btn-outline-dark position-absolute top-0 end-0 m-2 z-3" onclick="event.stopPropagation(); toggleSave(this);"><i class="bi bi-heart"></i></button>
              <div class="card-body d-flex">
                <img src="..." alt="Logo Perusahaan" class="rounded-circle me-3" style="width: 60px; height: 60px; object-fit: cover;">
                <div class="d-flex flex-column justify-content-center">
                  <h6 class="card-title mb-1" style="font-family: 'Inter', sans-serif; color: #95B1EE;">Nama Perusahaan</h6>
                  <p class="fs-6 mb-1" style="font-family: 'M PLUS Rounded 1c', sans-serif;">Pekerjaan</p>
                  <p class="fs-6 mb-0" style="font-family: 'Inter', sans-serif;"><i class="bi bi-geo-alt"></i> Lokasi Perusahaan</p>
                </div>
              </div>
              <div class="d-flex flex-wrap gap-2 ps-4">
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">Full Time</span>
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">Diploma/D1/D2/D3</span>
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">Sarjana / S1</span>
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">1–2 Tahun</span>
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">Staff / Officer</span>
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">Konstruksi dan Bangunan</span>
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">Quantity Surveyor</span>
              </div>
              <div class="w-85 my-3 mx-5" style="height: 1px; background-color: #CAC5C5;"></div>
              <div class="d-flex justify-content-between align-items-center px-3">
                <p class="mb-3 fs-6" style="font-family: 'Inter', sans-serif;">
                  <i class="bi bi-cash-coin"></i> Rp 3 - 4 Juta
                </p>
                <p class="mb-3 fs-6" style="font-family: 'Inter', sans-serif;">9 menit yang lalu</p>
              </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 border rounded-4 bg-white shadow-sm" onclick="window.location.href='./perusahaan/detail-pekerjaan.php'" style="cursor: pointer">
              <button class="btn rounded-circle btn-outline-dark position-absolute top-0 end-0 m-2 z-3" onclick="event.stopPropagation(); toggleSave(this);"><i class="bi bi-heart"></i></button>
              <div class="card-body d-flex">
                <img src="..." alt="Logo Perusahaan" class="rounded-circle me-3" style="width: 60px; height: 60px; object-fit: cover;">
                <div class="d-flex flex-column justify-content-center">
                  <h6 class="card-title mb-1" style="font-family: 'Inter', sans-serif; color: #95B1EE;">Nama Perusahaan</h6>
                  <p class="fs-6 mb-1" style="font-family: 'M PLUS Rounded 1c', sans-serif;">Pekerjaan</p>
                  <p class="fs-6 mb-0" style="font-family: 'Inter', sans-serif;"><i class="bi bi-geo-alt"></i> Lokasi Perusahaan</p>
                </div>
              </div>
              <div class="d-flex flex-wrap gap-2 ps-4">
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">Full Time</span>
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">Diploma/D1/D2/D3</span>
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">Sarjana / S1</span>
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">1–2 Tahun</span>
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">Staff / Officer</span>
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">Konstruksi dan Bangunan</span>
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">Quantity Surveyor</span>
              </div>
              <div class="w-85 my-3 mx-5" style="height: 1px; background-color: #CAC5C5;"></div>
              <div class="d-flex justify-content-between align-items-center px-3">
                <p class="mb-3 fs-6" style="font-family: 'Inter', sans-serif;">
                  <i class="bi bi-cash-coin"></i> Rp 3 - 4 Juta
                </p>
                <p class="mb-3 fs-6" style="font-family: 'Inter', sans-serif;">9 menit yang lalu</p>
              </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 border rounded-4 bg-white shadow-sm" onclick="window.location.href='./perusahaan/detail-pekerjaan.php'" style="cursor: pointer">
              <button class="btn rounded-circle btn-outline-dark position-absolute top-0 end-0 m-2 z-3" onclick="event.stopPropagation(); toggleSave(this);"><i class="bi bi-heart"></i></button>
              <div class="card-body d-flex">
                <img src="..." alt="Logo Perusahaan" class="rounded-circle me-3" style="width: 60px; height: 60px; object-fit: cover;">
                <div class="d-flex flex-column justify-content-center">
                  <h6 class="card-title mb-1" style="font-family: 'Inter', sans-serif; color: #95B1EE;">Nama Perusahaan</h6>
                  <p class="fs-6 mb-1" style="font-family: 'M PLUS Rounded 1c', sans-serif;">Pekerjaan</p>
                  <p class="fs-6 mb-0" style="font-family: 'Inter', sans-serif;"><i class="bi bi-geo-alt"></i> Lokasi Perusahaan</p>
                </div>
              </div>
              <div class="d-flex flex-wrap gap-2 ps-4">
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">Full Time</span>
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">Diploma/D1/D2/D3</span>
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">Sarjana / S1</span>
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">1–2 Tahun</span>
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">Staff / Officer</span>
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">Konstruksi dan Bangunan</span>
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">Quantity Surveyor</span>
              </div>
              <div class="w-85 my-3 mx-5" style="height: 1px; background-color: #CAC5C5;"></div>
              <div class="d-flex justify-content-between align-items-center px-3">
                <p class="mb-3 fs-6" style="font-family: 'Inter', sans-serif;">
                  <i class="bi bi-cash-coin"></i> Rp 3 - 4 Juta
                </p>
                <p class="mb-3 fs-6" style="font-family: 'Inter', sans-serif;">9 menit yang lalu</p>
              </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 border rounded-4 bg-white shadow-sm" onclick="window.location.href='./perusahaan/detail-pekerjaan.php'" style="cursor: pointer">
              <button class="btn rounded-circle btn-outline-dark position-absolute top-0 end-0 m-2 z-3" onclick="event.stopPropagation(); toggleSave(this);"><i class="bi bi-heart"></i></button>
              <div class="card-body d-flex">
                <img src="..." alt="Logo Perusahaan" class="rounded-circle me-3" style="width: 60px; height: 60px; object-fit: cover;">
                <div class="d-flex flex-column justify-content-center">
                  <h6 class="card-title mb-1" style="font-family: 'Inter', sans-serif; color: #95B1EE;">Nama Perusahaan</h6>
                  <p class="fs-6 mb-1" style="font-family: 'M PLUS Rounded 1c', sans-serif;">Pekerjaan</p>
                  <p class="fs-6 mb-0" style="font-family: 'Inter', sans-serif;"><i class="bi bi-geo-alt"></i> Lokasi Perusahaan</p>
                </div>
              </div>
              <div class="d-flex flex-wrap gap-2 ps-4">
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">Full Time</span>
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">Diploma/D1/D2/D3</span>
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">Sarjana / S1</span>
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">1–2 Tahun</span>
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">Staff / Officer</span>
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">Konstruksi dan Bangunan</span>
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">Quantity Surveyor</span>
              </div>
              <div class="w-85 my-3 mx-5" style="height: 1px; background-color: #CAC5C5;"></div>
              <div class="d-flex justify-content-between align-items-center px-3">
                <p class="mb-3 fs-6" style="font-family: 'Inter', sans-serif;">
                  <i class="bi bi-cash-coin"></i> Rp 3 - 4 Juta
                </p>
                <p class="mb-3 fs-6" style="font-family: 'Inter', sans-serif;">9 menit yang lalu</p>
              </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 border rounded-4 bg-white shadow-sm" onclick="window.location.href='./perusahaan/detail-pekerjaan.php'" style="cursor: pointer">
              <button class="btn rounded-circle btn-outline-dark position-absolute top-0 end-0 m-2 z-3" onclick="event.stopPropagation(); toggleSave(this);"><i class="bi bi-heart"></i></button>
              <div class="card-body d-flex">
                <img src="..." alt="Logo Perusahaan" class="rounded-circle me-3" style="width: 60px; height: 60px; object-fit: cover;">
                <div class="d-flex flex-column justify-content-center">
                  <h6 class="card-title mb-1" style="font-family: 'Inter', sans-serif; color: #95B1EE;">Nama Perusahaan</h6>
                  <p class="fs-6 mb-1" style="font-family: 'M PLUS Rounded 1c', sans-serif;">Pekerjaan</p>
                  <p class="fs-6 mb-0" style="font-family: 'Inter', sans-serif;"><i class="bi bi-geo-alt"></i> Lokasi Perusahaan</p>
                </div>
              </div>
              <div class="d-flex flex-wrap gap-2 ps-4">
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">Full Time</span>
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">Diploma/D1/D2/D3</span>
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">Sarjana / S1</span>
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">1–2 Tahun</span>
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">Staff / Officer</span>
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">Konstruksi dan Bangunan</span>
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">Quantity Surveyor</span>
              </div>
              <div class="w-85 my-3 mx-5" style="height: 1px; background-color: #CAC5C5;"></div>
              <div class="d-flex justify-content-between align-items-center px-3">
                <p class="mb-3 fs-6" style="font-family: 'Inter', sans-serif;">
                  <i class="bi bi-cash-coin"></i> Rp 3 - 4 Juta
                </p>
                <p class="mb-3 fs-6" style="font-family: 'Inter', sans-serif;">9 menit yang lalu</p>
              </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 border rounded-4 bg-white shadow-sm" onclick="window.location.href='./perusahaan/detail-pekerjaan.php'" style="cursor: pointer">
              <button class="btn rounded-circle btn-outline-dark position-absolute top-0 end-0 m-2 z-3" onclick="event.stopPropagation(); toggleSave(this);"><i class="bi bi-heart"></i></button>
              <div class="card-body d-flex">
                <img src="..." alt="Logo Perusahaan" class="rounded-circle me-3" style="width: 60px; height: 60px; object-fit: cover;">
                <div class="d-flex flex-column justify-content-center">
                  <h6 class="card-title mb-1" style="font-family: 'Inter', sans-serif; color: #95B1EE;">Nama Perusahaan</h6>
                  <p class="fs-6 mb-1" style="font-family: 'M PLUS Rounded 1c', sans-serif;">Pekerjaan</p>
                  <p class="fs-6 mb-0" style="font-family: 'Inter', sans-serif;"><i class="bi bi-geo-alt"></i> Lokasi Perusahaan</p>
                </div>
              </div>
              <div class="d-flex flex-wrap gap-2 ps-4">
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">Full Time</span>
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">Diploma/D1/D2/D3</span>
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">Sarjana / S1</span>
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">1–2 Tahun</span>
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">Staff / Officer</span>
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">Konstruksi dan Bangunan</span>
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">Quantity Surveyor</span>
              </div>
              <div class="w-85 my-3 mx-5" style="height: 1px; background-color: #CAC5C5;"></div>
              <div class="d-flex justify-content-between align-items-center px-3">
                <p class="mb-3 fs-6" style="font-family: 'Inter', sans-serif;">
                  <i class="bi bi-cash-coin"></i> Rp 3 - 4 Juta
                </p>
                <p class="mb-3 fs-6" style="font-family: 'Inter', sans-serif;">9 menit yang lalu</p>
              </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 border rounded-4 bg-white shadow-sm" onclick="window.location.href='./perusahaan/detail-pekerjaan.php'" style="cursor: pointer">
              <button class="btn rounded-circle btn-outline-dark position-absolute top-0 end-0 m-2 z-3" onclick="event.stopPropagation(); toggleSave(this);"><i class="bi bi-heart"></i></button>
              <div class="card-body d-flex">
                <img src="..." alt="Logo Perusahaan" class="rounded-circle me-3" style="width: 60px; height: 60px; object-fit: cover;">
                <div class="d-flex flex-column justify-content-center">
                  <h6 class="card-title mb-1" style="font-family: 'Inter', sans-serif; color: #95B1EE;">Nama Perusahaan</h6>
                  <p class="fs-6 mb-1" style="font-family: 'M PLUS Rounded 1c', sans-serif;">Pekerjaan</p>
                  <p class="fs-6 mb-0" style="font-family: 'Inter', sans-serif;"><i class="bi bi-geo-alt"></i> Lokasi Perusahaan</p>
                </div>
              </div>
              <div class="d-flex flex-wrap gap-2 ps-4">
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">Full Time</span>
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">Diploma/D1/D2/D3</span>
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">Sarjana / S1</span>
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">1–2 Tahun</span>
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">Staff / Officer</span>
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">Konstruksi dan Bangunan</span>
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">Quantity Surveyor</span>
              </div>
              <div class="w-85 my-3 mx-5" style="height: 1px; background-color: #CAC5C5;"></div>
              <div class="d-flex justify-content-between align-items-center px-3">
                <p class="mb-3 fs-6" style="font-family: 'Inter', sans-serif;">
                  <i class="bi bi-cash-coin"></i> Rp 3 - 4 Juta
                </p>
                <p class="mb-3 fs-6" style="font-family: 'Inter', sans-serif;">9 menit yang lalu</p>
              </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 border rounded-4 bg-white shadow-sm" onclick="window.location.href='./perusahaan/detail-pekerjaan.php'" style="cursor: pointer">
              <button class="btn rounded-circle btn-outline-dark position-absolute top-0 end-0 m-2 z-3" onclick="event.stopPropagation(); toggleSave(this);"><i class="bi bi-heart"></i></button>
              <div class="card-body d-flex">
                <img src="..." alt="Logo Perusahaan" class="rounded-circle me-3" style="width: 60px; height: 60px; object-fit: cover;">
                <div class="d-flex flex-column justify-content-center">
                  <h6 class="card-title mb-1" style="font-family: 'Inter', sans-serif; color: #95B1EE;">Nama Perusahaan</h6>
                  <p class="fs-6 mb-1" style="font-family: 'M PLUS Rounded 1c', sans-serif;">Pekerjaan</p>
                  <p class="fs-6 mb-0" style="font-family: 'Inter', sans-serif;"><i class="bi bi-geo-alt"></i> Lokasi Perusahaan</p>
                </div>
              </div>
              <div class="d-flex flex-wrap gap-2 ps-4">
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">Full Time</span>
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">Diploma/D1/D2/D3</span>
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">Sarjana / S1</span>
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">1–2 Tahun</span>
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">Staff / Officer</span>
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">Konstruksi dan Bangunan</span>
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">Quantity Surveyor</span>
              </div>
              <div class="w-85 my-3 mx-5" style="height: 1px; background-color: #CAC5C5;"></div>
              <div class="d-flex justify-content-between align-items-center px-3">
                <p class="mb-3 fs-6" style="font-family: 'Inter', sans-serif;">
                  <i class="bi bi-cash-coin"></i> Rp 3 - 4 Juta
                </p>
                <p class="mb-3 fs-6" style="font-family: 'Inter', sans-serif;">9 menit yang lalu</p>
              </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 border rounded-4 bg-white shadow-sm" onclick="window.location.href='./perusahaan/detail-pekerjaan.php'" style="cursor: pointer">
              <button class="btn rounded-circle btn-outline-dark position-absolute top-0 end-0 m-2 z-3" onclick="event.stopPropagation(); toggleSave(this);"><i class="bi bi-heart"></i></button>
              <div class="card-body d-flex">
                <img src="..." alt="Logo Perusahaan" class="rounded-circle me-3" style="width: 60px; height: 60px; object-fit: cover;">
                <div class="d-flex flex-column justify-content-center">
                  <h6 class="card-title mb-1" style="font-family: 'Inter', sans-serif; color: #95B1EE;">Nama Perusahaan</h6>
                  <p class="fs-6 mb-1" style="font-family: 'M PLUS Rounded 1c', sans-serif;">Pekerjaan</p>
                  <p class="fs-6 mb-0" style="font-family: 'Inter', sans-serif;"><i class="bi bi-geo-alt"></i> Lokasi Perusahaan</p>
                </div>
              </div>
              <div class="d-flex flex-wrap gap-2 ps-4">
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">Full Time</span>
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">Diploma/D1/D2/D3</span>
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">Sarjana / S1</span>
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">1–2 Tahun</span>
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">Staff / Officer</span>
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">Konstruksi dan Bangunan</span>
                <span class="px-2 py-1 rounded" style="background-color: #95B1EE; font-size: 14px;">Quantity Surveyor</span>
              </div>
              <div class="w-85 my-3 mx-5" style="height: 1px; background-color: #CAC5C5;"></div>
              <div class="d-flex justify-content-between align-items-center px-3">
                <p class="mb-3 fs-6" style="font-family: 'Inter', sans-serif;">
                  <i class="bi bi-cash-coin"></i> Rp 3 - 4 Juta
                </p>
                <p class="mb-3 fs-6" style="font-family: 'Inter', sans-serif;">9 menit yang lalu</p>
              </div>
            </div>
        </div>
    </div>

    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center mt-4">
            <li class="page-item">
                <a class="page-link text-black border-secondary bg-light" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li class="page-item"><a class="page-link text-black border-secondary bg-light" href="#">1</a></li>
            <li class="page-item"><a class="page-link text-black border-secondary bg-light" href="#">2</a></li>
            <li class="page-item"><a class="page-link text-black border-secondary bg-light" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link text-black border-secondary bg-light" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>

    <div class="bg-light d-flex justify-content-center align-items-center bg-light">
        <div class="p-4">
            <div class="col-md-auto mb-2 mb-md-0">
                <h4 class="fw-bold">Lowongan Kerja di Kota Besar</h4>
            </div>
            <div class="d-flex flex-wrap gap-2 bg-light">
                <span class="px-3 py-2 rounded" style="background-color: #95B1EE; color: black;">Jakarta</span>
                <span class="px-3 py-2 rounded" style="background-color: #95B1EE; color: black;">Bogor</span>
                <span class="px-3 py-2 rounded" style="background-color: #95B1EE; color: black;">Depok</span>
                <span class="px-3 py-2 rounded" style="background-color: #95B1EE; color: black;">Tangerang</span>
                <span class="px-3 py-2 rounded" style="background-color: #95B1EE; color: black;">Bekasi</span>
                <span class="px-3 py-2 rounded" style="background-color: #95B1EE; color: black;">Surabaya</span>
                <span class="px-3 py-2 rounded" style="background-color: #95B1EE; color: black;">Medan</span>
                <span class="px-3 py-2 rounded" style="background-color: #95B1EE; color: black;">Bali</span>
                <span class="px-3 py-2 rounded" style="background-color: #95B1EE; color: black;">Semarang</span>
                <span class="px-3 py-2 rounded" style="background-color: #95B1EE; color: black;">NTT</span>
                <span class="px-3 py-2 rounded" style="background-color: #95B1EE; color: black;">NTB</span>
                <span class="px-3 py-2 rounded" style="background-color: #95B1EE; color: black;">Aceh</span>
                <span class="px-3 py-2 rounded" style="background-color: #95B1EE; color: black;">Samarinda</span>
            </div>
        </div>
    </div>

    <footer class="text-dark py-5 bg-light">
      <div class="container">
        <div class="row">
          <!-- Logo dan Deskripsi -->
          <div class="col-md-5">
            <div class="d-flex align-items-start mb-3">
              <img src="logo careerbridge.png" alt="CareerBridge" height="100" class="d-inline-block align-top">
            </div>
            <p class="text-muted" style="max-width: 500px;">
              CareerBridge adalah platform yang membantu pencari kerja menemukan pekerjaan yang tepat dan memudahkan perusahaan dalam merekrut karyawan. Dengan sistem yang mudah digunakan, CareerBridge membuat proses mencari kerja dan perekrutan menjadi lebih cepat dan efisien.
            </p>
          </div>
    
          <!-- Tentang Kami -->
          <div class="col-md-2">
            <h6 class="fw-bold">Tentang Kami</h6>
            <div class="d-flex flex-column">
              <a href="pusatbantuan.html" class="text-muted text-decoration-none mb-1">Pusat Bantuan</a>
              <a href="kebijakanprivasi.html" class="text-muted text-decoration-none mb-1">Kebijakan Privasi</a>
              <a href="snk.html" class="text-muted text-decoration-none mb-1">Kondisi dan Ketentuan</a>
            </div>
          </div>
    
          <!-- Pencari Kerja -->
          <div class="col-md-2">
            <h6 class="fw-bold">Pencari Kerja</h6>
            <div class="d-flex flex-column">
              <a href="./pelamar/daftarpekerja.php" class="text-muted text-decoration-none mb-1">Registrasi Pencari Kerja</a>
              <a href="./pelamar/cari-loker.php" class="text-muted text-decoration-none mb-1">Cari Lowongan Kerja</a>
              <a href="artikel.html" class="text-muted text-decoration-none mb-1">Tips Loker</a>
            </div>
          </div>
    
          <!-- Perusahaan -->
          <div class="col-md-3">
            <h6 class="fw-bold">Perusahaan</h6>
            <div class="d-flex flex-column">
              <a href="./perusahaan/masukperusahaan.php" class="text-muted text-decoration-none mb-1">Registrasi Perusahaan</a>
              <a href="./perusahaan/pasang-loker.php" class="text-muted text-decoration-none mb-1">Pasang Loker</a>
            </div>
          </div>
        </div>
    
        <!-- Copyright -->
        <div class="text-center mt-4 text-muted small">
          <i class="bi bi-c-circle"></i> 2025 CareerBridge - Semua Hak Dilindungi
        </div>
      </div>
    </footer>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>