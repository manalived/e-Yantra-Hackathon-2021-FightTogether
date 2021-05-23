function generatePdf(){
	const element = document.getElementById("mainClass");
	
	html2pdf()
	.from(element)
	.save();
}