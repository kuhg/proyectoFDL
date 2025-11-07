<script>
document.addEventListener('DOMContentLoaded', () => {
  const editarModal = document.getElementById('editarModal');
  const inputId = document.getElementById('editar-idFaq');
  const inputPregunta = document.getElementById('editar-pregunta');
  const inputRespuesta = document.getElementById('editar-respuesta');

  editarModal.addEventListener('show.bs.modal', event => {
    const button = event.relatedTarget; 
    const id = button.getAttribute('data-id');
    const pregunta = button.getAttribute('data-pregunta');
    const respuesta = button.getAttribute('data-respuesta');

    inputId.value = id;
    inputPregunta.value = pregunta;
    inputRespuesta.value = respuesta;
  });
});
</script>