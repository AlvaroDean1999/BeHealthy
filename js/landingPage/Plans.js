document.addEventListener('DOMContentLoaded', function () {
    const plans = document.querySelectorAll('.plans__plansContainer > div');

    window.addEventListener('scroll', function () {
        plans.forEach((plan, index) => {
            const topPosition = plan.getBoundingClientRect().top;
            const windowHeight = window.innerHeight;
            if (topPosition < windowHeight / 2) { // Si el elemento está en la mitad superior de la ventana
                setTimeout(() => {
                    plan.classList.add('show');
                }, index * 300); // Añade un retraso progresivo
            }
        });
    });
});