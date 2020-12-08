

<script>

function chatRefresh()
{
  $.ajax(
    {
        url: "./ajax/chatImport.php?gmMode="+ userID +"&group_id=<?php echo $group_id; ?>",
        context: document.body,
        success: function(s,x){
            $('.chatlog').html(s);
	    }
    });
}
  
//Send current char to Database
function pingChar(cache = 0)	
{
  $.ajax
  ({
        url: "ajax/ping_imhere.php?gmMode="+ gmMode+ "&cache="+cache+"&group_id=<?php echo $_GET['group']; ?>&userid=<?php echo $GLOBALS['userID']; ?>&username=<?php echo $saonChar['name']; ?>",
        context: document.body,
        success: function(s,x){	
            // console.log('pinged: GmMode: '+gmMode +' Cache: '+cache+'<?php echo $char->name; ?>');
        }
    });
}

//refresh active users
function activeUsersRefresh()
	{
    $.ajax
    ({
		url: "./ajax/_ajax_showActiveUsers.php?&group_id=<?php echo $_GET['group']; ?>",
		context: document.body,
		success: function(s,x){		
			$('.activeUsers').html(s);
			addClassToSelectedPlayer();
		}
	});
	}
		



// 1 = clean cache after page load
pingChar(1); 

//pingChar to databse
  setTimeout(() => 
  {  
	(function()
	{
		pingChar(0);
		// console.log('pingChar');
  	  	setTimeout(arguments.callee, 5000); // repeat ms
	})();
   }, 10000);//after x ms loading time


//reload chat 
  setTimeout(() => 
  {  
	(function()
	{
		chatRefresh();
		// console.log('chatRefresh');
		setTimeout(arguments.callee, 2100);  // repeat ms
	})();
   }, 1000); //after x ms loading time


   //activeUsersRefresh();
  setTimeout(() => 
  {  
	(function()
	{
		activeUsersRefresh();
		// console.log('activeUsersRefresh');
    	setTimeout(arguments.callee, 20000); // repeat 
	})();
   }, 500); //after x ms loading time

    //Sticky Menu
    $(document).ready(function() 
    {
        var stickyTop = $('.sidebar-right').offset().top;

        $(window).scroll(function() 
        {
            var windowTop = $(window).scrollTop();
            if (stickyTop < windowTop && $(".sidebarWrapper").height() + $(".sidebarWrapper").offset().top - $(".sidebar-right").height() > windowTop) {
            $('.sidebar-right').addClass('fixed');
            } else 
            {
            $('.sidebar-right').removeClass('fixed');
            }
        });
    }); 

    //File Upload Plugin
    $("#fileuploader").uploadFile
    ({
        onSuccess:function(files,data,xhr,pd)
        {
        console.log(files[0]);
        console.log(data);
        console.log(xhr);
        console.log(pd);

        document.cookie = "char="+files[0]+"; expires=Thu, 18 Dec 2072 12:00:00 UTC";
        // document.cookie = "userId="+files[0]+"; expires=Thu, 18 Dec 2072 12:00:00 UTC";
        location.reload();
        },
            
        url:"upload.php?folder=<?php echo $_GET['group'].'&userID='.$GLOBALS['userID']; ?>",
        dragDropStr: ' ',
        uploadStr: '<span class="fileupload">Charakter wechseln</span>',
        allowedTypes:"json",
        fileName:"myfile"
    });

        $('div#file').click(function() 
        {	
            $('.ajax-file-upload input').click();		
        });
</script>
