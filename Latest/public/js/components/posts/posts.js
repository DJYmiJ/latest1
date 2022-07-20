const addImagebtn = document.getElementById("addImagebtn");
const removeImagebtn = document.getElementById("removeImagebtn");
const imagePlaceholder = document.getElementById("image_placeholder");
const intRemArea = document.getElementById('removeIntend');

let inputPath = document.querySelector("#image");

let file;

function toggleBrowse() {
    inputPath.click();
}

function removeImage() {
    addImagebtn.style.display = "block";
    removeImagebtn.style.display = "none";
    imagePlaceholder.style.display = "none";
    
    imagePlaceholder.setAttribute('src', '');
    
    inputPath.value = null;
    
    // Intentional removal
    intRemArea.value = 'removed';
}

inputPath.addEventListener("change", function() {
    file = this.files[0];
    
    addImagebtn.style.display = "none";
    removeImagebtn.style.display = "block";
    imagePlaceholder.style.display = "block";
    
    showImage();
});

function showImage() {
    let fileType = file.type;
    
    let validExtensions = ["image/jpeg", "image/jpg", "image/png"];
    
    if(validExtensions.includes(fileType)) {
        let fileReader = new FileReader();
        
        fileReader.onload = ()=>{
            let fileURL = fileReader.result;
            
            imagePlaceholder.setAttribute('src', fileURL);
        };
        
       
        fileReader.readAsDataURL(file);
        
           
    } else {
        alert ("This file extension is not allowed.");
        
        removeImage();
    }
};