window.addEventListener("DOMContentLoaded", function () {
	const formulaire = document.getElementById('form');
	const anDeb=document.getElementById("zl_deb");
	const anFin=document.getElementById("zl_fin");
	if (formulaire != null)
		{	formulaire.addEventListener('submit', function (e) {
				if (anDeb.value > anFin.value){
					alert ("L'année de début doit être inférieiure à l'année de fin");
					e.preventDefault();
				}
			});
		}
})