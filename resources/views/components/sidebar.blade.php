<div class="d-flex flex-column flex-shrink-0 p-3 m-1 bg-body-tertiary rounded-3 shadow" style="width: 240px; height: 80vh">
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="tambah-karyawan" class="nav-link link-body-emphasis {{ ($title === "Tambah Karyawan") ? 'active' : '' }}"><i class="bi bi-plus-square"></i> Tambah Karyawan</a>
        </li>
        <hr>
        <li>
            <a href="administrator" class="nav-link link-body-emphasis {{ ($title === "Daftar Karyawan") ? 'active' : '' }}"><i class="bi bi-card-list"></i> Daftar Karyawan</a>
        </li>
        <li>
            <a href="daftar-absensi" class="nav-link link-body-emphasis {{ ($title === "Daftar Absensi") ? 'active' : '' }}"><i class="bi bi-table"></i> Absensi Karyawan</a>
        </li>
    </ul>
</div>