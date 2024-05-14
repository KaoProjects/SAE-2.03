window.addEventListener("DOMContentLoaded", function () {
	const btnRechercher = document.getElementById('btn');
	const anDeb=document.getElementById("zl_deb");
	const anFin=document.getElementById("zl_fin");
	const noPodcast = this.document.getElementById("noPodcast")
	noPodcast.style="display:none";
	btnRechercher.addEventListener('click', function () {
		let hiddenPodcast = 0
		noPodcast.style="display:none";
		console.log("Filter Started")
		histoires=document.querySelectorAll(".podcast");
		
		for (i=0 ; i<histoires.length; i++) {
			histoire=histoires[i];
			if ( histoire.dataset.an>=anDeb.value && histoire.dataset.an <=anFin.value)
				histoire.style="display:block";
			else{
				histoire.style="display:none";
				hiddenPodcast++
			}	
		}
		if(hiddenPodcast===histoires.length){
			noPodcast.style="display:block";
		}
    });
})