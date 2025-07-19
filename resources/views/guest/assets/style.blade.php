<style>
    /* Custom animations without JavaScript */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes slideInLeft {
        from {
            opacity: 0;
            transform: translateX(-30px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(30px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes scaleIn {
        from {
            opacity: 0;
            transform: scale(0.9);
        }

        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    .animate-fade-in-up {
        animation: fadeInUp 0.8s ease-out forwards;
    }

    .animate-fade-in {
        animation: fadeIn 1s ease-out forwards;
    }

    .animate-slide-in-left {
        animation: slideInLeft 0.8s ease-out forwards;
    }

    .animate-slide-in-right {
        animation: slideInRight 0.8s ease-out forwards;
    }

    .animate-scale-in {
        animation: scaleIn 0.6s ease-out forwards;
    }

    /* Delay animations */
    .delay-100 {
        animation-delay: 0.1s;
    }

    .delay-200 {
        animation-delay: 0.2s;
    }

    .delay-300 {
        animation-delay: 0.3s;
    }

    .delay-400 {
        animation-delay: 0.4s;
    }

    .delay-500 {
        animation-delay: 0.5s;
    }

    .delay-600 {
        animation-delay: 0.6s;
    }

    /* Gradient backgrounds */
    .bg-gradient-peach {
        background: linear-gradient(135deg, #fed7aa 0%, #fde68a 100%);
    }

    .bg-gradient-sage {
        background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
    }

    .bg-gradient-lavender {
        background: linear-gradient(135deg, #e9d5ff 0%, #c4b5fd 100%);
    }

    .bg-gradient-dusty {
        background: linear-gradient(135deg, #fecaca 0%, #fed7d7 100%);
    }

    /* Organic shapes */
    .shape-blob {
        border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
    }

    .shape-organic {
        border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
    }

    /* Tambahkan ini ke CSS Anda */
    section {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.8s ease-out;
    }

    section.animate-section {
        opacity: 1;
        transform: translateY(0);
    }

    /* Efek hover menu lebih smooth */
    nav a {
        position: relative;
        transition: all 0.3s ease;
    }

    nav a::after {
        content: '';
        position: absolute;
        bottom: -4px;
        left: 0;
        width: 0;
        height: 2px;
        background-color: #f97316;
        transition: width 0.3s ease;
    }

    nav a:hover::after {
        width: 100%;
    }

    nav a.text-orange-500::after {
        width: 100%;
    }

    /* Animasi khusus untuk setiap section */
    #heroSection.animate-section {
        animation: fadeInUp 0.8s ease-out forwards;
    }

    #kategori.animate-section {
        animation: slideInLeft 0.8s ease-out forwards;
    }

    #review.animate-section {
        animation: slideInRight 0.8s ease-out forwards;
    }

    #kontak.animate-section {
        animation: scaleIn 0.6s ease-out forwards;
    }

    /* Tambahkan ini ke CSS Anda */
    .mobile-menu {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease-out;
    }

    .mobile-menu.open {
        max-height: 500px;
        /* Sesuaikan dengan kebutuhan */
    }

    .hamburger {
        transition: all 0.3s ease;
    }

    .hamburger.active span:nth-child(1) {
        transform: rotate(45deg) translate(5px, 5px);
    }

    .hamburger.active span:nth-child(2) {
        opacity: 0;
    }

    .hamburger.active span:nth-child(3) {
        transform: rotate(-45deg) translate(7px, -6px);
    }
</style>
