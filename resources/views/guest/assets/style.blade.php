<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

    :root {
        --bg-color: #ffffff;
        --text-color: #1f2937;
        --surface-color: #f8fafc;
        --sidebar-bg: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
        --card-bg: linear-gradient(135deg, #ffffff 0%, #fdfdfd 100%);
        --border-color: #e2e8f0;
        --accent-color: linear-gradient(135deg, #d4a574 0%, #c49660 100%);
        --accent-hover: linear-gradient(135deg, #b88660 0%, #a6754a 100%);
        --success-color: linear-gradient(135deg, #10b981 0%, #059669 100%);
        --warning-color: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
        --info-color: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        --danger-color: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
        --purple-gradient: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);
        --green-gradient: linear-gradient(135deg, #10b981 0%, #059669 100%);
        --blue-gradient: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        --amber-gradient: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
        --glass-bg: rgba(255, 255, 255, 0.25);
        --glass-border: rgba(255, 255, 255, 0.18);
    }

    .dark {
        --bg-color: #0f172a;
        --text-color: #f1f5f9;
        --surface-color: #1e293b;
        --sidebar-bg: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
        --card-bg: linear-gradient(135deg, #334155 0%, #1e293b 100%);
        --border-color: #475569;
        --glass-bg: rgba(15, 23, 42, 0.4);
        --glass-border: rgba(255, 255, 255, 0.1);
    }

    body {
        font-family: 'Inter', sans-serif;
        background-color: var(--bg-color);
        color: var(--text-color);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .glass-card {
        background: var(--card-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 1rem;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .glass-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
    }

    .btn-accent {
        background: var(--accent-color);
        color: white;
        border-radius: 0.75rem;
        padding: 0.75rem 1.5rem;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: none;
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }

    .btn-accent::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s;
    }

    .btn-accent:hover::before {
        left: 100%;
    }

    .btn-accent:hover {
        background: var(--accent-hover);
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(212, 165, 116, 0.3);
    }

    .nav-item {
        color: var(--text-color);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        opacity: 0.8;
        position: relative;
        overflow: hidden;
    }

    .nav-item:hover {
        background: var(--glass-bg);
        backdrop-filter: blur(10px);
        opacity: 1;
        transform: translateX(4px);
    }

    .hero-gradient {
        background: linear-gradient(135deg, var(--bg-color) 0%, var(--surface-color) 100%);
    }

    .floating-element {
        animation: float 6s ease-in-out infinite;
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-20px);
        }
    }

    .fade-in {
        animation: fadeIn 0.6s ease-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .parallax-bg {
        background-image: linear-gradient(45deg, rgba(212, 165, 116, 0.1) 25%, transparent 25%),
            linear-gradient(-45deg, rgba(212, 165, 116, 0.1) 25%, transparent 25%);
        background-size: 20px 20px;
        background-position: 0 0, 10px 10px;
    }
</style>
