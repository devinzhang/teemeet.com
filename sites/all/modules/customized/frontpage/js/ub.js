Drupal.behaviors.univcite_better=function(context){
	var interval=5000;
	var int=setInterval(function(){
			if($(".item:last").css('display')!='none'){
				$(".item:last").fadeOut(1000,function(){
					$(".item-tag:last").removeClass('item-active-tag');
				});
				$(".item:first").fadeIn(1000,function(){
					$(".item-tag:first").addClass('item-active-tag');
				});
			}else{
				$(".item:visible").fadeOut(1000,function(){
					$(".item-active-tag").removeClass('item-active-tag').next('.item-tag').addClass('item-active-tag');
				});
				$(".item:visible").next('.item').fadeIn(1000,function(){
					$(".item-tag:has('.item-active-tag')").next('.item-tag').addClass('item-active-tag');
				});
			}
		},interval);

	$('.item-tag',context).bind('click',function(){
		var num=/\d+/.exec($(this).attr('id'));
		clearInterval(int);
		$('.item-tag',context).removeClass('item-active-tag');
		$(this).addClass('item-active-tag');
		$('.item',context).fadeOut(1000);
		$("#item-"+num,context).fadeIn(1000);
		int=setInterval(function(){
			if($(".item:last").css('display')!='none'){
				$(".item:last").fadeOut(1000,function(){
					$(".item-tag:last").removeClass('item-active-tag');
				});
				$(".item:first").fadeIn(1000,function(){
					$(".item-tag:first").addClass('item-active-tag');
				});
			}else{
				$(".item:visible").fadeOut(1000,function(){
					$(".item-active-tag").removeClass('item-active-tag').next('.item-tag').addClass('item-active-tag');
				});
				$(".item:visible").next('.item').fadeIn(1000,function(){
					$(".item-tag:has('.item-active-tag')").next('.item-tag').addClass('item-active-tag');
				});
			}
		},interval);
	});
	$('.term-item-content',context).css('display','none');
	$('.term-item-content:first',context).css('display','block');
	$('.term-item-tag',context).bind('click',function(){
		var num=/\d+/.exec($(this).attr('id'));
		$('.term-item-tag',context).removeClass('term-active-item-tag');
		$(this).addClass('term-active-item-tag');
		$('.term-item-content',context).fadeOut(200);
		$("#term-content-"+num,context).fadeIn(1000);
	});

	$('.image-item',context).css('display','none');
	$('.image-item:first',context).css('display','block');
	$('.image-item-left-arrow',context).bind('click',function(){
		if($('.image-item:first').css('display')!='none'){
			$('.image-item:first').fadeOut(1000,function(){
				
			});
			$('.image-item:last').fadeIn(1000,function(){
				
			});
		}else{
			$('.image-item:visible').fadeOut(1000,function(){

			});
			$('.image-item:visible').prev('.image-item').fadeIn(1000,function(){
				
			});
		}
		
	});
	$('.image-item-right-arrow',context).bind('click',function(){
		if($('.image-item:last').css('display')!='none'){
			$('.image-item:last').fadeOut(1000,function(){
				
			});
			$('.image-item:first').fadeIn(1000,function(){
				
			});
		}else{
			$('.image-item:visible').fadeOut(1000,function(){

			});
			$('.image-item:visible').next('.image-item').fadeIn(1000,function(){
				
			});
		}
	});
}
