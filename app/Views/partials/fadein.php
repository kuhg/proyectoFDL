<script>
document.addEventListener("DOMContentLoaded", () => {
  const elementos = document.querySelectorAll('.blanco-transparente');

  const observer = new IntersectionObserver((entradas) => {
    entradas.forEach((entrada) => {
      if (entrada.isIntersecting) {
        entrada.target.classList.add('visible');
        observer.unobserve(entrada.target);
      }
    });
  }, {
    threshold: 0.2 
  });

  elementos.forEach(el => observer.observe(el));
});
</script>