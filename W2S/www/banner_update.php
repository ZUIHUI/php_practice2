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
	$ck_user_no=(isset ($_COOKIE['ck_user_no'])) ? $_COOKIE['ck_user_no'] : "";
	$ck_group=(isset ($_COOKIE['ck_group'])) ? $_COOKIE['ck_group'] : "";
	
	$banner_no=(isset ($_POST['banner_no'])) ? $_POST['banner_no'] : "";
	$type=(isset ($_POST['type'])) ? $_POST['type'] : "";
	$pic_no=(isset ($_POST['pic_no'])) ? $_POST['pic_no'] : "";
	$pic_url=(isset ($_POST['pic_url'])) ? $_POST['pic_url'] : "";
	$start_date=(isset ($_POST['start_date'])) ? $_POST['start_date'] : "";	
	$expire_date=(isset ($_POST['expire_date'])) ? $_POST['expire_date'] : "";
	$enable=(isset ($_POST['enable'])) ? $_POST['enable'] : "";		
	$modify_date=date("Y-m-d H:i:s");
//--------------------------------------
//initial Local variables
//--------------------------------------	
	$msg="";
	$idx="";
	$sql="";
	$sql_array=array();
	$cmd_count=0;               
//--------------------------------------
//processing
//--------------------------------------	
	if ($ck_user_no=="" || $ck_group!="1")
	{
		DisconnectMysql($l_type,$conn);	
		header("Location: backend/");
	}
	//--------------------------------------
	$sql =" select count(*) from banner_info";
	$sql.=" where banner_no='$banner_no'";	
	
	if(TestDuplicate($conn,$sql))
	{	
		//--------------------------------------
		if ($enable=="F")
		{
			//--------------------------------------
			$sql =" delete from banner_info";
			$sql.=" where banner_no='$banner_no'";	
			
			$sql_array[$cmd_count]=$sql;
			$cmd_count++;				
			//-------------------------------
			//execute the Transaction
			//-------------------------------	
			$result=DoTransaction($conn,$cmd_count,$sql_array);
			if ($result)
			{
				$msg="<font color='blue'>"."刪除廣告-OK"."</font>";			
			}
			else
			{		
				$msg="<font color='red'>"."刪除廣告-ERROR"."</font>";			
			}				
			//--------------------------------------
			$sql =" select path from pic_info";
			$sql.=" where pic_no='$pic_no'";	

			$result = $conn->query($sql);
			$data_arr=$result->fetch();

			if (unlink("banner/".$data_arr[0]))
			{
				//$msg.="\n<br><font color='blue'>"."刪除廣告圖片-OK"."</font>";			
			}
			else
			{		
				$msg.="\n<br><font color='red'>"."刪除廣告圖片-ERROR"."</font>";			
			}				
			//--------------------------------------
			$sql =" delete from pic_info";
			$sql.=" where pic_no='$pic_no'";	
			
			$sql_array[$cmd_count]=$sql;
			$cmd_count++;				
			//-------------------------------
			//execute the Transaction
			//-------------------------------	
			$result=DoTransaction($conn,$cmd_count,$sql_array);
			if ($result)
			{
				//$msg.="\n<br><font color='blue'>"."刪除廣告圖片(DB)-OK"."</font>";			
			}
			else
			{		
				$msg.="\n<br><font color='red'>"."刪除廣告圖片(DB)-ERROR"."</font>";			
			}				
			//--------------------------------------
		}
		else
		{
			//--------------------------------------	
			$sql =" update banner_info set";
			$sql.=" type='$type',";
			$sql.=" pic_no='$pic_no',";
			$sql.=" pic_url='$pic_url',";
			$sql.=" start_date='$start_date',";
			$sql.=" expire_date='$expire_date',";
			$sql.=" modify_date='$modify_date'";
			$sql.=" where banner_no='$banner_no'";	
			
			$sql_array[$cmd_count]=$sql;
			$cmd_count++;						
			//-------------------------------
			//execute the Transaction
			//-------------------------------	
			$result=DoTransaction($conn,$cmd_count,$sql_array);
			if ($result)
			{
				$msg="<font color='blue'>"."維護廣告-OK"."</font>";			
			}
			else
			{		
				$msg="<font color='red'>"."維護廣告-ERROR"."</font>";			
			}	
		}
		//--------------------------------------
	}
	else
	{
		$msg="<font color='red'>"."此廣告不存在-ERROR"."</font>";
	}								
//--------------------------------------
//disconnect database
//--------------------------------------	
        DisconnectMysql($l_type,$conn);	
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<!-----CSS include S----->
<link href="table.css" rel="stylesheet" type="text/css" />
<link href="_set.css" rel="stylesheet" type="text/css" />
<!-----CSS include E----->
<!-----javascript code S----->
<script language="javascript" src="walk_function.js"></script>
<!-----javascript code E----->
<body class="body_main">
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
                      <td width="93%"><b><font color="#FFFFFF">廣告管理-維護廣告內容</font></b></td>
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
            <table class="table_in" width="550" height="200" cellspacing="1" cellpadding="3" align="center">
              <tr class="tr_title">
                <td class="td_title">系統訊息</td>
              </tr>
              <tr>
                <td class="msg" width="550">
                <center>
                  <?php
                  echo $msg;
                  ?>
                </center>
                </td>
              </tr>
              <tr class="tr_title">
                <td class="td_title"></td>
              </tr>
            </table>
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
</body>
</html>
