const $s = s => document.querySelector(s);
const $sAll = sa => document.querySelectorAll(sa);
const $ce = el => document.createElement(el);

var navbar = document.querySelector('.navbar');
const box = $s('.box');

var picTPL = p => ` 

<a href="${p.place}" target="_blank" class="gallery__link">
<figure class="gallery__thumb">
    <img id='${p.id}' src="${p.place}" alt="Portrait by Jessica Felicio"
        class="gallery__image">
    <figcaption class="gallery__caption">${p.title}</figcaption>
</figure>
</a>

`;
var pictpl = p => `<img src="${p}" class="big_img" alt="">`;
$sAll('.services_box').forEach(bn => {
    bn.querySelector('.Permanent').onclick = function () {
        $s('.services_box').style.fontFamily = 'permanent,cursive';
    }
    bn.querySelector('.Poppins').onclick = function () {
        $s('.services_box').style.fontFamily = 'Poppins,sans-serif';
    }
    bn.querySelector('.Playfair').onclick = function () {
        $s('.services_box').style.fontFamily = 'Playfair Display,serif';
    }
    bn.querySelector('.Lobster').onclick = function () {
        $s('.services_box').style.fontFamily = 'Lobster,cursive';
    }
});
function img_box(image){
    var op_img = $s('.op_img');
    var img = new Image();
    img.src = image.src;
    img.onload = function() {
    var pic_html = pictpl(img.src);
    op_img.innerHTML = pic_html;
    op_img.style.display = "flex";

    op_img.onclick = function() {
      op_img.style.display = "none";
    };
    
    op_img.appendChild(closeButton);
};
}
function load_pic(){
    fetch('../galleryPic.json')
        .then(function (response) {
            return response.json();
        })
        .then(function (jsonData) {
            var galeriaDiv = $s('.gallery');

            jsonData.forEach(function (pic) {
                var picHTML = picTPL(pic);
                var picContainer = document.createElement('div');
                picContainer.classList.add('gallery__column');
                picContainer.innerHTML = picHTML; 

                galeriaDiv.appendChild(picContainer);
            });
            console.log(jsonData);
        })
        .catch(function () {
            galeriaDiv.innerHTML = 'Hiba a képek betöltése során: Kérem próbálja meg később';
        });
}

function mobil_navbar(){
    var nav_a = $s(".nav_links");
    if(nav_a.style.display === "block"){
        nav_a.style.display = "none";
    }else{
        nav_a.style.display = "block"
    }
    
}
