<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Preguntas frecuentes – Jardín de Infantes Francisca Dalinda López</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/estilos.css">
</head>
  <body class="fondo-dibujo ">
    <?= view('partials/navbar')?>

    <div class="div-con-padding w-75 align-items-center flex-column justify-content-center mx-auto d-flex">
      <h2>Preguntas frecuentes</h2>
    </div>

  <section class="container mb-5">
      <div class="accordion" id="faqAccordion">

        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse"
              data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              ¿Cómo se inscribe a los y las estudiantes? y ¿Qué pasos debo seguir?
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
            data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              Se inscriben por CIDI. Debe tenerlo a cargo en la cuenta el padre, madre o tutor.
              <ul>
                <li>
                  1 Ingresar al CIDI
                </li>
                <li>
                  2 Acceder al FUP (FORMULARIO UNICO DE POSTULANTES): Bajo el nombre inscripciones escolares 2026.
                </li>
                <li>
                  3 Completar datos del estudiante.
                </li>
                <li>
                  4 Seleccionar entre 2 y 4 escuelas cercanas al domicilio, y elegir turno.
                </li>
                <li>
                  5 Confirmar postulación.  Se recibe constancia de la inscripción por mail.
                </li>
              </ul>
            </div>
          </div>
        </div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            ¿Cuándo son las inscripciones al nivel?
          </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
          data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Las fechas de inscripción las establece el gobierno provincial.
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="headingThree">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            ¿Necesito presentar documentación en la institución?
          </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
          data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Si, pero la documentación se solicita y recibe una vez comenzado el ciclo lectivo al que se inscribió al estudiante.
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="headingFour">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
            ¿Qué documentación debo presentar?
          </button>
        </h2>
        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
          data-bs-parent="#faqAccordion">
          <div class="accordion-body">
          Fotocopia del Dni de grupo familiar, partida de nacimiento, carnet de vacunas completo, CUS (CERTIFICADO UNICO DE SALUD), e ISA (INFORME ANUA) Autorizaciones para el retiro de estudiantes, autorizaciones para el uso de la voz y de imagen.
          </div>
        </div>
      </div>

        <div class="accordion-item">
        <h2 class="accordion-header" id="headingFive">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
            ¿Utilizan delantal o uniforme?
          </button>
        </h2>
        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
          data-bs-parent="#faqAccordion">
          <div class="accordion-body">
          Tiene ambas opciones, y es a criterio de la familia si va a usar uno u otro, o ambos durante el ciclo lectivo.
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="headingSix">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
            ¿Qué lleva la mochila de un estudiante de nivel inicial?
          </button>
        </h2>
        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
          data-bs-parent="#faqAccordion">
          <div class="accordion-body">
          Necesita una taza, plato, cucharita, mantel, servilleta y toalla.
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="headingSeven">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
            ¿Hay que pagar la inscripción?
          </button>
        </h2>
        <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven"
          data-bs-parent="#faqAccordion">
          <div class="accordion-body">
          No, la educación es pública y gratuita. Durante los primeros meses se establece una colaboración de las familias para la compra de material y la cooperadora hace eventos para recaudar fondos para el jardin.
          </div>
        </div>
      </div>
    </div>
  </section>

    <div class="blanco-transparente div-con-padding d-flex justify-content-center align-items-center flex-column w-50 mx-auto text-center">
        <h5>Contactos</h5>
        <p>Correo: franciscadalindal@gmail.com</p>
        <p>Numero de ejemplo: 354415234356</p>
        <p>Direccion: calle D. F. Sarmiento s/n de la localidad de Ambul</p>
    </div>

    <?= view('partials/footer')?>
    <?= view('partials/scriptScroll')?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>