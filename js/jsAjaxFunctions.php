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

//refresh active users. Replaced with "searchForActiveUsers()"
function activeUsersRefresh()
	{
  //   $.ajax
  //   ({
	// 	url: "./ajax/_ajax_showActiveUsers.php?&group_id=<?php echo $_GET['group']; ?>",
	// 	context: document.body,
	// 	success: function(s,x){		
	// 		$('.activeUsers').html(s);
	// 		addClassToSelectedPlayer();
	// 	}
	// });
	}  

//searches for active users and checks if they are already loaded. if not, load them. If they shouldn't be loaded, remove them
function searchForActiveUsers()
{
      $.ajax
  ({
    url: "./ajax/_ajax_searchForActiveUsers.php?&group_id=<?php echo $_GET['group']; ?>",
    context: document.body,
    type: 'GET',
    success: function(result)
    {
      var activeUsers = JSON.parse(result);
      var loadedUsers = searchForLoadedUsers();
      var charactersToLoad = [];
      var activUsersArray = [];

      activeUsers.forEach(function(user)
      {
        userid = user.userid;
        activUsersArray.push(userid);    //workaround, see "remove offline users" below

        //Check if user needs to be added to document
        if($.inArray(userid,loadedUsers) != -1) // the in array results in an -1 if nothing is found
        {
            // console.log('found '+userid+' Nothing more to do');
        }
        else 
        {   // is already loaded
            // console.log(userid+' is online but not loaded... adding user to loading array');          
            charactersToLoad.push(userid);
          }  
      });

      //users to load
      if(charactersToLoad){       
        charactersToLoadJson = JSON.stringify(charactersToLoad);
        // console.log('users to load:' + charactersToLoad);
        $.ajax
        ({
          url: "./ajax/_ajax_loadCharacters.php",
          context: document.body,
          type: 'POST',
          data: {characters: charactersToLoadJson},
          success: function(result)
          {
            // console.log(result);
            $('.activeUsers').append(result);
          }
        });
      }

        //remove offline users
        //check if user needs to be removed from the document (because they are offline)

        loadedUsers.forEach(function(loadedUser)
        {
          if($.inArray(loadedUser,activUsersArray) == -1) 
          {
              console.log(loadedUser + ' not found. Removing...');
              // console.log(loadedUser+ ' is in array');   
              $("div.spieler[userid="+loadedUser+"]").remove();

          }
          else {
            // console.log(loadedUser + ' found');
          }

        })
      }  
  });
}





//returns an array with all characters loaded inside the spielerWrapper div
function searchForLoadedUsers ()
{
        
    var loadedChars = [];
    activeChars = $('.spieler');
    activeChars.each(function()
    {
      player = $(this).attr('userid');
      loadedChars.push(player);
    });
    return(loadedChars);
    
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


   //searchForActiveUsers();
  setTimeout(() => 
  {  
	(function()
	{
		searchForActiveUsers();
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
