<?php
require_once 'config/db.php';
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    $phone = trim($_POST['phone']);

    if (empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
        $error = "Please fill in all required fields.";
    } elseif ($password != $confirm_password) {
        $error = "Passwords do not match.";
    } else {
        // Check if email exists
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $error = "This email is already registered.";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $role = 'customer';

            $sql = "INSERT INTO users (name, email, password, role, phone) VALUES (:name, :email, :password, :role, :phone)";
            if ($stmt = $pdo->prepare($sql)) {
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $hashed_password);
                $stmt->bindParam(':role', $role);
                $stmt->bindParam(':phone', $phone);

                if ($stmt->execute()) {
                    header("location: login.php");
                    exit;
                } else {
                    $error = "Something went wrong. Please try again.";
                }
            }
        }
    }
}
include 'includes/header.php';
?>

<div class="container d-flex align-items-center justify-content-center my-5">
    <div class="glass-panel p-5" style="width: 100%; max-width: 500px;">
        <div class="text-center mb-4">
            <h2 class="fw-bold text-primary">Create Account</h2>
            <p class="text-muted">Join LuxeStay for premium benefits</p>
        </div>

        <?php if ($error): ?>
            <div class="alert alert-danger custom-alert"><?php echo $error; ?></div>
        <?php endif; ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="mb-3">
                <label class="form-label text-light">Full Name</label>
                <input type="text" name="name" class="form-control form-control-custom" required>
            </div>

            <div class="mb-3">
                <label class="form-label text-light">Email Address</label>
                <input type="email" name="email" class="form-control form-control-custom" required>
            </div>

            <div class="mb-3">
                <label class="form-label text-light">Phone Number</label>
                <input type="tel" name="phone" class="form-control form-control-custom">
            </div>

            <div class="mb-3">
                <label class="form-label text-light">Password</label>
                <input type="password" name="password" class="form-control form-control-custom" required>
            </div>

            <div class="mb-4">
                <label class="form-label text-light">Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control form-control-custom" required>
            </div>

            <div class="d-grid gap-2 mb-4">
                <button type="submit" class="btn btn-premium w-100">Register</button>
            </div>

            <div class="text-center">
                <p class="text-muted">Already have an account? <a href="login.php"
                        class="text-primary fw-bold">Login</a></p>
            </div>
        </form>
    </div>
</div>

<?php include 'includes/footer.php'; ?>