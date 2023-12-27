
<?php
session_start();

// Gerçek kullanıcı bilgileri
$correctUsername = "Asli";
$correctPassword = "123";

$errors = array(); // Hataları saklamak için dizi

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Giriş veya kayıt formu gönderildiğinde

    // Kullanıcı adı ve şifreyi al
    $username = isset($_POST["username"]) ? $_POST["username"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";

    // Giriş formu
    if (isset($_POST["login"])) {
        // Kullanıcı adı ve şifre doğruysa
        if ($username === $correctUsername && $password === $correctPassword) {
            // Oturum başlat
            $_SESSION["username"] = $username;

            // Ana sayfaya yönlendir
            header("Location: index.html");
            exit();
        } else {
            // Hatalı giriş, hata mesajını diziye ekle
            $errors[] = "Invalid username or password. Please try again.";
        }
    }

    // Kayıt formu
    elseif (isset($_POST["register"])) {
        // Kayıt işlemleri burada yapılabilir
        // Örneğin, kullanıcı bilgilerini veritabanına ekleyebilirsiniz
        // Ancak, bu örnekte sadece basit bir mesaj gösteriliyor
        echo "Registration Successful! You can now log in.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Register Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-color: #ffc0cb; /* Pembe arka plan rengi */
        }
    </style>
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">Giriş</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Kayıt</a>
                            </li>
                        </ul>

                        <div class="tab-content mt-3">
                            <!-- Giriş Formu -->
                            <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                                <h2 class="text-center mb-4">Giriş</h2>

                                <form action="index.html" method="post">
                                    <?php if (!empty($errors)): ?>
                                        <div class="alert alert-danger">
                                            <?php foreach ($errors as $error): ?>
                                                <p><?php echo $error; ?></p>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>

                                    <div class="form-group">
                                        <label for="username">Eposta Adresini Giriniz</label>
                                        <input type="text" name="username" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Şifrenizi Giriniz</label>
                                        <input type="password" name="password" class="form-control" required>
                                    </div>

                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="logCheck">
                                        <label class="form-check-label" for="logCheck">Beni Hatırla</label>
                                    </div>

                                    <button type="submit" name="login" class="btn btn-primary btn-block">Giriş</button>
                                </form>

                                <div class="text-center mt-3">
                                    <a href="#">Şifreni mi unuttun?</a>
                                </div>
                            </div>

                            <!-- Kayıt Formu -->
                            <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                <h2 class="text-center mb-4">Kayıt</h2>

                                <form action="index.php" method="post">
                                    <div class="form-group">
                                        <label for="register-username">Kullanıcı Adı</label>
                                        <input type="text" name="register-username" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="register-email">Eposta Adresi</label>
                                        <input type="email" name="register-email" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="register-password">Şifre Oluşturunuz</label>
                                        <input type="password" name="register-password" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="confirm-password">Şifrenizi Onaylayın</label>
                                        <input type="password" name="confirm-password" class="form-control" required>
                                    </div>

                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="termCon">
                                        <label class="form-check-label" for="termCon">Onayla</label>
                                    </div>

                                    <button type="submit" name="register" class="btn btn-success btn-block">Kayıt Ol</button>
                                </form>
                            </div>
                        </div>

                        <div class="text-center mt-3">
                            <span class="text">Zaten üye misin? <a href="#login" data-toggle="tab">Giriş Yap</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
