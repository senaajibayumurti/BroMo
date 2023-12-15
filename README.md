<div align="center">
  <img src="https://github.com/senaajibayumurti/BroMo/blob/main/public/images/BroMo%20Logografi.png" alt="BroMo Logo"
      alt="BroMo Logo">
</div>

<p>
    Sistem Informasi Monitoring Kandang Ayam adalah sebuah perangkat lunak yang dirancang untuk membantu peternak ayam dalam mengawasi dan mengelola kandang ayam secara efisien. Sistem ini akan memungkinkan pengguna untuk memantau berbagai parameter penting seperti tanggal, jam, suhu, kelembapan, amoniak, pakan, minum, bobot, populasi, luas kandang, dan klasifikasi jenis ayam. Selain itu, sistem juga akan memiliki fitur tambahan berupa forecasting untuk memprediksi dan memonitoring ayam yang mati, sehingga peternak dapat mengambil tindakan yang diperlukan dengan cepat.
</p>

## PENJELASAN
Website BroMo dikembangkan menggunakan bahasa php, css dan javascript dengan memanfaatkan framework Laravel serta memanfaatkan library Bootstrap.

Tampilan halaman yang menggunakan template Blade yang disediakan oleh Laravel dalam folder views terbagi menjadi lima kategori, yaitu:
1. [auth](https://github.com/senaajibayumurti/BroMo/tree/main/resources/views/auth)
   <p>
       Menyimpan file Blade untuk tampilan log in, sign in dan profile
   </p>
3. [components](https://github.com/senaajibayumurti/BroMo/tree/main/resources/views/components)
   <p>
       Menyimpan file Blade untuk tampilan navbar dan sidebar yang digunakan dalam semua layout.
   </p>
5. [farmer](https://github.com/senaajibayumurti/BroMo/tree/main/resources/views/farmer)
   <p>
       Menyimpan file Blade untuk tampilan input data dan input panen yang merupakan menu eksklusif untuk peternak.
   </p>
7. [layouts](https://github.com/senaajibayumurti/BroMo/tree/main/resources/views/layouts)
   <p>
       Menyimpan file Blade untuk tampilan app sebagai master page dan dashboard, notifikasi, dan notifikasi detail yang tampilannya sama untuk peternak dan pemilik kandang.
   </p>
9. [owner](https://github.com/senaajibayumurti/BroMo/tree/main/resources/views/owner)
   <p>
       Menyimpan file Blade untuk tampilan berbagai menu eksklusif untuk pemilik kandang yaitu forecasting, klasifikasi, rekap-data, panen, kandang, pekerja dan tampilan lain.
   </p>

Pengaturan tampilan website bergantung besar dengan library bootstrap, namun untuk pengembangan BroMo yang juga memerlukan eksklusifitas desain website, pengembang menyiapkan CSS class untuk menerapkan gaya tertentu menyesuaikan identitas BroMo. CSS class diatur dalam file [style.css]() dan berikut penjelasannya:



## HOW TO RUN
1. Go to aziz's branch
   ```
   git checkout aziz
   ```
3. Install Dependencys
   ```
   composer i
   ```
   ```
   npm i
   ```
3. Change env.example to .env (do adjustment to the database name)
4. run the backend project from https://github.com/Whyaziz/Backend-BroMo
5. run this project
   ```
   php artisan serve
   ```
6. login with account
   - owner <br>
     Username : whyaziz <br>
     Password : kkny5056 <br>
   - penjaga <br>
     Username : bimacst, wildancst, yudacst, bruno <br>
     Password : password <br>
