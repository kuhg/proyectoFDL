<script>
document.addEventListener("DOMContentLoaded", function() {
  var grid = document.querySelector('.grid');

  // Esperar a que las imágenes carguen
  imagesLoaded(grid, function() {
    new Masonry(grid, {
      itemSelector: '.grid-item',
      columnWidth: '.grid-sizer',
      percentPosition: true,
      gutter: 15
    });
  });
});
</script>