function prikazi() {
  var x = document.getElementById("pregled");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}


$('#btn-izbrisi').click(function () {
  const checked = $('input[type=radio]:checked');
  request = $.ajax({
    url: 'handler/delete.php',
    type: 'post',
    data: { 'timID': checked.val() }
  });
  request.done(function (response, textStatus, jqXHR) {
    if (response === 'Success') {
      checked.closest("tr").remove();
      console.log('Tim je obrisan ');
      alert('Tim je obrisan');
      //$('#izmeniForm').reset;
    }
    else {
      console.log('Tim nije obrisan ' + response);
      alert('Tim nije obrisan');
    }
  });
});

$('#btn-izmeni').click(function () {

  const checked = $('input[name=checked-donut]:checked');

  request = $.ajax({
    url: 'handler/get.php',
    type: 'post',
    data: { 'timID': checked.val() },
    dataType: 'json'
  });

  request.done(function (response, textStatus, jqXHR) {
    console.log('Popunjena');
    $('#nazivv').val(response[0]['nazivTima']);
    console.log(response[0]['nazivTima']);

    $('#drzavaa').val(response[0]['drzava'].trim());
    console.log(response[0]['drzava'].trim());
    $('#godinaa').val(response[0]['godinaOsnivanja'].trim());
    console.log(response[0]['godinaOsnivanja'].trim());
    $('#brojj').val(response[0]['brojTitula'].trim());
    console.log(response[0]['brojTitula'].trim());
    $('#idd').val(checked.val());

    console.log(response);
  });

  request.fail(function (jqXHR, textStatus, errorThrown) {
    console.error('The following error occurred: ' + textStatus, errorThrown);
  });

});

$('#izmeniForm').submit(function () {
  event.preventDefault();
  console.log("Izmena");
  const $form = $(this);
  const $inputs = $form.find('input, select, button');
  const serializedData = $form.serialize();
  console.log(serializedData);
  $inputs.prop('disabled', true);

  request = $.ajax({
    url: 'handler/update.php',
    type: 'post',
    data: serializedData
  });

  request.done(function (response, textStatus, jqXHR) {


    if (response === 'Success') {
      console.log('Tim je izmenjen');
      location.reload(true);
      //$('#izmeniForm').reset;
    }
    else console.log('Tim nije izmenjen ' + response);
    console.log(response);
  });

  request.fail(function (jqXHR, textStatus, errorThrown) {
    console.error('The following error occurred: ' + textStatus, errorThrown);
  });



});


$('#btnDodaj').submit(function () {
  $('myModal').modal('toggle');
  return false;
});

$('#btn-izmeni').submit(function () {

  $('#myModal').modal('toggle');
  return false;
});

$('#dodajForm').submit(function () {
  event.preventDefault();

  const $form = $(this);
  const $inputs = $form.find('input, select, button');
  const serializedData = $form.serialize();
  console.log(serializedData);
  $inputs.prop('disabled', true);

  request = $.ajax({
    url: 'handler/add.php',
    type: 'post',
    data: serializedData
  });

  request.done(function (response, textStatus, jqXHR) {
    if (response === 'Success') {
      alert('Tim je dodat');
      location.reload(true);
    }
    else console.log('Tim nije dodat ' + response);
    console.log(response);
  });

  request.fail(function (jqXHR, textStatus, errorThrown) {
    console.error('The following error occurred: ' + textStatus, errorThrown);
  });
});
