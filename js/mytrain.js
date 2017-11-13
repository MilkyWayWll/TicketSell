// JavaScript Document
var datapage = "http://localhost/mytrain/traindata.php?"

var list_fromcity = 0;
var list_tocity = "";
var show_page = "";
var now_page = "";

var now_UID = "";
var now_Username = "";
var now_Truename = "";
var now_Usertype = "";
var now_Useridnum = "";

var ani_speed = 600;

var buy_TrainNum;
var buy_TrainType;
var buy_StartStation;
var buy_ArriveStation;
var buy_StartTime;
var buy_ArriveTime;
var buy_Mile;
var buy_Price;

function addbuyaction(){
	$(".buyTicketInfo").click(function(){
					if(now_UID == ""){
						alert("登录之后才能购买车票");
					}
					else
					{
						buy_TrainNum = $(this).attr("train");
						buy_TrainType = $(this).attr("traintype");
						buy_StartStation = $(this).attr("startstation");
						buy_ArriveStation = $(this).attr("arrivestation");
						buy_StartTime = $(this).attr("starttime");
						buy_ArriveTime = $(this).attr("arrivetime");
						buy_Mile = $(this).attr("mile");
						buy_Price = $(this).attr("price");
						
						$("#buy_TrainNum").html(buy_TrainNum);
						$("#buy_TrainType").html(buy_TrainType);
						$("#buy_StartStation").html(buy_StartStation);
						$("#buy_ArriveStation").html(buy_ArriveStation);
						$("#buy_StartTime").html(buy_StartTime);
						$("#buy_ArriveTime").html(buy_ArriveTime);
						$("#buy_Mile").html(buy_Mile);
						$("#buy_Price").html(buy_Price);
						
						$("#buyinfo").html("");
						$("#buyDIV").fadeIn(ani_speed);
					}
				});
}


$(document).ready(function(){

	$(".page").hide(0);
	$("#page_Home").fadeIn(ani_speed);
	now_page = "Home";
 	
	//标题栏点击切换页面
	$(".nav_li").click(function(){
		show_page = $(this).attr("page");
		if(show_page == "User"){
			if(now_UID == ""){
				alert("登录之后才能查看账户信息");
			}
			else
			{
				
				$("#user_Name").attr("value",now_Username);
				$("#true_Name").attr("value",now_Truename);
				$("#id_Number").attr("value",now_Useridnum);
				$("#page_" + now_page).fadeOut(ani_speed,function(){
					$("#page_" + show_page).fadeIn(ani_speed);
					now_page = show_page;
				});
				$("#ticketList").fadeOut(ani_speed,function(){
					$("#ticketList").load(datapage + "action=ticket&userid=" + now_UID,function(){
						
						$(".delTicketInfo").click(function(){
							$(this).load(datapage + "action=del&object=ticket&tid=" + $(this).attr("tid"),function(){
								
							});
							
						});
						
						$("#ticketList").fadeIn(ani_speed);
					});
				});
			}
		}
		else
		{
			if(show_page == "Manage"){
				$("#page_" + now_page).fadeOut(ani_speed,function(){
					$("#page_" + show_page).fadeIn(ani_speed);
					now_page = show_page;
				});
			}
			else
			{
				$("#page_" + now_page).fadeOut(ani_speed,function(){
					$("#page_" + show_page).fadeIn(ani_speed);
					now_page = show_page;
				});
			}
		}
	});

	$("#trainList").load(datapage + "action=list&start=北京&end=郑州",function(){
			
			addbuyaction();
		
			$("#trainList .info").click(function(){
				$("#trainList #detail_" + $(this).attr("train")).slideToggle(ani_speed);
			});
	});
	
	//查询列车
	$("#searchTrain").click(function(){
		$("#trainList").fadeOut(ani_speed,function(){
			$("#trainList").load(datapage + "action=list&start=" + $("#fromCity").attr("value") + "&end=" + $("#toCity").attr("value"),function(){
				
				addbuyaction();
			
				$("#trainList .info").click(function(){
					$("#trainList #detail_" + $(this).attr("train")).slideToggle(ani_speed);
				});
				
				
				
				$("#trainList").fadeIn(ani_speed);
			});
		});
	});
	
	//车站信息
	$("#searchStation").click(function(){
		$("#stationTrainList").fadeOut(ani_speed,function(){
			$("#stationTrainList").load(datapage + "action=station&station=" + $("#getStation").attr("value"),function(){
			
				addbuyaction();
			
				$("#stationTrainList .info").click(function(){
					$("#stationTrainList #detail_" + $(this).attr("train")).slideToggle(ani_speed);
				});
				
				$("#stationTrainList").fadeIn(ani_speed);
			});
		});
		
	});


	//列车信息
	$("#searchTrainNum").click(function(){
		$("#trainNumList").fadeOut(ani_speed,function(){
			$("#trainNumList").load(datapage + "action=train&trainnum=" + $("#trainNum").attr("value"),function(){
				
				addbuyaction();
				
				$("#trainNumList").fadeIn(ani_speed);

				$("#trainNumList #detail_" + $("#trainNumList .info").attr("train")).slideDown(ani_speed);				
			});
		});
		
	});
	
	$("#showLoginWindow").click(function(){
		$("#username").attr("value","");
		$("#password").attr("value","");
		$("#loginDIV").fadeIn(ani_speed);
	});

	$("#showRegWindow").click(function(){
		$("#reg_username").attr("value","");
		$("#reg_password").attr("value","");
		$("#reg_truename").attr("value","");
		$("#reg_idnumber").attr("value","");
		$("#regDIV").fadeIn(ani_speed);
	});
	
	$("#userLogin").click(function(){
		$("#loginfo").load(datapage + "action=login&username=" + $("#username").attr("value") + "&password=" + $("#password").attr("value"),function(){
				if($("#nowUserInfo").attr("UID") != ""){ //登录成功
					
					now_UID = $("#nowUserInfo").attr("UID");
					now_Username = $("#nowUserInfo").attr("username");
					now_Truename = $("#nowUserInfo").attr("truename");
					now_Usertype = $("#nowUserInfo").attr("type");
					now_Useridnum = $("#nowUserInfo").attr("idnumber");
					
					$("#loginDIV").fadeOut(ani_speed);
					
					$("#unLogin").fadeOut(ani_speed,function(){
						$("#dis_Username").html(now_Username);
						$("#dis_Truename").html(now_Truename);
						$("#dis_Usertype").html(now_Usertype);
						$("#logined").fadeIn(ani_speed);
						
					});
				}
				
			});
	});

	$("#userReg").click(function(){
		if($("#reg_username").attr("value") == ""){
			alert("用户名不能为空");
		}
		else
		{
			$("#reginfo").load(datapage + "action=add&object=user&username=" + $("#reg_username").attr("value") + "&password=" + $("#reg_password").attr("value") +"&truename=" + $("#reg_truename").attr("value") +"&idnumber=" + $("#reg_idnumber").attr("value"));
		}
	});
	
	$("#userLogout").click(function(){
		now_UID = "";
		
		$("#logined").fadeOut(ani_speed,function(){

						$("#unLogin").fadeIn(ani_speed);
						
					}
	
	});
	
	$("#buyNewTicket").click(function(){
		
			if($("#buyNumber").attr("value") == 0){
				alert("不能买0张");
			}
			else
			{
				$("#buyinfo").load(datapage + "action=buy&userid=" + now_UID + "&train="+buy_TrainNum+"&type="+buy_TrainType+"&ss="+buy_StartStation+"&as="+buy_ArriveStation+"&st="+buy_StartTime+"&at="+buy_ArriveTime+"&mile="+buy_Mile+"&price="+buy_Price+"&num="+$("#buyNumber").attr("value")+"&date="+$("#buyDate").attr("value"),function(){});
				
			}
	});
	
	$("#closeLoginDIV").click(function(){
		$("#loginDIV").fadeOut(ani_speed);	
	});
	
	$("#closeRegDIV").click(function(){
		$("#regDIV").fadeOut(ani_speed);	
	});
	
	$("#closeBuyDIV").click(function(){
		$("#buyDIV").fadeOut(ani_speed);	
	});
	

});