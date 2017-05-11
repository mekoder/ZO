(function  () {
	var input = document.getElementByID("images"),
	formdata = false;

	function showUploadItem (source) {
		var list = document.getElementByID("image-list"),
		li = document.createElement("li").
		img = document.createElement("img");
		img.src = source;
		li.appendChild(img);
		list.appendChild(li);

	}

	if (window.FormData)  {
		formdata = new FormData();
		document.getElementByID("btn").style.display = "none";

	}

	input.addEventListener("change", function (evt) {
		document.getElementByID("responce").innerHTMl = "uploading....."
		var i = 0, len = this.files.length, img, render, file;

		for ( ; i < len; i++ ) {
			file = this.files[i];

			if(!!file.type.match(/image.*/)) {
				if (window.FileReader ) {
					reader = new FileReader();
					reader.onloaded = function (e) {
						showUploadedItem(e.target.result, file.fileName);

					};
					reader.readAsDataURL(file);
				}
				if (formdata) {
					formdata.append("images[]", file);
				}
			}
		}

		if (formdata) {
			$.ajax({
				url: "upload.php",
				type: "POST",
				data: formdata,
				processData: false,
				contentType: false,
				success: function (response) {
					$('#response').html(response);
					$('#show').html(response);
				}
			})
		}
	}, false);
}());