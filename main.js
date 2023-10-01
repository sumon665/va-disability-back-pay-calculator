jQuery(document).ready(function($) {

	/* Add or remove others */	
	var maxField = 10; //Input fields increment limitation
	var addButton = $('.add_button'); //Add button selector
	var wrapper = $('#paycalWraper'); //Input field wrapper
	var x = 1; //Initial field counter is 1
    
	//Once add button is clicked
	$(addButton).click(function(){
	    //Check maximum number of input fields
	    if(x < maxField){ 
	        x++; //Increment field counter
	        // var fieldHTML = '<div class="paycal"><a href="javascript:void(0);" class="remove_button">Remove</a><div class="content"><div class="left_cont"><div class="input_content"><label>Select the date you filled your claim</label><div class="input_year"><span><select name="pcMonth" id="pcMonth" class="pcMonth pcSelect" required><option value="" selected="true" disabled="disabled">Month</option><option value="0">January</option><option value="1">February</option><option value="2">March</option><option value="3">April</option><option value="4">May</option><option value="5">June</option><option value="6">July</option><option value="7">August</option><option value="8">September</option><option value="9">October</option><option value="10">November</option><option value="11">December</option></select></span><span><select name="pcYear" id="pcYear" class="pcYear pcSelect" required><option value="" selected="true" disabled="disabled">Year</option><option value="2022">2022</option><option value="2021">2021</option><option value="2020">2020</option><option value="2019">2019</option><option value="2018">2018</option><option value="2017">2017</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option></select></span></div></div><div class="input_content"><label>On this date, what percentage should the VA have been paying you?</label><span><select name="pcPay" id="pcPay" class="pcPay pcSelect" required=""><option value="" selected="true" disabled="disabled">0%</option><option value="10">10%</option><option value="20">20%</option><option value="30">30%</option><option value="40">40%</option><option value="50">50%</option><option value="60">60%</option><option value="70">70%</option><option value="80">80%</option><option value="90">90%</option><option value="100">100%</option></select></span></div><div class="input_content"><label>On this date, what disability percentage was used to determine your payment?</label><span><select name="pcUse" id="pcUse" class="pcUse pcSelect" required><option value="" selected="true" disabled="disabled">0%</option><option value="10">10%</option><option value="20">20%</option><option value="30">30%</option><option value="40">40%</option><option value="50">50%</option><option value="60">60%</option><option value="70">70%</option><option value="80">80%</option><option value="90">90%</option><option value="100">100%</option></select></span></div><div class="input_content"><label>On this date, how many dependent parents did you have?</label><span><select name="pcPar" id="pcPar" class="pcPar pcSelect"><option selected="true" value="0">0</option><option value="1">1</option><option value="2">2</option></select></span></div></div><div class="right_cont"><div class="input_content"><div class="input_marStatus"><label>On this date, what was your marital status? &nbsp;</label><label><input type="radio" name="marital_'+x+'" class="marital_status single-status" value="0" checked="checked"> Single &nbsp;</label><label><input type="radio" name="marital_'+x+'" class="marital_status married-status" value="1"> Married</label></div></div><div class="input_content"><div class="input_marStatus"><label>Does your spouse require aid and addendence? &nbsp;</label><label><input type="radio" name="maritalAA_'+x+'" class="spouse_option-noAA" value="0"> No &nbsp;</label><label><input type="radio" name="maritalAA_'+x+'" class="spouse_option-AA" value="1"> Yes</label></div></div><div class="input_content"><label>On this date, how many dependent children did you have who were under the age of 18?</label><span><select name="pcChild" id="pcChild" class="pcChild pcSelect"><option selected="true" value="0">None</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option></select></span></div><div class="input_content"><label>On this date, how many dependent children did you have who were between the ages of 18 and 24?</label><span><select name="pcElChild" id="pcElChild" class="pcElChild pcSelect"><option selected="true" value="0">None</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option></select></span></div></div></div></div>'; 
	        var fieldHTML = '<div class="paycal"> <a href="javascript:void(0);" class="remove_button">Remove</a> <div class="content"> <div class="left_cont"> <div class="input_content"> <label>Select the date you filled your claim</label> <div class="input_year"> <span> <select name="pcMonth" id="pcMonth" class="pcMonth pcSelect" required> <option value="" selected="true" disabled="disabled">Month</option> <option value="0">January</option> <option value="1">February</option> <option value="2">March</option> <option value="3">April</option> <option value="4">May</option> <option value="5">June</option> <option value="6">July</option> <option value="7">August</option> <option value="8">September</option> <option value="9">October</option> <option value="10">November</option> <option value="11">December</option> </select> </span> <span> <select name="pcYear" id="pcYear" class="pcYear pcSelect" required> <option value="" selected="true" disabled="disabled">Year</option><option value="2023">2023</option> <option value="2022">2022</option> <option value="2021">2021</option> <option value="2020">2020</option> <option value="2019">2019</option> <option value="2018">2018</option> <option value="2017">2017</option> <option value="2016">2016</option> <option value="2015">2015</option> <option value="2014">2014</option> <option value="2013">2013</option> <option value="2012">2012</option> <option value="2011">2011</option> <option value="2010">2010</option> <option value="2009">2009</option> <option value="2008">2008</option> <option value="2007">2007</option> <option value="2006">2006</option> <option value="2005">2005</option> <option value="2004">2004</option> <option value="2003">2003</option> <option value="2002">2002</option> <option value="2001">2001</option> <option value="2000">2000</option> <option value="1999">1999</option> <option value="1998">1998</option> <option value="1997">1997</option> <option value="1996">1996</option> <option value="1995">1995</option> <option value="1994">1994</option> <option value="1993">1993</option> <option value="1992">1992</option> <option value="1991">1991</option> <option value="1990">1990</option> <option value="1989">1989</option> <option value="1988">1988</option> <option value="1987">1987</option> <option value="1986">1986</option> <option value="1985">1985</option> <option value="1984">1984</option> <option value="1983">1983</option> <option value="1982">1982</option> <option value="1981">1981</option> <option value="1980">1980</option> <option value="1979">1979</option> <option value="1978">1978</option> <option value="1977">1977</option> <option value="1976">1976</option> <option value="1975">1975</option> <option value="1974">1974</option> </select> </span> </div></div><div class="input_content"> <label>On this date, what percentage should the VA have been paying you?</label> <span> <select name="pcPay" id="pcPay" class="pcPay pcSelect"> <option value="0" selected="true">0%</option> <option value="10">10%</option> <option value="20">20%</option> <option value="30">30%</option> <option value="40">40%</option> <option value="50">50%</option> <option value="60">60%</option> <option value="70">70%</option> <option value="80">80%</option> <option value="90">90%</option> <option value="100">100%</option> </select> </span> </div><div class="input_content"> <label>On this date, what disability percentage was used to determine your payment?</label> <span> <select name="pcUse" id="pcUse" class="pcUse pcSelect"> <option value="0" selected="true">0%</option> <option value="10">10%</option> <option value="20">20%</option> <option value="30">30%</option> <option value="40">40%</option> <option value="50">50%</option> <option value="60">60%</option> <option value="70">70%</option> <option value="80">80%</option> <option value="90">90%</option> <option value="100">100%</option> </select> </span> </div><div class="input_content"> <label>On this date, how many dependent parents did you have?</label> <span> <select name="pcPar" id="pcPar" class="pcPar pcSelect"> <option selected="true" value="0">0</option> <option value="1">1</option> <option value="2">2</option> </select> </span> </div></div><div class="right_cont"> <div class="input_content"> <div class="input_marStatus"> <label>On this date, what was your marital status? &nbsp;</label><label><input type="radio" name="marital_'+x+'" class="marital_status single-status" value="0" checked="checked"/> Single &nbsp;</label> <label><input type="radio" name="marital_'+x+'" class="marital_status married-status" value="1"/> Married</label> </div></div><div class="input_content"> <div class="input_marStatus"> <label>Does your spouse require aid and addendence? &nbsp;</label><label><input type="radio" name="maritalAA_'+x+'" class="spouse_option-noAA" value="0"/> No &nbsp;</label> <label><input type="radio" name="maritalAA_'+x+'" class="spouse_option-AA" value="1"/> Yes</label> </div></div><div class="input_content"> <label>On this date, how many dependent children did you have who were under the age of 18?</label> <span> <select name="pcChild" id="pcChild" class="pcChild pcSelect"> <option selected="true" value="0">None</option> <option value="1">1</option> <option value="2">2</option> <option value="3">3</option> <option value="4">4</option> <option value="5">5</option> <option value="6">6</option> <option value="7">7</option> <option value="8">8</option> <option value="9">9</option> <option value="10">10</option> </select> </span> </div><div class="input_content"> <label>On this date, how many dependent children did you have who were between the ages of 18 and 24?</label> <span> <select name="pcElChild" id="pcElChild" class="pcElChild pcSelect"> <option selected="true" value="0">None</option> <option value="1">1</option> <option value="2">2</option> <option value="3">3</option> <option value="4">4</option> <option value="5">5</option> <option value="6">6</option> <option value="7">7</option> <option value="8">8</option> <option value="9">9</option> <option value="10">10</option> </select> </span> </div></div></div></div>';
	        $(wrapper).append(fieldHTML); //Add field html
	    }
	});

	//Once remove button is clicked
	$(wrapper).on('click', '.remove_button', function(e){
	    e.preventDefault();
	    $(this).parent('div').remove(); //Remove field html
	    x--; //Decrement field counter
	});


	$("#pcResult").hide();

    $("input[name$='marital']").click(function() {
        var test = $(this).val();
		
		if (test == 1) {
			$("#spouse").css('display', 'block');
		} else {
			$("#spouse").css('display', 'none');
		}
    });


    /* Reset Button */
	$("#pcReset").click(function(){ 
	    $([document.documentElement, document.body]).animate({
	        scrollTop: $("#paycalMain").offset().top
	    }, 2000);
	    $(".pcSelect").prop("selectedIndex", 0);
	    $("#single-status").prop("checked", true);
	    $("#spouse").css('display', 'none');
	    $("#noAA").prop("checked", true);
	    $("#pcResult").hide();
	    $(".remove_button").trigger('click'); 
	});

    /* Pay Calculator submit*/ 
    $("#paycalFrm").submit(function(e) {
        e.preventDefault();     
        $("#submit_paycal").text("Loading...");

			/* Marital Status */
			const marital_status = [];
			$('.married-status').each(function () {
				if ($(this).prop('checked')) {
					marital_status.push($(this).val());
				} else {
					marital_status.push(0);
				}
			});

			/* Marital Status */
			const maritalAA = [];
			$('.spouse_option-AA').each(function () {
				if ($(this).prop('checked')) {
					maritalAA.push($(this).val());
				} else {
					maritalAA.push(0);
				}
			});			

             $.ajax({
                url: ajax_object.ajax_url, // or example_ajax_obj.ajaxurl if using on frontend
                data: {
                    'action': 'submit_paycal_request',
                    'months': $('.pcMonth').serializeArray(),
                    'years': $('.pcYear').serializeArray(),
                    'Q2s': $('.pcPay').serializeArray(),
                    'Q3s': $('.pcUse').serializeArray(),
                    'childs': $('.pcChild').serializeArray(),
                    'ElderChilds': $('.pcElChild').serializeArray(),
                    'parents': $('.pcPar').serializeArray(),
                    'marital' : marital_status,
                    'maritalAA': maritalAA,
                },
                dataType: 'json',
                type: "post",            
                success: function (data) {
					console.log(data);                	
                    $("#total_com_rec").text("$"+data['totalComp']);
                    $("#com_you_rec").text("$"+data['compRec']);
                    $("#total_com_due").text("$"+data['comDue']);
                    $("#pcResult").fadeIn('slow');
                    $("#submit_paycal").text("Submit");
               }
            });
    });

	
});
