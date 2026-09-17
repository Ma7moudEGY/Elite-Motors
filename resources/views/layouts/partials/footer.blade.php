<footer class="border-top border-secondary mt-auto">
    <style>
        .footer-social-link {
            color: #718399 !important;
            text-decoration: none;
            font-size: 0.95rem;
            transition: color 0.2s ease;
        }

        .footer-social-link:hover,
        .footer-social-link:focus {
            color: #9aabba !important;
        }

        .footer-social-link i {
            font-size: 1.25rem;
        }
    </style>

    <div class="container py-5">
        <div class="row g-4">
            <div class="col-lg-5">
                <a href="{{ route('index') }}" class="text-warning text-decoration-none fw-bold fs-5 text-uppercase">Elite Motors</a>
                <p class="text-secondary mt-3 mb-0">Premium cars, trusted owners, and a smoother way to get behind the wheel.</p>
            </div>
            <div class="col-6 col-lg-3">
                <h2 class="h6 text-warning text-uppercase fw-bold">Explore</h2>
                <a href="{{ route('index') }}" class="d-block text-secondary text-decoration-none mb-2">Home</a>
                <a href="{{ route('about') }}" class="d-block text-secondary text-decoration-none mb-2">About</a>
                <a href="{{ route('cars.index') }}" class="d-block text-secondary text-decoration-none">Our Cars</a>
            </div>
            <div class="col-6 col-lg-4">
                <h2 class="h6 text-warning text-uppercase fw-bold">Contact</h2>
                <p class="text-secondary mb-2"><i class="fas fa-location-dot text-warning me-2"></i>Alexandria, Gleem</p>
                <p class="text-secondary mb-2"><i class="fas fa-envelope text-warning me-2"></i>EliteMotors@gmail.com</p>
                <p class="text-secondary mb-0"><i class="fas fa-phone text-warning me-2"></i>+20 1 234 567 88</p>
            </div>
        </div>

        <section class="d-flex flex-wrap justify-content-center gap-2 mt-4" aria-label="Social media links">
            <a class="footer-social-link d-inline-flex align-items-center justify-content-center m-1" href="https://www.facebook.com/" target="_blank" rel="noopener noreferrer" aria-label="Elite Motors on Facebook" title="Facebook">
                <i class="fab fa-facebook-f" aria-hidden="true"></i>
            </a>
            <a class="footer-social-link d-inline-flex align-items-center justify-content-center m-1" href="https://twitter.com/" target="_blank" rel="noopener noreferrer" aria-label="Elite Motors on Twitter" title="Twitter">
                <i class="fab fa-twitter" aria-hidden="true"></i>
            </a>
            <a class="footer-social-link d-inline-flex align-items-center justify-content-center m-1" href="https://www.google.com/" target="_blank" rel="noopener noreferrer" aria-label="Elite Motors on Google" title="Google">
                <i class="fab fa-google" aria-hidden="true"></i>
            </a>
            <a class="footer-social-link d-inline-flex align-items-center justify-content-center m-1" href="https://www.instagram.com/" target="_blank" rel="noopener noreferrer" aria-label="Elite Motors on Instagram" title="Instagram">
                <i class="fab fa-instagram" aria-hidden="true"></i>
            </a>
            <a class="footer-social-link d-inline-flex align-items-center justify-content-center m-1" href="https://www.linkedin.com/" target="_blank" rel="noopener noreferrer" aria-label="Elite Motors on LinkedIn" title="LinkedIn">
                <i class="fab fa-linkedin" aria-hidden="true"></i>
            </a>
            <a class="footer-social-link d-inline-flex align-items-center justify-content-center m-1" href="https://github.com/" target="_blank" rel="noopener noreferrer" aria-label="Elite Motors on GitHub" title="GitHub">
                <i class="fab fa-github" aria-hidden="true"></i>
            </a>
        </section>
    </div>
    <div class="border-top border-secondary py-3">
        <div class="container d-flex flex-wrap justify-content-between gap-2 text-secondary small">
            <span>&copy; {{ date('Y') }} Elite Motors</span>
            <span>Drive something worth remembering.</span>
        </div>
    </div>
</footer>
