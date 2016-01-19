//找到url中匹配的字符串
function findInUrl(str){
	url = location.href;
	return url.indexOf(str) == -1 ? false : true;
}
//获取url参数
function queryString(key){
    return (document.location.search.match(new RegExp("(?:^\\?|&)"+key+"=(.*?)(?=&|$)"))||['',null])[1];
}

//产生指定范围的随机数
function randomNumb(minNumb,maxNumb){
	var rn=Math.round(Math.random()*(maxNumb-minNumb)+minNumb);
	return rn;
	}
	
var wHeight;
$(document).ready(function(){
	wHeight=$(window).height();
	if(wHeight<832){
		wHeight=832;
		}
	$('.page').height(wHeight);
	$('.h832').css('padding-top',+(wHeight-832)/2+'px');
	
	var images=[];
    images.push("images/bgImg1.png");
	images.push("images/bgImg2a.png");
	images.push("images/bgImg2b.png");
	images.push("images/bgImg3a.png");
	images.push("images/bgImg3b.png");
	images.push("images/bgImg4a.png");
	images.push("images/bgImg4b.png");

    /*图片预加载*/
    var imgNum=0;
    $.imgpreload(images,
            {
                each: function () {
                    var status = $(this).data('loaded') ? 'success' : 'error';
                    if (status == "success") {
                        //var v = (parseFloat(++imgNum) / images.length).toFixed(2);
                        //$("#percentShow").html('已加载:'+Math.round(v * 100) + "%");
                    }
                },
                all: function () {

                    //$("#percentShow").html("已加载:100%");
                    //图片加载完成 加载动画
                    $('.page1').fadeOut(500);
					$('.page2').fadeIn(500);
					page2Act();
                }
            });
	});
	
function page2Act(){
	$('.bgImg2a').addClass('bgImg2aAct').show();
	$('.bgImg2b').addClass('slowShow1').show();
	$('.bgImg2').addClass('slowShow2').show();
	$('.pullBtn').addClass('slowShow2').show();
	setTimeout(function(){
		$('.bgImg2').removeClass('slowShow2').addClass('bgImg2Act');
		$(".page2").swipe({
			swipe:function(event, direction, distance, duration, fingerCount){
				if(direction=='down'){
					goPage3();
					}
				},
			});
		},2100);
	}
	
function showSel(x){
	var selVal=$.trim($('.bSel'+x).val());
	$('.showBirthBolck'+x).html(selVal);
	}	

function goPage3(){
	var bYear=$.trim($('.bSel3').val());
	var bMonth=$.trim($('.bSel2').val());
	var bDay=$.trim($('.bSel1').val());
	if(bYear==''||bMonth==''||bDay==''){
		alert('请输入您的生日');
		return false;
		}
		else{
			//alert(bYear+' '+bMonth+' '+bDay);
			$('.bgImg2a').removeClass('bgImg2aAct').addClass('bgImg2aAct2');
			$('.page2').addClass('downHide');
			$('.page3')/*.addClass('upShow')*/.show();
			setTimeout(function(){page3Act();},0);
			setTimeout(function(){
				$('.page2').removeClass('downHide').hide();
				},1000);
			}
	}

function page3Act(){
	$('.bgImg3a').addClass('bgImg2aAct').show();
	$('.bgImg3b').addClass('slowShow1').show();
	$('.page3Btn1').addClass('slowShow2').show();
	setTimeout(function(){
		$('.bgImg3b').removeClass('slowShow1').addClass('bgImg2Act');
		},2100);
	}

function goPage4(){
	$('.page3').fadeOut(1000);
	$('.page4').fadeIn(1000);
	$('.bgImg4b').addClass('slowShow1').show();
	$('.page4Btn1').addClass('slowShow3').show();
	}
	
function showShareNote(){
	$('.popBg').fadeIn(500);
	$('.shareNote1').fadeIn(1000);
	$('.shareNote2').fadeIn(500);
	}

function closeShareNote(){
	$('.popBg').fadeOut(500);
	$('.shareNote1').fadeOut(500);
	$('.shareNote2').fadeOut(500);
	}
	
//分享成功、失败、取消 执行
function goPage5(){
	$('.page').hide();
	closeShareNote();
	$('.page5').fadeIn(500);
	}




	