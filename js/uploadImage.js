let fileInput = document.getElementById("customFile");
let fileList = document.getElementById("files-list");
let clearButton = document.getElementById("clearButton"); // Ganti dengan ID atau kelas yang sesuai

fileInput.addEventListener("change", displayImageNames);

clearButton.addEventListener("click", function() {
    // Mengosongkan daftar file
    fileList.innerHTML = "";

    // Me-reset nilai input file
    fileInput.value = "";
});

function displayImageNames() {
    fileList.innerHTML = "";

    for (let file of fileInput.files) {
        let reader = new FileReader();
        let listItem = document.createElement("li");
        let fileName = file.name;
        let fileSize = (file.size / 1024).toFixed(1);
        listItem.innerHTML = `<p>${fileName}</p><p>${fileSize}KB</p>`;

        if (fileSize >= 1024) {
            fileSize = (fileSize / 1024).toFixed(1);
            listItem.innerHTML = `<p>${fileName}</p><p>${fileSize}MB</p>`;
        }

        fileList.appendChild(listItem);
    }
}
