<script>


    //concatenated attack
	$( "form#attackFields" ).submit(function( event ) 
	{
		event.preventDefault();
		var override = "";

		if (event.ctrlKey)
		{  
		override = '&control="1"';
		}
		var parent = $(this);
		var data = $(this).serialize();
		
		//attack needs a separate data array
		if($(this).hasClass('attacke'))
		{
			var kampfwert = $(this).attr('kampfwert');		
			data = data +'&attackValue=' + kampfwert+'&target='+userIDSelected;
		}   	

		//Parade needs a separate data array
		if($(this).hasClass('parade'))
		{
			console.log('hat paradeValue');
			var paradeValue = $(this).attr('paradeValue');		
			data = data +'&paradeValue=' + paradeValue;
		}        

		var buttonID = $(parent).attr('buttonID');
		var wuerfelaufgabe = $(this).attr('wuerfelart');
		$.ajax(
		{
			url: "ajax/_ajax_roll.php?"+data+override+'&target='+userIDSelected, 
			type: 'GET',
			data: {data}, 
				success: function(result){
				console.log(result);
				chatRefresh();
			}
		});
	});

//Main click event for talents, combat, spells and liturgies for the Ajax handler
$(function () 
{
	$("form.roll>button").click(function(e)
	{
			
		event.preventDefault();
		e.preventDefault();
		var override = "";

		if (e.ctrlKey)
		{  
		override = '&control="1"';
		}
		
		var parent = $(this).parent();	
		var data = $(parent).serialize();
		
		//Attacke separat behandeln
		if($(this).hasClass('attacke')){
			var kampfwert = $(this).attr('kampfwert');		
			data = data +'&attackValue=' + kampfwert +'&target='+userIDSelected;
		}   	
		
		//Parade separat behandeln
		if($(this).hasClass('parade')){
			console.log('hat paradeValue');
			var paradeValue = $(this).attr('paradeValue');		
			data = data +'&paradeValue=' + paradeValue;
		}        
		var buttonID = $(parent).attr('buttonID');
		var wuerfelaufgabe = $(this).attr('wuerfelart');
		$.ajax(
		{
			url: "ajax/_ajax_roll.php?"+data+override+'&target='+userIDSelected, 
			type: 'GET',
			data: {data}, 
			success: function(result)
			{
				chatRefresh();
			}
		});	
	});
});



function addClassToSelectedPlayer()
{
	var select = $('div.activeUsers').attr('select');
	if(select)
	{
		$( "body" ).find(`div[userid="`+select+`"`).addClass('selected');
	}
}

$(document).on('click', 'li.showTab',function(event) 
		{
			// console.log(event.target);
			var taget = $(this).attr('name');			
			$('li.showTab').removeClass('active');
			$(this).addClass('active');
			$('.sidebarTab').hide();
			$('.sidebarTab.'+taget).show();

		});	
		
		//make hidden rolls visible  for all
		$(document).on('click', 'input.makeVisible',function(event) 
		{			
			var chatid = $(this).attr('chatid');		
			console.log(chatid);
		$.ajax(
			{
				url: "./ajax/_ajax_makeChatlogVisible.php?&chatid="+chatid,
				context: document.body,
				success: function(result){			
					// console.log(result);	
					chatRefresh();
				}
		});
		});		
		
	//calculate chance
	$('select, input').change(function() 
	{	
		var weaponAt = $('#weapon option:selected').attr('attackvalue');
		var penalty1 = $('#base option:selected').attr('penalty');
		var penalty2 = $('#special option:selected').attr('penalty');
		var edit = $('#edit').val();
		edit = parseInt(edit);
		console.log(edit);
		var result = weaponAt;
		$('input#attCalcResult').val(result-penalty1-penalty2+edit);
	})
		
		
	 //GM-Checkbox  prüfen
    $('.sidebarWrapper input').change(function() 
	{
		var wert = $(this).val();
		if(wert > 99) {
			$(this).val(99);
			
		}
		else if (wert < -99){
			$(this).val(-99);			
		}
		else {			
		}
	})
	
	
	//GM-Checkbox  prüfen
   $('.gmCheckbox').val(this.checked);	
   $(".gmCheckbox").change(function() 
   {
      var checked = $(this).is(":checked");
	  
      if (checked) 
	  {
			gmMode_on();
			location.reload();			
      }
	  else
	  {
		// GMMOde = off		  
		gmMode = 0;
		document.cookie = "gmMode=0; expires=Thu, 18 Dec 2072 12:00:00 UTC";
		document.cookie = "tempChar=0; expires=Thu, 18 Dec 2000 12:00:00 UTC";
		// console.log('Gm Mode off');
		location.reload();	
	  }
   });
   
     function gmMode_on()
	 {
		 gmMode = 1;
		 document.cookie = "gmMode=1; expires=Thu, 18 Dec 2072 12:00:00 UTC";
		 console.log('Gm Mode ist: '+gmMode);
		 $('body').addClass('GM');
		 $('.GM_mode').val(userID);
		 $('#iniStart').removeClass('iniStart');
	 }

	//Lösche Search Box und schließe alle offenen Talente
	$(document).on('keydown', function(event) 
	{
       if (event.key == "Escape") {
			
			$("#talents li").hide(200);

			$("h2.tal_header").removeClass('active');
			$('#myInput').val("");
			$( "body" ).find(`div.spieler`).removeClass('selected');
			$(".spieler").removeClass('secondCircle');
			$('div.circle').removeClass('active');		
			$( "body" ).find(`div.activeUsers`).attr('select', "");

			// $('.sidebarTab.roll').addClass('active');	
			// $('li.showTab[name=roll]').addClass('active');	
			// $('.sidebarTab.roll').show();	
			userIDSelected = "";
       }
	});
	
	//Aufklappen der Talente 
	$("h2.tal_header").click(function()
	{
		$(this).toggleClass('active');
		var target = $(this).attr('slide');
        $('li.talent[slide*='+target+']').slideToggle(250);
		// console.log(target);		
        // $('ul[slide*='+target+']').slideToggle(250);	
	});

	//Check if GM mode is on at the end of loading time
    if(gmMode == 1)
    {
		gmMode_on();
		$(".gmCheckbox").prop("checked", true);
	}
	else { // firefox browsers requires this because of some stupid caching issue
		$('.GM_mode').val('');
	}


//possess Character
$(document).on( "click", "div.possess", function() {	
	var possessedChar = $( "body" ).find(`div.spieler.selected`).attr('userid');
	console.log(possessedChar);
	document.cookie = "tempChar="+possessedChar+"; expires=Thu, 18 Dec 2072 12:00:00 UTC";
	location.reload();
});



	//set character to selected 
	$(document).on( "click", "div.spieler .avatar", function() {
		if(!$(this).hasClass('selected')){
			$('.spielerWrapper div').removeClass('selected');
			$('.spielerWrapper div').removeClass('active');	
			$('.spielerWrapper div').removeClass('selected');	
			$("div.spieler").removeClass('secondCircle');

			userIDSelected = $(this).attr('userid');
			
			$('div.activeUsers').attr('select',userIDSelected);
			addClassToSelectedPlayer();
			console.log('selecting');	
			$('.spieler.selected .circle.target').click();
		}

		//deselect everything
		else{
			$('.spielerWrapper div').removeClass('active');	
			$('.spieler').removeClass('secondCircle');	
			$('.spielerWrapper div').removeClass('selected');	
		}

	});


//activate second row
$(document).on('click', '.circle.main',function(event) 
	{
		$(this).addClass('active');
		var subCircles = $(this).attr('target');
		$('.spieler.selected .circle').removeClass('active');
		$('.spieler.selected .circle.'+subCircles).addClass('active');
		if($(this).hasClass('secondCircle')){
			$('.spieler.selected').addClass('secondCircle');
		}
		else {
			$('.spieler.selected').removeClass('secondCircle');
		}
		
	});	

		//deactivate second row
		$(document).on('click', '.circle.main.active',function(event) 
		{
			$(this).removeClass('active');
			var subCircles = $(this).attr('target');
			$('.spieler.selected .circle').removeClass('active');
			$('.spieler.selected .circle.'+subCircles).removeClass('active');
			$('.spieler').removeClass('secondCircle');

		});	


</script>