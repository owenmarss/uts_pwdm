const inputFile = document.querySelector('#file-img');
const imgArea = document.querySelector('.img-area');

inputFile.addEventListener('change', function (){
    const image = this.files[0];
    console.log(image);
    console.log("Coba");
    const reader = new FileReader();
    reader.onload = ()=> {
        const imgUrl = reader.result;
        const img = document.createElement('img');
        img.src = imgUrl;
        imgArea.appendChild(img);
        imgArea.classList.add('active');
    }
    reader.readAsDataURL(image);
});