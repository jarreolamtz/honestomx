$('#formEvento').submit(function() {
  const form = $(this);
  var checkbox = $('#formEvento input[name="fields[financiamiento]"]').is(":checked");
  
  if (checkbox) {
    checkbox_value = "Si";
  } else {
    checkbox_value = "No";
  }
  
  const data = {
    action: ajax_var.action,
    nonce: ajax_var.nonce,
    condition: form.find('input[name="fields[condicion]"]').val(),
    financing: checkbox_value,
    product: form.find('select[name="fields[producto]"] option:selected').text(),
    name: form.find('input[name="fields[name]"]').val(),
    phone: form.find('input[name="fields[phone]"]').val(),
    email: form.find('input[name="fields[email]"]').val(),
    state: form.find('select[name="fields[state]"] option:selected').text(),
    distributor: form.find('input[name="fields[distribuidor]"]').val()
  };
  
  $.post('/wp-admin/admin-ajax.php', data);

  return true;
});