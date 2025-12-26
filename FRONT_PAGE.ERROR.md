Siap, saya jelaskan **pelan-pelan, langkah demi langkah**, anggap kamu **belum pernah buka phpMyAdmin** sama sekali 👍
Ikuti urutan ini, **jangan lompat langkah**.

---

# 🔧 TUJUAN CARA 6 (Supaya Tidak Bingung)

Kita akan **menghapus template Front Page yang rusak** dari database.
Setelah dihapus:

* WordPress **otomatis membuat template baru**
* Front page **tidak blank lagi**

⚠️ Ini **AMAN**, asal **hanya hapus 1 baris** yang benar.

---

# 🟢 LANGKAH 1 — Masuk ke phpMyAdmin

1. Login ke **cPanel hosting**
2. Cari menu **phpMyAdmin**
3. Klik → akan terbuka tab baru

📌 Kalau tidak ada phpMyAdmin, beri tahu saya ya.

---

# 🟢 LANGKAH 2 — Pilih Database WordPress

Di sebelah **kiri phpMyAdmin**:

1. Akan terlihat **nama database** (contoh: `u123456_wp`)
2. Klik **database WordPress kamu**

❓ Tidak tahu database mana?

* Buka file `wp-config.php`
* Cari:

```php
define('DB_NAME', 'nama_database');
```

---

# 🟢 LANGKAH 3 — Buka Tabel `wp_posts`

1. Setelah database dipilih
2. Cari tabel bernama:

   ```
   wp_posts
   ```

⚠️ Prefix bisa beda:

* `wp_posts`
* `wp3_posts`
* `xyz_posts`

👉 Yang penting **akhiran `_posts`**

Klik tabel tersebut.

---

# 🟢 LANGKAH 4 — Filter Data Template (Bagian Penting)

Setelah tabel terbuka:

1. Klik tab **Search** (di atas)
2. Isi kolom seperti ini:

### 🔍 Filter pertama

* **Field:** `post_type`
* **Operator:** `=`
* **Value:**

  ```
  wp_template
  ```

### 🔍 Filter kedua

* **Field:** `post_name`
* **Operator:** `=`
* **Value:**

  ```
  front-page
  ```

3. Klik **Go / Cari**

---

# 🟢 LANGKAH 5 — Hapus 1 Baris Template

Jika benar:

* Akan muncul **1 baris saja**

Pastikan:

* `post_type` = `wp_template`
* `post_name` = `front-page`

Lalu:

1. Klik **Delete**
2. Konfirmasi **OK**

❗ JANGAN hapus yang lain.

---

# 🟢 LANGKAH 6 — Cek Website

1. Buka homepage
2. Refresh (Ctrl + F5)

🎉 Biasanya langsung normal
atau muncul template default.

---

# 🛑 JIKA DATA TIDAK KETEMU

Coba ganti:

* `front-page`
  menjadi:
* `home`
* `index`

Masih tidak ada? Beri tahu saya.

---

# 🔥 CATATAN PENTING

* Template FSE disimpan di **database**, bukan file
* Menghapus ini **lebih aman** daripada reset theme
* Tidak menghapus konten / post / page
