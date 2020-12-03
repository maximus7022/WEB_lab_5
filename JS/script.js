$('.decor').submit(function validate_form() {
    var msg = $('.decor').serialize();

    let st_exp = /^[А-Яа-яІі\s]+$/;
	let gr_exp = /^[А-Яа-яІі]{2,2}\-[0-9][0-9]$/;
	let sp_exp = /^\d{3,3}$/;
	let em_exp = /^[a-z0-9._-]+\@[a-z0-9]+\.[a-z]{2,4}$/;
	let student = document.getElementById('st_input').value;
	let group = document.getElementById('gr_input').value;
	let specialty = document.getElementById('sp_input').value;
	let email = document.getElementById('em_input').value;

    if (st_exp.test(student) == false && student != '')
	{
		$('#message').html('Виникла помилка:</br>Ім\'я повинно бути введене українськими літерами');
		return false;
	}

	if (gr_exp.test(group) == false && group != '')
	{
		$('#message').html('Виникла помилка:</br>Поле групи повинне містити дві українські літери, дефіс та номер');
		return false;
	}

	if (sp_exp.test(specialty) == false && specialty != '')
	{
		$('#message').html('Виникла помилка:</br>Номер спеціальності має бути трьохзначним числом');
		return false;
	}

	if (em_exp.test(email) == false && email != '')
	{
		$('#message').html('Виникла помилка:</br>Це не схоже на Email');
		return false;
	}
	else {
	    $.ajax({
	         type: 'POST',
	         url: './PHP/val_form.php',
	         data: msg,
	        success: function(data) { 
	            $('#message').html(data);
	         },
	         error:  function(xhr, str) {
		    	alert('Виникла помилка: ' + xhr.responseCode);
	         }
	       });
	    return false;
	}
});