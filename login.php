<?php
require_once 'config/db.php';
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {
        $error = "Please enter both email and password.";
    } else {
        $stmt = $pdo->prepare("SELECT id, name, password, role FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch();
            if (password_verify($password, $row['password'])) {
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user_name'] = $row['name'];
                $_SESSION['role'] = $row['role'];

                header("location: dashboard.php");
                exit;
            } else {
                $error = "Invalid password.";
            }
        } else {
            $error = "No account found with that email.";
        }
    }
}
include 'includes/header.php';
?>

<div class="container d-flex align-items-center justify-content-center" style="min-height: 80vh;">
    <div class="glass-panel p-5" style="width: 100%; max-width: 450px;">
        <div class="text-center mb-4">
            <h2 class="fw-bold text-primary">Welcome Back</h2>
            <p class="text-muted">Login to access your personalized dashboard</p>
        </div>

        <?php if ($error): ?>
            <div class="alert alert-danger custom-alert"><?php echo $error; ?></div>
        <?php endif; ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="mb-4">
                <label for="email" class="form-label text-light">Email Address</label>
                <div class="input-group">
                    <span class="input-group-text bg-transparent border-end-0 text-muted"
                        style="border-color: rgba(255,255,255,0.1);"><i class="fas fa-envelope"></i></span>
                    <input type="email" name="email" class="form-control form-control-custom border-start-0 ps-0"
                        id="email" required>
                </div>
            </div>

            <div class="mb-4">
                <label for="password" class="form-label text-light">Password</label>
                <div class="input-group">
                    <span class="input-group-text bg-transparent border-end-0 text-muted"
                        style="border-color: rgba(255,255,255,0.1);"><i class="fas fa-lock"></i></span>
                    <input type="password" name="password" class="form-control form-control-custom border-start-0 ps-0"
                        id="password" required>
                </div>
            </div>

            <div class="d-grid gap-2 mb-4">
                <button type="submit" class="btn btn-premium w-100">Login</button>
            </div>

            <div class="text-center">
                <p class="text-muted">Don't have an account? <a href="register.php" class="text-primary fw-bold">Sign
                        Up</a></p>
            </div>
        </form>

        <!-- Quick Admin Login Hint for Demo -->
        <div class="mt-4 pt-3 border-top border-secondary text-center">
            <small class="text-muted fst-italic">Demo Admin: admin@hotel.com / password</small>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>