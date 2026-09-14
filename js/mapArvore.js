
    const imagem = document.getElementById("arvore");

    function redimensionarMapa() {

        const larguraOriginal = imagem.naturalWidth;
        const alturaOriginal = imagem.naturalHeight;

        const larguraAtual = imagem.width;
        const alturaAtual = imagem.height;

        const proporcaoX = larguraAtual / larguraOriginal;
        const proporcaoY = alturaAtual / alturaOriginal;

        const areas = document.querySelectorAll("map area");

        areas.forEach(function(area) {

            if (!area.dataset.coordsOriginal) {
                area.dataset.coordsOriginal = area.coords;
            }

            const coordsOriginal = area.dataset.coordsOriginal
                .split(",")
                .map(Number);

            const novasCoords = coordsOriginal.map(function(coord, index) {

                if (index % 2 === 0) {
                    return Math.round(coord * proporcaoX);
                } else {
                    return Math.round(coord * proporcaoY);
                }

            });

            area.coords = novasCoords.join(",");
        });
    }

    imagem.addEventListener("load", redimensionarMapa);

    window.addEventListener("resize", redimensionarMapa);

    if (imagem.complete) {
        redimensionarMapa();
    }
