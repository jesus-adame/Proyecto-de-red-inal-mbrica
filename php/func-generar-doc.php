<?php
$archivo = fopen("../documentos/documento.txt","a") or die ("Error al crear documento");

$asunto = $_REQUEST['asunto'];
$desc = $_REQUEST['descripcion'];

fwrite($archivo, 'Asunto ' . $asunto);
fwrite($archivo, "\n");
fwrite($archivo, 'Descripción ' . $desc);
fwrite($archivo, "\n");

echo "<script>
alert('Se creó correctamente el archivo');
history.go(-1);
</script>";
?>
