<?php
//--------------------------------------
//include extern utility
//--------------------------------------	
	include("walk_function.inc");		
//--------------------------------------
//system variables declaration 
//--------------------------------------
//SET $l_type=TRUE	: Need to Connect DB
//SET $l_type=FALSE	: Do Not to Connect DB
//--------------------------------------
	$l_type=TRUE;
    $idx=" ";
    $msg="<font color='red'>"."此最新消息不存在-ERROR"."</font>";	
//--------------------------------------
//connect database
//--------------------------------------
        $conn=ConnectMysql($l_type);
        
        if ($l_type && ! $conn)
        {
                exit();
        }       
//--------------------------------------
//initial CGI variables
//--------------------------------------	
	
//--------------------------------------
//initial Local variables
//--------------------------------------	

//--------------------------------------
//processing
//--------------------------------------	

//disconnect database
//--------------------------------------	
        DisconnectMysql($l_type,$conn);	
        $idx==1;
?>
<script language="javascript" src="walk_function.js"></script>
<script language=javascript>
function form_action()
{
	if(document.AP_CT.content.value=="")
	{
		alert("請輸入：消息內容");
		return false;		
	}
	else
	{				
		answer = confirm("是否確定：維護最新消息？");
		if (answer)
		{	
			return true;
		}
		else
		{
			return false;	
		}
	}
}
function news_pic_new()
{
	var l_date = new Date();
	var key2= l_date.getTime();    	
  	var winFeature="dialogWidth:720px;dialogHeight:600px;status:no;";
  	var pic_info = null;

    	pic_info = window.showModalDialog("news_pic1.php" + "?key2=" + key2 ,"",winFeature);
    	if(pic_info!=undefined)
    	{
      		document.AP_CT.pic_no.value = pic_info[0];
		span_myimg1.innerHTML = '<img name="myimg1" border="1" width="352" height="240" align="top" src="news/' + pic_info[1] + '">';
    	}
}
function chk_reset()
{
<?php if ($data_arr[3]==0) { ?>
	span_myimg1.innerHTML = '';
<?php } else  { ?>
	span_myimg1.innerHTML = '<img name="myimg1" border="1" width="352" height="240" align="top" src="news/<?php echo $data_arr[5]?>" alt="<?php echo $data_arr[4]?>">';
<?php } ?>
	return true;
}
</script>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<!-----CSS include S----->
<link href="table.css" rel="stylesheet" type="text/css" />
<link href="_set.css" rel="stylesheet" type="text/css" />
<!-----CSS include E----->
<!-- calendar S-->
<LINK REL=StyleSheet HREF="calendar_src/calendar.css" TYPE="text/css">
<script language="javascript" src="calendar_src/cbf_calendar.js"></script>
<script language="javascript">buildWeeklyCalendar(1);</script>

<!-----javascript code E----->
<body class="body_main">
<form name="AP_CT" action="news_search1.php" method="post" onsubmit="return form_action()">
<input name="news_no" type="hidden" value="<?php echo $news_no ?>">
<!-- header start -->
<script language="javascript" src="walk_header1.js"></script>
<!-- header end -->
<table width="1002" border="0" cellspacing="0" cellpadding="0" class="set-bgtop" background="images/page-back.gif">
  <tr> 
    <td width="262" valign="top"> 
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td height="23" colspan="2">&nbsp;</td>
        </tr>
        <tr> 
          <td height="2" width="12%">&nbsp;</td>
          <td height="2" width="88%">
            <!-- left function start -->
            <script language="javascript" src="walk_left1.js"></script>
            <!-- left function end -->
          </td>
        </tr>
      </table>
    </td>    
    <td width="740" valign="top"> 
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td height="23" width="740">&nbsp;</td>
        </tr>
        <tr> 
          <td>           
            <table width="713" border="0" cellspacing="0" cellpadding="0">
              <!-- tip start -->
              <tr> 
                <td background="images/block-top01.gif" height="60" valign="top"> 
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td width="7%" height="27">&nbsp;</td>
                      <td width="93%" height="27">&nbsp;</td>
                    </tr>
                    <tr> 
                      <td width="7%">&nbsp;</td>
                      <td width="93%"><b><font color="#FFFFFF">搜尋消息-最新消息資訊</font></b></td>
                    </tr>
                  </table>
                </td>
              </tr>
              <!-- tip end -->
              <tr> 
                <td background="images/block-back.gif">                
                  <table width="703" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td>
                        <BR><BR> 
                        <!-- work sheet start-->
                        <div align=center>
                        <h2>請輸入欲搜尋關鍵字:</h2>
                        <input name="news_key" type="text"><br /><br />
                        <input type="submit">
                        </div>
                        <!-- work sheet end-->
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td background="images/block-back.gif" height="25">&nbsp;</td>
              </tr>
              <tr> 
                <td><img src="images/block-bottom.gif" width="713" height="29"></td>
              </tr>
            </table>
          </td>
        </tr>
      </table>      				    
    </td>
  </tr>
  <tr>
    <td width="262" valign="top" height="40">&nbsp;</td>
    <td width="740" valign="top" height="40">&nbsp;</td>
  </tr>
</table>
<!-- footer -->
<script language="javascript" src="walk_footer1.js"></script>
<!-- footer -->
</form>
</body>
</html>
