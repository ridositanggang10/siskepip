var room = 1;

function education_fields() {

    room++;
    var objTo = document.getElementById('education_fields')
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "form-group removeclass" + room);
    var rdiv = 'removeclass' + room;
    divtest.innerHTML = ' <div class="col-sm-12 nopadding"><div class="form-group"><label for="pertanyaan">Pertanyaan</label><input type="text" class="form-control" id="pertanyaan" name="question[]" placeholder="Tambahkan Pertanyaan"></div> </div><div class="col-sm-3 nopadding"><div class="form-group"><input type="text" class="form-control" id="opsi_1" name="opsi_1[]" value=""placeholder="Opsi 1 : Bobot nilai 25"></div></div><div class="col-sm-3 nopadding"><div class="form-group"><input type="text" class="form-control" id="opsi_2" name="opsi_2[]" value=""placeholder="Opsi 2 : Bobot nilai 50"> </div> </div><div class="col-sm-3 nopadding"><div class="form-group"><input type="text" class="form-control" id="opsi_3" name="opsi_3[]" value="" placeholder="Opsi 3 : Bobot nilai 75"></div></div><div class="col-sm-3 nopadding"> <div class="form-group"> <div class="input-group"> <div class="form-group">  <input type="text" class="form-control" id="opsi_4" name="opsi_4[]" value="" placeholder="Opsi 4 : Bobot nilai 100"></div><div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="remove_education_fields(' + room + ');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button></div></div></div></div><div class="clear"></div>';;


    objTo.appendChild(divtest);
}

function remove_education_fields(rid) {
    $('.removeclass' + rid).remove();
}
