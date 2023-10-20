const $s = s => document.querySelector(s);
const $sAll = sa => document.querySelectorAll(sa);
const $ce = el => document.createElement(el);

var navbar = document.querySelector('.navbar');
const box = $s('.box');

var picTPL = p => ` 

<a href="${p.place}" target="_blank" class="gallery__link">
<figure class="gallery__thumb">
    <img src="${p.place}" alt="Portrait by Jessica Felicio"
        class="gallery__image">
    <figcaption class="gallery__caption">${p.title}</figcaption>
</figure>
</a>

`;
$sAll('.navbar').forEach(nBTN => {
    nBTN.querySelector('.fst_pg').onclick = function () {
        $s('.wlc_txt').style.display = 'grid';
        $s('.services_box').style.display = 'none';
        $s('.gallery').style.display = 'none';
        $s('.cont').style.display = 'none';
    }
    nBTN.querySelector('.services').onclick = function () {
        $s('.wlc_txt').style.display = 'none';
        $s('.services_box').style.display = 'block';
        $s('.gallery').style.display = 'none';
        $s('.cont').style.display = 'none';
        
    }
    nBTN.querySelector('.gall_on').onclick = function () {
        $s('.wlc_txt').style.display = 'none';
        $s('.services_box').style.display = 'none';

        $s('.gallery').style.display = 'flex';
        $s('.gallery').classList.add('gal_show');

        setTimeout(function () {
            $s('.gallery').style.opacity = "1";
        }, 10);
        $s('.cont').style.display = 'none';
    }
    nBTN.querySelector('.contact').onclick = function () {
        $s('.wlc_txt').style.display = 'none';
        $s('.services_box').style.display = 'none';
        $s('.gallery').style.display = 'none';
        $s('.cont').style.display = 'block';
    }
});

$sAll('.services_box').forEach(bn => {
    bn.querySelector('.Permanent').onclick = function () {
        $s('.services_box p').style.fontFamily = 'permanent,cursive';
    }
    bn.querySelector('.Poppins').onclick = function () {
        $s('.services_box p').style.fontFamily = 'Poppins,sans-serif';
    }
    bn.querySelector('.Playfair').onclick = function () {
        $s('.services_box p').style.fontFamily = 'Playfair Display,serif';
    }
    bn.querySelector('.Lobster').onclick = function () {
        $s('.services_box p').style.fontFamily = 'Lobster,cursive';
    }
});
function get_picBox() {
    const pic = document.createElement('img');
    pic.width = '100px'
    $s('.pic_box').appendChild(pic);
};

function mobil_navbar(){
    var nav_a = $s(".nav_links");
    if(nav_a.style.display === "block"){
        nav_a.style.display = "none";
    }else{
        nav_a.style.display = "block"
    }
    
}
window.onload = get_picBox()