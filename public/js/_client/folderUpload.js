function displayPreview(event) {
	const docExtensions = /(\.zip)$/i;
	const previewBloc = document.getElementsByClassName('icon')[0];
	const filesPath = document.getElementById('uploadedFiles');
	
	if( filesPath.files.length > 0 && filesPath.files.length < 2 ){
		document.getElementById('preview').style.display = "none";
		let fileName = filesPath.files[0].name;
		let oldPreviewClasses = document.getElementsByClassName('preview');
		if (oldPreviewClasses.length > 0) {
			while (previewBloc.childNodes.length > 2) {
				previewBloc.removeChild(previewBloc.lastChild);
			}
		}
		if ( docExtensions.exec(fileName) ) {
			var img = document.createElement('img');
			img.setAttribute('class', 'preview');
			img.setAttribute('src', '/images/zip.png');
			previewBloc.appendChild(img);
		}
		else{
			var i = document.createElement('i');
			i.setAttribute('class', 'preview');
			i.setAttribute('style', 'color:red; text-align: center');
			i.innerText = fileName + ' : non autorisé(.zip)';
			previewBloc.appendChild(i);
		}
		document.getElementById('op1').style.display = "block";
		document.getElementById('op2').style.display = "block";
	}
	else{
		alert('vous devez ajouter une seule fichier .zip');
	}
}

function deleteAllFiles() {
	const filesParent = document.getElementsByClassName('icon')[0];

	while (filesParent.childNodes.length > 2) {
		filesParent.removeChild(filesParent.lastChild);
	}
	
	document.getElementById('uploadedFiles').value = '';
	document.getElementById('op1').style.display = "none";
	document.getElementById('op2').style.display = "none";
	document.getElementById('preview').style.display = "block";

}

var fieldsData = [];

function appenData(value) {
	// fieldsData.push(value);
	// return fieldsData;
}

function updateRequestCondition(proTitle) {
	let formReq = document.getElementById('req');
	formReq.action = "/Dépot_dossier/Modifier/" + proTitle;
}

function modifyInputs() {
	// let fields = document.getElementsByClassName('data');
	// for (let index = 0; index < fields.length; index++) {
	// 	const field = fields[index];
	// 	field.value = fieldsData[index];
	// }
	let btns1 = document.getElementsByClassName("btn1");
	for (let index = 0; index < btns1.length; index++) {
		const btn = btns1[index];
		btn.innerText = "Modifier";
	}
}