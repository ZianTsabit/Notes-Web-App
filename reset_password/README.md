# Reset Password

Fungsi dimana *user* dapat mengubah *password*-nya ketika lupa.

Berikut cara kerja *Reset Password*:

```
{ Di Halaman Reset Password Page }
 1. Check username exist
     [T] Send OTP to email. Save OTP in Session.
     [F] Display Error message. END.
 2. Check OTP
     [T] Change Password.
     [F] Back to 2.
```

Pengiriman OTP melalui email menggunakan fungsi bawaan *PHP* yaitu `mail()` yang membutuhkan program `sendmail`.

## Mempersiapkan `sendmail`

Langkah persiapan `sendmail` dapat dilihat di [link ini](https://linuxconfig.org/configuring-gmail-as-sendmail-email-relay)

Karena fitur *Allow less secure app* telah dinonaktifkan, gmail perlu memiliki *App Password*. Detailnya dapat dilihat di [link ini](https://support.google.com/accounts/answer/185833)
