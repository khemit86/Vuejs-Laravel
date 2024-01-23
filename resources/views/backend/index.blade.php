
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
 
  <link rel="icon" href="{{ url('frontend/img/favicon.png') }}" type="image/x-icon">
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/favicon.png')}}">
   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <title>Proslipsi</title>

  <!-- Font Awesome Icons -->
<link rel="stylesheet" type="text/css" href="{{ asset('backend/css/style.css?47') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('backend/css/app.css?89') }}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">
  <router-view></router-view>
</div>
<script type="text/javascript" src="{{ url('ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('backend/js/admin.js') }}"></script>
</body>
<style>
.flex-direction-column{
  margin-left: 4%  !important;
}
.field-input[data-v-5b500588] {

  min-height: 37px  !important;
  height: 37px !important;
  margin-left:10px !important;
}

#exportDatePicker ..field-input[data-v-5b500588] {
   margin-left:0px !important;
}

</style>

<script>
	$(document).ready(function() {

		$('body').on('click','[data-labelfor]',function() {			
			$('#' + $(this).attr("data-labelfor")).prop('checked',
							function(i, oldVal)
							{								
								return !oldVal; 
							});
			//$(this).prev().trigger('click')

			var nestedMenu = $(this).prev().parent().parent().parent().parent();
			var nestedMenuId = $(this).prev().parent().parent().parent().parent().attr('id');
			var dataId = $(this).prev().parent().parent().parent().parent().attr('data-id');
			var checkedChk = nestedMenu.find("input:checked").map(function(){return this.value});
			console.log(checkedChk.length)
			if(checkedChk.length > 1)
			{                
				$('#all_'+dataId).prop('checked',false);
				$('#all_count_'+dataId).css({ 'font-weight' : '' });
			}
			else if(checkedChk.length <= 1)
			{
				$('#all_'+dataId).prop('checked',true);
				$('#all_count_'+dataId).css({ 'font-weight' : '600 !important' });
			}
		});

	});
		$('body').click(function(e)
			{
				if($(e.target).closest('.lblClasi').length === 1 || $(e.target).closest('.select-heading-list').length == 1 || $(e.target).closest('.right-cros').length === 1)
				{		
					if($(e.target).closest('.select-heading-list').length == 1)
					{
						$('.m_container').addClass('search_drp1');
						$('.select-heading-list').show();
						$('.select-heading-list').addClass('show').removeClass('hide');
						$('.selectSpan').html('<i class="fa fa-angle-up"></i>')
					}
					else if($(e.target).closest('.right-cros').length === 1)
					{
						
					}
					else
					{
						if($('.select-heading-list').hasClass('hide'))
						{				
							$('.m_container').addClass('search_drp1');	
							$('.select-heading-list').show();
							$('.select-heading-list').addClass('show').removeClass('hide');
							$('.selectSpan').html('<i class="fa fa-angle-up"></i>')
						}
						else if($('.select-heading-list').hasClass('show'))
						{		
							
							$('.m_container').removeClass('search_drp1');
							$('.select-heading-list').hide();
							$('.select-heading-list').addClass('hide').removeClass('show');
							$('.selectSpan').html('<i class="fa fa-angle-down"></i>')
						}
					}
					
				}
				else
				{			
					$('.m_container').removeClass('search_drp1');
					$('.select-heading-list').hide();
					$('.select-heading-list').addClass('hide').removeClass('show');
					$('.selectSpan').html('<i class="fa fa-angle-down"></i>')
				}


				if($(e.target).closest('.lblLocation').length === 1 ||  $(e.target).closest('.right-cros1').length === 1 || $(e.target).closest('.locationList').length === 1)
				{		

					if($(e.target).closest('.locationList').length == 1)
					{
						$('.m_container').addClass('search_drp');
						$('.locationList').show();
						$('.locationList').addClass('show').removeClass('hide');
						$('.selectSpan1').html('<i class="fa fa-angle-up"></i>')
					}
					else if($(e.target).closest('.right-cros1').length === 1)
					{

					}
					else
					{
						if($('.locationList').hasClass('hide'))
						{				
							$('.m_container').addClass('search_drp');
							$('.locationList').show();
							$('.locationList').addClass('show').removeClass('hide');
							$('.selectSpan1').html('<i class="fa fa-angle-up"></i>')
						}
						else if($('.locationList').hasClass('show'))
						{		
							$('.m_container').removeClass('search_drp');
							$('.locationList').hide();
							$('.locationList').addClass('hide').removeClass('show');
							$('.selectSpan1').html('<i class="fa fa-angle-down"></i>')
						}
					}
					
				}
				else
				{			
					$('.m_container').removeClass('search_drp');
					$('.locationList').hide();
					$('.locationList').addClass('hide').removeClass('show');
					$('.selectSpan1').html('<i class="fa fa-angle-down"></i>')
				

				}
				
			});
			
			$('body').on('click','.indChk', function()
			{  
				var dataId = $(this).attr('data-id');            
				if($(this).hasClass('mainChk'))
				{
					if($(this).prop('checked') == true)
					{						
						$('#all_'+dataId).prop('checked',true);
						$('#nestedMenu_'+dataId).show();
						$(this).parent().parent().addClass('selectedLi')
					}
					else
					{					
						$('#all_'+dataId).prop('checked',false);
						$('#nestedMenu_'+dataId).hide();	
						$('#mainLi_'+dataId+' input[type=checkbox]').each(function() 
						{
							if(!$(this).hasClass('mainChk') &&  !$(this).hasClass('all'))
							{
								console.log($(this).attr('class'));
								$(this).prop('checked',false);
							}
						});
						$(this).parent().parent().removeClass('selectedLi')
					}		
				}

				if($(this).hasClass('child'))
				{			  
					var nestedMenu = $(this).parent().parent().parent().parent();
					var nestedMenuId = $(this).parent().parent().parent().parent().attr('id');
					var dataId = $(this).parent().parent().parent().parent().attr('data-id');
					var checkedChk = nestedMenu.find("input:checked").map(function(){return this.value});
					console.log(checkedChk.length)
					if(checkedChk.length > 1)
					{                
						$('#all_'+dataId).prop('checked',false);
						$('#all_count_'+dataId).css({ 'font-weight' : '' });
					}
					else if(checkedChk.length <= 1)
					{
						$('#all_'+dataId).prop('checked',true);
						$('#all_count_'+dataId).css({ 'font-weight' : '600 !important' });
					}
				}

				if($(this).hasClass('all'))
				{
					if($(this).prop('checked') == true)
					{
						$('#mainChk_'+dataId).prop('checked',true);			
						$('#nestedMenu_'+dataId).show();
						$('#mainLi_'+dataId+' input[type=checkbox]').each(function() 
						{
							if(!$(this).hasClass('mainChk') &&  !$(this).hasClass('all'))
							{
								$(this).prop('checked',false);
							}
						});	
						$(this).closest('.mainLi').addClass('selectedLi');			
					}
					else
					{
						
						$('#mainChk_'+dataId).prop('checked',false);			
						$('#nestedMenu_'+dataId).hide();
						$('#mainLi_'+dataId+' input[type=checkbox]').each(function() 
						{
							if(!$(this).hasClass('mainChk') &&  !$(this).hasClass('all'))
							{
								$(this).prop('checked',false);
							}
						});	
						$(this).closest('.mainLi').removeClass('selectedLi')
						
					}
				}
				var mainChkLength = $('.mainChk:checked').length;
				if(mainChkLength == 1)
				{
					$('#lblClasi').addClass('crossIcon');
					var lblText = $('.mainChk:checked').next().text();
					var lblTextLength = lblText.length;
					if(lblTextLength > 20)
					{
						lblText = lblText.substring(0,17);
						lblText = lblText+'...';
						$('.lblDrp').text(lblText);
					}
					else
					{
						$('.lblDrp').text(lblText);
					}
					
				}
				else if(mainChkLength > 1)
				{
					var lblText = mainChkLength+' Industries';
					$('.lblDrp').text(lblText);
					$('#lblClasi').addClass('crossIcon');
				}
				else if(mainChkLength == 0)
				{
					var lblText = 'Choose Industry';
					$('.lblDrp').text(lblText);
					$('#lblClasi').removeClass('crossIcon');
				}

			});

			$('body').on('click','.locChk', function()
			{
				var dataId = $(this).attr('data-id');	
				var mainChkLength = $('.mainChk1:checked').length;
				if(mainChkLength == 1)
				{
					$('#lblLocation').addClass('crossIcon');
					var lblText = $('.mainChk1:checked').next().text();
					var lblTextLength = lblText.length;
					if(lblTextLength > 20)
					{
						lblText = lblText.substring(0,17);
						lblText = lblText+'...';
						$('.lblDrpLocation').text(lblText);
					}
					else
					{
						$('.lblDrpLocation').text(lblText);
					}
					
				}
				else if(mainChkLength > 1)
				{
					var lblText = mainChkLength+' Locations';
					$('.lblDrpLocation').text(lblText);
					$('#lblLocation').addClass('crossIcon');
				}
				else if(mainChkLength == 0)
				{
					var lblText = 'Choose Location';
					$('.lblDrpLocation').text(lblText);
					$('#lblLocation').removeClass('crossIcon');
				}

			});

			$('body').on('click','.right-cros', function()
			{
				$('.indChk').each(function()
				{
					$(this).prop('checked',false);
				});
				$('#lblClasi').removeClass('crossIcon');
				$('.lblDrp').text('Choose Industry');
				$('.nestedMenu').hide();
			});

			$('body').on('click','.right-cros1', function()
			{
				$('.locChk').each(function()
				{
					$(this).prop('checked',false);
				});
				$('#lblLocation').removeClass('crossIcon');
				$('.lblDrpLocation').text('Choose Location');
			});

			$( document ).ready(function() 
			{
				
				$("body").delegate(".selectpicker", "changed.bs.select", function() 
				{
					var selectedItem = $('.selectpicker').val();
					if(selectedItem != '')
					{
						$(this).parent().parent().addClass('crossIcon');
					}
					else
					{
						$(this).parent().parent().removeClass('crossIcon');
					}
					
				});

			});

			$('.rm-mustard').click(function() 
			{
				$('.remove-example').find('.Mustard').hide();
				$('.remove-example').selectpicker('refresh');
			});
			$('.rm-mustard1').click(function() 
			{            
				$('.remove-example').find('.Mustard').show();
				$('.remove-example').selectpicker('refresh');
			});
	// 		$(function() {
	//     $('body  #toggle-one').bootstrapToggle();
	//   })
	</script>
</html>

