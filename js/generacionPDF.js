  /* ===========================================================================================================================
    FUNCIÓN PARA PASAR A PDF EL CONTENIDO DEL EDITOR DE TEXTO (esta cosa no esta lista aún porque lo descarga en formato HTML)
  ============================================================================================================================== */

// Escucha el evento de clic en el botón "Descargar en PDF"
/*
document.querySelector('.btnDescargarPDF').addEventListener('click', () => {

    const tema = document.querySelector('#tema').textContent;
    const contenidoTema = document.querySelector('#contenidoTema').value;
  
    // Crea un objeto jsPDF
    const pdf = new window.jspdf.jsPDF();
  
    // Define el título
    pdf.setFontSize(18);
    pdf.text(10, 10, tema);
  
    // Define el contenido
    pdf.setFontSize(12);
    pdf.text(10, 30, contenidoTema);
  
    // Descarga el PDF
    pdf.save('documento.pdf');
  });
  */