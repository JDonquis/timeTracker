//DOM
const $ = document.querySelector.bind(document);

//APP
let App = {};
App.init = (function() {
	//Init
	function handleFileSelect(evt) {
		const files = evt.target.files; // FileList object

		//files template
		let template = `${Object.keys(files)
			.map(file => `<div class="file file--${file}">
     <div class="name"><span>${files[file].name}</span></div>

    </div>`)
			.join("")}`;

		$("#drop").classList.add("hidden");
		$(".nftmax__file-updated").classList.add("hasFiles");
		setTimeout(() => {
			$(".list-files").innerHTML = template;
		}, 1000);

	}

	// trigger input
	$("#triggerFile").addEventListener("click", evt => {
		evt.preventDefault();
		$("input[type=file]").click();
	});

	// drop events
	$("#drop").ondragleave = evt => {
		$("#drop").classList.remove("active");
		evt.preventDefault();
	};
	$("#drop").ondragover = $("#drop").ondragenter = evt => {
		$("#drop").classList.add("active");
		evt.preventDefault();
	};
	$("#drop").ondrop = evt => {
		$("input[type=file]").files = evt.dataTransfer.files;
		$(".nftmax__file-updated").classList.add("hasFiles");
		$("#drop").classList.remove("active");
		evt.preventDefault();
	};

	//upload more
	// $(".importar").addEventListener("click", () => {
	// 	$(".list-files").innerHTML = "";
	// 	$(".nftmax__file-updated").classList.remove("hasFiles");
	// 	$(".importar").classList.remove("active");
	// 	setTimeout(() => {
	// 		$("#drop").classList.remove("hidden");
	// 	}, 500);
	// });

	// input change
	$("input[type=file]").addEventListener("change", handleFileSelect);
})();
