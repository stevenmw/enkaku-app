@extends('templates.layouts.home')

@section('page_content')
    
<main class="mt-5 pt-3 px-4">
    <div class="d-flex justify-content-center">
      {{-- <h2 class="font-weight-bold">GuideBook Enkaku App</h2> --}}
    </div>
    <div class="d-flex justify-content-center">
      <div class="img-fluid" alt="Responsive image">
          <div class="container">
            <div class="row">
                <br>
                <h2 class="font-weight-bold text-center">Panduan Aplikasi Enkaku</h2>
                <div class="col-md-5">
                    <br><br>
                    <span class="align-bottom">
                        <p class="text-justify">Enkaku telerehab adalah aplikasi yang diperuntukan bagi penderita pasca stroke dan penyakit penyerta sejenis agar dapat terpacu untuk cepat sembuh melalui fitur analisis kemajuan program rehabilitasi. Aplikasi ini juga diharapkan dapat membantu pusat rehabilitasi untuk memberikan laporan data terkait perkembangan setiap pasien yang menjalani proses rehabilitasi medis. Hal ini akan sangat membantu, terutama bagi Pusat Rehabilitasi yang masih menggunakan cara konvensional untuk sistem pencatatan kemajuan pasien. Dalam aplikasi ini, pasien akan mendapatkan riwayat hasil rehabilitasi yang dikemas dalam bentuk catatan kemajuan rehabilitasi sehingga pasien dapat terus memantau perkembangannya. Selain itu, aplikasi web ini juga akan dirancang dengan antarmuka pemrograman aplikasi untuk memudahkan pengembang selanjutnya untuk mengembangkannya menjadi perangkat mobile atau tablet.</p>
                    </span>
                </div>
                <div class="col-md-7">
                    <img src="images/instruction.svg" alt="instruction" style="max-width: 80%;">
                </div>
                {{-- <div class="col-md-5"><span class="pull-right">$42</span></div> --}}
            </div>
        </div>
        <br>
        <div class="content px-3">
            <h2>Rancangan Aplikasi Secara Umum</h2>
            <img class="img-fluid" src="images/rancangan_app.png" alt="rancangan_aplikasi">
            <p class="text-justify">Aplikasi Enkaku ini diharapkan dapat membantu pihak pusat rehabilitasi untuk menyediakan data report terkait progress kemajuan setiap pasien yang mengalami proses rehabilitasi medis. Hal ini akan sangat membantu, terutama bagi pusat kesehatan yang masih menggunakan metode konvensional untuk sistem pencatatan kemajuan pasien. Dalam aplikasi ini, pasien akan memperoleh catatan riwayat hasil rehabilitasi yang dikemas dalam bentuk catatan progres rehabilitasi sehingga pasien dapat terus memantau progres kemajuannya. Proses pengembangan yang akan dilakukan adalah melakukan integrasi agar aplikasi siap menerima data secara real time langsung dari perangkat telerehabilitasi</p>
        </div>
        <div class="content px-3">
          <h2>Informasi Seputar Grafik!</h2>
          <h4 class="text-justify">A. Grafik Kecepatan</h4>
          <img class="img-fluid" src="images/velocity chart.png" alt="velocity_chart">
          <p class="text-justify">Kecepatan diatur berdasarkan set point yang ditentukan di awal sebelum proses rehabilitasi. Set point kecepatan yang telah ditentukan akan menjadi perintah bagi mikrokontroler untuk menggerakkan motor. Kemudian ketika motor bergerak berdasarkan ROM yang telah ditentukan maka akan dihasilkan data pengukuran sudut dari lintasan. Perubahan torsi juga diukur untuk menentukan kecepatan motor dan juga dapat digunakan untuk membaca efek gerakan yang dihasilkan oleh torsi otot subjek. Ketika subjek mampu menghasilkan turque otot, subjek telah mendapatkan manfaat dari proses rehabilitasi.</p>
          <p class="text-justify">Kemudian untuk kecepatan, terlebih dahulu ditentukan terlebih dahulu set point untuk kecepatan yang diinginkan. Kemudian ketika motor dijalankan dengan perintah mikrokontroler maka motor akan bergerak dengan kecepatan yang dimasukan. Hasil reduksi antara kecepatan pada set point dengan kecepatan terukur merupakan nilai error yang akan menjadi input untuk kontroler PID. Keluaran dari perhitungan PID pada sudut ini akan menjadi kontrol bagi motor untuk mengkompensasi nilai error sehingga nilai kecepatan sebenarnya akan sedekat mungkin dengan set point. Menggunakan kontroler PID untuk mengatur kecepatan juga akan menghasilkan kecepatan yang lebih stabil. Kemudian dilakukan pengujian dengan memanfaatkan hasil sudut dan kecepatan menggunakan kontroler PID dan tanpa kontroler PID.</p>
          <p>Pengujian pada subjek dilakukan dengan menempelkan exoskeleton pada subjek. Tangan pasien dalam keadaan pasif sedangkan eksoskeleton aktif sebagai kekuatan eksternal. Kemudian exoskeleton menggerakkan tangan pasien. Sendi siku digerakkan dalam fleksi-ekstensi sedangkan sendi bahu digerakkan dalam abduksi-adduksi dan fleksi-ekstensi. Urutan gerakan fleksi-ekstensi bahu dan siku dapat dilakukan secara berurutan atau paralel. Lintasan sudut exoskeleton ditentukan berdasarkan ROM untuk masing-masing pola gerakan dan juga kecepatan diatur langsung oleh terapis dengan cara perlahan-lahan meminta subjek untuk menggerakkan tangan dengan memegang pegangan exoskeleton atau bergerak mengikuti gerakan exoskeleton. Ketika gerakan pasien terdeteksi yang menghasilkan torsi otot, pasien mendapat manfaat dari rehabilitasi. Data dicatat dan dikirim ke komputer untuk pemantauan yang kemudian digunakan sebagai pertimbangan untuk perawatan pelatihan lebih lanjut.</p>
          <h4 class="text-justify">B. Grafik Arus</h4>
          <img src="images/current chart.png" alt="current_chart" style="max-width: 95%">
          <p>Arus dalam motor diukur untuk menentukan perubahan torsi dan juga dapat digunakan untuk membaca efek gerakan yang dihasilkan oleh torsi otot subjek. Perubahan arus pada motor ketika torsi diterapkan terhadap arah putaran akan dideteksi oleh sensor arus yang dipasang pada motor. Pengujian deteksi gerakan torsi dan volunter pada subjek dilakukan dengan memantau perubahan arus motor saat tangan subjek pasif dan memanfaatkannya dengan perubahan arus motor saat tangan subjek aktif. Eksperimen dilakukan pada dua subjek normal dengan informasi sebagai berikut:</p>
          <li>
            Fleksi siku dan bahu tanpa voluntary movement merupakan kondisi dimana tangan pasien pasif dan tangan digerakkan sepenuhnya oleh exoskeleton.
          </li>
          <li>
            Fleksi siku dan bahu dengan voluntary movement merupakan kondisi ketika tangan pasien ikut bergerak seiring dengan gerakan exoskeleton.
          </li>
          <li>
            Abduksi bahu tanpa voluntary movement adalah kondisi dimana tangan pasien pasif dan tangan digerakkan sepenuhnya oleh exoskeleton.
          </li>
          <li>
            Abduksi bahu dengan voluntary movement adalah suatu kondisi ketika tangan pasien juga ikut bergerak seiring dengan gerakan exoskeleton.
          </li>
          <li>
            Adduksi bahu tanpa voluntary movement adalah kondisi dimana tangan pasien pasif dan tangan digerakkan sepenuhnya oleh exoskeleton.
          </li>
          <li>
            Adduksi bahu dengan voluntary movement adalah suatu kondisi di mana tangan memberikan gaya dengan menahan eksoskeleton yang mirip dengan gerakan abduksi.
          </li>
          <br>
          <p>
            Pada pengujian perubahan arus motor didapatkan bahwa apabila dilakukan gerakan menjauhi arah gravitasi (fleksi dan abduksi), perubahan arus akan lebih besar bila tidak ada voluntary movement. Ketika perubahan arus semakin kecil dan bahkan tidak ada perubahan arus, dapat dikatakan bahwa torsi akibat gerakan sukarela subjek semakin besar. Sebaliknya, ketika gerakannya searah dengan gravitasi (perpanjangan dan adduksi), perubahan arus akan lebih kecil dan bahkan jika tidak ada gerakan sukarela, dan sebaliknya ketika subjek berusaha menahan gerakan kerangka luar. (artinya subjek menahan tangannya di tempatnya atau bahkan berlawanan arah dengan gerakan kerangka luar). maka perubahan arus pada motor akan semakin besar dan dapat dikatakan torsi akibat voluntary movement subjek semakin besar.
          </p>
          <h4 class="text-justify">C. Grafik Trayektori</h4>
          <img src="images/trajectory chart.png" alt="trajectory-chart" style="max-width: 95%">
          <p>Sebelum menentukan target lintasan, perlu diperhatikan nilai sensor maksimum dan minimum saat ekstremitas atas digerakkan sesuai lintasan yang diinginkan. Berdasarkan data yang direkam oleh sensor, gerakan siklik fleksi siku akan membentuk fungsi kosinus. Sudut yang terekam saat tangan lurus ke bawah adalah 170 derajat, sedangkan siku yang ditekuk adalah 90 derajat.</p>
          <p class="font-weight-bold">Pada grafik terlihat jelas grafik merah adalah target lintasan, jika target lintasan berupa cos pada 170-90 maka pasien melakukan gerakan 'fleksi', tetapi jika target lintasan memiliki sudut 60- 10 kemudian pasien melakukan gerakan 'ekstensi'</p>
        </div>
      </div>      
    </div>
  </main>

@endsection
