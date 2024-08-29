<?php
$pageTitle = "Preguntas Frecuentes";
include './plantillas/header.php';
// Incluyendo el archivo de sesión para proteger la página
 

// Conectar a la base de datos
include 'db.php';

// Consulta para obtener las preguntas frecuentes
$sql = "SELECT id_Recurso, titulo, contenido FROM recursos WHERE tipo_recurso = 'FAQ'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<body>
    <div class="container mt-4">
        <h1>Preguntas Frecuentes</h1>
        <p>Estas son nuestras preguntas frecuentes</p>

        <div class="accordion" id="faqAccordion">
            <?php if ($result->num_rows > 0): ?>
                <?php $i = 0; ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading<?php echo $i; ?>">
                            <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $i; ?>" aria-expanded="true" aria-controls="collapse<?php echo $i; ?>">
                                <?php echo htmlspecialchars($row['titulo']); ?>
                            </button>
                        </h2>
                        <div id="collapse<?php echo $i; ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $i; ?>" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <?php echo nl2br(htmlspecialchars($row['contenido'])); ?>
                            </div>
                        </div>
                    </div>
                    <?php $i++; ?>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No hay preguntas frecuentes disponibles en este momento.</p>
            <?php endif; ?>
        </div>
    </div>

    <?php
    include './plantillas/footer.php';
    ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9yJYO06GvWlK6mZhAN8RMm3iy4e6DCxjZCkFEXD1A2mCx3WStL5" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniU2u5Z5yC6B8IFcP5S7E45c5H6Wq7nJm8Q0P7HFGSe6+Q4/Sc4L7" crossorigin="anonymous"></script>
</body>
</html>

<?php
// Cerrar la conexión a la base de datos
$conn->close();
?>