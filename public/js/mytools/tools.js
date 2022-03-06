function doDisc(jumlah,harga,nominal,prefix){
    if(prefix=="rupiah"){
        return parseInt(parseInt(jumlah) * (parseInt(harga) - parseInt(nominal)));
    }else{
        return parseInt(parseInt(jumlah) * (parseInt(harga) - (parseInt(harga) * parseInt(nominal)/100)));
    }
}

function renderDisc(disc,prefix){
    if(prefix=="rupiah"){
        return "Rp. "+ parseInt(disc).toLocaleString();
    }else{
        return  disc+"%";
    }
}