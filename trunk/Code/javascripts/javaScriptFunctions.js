/*  ALL KIND OF SPACIAL SUBMITS*/
/*
*Name:  UserSubmit
*Discription: This Function is used to turn text into form submit links 
*input: username - that will be turened into submit link
*Output: none
*/
function UserSubmit(user)
{
  document.USERS_LIST_FORM.getUserInfo.value = user;
  document.USERS_LIST_FORM.submit() ;
}
function forumDelete(postNumber,commenting)
{
  document.FORUM_LIST_FORM.deleteItem.value = postNumber;
  document.FORUM_LIST_FORM.deleteItemCommenting.value = commenting;
  document.FORUM_LIST_FORM.submit() ;
}
/*allow group names to submit*/
function GroupEditSubmit(groupID)
{
  document.GROUP_LIST_FORM.editGroup.value = groupID;
  document.GROUP_LIST_FORM.submit() ;
}
/* allow arrow buttons to submit in guideReports*/
function WeekSubmit(week)
{
  document.guideattendance.arrowbutton.value = 1;
  document.guideattendance.weekchange.value = week;
  document.guideattendance.submit() ;
}
/*allow forum subject to submit*/
function SubjectSubmit(user)
{
  document.FORUM_LIST_FORM.getForumTopic.value = user;
  document.FORUM_LIST_FORM.submit() ;
}
/*Allow dates to submit in guideReports*/
function DateEditSubmit(val)
{
  document.guideattendance.editDayGroup.value = val;
  document.guideattendance.submit() ;
}
/*Allow list to submit in manageMessages*/
function GrouplistSubmitMSG()
{
	document.groupMessageForm.listSubmit.value=1;
	document.groupMessageForm.submit();
}
/*Allow list to submit in manageMessages*/
function GrouplistSubmitPIC()
{
	document.viewPicturesForm.listSubmit.value=1;
	document.viewPicturesForm.submit();
}

/*Allow dates to submit in monthly report*/
function DateEditMonthlySubmit(val,val2)
{
  document.guideattendance.editMonthlyGroup.value = val;
  document.guideattendance.editMonthlyGroupUserName.value = val2;
   
  document.guideattendance.submit() ;
}
/*Allow dates to submit in monthly  manager report*/
function DateEditMonthlyManegerSubmit(val)
{
  document.guideattendance.userNameManag.value = val;
  document.guideattendance.submit() ;
}
/*
*Name:  confirmDelete
*Discription: This Function is used to show confirm dialog when delteing records 
*input: none
*Output: none
*/
function confirmPictureDelete()
{
	document.viewPicturesForm.DeleteButton.value = 1;
	//if (document.USERS_LIST_FORM.delete_users.value!=NULL)
		return confirm("are you sure?");
	//else return confirm("ADD");
}
function confirmDelete()
{
	
		return confirm("are you sure?");
	
}
/*
*Name:  showMenu
*Discription: this function shows a selected menu 
*input: layers DIV id
*Output: none
*/
function showMenu(layerName)
{
	if (layerName.style.display == 'inline')
		layerName.style.display = 'none';
	else
		layerName.style.display = 'inline';
}
/* the layers option in the guide folder*/
function LayerOnMouseOver(LayerName)
{
	LayerName.style.cursor ='hand';
}
function LayerOnMouseOut(LayerName)
{
	LayerName.style.cursor ='default';
}

/**************  SLIDE SHOW   *************************/
var NoOfPicturesLoaded;
var picIndex;
picIndex=1;

function initSlideshow()
{
	objSlideShow = setInterval('AdvSlideShow()',3000)
}

function AdvSlideShow()
{
	//alert(picIndex + " " + NoOfPicturesLoaded);
	document.slideShow.src = pictureLinksArray[picIndex].src;
	picIndex = picIndex + 1;
	if (picIndex > NoOfPicturesLoaded)
		picIndex=1;
}

function ShowPic(pid, link, details)
{
	document.mainPicture.src = link;
	document.viewPicturesForm.MainPicID.value = pid;
	document.getElementById("mainPictureDetails").innerHTML = details;
}

function NextPicSubmit(pid)
{
  document.viewPicturesForm.leftPicID.value = pid;
  document.viewPicturesForm.submit() ;
}

function PrevPicSubmit(pid)
{
  document.viewPicturesForm.rightPicID.value = pid;
  document.viewPicturesForm.submit() ;
}
/****************** Games ***************************/

function displayGame(id)
{
  document.addGames.displayGameId.value = id;
  document.addGames.submit() ;
}



/**************** CHAT FUNCTIONS *********************************************************/
function scroll2end() 
	{
			var frame = window.frames.msgboard_frame;
			var doc   = frame.document;
			var node  = doc.getElementsByTagName('body')[0].lastChild;
			var y = parseInt(node.offsetTop, 10);
			frame.scrollTo(0, y);
	}
function dawMainpage(val)
{
	document.EditMainPage.drawMainPage.value=val;
	document.EditMainPage.submit();
	
} 