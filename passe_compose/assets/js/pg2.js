window.addEventListener("DOMContentLoaded", function () {
	const btnRechercher = document.getElementById('btn');
	const anDeb=document.getElementById("zl_deb");
	const anFin=document.getElementById("zl_fin");
	btnRechercher.addEventListener('click', function () {
		console.log("Filter Started")
		histoires=document.querySelectorAll(".podcast");
		for (i=0 ; i<histoires.length; i++) {
			histoire=histoires[i];
			if ( histoire.dataset.an>=anDeb.value && histoire.dataset.an <=anFin.value)
				histoire.style="display:block";
			else	
				histoire.style="display:none";
		}
    });
})