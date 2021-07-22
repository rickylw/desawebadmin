var field = 1;
function education_fields(bulan, kategori) {

    field++;
    var objTo = document.getElementById(bulan)
    var divtest = document.createElement("div");
	divtest.setAttribute("class", "form-group remove"+bulan+field);
	var rdiv = 'removeclass'+field;

    var valueDiv = "";
    valueDiv = '<div class="row"><div class="col-lg-4"><div class="form-group"><input type="number" name="belanjaDesa' + bulan + '[]" id="belanjaDesa' + bulan + '[]" class="form-control belanjaDesa" value="0"></div></div><div class="col-lg-4"><div class="form-group"><div class="input-group"><select class="form-control" id="kategori' + bulan + '[]" name="kategori' + bulan + '[]">';
    
    kategori.forEach((element) => {
        valueDiv += '<option value="'+ element['id'] +'">'+ element['nama'] +'</option>';
    })

    valueDiv += '</select><div class="input-group-append"><button class="btn btn-danger" type="button"  onclick="remove_field(\''+ bulan+field +'\');"><span class="fa fa-minus" aria-hidden="true"></span> </button></div></div></div></div></div>';
    
    divtest.innerHTML = valueDiv

    objTo.appendChild(divtest)
}

function remove_field(rid) {
    $('.remove'+rid).remove();
}
