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
	$qa_no=(isset ($_POST['qa_no'])) ? $_POST['qa_no'] : "";
	$f30=(isset ($_POST['f30'])) ? $_POST['f30'] : "";
	$f311=(isset ($_POST['f311'])) ? $_POST['f311'] : "";
	$f312=(isset ($_POST['f312'])) ? $_POST['f312'] : "";
	$f313=(isset ($_POST['f313'])) ? $_POST['f313'] : "";
	$f314=(isset ($_POST['f314'])) ? $_POST['f314'] : "";
	$f315=(isset ($_POST['f315'])) ? $_POST['f315'] : "";
	$f316=(isset ($_POST['f316'])) ? $_POST['f316'] : "";
	$f317=(isset ($_POST['f317'])) ? $_POST['f317'] : "";
	$f317C=(isset ($_POST['f317C'])) ? $_POST['f317C'] : "";
//--------------------------------------
//initial Local variables
//--------------------------------------	
	$msg="";
	$idx="";
	$sql="";
	$sql_array=array();
	$cmd_count=0;   
	$seq="";            
//--------------------------------------
//processing
//--------------------------------------	
	$sql =" select count(*) from qa_parent";
	$sql.=" where qa_no='$qa_no'";	
	
	if(TestDuplicate($conn,$sql))
	{	
		//--------------------------------------
		if ($f30!="")
		{
			$sql =" update qa_parent set";
			$sql.=" f30='$f30'";
			$sql.=" where qa_no='$qa_no'";
		}
		else
		{
			$sql =" update qa_parent set";
			$sql.=" f311='$f311',";
			$sql.=" f312='$f312',";
			$sql.=" f313='$f313',";
			$sql.=" f314='$f314',";
			$sql.=" f315='$f315',";
			$sql.=" f316='$f316',";
			if ($f317C=="Y")
			{
				$sql.=" f317='$f317'";
			}
			else
			{
				$sql.=" f317=''";
			}
			$sql.=" where qa_no='$qa_no'";
		}

		$sql_array[$cmd_count]=$sql;
		$cmd_count++;
		//-------------------------------
		//execute the Transaction
		//-------------------------------
		$result=DoTransaction($conn,$cmd_count,$sql_array);
		if ($result)
		{
			$idx=1;
		}
		else
		{
			$msg="<font color='blue'>"."更新失敗"."</font>";
			$idx=0;
		}
		//--------------------------------------
	}
	else
	{		
		$msg="<font color='blue'>"."此問卷不存在"."</font>";
		$idx=0;
	}
//--------------------------------------
//disconnect database
//--------------------------------------	
        DisconnectMysql($l_type,$conn);	
?>
<html>
<head>
<title>走路上學計劃</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!-----CSS include S----->
<link href="table.css" rel="stylesheet" type="text/css" />
<link href="_set.css" rel="stylesheet" type="text/css" />
<!-----CSS include E----->
<!-----javascript code S----->
<script language="javascript" src="walk_function.js"></script>
<script language=javascript>
function form_action()
{
	if (document.AP_CT.f32[0].checked==true||document.AP_CT.f32[1].checked==true||document.AP_CT.f32[2].checked==true||document.AP_CT.f32[3].checked==true||document.AP_CT.f32[4].checked==true||document.AP_CT.f32[5].checked==true)
	{
		document.AP_CT.action="qa_parent_40.php";
		document.AP_CT.submit();
	}
	else
	{
		alert("請輸入：答案");
		return false;
	}
}
</script>
<!-----javascript code E----->
<body bgcolor="#FFFFFF" text="#000000" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onLoad="MM_preloadImages('btn/btn01_over.gif','btn/btn02_over.gif','btn/btn03_over.gif','btn/btn04_over.gif','btn/btn05_over.gif','btn/btn06_over.gif')">
<form name="AP_CT" action="" method="post" onsubmit="return form_action()">
<input name="qa_no" type="hidden" value="<?php echo $qa_no ?>">
<!-- header start -->
<script language="javascript" src="walk_header.js"></script>
<!-- header end -->
<table width="860" border="0" cellspacing="0" cellpadding="0">
  <tr valign="top"> 
    <td width="276"> 
      <table width="32%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="4%" valign="top"><img src="images/block01-top01.gif" width="65" height="89"></td>
          <td width="48%" valign="top"> 
            <table width="100%" border="0" cellspacing="0" cellpadding="0" background="images/block01-back.gif">
              <tr>
                <td><img src="images/block01-top02.gif" width="183" height="89"></td>
              </tr>
              <tr>
                <td>
                  <table width="181" border="0" cellspacing="0" cellpadding="0" align="center">
                    <tr> 
                      <td><a href="people01.htm"><img src="btn/people01.gif" width="181" height="30" border="0"></a></td>
                    </tr>
                    <tr> 
                      <td><a href="people02.htm"><img src="btn/people02.gif" width="181" height="30" border="0"></a></td>
                    </tr>
                    <tr> 
                      <td><img src="btn/peo-b01.gif" width="181" height="24"></td>
                    </tr>
                    <tr> 
                      <td><A href="qa_parent_start.php"><img border="0" src="btn/peo-b02.gif" width="181" height="25"></a></td>
                    </tr>
                    <tr> 
                      <td><img src="btn/peo-b03.gif" width="181" height="24"></td>
                    </tr>
                    <tr> 
                      <td><img src="btn/peo-b04.gif" width="181" height="24"></td>
                    </tr>
                    <tr> 
                      <td><A href="qa2_list.php"><img border="0" src="btn/peo-b05.gif" width="181" height="25"></a></td>
                    </tr>
                    <tr> 
                      <td><a href="people03.htm"><img src="btn/people03.gif" width="181" height="30" border="0"></a></td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td><img src="images/block01-bottom.gif" width="183" height="12"></td>
              </tr>
            </table>
<!-- banner -->
<script language="javascript" src="walk_banner.js"></script>
<!-- banner -->
          </td>
          <td width="48%" valign="top"><img src="images/_spacer.gif" width="30" height="25"></td>
        </tr>
      </table>
    </td>
    <td width="584"> 
      <table width="100%" border="0" cellspacing="0" cellpadding="0" background="images/page-right-back.gif">
        <tr> 
          <td><img src="images/title-people.gif" width="657" height="71"></td>
        </tr>
        <tr> 
          <td valign="top"> 
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td> 
                  <table width="596" border="0" cellspacing="0" cellpadding="0" align="center">
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                    <tr> 
                      <td><b><font color="#CC6600">環境評估表</font></b></td>
                    </tr>
                    <tr> 
                      <td><img src="images/_spacer.gif" width="25" height="5"></td>
                    </tr>
                  </table>
                  <table width="596" border="0" cellspacing="0" cellpadding="0" align="center" background="images/form-back.gif">
                    <tr> 
                      <td height="125" valign="top" background="images/form-bottom.gif" class="set-bgbottom"> 
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td background="images/form-top.gif" height="53" class="set-bgtop" valign="middle" align="center">
                              <div align="center">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr> 
                                    <td><img src="images/_spacer.gif" width="25" height="8"></td>
                                  </tr>
                                </table>
                              </div>
                              <!-- 問卷大綱 s-->
                              <font color='white'>駕駛人行為</font>
                              <!-- 問卷大綱 e-->
                            </td>
                          </tr>
                          <tr> 
                            <td height="30">
                              <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
                                <tr>
                                  <td valign="top" align="center">
                                          <BR>					  
<?php if ($idx==1) { ?>
					  <!--環境評估表 start(idx==1) -->					  
					  <table class="table_in" width="550" border="0" cellspacing="1" cellpadding="3">                                              
					    <tr height="60">
			                      <td class="tdHeads" width="150">問題：</td>
			                      <td class="tdHeads2">
			                      <!-- 問卷題目 s-->
			                      <font color="#CC6600"><B>針對駕駛人行為，您的綜合評分?</B></font>
			                      <!-- 問卷題目 s-->
			                      </td>
			                    </tr>
			                    <!-- 問卷答案 s-->
			                    <!-- 不論答案有幾個, 都只有一個Row, 必須利用rowspan來整合-->  			                                       
					    <tr>
			                      <td class="tdHeads" width="150" rowspan="6">答案：</td>
			                      <td class="tdHeads2"><input type="radio" name="f32" value="1">非常有問題</td>
			                    </tr>
					    <tr>
			                      <td class="tdHeads2"><input type="radio" name="f32" value="2">有許多問題</td>
			                    </tr>
					    <tr>
			                      <td class="tdHeads2"><input type="radio" name="f32" value="3">有些問題</td>
			                    </tr>
					    <tr>
			                      <td class="tdHeads2"><input type="radio" name="f32" value="4">良好</td>
			                    </tr>
					    <tr>
			                      <td class="tdHeads2"><input type="radio" name="f32" value="5">非常好</td>
			                    </tr>
					    <tr>
			                      <td class="tdHeads2"><input type="radio" name="f32" value="6">極佳</td>
			                    </tr>
			                    <!-- 問卷答案 e-->	                    			                    
			                  </table>  
			                  <!-- 功能鍵-->
			                  <table width="550" border="0" cellspacing="0" cellpadding="0" class="font-12" >
			                    <tr> 
			                      <td height="10">&nbsp;</td>
			                    </tr>			                    
			                    <tr> 
			                      <td align="center">
			                      	<input class="btns" type="submit" value="下一頁">
			                        <input class="btns" type="reset" value="重新輸入">  
			                      </td>
			                    </tr>                                                                                             
			                  </table> 
			                  <!--環境評估表 (idx==1) end-->
<?php } else { ?>
			                  <!--系統訊息-->
			                  <!--環境評估表 start(idx==0) -->					  
					  <BR>
					  <table class="table_in" width="550" border="0" cellspacing="1" cellpadding="3">                                              
			                    <tr height="150">
			                      <td class="tdHeads" width="150">系統訊息：</td>
			                      <td class="tdHeads2">  
			                       <center><?php echo $msg; ?></center>
			                      </td>
			                    </tr>                     			                    
			                  </table>  
			                  <!--環境評估表 (idx==0) end-->
<?php } ?>    
                                  </td>
                                </tr>
                              </table>
                            </td>
                          </tr>
                          <tr> 
                            <td height="60">&nbsp;</td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
          <td height="30">&nbsp;</td>
        </tr>
        <tr> 
          <td><img src="images/page-right-bottom.gif" width="657" height="34"></td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<!-- footer -->
<script language="javascript" src="walk_footer.js"></script>
<!-- footer -->
</body>
</html>
<script language="javascript">
show_banner(1);
show_banner(2);
</script>
