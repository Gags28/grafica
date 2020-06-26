function print(quality = 1) {
    const filename = "NomeDaEmpresa_Cliente_Quantidadepdf";
    var doc = new jsPDF('l', 'cm', [9.6, 5.6], false);

    html2canvas(document.getElementById("card"), {
        scale: "5",
    }).then((canvas) => {
        console.log("Capturando");
        this.imgFile = canvas;
        doc.addImage(this.imgFile, 'PNG', 0, 0, 9.6, 5.6);
    });


    html2canvas(document.getElementById("card2"), {
        scale: "5",
    }).then((canvas) => {
        console.log("Capturando");
        this.imgFile2 = canvas;
        doc.addPage()
        doc.addImage(this.imgFile2, 'PNG', 0, 0, 9.6, 5.6);
        doc.save(filename + ".pdf");
    });


}

$(".print").click(() => print());