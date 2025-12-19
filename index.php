<?php
session_start();
include 'includes/header.php';
?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-overlay"></div>
    <div class="container hero-content text-center">
        <h1 class="hero-title" style="color: var(--primary-color);">Welcome to BKRESORT </h1>
        <p class="hero-subtitle text-white">Experience the Epitome of Luxury and Culinary Excellence..</p>
        <div class="d-flex justify-content-center gap-3">
            <a href="#rooms" class="btn btn-premium">Book a Room</a>
            <a href="#dining" class="btn btn-premium">Order Food</a>
        </div>
    </div>
</section>

<!-- Rooms Section -->
<section id="rooms" class="section-padding">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-4 fw-bold">Our Luxurious Rooms</h2>
            <div class="divider mx-auto my-3" style="width: 100px; height: 3px; background: var(--primary-color);">
            </div>
            <p class="text-muted">Designed for comfort, crafted for luxury.</p>
        </div>

        <div class="row g-4">
            <!-- Single Room -->
            <div class="col-md-4">
                <div class="card glass-panel h-100 feature-card border-0">
                    <img src="assets/images/room-deluxe.png" class="card-img-top" alt="Single Room"
                        style="height: 250px; object-fit: cover;">
                    <div class="card-body text-center p-4">
                        <h4 class="card-title mb-3">Single Luxury</h4>
                        <p class="card-text text-muted mb-4">Perfect for the solo traveler. Enjoy premium amenities and
                            a cozy atmosphere.</p>
                        <h5 class="text-primary mb-3">$50 / Night</h5>
                        <a href="login.php" class="btn btn-outline-light rounded-pill px-4">Book Now</a>
                    </div>
                </div>
            </div>

            <!-- Double Room -->
            <div class="col-md-4">
                <div class="card glass-panel h-100 feature-card border-0">
                    <img src="assets/images/room-deluxe.png" class="card-img-top" alt="Double Room"
                        style="height: 250px; object-fit: cover;">
                    <div class="card-body text-center p-4">
                        <h4 class="card-title mb-3">Double Suite</h4>
                        <p class="card-text text-muted mb-4">Spacious comfort for two. Featuring a king-size bed and
                            city views.</p>
                        <h5 class="text-primary mb-3">$80 / Night</h5>
                        <a href="login.php" class="btn btn-outline-light rounded-pill px-4">Book Now</a>
                    </div>
                </div>
            </div>

            <!-- Deluxe Room -->
            <div class="col-md-4">
                <div class="card glass-panel h-100 feature-card border-0">
                    <img src="assets/images/room-deluxe.png" class="card-img-top" alt="Deluxe Room"
                        style="height: 250px; object-fit: cover;">
                    <div class="card-body text-center p-4">
                        <h4 class="card-title mb-3">Royal Deluxe</h4>
                        <p class="card-text text-muted mb-4">The ultimate luxury experience. Includes a private lounge
                            and butler service.</p>
                        <h5 class="text-primary mb-3">$150 / Night</h5>
                        <a href="login.php" class="btn btn-outline-light rounded-pill px-4">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Dining Section -->
<section id="dining" class="section-padding" style="background: rgba(255,255,255,0.02);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <img src="assets/images/food-plate.png" alt="Dining" class="img-fluid rounded-4 shadow-lg glass-panel">
            </div>
            <div class="col-lg-6 ps-lg-5">
                <h2 class="display-4 fw-bold mb-4">Exquisite Dining</h2>
                <h4 class="text-primary mb-4">Taste the Extraordinary</h4>
                <p class="text-muted lead mb-4">Our world-class chefs prepare every dish with passion and the finest
                    ingredients. Whether you crave local delicacies or international cuisine, our menu is designed to
                    delight your senses.</p>
                <div class="d-flex gap-3">
                    <div class="glass-panel p-3 text-center" style="width: 100px;">
                        <i class="fas fa-utensils fs-3 text-primary mb-2"></i>
                        <small class="d-block text-white">Gourmet</small>
                    </div>
                    <div class="glass-panel p-3 text-center" style="width: 100px;">
                        <i class="fas fa-wine-glass-alt fs-3 text-primary mb-2"></i>
                        <small class="d-block text-white">Bar</small>
                    </div>
                    <div class="glass-panel p-3 text-center" style="width: 100px;">
                        <i class="fas fa-coffee fs-3 text-primary mb-2"></i>
                        <small class="d-block text-white">Cafe</small>
                    </div>
                </div>
                <a href="login.php" class="btn btn-premium mt-5">View Menu & Order</a>
            </div>
        </div>
    </div>
</section>


<?php include 'includes/footer.php'; ?>
