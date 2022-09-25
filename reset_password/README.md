# Reset Password

Fungsi dimana *user* dapat mengubah *password*-nya ketika lupa.

Berikut alur *Reset Password*:

```
[reset_pass_page]   Input User Name
[send_otp]          Check UserName, send OTP to email
[reset_pass_otp]    Input OTP
[check_otp]         Check OTP, delete OTP in SESSION
[change_pass_page]  Input New Password
[change_password]   Check New Password, Update Record in Database
```

Jika terjadi kesalahan pada salah satu tahap `Check`, maka akan kembali ke halaman diatasnya.

Pengiriman OTP melalui email menggunakan fungsi bawaan *PHP* yaitu `mail()` yang membutuhkan program `sendmail`.

## Mempersiapkan `sendmail`

Langkah persiapan `sendmail` dapat dilihat di [link ini](https://linuxconfig.org/configuring-gmail-as-sendmail-email-relay)

Karena fitur *Allow less secure app* telah dinonaktifkan, gmail perlu memiliki *App Password*. Detailnya dapat dilihat di [link ini](https://support.google.com/accounts/answer/185833)
